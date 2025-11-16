<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Codelicious
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function codelicious_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'codelicious_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function codelicious_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'codelicious_pingback_header');



function defaults_cpt()
{

    register_post_type(
        'defaults',

        array(
            'labels' => array(
                'name' => __('Templates'),
                'singular_name' => __('Template')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-media-document',
        )
    );
}

add_action('init', 'defaults_cpt');

function defaults_cpt1()
{

    register_post_type(
        'team',

        array(
            'labels' => array(
                'name' => __('Team'),
                'singular_name' => __('Team')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-media-document',

        )
    );
}

add_action('init', 'defaults_cpt1');
