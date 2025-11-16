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
    
    $id = 'acf-hero-cta-two-column-' . $block['id'];   

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-hero-cta-two-column';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $acf_hctc_select_to_background_option = get_field('acf_hctc_select_to_background_option'); 

    // print_r($acf_hctc_select_to_background_option); exit; 
    $acf_hero_two_column_image = get_field('acf_hero_two_column_image'); 
    $acf_hero_cta_two_column_background_color = get_field('acf_hero_cta_two_column_background_color'); 
    $acf_hero_two_column_header = get_field('acf_hero_two_column_header');
    $acf_hero_two_column_description = get_field('acf_hero_two_column_description');
    $acf_hero_two_column_form = get_field('acf_hero_two_column_form'); 
    $acf_hero_cta_two_column_sub_heading = get_field('acf_hero_cta_two_column_sub_heading'); 
    $acf_hero_cta_two_column_form_content_editor = get_field('acf_hero_cta_two_column_form_content_editor');
    $acf_heading_font_size = get_field('acf_heading_font_size');
    $acf_hctc_display_font_color_style = get_field('acf_hctc_display_font_color_style'); 

    // include file with color variables
    //include( get_template_directory() . '/template-parts/components/color-variables.php' );
    set_query_var( 'default_color', '#000' );

    // set query variables for passing to template parts
    set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

    // block preview
    if ( !empty( $block['data']['__is_preview'] ) ): ?>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
    <?php return; endif;

if ($acf_hctc_select_to_background_option == 'color') {

    $bg_option = 'background-color:' . $acf_hero_cta_two_column_background_color; 
                   
  } elseif ($acf_hctc_select_to_background_option == 'image') {
    $bg_option = "background-image: url(" . $acf_hero_two_column_image . ")";
   
  } 
?>

<?php if(!empty($acf_hctc_display_font_color_style)): ?>
<style>
    .heroCta-fullwidth--twocolumn-<?php echo $block['id']; ?> h1{
        color:<?php echo $acf_hctc_display_font_color_style; ?> !important;
    }
    .heroCta-fullwidth--twocolumn-<?php echo $block['id']; ?> h2{
        color:<?php echo $acf_hctc_display_font_color_style; ?> !important;
    }
    .heroCta-fullwidth--twocolumn-<?php echo $block['id']; ?> h3{
        color:<?php echo $acf_hctc_display_font_color_style; ?> !important;
    }
    .heroCta-fullwidth--twocolumn-<?php echo $block['id']; ?> p{
        color:<?php echo $acf_hctc_display_font_color_style; ?> !important;
    } 
</style>
<?php endif; ?>

<section class="heroCta-fullwidth heroCta-fullwidth--twocolumn heroCta-fullwidth--twocolumn-<?php echo $block['id']; ?>" style="<?php echo $bg_option; ?>">
    <div class="page-container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-9">
          <div class="inner_grid">
            
            <?php if(!empty($acf_hero_two_column_header)) : ?>
              <?php if($acf_heading_font_size == 'large') : ?>
                  <h1 class="hero__heading">
                    <?php echo $acf_hero_two_column_header; ?>
                  </h1> 
                <?php elseif($acf_heading_font_size == 'medium') : ?>
                  <h2 class="hero__heading">
                    <?php echo $acf_hero_two_column_header; ?>
                  </h2>
                <?php else : ?>
                   <h2 class="hero__heading">
                      <?php echo $acf_hero_two_column_header; ?>
                    </h2> 
              <?php endif; ?>   
            <?php endif; ?>  
            
            <?php if(!empty($acf_hero_cta_two_column_sub_heading)) : ?>
                <h3 class="hero__heading">
                <?php echo $acf_hero_cta_two_column_sub_heading; ?>
                </h3>
            <?php endif; ?> 

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7">
          <div class="heroCta-fullwidth__content">
            <?php echo $acf_hero_two_column_description; ?>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="heroCta-fullwidth__two-col-form">
          <?php echo $acf_hero_cta_two_column_form_content_editor; ?>
          </div>
        </div>
  </section>
