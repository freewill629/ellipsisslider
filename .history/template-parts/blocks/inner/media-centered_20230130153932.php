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

$id = 'acf-media-centered-' . $block['id'];
// echo '<pre>';print_r($block); exit;  

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-media-centered';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$acf_media_headline = get_field('acf_media_headline');
$acf_media_option = get_field('acf_media_option');
$acf_media_image = get_field('acf_media_image');
$acf_media_video = get_field('acf_media_video');
$acf_media_sub_title = get_field('acf_media_sub_title');

echo "<pre>";
print_r($acf_media_option);

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


<section class="media-centered" style="background-color: #f5f5f5;">
    <div class="page-container box-padding">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">
                <?php if (!empty($acf_media_headline)) : ?>
                    <h3 class="center-heading color-black">
                        <?php echo $acf_media_headline; ?>
                    </h3>
                <?php endif; ?>
                <?php if (!empty($acf_media_sub_title)) : ?>
                    <?php echo $acf_media_sub_title; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>