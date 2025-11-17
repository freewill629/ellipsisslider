<?php
/**
 * Server-side render for the Hour of AI slider block.
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

/**
 * Returns default slide data so the block always renders safely.
 *
 * @return array[]
 */
function hour_of_ai_slider_default_slides() {
  return array(
    array(
      'title'       => __( 'The Hour of AI is here', 'hour-of-ai' ),
      'description' => __( 'A global movement to make AI education accessible, engaging, and inspiring for every learner.', 'hour-of-ai' ),
      'ctaLabel'    => __( 'Explore the Activity', 'hour-of-ai' ),
      'ctaUrl'      => '#',
      'imageUrl'    => '',
      'layout'      => 'image-left',
    ),
    array(
      'title'       => __( 'Meet the Artificial Neuron', 'hour-of-ai' ),
      'description' => __( 'This lesson introduces the building blocks of AI through a fun beach decision model.', 'hour-of-ai' ),
      'ctaLabel'    => __( 'Explore the Activity', 'hour-of-ai' ),
      'ctaUrl'      => '#',
      'imageUrl'    => '',
      'layout'      => 'two-column',
    ),
    array(
      'title'       => __( 'What Students Will Learn', 'hour-of-ai' ),
      'description' => __( 'Key takeaways that cover neurons, inputs, weights, bias, and experimentation.', 'hour-of-ai' ),
      'ctaLabel'    => __( 'Access the Activity', 'hour-of-ai' ),
      'ctaUrl'      => '#',
      'imageUrl'    => '',
      'layout'      => 'two-column',
    ),
    array(
      'title'       => __( 'Start Your Hour of AI', 'hour-of-ai' ),
      'description' => __( 'Bring the foundations of artificial intelligence to your classroom with this free, one-hour activity.', 'hour-of-ai' ),
      'ctaLabel'    => __( 'Access the Activity', 'hour-of-ai' ),
      'ctaUrl'      => '#',
      'imageUrl'    => '',
      'layout'      => 'center',
    ),
  );
}

/**
 * Returns animated Hour of AI logo markup for titles.
 *
 * @return string
 */
function hour_of_ai_slider_logo_markup() {
  return '<span class="hour-ai-logo" aria-label="Hour of AI">'
    . '<span class="hour-ai-logo__word">' . esc_html__( 'Hour of', 'hour-of-ai' ) . '</span>'
    . '<span class="hour-ai-logo__ai">AI</span>'
    . '<span class="hour-ai-logo__beam" aria-hidden="true"></span>'
    . '</span>';
}

/**
 * Inject the Hour of AI logo markup into a string when the phrase is present.
 *
 * @param string $text Source text.
 *
 * @return string
 */
function hour_of_ai_slider_render_title_html( $text ) {
  if ( empty( $text ) ) {
    return '';
  }

  $logo_markup = hour_of_ai_slider_logo_markup();

  if ( preg_match( '/hour of ai/i', $text ) ) {
    $parts = preg_split( '/hour of ai/i', $text, 2 );

    $before = isset( $parts[0] ) ? esc_html( $parts[0] ) : '';
    $after  = isset( $parts[1] ) ? esc_html( $parts[1] ) : '';

    return $before . $logo_markup . $after;
  }

  return esc_html( $text );
}

/**
 * Render callback for the block.
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Inner content (unused).
 *
 * @return string
 */
