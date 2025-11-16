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

$id = 'acf-one-column-' . $block['id'];
// echo '<pre>';print_r($block); exit;  

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-one-column';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.

$column_option = get_field('acf_one_column_display_option');
$one_column_with_image = get_field('one_column_with_image');
$acf_one_column_with_icon = get_field('acf_one_column_with_icon');


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

<?php if ($column_option == 'icon') : ?>
    <section class="one-column-module" style="margin-top: 60px ;">
        <div class="container">
            <?php if ($acf_one_column_with_icon) : foreach ($acf_one_column_with_icon as $icon) : ?>
                    <div class="one-column-module__row">
                        <?php if (!empty($icon['acf_one_column_icon_image'])) : ?>
                            <div class="one-column-module__image">
                                <img src="<?php echo $icon['acf_one_column_icon_image']; ?>" class="img-fluid">
                            </div>
                        <?php endif; ?>
                        <div class="one-column-module__descreption">
                            <?php if (!empty($icon['acf_one_column_icon_title'])) : ?>
                                <h3> <?php echo $icon['acf_one_column_icon_title']; ?> </h3>
                            <?php endif; ?>
                            <?php if (!empty($icon['acf_one_column_icon_description'])) : ?>
                                <?php echo $icon['acf_one_column_icon_description']; ?>
                            <?php endif; ?>
                            <?php if (!empty($icon['acf_one_column_icon_button']['title'])) : ?>
                                <div class="one-column-module__btn">
                                    <a href="<?php echo $icon['acf_one_column_icon_button']['url']; ?>" class="orangebtn orangebtn--solid orangebtn--medium-small">
                                        <?php echo $icon['acf_one_column_icon_button']['title']; ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="border-bottom"></div>
            <?php endforeach;
            endif; ?>
        </div>
    </section>
<?php endif; ?>
<?php if ($column_option == 'image') : ?>
    <section class="one-column-module one-column-module--nobutton" style="margin-top: 60px ;">
        <div class="page-container">
            <?php if ($one_column_with_image) : foreach ($one_column_with_image as $image) : ?>
                    <?php if (!empty($image['acf_oc_main_heading'])) : ?>
                        <h3 class="center-heading" style="color: #222;"> <?php echo $image['acf_oc_main_heading']; ?> </h3>
                    <?php endif; ?>
                    <div class="one-column-module__row">
                        <?php if (!empty($image['acf_oc_image'])) : ?>
                            <div class="one-column-module__image">
                                <img src="<?php echo $image['acf_oc_image']; ?>" class=" img-fluid">
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($image['acf_oc_description'])) : ?>
                            <div class="one-column-module__descreption">
                                <?php echo $image['acf_oc_description']; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="border-bottom"></div>
            <?php endforeach;
            endif; ?>
        </div>
    </section>
<?php endif; ?>