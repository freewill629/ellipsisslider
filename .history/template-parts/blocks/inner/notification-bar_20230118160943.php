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
    $id = 'acf-notification-bar-' . $block['id'];
    // echo '<pre>';print_r($block); exit;  
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-notification-bar';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $acf_background_image = get_field( 'acf_background_image' ); 
    $acf_title = get_field( 'acf_title' );
    $acf_message = get_field( 'acf_message' ); 
    $acf_notification_bar_block = get_field( 'acf_notification_bar_block' ); 
    $acf_social_icon = get_field( 'acf_social_icon' );  

?> 