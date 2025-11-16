<?php

$background_color = get_field('acf_thf_background_color', 'option');   
$acf_thf_logo = get_field('acf_thf_logo', 'option');  
$acf_thf_title = get_field('acf_thf_title', 'option'); 
$closing_text = get_field('acf_closing_text', 'option');
$acf_copyright = get_field('acf_copyright', 'option'); 
$acf_copyright = get_field('acf_copyright', 'option');
$social_media_icon = get_field('acf_social_media_icon', 'option'); 

$acf_footer_location = get_field('acf_footer_location', 'option');
$acf_footer_image_of_location = get_field('acf_footer_image_of_location', 'option'); 
$acf_footer_contact_no = get_field('acf_footer_contact_no', 'option');
$acf_footer_telephone_logo = get_field('acf_footer_telephone_logo', 'option'); 
$acf_footer_mail_address = get_field('acf_footer_mail_address', 'option');
$acf_footer_mail_icon = get_field('acf_footer_mail_icon', 'option'); 
 
?>

<footer class="footer-winning" style="background-color: <?php echo $background_color; ?>">
    <div class="container">
    <div class="footer-winning__row">
      <div class="footer-winning__newsletter-module">
        <div class="row align-items-center">
          <div class="col-lg-6">
  
            <div class="f_info">
              <h6><?php echo $acf_thf_title; ?> </h6>
              <p> <?php echo $closing_text; ?>
                </p>
            </div>
  
          </div>
  
          <div class="col-lg-6">
            <div class="newslatter">

            <?php //echo do_shortcode('[hubspot type="form" portal="2863624" id="3a9ed306-53ef-41d2-8402-8197230b0ec6"]'); ?>
              <!-- <form>
                <input class="required" type="email" id="email" name="email" placeholder="Enter Email Address" />
                <button class="submit" type="submit" value="submit">Get Updates</button>
              </form> -->
              <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
<script>
  hbspt.forms.create({
    region: "na1",
    portalId: "2863624",
    formId: "3a9ed306-53ef-41d2-8402-8197230b0ec6"
  });
</script>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-winning__contact-info">
        <div class="logo">
          <img src="<?php echo $acf_thf_logo; ?>">
        </div>
        <div class="location"><img src="<?php echo $acf_footer_image_of_location ?>"><span><?php echo $acf_footer_location ?></span></div>
        <div class="call"><img src="<?php echo $acf_footer_telephone_logo ?>"><a href="tel:<?php echo $acf_footer_contact_no ?>"><span><?php echo $acf_footer_contact_no ?></span></a></div>
        <div class="email"><img src="<?php echo $acf_footer_mail_icon ?>"><a href="mailto:<?php echo $acf_footer_mail_address ?>"> <span><?php echo $acf_footer_mail_address ?></span></a></div>
      </div>
      <div class="footer-winning__links Desktop-footer">
        <div class="row align-items-baseline">
          <div class="col-lg-3">
              <div class="footer-winning__menulink">
              <?php if (is_active_sidebar('sidebar-2')) : ?>
              <?php dynamic_sidebar('sidebar-2'); ?>
            <?php endif; ?>
              </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-winning__menulink">
            <?php if (is_active_sidebar('sidebar-3')) : ?>
              <?php dynamic_sidebar('sidebar-3'); ?>
            <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-winning__menulink">
            <?php if (is_active_sidebar('sidebar-5')) : ?>
              <?php dynamic_sidebar('sidebar-5'); ?>
            <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-winning__menulink"> 
              <ul class="resources-link">
                <?php if (is_active_sidebar('sidebar-4')) : ?>
                  <?php dynamic_sidebar('sidebar-4'); ?>
                <?php endif; ?> 
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-winning__links Mobile-footer">
        <div class="row">
          <div class="col-lg-3">
      
              <div class="footer-winning__menulink">
              <?php if (is_active_sidebar('sidebar-2')) : ?>
              <?php dynamic_sidebar('sidebar-2'); ?>
            <?php endif; ?>
              </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-winning__menulink">
            <?php if (is_active_sidebar('sidebar-3')) : ?>
              <?php dynamic_sidebar('sidebar-3'); ?>
            <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-winning__menulink">
            <?php if (is_active_sidebar('sidebar-5')) : ?>
              <?php dynamic_sidebar('sidebar-5'); ?>
            <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-winning__menulink"> 
              <ul class="resources-link">
                <?php if (is_active_sidebar('sidebar-4')) : ?>
                  <?php dynamic_sidebar('sidebar-4'); ?>
                <?php endif; ?> 
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  <div class="footer-winning__bottom">
    <div class="container">
      <div class="footer-winning__bottom-row">
        <div class="footer-winning__copyright">
          <span><?php echo $acf_copyright; ?></span>
        </div>
        <div class="footer-winning__social-icons">
          <ul>
              <?php if ($social_media_icon) : foreach ($social_media_icon as $value) : 
               // echo '<pre>'; print_r($value['acf_social_media_link']); 
                ?>
                    <li><a href="<?php echo $value['acf_social_media_link']; ?>"><i class="fab fa-<?php echo $value['acf_media_icon'];  ?>"></i></a></li>
              <?php endforeach; endif; ?>
          </ul>
        </div>
        
      </div>
    </div>
  </div>
  </footer>

<?php wp_footer(); ?>

</body>

</html>