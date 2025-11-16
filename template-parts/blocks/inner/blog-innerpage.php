<?php

/**
 * Blog blog-innerpage Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'acf-blog-innerpage' . $block['id'];
// echo '<pre>';print_r($id); exit;  
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" values.
$class_name = 'acf-blog-innerpage';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// block preview
if ( !empty( $block['data']['__is_preview'] ) ): ?>
	<img src="<?= get_template_directory_uri(); ?>/inc/block-previews/<?= $class_name; ?>.png" style="max-width: 100%; height: auto;" />
<?php return; endif;

// Load values and assing defaults.

$acf_post_block_author = get_field('acf_post_block_author');
$acf_post_block_author_profile_photo = get_field('acf_post_block_author_profile_photo');
$acf_authors_designation = get_field('acf_authors_designation');
$acf_bloginner_page_description = get_field('acf_bloginner_page_description');

$category = get_the_category(); 


//echo '<pre>'; print_r($taxonomyID); exit;

?>

<section class="blog-innerpage">
				<div class="page-container">
					<div class="blog-innerpage__heading">
						<h1 class="center-heading"> <?php the_title(); ?> </h1>
						<div class="blog-innerpage__category">
							<span class="date"> <?php echo get_the_date(); ?> </span>
						</div>
						<?php if(!empty($acf_post_block_author_profile_photo) || !empty($acf_post_block_author) || !empty($acf_authors_designation)): ?>
							<div class="blog-innerpage__authorinfo">
								<?php if(!empty($acf_post_block_author_profile_photo)): ?>
									<div class="author-image"><img class="img-fluid" src="<?php echo $acf_post_block_author_profile_photo; ?>"> </div>
								<?php endif; ?>
								<?php if(!empty($acf_post_block_author) || !empty($acf_authors_designation) ): ?>
									<div class="author-name">
										<span> <?php echo $acf_post_block_author; ?> </span>
										<span> <?php echo $acf_authors_designation; ?> </span>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>					
				</div>
		</section>

