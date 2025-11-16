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
$id = 'acf-notification-bar-' . $block['id'];
// echo '<pre>';print_r($block); exit;  
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-notification-bar';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$acf_nb_background_image = get_field('acf_nb_background_image');
$acf_nb_title = get_field('acf_nb_title');
$acf_nb_message = get_field('acf_nb_message');
$acf_notification_bar_block = get_field('acf_notification_bar_block');
$acf_nb_social_icon = get_field('acf_nb_social_icon');


?>


<section class="notification-bar" style="background-image: url(<?php echo $acf_nb_background_image; ?>);">
    <div class="page-container box-padding">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">
                <?php if (!empty($acf_nb_title)) : ?>
                    <h3 class="center-heading color-white">
                        <?php echo $acf_nb_title; ?>
                    </h3>
                <?php endif; ?>

                <div class="notification-bar__descreption">
                    <?php echo $acf_nb_message; ?>
                </div>
                <div class="social-icon">
                    <ul>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>