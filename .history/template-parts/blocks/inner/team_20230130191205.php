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
$acf_designation = get_field('acf_designation');




?>

<section class="team">
    <div class="container box-padding">
        <h3 class="center-heading color-black">
            <?php echo $acf_team_title; ?>
        </h3>
        <div class="row">
            <?php
            $lastposts = get_posts(array(
                'posts_per_page' =>  -1,
                'order' => 'ASC',
                'post_type' => 'team'
            ));

            // echo "<pre>";
            // print_r($lastposts);
            // exit;
            if ($lastposts) :
                foreach ($lastposts as $key => $post) : setup_postdata($post);
                    // echo "<pre>";
                    // print_r($post->post_title);
                    // exit;
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    echo $acf_designation;
                    exit;
            ?>


                    <div class="col-lg-3 col-md-6">
                        <div class="team__module">
                            <a href="#">
                                <img src="<?php echo $featured_img_url; ?>">
                                <h6> <?php echo $post->post_title;
                                        ?> </h6>
                            </a>
                            <span><?php echo get_field('acf_designation'); ?></span>
                        </div>
                    </div>
            <?php endforeach;

            endif; ?>
            <!-- <div class="col-lg-3 col-md-6">
                <div class="team__module">
                    <a href="#">
                        <img src="./images/Whitney.png">
                        <h6> Whitney Dove, Ph.D.</h6>
                    </a>
                    <span>VP of Product</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team__module">
                    <a href="#">
                        <img src="./images/Andy.png">
                        <h6> Andy Teipen</h6>
                    </a>
                    <span>VP of Sales</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team__module">
                    <a href="#">
                        <img src="./images/Sena.png">
                        <h6>Sena Hineline</h6>
                    </a>
                    <span>VP of Marketing</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team__module">
                    <a href="#">
                        <img src="./images/Gerrit.png">
                        <h6> Gerrit VanderLugt</h6>
                    </a>
                    <span>Sr. Director of Engineering & Technology</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="team__module">
                    <a href="#">
                        <img src="./images/Sharon.png">
                        <h6> Sharon Tuttle</h6>
                    </a>
                    <span>VP of Operations / Chief of Staff</span>
                </div>
            </div> -->

        </div>
    </div>
</section>