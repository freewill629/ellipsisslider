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
 * Render callback for the block.
 *
 * @param array  $attributes Block attributes.
 * @param string $content    Inner content (unused).
 *
 * @return string
 */
function hour_of_ai_slider_render_callback( $attributes, $content ) {
  $wrapper_attributes = get_block_wrapper_attributes( array( 'class' => 'hour-ai-slider' ) );

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
      esc_html( $slide['title'] ),
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
