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
    
    $id = 'acf-site-navigator-box-' . $block['id'];   
    // echo '<pre>';print_r($id); exit;  

    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" values.
    $class_name = 'acf-site-navigator-box'; 
    if( !empty($block['className']) ) {
        $class_name .= ' ' . $block['className'];
    }
    
    // Load values and assing defaults.
    $acf_site_navigator_box = get_field('acf_site_navigator_box'); 
    
    // include file with color variables
    //include( get_template_directory() . '/template-parts/components/color-variables.php' );
    set_query_var( 'default_color', '#000' );

    // set query variables for passing to template parts
    set_query_var( 'buttons', get_field('acf_block_homepage_hero_buttons') );

    // block preview
    if ( !empty( $block['data']['__is_preview'] ) ): ?>
<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png"
    style="max-width: 100%; height: auto;" />
<?php return; endif;

?>

<section class="library">
    <div class="page-container">
        <div class="library__grid">
            <div class="row">
                <?php if($acf_site_navigator_box) : foreach($acf_site_navigator_box as $key => $block) : ?>
                <div class="col-md-4">
                    <div class="library__box">
                        <a href="<?php echo $block['acf_snb_button']['url']; ?>">
                            <h3 class="library__heading"><?php echo $block['acf_snb_title']; ?></h3>
                        </a>
                        <p class="library__sub-heading"><?php echo $block['acf_snb_description']; ?>
                        </p>
                        <a href="<?php echo $block['acf_snb_button']['url']; ?>"
                            class="link"><?php echo $block['acf_snb_button']['title']; ?></a>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
        <div class="library-loadmore-btn">
            <a href="" class="load-more orangebtn orangebtn--solid orangebtn--medium-small">Load More</a>
        </div>
    </div>
</section>

<script>
jQuery(function() {
    jQuery(".library .col-md-4").slice(0, 42).show();
    jQuery("body").on('click touchstart', '.library-loadmore-btn .load-more', function(e) {
        e.preventDefault();
        jQuery(".library .col-md-4:hidden").slice(0, 3).slideDown();
        if (jQuery(".library .col-md-4:hidden").length == 0) {
            jQuery(".library-loadmore-btn .load-more").css('visibility', 'hidden');
        }
        // $('html,body').animate({
        //     scrollTop: $(this).offset().top
        // }, 1000);
    });
});
</script>