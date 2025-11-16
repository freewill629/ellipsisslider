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
    
    $id = 'acf-related-articles-' . $block['id'];   
    // echo '<pre>';print_r($id); exit;  

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-related-articles'; 
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }
    
    // Load values and assing defaults.
    $title = get_field('acf_related_article_title');
    $selected_posts = get_field('acf_related_articles_select_posts');
    
    // include file with color variables
    //include( get_template_directory() . '/template-parts/components/color-variables.php' );
    set_query_var( 'default_color', '#000' );

    // set query variables for passing to template parts
    set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

    // block preview
    if ( !empty( $block['data']['__is_preview'] ) ): ?>
      <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
  <?php return; endif;

?>

<section class="related-articles">
  <div class="container">
    <div class="related-articles__heading">
      <h2 class="">Related Articles</h2>
    </div>
    <div class="row align-items-center justify-content-between">
    <?php if($selected_posts) : foreach($selected_posts as $link) :
          $img_url = get_the_post_thumbnail_url(($link->ID), 'full'); 
    ?>
      <div class="col-lg-6">
        <a href="<?php echo get_the_permalink($link->ID); ?>" class="related-articles__block">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-4 p-0">
                <div class="related-articles__image">
                <?php if(isset($img_url) && !empty($img_url)) : ?>
                  <img src="<?php echo $img_url; ?>">
                   <?php else : ?> 
                      <img src="<?php echo get_template_directory_uri() ?>/assets/images/default-thumnail.jpg">
                  <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-8">
              <div class="related-articles__content">
                <h6><?php echo $link->post_title; ?></h6>

                <div class="links">Learn More<span><i class="fas fa-arrow-right"></i></span></div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <?php endforeach; endif; ?> 
    </div>   
  </div>
</section>