<?php

/**
 * Center Content With Tabs Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'acf-center-content-with-tabs' . $block['id'];
// echo 'shiv';print_r($id); exit;  

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-center-content-with-tabs';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$title = get_field('acf_center_content_with_tabs_title');
$subtitle = get_field('acf_center_content_with_tabs_subtitle');
$acf_center_content_with_tabs_tab = get_field('acf_center_content_with_tabs_tab');

// acf_center_content_with_tab_title
// acf_center_content_with_tabs_inner_tab
// acf_center_content_with_tabs_inner_tab_title



set_query_var('default_color', '#000');

// set query variables for passing to template parts
set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg" />
<?php return;
endif;
?>

<section class="center-content-module center-content-module--color-black center-content-module--toggle" style="background-color: #f5f5f5;">
    <div class="page-container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">
                <div class="border-bottom"></div>
                <div class="center-content-module__column">
                <?php if (!empty($title)) : ?>
                    <h3 class="center-heading">
                        <?php echo $title; ?>
                    </h3>
                <?php endif; ?>

                    <div class="center-content-module__tab_module">
                    <?php if (!empty($subtitle)) : ?>
                        <h3 class="center-heading">
                            <a href="javascript:;"><?php echo $subtitle; ?></a>
                        </h3>
                    <?php endif; ?>
                    </div>
                    <?php if ($acf_center_content_with_tabs_tab) : foreach ($acf_center_content_with_tabs_tab as $tabs_tab) :

                    ?>
                            <div class="sales-items">
                                <ul class="whr-items" style="display: block;">
                                    <li class="whr-item">
                                        <?php if (!empty($tabs_tab['acf_center_content_with_tab_title']['title'])) : ?>
                                            <h3 class="whr-title"><a href="<?php echo $tabs_tab['acf_center_content_with_tab_title']['url']; ?>">
                                                <?php echo $tabs_tab['acf_center_content_with_tab_title']['title']; ?> </a></h3>
                                        <?php endif; ?>        
                                        <ul class="whr-info">
                                            <?php if ($tabs_tab['acf_center_content_with_tabs_inner_tab']) : foreach ($tabs_tab['acf_center_content_with_tabs_inner_tab'] as $inner_tab) :
                                                    foreach ($inner_tab as $inner_tab) : ?>
                                                    <?php if (!empty($inner_tab)) : ?>
                                                        <li class="whr-location"><?php echo $inner_tab; ?></li>
                                                    <?php endif; ?>
                                            <?php endforeach;
                                                endforeach;
                                            endif; ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>