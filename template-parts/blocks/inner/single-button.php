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
    $class_name = 'single-button';
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }

    // Load values and assing defaults.
    $acf_single_button_size = get_field('acf_single_button_size'); 
    $button_color = get_field('acf_single_button_color');
    $acf_single_button_select_style = get_field('acf_single_button_select_style'); 
    $font_color = get_field('acf_single_button_font_color'); 
    $acf_single_button_alignment = get_field('acf_single_button_alignment');  
    $acf_single_button_bg_color = get_field('acf_single_button_bg_color'); 
    $acf_single_button_select_button_color = get_field('acf_single_button_select_button_color'); 
    $acf_single_button_select_button_style = get_field('acf_single_button_select_button_style'); 
    $padding = get_field('acf_single_button_padding');  
    $acf_single_button_block = get_field('acf_single_button_block');
    $space = get_field('acf_single_button_spacing'); 


    

    if (!empty($block['data']['__is_preview'])) : ?>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-center.png" style="max-width: 100%; height: auto;"/>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-left.png" style="max-width: 100%; height: auto;"/>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-right.png" style="max-width: 100%; height: auto;"/>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-two.png" style="max-width: 100%; height: auto;"/>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>-three.png" style="max-width: 100%; height: auto;"/>

    <?php return;
    endif;

    if($acf_single_button_alignment=='left'){
        $aligment_class = '--left';
    }elseif($acf_single_button_alignment=='right'){
        $aligment_class = '--right';
    }else{
        $aligment_class = '';
    }

    if($acf_single_button_size=='small'){
        $size_class = 'whitebtn--small';
    }elseif($acf_single_button_size=='medium'){
        $size_class = 'whitebtn--medium-small';
    }else{
        $size_class = '';
    }

?>  

<div class="Singlebtn<?php echo $aligment_class; ?>" style="background-color: <?php echo $acf_single_button_bg_color; ?>; padding: <?php echo $padding; ?>px;">
    <div class="page-container">
    
        <?php if($acf_single_button_block) : foreach($acf_single_button_block as $button) :?>
        <?php if($button['acf_single_button']) : ?>
            <a href=" <?php echo $button['acf_single_button']['url']; ?>" 
             
            class="<?php echo $acf_single_button_select_button_color;?> <?php echo $acf_single_button_select_button_color;?>--<?php echo $acf_single_button_select_button_style; ?> <?php echo $acf_single_button_select_button_color;?>--medium-small 

            <?php echo $size_class; ?>" margin-right:<?php echo $space; ?>px;>
                <?php echo $button['acf_single_button']['title']; ?>
            </a>
        <?php endif; ?>
        <?php endforeach; endif; ?>
        </div>
</div>
