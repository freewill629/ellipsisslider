<?php

/**
 *   Crunch ACF Blocks
 *
 *   @package Crunch
 *   @since 5.0.0
 */

add_action('acf/init', 'crunch_acf_full_width_blocks');

function crunch_acf_full_width_blocks()
{

    /* ~~~~~~~~~~ Check function exists ~~~~~~~~~~ */

    if (function_exists('acf_register_block_type')) {

        /* ~~~~~~~~~~ Hero Banner block ~~~~~~~~~~ */

        $name = "Hero Banner";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                $block_styles_uri = 'dist/acf_hero_banner.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);
            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('hero', 'home', 'image', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Text with Media block ~~~~~~~~~~ */

        $name = "Text with Media";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                $block_styles_uri = 'dist/acf_text_with_media.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('text_with_media-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);
            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('media', 'home', 'image', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Text with Icons block ~~~~~~~~~~ */

        $name = "Text with Icons";

        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                $block_styles_uri = 'dist/acf_text_with_icons.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                wp_enqueue_style('text_with_icons-styles', get_template_directory_uri() . '/' . $block_styles_uri, false, $block_styles_ver);
            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('media', 'home', 'image', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Four Column  block ~~~~~~~~~~ */

        $name = "Four Column";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                // $block_styles_uri = 'dist/acf_block_homepage_hero.css';
                // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('four', 'home', 'image', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Hero (CTA) Full With block ~~~~~~~~~~ */

        $name = "Hero (CTA) Full With";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                // $block_styles_uri = 'dist/acf_block_homepage_hero.css';
                // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('hero', 'home', 'form', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Hero (CTA) Two Column block ~~~~~~~~~~ */

        $name = "Hero (CTA) Two Column";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                // $block_styles_uri = 'dist/acf_block_homepage_hero.css';
                // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('hero', 'home', 'form', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Center Content with Button block ~~~~~~~~~~ */

        $name = "Center Content with Button";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                // $block_styles_uri = 'dist/acf_block_homepage_hero.css';
                // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('content', 'home', 'button', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Hubspot Form block ~~~~~~~~~~ */

        $name = "Hubspot Form";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                // $block_styles_uri = 'dist/acf_block_homepage_hero.css';
                // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('content', 'home', 'button', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Center Content Module Block ~~~~~~~~~~ */

        $name = "Center Content";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                $block_styles_uri = 'dist/acf_center_content.css';
                $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . '../' . $block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('content', 'home', 'center', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ One Column Block ~~~~~~~~~~ */

        $name = "One Column";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                // $block_styles_uri = 'dist/acf_block_homepage_hero.css';
                // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('content', 'home', 'one', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Three Column Block ~~~~~~~~~~ */

        $name = "Three Column";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                // $block_styles_uri = 'dist/acf_block_homepage_hero.css';
                // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('content', 'home', 'three', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Two Column Block ~~~~~~~~~~ */

        $name = "Two Column";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                // $block_styles_uri = 'dist/acf_block_homepage_hero.css';
                // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('content', 'home', 'two', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Call To Action Block ~~~~~~~~~~ */

        $name = "Call to Action";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                // $block_styles_uri = 'dist/acf_block_homepage_hero.css';
                // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('content', 'home', 'two', 'text'),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        '__is_preview' => true
                    )
                )
            )
        ));

        /* ~~~~~~~~~~ Testimonials Block ~~~~~~~~~~ */

        $name = "Testimonials";
        $slug = create_slug($name);

        acf_register_block_type(array(
            'name'              => $slug,
            'title'             => __($name),
            'description'       => __('Custom ' . $name . ' Block.'),
            'render_template'   => get_template_directory() . '/template-parts/blocks/full-width/' . $slug . '.php',
            'enqueue_assets'    => function () {

                /* ~~~~~ Styles ~~~~~ */

                // $block_styles_uri = 'dist/acf_block_homepage_hero.css';
                // $block_styles_ver = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__).'../'.$block_styles_uri));

                // wp_enqueue_style('homepage-hero-block-styles', get_template_directory_uri().'/'.$block_styles_uri, false, $block_styles_ver);

            },
            'icon'              => 'welcome-widgets-menus',
            'mode'              => 'edit',
            'supports'          => array('align' => false),
            'category'          => 'full-width-blocks',
            'keywords'          => array('content', 'home', 'two', 'text'),
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
