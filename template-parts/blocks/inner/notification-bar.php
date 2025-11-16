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

// echo '<pre>';
// print_r($acf_notification_bar_block);
// exit;

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return;
endif;


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
                    <?php if (!empty($acf_nb_message)) : ?>
                    <div class="notification-bar__descreption">
                        <?php echo $acf_nb_message; ?>
                    </div>
                    <?php endif; ?>
                <div class="social-icon">
                    <ul>
                    <?php if ($acf_notification_bar_block) : foreach($acf_notification_bar_block as $block) : ?>
                        <li><a href="<?php echo $block['acf_nb_social_icon_links']; ?>"><i class="<?php echo $block['acf_nb_social_icon']; ?>"></i></a></li>
                    <?php endforeach; endif; ?>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>