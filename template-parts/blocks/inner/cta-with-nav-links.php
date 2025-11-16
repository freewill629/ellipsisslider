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

$id = 'acf-center-content-with-nav-links-' . $block['id'];
// print_r($block); exit; 
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-center-content-with-nav-links';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$acf_center_content_with_links_title = get_field('acf_center_content_with_links_title');
$acf_center_content_with_links_description = get_field('acf_center_content_with_links_description');
$acf_center_content_with_links = get_field('acf_center_content_with_links');
$acf_center_content_nav_links = get_field('acf_center_content_nav_links');
$acf_layout_style = get_field('acf_select_layout_cta_nav');
$acf_award_info_image = get_field('acf_award_info_image');
$acf_award_downloadable_links = get_field('acf_award_downloadable_links');
$acf_award_info_description = get_field('acf_award_info_description');



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



<section class="cta-with-navigation <?php if ($acf_layout_style == 'layout2') : ?> cta-with-navigation--awards <?php endif; ?>" style="background-color: #f5f5f5;">
    <div class="page-container box-padding">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">
                <div class="inner_grid">
                    <?php if (!empty($acf_center_content_with_links_title)) : ?>
                        <h1 class="cta-with-navigation__heading">
                            <?php echo $acf_center_content_with_links_title; ?>
                        </h1>
                    <?php endif; ?>
                    <?php if (!empty($acf_center_content_with_links_description)) : ?>
                        <?php echo $acf_center_content_with_links_description; ?>
                    <?php endif; ?>


                    <?php if (!empty($acf_center_content_with_links) && $acf_layout_style == 'layout1') : ?>
                        <div class="cta-with-navigation__links">
                            <ul>
                                <?php if ($acf_center_content_with_links) : foreach ($acf_center_content_with_links as $links) : ?>
                                        <li><a href=" <?php echo $links['acf_center_content_nav_links']['url']; ?>"> <?php echo $links['acf_center_content_nav_links']['title']; ?></a></li>
                                <?php endforeach;
                                endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if ($acf_layout_style == 'layout2') : ?>
                        <?php if (!empty($acf_award_info_description)) : ?>
                            <div class="cta-with-navigation__awards-info">
                                <?php if (!empty($acf_award_info_image)) : ?>
                                    <div class="award-image"><img src="<?php echo $acf_award_info_image; ?>"></div>
                                <?php endif; ?>
                                <?php if (!empty($acf_award_info_description)) : ?>
                                    <div class="award-desc">
                                        <?php echo $acf_award_info_description; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($acf_award_downloadable_links)) : ?>
                            <div class="cta-links">
                                <?php echo $acf_award_downloadable_links; ?>
                                <!-- <p style="text-align: center; margin-bottom: 20px;"> <a href="#">
                                        Download the Course Catalog
                                    </a></p>
                                    <p style="text-align:center;white-space:pre-wrap;" class="">Explore available courses:<br><a href="https://www.codelicious.com/courses/#CSF">Computer Science Foundations (K-2)</a> - <a href="https://www.codelicious.com/courses/#CSFun">Computer Science Fundamentals (3-5)</a><br><a href="https://www.codelicious.com/courses/#CSA">Computer Science Applications (6-8)</a> - <a href="https://www.codelicious.com/courses/#HSCS">High School Computer Science (9-12)</a></p> -->
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if ($acf_layout_style == 'layout2') : ?>
        <div class="border-bottom"></div>
    <?php endif; ?>
</section>


<!-- 

<section class="cta-with-navigation" style="">
    <div class="page-container box-padding">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">
                <div class="inner_grid">
                    <?php if (!empty($acf_center_content_with_links_title)) : ?>
                        <h1 class="cta-with-navigation__heading">
                            <?php echo $acf_center_content_with_links_title; ?>
                        </h1>
                    <?php endif; ?>

                    <?php if (!empty($acf_center_content_with_links_description)) : ?>
                        <?php echo $acf_center_content_with_links_description; ?>
                    <?php endif; ?>

                    <?php if (!empty($acf_center_content_with_links)) : ?>
                        <div class="cta-with-navigation__links">
                            <ul>
                                <?php if ($acf_center_content_with_links) : foreach ($acf_center_content_with_links as $links) : ?>
                                        <li><a href=" <?php echo $links['acf_center_content_nav_links']['url']; ?>"> <?php echo $links['acf_center_content_nav_links']['title']; ?></a></li>
                                <?php endforeach;
                                endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section> -->