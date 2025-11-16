<?php
    /**
     * Blockquote Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    $id = 'acf-header-' . $block['id'];
    // echo '<pre>';print_r($block); exit;  
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-header';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $acf_header_title = get_field( 'acf_header_title' ); 
    $acf_header_background_color = get_field( 'acf_header_background_color' );
    $acf_header_text_color = get_field( 'acf_header_text_color' ); 

?> 