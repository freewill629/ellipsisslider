<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Codelicious
 */

get_header();
echo the_content();

  $prev = get_adjacent_post(false,'',true); 
  $next = get_adjacent_post(false,'',false);
  $imageurl = get_the_post_thumbnail_url(get_the_ID(), 'full'); 

  
?>
<section class="share-btns">
  <div class="container">
    <div class="row">
        <div class="share-btns__social-links">
          <ul>
            <li>
            <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()) ?>" ><i class="fab fa-facebook-f"></i></a>
            </li>
            <li>
              <a href="http://twitter.com/intent/tweet?text=<?php the_title();?>;&amp;url=<?php the_permalink(); ?>&via=<?php the_author_meta('twitter'); ?>"><i class="fab fa-twitter"></i></a>
            </li>
            <li>
              <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>"><i class="fab fa-linkedin-in"></i></a>
            </li>
            <li>
              <a href="https://www.reddit.com/submit?url=<?php the_permalink(); ?>"><i class="fab fa-reddit-alien"></i></a>
            </li>
            <li>
              <a href="https://www.tumblr.com/share/link?url=<?php the_permalink(); ?>"><i class="fab fa-tumblr"></i></a>
            </li>
            <li>
              <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $imageurl ?>"><i class="fab fa-pinterest-p"></i></a>
            </li>
            <!-- <li>
              <a href="<?php the_permalink(); ?>"><i class="fas fa-heart"></i></a>
            </li> -->
          </ul>
        </div>
    </div>
  </div>
</section>

<div class="next-prev-blog"> 
	<div class="page-container">
			<div class="row">
				<div class="col-lg-6">
				<div class="previous-blog">
				<a href="<?php echo get_the_permalink($prev->ID);?>"><span>Previous</span>
				<p><?php echo get_the_title($prev->ID );?></p></a>
				</div>
				</div> 
					<div class="col-lg-6">                                
					<div class="next-blog">
					<a href="<?php echo get_the_permalink($next->ID);?>"><span>Next</span>
					<p><?php echo get_the_title($next->ID );?></p> </a>
					</div>
					</div>
			</div>		
	</div>
</div>
<?php
get_footer();
