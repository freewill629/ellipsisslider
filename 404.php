<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Codelicious
 */

get_header();
?>

<main id="primary" class="site-main">

	<!-- <section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'codelicious'); ?></h1>
		</header>

		<div class="page-content">
			<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'codelicious'); ?></p>

			<?php
			get_search_form();

			the_widget('WP_Widget_Recent_Posts');
			?>

			<div class="widget widget_categories">
				<h2 class="widget-title"><?php esc_html_e('Most Used Categories', 'codelicious'); ?></h2>
				<ul>
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						)
					);
					?>
				</ul>
			</div>

			<?php
			$codelicious_archive_content = '<p>' . sprintf(esc_html__('Try looking in the monthly archives. %1$s', 'codelicious'), convert_smilies(':)')) . '</p>';
			the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$codelicious_archive_content");

			the_widget('WP_Widget_Tag_Cloud');
			?>

		</div>
	</section> -->



	<section class="cta-with-navigation" style="text-align: center">
		<div class="page-container box-padding">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-9">
					<div class="inner_grid">
						<h1 class="cta-with-navigation__heading">
							Looks like we have some de-bugging to do…
						</h1>

						<h5> (404 - PAGE NOT FOUND) </h5>

						<p> You can return to our homepage by <a href="<?php echo get_site_url(); ?>"> clicking here </a> , or you can try searching for the content you are seeking by <a href="<?php echo get_site_url() . "/search"; ?>"> clicking here </a>.
						<p>


						<div class="cta-with-navigation__links" style="text-align: left">
							<p> Or while you’re at it, consider: </p>

							<ul>
								<li> <a href="https://www.facebook.com/codeliciousHQ/"> Like Codelicious on Facebook </a> </li>

								<li> <a href="https://twitter.com/codelicioushq"> Follow us on Twitter </a> </li>

								<li> <a href="<?php echo get_site_url() . "/contact"; ?>"> Start a conversation </a> </li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="_social-icons">
			<ul>
				<li><a href="https://twitter.com/codelicioushq"><i class="fab fa-twitter"></i></a></li>
				<li><a href="https://www.linkedin.com/company/codelicious"><i class="fab fa-linkedin-in"></i></a></li>
				<li><a href="https://vimeo.com/codelicious"><i class="fab fa-vimeo-v"></i></a></li>
				<li><a href="https://www.facebook.com/codeliciousHQ/"><i class="fab fa-facebook-f"></i></a></li>
			</ul>
		</div>
	</section>



</main>

<style>
	._social-icons ul li a {
		color: #000;
		text-decoration: underline;
	}

	._social-icons ul li a:hover {
		color: #868c98;
	}

	._social-icons ul {
		display: flex;
		padding-left: 0;
		list-style: none;
		margin: 60px 0;
		align-items: center;
		justify-content: center;

	}

	._social-icons ul li {
		float: center;
		margin-right: 15px;
	}

	.cta-with-navigation__links a:hover {
		color: #0595a8;
		text-decoration: underline;
		opacity: 0.6;
	}

	a:hover {
		color: #0595a8;
		text-decoration: underline;
		opacity: 0.6;
	}

	h1 {
		color: #4a4a4a;
	}
</style>

<?php
get_footer();
