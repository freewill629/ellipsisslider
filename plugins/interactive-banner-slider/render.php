<?php
/**
 * Server-side render for the interactive banner slider block.
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Default slide content inspired by the provided design.
 *
 * @return array[]
 */
function ellipsis_interactive_banner_default_slides() {
  return array(
    array(
      'title'            => __( 'The <span class="ai-gradient-text">Hour of AI</span> is here.', 'ellipsis-interactive-banner' ),
      'description'      => __( 'A global movement to make AI education accessible, engaging, and inspiring for every learner.', 'ellipsis-interactive-banner' ),
      'ctaText'          => __( 'Explore the Activity', 'ellipsis-interactive-banner' ),
      'ctaUrl'           => 'https://ellipsisedu.com/en/hourofai-artificialneuron',
      'backgroundImage'  => '',
      'foregroundImage'  => '',
      'layout'           => 'hero',
      'bullets'          => array(),
      'footnote'         => '',
    ),
    array(
      'title'            => __( 'Meet the Artificial Neuron', 'ellipsis-interactive-banner' ),
      'description'      => __( 'This lesson introduces the building blocks of AI through a fun “beach decision” model.', 'ellipsis-interactive-banner' ),
      'ctaText'          => __( 'Explore the Activity', 'ellipsis-interactive-banner' ),
      'ctaUrl'           => 'https://ellipsisedu.com/en/hourofai-artificialneuron',
      'backgroundImage'  => '',
      'foregroundImage'  => 'https://placehold.co/600x400/3730a3/ffffff?text=Image+2',
      'layout'           => 'split',
      'bullets'          => array(),
      'footnote'         => '',
    ),
    array(
      'title'            => __( 'What Students Will Learn', 'ellipsis-interactive-banner' ),
      'description'      => __( 'Key takeaways that cover neurons, inputs, weights, bias, and experimentation.', 'ellipsis-interactive-banner' ),
      'ctaText'          => __( 'Access the Activity', 'ellipsis-interactive-banner' ),
      'ctaUrl'           => 'https://ellipsisedu.com/en/hourofai-artificialneuron',
      'backgroundImage'  => '',
      'foregroundImage'  => 'https://placehold.co/600x400/4c1d95/ffffff?text=Image+3',
      'layout'           => 'list',
      'bullets'          => array(
        __( 'Understand what an artificial neuron is and how it makes decisions.', 'ellipsis-interactive-banner' ),
        __( 'Explore how inputs, weights, and bias influence outcomes.', 'ellipsis-interactive-banner' ),
        __( "Predict and test how changing weights affects a neuron's decision.", 'ellipsis-interactive-banner' ),
        __( 'Experiment in an online simulation to see AI decision-making in action.', 'ellipsis-interactive-banner' ),
      ),
      'footnote'         => '',
    ),
    array(
      'title'            => __( 'Start Your Hour of AI', 'ellipsis-interactive-banner' ),
      'description'      => __( 'Bring the building blocks of artificial intelligence to your students with this free, one-hour activity.', 'ellipsis-interactive-banner' ),
      'ctaText'          => __( 'Access the Activity Now', 'ellipsis-interactive-banner' ),
      'ctaUrl'           => 'https://ellipsisedu.com/en/hourofai-artificialneuron',
      'backgroundImage'  => '',
      'foregroundImage'  => '',
      'layout'           => 'cta',
      'bullets'          => array(),
      'footnote'         => __( 'The Hour of AI is a global campaign from @CSforALL, in collaboration with Code.org.', 'ellipsis-interactive-banner' ),
    ),
  );
}

/**
 * Normalize slides with defaults to prevent missing fields.
 *
 * @param array $slides User provided slides.
 * @return array
 */
