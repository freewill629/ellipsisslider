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
    
    $id = 'acf-four-column-' . $block['id'];   

      

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-four-column';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $acf_four_column_option = get_field('acf_four_column_option');
    $acf_four_column_colorpiker = get_field('acf_four_column_colorpiker');
    $acf_four_column_icon = get_field('acf_four_column_icon');
    $acf_four_column_title = get_field('acf_four_column_title');
    $acf_four_column_description = get_field('acf_four_column_description');
    $acf_four_column_repeater = get_field('acf_four_column_repeater'); 
    $acf_repeater_image = get_field('acf_repeater_image');
    $acf_repeater_text = get_field('acf_repeater_text');
    $acf_repeater_button = get_field('acf_repeater_button');
    
    





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
