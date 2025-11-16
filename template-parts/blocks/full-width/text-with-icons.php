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



$id = 'acf-text-with-icons-' . $block['id'];

// print_r($id); exit;  



if (!empty($block['anchor'])) {

  $id = $block['anchor'];

}



// Create class attribute allowing for custom "className" values.

$class_name = 'acf-text-with-icons';

if (!empty($block['className'])) {

  $class_name .= ' ' . $block['className'];

}
// Load values and assing defaults.

$text_with_icons = get_field('acf_text_with_icons');
$acf_twi_display_divider = get_field('acf_twi_display_divider'); 
$acf_twi_divider_option = get_field('acf_twi_divider_option'); 

// block preview

if (!empty($block['data']['__is_preview'])) : ?>

  <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />

<?php return;

endif;

?>

<section class="text-with-icons" style="background-color: #f5f5f5;">

  <div class="text-icons">

    <div class="container">

      <div class="row">

        <?php if ($text_with_icons) : foreach ($text_with_icons as $value) : 
          //print_r($value);
          ?>
          <?php if($acf_twi_display_divider == 'yes'){
                                if($acf_twi_divider_option == 'top' || $acf_twi_divider_option == 'both'){ ?>
                                <div class="border-bottom"></div>
                                <?php } 
                                }
                            ?>
            <div class="col-lg-3 col-6">
                  <a href="<?php echo $value['acf_twi_link']; ?>">
                  <?php if (!empty($value['acf_twi_image'])) : ?>
                      <img src="<?php echo $value['acf_twi_image']; ?>">
                  <?php endif; ?>
                    <?php if (!empty($value['acf_twi_text'])) : ?>
                      <h5><?php echo $value['acf_twi_text']; ?> </h5>
                    <?php endif; ?> 
                    <?php if (!empty($value['acf_twi_description'])) : ?>
                      <?php echo $value['acf_twi_description']; ?>
                    <?php endif; ?> 
              </a>
            </div>
        <?php endforeach;
        endif; ?> 
      </div> 
    </div>
            <?php if($acf_twi_display_divider == 'yes'){
                  if($acf_twi_divider_option == 'bottom' || $acf_twi_divider_option == 'both'){ ?>
                  <div class="border-bottom"></div>
                  <?php } 
                  }
            ?>
  </div>

</section>