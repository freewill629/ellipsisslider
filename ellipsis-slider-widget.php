<?php
/**
 * Plugin Name: Ellipsis Slider Elementor Widget
 * Description: Responsive interactive slider widget with fully dynamic content for Elementor.
 * Version: 1.0.0
 * Author: OpenAI Assistant
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Check dependencies and register the widget.
 */
add_action( 'plugins_loaded', function() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', function() {
            echo '<div class="notice notice-warning"><p>Ellipsis Slider Elementor Widget requires Elementor to be installed and activated.</p></div>';
        } );
        return;
    }

    // Register widget assets.
    add_action( 'wp_enqueue_scripts', function() {
        $asset_path = plugin_dir_url( __FILE__ ) . 'assets/';
        wp_register_style( 'ellipsis-slider-style', $asset_path . 'css/ellipsis-slider.css', [], '1.0.0' );
        wp_register_script( 'ellipsis-slider-script', $asset_path . 'js/ellipsis-slider.js', [ 'jquery' ], '1.0.0', true );
    } );

    // Register the widget with Elementor.
    add_action( 'elementor/widgets/register', function( $widgets_manager ) {
        require_once __DIR__ . '/includes/class-ellipsis-slider-widget.php';
        $widgets_manager->register( new \EllipsisSlider\Ellipsis_Slider_Widget() );
    } );
} );
