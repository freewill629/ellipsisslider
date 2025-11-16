<?php

/**
 *   Crunch ACF Blocks
 *
 *   @package Crunch
 *   @since 5.0.0
 */

add_action('acf/init', 'crunch_acf_inner_blocks');

function crunch_acf_inner_blocks()
{

    /**
     * Check function exists
     */

    if (function_exists('acf_register_block_type')) {

        /* ~~~~~~~~~~ Multiple Images block ~~~~~~~~~~ */

        $name = "Multiple Images";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                //  $block_styles_uri = 'dist/acf_block_post_sidebar.css';
                //  $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                //  wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'media-spreadsheet',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'inner-blocks',
            'keywords'          => array('image', 'multiple'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ News block ~~~~~~~~~~ */

        $name = "News";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                //  $block_styles_uri = 'dist/acf_block_post_sidebar.css';
                //  $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                //  wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'media-spreadsheet',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'inner-blocks',
            'keywords'          => array('news', 'multiple'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Header block ~~~~~~~~~~ */

        $name = "Header";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                //  $block_styles_uri = 'dist/acf_block_post_sidebar.css';
                //  $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                //  wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'media-spreadsheet',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'inner-blocks',
            'keywords'          => array('news', 'multiple'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Header block ~~~~~~~~~~ */

        $name = "Header";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                //  $block_styles_uri = 'dist/acf_block_post_sidebar.css';
                //  $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                //  wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'media-spreadsheet',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'inner-blocks',
            'keywords'          => array('news', 'multiple'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Center Content with Nav Links block ~~~~~~~~~~ */

        $name = "Center Content with Nav Links";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                $block_styles_uri = 'dist/acf_center_content_with_nav_links.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf_center_content_with_nav_links_styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'media-spreadsheet',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'inner-blocks',
            'keywords'          => array('news', 'multiple'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Team block ~~~~~~~~~~ */

        $name = "Team";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                //  $block_styles_uri = 'dist/acf_block_post_sidebar.css';
                //  $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                //  wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'media-spreadsheet',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'inner-blocks',
            'keywords'          => array('news', 'multiple'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Media Centered block ~~~~~~~~~~ */

        $name = "Media Centered";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                //  $block_styles_uri = 'dist/acf_block_post_sidebar.css';
                //  $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                //  wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'media-spreadsheet',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'inner-blocks',
            'keywords'          => array('news', 'multiple'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Featured Post block ~~~~~~~~~~ */

        $name = "Featured Post";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                //  $block_styles_uri = 'dist/acf_block_post_sidebar.css';
                //  $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                //  wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'media-spreadsheet',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'inner-blocks',
            'keywords'          => array('featured', 'post', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));
        /* ~~~~~~~~~~ Featured Post block ~~~~~~~~~~ */

        $name = "Featured Post";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                //  $block_styles_uri = 'dist/acf_block_post_sidebar.css';
                //  $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                //  wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'media-spreadsheet',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'inner-blocks',
            'keywords'          => array('featured', 'post', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Related Links block ~~~~~~~~~~ */

        $name = "Related Links";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                //  $block_styles_uri = 'dist/acf_block_post_sidebar.css';
                //  $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                //  wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'media-spreadsheet',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'inner-blocks',
            'keywords'          => array('featured', 'post', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~ Notification Bar block ~~~~~~~~~ */ 

                    $name = "Notification Bar";
                    $slug = create_slug($name);
   
                    acf_register_block_type(array(
                        'name'              => $slug,
                        'title'             => __($name),
                        'description'       => __('Custom '.$name.' Block.'),
                        'render_template'   => get_template_directory() . '/template-parts/blocks/inner/'.$slug.'.php',
                        'enqueue_assets'    => function() {
   
                            / ~~~~ Styles ~~~~ /
   
                               //  $block_styles_uri = 'dist/acf_block_post_sidebar.css';
                               //  $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));
   
                               //  wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);
   
                            / ~~~~ Scripts ~~~~ /
   
                               //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                               //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));
   
                               //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);
   
                        },
                        'icon'              => 'media-spreadsheet',
                        'mode'              => 'edit',
                        'supports'          => array( 'align' => false ),
                        'category'          => 'inner-blocks',
                        'keywords'          => array('featured', 'post','text'),
                        'example'  => array(
                            'attributes' => array(
                                'mode' => 'preview',
                                'data' => array(
                                    '__is_preview' => true
                                )
                            )
                        )
                    ));
    }
}
