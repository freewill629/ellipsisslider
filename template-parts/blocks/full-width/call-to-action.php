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
    
    $id = 'acf-call-to-action-' . $block['id'];   
    // echo '<pre>';print_r($block); exit;  

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-call-to-action'; 
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $background_option = get_field('acf_cta_background_option');
    // print_r($background_option); exit; 
    $cta_background_image = get_field('acf_cta_background_image');
    $cta_background_color = get_field('acf_cta_background_color');
    $cta_title = get_field('acf_cta_title');
    $cta_description = get_field('acf_cta_description');
    $cta_repeater = get_field('acf_cta_repeater');
    $acf_cta_button = get_field('acf_cta_button');  

    // include file with color variables
    //include( get_template_directory() . '/template-parts/components/color-variables.php' );
    set_query_var( 'default_color', '#000' );

    // set query variables for passing to template parts
    set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

    // block preview
    if ( !empty( $block['data']['__is_preview'] ) ): ?>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
    <?php return; endif;

if ($background_option == 'image') {
    $bg_option = "background-image: url(" . $cta_background_image . ")";   
} elseif ($background_option == 'color') {
    $bg_option = 'background-color:' . $cta_background_color; 
} 
?> 

<section class="cta-module" style="<?php echo $bg_option; ?>">
    <div class="page-container box-padding">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-9">
          <div class="cta-module__content">
            <?php if(!empty($cta_title)) :?>
                <h2><?php echo $cta_title ; ?></h2>
            <?php endif; ?>  
            <?php if(!empty($cta_description)) :?>
                <?php echo $cta_description; ?>
            <?php endif; ?>     
          </div>
          <div class="cta-module__btns">
            <?php if($cta_repeater) : foreach($cta_repeater as $button) :?>
              <a href="<?php echo $button['acf_cta_button']['url']; ?>" 
              class="<?php echo $button['acf_cta_select_button_color'];?> <?php echo $button['acf_cta_select_button_color'];?>--<?php echo $button['acf_cta_select_button_style']; ?> <?php echo $button['acf_cta_select_button_color'];?>--medium-small"> 
              <?php echo $button['acf_cta_button']['title']; ?> </a>
            <?php endforeach; endif; ?> 
          </div>
        </div>
      </div>
    </div>
  </section>
