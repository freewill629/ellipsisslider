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

        )
    );

    remove_post_type_support('team', 'editor');
}

add_action('init', 'defaults_cpt');

add_filter('default_content', function ($content, $post) {

    $cpt_labels = [

        'name' => __('Narratives'),

        'menu_name' => __('Narratives'),

        'all_items' => __('Narratives')

    ];

    $cpt_args = [

        'menu_icon' => 'dashicons-groups',

        'supports' => ['title', 'page-attributes', 'custom-fields', 'editor', 'thumbnail', 'revisions'],

        'public' => true,

        'hierarchical' => true,

        'has_archive' => true,

        'rewrite' => [

            'slug'       => 'ewaa-narratives',

            'with_front' => false,

        ],

    ];

    $cpt = new CustomPostType('ewaa-narratives', $cpt_labels, $cpt_args);



    $tax_1_args = [

        'hierarchical' => true,

        'show_admin_column' => true,

        'label' => 'Categories',

        'singular_label' => 'Narratives Category',

        'rewrite' => [

            'slug'       => 'ewaa-narratives-category',

            'with_front' => false,

        ],

    ];

    $cpt->add_taxonomy('category', array('ACL'), $tax_1_args);

    $cpt->register_routes();
}, 10, 2);
