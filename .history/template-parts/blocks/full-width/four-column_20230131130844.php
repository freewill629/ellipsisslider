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

$id = 'acf-four-column-' . $block['id'];



if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-four-column';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$four_column_option = get_field('acf_four_column_option');
// print_r($four_column_option); exit;
$four_column_colorpiker = get_field('acf_four_column_colorpiker');
$background_image = get_field('acf_background_image');
$four_column_icon = get_field('acf_four_column_icon');
$four_column_title = get_field('acf_four_column_title');
$four_column_description = get_field('acf_four_column_description');
$four_column_repeater = get_field('acf_four_column_repeater');
$repeater_image  = get_field('acf_repeater_image');
$repeater_text  = get_field('acf_repeater_text');
$repeater_description  = get_field('acf_repeater_description');
$repeater_button  = get_field('acf_repeater_button');
$four_column_button  = get_field('acf_four_column_button');


// include file with color variables
//include( get_template_directory() . '/template-parts/components/color-variables.php' );
set_query_var('default_color', '#000');

// set query variables for passing to template parts
set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg" style="max-width: 100%; height: auto;" />
<?php return;
endif;

if ($four_column_option['value'] == 'background_image') {
    $color = "background-image: url(" . $acf_background_image . ");
                      background-position: center center;background-attachment: 
                      fixed;background-repeat: no-repeat;background-size: cover";
} else ($four_column_option['value'] == 'color'){
    $color = 'background-color:' . $four_column_colorpiker}
?>

<section class="four-column-module" style="<?php echo $color; ?>">
    <div class="page-container box-padding">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">
                <div class="center-module border-bottom">
                    <img src="<?php echo $four_column_icon; ?> ">
                    <h6 class="center-heading color-white">
                        <?php echo $four_column_title; ?>
                    </h6>
                    <p style="margin-bottom: 0;"><?php echo $four_column_description; ?></p>
                </div>
            </div>
        </div>
        <div class="four-column-module__grid">
            <div class="container">
                <div class="row">
                    <?php echo if($four_column_repeater) : foreach($four_column_repeater as $value) : ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="four-column-module__box">
                            <h5>COMPUTER SCIENCE FOUNDATIONS (K-2)</h5>
                            <p>Engage your students with courses that fuel their interest. Coding lessons use ScratchJr, an
                                introductory block coding language, perfect for emergent and early readers. </p>
                            <a href="#" class="whitebtn whitebtn--small">Learn More</a>
                        </div>
                    </div>
                    <?php endforeach; endif; ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="four-column-module__box">
                            <h5>COMPUTER SCIENCE FUNDAMENTALS (3-5) </h5>
                            <p>Inspire your students with courses that spark their creativity. Coding lessons use Scratch, a block
                                based coding language, ideal for the transitional and fluent reader.</p>
                            <a href="#" class="whitebtn whitebtn--small">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="four-column-module__box">
                            <h5>COMPUTER SCIENCE APPLICATIONS (6-8)</h5>
                            <p>Motivate your students with courses that connect to their world. Coding lessons use line based
                                languages JavaScript, HTML, CSS, and Java to explore programming options.</p>
                            <a href="#" class="whitebtn whitebtn--small">Learn More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="four-column-module__box">
                            <h5>HIGH SCHOOL COMPUTER SCIENCE (9-12)</h5>
                            <p>Empower your students with courses that expand their skills. Coding lessons use JavaScript, Java,
                                Python, and Godot to develop websites, programs, and games.</p>
                            <a href="#" class="whitebtn whitebtn--small">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-bottom"></div>
        <div class="four-column-module__btn">
            <a href="#" class="whitebtn ">
                All K-12 Courses
            </a>
        </div>
    </div>
    </div>
</section>