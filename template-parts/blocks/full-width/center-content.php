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

$id = 'acf-center-content-' . $block['id'];

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$class_name = 'acf-center-content';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}


$acf_center_content_colorpicker = get_field('acf_center_content_colorpicker');
$acf_center__content = get_field('acf_center__content');
$acf_center_content_button = get_field('acf_center_content_button');
$acf_center_content_select_button_color = get_field('acf_center_content_select_button_color');
$acf_center_content_select_button_style = get_field('acf_center_content_select_button_style');

$acf_center_centent_button_select_style = get_field('acf_center_centent_button_select_style');



// print_r($font_color); exit; 


//set_query_var('default_color', '#4a4a4a');


set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return;
endif;

?> 

<section class="center-content-module" style="background-color: <?php echo $acf_center_content_colorpicker; ?>;">
    <div class="page-container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9">
                <?php if ($acf_center__content) : foreach ($acf_center__content as $center__content) : ?>
                        <?php if ($center__content['acf_display_divider'] == 'yes') {
                            if ($center__content['acf_divider_option'] == 'top' || $center__content['acf_divider_option'] == 'both') { ?>
                                <div class="border-bottom"></div>
                        <?php }
                        }
                        ?>
                <?php endforeach;
                endif; ?>
                <?php if ($acf_center__content) : foreach ($acf_center__content as $center__content) :
                        $alignment = $center__content['acf_center_content_style_option'];
                        $font_size = $center__content['acf_center_content_heading_font_size'];

                        $title1 = strtolower($center__content['acf_center_content_heading']);
                        $title2 = str_replace('!', '', $title1);
                        $id = str_replace(' ', '-', $title2);

                        if($center__content['acf_center_content_description_font_color'] == 'white' && empty($center__content['acf_heading_color_option_one'])) {
                            $themeColor  = 'white';
                        }elseif($center__content['acf_center_content_description_font_color'] == 'black' && empty($center__content['acf_heading_color_option_one']))
                        {
                             $themeColor  = 'black';
                        }else{
                            $themeColor  = $center__content['acf_heading_color_option_one'];
                        }
                        //echo '<pre>';
                        // print_r($center__content['acf_center_content_description_font_color']); //exit;   


                ?>

                        <div class="center-content-module__column">
                            <?php if (!empty($center__content['acf_center_content_heading'])) : ?> 
                                <?php if($font_size == 'large') : ?>
                                    <h2 id="<?php echo $id; ?>" class="<?php echo $alignment; ?>-heading font_size_<?php echo $font_size; ?> color-<?php echo $themeColor; ?>">
                                    <?php echo $center__content['acf_center_content_heading']; ?>
                                    </h2>
                                <?php endif; ?>   
                                
                                <?php if($font_size == 'medium') : ?>
                                    <h3 id="<?php echo $id; ?>" class="<?php echo $alignment; ?>-heading font_size_<?php echo $font_size; ?> color-<?php echo $themeColor; ?>">
                                        <?php echo $center__content['acf_center_content_heading']; ?>
                                    </h3>
                                <?php endif; ?>  

                                <?php if($font_size == 'small') : ?>
                                    <h4 id="<?php echo $id; ?>" class="<?php echo $alignment; ?>-heading font_size_<?php echo $font_size; ?> color-<?php echo $themeColor; ?>">
                                        <?php echo $center__content['acf_center_content_heading']; ?>
                                    </h4>
                                <?php endif; ?> 
                            <?php endif; ?>
                    <?php if(is_single()): ?>
                        <?php if(get_post_type() == 'featured'): ?>
                                <?php if($center__content['acf_center_content_display_date'] == 'yes') :?>
                                    <div class="blog-innerpage__category" style="text-align:center; margin-bottom:30px;">
                                        <span class="date"><?php echo get_the_date(); ?>  </span>
                                    </div>
                                <?php endif; ?>
                             <?php endif; ?>
                             <?php endif; ?>

                            <?php if (!empty($center__content['acf_center_content_description'])) : ?>
                                <div class="color-<?php echo $center__content['acf_center_content_description_font_color']; ?>">
                                    <?php echo $center__content['acf_center_content_description']; ?> </div>
                            <?php endif; ?>

                            <?php if (!empty($acf_center_content_button)) : ?>
                                <div class="center-content-module__btn">
                                    <a href="<?php echo $acf_center_content_button['url']; ?>" 
                                    class="<?php echo $acf_center_content_select_button_color;?> <?php echo $acf_center_content_select_button_color;?>--<?php echo $acf_center_content_select_button_style; ?> <?php echo $acf_center_content_select_button_color;?>--medium-small"> 
                                     <?php echo $acf_center_content_button['title']; ?></a>
                                </div>
                            <?php endif; ?>

                            <?php if ($center__content['acf_display_divider'] == 'yes') {
                                if ($center__content['acf_divider_option'] == 'bottom' || $center__content['acf_divider_option'] == 'both') { ?>
                                    <div class="border-bottom"></div>
                            <?php }
                            }
                            ?>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</section>