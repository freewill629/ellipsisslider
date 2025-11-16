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

$id = 'acf-text-with-media-' . $block['id'];
// print_r($id); exit;
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-text-with-media';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$media_headline = get_field('acf_text_with_media_headline');
$media_text = get_field('acf_text_with_media_content');
$text_with_media_option = get_field('acf_text_with_media_option');
$media_image = get_field('acf_text_with_media_image');
$text_with_media_video = get_field('acf_text_with_media_video');
$text_with_media_alignment_option = get_field('acf_text_with_media_alignment_option');
$media_button = get_field('acf_text_with_media_button');
$text_with_colorpicker = get_field('acf_text_with_colorpicker');
$text_with_media_button_option = get_field('acf_text_with_media_button_option');
$text_with_media_button_one = get_field('acf_text_with_media_button_one');
$text_with_media_button_two = get_field('acf_text_with_media_button_two');
$font_color = get_field('acf_twm_font_color');
$button_color = get_field('acf_twm_button_color');

echo $button_color;
exit;


// include file with color variables
//include( get_template_directory() . '/template-parts/components/color-variables.php' );
// set_query_var( 'default_color', '#000' );

// set query variables for passing to template parts
// set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg" />
<?php return;
endif;

if ($text_with_media_alignment_option['value'] == 'right') {
  $alignment = 'right';
} else {
  $alignment = 'left';
}

?>

<section class="text-with-media" style="background-color: <?php echo $text_with_colorpicker; ?>">
  <div class="page-container box-padding">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9">
        <h3 class="center-heading color-<?php echo $font_color; ?>">
          <?php echo $media_headline; ?>
        </h3>
        <div class="text-with-media__descreption color-<?php echo $font_color; ?>">
          <?php echo $media_text; ?>
          <img src="<?php echo $media_image; ?>">
        </div>

        <?php if ($text_with_media_button_option == 'one') { ?>
          <div class="text-with-media__btn">
            <a href="<?php echo $text_with_media_button_one['url']; ?> " class="whitebtn"> <?php echo $text_with_media_button_one['title']; ?></a>
          </div>
        <?php } ?>

        <?php if ($text_with_media_button_option == 'two') { ?>
          <div class="text-with-media__btn">
            <a href="<?php echo $text_with_media_button_one['url']; ?> " class="whitebtn orange-btn"> <?php echo $text_with_media_button_one['title']; ?></a>
            <a href="<?php echo $text_with_media_button_two['url']; ?> " class="whitebtn orange-btn"> <?php echo $text_with_media_button_two['title']; ?></a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

</section>