function ellipsis_interactive_banner_merge_slides( $slides ) {
  $defaults = ellipsis_interactive_banner_default_slides();
  $merged   = array();

  foreach ( $defaults as $index => $default_slide ) {
    $user_slide = isset( $slides[ $index ] ) && is_array( $slides[ $index ] ) ? $slides[ $index ] : array();

    $merged[] = array_merge(
      $default_slide,
      array_filter(
        $user_slide,
        static function ( $value ) {
          return '' !== $value && null !== $value;
        }
      )
    );
  }

  return $merged;
}

/**
 * Render callback for the block.
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Saved content (unused).
 *
 * @return string
 */
function ellipsis_interactive_banner_render_callback( $attributes, $content ) {
  $defaults = array(
    'slides'   => ellipsis_interactive_banner_default_slides(),
    'autoplay' => true,
    'interval' => 7000,
  );

  $settings = wp_parse_args( $attributes, $defaults );
  $slides   = ellipsis_interactive_banner_merge_slides( $settings['slides'] );

  $wrapper_attributes = get_block_wrapper_attributes(
    array(
      'class'        => 'ai-banner-slider',
      'data-autoplay' => $settings['autoplay'] ? 'true' : 'false',
      'data-interval' => absint( $settings['interval'] ),
    )
  );

  $slides_markup = '';
  $dots_markup   = '';

  foreach ( $slides as $index => $slide ) {
    $foreground = ! empty( $slide['foregroundImage'] ) ? sprintf( '<div class="ai-banner-slide__fg"><img src="%s" alt="" loading="lazy"></div>', esc_url( $slide['foregroundImage'] ) ) : '';

    $cta = ! empty( $slide['ctaText'] ) ? sprintf(
      '<a class="ai-banner-button" href="%1$s">%2$s</a>',
      esc_url( $slide['ctaUrl'] ),
      wp_kses_post( $slide['ctaText'] )
    ) : '';

    $bullets_markup = '';
    if ( ! empty( $slide['bullets'] ) && is_array( $slide['bullets'] ) ) {
      $items = array_map(
        static function ( $item ) {
          return '<li>' . wp_kses_post( $item ) . '</li>';
        },
        $slide['bullets']
      );

      $bullets_markup = '<ul class="ai-banner-slide__bullets">' . implode( '', $items ) . '</ul>';
    }

    $footnote = ! empty( $slide['footnote'] ) ? '<p class="ai-banner-slide__footnote">' . wp_kses_post( $slide['footnote'] ) . '</p>' : '';

    $content_markup  = '<div class="ai-banner-slide__content">';
    $content_markup .= '<h2 class="ai-banner-slide__title">' . wp_kses( $slide['title'], array( 'span' => array( 'class' => array() ) ) ) . '</h2>';
    $content_markup .= '<p class="ai-banner-slide__description">' . wp_kses_post( $slide['description'] ) . '</p>';

    if ( 'list' === $slide['layout'] ) {
      $content_markup .= $bullets_markup . $cta;
    } else {
      $content_markup .= $cta . $bullets_markup;
    }

    $content_markup .= $footnote . '</div>';

    $slides_markup .= sprintf(
      '<div class="ai-banner-slide layout-%2$s%3$s" data-index="%1$d">'
        . '<div class="ai-banner-slide__bg"><span class="ai-banner-slide__overlay"></span></div>'
        . '<div class="ai-banner-slide__inner">'
          . '%4$s'
          . '%5$s'
        . '</div>'
      . '</div>',
      absint( $index ),
      esc_attr( $slide['layout'] ? $slide['layout'] : 'hero' ),
      0 === $index ? ' is-active' : '',
      $content_markup,
      $foreground
    );

    $dots_markup .= sprintf( '<button class="ai-banner-slider__dot%2$s" data-target="%1$d" aria-label="Slide %1$d"></button>', absint( $index ) + 1, 0 === $index ? ' is-active' : '' );
  }

  $output  = '<div ' . $wrapper_attributes . '>';
  $output .= '<div class="ai-banner-slider__viewport">' . $slides_markup . '</div>';
  $output .= '<div class="ai-banner-slider__dots" role="tablist">' . $dots_markup . '</div>';
  $output .= '</div>';

  return $output;
}
