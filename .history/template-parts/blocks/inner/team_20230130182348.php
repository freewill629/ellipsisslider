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
$acf_team_post_block = get_field('acf_team_post_block');
$acf_team_image = get_field('acf_team_image');
$acf_team_name = get_field('acf_team_name');
$acf_team_title = get_field('acf_team_title');
$acf_team_link = get_field('acf_team_link');
$acf_team_department = get_field('acf_team_department');

?>

<section class="team">
    <div class="container box-padding">
        <h3 class="center-heading color-black">
            Leadership team
        </h3>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="team__module">
                    <a href="#">
                        <img src="./images/Sara.png">
                        <h6> Sara Larco, CPA</h6>
                    </a>
                    <span>VP of Finance</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
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
            </div>

        </div>
    </div>
</section>