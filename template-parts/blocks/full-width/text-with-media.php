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



$id = 'acf-text-with-media-' . $block['id'];

// print_r($id); exit;

if (!empty($block['anchor'])) {

  $id = $block['anchor'];

}



// Create class attribute allowing for custom "className" values.

$class_name = 'acf-text-with-media';

if (!empty($block['className'])) {

  $class_name .= ' ' . $block['className'];

}



// Load values and assing defaults.

$media_headline = get_field('acf_text_with_media_headline'); 

$text_with_colorpicker = get_field('acf_text_with_colorpicker'); 

$font_color = get_field('acf_twm_font_color'); 

$media_text = get_field('acf_text_with_media_content');

$text_with_media_button_option = get_field('acf_text_with_media_button_option');

$acf_text_with_media_button_one = get_field('acf_text_with_media_button_one');  

$acf_text_with_media_select_button_color = get_field('acf_text_with_media_select_button_color');

$acf_text_with_media_select_button_style = get_field('acf_text_with_media_select_button_style'); 

$acf_text_with_media_button_two = get_field('acf_text_with_media_button_two');  

$acf_text_with_media_select_button_color_two = get_field('acf_text_with_media_select_button_color_two');

$acf_text_with_media_select_button_style_two = get_field('acf_text_with_media_select_button_style_two');  

// block preview

if (!empty($block['data']['__is_preview'])) : ?>

  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />

<?php return;

endif;  
?> 

<section class="text-with-media" style="background-color: <?php echo $text_with_colorpicker; ?>">

  <div class="page-container box-padding">

    <div class="row justify-content-center align-items-center">

      <div class="col-lg-9">

        <?php if (!empty($media_headline)) : ?>

          <h2 class="center-heading color-<?php echo $font_color; ?>">

            <?php echo $media_headline; ?>

          </h2>

        <?php endif; ?>





        <div class="text-with-media__descreption color-<?php echo $font_color; ?>">

          <?php echo $media_text; ?>

          <img src="<?php echo $media_image; ?>">

        </div>



        <?php if(!empty($acf_text_with_media_button_one)):  ?>

        <?php if ($text_with_media_button_option == 'one') { ?>

          <div class="text-with-media__btn">

            <a href="<?php echo $acf_text_with_media_button_one['url']; ?> " 
            class="<?php echo $acf_text_with_media_select_button_color;?> <?php echo $acf_text_with_media_select_button_color;?>--<?php echo $acf_text_with_media_select_button_style; ?> <?php echo $acf_text_with_media_select_button_color;?>--medium-small"> 
            <?php echo $acf_text_with_media_button_one['title']; ?></a>

          </div>

        <?php } ?>



        <?php if ($text_with_media_button_option == 'two') { ?>

          <div class="text-with-media__btn">

            <a href="<?php echo $acf_text_with_media_button_one['url']; ?> "
            class="<?php echo $acf_text_with_media_select_button_color;?> <?php echo $acf_text_with_media_select_button_color;?>--<?php echo $acf_text_with_media_select_button_style; ?> <?php echo $acf_text_with_media_select_button_color;?>--medium-small"> 
            <?php echo $acf_text_with_media_button_one['title']; ?></a>

            <a href="<?php echo $acf_text_with_media_button_two['url']; ?>" 
            class="<?php echo $acf_text_with_media_select_button_color_two;?> <?php echo $acf_text_with_media_select_button_color_two;?>--<?php echo $acf_text_with_media_select_button_style_two; ?> <?php echo $acf_text_with_media_select_button_color_two;?>--medium-small"> 
            <?php echo $acf_text_with_media_button_two['title']; ?></a>

          </div>

        <?php } ?>

        <?php endif; ?>

      </div>

    </div>

  </div>



</section>