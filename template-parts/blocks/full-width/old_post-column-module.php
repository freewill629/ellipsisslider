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

$id = 'acf-post-column-' . $block['id'];
// echo '<pre>';print_r($block); exit;  

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-post-column';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults. 
$display_divider = get_field('acf_pc_display_divider');
$divider_option = get_field('acf_pc_divider_option');

$posts = get_field('select_pc_course_type');
$post_title = get_field('acf_course_post_title');
$layout_type = get_field('acf_post_layout_type');
$acf_thcpt_button = get_field('acf_thcpt_button');
$display_date = get_field('acf_course_display_date');
$acf_pc_background_color = get_field('acf_pc_background_color');
$font_color = get_field('acf_small_description_font_color');
$form = get_field('acf_display_newsletter_form');
$form_shortcode = get_field('acf_newsletter_form_shortcode');
$acf_pc_button = get_field('acf_pc_button'); 



$title = strtolower($post_title);
$title1 = str_replace(' ', '-', $title);
$title2 = str_replace('(', '', $title1);
$id = str_replace(')', '', $title2);


set_query_var('default_color', '#000');

// set query variables for passing to template parts
set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-two.png" style="max-width: 100%; height: auto;" />
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-three.png" style="max-width: 100%; height: auto;" />
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-four.png" style="max-width: 100%; height: auto;" />
<?php return;
endif;
?>

<?php if ($layout_type == 'two') : ?>
    <section class="two-column-module" id="<?php echo $id; ?>" style="background-color: <?php echo $acf_pc_background_color; ?>">
        <?php if ($display_divider == 'yes') {
            if ($divider_option == 'top' || $divider_option == 'both') { ?>
                <div class="border-bottom"></div>
        <?php }
        }
        ?>
        <div class="page-container box-padding">
            <div class="two-column-module__row">
                <div class="row justify-content-center">
                    <?php
                    foreach ($posts as $post) {
                        setup_postdata($post);

                        $terms_post_category = wp_get_post_terms($post->ID, 'category');
                        $post_type = get_post_type($post->ID);
                        $button =  get_field('acf_thcpt_button', $post->ID);

                        //$img_url = get_field('acf_course_image', $post->ID); 
                        $img_url = get_the_post_thumbnail_url($post->ID, 'full');
                    ?>

                        <div class="col-lg-6">
                            <div class="two-column-module__box">
                                <div class="two-column-module__image">
                                    <img src="<?php echo $img_url; ?> ">
                                </div>
                                <div class="two-column-module__content color-<?php echo $font_color; ?>">
                                    <?php if ($display_date == 'yes') : ?>
                                        <span><?php echo get_the_date(); ?></span>
                                    <?php endif; ?>
                                    <h5> <?php echo get_the_title($post->ID); ?> </h5>

                                    <p> <?php echo get_the_excerpt($post->ID); ?> </p>
                                </div>


                                <div class="two-column-module__button">
                                    <a href="<?php echo get_permalink($post->ID); ?>" class="orangebtn orangebtn--solid orangebtn--medium-small">
                                    <?php echo $acf_pc_button ? $acf_pc_button : 'Learn More'; ?>
                                    </a>
                                </div>

                            </div>
                        </div>
                    <?php
                    } ?>

                </div>
            </div>
        </div>
        <?php if ($display_divider == 'yes') {
            if ($divider_option == 'bottom' || $divider_option == 'both') { ?>
                <div class="border-bottom"></div>
        <?php }
        }
        ?>
    </section>

<?php endif; ?>

