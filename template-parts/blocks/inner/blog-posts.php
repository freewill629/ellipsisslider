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
$id = 'acf-blog-post' . $block['id'];
// echo '<pre>';print_r($id); exit;  
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-blog-post';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

if ( !empty( $block['data']['__is_preview'] ) ): ?>
	<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return; endif;

// Load values and assing defaults.

$taxonomyID = get_field('acf_post_select_taxonomy');
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

//echo '<pre>'; print_r($taxonomyID); exit;

?>

<?php if(!empty($taxonomyID->term_id) && $taxonomyID ->term_id!= 1): ?>

<section class="blog">

  <div class="page-container">
  <p> <strong> Posts in <?php echo $taxonomyID->name; ?> </strong> </p>
    <div class="blog__grid">
      <div class="row">
        <?php
            $lastposts = new WP_Query([
          'post_type' => 'post',
          'posts_per_page' => 12,
          'orderby' => 'date',
          'order'   => 'DESC',
          'paged' => $paged,
          'tax_query' => [
            [
              'taxonomy' => 'category',
              'field'    => 'term_id',
              'terms'    => $taxonomyID->term_id, // example of $termIds = [4,5]
              'operator' => 'IN',

            ],
          ]
        ]); 
        if ($lastposts->have_posts()) :
          while ($lastposts->have_posts()) : $lastposts->the_post();
            $img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
            $category = get_the_category(); 
            // echo 'test'; echo '<pre>'; print_r($category); exit; 
            ?>
            <div class="col-md-6">
            <div class="blog__box">
                <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo $img_url; ?>" class="img-fluid">
                </a>
                <div class="blog__category">
                
                <?php if($category) : 
                $i = 1 ;
                foreach($category as $key=>$cat) :  ?>
                <span><a href="<?php echo get_the_permalink(); ?>"><?php echo $cat->cat_name; ?> </a></span>
                <?php if($key != count($category)-1) { echo ", "; } ?> 
                <?php $i++ ; ?>
                <?php endforeach; endif; ?>
                <span class="pattern-dot">.</span>
                <span class="date"> <?php echo get_the_date();  ?> </span>
                </div>
                <a href="<?php echo get_the_permalink(); ?>">
                <h2 class="blog__heading"><?php echo get_the_title(); ?> </h2>
                </a>
                <p> <?php the_excerpt(); ?> </p>
                <a href="<?php echo get_the_permalink(); ?>" class="link">Read More </a>
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


<?php if(empty($taxonomyID->term_id) || $taxonomyID->term_id == 1): ?>
<section class="blog">
  <div class="page-container">
    <div class="blog__grid">
      <div class="row">
        <?php
            $lastposts = new WP_Query([
          'post_type' => 'post',
          'posts_per_page' => 12,
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
                <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo $img_url; ?>" class="img-fluid">
                </a>
                <div class="blog__category">
               
                <span class="date"> <?php echo get_the_date(); ?> </span>
                </div>
                <a href="<?php echo get_the_permalink(); ?>">
                <h1 class="blog__heading"><?php echo get_the_title(); ?> </h1>
                </a>
                <p> <?php the_excerpt(); ?> </p>
                <a href="<?php echo get_the_permalink(); ?>" class="link">Read More </a>
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