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
    
    $id = 'acf-testimonials-' . $block['id'];   
    // echo '<pre>';print_r($block); exit; 

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-testimonials';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $background_color = get_field('acf_testimonials_background_color');
    $acf_testimonials_title = get_field('acf_testimonials_title'); 
    $acf_testimonials_select_post_type = get_field('acf_testimonials_select_post_type'); 
      
    // include file with color variables
    //include( get_template_directory() . '/template-parts/components/color-variables.php' );
    set_query_var( 'default_color', '#000' );

    // set query variables for passing to template parts
    set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

    // block preview
    if ( !empty( $block['data']['__is_preview'] ) ): ?>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
    <?php return; endif;?> 

  <section class="testimonial-slider" style="background-color: <?php echo $background_color; ?>">
    <div class="container">
      <div class="testimonial-slider__heading">
        <h2 class=""><?php echo $acf_testimonials_title; ?></h2>
      </div>
      <div class="testimonial-slider__row">
        <div class="testimonial-block">
              <?php   
                    foreach($acf_testimonials_select_post_type as $post_id) {    
                    $post = get_post($post_id);  
                    setup_postdata($post);  
                    $img_url = get_the_post_thumbnail_url(($post->ID), 'full'); 
             ?> 
                    <div class="testimonial-block__column">
                      <div class="testimonial-block__client_info">
                        
                        <?php if(isset($img_url) && !empty($img_url)) : ?>
                        <img src="<?php echo $img_url; ?>">
                        <?php else : ?>
                        
                          <img src="<?php echo get_template_directory_uri() ?>/assets/images/default-thumnail.jpg">
                        <?php endif; ?>
                        <h6 class="Client-name"><?php echo get_the_title($post->ID); ?></h6>
                        <span class="client-designation"><?php echo get_field('acf_tpt_client_designation', $post->ID); ?></span>
                        <?php echo get_field('acf_tpt_description', $post->ID); ?>
                      </div>
                      <div class="pattrn-box"></div>
                      <div class="quote-image">
                      <img src="<?php echo get_template_directory_uri() ?>/assets/images/quote.png">
                      </div>
                    </div>
          <?php }  wp_reset_postdata(); ?>
         
        </div>
      </div>
    </div>
  </section>