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

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-with-image.png" style="max-width: 100%; height: auto;" />
  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-with-bgcolor.png" style="max-width: 100%; height: auto;" />
<?php return;
endif;



// Load values and assing defaults.
// print '<pre>';
//print_r($block['id']);
// exit;

$acf_select_to_hw_background_option = get_field('acf_select_to_hw_background_option');

$acf_hw_background_image = get_field('acf_hw_background_image'); 

$acf_hw_background_color = get_field('acf_hw_background_color'); 

$acf_hw_header = get_field('acf_hw_header'); 

$acf_hw_subline = get_field('acf_hw_subline'); 

$acf_hw_font_color = get_field('acf_hw_font_color'); 

$acf_hw_content = get_field('acf_hw_content'); 

$acf_hw_button_option = get_field('acf_hw_button_option'); 

$acf_hw_button_one = get_field('acf_hw_button_one'); 

$acf_hw_select_button_color = get_field('acf_hw_select_button_color'); 

$acf_hw_select_button_style = get_field('acf_hw_select_button_style'); 

$acf_hw_button_two = get_field('acf_hw_button_two'); 

$acf_hw_select_button_color_two = get_field('acf_hw_select_button_color_two'); 


$acf_hw_select_button_style_two = get_field('acf_hw_select_button_style_two'); 


$acf_hw_display_post = get_field('acf_hw_display_post');


// print_r($acf_hwt_post_alignment); exit; 

$acf_hw_select_post_type = get_field('acf_hw_select_post_type');

$acf_hw_select_style = get_field('acf_hw_select_style');  

$acf_hw_select_style_two = get_field('acf_hw_select_style_two'); 

// echo '<pre>'; print_r($acf_hw_select_style); exit; 


if ($acf_select_to_hw_background_option == 'color') { 
  $bg_option = 'background-color:' . $acf_hw_background_color;
} elseif ($acf_select_to_hw_background_option == 'image') {
  $bg_option = "background-image: url(" . $acf_hw_background_image . ")";
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



  <section class="hero-winner <?php echo $acf_select_to_hw_background_option == 'color' ? 'hero-winner--bgcolor' : '' ?>">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 p-0">
          <div class="hero-winner__content">
          <?php if(!empty($acf_hw_header)) :?>
            <h1 class="hero-winner__heading">
              <?php echo $acf_hw_header; ?>
            </h1>
            <?php endif; ?>
            <?php if(!empty($acf_hw_subline)) :?>
              <p> <?php echo $acf_hw_subline; ?> </p>
            <?php endif; ?>

            <?php if($acf_hw_button_option == 'one') { ?>
            <div class="hero-winner__btn-group">
              <a href="<?php echo $acf_hw_button_one['url']; ?> " class="<?php echo $acf_hw_select_button_color;?> <?php echo $acf_hw_select_button_color;?>--<?php echo $acf_hw_select_button_style; ?> <?php echo $acf_hw_select_button_color;?>--medium-small"> 
              <?php echo $acf_hw_button_one['title']; ?> </a>
            </div>
            <?php }?>

            <?php if($acf_hw_button_option == 'two') { ?>
            <div class="hero-winner__btn-group">
              <a href="<?php echo $acf_hw_button_one['url']; ?> " class="<?php echo $acf_hw_select_button_color;?>  <?php echo $acf_hw_select_button_color;?>--<?php echo $acf_hw_select_button_style; ?> <?php echo $acf_hw_select_button_color;?>--medium-small" > <?php echo $acf_hw_button_one['title']; ?> </a>
              <a href="<?php echo $acf_hw_button_two['url']; ?> " class="<?php echo $acf_hw_select_button_color_two; ?> <?php echo $acf_hw_select_button_color_two; ?>--<?php echo $acf_hw_select_button_style_two; ?> <?php echo $acf_hw_select_button_color_two; ?>--medium-small" > <?php echo $acf_hw_button_two['title']; ?> </a>
            </div>
            <?php }?>

          </div>
        </div>
        <div class="col-lg-6 p-0">
          <div class="hero-winner__bgimage" style="<?php echo $bg_option; ?>">
           <?php if($acf_hw_display_post == 'yes'): ?>
            <div class="testimonial">
            <?php    
                  if ($acf_hw_select_post_type) : foreach ($acf_hw_select_post_type as $post_id) : 
                    $post = get_post($post_id);  
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
                
                <div class="quote-image">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/quote.png">
                </div>
              </div>
              <?php  endforeach; endif; ?>

            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

