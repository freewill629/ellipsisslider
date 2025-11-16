<?php



/**

 * OUR TEAM Custom Post Type

 *

 * @TeamCPT

 * @package designpickle

 * @category Class

 * @author Ben Leeth

 */



if (!defined('ABSPATH')) {

    header('HTTP/1.0 403 Forbidden');

    exit;
}



class TeamCPT

{



    public function __construct()

    {

        $cpt_labels = [

            'name' => __('Team'),

            'menu_name' => __('Team'),

            'all_items' => __('Team')

        ];

        $cpt_args = [

            'menu_icon' => 'dashicons-groups',

            'supports' => ['title', 'page-attributes', 'custom-fields', 'editor', 'thumbnail', 'revisions'],

            'public' => true,

            'hierarchical' => true,

            'has_archive' => true,

            'rewrite' => [

                'slug'       => 'team',

                'with_front' => false,

            ],

        ];

        $cpt = new CustomPostType('team', $cpt_labels, $cpt_args);



        $tax_1_args = [

            'hierarchical' => true,

            'show_admin_column' => true,

            'label' => 'Categories',

            'singular_label' => 'Team Category',

            'rewrite' => [

                'slug'       => 'team-category',

                'with_front' => false,

            ],

        ];

        $cpt->add_taxonomy('team category', array('ACL'), $tax_1_args);

        $cpt->register_routes();
    }
}



$logos_cpt = new TeamCPT();
