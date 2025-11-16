<?php

/**
 *   Enqueue scripts
 *
 *   @package Crunch
 *   @since 5.1.1
 */


/**
 * Enqueue Crunch Styles and Scripts
 */

if (!function_exists('crunch_enqueue_scripts')) :
    function crunch_enqueue_scripts()
    {


        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css', array(), _S_VERSION);
        wp_enqueue_style('typekit', "https://use.typekit.net/cap2udi.css", array(), _S_VERSION);
        wp_enqueue_style('codelicious-style', get_stylesheet_uri(), array(), _S_VERSION);



        wp_style_add_data('codelicious-style', 'rtl', 'replace');

        $in_footer = apply_filters('crunch_load_js_in_footer', true);

        /**
         * Update WordPress jQuery & jQuery Migrate
         */

        if (!is_admin()) {

            wp_enqueue_script('jquery-min-js', THEME_URL . '/js/jquery-3.4.1.min.js', array(), 1, 1, 1);

            wp_enqueue_script('popper.min.js', THEME_URL . '/js/popper.min.js', array(), 1, 1, 1);

            wp_enqueue_script('bootstrap.min.js', THEME_URL . '/js/bootstrap.min.js', array(), 1, 1, 1);

            wp_enqueue_script('main.js', THEME_URL . 'js/slick.min.js', array(), 1, 1);
        }


        /**
         * Default Page
         */


        /**
         * Styles
         */

        $default_page_styles_uri = 'dist/default_page.css';

        if ((is_page() || is_front_page()) && file_exists(plugin_dir_path(__FILE__) . '../' . $default_page_styles_uri)) {
            $default_page_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $default_page_styles_uri));

            wp_enqueue_style('default-page-styles', get_template_directory_uri() . '/' . $default_page_styles_uri, false, $default_page_styles_ver);
        }


        /**
         * Scripts
         */

        $default_page_scripts_uri = 'dist/default_page.bundle.js';

        if ((is_page() || is_front_page()) && (!is_page_template("page-templates/page-search.php") && !is_page_template('page-templates/thank-you.php')) && file_exists(plugin_dir_path(__FILE__) . '../' . $default_page_styles_uri)) {
            $default_page_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $default_page_scripts_uri));

            wp_enqueue_script('default-page-scripts', get_template_directory_uri() . '/' . $default_page_scripts_uri, '', $default_page_scripts_ver, $in_footer);
        }
    }

    add_action('wp_enqueue_scripts', 'crunch_enqueue_scripts');
endif;
