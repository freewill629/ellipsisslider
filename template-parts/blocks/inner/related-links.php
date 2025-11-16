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
    
    $id = 'acf-related-links-' . $block['id'];   
    // echo '<pre>';print_r($id); exit;  

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-related-links'; 
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }
    
    // Load values and assing defaults.
    $acf_select_column_type = get_field('acf_select_column_type'); 
    // print_r($acf_select_column_type); exit; 
    $title = get_field('acf_related_links_title');
    $acf_related_links_option = get_field('acf_related_links_option');
    // print_r($acf_related_links_option); exit; 
    $acf_choose_post_type = get_field('acf_choose_post_type');
  
    $acf_select_team_post = get_field('acf_select_team_post');  
    $acf_select_course_post = get_field('acf_select_course_post'); 

    $manually_link = get_field('acf_manually_link'); 


    // include file with color variables
    //include( get_template_directory() . '/template-parts/components/color-variables.php' );
    set_query_var( 'default_color', '#000' );

    // set query variables for passing to template parts
    set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

    // block preview
    if ( !empty( $block['data']['__is_preview'] ) ): ?>
        <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
    <?php return; endif;

if($acf_select_column_type == 'two'){
    $alignment = 'double-column';
}elseif($acf_select_column_type == 'one '){

    $alignment = 'one'; 
} 

?>


<?php if($acf_related_links_option == 'manually') : ?>
    <div class="related-links related-links--<?php echo $alignment; ?>">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 g-0">
                        <?php if(!empty($title)) : ?>
                            <h2><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <ul>
                            <?php if($manually_link) : foreach($manually_link as $link) : ?>
                                <?php if($link['acf_link']) : ?>
                                <li><a href="<?php echo $link['acf_link']['url']; ?>">
                                <?php echo $link['acf_link']['title']; ?>
                                </a></li>
                                <?php endif; ?>
                            <?php endforeach; endif; ?>
                        </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>   

<?php if($acf_related_links_option == 'automatic') : ?>
    <div class="related-links related-links--<?php echo $alignment; ?>">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8">
                        <?php if(!empty($title)) : ?>
                            <h2><?php echo $title; ?></h2>
                        <?php endif; ?>    
                        <ul>
                            <?php if($acf_choose_post_type == 'team') :?>
                                <?php if($acf_select_team_post) : foreach($acf_select_team_post as $link) : ?>
                                    <li><a href="<?php echo get_the_permalink(); ?>">
                                    <?php echo $link->post_title; ?>
                                    </a></li>
                                <?php endforeach; endif; ?>
                            <?php endif; ?>   
                            
                            <?php if($acf_choose_post_type == 'course') :?>
                                <?php if($acf_select_course_post) : foreach($acf_select_course_post as $link) : ?>
                                    <li><a href="<?php echo get_the_permalink(); ?>">
                                    <?php echo $link->post_title; ?>
                                    </a></li>
                                <?php endforeach; endif; ?>
                            <?php endif; ?>  
                        </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?> 


