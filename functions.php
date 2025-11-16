<?php
define('THEME_URL', get_template_directory_uri());
/**
 * Codelicious functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Codelicious
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.1.0');
}



// /**
//  * Load Jetpack compatibility file.
//  */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// } 



require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require_once('inc/filters.php');
require_once('inc/acf-options-page.php');
require_once('inc/nav-menus.php');
require_once('inc/theme-support.php');
require_once('inc/enqueue-scripts.php');
require_once('inc/custom-header.php');
require_once('inc/custom-functions.php');
require_once('inc/acf-inner-blocks.php');
require_once('inc/acf-full-width-blocks.php');
require_once('inc/widget.php');
//include_once __DIR__ . '/inc/custom-post-types.php';


// ini_set('display_errors', 'on');
// ini_set('error_reporting', E_ALL);
// define('WP_DEBUG', true);
// define('WP_DEBUG_DISPLAY', true);
