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
    
        $id = 'acf-spacer-' . $block['id'];
        // echo '<pre>';print_r($block); exit;  
        if (!empty($block['anchor'])) {
            $id = $block['anchor'];
        }

        // Create class attribute allowing for custom "className" values.
        $class_name = 'acf-spacer';
        if (!empty($block['className'])) {
            $class_name .= ' ' . $block['className'];
        }
    
    // Load values and assing defaults.
    $title = get_field('acf_related_links_title');
    $acf_related_links_option = get_field('acf_related_links_option');
    // print_r($acf_related_links_option); exit; 
    $acf_choose_post_type = get_field('acf_choose_post_type');
  
    $acf_select_team_post = get_field('acf_select_team_post');  
    $acf_select_course_post = get_field('acf_select_course_post'); 

    $manually_link = get_field('acf_manually_link'); 


    // include file with color variables
    //include( get_template_directory() . '/template-parts/components/color-variables.php' );
    set_query_var( 'default_color', '#000' );

    // set query variables for passing to template parts
    set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

    // block preview
    if (!empty($block['data']['__is_preview'])) : ?>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
    <?php return;
    endif;
?> 



