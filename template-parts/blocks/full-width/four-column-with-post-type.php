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

$id = 'acf-four-column-with-post-type' . $block['id'];

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
$background_image = get_field('acf_fc_background_image');
// $display_divider = get_field('acf_display_divider');
// $diveder_option = get_field('acf_divider_option');
$four_column_icon = get_field('acf_four_column_icon');
$four_column_title = get_field('acf_four_column_title');
$four_column_description = get_field('acf_four_column_description');
$four_column_repeater = get_field('acf_four_column_repeater');
$four_column_button  = get_field('acf_four_column_button');
$title_option  = get_field('acf_fc_title_option');

// print_r($four_column_option);
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

$divider_option = get_field('acf_fc_divider_option');
$display_divider = get_field('acf_fc_display_divider');
$course_type = get_field('select_fc_course_type');

// echo '<pre>';
// print_r($course_type);
// exit();


?>

<section class="four-column-computer-science">
    <div class="container">
        <div class="center-heading color-black">
            <?php if (!empty($course_type->name)) : ?>
                <h3><?php echo $course_type->name; ?> </h3>
            <?php endif; ?>
        </div>
        <div class="four-column-computer-science__block">
            <div class="row">
                <?php
                $lastposts = new WP_Query([
                    'post_type' => 'course',
                    'posts_per_page' => -1,
                    'orderby' => 'name',
                    'order'   => 'ASC',
                    'tax_query' => [
                        [
                            'taxonomy' => 'course-category',
                            'field'    => 'term_id',
                            'terms'    => $course_type->term_id, // example of $termIds = [4,5]
                            'operator' => 'IN',

                        ],
                    ]
                ]);
                if ($lastposts->have_posts()) {
                    while ($lastposts->have_posts()) : $lastposts->the_post();
                        $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                        <div class="col-lg-3">
                            <div class="four-column-computer-science__col">
                                <div class="four-column-computer-science__image"> <img class="img-fluid" src="<?php echo $img_url; ?>"> </div>
                                <div class="four-column-computer-science__descreption">
                                    <h5> <?php echo the_title(); ?></h5>
                                    <?php echo get_field('acf_thcpt_description', get_the_ID()); ?>
                                </div>
                                <div class="four-column-computer-science__btn"><a href="<?php the_permalink(); ?>" class="whitebtn orange-btn whitebtn--small ">Learn More</a>
                                </div>

                            </div>
                        </div>
                <?php endwhile;
                    wp_reset_postdata();
                }  ?>

            </div>
        </div>
    </div>
    <?php if($$divider_option == 'yes'){
                if($display_divider == 'top' || $display_divider == 'both'){ ?>
                  <div class="border-bottom"></div>
                  <?php } 
        }
        ?>
</section>