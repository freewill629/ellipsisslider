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
    
    $id = 'acf-center-content-with-button-' . $block['id'];   
    // print_r($id); exit; 
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-center-content-with-button';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $background_color = get_field('acf_background_color'); 
    $heading = get_field('acf_center_content_heading');
    $description = get_field('acf_center_content_description');
    $center_content_button = get_field('acf_center_content_button');
    $center_content_link = get_field('acf_center_content_link'); 


    // include file with color variables
    //include( get_template_directory() . '/template-parts/components/color-variables.php' );
    set_query_var( 'default_color', '#000' );

    // set query variables for passing to template parts
    set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

    // block preview
    if ( !empty( $block['data']['__is_preview'] ) ): ?>
      <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
  <?php return; endif;
?> 

<section class="text-with-media  text-with-media--nomedia" style="background-color: <?php echo $background_color; ?>;">
        <div class="page-container box-padding">
          <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">

            <?php if (!empty($heading)) : ?>
              <h2 class="center-heading  color-black">
                <?php echo $heading; ?>
              </h2> 
              <?php endif; ?>
              <?php if (!empty($description)) : ?>
              <?php echo $description; ?> 
              <?php endif; ?>
            </div>

            <div class="text-with-media__btn">
                <?php if($center_content_button) : foreach($center_content_button as $button) : ?>
                  <?php if (!empty($button['acf_center_content_link']['title'])) : ?>
                    <a href="<?php echo $button['acf_center_content_link']['url']; ?>" 
                    class="<?php echo $button['acf_ccwb_select_button_color'];?> <?php echo $button['acf_ccwb_select_button_color'];?>--<?php echo $button['acf_ccwb_select_button_style']; ?> <?php echo $button['acf_ccwb_select_button_color'];?>--medium-small">
                    <?php echo $button['acf_center_content_link']['title']; ?> </a>
              <?php endif; ?>
              <?php endforeach; endif; ?>  
            </div>
          </div>
        </div>
        </div> 
</section>
