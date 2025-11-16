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



$id = 'acf-hero-with-testimonial-' . $block['id'];

// print_r($id); exit;  



if (!empty($block['anchor'])) {

  $id = $block['anchor'];

}



// Create class attribute allowing for custom "className" values.

$class_name = 'acf-hero-with-testimonial';

if (!empty($block['className'])) {

  $class_name .= ' ' . $block['className'];

}
// Load values and assing defaults.

$acf_select_to_hwt_background_option = get_field('acf_select_to_hwt_background_option');

$acf_hwt_background_image = get_field('acf_hwt_background_image'); 

$acf_hwt_background_color = get_field('acf_hwt_background_color'); 

$acf_hwt_header = get_field('acf_hwt_header'); 

$acf_hwt_subline = get_field('acf_hwt_subline'); 

$acf_hwt_font_color = get_field('acf_hwt_font_color'); 

$acf_hwt_content = get_field('acf_hwt_content'); 

$acf_hwt_button_option = get_field('acf_hwt_button_option'); 

$acf_hwt_button_one = get_field('acf_hwt_button_one'); 

$acf_hwt_button_color = get_field('acf_hwt_button_color'); 

$acf_hwt_button_font_color = get_field('acf_hwt_button_font_color'); 

$acf_hwt_button_two = get_field('acf_hwt_button_two'); 

$acf_hwt_button_color_two = get_field('acf_hwt_button_color_two'); 


$acf_hwt_button_font_color_two = get_field('acf_hwt_button_font_color_two'); 


$acf_hwt_display_post = get_field('acf_hwt_display_post');

$acf_hwt_post_alignment = get_field('acf_hwt_post_alignment'); 

// print_r($acf_hwt_post_alignment); exit; 

$acf_hwt_select_post_type = get_field('acf_hwt_select_post_type');  


if ($acf_select_to_hwt_background_option == 'color') { 
  $bg_option = 'background-color:' . $acf_hwt_background_color;
} elseif ($acf_select_to_hwt_background_option == 'image') {
  $bg_option = "background-image: url(" . $acf_hwt_background_image . ")";
}


if ($acf_hwt_post_alignment == 'top') {
  $alignment = 'top';
} elseif ($acf_hwt_post_alignment == 'bottom') {

  $alignment = 'end';
} else {

  $alignment = 'center';
}

// block preview

if (!empty($block['data']['__is_preview'])) : ?>

  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />

<?php return;

endif;

?> 
  <section class="hero hero--testimonial" style="<?php echo $bg_option; ?>">
    <div class="container">
      <div class="row justify-content-center align-items-<?php echo $alignment; ?>">
        <div class="col-lg-7">
          <div class="inner_grid">
          <?php if(!empty($acf_hwt_header)) :?>
            <h1 class="hero__heading"> 
            <?php echo $acf_hwt_header; ?>
            </h1>
            <?php endif; ?>
            <?php if(!empty($acf_hwt_subline)) :?>
              <h3 class="hero__subhead">
                <?php echo $acf_hwt_subline; ?>
              </h3>
            <?php endif; ?>

            <?php if($acf_hwt_button_option == 'one') { ?>
            <div class="hero__btn-group">
              <a href="<?php echo $acf_hwt_button_one['url']; ?> " class="whitebtn whitebtn--medium-small" style="background-color:<?php echo $acf_hwt_button_color; ?>; color:<?php echo $acf_hwt_button_font_color; ?>"> <?php echo $acf_hwt_button_one['title']; ?> </a>
            </div>
            <?php }?>

            <?php if($acf_hwt_button_option == 'two') { ?>
            <div class="hero__btn-group">
              <a href="<?php echo $acf_hwt_button_one['url']; ?> " class="whitebtn whitebtn--medium-small" style="background-color:<?php echo $acf_hwt_button_color; ?>; color:<?php echo $acf_hwt_button_font_color; ?>"> <?php echo $acf_hwt_button_one['title']; ?> </a>
              <a href="<?php echo $acf_hwt_button_two['url']; ?> " class="whitebtn transperent-btn whitebtn--medium-small" style="background-color:<?php echo $acf_hwt_button_color_two; ?>; color:<?php echo $acf_hwt_button_font_color_two; ?>"> <?php echo $acf_hwt_button_two['title']; ?> </a>
            </div>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="hero__testimonial">
          <?php if($acf_hwt_display_post == 'yes'): ?>
            <div class="testimonial">
            <?php   
                    if ($acf_hwt_select_post_type) : foreach($acf_hwt_select_post_type as $post_id) {    
                    $post = get_post($post_id);  
                    // echo '<pre>'; print_r($post);   
                    setup_postdata($post);  
                    $img_url = get_the_post_thumbnail_url(($post->ID), 'full'); 
             ?> 
              <div class="testimonial__column">
                <div class="testimonial__client_info">
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
              <?php } endif; wp_reset_postdata(); ?>
             
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>