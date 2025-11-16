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
    $id = 'acf-image-with-text-' . $block['id'];
    // echo '<pre>';print_r($block); exit;  
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-image-with-text';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    
  if (!empty($block['data']['__is_preview'])) : ?>
      <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;"/>
  <?php return;
  endif;

    // Load values and assing defaults.
    $acf_iwt_image_layout = get_field('acf_iwt_image_layout'); 
    $acf_iwt_image_option = get_field('acf_iwt_image_option');   
    $acf_iwt_image = get_field('acf_iwt_image'); 
    $acf_iwt_thumbnail = get_field('acf_iwt_thumbnail');  
    $acf_iwt_text = get_field('acf_iwt_text');
    $acf_iwt_text_two = get_field('acf_iwt_text_two');


    if($acf_iwt_image_layout == 'full'){
      $layout = '9';
    }elseif($acf_iwt_image_layout == 'half'){
      $layout = '6';
    }

  // echo '<pre>'; print_r($acf_iwt_image_option); 
    
?> 
<section class="image-caption-module">
  <div class="container">
    <div class="row justify-content-center">
      
      <div class="<?php echo $acf_iwt_image_layout == 'third' ? 'col-md-9' : 'col-md-'.$layout.''?>">
        <div class="image-caption-module__image">
          <img src="<?php echo $acf_iwt_image; ?>">
          <h6><?php echo $acf_iwt_text; ?></h6>
        </div>
      </div>
      <?php if($acf_iwt_image_option == 'two' || $acf_iwt_image_option == 'two-text') :?>
      <div class="<?php echo $acf_iwt_image_layout == 'third' ? 'col-md-3' : 'col-md-'.$layout.''?>">
        <div class="image-caption-module__image">
          <img src="<?php echo $acf_iwt_thumbnail; ?>">
          <h6><?php echo $acf_iwt_text_two; ?></h6>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>