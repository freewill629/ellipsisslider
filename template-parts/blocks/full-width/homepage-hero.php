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
    
    $id = 'acf-block-homepage-hero-' . $block['id'];  
    

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-block-homepage-hero';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $has_bottom_border = get_field('acf_block_homepage_hero_bottom_border');
    $subtitle = get_field('acf_block_homepage_hero_subtitle');
    $title = get_field('acf_block_homepage_hero_title');
    $description = get_field('acf_block_homepage_hero_description');
    $image_stick_to_edge = get_field('is_image_stick_to_edge');
    $hero_light_image = get_field('acf_block_homepage_hero_hero_light_image');
    $hero_dark_image = get_field('acf_block_homepage_hero_hero_dark_image');

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

<div id="<?= esc_attr($id); ?>" class="<?= esc_attr($class_name); ?> <?= ($has_bottom_border ? 'border-bottom section-separator-color' : '') ?> 
<?= ($default_color) ? 'bg-section-color"' : '" style="background-color: '.$background_color.'"' ?> data-aos="fade-in">
    <div class="container c-py-8">
        <div class="acf-block-homepage-hero__wrapper row align-items-center">
            <div class="col-md-6 order-2 order-md-1">
                <?php if ($subtitle): ?>
                    <span class="d-block font-weight-medium font-size-18 text-primary letter-spacing--50"><?= esc_html($subtitle); ?></span>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h1 class="letter-spacing--100 c-mt-4 <?= ($default_color) ? 'header-color"' : '" style="color: '.$header_text_color.'"' ?>>
                        <?= esc_html($title); ?>
                    </h1>
                <?php endif; ?>

                <?php if ($description): ?>
                    <div class="entry-content font-size-18 c-py-4 <?= ($default_color) ? 'body-color"' : '" style="color: '.$body_text_color.'"' ?>>
                        <?= $description; ?>
                    </div>
                <?php endif; ?>

                <?php //get_template_part( 'template-parts/components/block-buttons' ); ?>
            </div>
            <div class="col-md-6 text-center c-my-5 c-my-md-0 order-1 order-md-2">
                <?php if ($hero_light_image || $hero_dark_image): ?>
                    <?= wp_get_attachment_image( 1223, 'homepage-hero-section-image', "", array( "class" => esc_attr( $class_name )." ".($image_stick_to_edge ? 'acf-block-homepage-hero__image' : 'acf-block-homepage-hero__image mw-100 h-auto')." img-color-version h-auto object-fit-cover", "data-src-light-theme" => $hero_light_image['url'], "data-src-dark-theme" => $hero_dark_image['url'] ) ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
