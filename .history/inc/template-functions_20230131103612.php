<?php

/**
 *   Default template builder
 *
 *   @package Crunch
 *   @since 5.1.1
 */

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key' => 'group_5f1e9925dfb57',
        'title' => 'Custom post type',
        'fields' => array(
            array(
                'key' => 'field_5f1e9974a96ae',
                'label' => 'Select post type',
                'name' => 'post_type',
                'type' => 'post_type_selector',
                'instructions' => 'Select post type to set default template',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'select_type' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'defaults',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
}

function defaults_cpt()
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
            'supports' => ['title', 'page-attributes', 'custom-fields', 'editor', 'thumbnail', 'revisions'],

        )
    );

    //remove_post_type_support('team', 'editor');
}

add_action('init', 'defaults_cpt');

add_filter('default_content', function ($content, $post) {

    $the_query = new WP_Query(
        array(
            'post_type' => 'team'
        )
    );

    if ($the_query->have_posts()) {

        while ($the_query->have_posts()) {
            $the_query->the_post();
            $template = get_post();
            $template_post_type = get_field('post_type', $template->ID);

            if (!empty($post->post_type) && $template_post_type === $post->post_type) {

                $screen = function_exists('get_current_screen') ? get_current_screen() : null;
                $is_block_editor = $screen ? $screen->is_block_editor() : false;

                if ($is_block_editor) {
                    $content = get_the_content($template->ID);
                }
            }
        }

        wp_reset_postdata();
    }

    return $content;
}, 10, 2);
