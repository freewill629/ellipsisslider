<?php
/**
 * Plugin Name: Interactive Banner Slider Block
 * Description: Adds a Gutenberg block for a multi-slide banner slider inspired by the Hour of AI design.
 * Version: 1.0.0
 * Author: Ellipsis Education
 * License: GPL-2.0-or-later
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

require_once __DIR__ . '/render.php';

/**
 * Register the block using metadata loaded from block.json.
 */
function ellipsis_interactive_banner_register_block() {
  register_block_type(
    __DIR__,
    array(
      'render_callback' => 'ellipsis_interactive_banner_render_callback',
    )
  );
}
add_action( 'init', 'ellipsis_interactive_banner_register_block' );
