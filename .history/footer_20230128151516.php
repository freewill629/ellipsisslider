<?php

$closing_text = get_field('acf_closing_text', 'option');
$acf_copyright = get_field('acf_copyright', 'option');
$acf_address = get_field('acf_address', 'option');
$acf_contact_number = get_field('acf_contact_number', 'option');
$acf_contact_mail = get_field('acf_contact_mail', 'option');
$acf_copyright = get_field('acf_copyright', 'option');



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
            <?php if (is_active_sidebar('sidebar-2')) : ?>
              <?php dynamic_sidebar('sidebar-2'); ?>
            <?php endif; ?>

            <div class="Address">
              <?php echo $acf_address; ?>
            </div>
            <div class="contact-info">
              <a href="<?php echo $acf_contact_number['url']; ?>"><?php echo $acf_contact_number['title']; ?></a>
              <a href="<?php echo $acf_contact_mail['url']; ?>"><?php echo $acf_contact_mail'title']; ?></a>
            </div>
            <div class="social-icon">
              <ul>
                <?php if ($social_media_icon) : foreach ($social_media_icon as $value) : ?>
                    <li><a href="<?php $value['acf_social_media_link']; ?>"><i class="fab fa-<?php echo $value['acf_media_icon'];  ?>"></i></a></li>
                <?php endforeach;
                endif; ?>
              </ul>
              <span><?php echo $acf_copyright; ?> </span>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer__block">
            <?php if (is_active_sidebar('sidebar-3')) : ?>
              <?php dynamic_sidebar('sidebar-3'); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer__block">
            <?php if (is_active_sidebar('sidebar-4')) : ?>
              <?php dynamic_sidebar('sidebar-4'); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer__block">
            <?php if (is_active_sidebar('sidebar-5')) : ?>
              <?php dynamic_sidebar('sidebar-5'); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>