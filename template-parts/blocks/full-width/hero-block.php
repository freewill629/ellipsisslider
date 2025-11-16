<?php

/**
 * Center Content With Tabs Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.

$id = 'acf_hero_block' . $block['id'];
// echo 'shiv';print_r($id); exit;  

if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf_hero_block';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$acf_hs_image = get_field('acf_hb_image');
$acf_hs_title = get_field('acf_hb_title');
$acf_hs_description = get_field('acf_hb_description');

$acf_hb_button_option = get_field('acf_hb_button_option');

$acf_hb_button_one = get_field('acf_hb_button_one');

$acf_hb_select_button_color = get_field('acf_hb_select_button_color');



$acf_hb_select_button_style = get_field('acf_hb_select_button_style');

$acf_hb_button_two = get_field('acf_hb_button_two'); 

$acf_hb_select_button_color_two = get_field('acf_hb_select_button_color_two');
 
$acf_hb_select_button_style_two = get_field('acf_hb_select_button_style_two'); 

 



// acf_center_content_with_tab_title
// acf_center_content_with_tabs_inner_tab
// acf_center_content_with_tabs_inner_tab_title



set_query_var('default_color', '#000');

// set query variables for passing to template parts
set_query_var('buttons', get_field('acf_block_homepage_hero_buttons'));

// block preview
if (!empty($block['data']['__is_preview'])) : ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.jpg" style="max-width: 100%; height: auto;" />
<?php return;
endif;
?>

<section class="hero_banner_main">
        <div class="container">
            <div class="hero_banner">
                <div class="hero_banner__inner">
                    <div class="hero_banner__details">
                        <h3 class="styleh3"><?php echo $acf_hs_title; ?> </h3>
                        <?php echo $acf_hs_description; ?> 

                        <?php if(!empty($acf_hb_button_one)) :?> 
                            <?php if($acf_hb_button_option == 'one') { ?> 
                                <div class="hero_banner__btns-solid-transperant">
                                    <a href="<?php echo $acf_hb_button_one['url']; ?>"class="<?php echo $acf_hb_select_button_color;?> <?php echo $acf_hb_select_button_color;?>--<?php echo $acf_hb_select_button_style; ?> <?php echo $acf_hb_select_button_color;?>--medium-small"><?php echo $acf_hb_button_one['title']; ?></a>
                                </div>
                            <?php } ?> 
                        <?php endif; ?> 
                       
                        <?php if(!empty($acf_hb_button_two)) : ?> 
                            <?php if($acf_hb_button_option == 'two') 
                            
                            {   ?> 
                                <div class="hero_banner__btns-solid-transperant">

                                    <a href="<?php echo $acf_hb_button_one['url']; ?>"class="<?php echo $acf_hb_select_button_color;?> <?php echo $acf_hb_select_button_color;?>--<?php echo $acf_hb_select_button_style; ?> <?php echo $acf_hb_select_button_color;?>--medium-small"><?php echo $acf_hb_button_one['title']; ?></a>

                                    <a href="<?php echo $acf_hb_button_two['url']; ?>"class="<?php echo $acf_hb_select_button_color_two;?> <?php echo $acf_hb_select_button_color_two;?>--<?php echo $acf_hb_select_button_style_two; ?> <?php echo $acf_hb_select_button_color_two;?>--medium-small"><?php echo $acf_hb_button_two['title']; ?></a>
                                </div>
                            <?php } ?> 
                        <?php endif; ?> 
                    </div>
                    <div class="hero_banner__curvedimage">

                        <div class="curvedimage-img">
                            <img src="<?php echo $acf_hs_image; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>