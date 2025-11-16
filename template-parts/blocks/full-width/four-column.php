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

$id = 'acf-four-column-' . $block['id'];

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-four-column';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$four_column_option = get_field('acf_four_column_option');
// print_r($four_column_option); exit;
$four_column_colorpiker = get_field('acf_four_column_colorpiker');
$background_image = get_field('acf_fc_background_image');
$display_divider = get_field('acf_display_divider'); 
$diveder_option = get_field('acf_divider_option');  
$four_column_icon = get_field('acf_four_column_icon');
$four_column_title = get_field('acf_four_column_title');
$four_column_description = get_field('acf_four_column_description');
$four_column_repeater = get_field('acf_four_column_repeater');
$four_column_button  = get_field('acf_four_column_button');
$acf_four_column_button_select_style = get_field('acf_four_column_button_select_style'); 
$acf_four_column_select_button_color = get_field('acf_four_column_select_button_color'); 
$acf_four_column_select_button_style = get_field('acf_four_column_select_button_style'); 
$acf_display_font_color_style = get_field('acf_display_font_color_style'); 

 
$title_option  = get_field('acf_fc_title_option');  
set_query_var('default_color', '#000');
 
set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return;
endif;

if ($four_column_option == 'image') {
    $bg_option = "background-image: url(" . $background_image . ");
                      background-position: center center;background-attachment: 
                      fixed;background-repeat: no-repeat;background-size: cover";
                   
} elseif ($four_column_option == 'color') {
    $bg_option = 'background-color:' . $four_column_colorpiker;
   
}
?> 


<?php if(!empty($acf_display_font_color_style)): ?>
<style>
    .four-column-module-<?php echo $block['id']; ?> h5{
        color:<?php echo $acf_display_font_color_style; ?> !important;
    }
    .four-column-module-<?php echo $block['id']; ?> h6{
        color:<?php echo $acf_display_font_color_style; ?> !important;
    }
    .four-column-module-<?php echo $block['id']; ?> p{
        color:<?php echo $acf_display_font_color_style; ?> !important;
    }
    .four-column-module-<?php echo $block['id']; ?> h2{
        color:<?php echo $acf_display_font_color_style; ?> !important;
    }
    .four-column-module .border-bottom-<?php echo $block['id']; ?>{
        border-bottom-color: <?php echo $acf_display_font_color_style; ?> !important;
    }
</style>
<?php endif; ?>
<section class="four-column-module four-column-module-<?php echo $block['id']; ?>" style="<?php echo $bg_option; ?>">
    <div class="page-container box-padding">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9"> 
                <div class="center-module">
                <?php if (!empty($four_column_icon)) : ?>
                    <img src="<?php echo $four_column_icon; ?> ">
                <?php endif; ?>  
                     <?php if($title_option == 'small') :?>
                        <?php if (!empty($four_column_title)) : ?>
                            <h2 class="center-heading color-white">
                                <?php echo $four_column_title; ?>
                            </h2>
                        <?php endif; ?> 
                    <?php endif; ?> 
                        <?php if($title_option == 'large') :?>
                            <?php if (!empty($four_column_title)) : ?>
                                <h3 class="center-heading color-black">
                                    <?php echo $four_column_title; ?>
                                </h3> 
                            <?php endif; ?> 
                        <?php endif; ?>        
                    <?php if (!empty($four_column_description)) : ?>
                        <p style="margin-bottom: 0;"><?php echo $four_column_description; ?></p>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
        <?php if($display_divider == 'yes'){
                if($diveder_option == 'top' || $diveder_option == 'both'){ ?>
                  <div class="border-bottom border-bottom-<?php echo $block['id']; ?>" ></div>
                  <?php } 
        }
        ?>
        <div class="four-column-module__grid">
            <div class="container">
                <div class="row">
                    <?php if ($four_column_repeater) : foreach ($four_column_repeater as $value) : ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="four-column-module__box">
                                    <?php if(!empty($value['acf_repeater_image'])) : ?>
                                    <div class="four-column-module__image"> 
                                        <img class="img-fluid" src="<?php echo $value['acf_repeater_image'];?>"> 
                                    </div>
                                    <?php endif; ?>
                                    <div class="four-column-module__grid-box">
                                    <?php if (!empty($value['acf_repeater_text'])) : ?>
                                        <h5><?php echo $value['acf_repeater_text']; ?></h5>
                                    <?php endif; ?>
                                    <?php if (!empty($value['acf_repeater_description'])) : ?>
                                        <?php echo $value['acf_repeater_description']; ?> 
                                    <?php endif; ?>

                                    <?php if (!empty($value['acf_repeater_button']['title'])) : ?>
                                     
                                    <div class="four-column-module__single_btn">
                                        <a href="<?php echo $value['acf_repeater_button']['url']; ?>" 
                                        class="<?php echo $value['acf_repeater_select_button_color'];?> <?php echo $value['acf_repeater_select_button_color'];?>--<?php echo $value['acf_repeater_select_button_style']; ?> <?php echo $value['acf_repeater_select_button_color'];?>--small">
                                        <?php echo $value['acf_repeater_button']['title']; ?></a>  
                                    </div>
                                    <?php endif; ?>
                                    </div>  
                                </div>
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
        <?php if($display_divider == 'yes'){
                if($diveder_option == 'bottom' || $diveder_option == 'both'){ ?>
                  <div class="border-bottom border-bottom-<?php echo $block['id']; ?>"></div>
                  <?php } 
        }
        ?>
        <div class="four-column-module__btn">
            <?php if (!empty($four_column_button['title'])) : ?> 
                <a href="<?php echo $four_column_button['url']; ?>" 
                class="<?php echo $acf_four_column_select_button_color;?> <?php echo $acf_four_column_select_button_color;?>--<?php echo $acf_four_column_select_button_style; ?> <?php echo $acf_four_column_select_button_color;?>--medium-small"> 
                <?php echo $four_column_button['title']; ?>
                </a> 
            <?php endif; ?>
        </div>
    </div>
</section> 

 