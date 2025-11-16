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

$id = 'acf-four-column-' . $block['id'];



if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-four-column';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$four_column_option = get_field('acf_four_column_option');
// print_r($four_column_option); exit;
$four_column_colorpiker = get_field('acf_four_column_colorpiker');
$background_image = get_field('acf_fc_background_image');
$four_column_icon = get_field('acf_four_column_icon');
$four_column_title = get_field('acf_four_column_title');
$four_column_description = get_field('acf_four_column_description');
$four_column_repeater = get_field('acf_four_column_repeater');
$four_column_button  = get_field('acf_four_column_button');

print_r($four_column_option);
// include file with color variables
//include( get_template_directory() . '/template-parts/components/color-variables.php' );
set_query_var('default_color', '#000');

// set query variables for passing to template parts
set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg" style="max-width: 100%; height: auto;" />
<?php return;
endif;

if ($four_column_option['value'] == 'background_image') {
    $color = "background-image: url(" . $background_image . ");
                      background-position: center center;background-attachment: 
                      fixed;background-repeat: no-repeat;background-size: cover";
} elseif ($four_column_option['value'] == 'color') {
    $color = 'background-color:' . $four_column_colorpiker;
}
?>

<section class="four-column-module" style="<?php echo $color; ?>">
    <div class="page-container box-padding">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">
                <div class="center-module border-bottom">
                    <img src="<?php echo $four_column_icon; ?> ">
                    <h6 class="center-heading color-white">
                        <?php echo $four_column_title; ?>
                    </h6>
                    <p style="margin-bottom: 0;"><?php echo $four_column_description; ?></p>
                </div>
            </div>
        </div>
        <div class="four-column-module__grid">
            <div class="container">
                <div class="row">
                    <?php if ($four_column_repeater) : foreach ($four_column_repeater as $value) : ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="four-column-module__box">
                                    <h5><?php echo $value['acf_repeater_text']; ?></h5>
                                    <p><?php echo $value['acf_repeater_description']; ?> </p>
                                    <a href="<?php echo $value['acf_repeater_button']['link']; ?>" class="whitebtn whitebtn--small">
                                        <?php echo $value['acf_repeater_button']['title']; ?></a>
                                </div>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
        <div class="border-bottom"></div>
        <div class="four-column-module__btn">
            <a href="<?php echo $four_column_button['link']; ?>" class="whitebtn ">
                <?php echo $four_column_button['title']; ?>
            </a>
        </div>
    </div>
    </div>
</section>