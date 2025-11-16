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
$id = 'acf-navigation-link-' . $block['id'];
// echo '<pre>';print_r($block); exit;  
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-navigation-link';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$acf_navigation_link_block = get_field('acf_navigation_link_block');
$acf_navigation_link_title = get_field('acf_navigation_link_title');
$acf_add_navigation_link = get_field('acf_add_navigation_link');

// block preview
if ( !empty( $block['data']['__is_preview'] ) ): ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return; endif;

?>
<section class="cta-with-navigation cta-with-navigation--awards"
        style="background-color: #f5f5f5;">
        <div class="page-container ">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9">
                    <div class="inner_grid"> 
                        <div class="download_links">
                             
                            <p style="text-align: center; margin-bottom: 20px;"> 
                                <a href="#"> Download the Course Catalog </a>
                            </p> 
                            <p style="text-align:center;white-space:pre-wrap;" class="">Explore available courses:<br> <a href="https://www.codelicious.com/courses/#CSF">Computer Science Foundations (K-2)</a> -  <a href="https://www.codelicious.com/courses/#CSFun">Computer Science Fundamentals (3-5)</a><br> <a href="https://www.codelicious.com/courses/#CSA">Computer Science Applications (6-8)</a> -  <a href="https://www.codelicious.com/courses/#HSCS">High School Computer Science (9-12)</a>
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom"></div>
    </section>