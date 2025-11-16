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

                $block_styles_uri = 'dist/acf_multiple_images.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('multiple-images-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'images-alt2',
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

                $block_styles_uri = 'dist/acf_news.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf_news_styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'admin-site',
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

                $block_styles_uri = 'dist/acf_header.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf_header_styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'dashicons-products',
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

        $name = "CTA with Nav Links";
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

                $block_styles_uri = 'dist/acf_team.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf_team_styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'groups',
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
            'icon'              => 'video-alt3',
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

                $block_styles_uri = 'dist/acf_featured_post.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

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

                $block_styles_uri = 'dist/acf_related_links.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-related-links-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                /* ~~~~~ Scripts ~~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'admin-links',
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
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~ Styles ~~~~ */

                $block_styles_uri = 'dist/acf_notification_bar.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                /* ~~~~ Scripts ~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'format-status',
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

        /**
         * Register spacer block
         */

        //     $name = "Spacer";
        //     $slug = create_slug($name);

        //     acf_register_block_type(array(
        //     'name'              => $slug,
        //     'title'             => __($name),
        //     'description'       => __('Custom ' . $name . ' Block.'),
        //     'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
        //     'enqueue_assets'    => function () {

        //     /* ~~~~ Styles ~~~~ */

        //     // $block_styles_uri = 'dist/acf_notification_bar.css';
        //     // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

        //     // wp_enqueue_style('acf-block-post-sidebar-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

        //     /* ~~~~ Scripts ~~~~ */

        //     //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
        //     //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

        //     //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

        //     },
        //     'icon'              => 'media-spreadsheet',
        //     'mode'              => 'edit',
        //     'supports'          => array('align' => false),
        //     'category'          => 'inner-blocks',
        //     'keywords'          => array('featured', 'post', 'text'),
        //     'example'  => array(
        //         'attributes' => array(
        //             'mode' => 'preview',
        //             'data' => array(
        //                 '__is_preview' => true
        //             )
        //         )
        //     )
        // )); 

        /**
         * Register Navigation Link block
         */

        $name = "Navigation Link";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~ Styles ~~~~ */

                $block_styles_uri = 'dist/acf_navigation_link.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-navigation-link-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                /* ~~~~ Scripts ~~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'admin-links',
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

        /**
         * Register Quotes block
         */

        $name = "Blockquote";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /*~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_blockquotes.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-acf_blockquotes-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                /* ~~~ Scripts ~~~ */

                //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'editor-quote',
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

        /**
         * Register Post Sidebar
         */

        $name = "Post Sidebar";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_posts_sidebar.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-post-sidebar-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'welcome-widgets-menus',
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


        /** * Register Image with Text */

        $name = "Image with Text";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_image_with_text.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('image-with-text-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

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

        /** * Related Articles */

        $name = "Related Articles";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_related_articles.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-related_articles-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

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

        /** * Social Media */

        $name = "Social Media";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_social_media.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-acf_social_media-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

            },
            'icon'              => 'share',
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

        /** * Blog Posts */

        $name = "Blog Posts";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_default_article.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-default_article-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

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

        /** * Blog Innerpage */

        $name = "Blog Innerpage";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_blog_innerpage.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-blog_innerpage-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

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

        /** * Single Button */

        $name = "Single Button";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_blog_innerpage.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-blog_innerpage-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

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


        /** * Custom Post Blocks */

        $name = "Custom Post Blocks";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_custom_post_blocks.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf-custom_post_blocks-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

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

        
        /** * Site Navigator Box */

        $name = "Site Navigator Box";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_site_navigator_box.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf_site_navigator_box-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

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

        /** * Texas-Resources-Slider */

        $name = "Texas Resources Slider";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_texas_resources_slider.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf_texas_resources_slider-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

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

        /** * Mid-CTA */

        $name = "Mid CTA";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/inner/' . $slug . '.php',
            'enqueue_assets'    => function () {

                // /* ~~~ Styles ~~~ */

                $block_styles_uri = 'dist/acf_mid_cta.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('acf_mi_cta-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);

                // /* ~~~ Scripts ~~~ */

                // //  $block_scripts_uri = 'dist/acf_block_post_sidebar.bundle.js';
                // //  $block_scripts_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_scripts_uri));

                // //  wp_enqueue_script('acf-block-post-sidebar-scripts', get_template_directory_uri().'/'.$block_scripts_uri, array('jquery'), $block_scripts_ver, true);

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
    }
}