<?php if ($layout_type == 'three') : ?>
    <section class="three-column-module" id="<?php echo $id; ?>">
        <?php if ($display_divider == 'yes') {
            if ($divider_option == 'top' || $divider_option == 'both') { ?>
                <div class="border-bottom"></div>
        <?php }
        }
        ?>
        <div class="container">
            <div class="center-heading color-black">
                <?php if (!empty($post_title)) : ?>
                    <h2><?php echo $post_title; ?> </h2>
                <?php endif; ?>
            </div>
            <div class="three-column-module__block">
                <div class="row">
                    <?php foreach ($posts as $post) {
                        setup_postdata($post);

                        $terms_post_category = wp_get_post_terms($post->ID, 'category');
                        $post_type = get_post_type($post->ID);
                        $button =  get_field('acf_thcpt_button', $post->ID);


                        $img_url = get_the_post_thumbnail_url($post->ID, 'full');
                        //$img_url = get_field('acf_course_image', $post->ID); 
                    ?>
                        <div class="col-lg-4">
                            <div class="three-column-module__col">
                                <div class="three-column-module__image"> <img class="img-fluid" src="<?php echo $img_url; ?> "> </div>
                                <div class="three-column-module__descreption">
                                    <h5> <?php echo get_the_title($post->ID); ?> </h5>
                                    <p> <?php echo get_the_excerpt($post->ID); ?> </p>
                                </div>
                                <?php if ($button) : ?>
                                    <div class="three-column-module__btn"><a href="<?php echo get_permalink($post->ID); ?>" class="orangebtn orangebtn--solid orangebtn--medium-small"> 
                                    <?php echo $acf_pc_button ? $acf_pc_button : 'Learn More'; ?> 
                                   
                                </a>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>

                        


                    <?php
                    } ?>
                    <?php if ($form == 'yes') : ?>
                        <div class="col-lg-4">
                            <div class="three-column-module__col">
                                <div class="three-column-module__form">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logos.png" class="img-fluid form_logo">
                                    <p>Subscribe to hear about upcoming workshops and new courses </p>
                                    <?php echo $form_shortcode; ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if ($display_divider == 'yes') {
            if ($divider_option == 'bottom' || $divider_option == 'both') { ?>
                <div class="border-bottom"></div>
        <?php }
        }
        ?>
    </section>
<?php endif; ?>

<?php if ($layout_type == 'four') : ?>
    <section class="four-column-computer-science" id="<?php echo $id; ?>">
        <?php if ($display_divider == 'yes') {
            if ($divider_option == 'top' || $divider_option == 'both') { ?>
                <div class="border-bottom"></div>
        <?php }
        }
        ?>
        <div class="container">
            <div class="center-heading color-black">
                <?php if (!empty($post_title)) : ?>
                    <h2><?php echo $post_title; ?> </h2>
                <?php endif; ?>
            </div>
            <div class="four-column-computer-science__block">
                <div class="row">

                    <?php
                    foreach ($posts as $post) :
                        setup_postdata($post);

                        $terms_post_category = wp_get_post_terms($post->ID, 'category');
                        $post_type = get_post_type($post->ID);
                        $button =  get_field('acf_thcpt_button', $post->ID);

                        $img_url = get_the_post_thumbnail_url($post->ID, 'full'); ?>
                        <div class="col-lg-3">
                            <div class="four-column-computer-science__col">
                                <div class="four-column-computer-science__image"> <img class="img-fluid" src="<?php echo $img_url; ?>"> </div>
                                <div class="four-column-computer-science__descreption">
                                    <h5> <?php echo get_the_title($post->ID); ?> </h5>
                                    <p> <?php echo get_the_excerpt($post->ID); ?> </p>
                                </div>

                                <?php if ($button) : ?>
                                    <div class="four-column-computer-science__btn"><a href="<?php echo get_permalink($post->ID); ?>" class="orangebtn orangebtn--solid orangebtn--medium-small"><?php echo $acf_pc_button ? $acf_pc_button : 'Learn More'; ?></a>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php
                    endforeach; ?>
                </div>

            </div>
        </div>

        <?php if ($display_divider == 'yes') {
            if ($divider_option == 'bottom' || $divider_option == 'both') { ?>
                <div class="border-bottom"></div>
        <?php }
        }
        ?>
    </section>
<?php endif; ?>