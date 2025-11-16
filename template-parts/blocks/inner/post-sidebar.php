<?php

/**
 * Post Sidebar Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-post-sidebar-' . $block['id'];
// echo '<pre>';print_r($id); exit;  
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-post-sidebar';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// block preview
if ( !empty( $block['data']['__is_preview'] ) ): ?>
	<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return; endif;

// Load values and assing defaults.

$display_sidebar = get_field('acf_display_sidebar');
$layout_type = get_field('acf_sidebar_layout_type');
$select_widget = get_field('acf_select_widget');
$inner_content = get_field('acf_course_inner_content');
$acf_custom_sidebar = get_field('acf_custom_sidebar');

?>
<section class="courses-innerpages courses-innerpages--<?php echo $layout_type; ?>-position">

    <div class="container">
        <div class="row">
            <?php if ($display_sidebar == 'yes') : ?>
                <div class="col-lg-4 courses-innerpages__<?php echo $layout_type; ?>">
                    <div class="course-sidebar">
                        <?php if ($select_widget == 'default') : ?>
                            <?php dynamic_sidebar('sidebar-6'); ?>
                        <?php endif; ?>

                        <?php if ($select_widget == 'custom') : ?>
                            <?php if ($acf_custom_sidebar) : foreach ($acf_custom_sidebar as $sidebar) : ?>
                                    <h3><strong><?php echo $sidebar['acf_sidebar_title']; ?></strong></h3>
                                    <?php echo $sidebar['acf_sidebar_content']; ?>
                            <?php endforeach;
                            endif; ?>
                        <?php endif; ?>


                    </div>
                </div>
            <?php endif; ?>
            <div class="col-lg-8">
                <div class="courses-innerpages__content">
                    <?php echo $inner_content; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="border-bottom"></div>
</section>