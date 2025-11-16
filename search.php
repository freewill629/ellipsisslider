<?php

/* Template Name: Search Template */

get_header();
?>

<main id="primary" class="site-main">
	<div class="page-container box-padding">

		<?php echo do_shortcode('[ivory-search id="3409" title="Custom Search Form"]'); ?>
		<?php if (have_posts()) : ?>

			<div>
				<h5 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf(esc_html__(' Search Results for: %s', 'codelicious'), '<span>' . get_search_query() . '</span>');
					?>
				</h5>
			</div><!-- .page-header -->

		<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part('template-parts/content', 'search');

			endwhile;

			the_posts_navigation();

		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>
	</div>
</main><!-- #main -->
<style>
.is-form-style input.is-search-input{
    height: 60px;
    font-size: 30px !important;
    color: #4a4a4a;
    padding: 10px;
    position: relative;
}                                          
.page-template-search .is-form-style{
padding-top: 80px;
}
.is-form-style input.is-search-input::placeholder{
    color: #ddd;
    font-size: 28px;
}
</style>
<?php
get_sidebar();
get_footer();
