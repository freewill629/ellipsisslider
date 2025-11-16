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



$id = 'acf-hero-banner-' . $block['id'];





if (!empty($block['anchor'])) {

  $id = $block['anchor'];
}



// Create class attribute allowing for custom "className" values.

$class_name = 'acf-hero-banner';

if (!empty($block['className'])) {

  $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.

$acf_select_to_background_option = get_field('acf_select_to_background_option');

$background_image = get_field('acf_hero_banner_background_image');

$acf_hero_banner_background_color = get_field('acf_hero_banner_background_color');

$hero_banner_alignment_option = get_field('acf_hero_banner_alignment_option');

$banner_header = get_field('acf_hero_banner_header');

$banner_subline = get_field('acf_hero_banner_subline');

$acf_hb_content = get_field('acf_hb_content');

$hero_banner_button_option = get_field('acf_hero_banner_button_option');

$hero_banner_button_one = get_field('acf_hero_banner_button_one');

$acf_hero_banner_button_one_select_style = get_field('acf_hero_banner_button_one_select_style');

$acf_hero_banner_button_select_button_color = get_field('acf_hero_banner_button_select_button_color');

$acf_hero_banner_button_select_button_style = get_field('acf_hero_banner_button_select_button_style');

$acf_hero_banner_button_two = get_field('acf_hero_banner_button_two');

$acf_hero_banner_button_select_button_color_two = get_field('acf_hero_banner_button_select_button_color_two');  

$acf_hero_banner_button_select_button_style_two = get_field('acf_hero_banner_button_select_button_style_two');  

$font_color = get_field('acf_hero_banner_font_color');

$heading_color = get_field('acf_hero_banner_heading_color'); 


set_query_var('default_color', '#000');

// set query variables for passing to template parts

set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview

if (!empty($block['data']['__is_preview'])) : ?>

  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />

<?php return;
endif;

if ($acf_select_to_background_option == 'color') {

  $bg_option = 'background-color:' . $acf_hero_banner_background_color;
} elseif ($acf_select_to_background_option == 'image') {
  $bg_option = "background-image: url(" . $background_image . ")";
}


if ($hero_banner_alignment_option == 'center') {
  $alignment = 'center';
} elseif ($hero_banner_alignment_option == 'right') {

  $alignment = 'right';
} else {

  $alignment = 'left';
}

if ($font_color == 'white') {
  $headingColor = 'white';
} elseif ($font_color == 'black') {
  $headingColor = 'black';
} else {
  $headingColor = 'white';
}

?> 

<section class="hero hero--<?php echo $alignment; ?> color-<?php echo $headingColor; ?>" style="<?php echo $bg_option; ?> ">

  <div class="page-container">

    <div class="row justify-content-center align-items-center">

      <div class="col-lg-9">

        <div class="inner_grid">

          <?php if (!empty($banner_header)) :  ?>

            <h1 class="hero__heading" style="color: <?php echo $heading_color; ?>;">

              <?php echo $banner_header; ?>

            </h1>

          <?php endif; ?>

          <?php if (!empty($banner_subline)) :  ?>

            <h3 class="hero__subhead" style="color: <?php echo $heading_color; ?>;"><?php echo $banner_subline; ?></h3>


          <?php endif; ?>

          <?php if (!empty($acf_hb_content)) :  ?>

            <?php echo $acf_hb_content; ?>

          <?php endif; ?>





          <?php if (!empty($hero_banner_button_one)) :  ?>

            <?php if ($hero_banner_button_option == 'one') { ?>

              <div class="hero__btn-group">

                <a href="<?php echo $hero_banner_button_one['url']; ?> " 
                class="<?php echo $acf_hero_banner_button_select_button_color;?> <?php echo $acf_hero_banner_button_select_button_color;?>--<?php echo $acf_hero_banner_button_select_button_style; ?> <?php echo $acf_hero_banner_button_select_button_color;?>--medium-small"> 
                <?php echo $hero_banner_button_one['title']; ?> </a>

              </div>

            <?php  } ?>



            <?php if ($hero_banner_button_option == 'two') {
              // print_r($hero_banner_button_one); 
            ?>

              <div class="hero__btn-group">

                <a href="<?php echo $hero_banner_button_one['url']; ?> " 
                class="<?php echo $acf_hero_banner_button_select_button_color;?> <?php echo $acf_hero_banner_button_select_button_color;?>--<?php echo $acf_hero_banner_button_select_button_style; ?> <?php echo $acf_hero_banner_button_select_button_color;?>--medium-small"> 
                <?php echo $hero_banner_button_one['title']; ?> </a> 

                <a href="<?php echo $acf_hero_banner_button_two['url']; ?>" 
                class="<?php echo $acf_hero_banner_button_select_button_color_two;?> <?php echo $acf_hero_banner_button_select_button_color_two;?>--<?php echo $acf_hero_banner_button_select_button_style_two; ?> <?php echo $acf_hero_banner_button_select_button_color_two;?>--medium-small"> 
                <?php echo $acf_hero_banner_button_two['title']; ?> </a>

              </div>

            <?php  } ?>

          <?php endif; ?>

        </div>

      </div>

    </div>

  </div>

</section>