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
    
    $id = 'acf-hubspot-form-' . $block['id'];   
//    echo '<pre>'; print_r($block); exit;  

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-hubspot-form';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $hubspot_form_title = get_field('acf_hubspot_form_title');
    $hubspot_form_sub_title = get_field('acf_hubspot_form_sub_title');
    $hubspot_form_description = get_field('acf_hubspot_form_description');
    $hubspot_form = get_field('acf_hubspot_form');  


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
