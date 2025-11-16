<?php

/**
 * Blog Post Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-custom-post-blocks' . $block['id'];
// echo '<pre>';print_r($id); exit;  
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-custom-post-blocks';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

if ( !empty( $block['data']['__is_preview'] ) ): ?>
	<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-single.png" style="max-width: 100%; height: auto;" />
<?php return; endif;

// Load values and assing defaults.

$posts = get_field('acf_select_stem_carred_post');
//echo '<pre>'; print_r($posts); exit;
$no_of_post = get_field('acf_stem_no_of_post_show_in_page');
$layout = get_field('acf_custom_post_layout_option');




$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;



?>

<?php if($layout == 'two') : ?>
<section class="blog">
  <div class="page-container">
    <div class="blog__grid somin1">
      <div class="row">
        <?php
            $lastposts = new WP_Query([
          'post_type' => $posts,
          'posts_per_page' => $no_of_post,
          'orderby' => 'date',
          'order'   => 'DESC',
          'paged' => $paged,
        ]); 
        if ($lastposts->have_posts()) :
          while ($lastposts->have_posts()) : $lastposts->the_post();
            $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
            
            $category = get_the_category(); ?>
            <div class="col-md-6">
            <div class="blog__box">
            <?php if(!empty($img_url)): ?>
            <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo $img_url; ?>" class="img-fluid">
                </a>
                <?php endif; ?>
                <div class="blog__category">
                <div class="date"> <?php echo get_the_date(); ?> </div>
                </div>
                <a href="<?php echo get_the_permalink(); ?>">
                <h3 class="blog__heading"><?php echo get_the_title(); ?> </h3>
                </a>
                <p> <?php the_excerpt(); ?> </p>
                <?php 
                    if (is_page('my-stem-careers')) : ?>  
                      <a href="<?php echo get_the_permalink(); ?>" class="link">LISTEN NOW </a>
                      <?php else : ?>
                        <a href="<?php echo get_the_permalink(); ?>" class="link">Read More </a>
                    <?php endif; 
                ?>
            </div>
            </div>
        <?php endwhile;  ?>

        <div class="pagination">
     <?php
      $big = 999999999;
      echo paginate_links( array(
           'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
           'format' => '?paged=%#%',
           'current' => max( 1, get_query_var('paged') ),
           'total' => $lastposts->max_num_pages,
           'prev_text' => 'Newer',
           'next_text' => 'Older'
           
      ) );
?>
</div>
        <?php 
          wp_reset_postdata();
        endif;  ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if($layout == 'one') : ?>
<section class="blog">
  <div class="page-container">
    <div class="blog__grid somin">
      <div class="row">
        <?php
            $lastposts = new WP_Query([
          'post_type' => $posts,
          'posts_per_page' => $no_of_post,
          'orderby' => 'date',
          'order'   => 'DESC',
          'paged' => $paged,
        ]); 
        if ($lastposts->have_posts()) :
          while ($lastposts->have_posts()) : $lastposts->the_post();
            $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
            //$img_url = get_field('acf_course_image',get_the_ID());
            
            $category = get_the_category(); ?>
            <div class="col-md-12">
            <div class="blog__box">
              <?php if(!empty($img_url)): ?>
                <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo $img_url; ?>" class="img-fluid">
                </a>
                <?php endif; ?>
                <div class="blog__category">
                <div class="date"> <?php echo get_the_date(); ?> </div>
                </div>
                <a href="<?php echo get_the_permalink(); ?>">
                <h3 class="blog__heading"><?php echo get_the_title(); ?> </h3>
                </a>
                <p> <?php the_excerpt(); ?> </p>
                <a href="<?php echo get_the_permalink(); ?>" class="orangebtn orangebtn--solid orangebtn--medium-small">Read More </a>
            </div>
            </div>
        <?php endwhile;  ?>

        <div class="pagination">
     <?php
     $big = 999999999;
     echo paginate_links( array(
          'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $lastposts->max_num_pages,
          'prev_text' => 'Newer',
          'next_text' => 'Older'
          
     ) );
?>
</div>
        <?php 
          wp_reset_postdata();
        endif;  ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

