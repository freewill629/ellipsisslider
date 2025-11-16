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

$id = 'acf-text-with-icons-' . $block['id'];
// print_r($id); exit;  

if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-text-with-icons';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$text_with_icons = get_field('acf_text_with_icons');
// echo '<pre>';print_r($text_with_icons_button); exit; 


// include file with color variables
//include( get_template_directory() . '/template-parts/components/color-variables.php' );
// set_query_var( 'default_color', '#000' );

// set query variables for passing to template parts
// set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg" style="max-width: 100%; height: auto;" />
<?php return;
endif;
?>

<section class="text-with-icons" style="background-color: #f5f5f5;">
  <div class="text-icons">
    <div class="container">
      <div class="row">
        <?php if ($text_with_icons) : foreach ($text_with_icons as $value) : ?>
            <div class="col-lg-3 col-sm-6">
              <a href="<?php echo $value['acf_twi_link']['link']; ?>">
                <img src="<?php echo $value['acf_twi_image']; ?>">
                <h5><?php echo $value['acf_twi_text']; ?> </h5>
              </a>
            </div>
        <?php endforeach;
        endif; ?>
      </div>
    </div>
  </div>
</section>