<?php
    /**
     * Social media Block Template.
     *
     * @param   array $block The block settings and attributes.
     * @param   string $content The block inner HTML (empty).
     * @param   bool $is_preview True during AJAX preview.
     * @param   (int|string) $post_id The post ID this block is saved to.
     */

    // Create id attribute allowing for custom "anchor" value.
    
    $id = 'acf-social-media-' . $block['id'];   
    // echo '<pre>';print_r($id); exit;  

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-social-media'; 
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }
    
    // Load values and assing defaults.
    $acf_social_media_block = get_field('acf_social_media_block');

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

<section class="share-btns">
  <div class="container">
    <div class="row">
        <div class="share-btns__social-links">
          <ul>
          <?php if($acf_social_media_block) : foreach($acf_social_media_block as $block) : ?>
            <li>
              <a href="<?php echo $block['acf_sm_link']; ?>"><i class="<?php echo $block['acf_social_meida_icons']; ?>"></i></a>
            </li>
            <?php endforeach; endif; ?> 
          </ul>
        </div>
    </div>
  </div>
</section>