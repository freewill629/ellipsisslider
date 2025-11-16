<?php

	$header_logo = get_field('acf_header_logo','option');  
	$menu_locations = get_nav_menu_locations(); 
	$top_obj = get_term($menu_locations['main_navigation'], 'nav_menu');
	$top_menu = wp_nav_menu([
		'menu' => $top_obj->name,
		'depth' => 2,
		'container' => false,
		'items_wrap' => '%3$s',
		'echo' => false
	]);
//print_r($top_obj);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
    <div class="menu-row">
      <div class="menu-box">
        <a href="#" class="logo">
          <img src="<?php echo $header_logo; ?> " alt="logo">
        </a>
        <div id="mainmenu">
          <ul class="h_menu">
            <li class="megamenu">
		          <?php echo $top_menu; ?>
            </li>
            <li><a href="#" class="btns">Free Trial</a></li>

            <li><a href="#" class="btns">Schedule a Demo</a></li>

            <li><a href="#" class="search-btn"><i class="fas fa-search"></i></a></li>
          </ul>
        </div>
      </div>
    </div>


  </header>
