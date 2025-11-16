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
    
    $id = 'acf-texas-resources-slider-' . $block['id'];   
    // echo '<pre>';print_r($id); exit;  

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-texas-resources-slider'; 
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }
    
    // Load values and assing defaults.
    $acf_trs_title = get_field('acf_trs_title'); 

    $acf_trs_description = get_field('acf_trs_description'); 
    $acf_texas_resources_block = get_field('acf_texas_resources_block'); 
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

<section class="center-content-with-texas-resources-slider">
    <div class="container">
        <div class="row text-align-center justify-content-center align-items-center">
            <div class="col-lg-9">
                <div class="center-content-with-texas-resources-slider__center-module">
                    <h6 class="center-heading">
                        <?php echo $acf_trs_title; ?>
                    </h6>
                    <?php echo $acf_trs_description; ?>
                </div>
            </div>
        </div>
        <div class="texas-resources-slider">
            <?php if($acf_texas_resources_block) : foreach($acf_texas_resources_block as $key => $value) :?>
            <div class="texas-resources-slider__grid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="texas-resources-slider__img-box">
                            <img src="<?php echo $value['acf_trb_image'];?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="texas-resources-slider__text-box">
                            <h2 class="texas-resources-slider__heading"><?php echo $value['acf_trb_title'];?></h3>
                                <?php echo $value['acf_trb_description'];?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>