<?php
/**
 * Server-side render for the Hour of AI slider block.
 */

if ( ! defined( 'ABSPATH' ) ) {
 exit;
}

/**
 * Safely return a color value with fallback.
 *
 * @param string $value    User provided color.
 * @param string $fallback Default color.
 *
 * @return string
 */
function hour_of_ai_slider_color_value( $value, $fallback ) {
  $sanitized = sanitize_text_field( $value );

  return $sanitized ? $sanitized : $fallback;
}

/**
 * Returns default slide data so the block always renders safely.
 *
 * @return array[]
 */
function hour_of_ai_slider_default_slides() {
  return array(
    array(
      'title'       => __( 'The <span class="hour-ai-logo-text shimmer-text">Hour of AI</span> is here', 'hour-of-ai' ),
      'description' => __( 'A global movement to make AI education accessible, engaging, and inspiring for every learner.', 'hour-of-ai' ),
      'ctaLabel'    => __( 'Explore the Activity', 'hour-of-ai' ),
      'ctaUrl'      => '#',
      'imageUrl'    => '',
      'layout'      => 'image-right',
    ),
    array(
      'title'       => __( 'Meet the Artificial Neuron', 'hour-of-ai' ),
      'description' => __( 'This lesson introduces the building blocks of AI through a fun beach decision model.', 'hour-of-ai' ),
      'ctaLabel'    => __( 'Explore the Activity', 'hour-of-ai' ),
      'ctaUrl'      => '#',
      'imageUrl'    => '',
      'layout'      => 'image-right',
    ),
    array(
      'title'       => __( 'What Students Will Learn', 'hour-of-ai' ),
      'description' => __( 'Key takeaways that cover neurons, inputs, weights, bias, and experimentation.', 'hour-of-ai' ),
      'ctaLabel'    => __( 'Access the Activity', 'hour-of-ai' ),
      'ctaUrl'      => '#',
      'imageUrl'    => '',
      'layout'      => 'image-right',
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
 * Render callback for the block.
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Inner content (unused).
 *
 * @return string
 */
function hour_of_ai_slider_render_callback( $attributes, $content ) {
  $defaults = array(
    'backgroundColor'  => '#f6f7fb',
    'headingColor'     => '#0f172a',
    'bodyColor'        => '#1f2a44',
    'buttonBackground' => '#4f46e5',
    'buttonTextColor'  => '#ffffff',
    'dotColor'         => '#cdd5f1',
    'dotActiveColor'   => '#6b8bff',
    'accentFrom'       => '#6c5ce7',
    'accentMid'        => '#4f46e5',
    'accentTo'         => '#22d3ee',
    'slideSpeed'       => 9000,
  );

  $design = wp_parse_args( $attributes, $defaults );
  $speed  = isset( $design['slideSpeed'] ) ? absint( $design['slideSpeed'] ) : $defaults['slideSpeed'];
  $speed  = $speed ? $speed : $defaults['slideSpeed'];

  $style = sprintf(
    '--hour-ai-surface:%1$s;--hour-ai-heading:%2$s;--hour-ai-body:%3$s;--hour-ai-button-bg:%4$s;--hour-ai-button-text:%5$s;--hour-ai-dot:%6$s;--hour-ai-dot-active:%7$s;--hour-ai-accent-from:%8$s;--hour-ai-accent-mid:%9$s;--hour-ai-accent-to:%10$s;',
    esc_attr( hour_of_ai_slider_color_value( $design['backgroundColor'], $defaults['backgroundColor'] ) ),
    esc_attr( hour_of_ai_slider_color_value( $design['headingColor'], $defaults['headingColor'] ) ),
    esc_attr( hour_of_ai_slider_color_value( $design['bodyColor'], $defaults['bodyColor'] ) ),
    esc_attr( hour_of_ai_slider_color_value( $design['buttonBackground'], $defaults['buttonBackground'] ) ),
    esc_attr( hour_of_ai_slider_color_value( $design['buttonTextColor'], $defaults['buttonTextColor'] ) ),
    esc_attr( hour_of_ai_slider_color_value( $design['dotColor'], $defaults['dotColor'] ) ),
    esc_attr( hour_of_ai_slider_color_value( $design['dotActiveColor'], $defaults['dotActiveColor'] ) ),
    esc_attr( hour_of_ai_slider_color_value( $design['accentFrom'], $defaults['accentFrom'] ) ),
    esc_attr( hour_of_ai_slider_color_value( $design['accentMid'], $defaults['accentMid'] ) ),
    esc_attr( hour_of_ai_slider_color_value( $design['accentTo'], $defaults['accentTo'] ) )
  );

  $wrapper_attributes = get_block_wrapper_attributes(
    array(
      'class' => 'hour-ai-slider',
      'style' => $style,
      'data-speed' => $speed,
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
    $image     = $has_image ? sprintf( '<img src="%s" alt="" class="hour-ai-slide__image ken-burns" loading="lazy" />', esc_url( $slide['imageUrl'] ) ) : '';

    $cta = ! empty( $slide['ctaLabel'] ) ? sprintf(
      '<a class="hour-ai-button" href="%1$s">%2$s</a>',
      esc_url( $slide['ctaUrl'] ),
      wp_kses_post( $slide['ctaLabel'] )
    ) : '';

    $layout_class = 'layout-' . ( ! empty( $slide['layout'] ) ? sanitize_html_class( $slide['layout'] ) : 'image-right' );

    $media = $has_image ? sprintf(
      '<div class="hour-ai-slide__media">'
        . '<div class="hour-ai-slide__media-frame">%1$s</div>'
      . '</div>',
      $image
    ) : '';

    $slides_markup .= sprintf(
      '<div class="hour-ai-slide %6$s" data-index="%1$d">'
        . '<div class="hour-ai-slide__inner">'
          . '<div class="hour-ai-slide__copy">'
            . '<h1 class="hour-ai-slide__title">%3$s</h1>'
            . '<p class="hour-ai-slide__description">%4$s</p>'
            . '%5$s'
          . '</div>'
          . '%2$s'
        . '</div>'
      . '</div>',
      absint( $index ),
      $media,
      wp_kses( $slide['title'], array( 'span' => array( 'class' => array(), 'style' => array() ), 'br' => array(), 'strong' => array(), 'em' => array() ) ),
      wp_kses_post( $slide['description'] ),
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
