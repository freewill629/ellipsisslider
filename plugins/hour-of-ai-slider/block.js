(function (blocks, blockEditor, components, element) {
  const { registerBlockType } = blocks;
  const { InspectorControls, MediaUpload, MediaUploadCheck, RichText, URLInputButton, useBlockProps } = blockEditor;
  const { PanelBody, TextControl, TextareaControl, Button } = components;
  const { Fragment } = element;

  const DEFAULT_SLIDES = [
    {
      title: 'The Hour of AI is here',
      description: 'A global movement to make AI education accessible, engaging, and inspiring for every learner.',
      ctaLabel: 'Explore the Activity',
      ctaUrl: '#',
      imageUrl: '',
      layout: 'image-left',
    },
    {
      title: 'Meet the Artificial Neuron',
      description: 'This lesson introduces the building blocks of AI through a fun beach decision model.',
      ctaLabel: 'Explore the Activity',
      ctaUrl: '#',
      imageUrl: '',
      layout: 'two-column',
    },
    {
      title: 'What Students Will Learn',
      description: 'Key takeaways that cover neurons, inputs, weights, bias, and experimentation.',
      ctaLabel: 'Access the Activity',
      ctaUrl: '#',
      imageUrl: '',
      layout: 'two-column',
    },
    {
      title: 'Start Your Hour of AI',
      description: 'Bring the foundations of artificial intelligence to your classroom with this free, one-hour activity.',
      ctaLabel: 'Access the Activity',
      ctaUrl: '#',
      imageUrl: '',
      layout: 'center',
    },
  ];

  const ensureSlides = (slides = []) => {
    const merged = [...DEFAULT_SLIDES];
    return merged.map((slide, index) => ({ ...slide, ...(slides[index] || {}) }));
  };

  registerBlockType('hour-of-ai/hero-slider', {
    title: 'Hour of AI Hero Slider',
    edit: (props) => {
      const { attributes, setAttributes } = props;
      const slides = ensureSlides(attributes.slides);

      const updateSlide = (index, key, value) => {
        const updated = ensureSlides(attributes.slides);
        updated[index] = { ...updated[index], [key]: value };
        setAttributes({ slides: updated });
      };

      const blockProps = useBlockProps({ className: 'hour-ai-slider hour-ai-slider--preview' });

      return element.createElement(
        Fragment,
        null,
        element.createElement(
          InspectorControls,
          null,
          slides.map((slide, index) =>
            element.createElement(
              PanelBody,
              { title: `Slide ${index + 1}`, initialOpen: index === 0 },
              element.createElement(TextControl, {
                label: 'Headline',
                value: slide.title,
                onChange: (value) => updateSlide(index, 'title', value),
              }),
              element.createElement(TextareaControl, {
                label: 'Description',
                value: slide.description,
                onChange: (value) => updateSlide(index, 'description', value),
              }),
              element.createElement(TextControl, {
                label: 'Button label',
                value: slide.ctaLabel,
                onChange: (value) => updateSlide(index, 'ctaLabel', value),
              }),
              element.createElement(URLInputButton, {
                label: 'Button link',
                url: slide.ctaUrl,
                onChange: (value) => updateSlide(index, 'ctaUrl', value),
              }),
              element.createElement(
                MediaUploadCheck,
                null,
                element.createElement(MediaUpload, {
                  onSelect: (media) => updateSlide(index, 'imageUrl', media?.url || ''),
                  allowedTypes: ['image'],
                  value: slide.imageUrl,
                  render: ({ open }) =>
                    element.createElement(
                      Button,
                      { onClick: open, isSecondary: true },
                      slide.imageUrl ? 'Change image' : 'Choose image'
                    ),
                })
              ),
              element.createElement(TextControl, {
                label: 'Layout',
                help: 'image-left, two-column, or center',
                value: slide.layout,
                onChange: (value) => updateSlide(index, 'layout', value || 'image-left'),
              })
            )
          )
        ),
        element.createElement(
          'div',
          blockProps,
          element.createElement(
            'div',
            { className: 'hour-ai-slider__track' },
            slides.map((slide, index) =>
              element.createElement(
                'div',
                {
                  className: `hour-ai-slide ${index === 0 ? 'is-active' : ''} layout-${slide.layout || 'image-left'}`,
                  key: index,
                },
                element.createElement(
                  'div',
                  { className: 'hour-ai-slide__inner' },
                  element.createElement(
                    'div',
                    { className: 'hour-ai-slide__copy' },
                    element.createElement(RichText, {
                      tagName: 'h2',
                      className: 'hour-ai-slide__title',
                      value: slide.title,
                      onChange: (value) => updateSlide(index, 'title', value),
                    }),
                    element.createElement(RichText, {
                      tagName: 'p',
                      className: 'hour-ai-slide__description',
                      value: slide.description,
                      onChange: (value) => updateSlide(index, 'description', value),
                    })
                  )
                ),
                slide.imageUrl &&
                  element.createElement(
                    'div',
                    { className: 'hour-ai-slide__media' },
                    element.createElement('img', { src: slide.imageUrl, alt: '', className: 'hour-ai-slide__image' })
                  )
              )
            )
          )
        )
      );
    },
    save: () => null,
  });
})(window.wp.blocks, window.wp.blockEditor || window.wp.editor, window.wp.components, window.wp.element);
