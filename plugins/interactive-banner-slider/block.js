(function (blocks, blockEditor, components, element) {
  const { registerBlockType } = blocks;
  const { InspectorControls, MediaUpload, MediaUploadCheck, RichText, URLInputButton, useBlockProps } = blockEditor;
  const { PanelBody, TextControl, TextareaControl, Button, SelectControl, ToggleControl, RangeControl } = components;
  const { Fragment, createElement } = element;

  const DEFAULT_SLIDES = [
    {
      title: 'The <span class="ai-gradient-text">Hour of AI</span> is here.',
      description: 'A global movement to make AI education accessible, engaging, and inspiring for every learner.',
      ctaText: 'Explore the Activity',
      ctaUrl: 'https://ellipsisedu.com/en/hourofai-artificialneuron',
      backgroundImage: '',
      foregroundImage: '',
      layout: 'hero',
      bullets: [],
      footnote: '',
    },
    {
      title: 'Meet the Artificial Neuron',
      description: 'This lesson introduces the building blocks of AI through a fun “beach decision” model.',
      ctaText: 'Explore the Activity',
      ctaUrl: 'https://ellipsisedu.com/en/hourofai-artificialneuron',
      backgroundImage: '',
      foregroundImage: 'https://placehold.co/600x400/3730a3/ffffff?text=Image+2',
      layout: 'split',
      bullets: [],
      footnote: '',
    },
    {
      title: 'What Students Will Learn',
      description: 'Key takeaways that cover neurons, inputs, weights, bias, and experimentation.',
      ctaText: 'Access the Activity',
      ctaUrl: 'https://ellipsisedu.com/en/hourofai-artificialneuron',
      backgroundImage: '',
      foregroundImage: 'https://placehold.co/600x400/4c1d95/ffffff?text=Image+3',
      layout: 'list',
      bullets: [
        'Understand what an artificial neuron is and how it makes decisions.',
        'Explore how inputs, weights, and bias influence outcomes.',
        "Predict and test how changing weights affects a neuron's decision.",
        'Experiment in an online simulation to see AI decision-making in action.',
      ],
      footnote: '',
    },
    {
      title: 'Start Your Hour of AI',
      description: 'Bring the building blocks of artificial intelligence to your students with this free, one-hour activity.',
      ctaText: 'Access the Activity Now',
      ctaUrl: 'https://ellipsisedu.com/en/hourofai-artificialneuron',
      backgroundImage: '',
      foregroundImage: '',
      layout: 'cta',
      bullets: [],
      footnote: 'The Hour of AI is a global campaign from @CSforALL, in collaboration with Code.org.',
    },
  ];

  const ensureSlides = (slides = []) => {
    const merged = [...DEFAULT_SLIDES];
    return merged.map((slide, index) => ({ ...slide, ...(slides[index] || {}) }));
  };

  const parseBullets = (value = '') =>
    value
      .split('\n')
      .map((item) => item.trim())
      .filter(Boolean);

  registerBlockType('ellipsisslider/interactive-banner', {
    title: 'Interactive Banner Slider',
    description: 'Animated multi-slide hero with the Hour of AI styling.',
    edit: (props) => {
      const { attributes, setAttributes } = props;
      const slides = ensureSlides(attributes.slides);
      const { autoplay = true, interval = 7000 } = attributes;

      const updateSlide = (index, key, value) => {
        const updated = ensureSlides(attributes.slides);
        updated[index] = { ...updated[index], [key]: value };
        setAttributes({ slides: updated });
      };

      const blockProps = useBlockProps({ className: 'ai-banner-slider ai-banner-slider--editor' });

      return createElement(
        Fragment,
        null,
        createElement(
          InspectorControls,
          null,
          createElement(
            PanelBody,
            { title: 'Slider settings', initialOpen: true },
            createElement(ToggleControl, {
              label: 'Autoplay',
              checked: autoplay !== false,
              onChange: (value) => setAttributes({ autoplay: value }),
            }),
            createElement(RangeControl, {
              label: 'Interval (ms)',
              min: 3000,
              max: 12000,
              step: 500,
              value: interval || 7000,
              onChange: (value) => setAttributes({ interval: value || 7000 }),
            })
          ),
          slides.map((slide, index) =>
            createElement(
              PanelBody,
              { title: `Slide ${index + 1}`, initialOpen: index === 0 },
              createElement(TextControl, {
                label: 'Headline',
                value: slide.title,
                onChange: (value) => updateSlide(index, 'title', value),
              }),
              createElement(TextareaControl, {
                label: 'Description',
                value: slide.description,
                onChange: (value) => updateSlide(index, 'description', value),
              }),
              createElement(TextControl, {
                label: 'Button text',
                value: slide.ctaText,
                onChange: (value) => updateSlide(index, 'ctaText', value),
              }),
              createElement(URLInputButton, {
                url: slide.ctaUrl,
                label: 'Button link',
                onChange: (value) => updateSlide(index, 'ctaUrl', value),
              }),
              createElement(SelectControl, {
                label: 'Layout',
                value: slide.layout,
                options: [
                  { label: 'Hero (immersive)', value: 'hero' },
                  { label: 'Split (text + image)', value: 'split' },
                  { label: 'List (text + bullets)', value: 'list' },
                  { label: 'Centered CTA', value: 'cta' },
                ],
                onChange: (value) => updateSlide(index, 'layout', value || 'hero'),
              }),
              createElement(
                MediaUploadCheck,
                null,
                createElement(MediaUpload, {
                  onSelect: (media) => updateSlide(index, 'foregroundImage', media?.url || ''),
                  allowedTypes: ['image'],
                  value: slide.foregroundImage,
                  render: ({ open }) =>
                    createElement(
                      Button,
                      { onClick: open, isSecondary: true },
                      slide.foregroundImage ? 'Change foreground (optional)' : 'Choose foreground (optional)'
                    ),
                })
              ),
              createElement(TextareaControl, {
                label: 'Bulleted highlights (one per line)',
                value: (slide.bullets || []).join('\n'),
                onChange: (value) => updateSlide(index, 'bullets', parseBullets(value)),
              }),
              createElement(TextControl, {
                label: 'Footnote (small text)',
                value: slide.footnote,
                onChange: (value) => updateSlide(index, 'footnote', value),
              })
            )
          )
        ),
        createElement(
          'div',
          blockProps,
          createElement(
            'div',
            { className: 'ai-banner-slider__viewport' },
            slides.map((slide, index) =>
              createElement(
                'div',
                {
                  className: `ai-banner-slide layout-${slide.layout || 'hero'} ${index === 0 ? 'is-active' : ''}`,
                  key: index,
                },
                createElement('div', { className: 'ai-banner-slide__bg' }, createElement('span', { className: 'ai-banner-slide__overlay' })),
                createElement(
                  'div',
                  { className: 'ai-banner-slide__inner' },
                  createElement(
                    'div',
                    { className: 'ai-banner-slide__content' },
                    createElement(RichText, {
                      tagName: 'h2',
                      className: 'ai-banner-slide__title',
                      value: slide.title,
                      allowedFormats: ['core/bold', 'core/italic', 'core/link'],
                      onChange: (value) => updateSlide(index, 'title', value),
                    }),
                    createElement(RichText, {
                      tagName: 'p',
                      className: 'ai-banner-slide__description',
                      value: slide.description,
                      allowedFormats: ['core/bold', 'core/italic', 'core/link'],
                      onChange: (value) => updateSlide(index, 'description', value),
                    }),
                    slide.ctaText &&
                      createElement(
                        'a',
                        { className: 'ai-banner-button', href: slide.ctaUrl || '#' },
                        slide.ctaText
                      ),
                    slide.bullets?.length
                      ? createElement(
                          'ul',
                          { className: 'ai-banner-slide__bullets' },
                          slide.bullets.map((item, bulletIndex) => createElement('li', { key: bulletIndex }, item))
                        )
                      : null,
                    slide.footnote
                      ? createElement('p', { className: 'ai-banner-slide__footnote' }, slide.footnote)
                      : null
                  ),
                  slide.foregroundImage
                    ? createElement('div', { className: 'ai-banner-slide__fg' },
                        createElement('img', { src: slide.foregroundImage, alt: '', loading: 'lazy' })
                      )
                    : null
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
