<?php 

	$closing_text = get_field('acf_closing_text','option');
	$social_media_icon = get_field('acf_social_media_icon','option');
	$acf_copyright = get_field('acf_copyright','option'); 

	

?>
  <footer class="footer">
    <div class="page-container box-padding">
      <div class="footer__top">
        <div class="row">
          <div class="col-lg-4">
            <p><?php echo $closing_text; ?> </p>
          </div>
          <div class="col-lg-8">
            <div class="newslatter-form">
              <form class="newsletter">
                <label for="email">Email*</label>
                <input class="required" type="email" id="email" name="email" />
                <button class="submit" type="submit" value="submit">Get Updates</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="footer__about-info">
        <div class="row">
          <div class="col-lg-3">
            <div class="footer__block">
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
              <h5>ABOUT CODELICIOUS</h5>
              <div class="footer__links">
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">Schedule a Demo</a></li>
                </ul>
              </div>
<?php endif; ?>
			  
              <div class="Address">
                <p>PO Box 3462<br>
                  Carmel, IN 46082</p>
              </div>
              <div class="contact-info">
                <a href="#">(317) 659-5700</a>
                <a href="#">info@codelicious.com</a>
              </div>
              <div class="social-icon">
                <ul>
					<?php if($social_media_icon) : foreach($social_media_icon as $value) : ?>
                  		<li><a href="<?php $value['acf_social_media_link'];?>"><i class="fab fa-<?php echo $value['acf_media_icon'];  ?>"></i></a></li> 
				  <?php endforeach; endif; ?> 
                </ul>
                <span><?php echo $acf_copyright; ?> </span>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer__block">
              <h5>CURRICULUM</h5>
              <div class="footer__links">
                <ul>
                  <li><a href="#">Overview Video</a></li>
                  <li><a href="#">K-12 Pathway</a></li>
                  <li><a href="#">Curriculum Resources</a></li>
                  <li><a href="#">Lesson Types</a></li>
                  <li><a href="#">My STEM Career</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer__block">
              <h5>RESOURCES</h5>
              <div class="footer__links">
                <ul>
                  <li><a href="#">Free Resources</a></li>
                  <li><a href="#">Code Bytes Newsletter</a></li>
                  <li><a href="#">Computer Science in Education </a></li>
                  <li><a href="#">Computer Science in Schools</a></li>
                  <li><a href="#">Computer Science Teacher Training</a></li>
                  <li><a href="#">K 12 Computer Science Standards</a></li>
                  <li><a href="#">United States K-12 Computer Science Standards</a></li>
                  <li><a href="#">How to Be a Good Digital Citizen</a></li>
                  <li><a href="#">STEM Careers List</a></li>
                  <li><a href="#">STEM Resources</a></li>
                  <li><a href="#">CTE Education</a></li>
                  <li><a href="#">Computer Science Curriculum for Elementary School</a></li>

                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer__block">
              <h5>HELP AND SUPPORT</h5>
              <div class="footer__links">
                <ul>
                  <li><a href="#">Customer Support</a></li>
                  <li><a href="#">Frequently Asked Questions</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Sitemap</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
  </footer>

<?php wp_footer(); ?>

</body>
</html>
