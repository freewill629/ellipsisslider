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

$id = 'acf-three-column-' . $block['id'];
// echo '<pre>';print_r($block); exit;  

if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-three-column';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults. 
$display_divider = get_field('acf_thc_display_divider');
// print_r($display_divider); exit; 
$divider_option = get_field('acf_thc_divider_option'); 
// print_r($divider_option); exit; 

$course_type = get_field('select_course_type');


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

<section class="three-column-module">
  <div class="container">
    <div class="center-heading color-black">
      <?php if (!empty($course_type->name)) : ?>
        <h3><?php echo $course_type->name; ?> </h3>
      <?php endif; ?>
    </div>
    <div class="three-column-module__block">
      <div class="row">
        <?php


        // $cats = get_categories($arg);


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

        // echo '<pre>';
        // print_r($projects);
        // exit;


        if ($lastposts->have_posts()) {
          while ($lastposts->have_posts()) : $lastposts->the_post();
            $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <div class="col-lg-4">
              <div class="three-column-module__col">
                <div class="three-column-module__image"> <img class="img-fluid" src="<?php echo $img_url; ?> "> </div>
                <div class="three-column-module__descreption">
                  <h5> <?php echo the_title(); ?></h5>
                  <?php echo get_field('acf_thcpt_description', get_the_ID()); ?>
                </div>
                <div class="three-column-module__btn"><a href="<?php the_permalink(); ?>" class="whitebtn orange-btn whitebtn--small"> Learn More</a>
                </div> 
              </div>
            </div>
        <?php endwhile;
          wp_reset_postdata();
        }  ?>
      </div>
    </div>
  </div>
  <?php if($display_divider == 'yes'){
                if($divider_option == 'top' || $divider_option == 'both'){ ?>
                  <div class="border-bottom"></div>
                  <?php } 
        }
        ?>
</section>