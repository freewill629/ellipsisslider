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
$id = 'acf-team-' . $block['id'];
// echo '<pre>';print_r($id); exit;  
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-team';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assing defaults.
$acf_team_title = get_field('acf_team_title');
//$acf_designation = get_field('acf_designation');


// block preview
if ( !empty( $block['data']['__is_preview'] ) ): ?>
    <img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return; endif;

?> 

<section class="team">
    <div class="container box-padding">
        <?php if (!empty($acf_team_title)) : ?>
            <h2 class="center-heading color-black">
                <?php echo $acf_team_title; ?>
            </h2>
        <?php endif; ?>
        <div class="row">
            <?php
            $lastposts = get_posts(array(
                'posts_per_page' =>  -1,
                'order' => 'ASC',
                'post_type' => 'team'
            ));
            if ($lastposts) :
                foreach ($lastposts as $key => $post) : setup_postdata($post);
                    $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
            ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="team__module">
                            <a href="#">
                                <img src="<?php echo $featured_img_url; ?>">
                                <h6> <?php echo $post->post_title;
                                        ?> </h6>
                            </a>
                            <span><?php echo get_field('acf_team_designation', $post->ID); ?></span>
                        </div>
                    </div>
            <?php endforeach;

            endif; ?>
        </div>
    </div>
</section>