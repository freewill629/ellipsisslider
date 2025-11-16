<?php

/**
 * Blockquote Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-multiple-images-' . $block['id'];
// echo '<pre>';print_r($block); exit;  
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-multiple-images';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-with-bgcolor.png" style="max-width: 100%; height: auto;" />
<?php return;
endif;

// Load values and assing defaults.
$multiple_images = get_field('acf_multiple_images_repeater');
$background_color = get_field('acf_multiple_images_background_color');

?>

<section class="multiple-images" style="background-color: <?php echo $background_color ? $background_color : ''; ?>;">
  <div class="container">
    <div class="multiple-images__row">
      <div class="row align-items-center justify-content-center">
        <?php if ($multiple_images) : foreach ($multiple_images as $icon) : ?>
            <div class="col-md-2">
              <?php if (!empty($icon['acf_image'])) : ?>
                <div class="multiple-images__image">
                  <img src="<?php echo $icon['acf_image']; ?>" class="img-fluid">
                </div>
              <?php endif; ?>
            </div>
        <?php endforeach;
        endif; ?>
      </div>
    </div>
  </div>
  <div class="border-bottom"></div>
</section>