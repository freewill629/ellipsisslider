<?php
/**
 * Plugin Name: Hour of AI Hero Slider Block
 * Description: Adds a Gutenberg block for the Hour of AI hero slider with EllipsisEducation branding.
 * Version: 1.0.0
 * Author: Maxlead
 * Author URI: https://maxlead.in
 * License: GPL-2.0-or-later
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

require_once __DIR__ . '/render.php';

/**
 * Registers the block using metadata loaded from the `block.json` file.
 */
function hour_of_ai_slider_register_block() {
  register_block_type(
    __DIR__,
    array(
      'render_callback' => 'hour_of_ai_slider_render_callback',
    )
  );
}
add_action( 'init', 'hour_of_ai_slider_register_block' );