function hour_of_ai_slider_render_callback( $attributes, $content ) {
  $defaults = array(
    'backgroundColor'   => '#0A1744',
    'textColor'         => '#F2F5FF',
    'accentColor'       => '#6A4DF3',
    'buttonHoverColor'  => '#583BD7',
    'buttonTextColor'   => '#F2F5FF',
    'overlayStrongColor'=> 'rgba(10, 23, 68, 0.92)',
    'overlayAccentColor'=> 'rgba(106, 77, 243, 0.45)',
    'dotColor'          => 'rgba(255, 255, 255, 0.45)',
    'dotActiveColor'    => '#F2F5FF',
  );

  $style_attributes = array();

  foreach ( $defaults as $key => $default_value ) {
    $style_attributes[ $key ] = isset( $attributes[ $key ] ) && '' !== $attributes[ $key ]
      ? $attributes[ $key ]
      : $default_value;
  }

  $style = sprintf(
    '--hour-ai-bg:%1$s;--hour-ai-text:%2$s;--hour-ai-accent:%3$s;--hour-ai-button-hover:%4$s;--hour-ai-button-text:%5$s;--hour-ai-overlay-strong:%6$s;--hour-ai-overlay-accent:%7$s;--hour-ai-dot:%8$s;--hour-ai-dot-active:%9$s;',
    esc_attr( $style_attributes['backgroundColor'] ),
    esc_attr( $style_attributes['textColor'] ),
    esc_attr( $style_attributes['accentColor'] ),
    esc_attr( $style_attributes['buttonHoverColor'] ),
    esc_attr( $style_attributes['buttonTextColor'] ),
    esc_attr( $style_attributes['overlayStrongColor'] ),
    esc_attr( $style_attributes['overlayAccentColor'] ),
    esc_attr( $style_attributes['dotColor'] ),
    esc_attr( $style_attributes['dotActiveColor'] )
  );

  $wrapper_attributes = get_block_wrapper_attributes(
    array(
      'class' => 'hour-ai-slider',
      'style' => $style,
    )
  );

  $slides = isset( $attributes['slides'] ) && is_array( $attributes['slides'] ) ? $attributes['slides'] : array();

  $defaults      = hour_of_ai_slider_default_slides();
  $merged_slides = array();

  foreach ( $defaults as $index => $default_slide ) {
    $user_slide      = isset( $slides[ $index ] ) && is_array( $slides[ $index ] ) ? $slides[ $index ] : array();
    $merged_slides[] = array_merge( $default_slide, array_filter( $user_slide ) );
  }

  $nav_buttons   = '';
  $slides_markup = '';

  foreach ( $merged_slides as $index => $slide ) {
    $has_image = ! empty( $slide['imageUrl'] );
    $image     = $has_image ? sprintf( '<img src="%s" alt="" class="hour-ai-slide__image" loading="lazy" />', esc_url( $slide['imageUrl'] ) ) : '';

    $cta = ! empty( $slide['ctaLabel'] ) ? sprintf(
      '<a class="hour-ai-button" href="%1$s">%2$s</a>',
      esc_url( $slide['ctaUrl'] ),
      esc_html( $slide['ctaLabel'] )
    ) : '';

    $layout_class = 'layout-' . ( ! empty( $slide['layout'] ) ? sanitize_html_class( $slide['layout'] ) : 'image-left' );

    $slides_markup .= sprintf(
      '<div class="hour-ai-slide %6$s" data-index="%1$d">'
        . '<div class="hour-ai-slide__bg">%2$s<div class="hour-ai-slide__overlay"></div></div>'
        . '<div class="hour-ai-slide__inner">'
          . '<div class="hour-ai-slide__copy">'
            . '<h2 class="hour-ai-slide__title">%3$s</h2>'
            . '<p class="hour-ai-slide__description">%4$s</p>'
            . '%5$s'
          . '</div>'
          . '<div class="hour-ai-slide__media">%2$s</div>'
        . '</div>'
      . '</div>',
      absint( $index ),
      $image,
      wp_kses_post( hour_of_ai_slider_render_title_html( $slide['title'] ) ),
      esc_html( $slide['description'] ),
      $cta,
      esc_attr( $layout_class )
    );

    $nav_buttons .= sprintf( '<button class="hour-ai-slider__dot" data-target="%1$d" aria-label="Slide %2$d"></button>', absint( $index ), absint( $index ) + 1 );
  }

  $output  = '<div ' . $wrapper_attributes . '>';
  $output .= '<div class="hour-ai-slider__track">' . $slides_markup . '</div>';
  $output .= '<div class="hour-ai-slider__dots" role="tablist">' . $nav_buttons . '</div>';
  $output .= '</div>';

  return $output;
}
