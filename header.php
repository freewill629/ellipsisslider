<?php

$header_logo = get_field('acf_header_logo', 'option');
$acf_announcement_bar_text = get_field('acf_announcement_bar_text_', 'option');
$display_announcement_bar = get_field('acf_display_announcement_bar', 'option');
$acf_header_scripts = get_field('acf_header_scripts', 'option');

$menu_locations = get_nav_menu_locations();
$top_obj = get_term($menu_locations['main_navigation'], 'nav_menu');
$top_menu = wp_nav_menu([
  'menu' => $top_obj->name,
  'depth' => 3,
  'container' => false,
  'items_wrap' => '%3$s',
  'echo' => false
]);
//print_r($top_obj);
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico">
  <?php echo $acf_header_scripts; ?>
  <?php wp_head(); ?>
	<meta name="google-site-verification" content="KYnEpZhujcuxQ7QDMWj1G64pFBZRJk8Xxb5rthSz6Rs" />
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-GZ3SVC6G15"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-GZ3SVC6G15');
	</script>
  
  
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <?php if ($display_announcement_bar == 'yes') : ?>

    <?php if (!isset($_COOKIE['announcement-bar'])) { ?>
      <div class="announcement-bar">
        <div class="container">
          <p>
            <?php echo $acf_announcement_bar_text; ?>
          </p>
        </div>
        <div class="close-btn" id="close">
          <svg xmlns="http://www.w3.org/2000/svg" data-name="1" viewBox="0 0 128 128" width="256" height="256">
            <path d="m66.83 64 60.58-60.59a2 2 0 0 0 0-2.82 2 2 0 0 0-2.82 0L64 61.17 3.41.59a2 2 0 0 0-2.82 0 2 2 0 0 0 0 2.82L61.17 64 .59 124.59a2 2 0 0 0 0 2.82 2 2 0 0 0 2.82 0L64 66.83l60.59 60.58a2 2 0 0 0 2.82-2.82Z" fill="#000000" class="color000 svgShape"></path>
          </svg>
        </div>
      </div>
    <?php } ?>
  <?php endif; ?>

  <header>
    <div class="menu-row">
      <div class="menu-box">
        <a href="<?php echo get_site_url(); ?>" class="logo">
          <img src="<?php echo $header_logo; ?>" alt="logo">
        </a>
        <div id="mainmenu">
          <ul class="h_menu">
            <li><?php echo $top_menu; ?></li>

            <li><a href="<?php echo get_site_url() . '/free-trial'; ?>" class="btns">Take a Look</a></li>

            <li><a href="<?php echo get_site_url() . '/demo'; ?>" class="btns">Schedule a Demo</a></li>

            <li><a href="https://cdp.ellipsiseducation.com/login">Login</a></li>


            <li><a href="<?php echo get_site_url() . '/search'; ?>" class="search-btn"><i class="fas fa-search"></i></a></li>

          </ul>
        </div>
      </div>
    </div>


  </header>