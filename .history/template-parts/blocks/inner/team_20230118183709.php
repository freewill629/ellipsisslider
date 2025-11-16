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
    $id = 'acf-team-' . $block['id'];
    // echo '<pre>';print_r($id); exit;  
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-team';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $acf_team_title = get_field( 'acf_team_title' ); 
    $acf_team_post_block = get_field( 'acf_team_post_block' );
    $acf_team_image = get_field( 'acf_team_image' ); 
    $acf_team_name = get_field( 'acf_team_name' ); 
    $acf_team_title = get_field( 'acf_team_title' );
    $acf_team_link = get_field( 'acf_team_link' ); 
    $acf_team_department = get_field( 'acf_team_department' );  

?> 