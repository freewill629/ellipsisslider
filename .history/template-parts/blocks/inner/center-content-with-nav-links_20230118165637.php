<?php
    /**
     * Homepage Hero Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    
    $id = 'acf-center-content-with-nav-links-' . $block['id'];   
    // print_r($block); exit; 
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-center-content-with-nav-links';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $acf_center_content_with_links_title = get_field('acf_center_content_with_links_title');
    $acf_center_content_with_links_description = get_field('acf_center_content_with_links_description');
    $acf_center_content_with_links = get_field('acf_center_content_with_links');
    $acf_center_content_nav_links = get_field('acf_center_content_nav_links'); 


    // include file with color variables
    //include( get_template_directory() . '/template-parts/components/color-variables.php' );
    set_query_var( 'default_color', '#000' );

    // set query variables for passing to template parts
    set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

    // block preview
    if ( !empty( $block['data']['__is_preview'] ) ): ?>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg" />
    <?php return; endif;
?>
