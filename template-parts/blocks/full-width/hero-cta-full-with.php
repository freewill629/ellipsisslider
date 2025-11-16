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

$id = 'acf-hero-cta-full-with-' . $block['id'];

if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-hero-cta-full-with';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$acf_hero_full_with_image = get_field('acf_hero_full_with_image');
$acf_hero_full_with_heading = get_field('acf_hero_full_with_heading');
$acf_hero_full_with_description = get_field('acf_hero_full_with_description');
$acf_hero_full_with_form = get_field('acf_hero_full_with_form');

//echo $acf_hero_full_with_heading;

// include file with color variables
//include( get_template_directory() . '/template-parts/components/color-variables.php' );
set_query_var('default_color', '#000');

// set query variables for passing to template parts
set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return;
endif;
?>


<section class="heroCta-fullwidth" style="background-image: url(<?php echo $acf_hero_full_with_image; ?> );">
  <div class="page-container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9">
        <div class="inner_grid">
          <?php if (!empty($acf_hero_full_with_heading)) : ?>
            <h1 class="hero__heading">
              <?php echo $acf_hero_full_with_heading; ?>
            </h1>
          <?php endif; ?>
          <?php if (!empty($acf_hero_full_with_description)) : ?>
            <?php echo $acf_hero_full_with_description; ?>
          <?php endif; ?>

          <?php if(!empty($acf_hero_full_with_form)): ?>  
            <?php echo do_shortcode($acf_hero_full_with_form); ?>           
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</section>