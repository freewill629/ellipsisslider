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
    $id = 'acf-featured-post-' . $block['id'];
    // echo '<pre>';print_r($block); exit;  
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-featured-post';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $acf_fp_background_color = get_field('acf_fp_background_color'); 
    $acf_fp_title = get_field('acf_fp_title');
    $acf_fp_description = get_field('acf_fp_description'); 
    $acf_fp_select_post_type = get_field('acf_fp_select_post_type');  
    $acf_fp_button = get_field('acf_fp_button');
    $acf_fp_title_font_color = get_field('acf_fp_title_font_color');

    $title = strtolower($acf_fp_title);
    $id = str_replace(' ', '-', $title);

    

   //print_r($acf_fp_title_font_color); //exit; 



    // echo '<pre>'; print_r($acf_fp_button); exit; 

    if (!empty($block['data']['__is_preview'])) : ?>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;"/>
    <?php return;
    endif;

?> 

<section id="<?php echo $id; ?>" class="feacture-post <?php echo $acf_fp_title_font_color == 'dark' ? 'feacture-post--dark' : '' ?>" style="background-color: <?php echo $acf_fp_background_color; ?>">
    <div class="container box-padding">
      <div class="row align-items-center justify-content-center ">
        <div class="col-lg-8">
          <div class="feacture-post__content">
            <h2><?php echo $acf_fp_title; ?></h2>
            <?php echo $acf_fp_description; ?>
          </div>
        </div>
      </div> 
        
      <div class="feacture-post__grid">
        <?php   foreach($acf_fp_select_post_type as $post_id) {    
                $post = get_post($post_id);  
                setup_postdata($post);  
               // $img_url = get_field('acf_course_image', $post->ID);
                $img_url = get_the_post_thumbnail_url($post->ID, 'full');?>
     
            <div class="feacture-post__blog">
            <a href="<?php echo get_permalink($post->ID);?>">
                <div class="feacture-post__image">
               <?php if(isset($img_url) && !empty($img_url)) : ?>
                  <img src="<?php echo $img_url; ?>">
                  <?php else : ?>
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/default-featured-thumbnail.png">
                  <?php endif; 
                  ?>
                </div>
                <h4><?php echo get_the_title($post->ID); ?></h4>
            </a>
            <span><?php echo get_the_date(); ?></span>
            </div>  
       <?php   }  wp_reset_postdata(); 
         ?>
      </div> 
      <?php if($acf_fp_button): ?>
      <div class="feacture-post__btn">
        <a href=" <?php echo $acf_fp_button['url']; ?>" class="whitebtn whitebtn--medium-small">
            <?php echo $acf_fp_button['title']; ?>
        </a>
      </div>
      <?php endif;?>
    </div>
  </section>