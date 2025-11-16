<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Codelicious
 */

?>


<article id="post-<?php the_ID(); ?>" class="search-bar-content" <?php post_class(); ?>>

<div class="search-article">

	<div class="search-image">
		<?php codelicious_post_thumbnail(); ?>
	</div>

	<div class="search-desc">
		<header class="entry-header">
			<?php the_title(sprintf('<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>

			<?php if ('post' === get_post_type()) : ?>
				<div class="entry-meta">
					<?php
					codelicious_posted_on();
					codelicious_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header>	

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div>

</div>
	
	
</article><!-- #post-<?php the_ID(); ?> -->

<style>
	.search-bar-content{		
		padding: 20px 0;
    border-top: 1px solid #ddd; 
	}
	.search-article{
		display: flex;	
	}
	.search-image .post-thumbnail{
		margin-right:20px;
	}
	.search-image img{
		height: 200px;
		width: 200px;		
	}
	.search-desc header{
		background-color: transparent;
		margin-bottom:10px;
	}
	.search-desc .entry-title a:hover
	{
		color: #000;
	}
	.navigation.posts-navigation .nav-links a{
	    color: #e27940;
    font-size: 18px;
    font-weight: 600;
    text-transform: capitalize;
    padding: 10px;
    border: 2px solid #e27940;
    line-height: 20px;
    display: inline-block;
	}
	.nav-links{
		text-align: center;
	}
	.search-results #primary{
		margin-bottom:50px;
	}

	@media screen and (max-width: 600px) { 
		.search-article {
				display: block;
			}
			.search-image{
				text-align: center;
			}
			.search-image .post-thumbnail img {
				margin-right: 0;
				margin-bottom:20px;
			}

	}
</style>