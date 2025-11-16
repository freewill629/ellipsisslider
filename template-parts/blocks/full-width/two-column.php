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

$id = 'acf-two-column-' . $block['id'];
// echo '<pre>';print_r($block); exit;  

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-two-column';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
// $background_option = get_field('acf_tc_background_option');
// $background_image = get_field('acf_tc_background_image');
$background_color = get_field('acf_tc_background_color');
$column_option = get_field('acf_two_column_option');
$acf_two_column_with_button = get_field('acf_two_column_with_button');
$acf_two_column_with_icon = get_field('acf_two_column_with_icon');


// include file with color variables
//include( get_template_directory() . '/template-parts/components/color-variables.php' );
set_query_var('default_color', '#000');

// set query variables for passing to template parts
set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;"/>
<?php return;
endif;
?>

<?php if ($column_option == 'icon') : ?>
    <section class="two-col-module-icon" style="background-color: <?php echo $background_color; ?>">
        <div class="page-container">
            <div class="two-col-module-icon__two">
                <div class="row justify-content-center align-items-center">
                    <?php if ($acf_two_column_with_icon) : foreach ($acf_two_column_with_icon as $icon) : ?>
                            <div class="col-md-6">
                                <div class="two-col-module-icon__box">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <?php if (!empty($icon['acf_tcwi_icon'])) : ?>
                                                <div class="image-block">
                                                    <img class="img-fluid" src="<?php echo $icon['acf_tcwi_icon']; ?>">
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="descreption">
                                                <?php if (!empty($icon['acf_tcwi_title'])) : ?>
                                                    <h6> <?php echo $icon['acf_tcwi_title']; ?> </h6>
                                                <?php endif; ?>
                                                <?php if (!empty($icon['acf_tcwi_description'])) : ?>
                                                    <?php echo $icon['acf_tcwi_description']; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<?php if ($column_option == 'button') : ?>
    <section class="two-column-module" style="background-color: <?php echo $background_color; ?>">
        <div class="page-container box-padding">
            <div class="two-column-module__row">
                <div class="row justify-content-center">
                    <?php if ($acf_two_column_with_button) : foreach ($acf_two_column_with_button as $button) : ?>
                            <div class="col-lg-6">
                                <div class="two-column-module__box">
                                    <?php if (!empty($button['acf_two_column_image'])) : ?>
                                        <div class="two-column-module__image">
                                            <img src="<?php echo $button['acf_two_column_image']; ?>">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($button['acf_two_column_description'])) : ?>
                                        <?php echo $button['acf_two_column_description']; ?>
                                    <?php endif; ?>
                                    <?php if (!empty($button['acf_two_column_button']['title'])) : ?>
                                        <div class="two-column-module__button">
                                            <a href="<?php echo $button['acf_two_column_button']['url']; ?>" class="whitebtn whitebtn--small orange-btn">
                                                <?php echo $button['acf_two_column_button']['title']; ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>