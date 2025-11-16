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

$id = 'acf-center-content-' . $block['id'];
// echo 'shiv';print_r($id); exit;  

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-center-content';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$acf_center_content_option = get_field('acf_center_content_option');
$acf_center_content_heading = get_field('acf_center_content_heading');
$acf_center_content_colorpicker = get_field('acf_center_content_colorpicker');
$acf_center_content_style_option = get_field('acf_center_content_style_option');
$acf_center_content_description = get_field('acf_center_content_description');
$act_center_content_heading_color = get_field('act_center_content_heading_color');
$acf_center_content_font_color = get_field('acf_center_content_font_color');
$acf_center__content = get_field('acf_center__content');






// include file with color variables
//include( get_template_directory() . '/template-parts/components/color-variables.php' );
set_query_var('default_color', '#000');

// set query variables for passing to template parts
set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg" />
<?php return;
endif;
?>

<section class="center-content-module" style="background-color: <?php echo $acf_center_content_colorpicker; ?>;">
    <div class="page-container box-padding">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">
                <?php if ($acf_center__content) : foreach ($acf_center__content as $center__content) : ?>
                        <div class="center-content-module__column">
                            <h3 class="center-heading">

                            </h3>
                            <p style="text-align: center;">We imagine a world where all learners have equitable access to
                                high-quality computer science education.</p>
                        </div>
                <?php endforeach;
                endif; ?>
                <div class="center-content-module__column">
                    <h3 class="center-heading">
                        Mission
                    </h3>
                    <p style="text-align: center;">Remove barriers to teaching computer science by creating the
                        highest quality resources built to
                        support educators of all experience levels.</p>
                </div>
                <div class="center-content-module__column">
                    <h3 class="center-heading">
                        Computer Science Education Landscape
                    </h3>
                    <p> Rapid advancements in technology, along with its powerful influence on the ways we live and
                        work, are driving change in the way we view computer science literacy and education. More
                        than
                        ever, we understand that computer science is evolving beyond a nice-to-have in K-12
                        education.
                        It is now clear, computer science education is a critical path for developing students’
                        technological literacy while also equipping them with the disposition, attitudes, knowledge,
                        and
                        skills necessary to thrive in their post-secondary lives. </p>
                    <p>While elements of computer science education have been integrated into schools for quite some
                        time, these implementations are often episodic, incentive-based, and limited in scope.
                        Initial
                        forays into computer science offer surface level learning experiences for students, but they
                        are
                        unlikely to support deep and meaningful learning that transfers to real-world applications.
                        To
                        fully realize the benefits of computer science education, 21st century learners need more.
                        Computer science must be integrated into schools as a formal discipline, taught using
                        high-quality instructional strategies, and accessible to every student. </p>
                    <p>Differences in state-level policy, availability of teacher preparation, curricula materials,
                        and
                        the rapidly changing nature of the discipline, create unique complexities in the process of
                        bringing computer science to schools. Moreover, as schools' appetites for computer science
                        education grows, their integration strategies will evolve. Simply put, there is no
                        one-size-fits-all solution. To support schools at all stages, curriculum providers must
                        stand
                        ready to engage in partnerships; co-constructing viable and dynamic solutions that meet
                        these
                        expanding visions for computer science.</p>
                </div>

            </div>
        </div>
    </div>