<?php



/*

* Let WordPress manage the document title.

* This theme does not use a hard-coded <title> tag in the document head,

* WordPress will provide it for us.

*/

add_theme_support('title-tag');





/*

* Enable support for Post Thumbnails on posts and pages.

*

* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/

*/

add_theme_support('post-thumbnails');





/*

* Switch default core markup for search form, comment form, and comments

* to output valid HTML5.

*/

add_theme_support(

    'html5',

    array(

        'search-form',

        'comment-form',

        'comment-list',

        'gallery',

        'caption',

        'style',

        'script',

    )

);





/**

 * Disable Gutenberg Blocks. (OMG!)

 */

global $wp_version;

if (version_compare($wp_version, '5', '>=')) {

    add_filter('use_block_editor_for_post', '__return_false', 10);

    add_action('wp_enqueue_scripts', function () {

        wp_dequeue_style('wp-block-library');
    }, 100);
}



// Speed up ACF

add_filter('acf/settings/remove_wp_meta_box', '__return_true');





// Disable Editor for page

add_action('init', function () {

    remove_post_type_support('page', 'editor');
}, 99);





// Add woocommerce support to your theme (Visible to product detail page)

function mytheme_add_woocommerce_support()

{

    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');





// Limit Text

function limit_text($text, $limit)

{

    if (str_word_count($text, 0) > $limit) {

        $words = str_word_count($text, 2);

        $pos = array_keys($words);

        $text = substr($text, 0, $pos[$limit]) . '...';
    }

    return $text;
}



// Get First Paragraph

function get_first_paragraph()

{

    global $post;

    $str = wpautop(get_the_content());

    $str = substr($str, 0, strpos($str, '</p>') + 4);

    $str = strip_tags($str, '<a><strong><em>');

    return $str;
}





// Remove Wordpress body classes on search page

add_filter('body_class', 'alter_search_classes');

function alter_search_classes($classes)

{

    if (is_search()) {

        return array();
    } else {

        return $classes;
    }
}
