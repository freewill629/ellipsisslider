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

$id = 'acf-center-content-' . $block['id'];
// echo 'shiv';print_r($id); exit;  

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-center-content';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$acf_center_content_option = get_field('acf_center_content_option');
$acf_center_content_heading = get_field('acf_center_content_heading');
$acf_center_content_colorpicker = get_field('acf_center_content_colorpicker');
$acf_center_content_style_option = get_field('acf_center_content_style_option');
$acf_center_content_description = get_field('acf_center_content_description');
$act_center_content_heading_color = get_field('act_center_content_heading_color');
$acf_center_content_font_color = get_field('acf_center_content_font_color');
$acf_center__content = get_field('acf_center__content');

echo $acf_center_content_font_color;
exit;






// include file with color variables
//include( get_template_directory() . '/template-parts/components/color-variables.php' );
set_query_var('default_color', '#000');

// set query variables for passing to template parts
set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg" />
<?php return;
endif;
?>

<section class="center-content-module" style="background-color: <?php echo $acf_center_content_colorpicker; ?>;">
    <div class="page-container box-padding">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">
                <?php if ($acf_center__content) : foreach ($acf_center__content as $center__content) : ?>
                        <div class="center-content-module__column">
                            <h3 class="center-heading" style="color: #fff">
                                <?php echo $center__content['acf_center_content_heading']; ?>
                            </h3>
                            <?php echo $center__content['acf_center_content_description']; ?>
                        </div>
                <?php endforeach;
                endif; ?>

            </div>
        </div>
    </div>