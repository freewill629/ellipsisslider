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
    
    $id = 'acf-mid-cta-' . $block['id'];   
    // echo '<pre>';print_r($id); exit;  

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-mid-cta'; 
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }
    
    // Load values and assing defaults.
    $background_color = get_field('acf_mic_cta_background_color'); 

    $acf_mid_cta_content = get_field('acf_mid_cta_content'); 
    
    $acf_mid_cta_button = get_field('acf_mid_cta_button');  

    $acf_mid_cta_select_button_color = get_field('acf_mid_cta_select_button_color');

    $acf_mid_cta_select_button_style = get_field('acf_mid_cta_select_button_style'); 
    // echo '<pre>'; print_r($acf_texas_resources_block); exit; 
    
    // include file with color variables
    //include( get_template_directory() . '/template-parts/components/color-variables.php' );
    set_query_var( 'default_color', '#000' );

    // set query variables for passing to template parts
    set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

    // block preview
    if ( !empty( $block['data']['__is_preview'] ) ): ?>
<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png"
    style="max-width: 100%; height: auto;" />
<?php return; endif;

?>

<section class="Mid-page-CTA-with-media-text" style="background-color:#f5f5f5;">
    <div class="page-container box-padding">
        <div class="row justify-content-center align-items-center">
            <div class="Mid-page-CTA" style="background-color: <?php echo $background_color; ?>;">
                <div class="col col-lg-3">
                    <div class="Mid-page-CTA__img-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/final-logo.png" alt="logo">
                        <!-- <div class="Mid_shape"></div> -->
                    </div>

                </div>
                <div class="col-sm-12 col-md-7 col-lg-8">
                    <div class="Mid-page-CTA__descreption-box">
                        <?php echo $acf_mid_cta_content; ?>
                    </div>
                    <div class="Mid-page-CTA__btn">
                        <a href="<?php echo $acf_mid_cta_button['url']; ?> "
                            class="<?php echo $acf_mid_cta_select_button_color;?> <?php echo $acf_mid_cta_select_button_color;?>--<?php echo $acf_mid_cta_select_button_style; ?> <?php echo $acf_mid_cta_select_button_color;?>--medium-small">
                            <?php echo $acf_mid_cta_button['title']; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>