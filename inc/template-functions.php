<?php

/**
 *   Default template builder
 *
 *   @package Crunch
 *   @since 5.1.1
 */

if (function_exists('acf_add_local_field_group')) {

    acf_add_local_field_group(array(
        'key' => 'group_5f1e9925dfb57',
        'title' => 'Custom post type',
        'fields' => array(
            array(
                'key' => 'field_5f1e9974a96ae',
                'label' => 'Select post type',
                'name' => 'post_type',
                'type' => 'post_type_selector',
                'instructions' => 'Select post type to set default template',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'select_type' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'defaults',
                ),
            ),
        ),
        'menu_order' => 1,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
}

function defaults_cpt()
{

    register_post_type(
        'team',

        array(
            'labels' => array(
                'name' => __('Team'),
                'singular_name' => __('Team')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-media-document',
            'supports' => ['title', 'page-attributes', 'custom-fields', 'editor', 'thumbnail', 'revisions'],

        )
    );

    //remove_post_type_support('team', 'editor');
}

add_action('init', 'defaults_cpt');



function cpt_defaults()
{

    register_post_type(
        'Course',

        array(
            'labels' => array(
                'name' => __('Course'),
                'singular_name' => __('Course')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-media-document',
            'supports' => ['title', 'page-attributes', 'custom-fields', 'editor', 'thumbnail', 'revisions'],
        )
    );

    $args = array(
        'hierarchical'      => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'course-category'),
    );

    register_taxonomy('course-category', array('course'), $args);
}

add_action('init', 'cpt_defaults');

function pilot_course()
{

    register_post_type(
        'Pilot-Course',

        array(
            'labels' => array(
                'name' => __('Pilot Course'),
                'singular_name' => __('Pilot Course')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-media-document',
            'supports' => ['title', 'page-attributes', 'custom-fields', 'editor', 'thumbnail', 'revisions'],
        )
    );
}

add_action('init', 'pilot_course');

function featured()
{

    register_post_type(
        'Featured',

        array(
            'labels' => array(
                'name' => __('My STEM Career'),
                'singular_name' => __('My STEM Career')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'rewrite' => array(
                'slug' => 'my-stem-career'
            ),
            'menu_icon' => 'dashicons-media-document',
            'supports' => ['title', 'page-attributes', 'custom-fields', 'editor', 'thumbnail', 'revisions'],


        )
    );
}

add_action('init', 'featured');


function testimonial()
{

    register_post_type(
        'Testimonial',

        array(
            'labels' => array(
                'name' => __('Testimonial'),
                'singular_name' => __('Testimonial')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-media-document',
            'supports' => ['title', 'page-attributes', 'custom-fields', 'editor', 'thumbnail', 'revisions'],


        )
    );

    $labels = array(
        'name' => _x('Tags', 'taxonomy general name'),
        'singular_name' => _x('Tag', 'taxonomy singular name'),
        'search_items' =>  __('Search Tags'),
        'popular_items' => __('Popular Tags'),
        'all_items' => __('All Tags'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Tag'),
        'update_item' => __('Update Tag'),
        'add_new_item' => __('Add New Tag'),
        'new_item_name' => __('New Tag Name'),
        'separate_items_with_commas' => __('Separate tags with commas'),
        'add_or_remove_items' => __('Add or remove tags'),
        'choose_from_most_used' => __('Choose from the most used tags'),
        'menu_name' => __('Tags'),
    );

    register_taxonomy('testimonial_tag', 'testimonial', array(
        'label' => __('Tag', 'ns'),
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'hierarchical' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tag', 'with_front' => false,),
        'show_admin_column' => true,
        'show_in_rest' => true,
        'rest_base' => 'tag',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'show_in_quick_edit' => true,
        'update_count_callback' => '_update_post_term_count',
    ));


    //register_taxonomy('tag', array('testimonial'), $args);
}

add_action('init', 'testimonial');

function free_resource()
{

    register_post_type(
        'Free-Resource',

        array(
            'labels' => array(
                'name' => __('Free Resource'),
                'singular_name' => __('Free-Resource')
            ),
            'public' => true,
            'has_archive' => false,
            'show_in_rest' => true,
            'rewrite' => array(
                'slug' => 'free-resources'
            ),
            'menu_icon' => 'dashicons-media-document',
            'supports' => ['title', 'page-attributes', 'custom-fields', 'editor', 'thumbnail', 'revisions'],


        )
    );
}

add_action('init', 'free_resource');


add_filter('default_content', function ($content, $post) {

    $the_query = new WP_Query(
        array(
            'post_type' => 'team'
        )
    );

    if ($the_query->have_posts()) {

        while ($the_query->have_posts()) {
            $the_query->the_post();
            $template = get_post();
            $template_post_type = get_field('post_type', $template->ID);

            if (!empty($post->post_type) && $template_post_type === $post->post_type) {

                $screen = function_exists('get_current_screen') ? get_current_screen() : null;
                $is_block_editor = $screen ? $screen->is_block_editor() : false;

                if ($is_block_editor) {
                    $content = get_the_content($template->ID);
                }
            }
        }
        wp_reset_postdata();
    }
    return $content;
}, 10, 2);




add_filter('content', function ($content_course, $post) {

    $the_query = new WP_Query(
        array(
            'post_type' => 'course'
        )
    );

    if ($the_query->have_posts()) {

        while ($the_query->have_posts()) {
            $the_query->the_post();
            $template = get_post();
            $template_post_type = get_field('post_type', $template->ID);

            if (!empty($post->post_type) && $template_post_type === $post->post_type) {

                $screen = function_exists('get_current_screen') ? get_current_screen() : null;
                $is_block_editor = $screen ? $screen->is_block_editor() : false;

                if ($is_block_editor) {
                    $content_course = get_the_content($template->ID);
                }
            }
        }
        wp_reset_postdata();
    }
    return $content_course;
}, 10, 2);

add_filter('body_class', 'alter_search_classes');

function alter_search_classes($classes)

{

    if (is_search()) {

        return array();
    } else {

        return $classes;
    }
}

function codelicious_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (get_permalink() == get_site_url() . '/sitemap/') {
        $classes[] = 'codelicious-sitemap';
    } else {
        $classes[] = '';
    }

    return $classes;
}
add_filter('body_class', 'codelicious_body_classes');


function atg_menu_classes($classes, $item, $args)
{
    // echo '<pre>';
    //print_r($args);

    //print_r($args->menu->slug);
    //exit;
    if ($args->menu_class->slug == 'about-codelicious') {
        $classes['class'] = 'pooja';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);


function codelicious_sitemap_main_page($atts, $content = null)
{
    // return the content
    $pages = get_pages(
        array(
            'parent'  => 0, // replaces 'depth' => 1,
            'exclude' => $atts['exclude_page']
        )
    );
    $page_ids = wp_list_pluck($pages, 'ID');
    // echo '<pre>';
    // print_r($pages);
    // exit;
    $listitem = '<ul class="wsp-courses-list">';


    foreach ($page_ids as $id) {
        $listitem .= "<li class='page_item page-item-" . $id . "> <a href=" . get_the_permalink($id) . ">" . get_the_title($id) . "</a> </li>";
    }
    $listitem .= '</ul>';
    $title = "<h2 class='wsp-courses-title'>" . $atts['title'] . "</h2>";
    return '<div class="wsp-container">' . $title .  $listitem . '</div>';
}
add_shortcode('codelicious_sitemap_page', 'codelicious_sitemap_main_page');


function codelicious_sitemap_child_page($atts, $content = null)
{
    // return the content
    $pages = get_pages(
        array(
            'parent'  => $atts['page_id'], // replaces 'depth' => 1,
            //'child_of' => $atts['child_of']
        )
    );
    $page_ids = wp_list_pluck($pages, 'ID');
    // echo '<pre>';
    // print_r($pages);
    // exit;
    $listitem = '<ul class="wsp-courses-list">';


    foreach ($page_ids as $id) {
        $listitem .= "<li class='page_item page-item-" . $id . "'> <a href=" . get_the_permalink($id) . ">" . get_the_title($id) . "</a> </li>";
    }
    $listitem .= '</ul>';
    $title = "<h2 class='wsp-courses-title'>" . $atts['title'] . "</h2>";
    return '<div class="wsp-container">' . $title .  $listitem . '</div>';
}
add_shortcode('codelicious_sitemap_childpage', 'codelicious_sitemap_child_page');

function codelicious_sitemap_blog_page($atts, $content = null)
{

    $post_type_query  = new WP_Query(
        array(
            'post_type'      => $atts['post_name'],
            'posts_per_page' => -1
        )
    );

    $posts_array      = $post_type_query->posts;

    $page_ids = wp_list_pluck($posts_array, 'ID');

    $listitem = '<ul class="wsp-courses-list">';


    foreach ($page_ids as $id) {
        $listitem .= "<li class='page_item page-item-" . $id . "'> <a href=" . get_the_permalink($id) . ">" . get_the_title($id) . "</a> </li>";
    }
    $listitem .= '</ul>';
    $title = "<h2 class='wsp-courses-title'>" . $atts['title'] . "</h2>";
    return '<div class="wsp-container">' . $title .  $listitem . '</div>';
}
add_shortcode('codelicious_sitemap_blogpage', 'codelicious_sitemap_blog_page');

function golden_oak_web_design_blog_generate_rewrite_rules($wp_rewrite)
{
    $new_rules = array(
        '(([^/]+/)*blog)/page/?([0-9]{1,})/?$' => 'index.php?pagename=$matches[1]&paged=$matches[3]',
        'blog/([^/]+)/?$' => 'index.php?post_type=post&name=$matches[1]',
        'blog/[^/]+/attachment/([^/]+)/?$' => 'index.php?post_type=post&attachment=$matches[1]',
        'blog/[^/]+/attachment/([^/]+)/trackback/?$' => 'index.php?post_type=post&attachment=$matches[1]&tb=1',
        'blog/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?post_type=post&attachment=$matches[1]&cpage=$matches[2]',
        'blog/[^/]+/attachment/([^/]+)/embed/?$' => 'index.php?post_type=post&attachment=$matches[1]&embed=true',
        'blog/[^/]+/embed/([^/]+)/?$' => 'index.php?post_type=post&attachment=$matches[1]&embed=true',
        'blog/([^/]+)/embed/?$' => 'index.php?post_type=post&name=$matches[1]&embed=true',
        'blog/[^/]+/([^/]+)/embed/?$' => 'index.php?post_type=post&attachment=$matches[1]&embed=true',
        'blog/([^/]+)/trackback/?$' => 'index.php?post_type=post&name=$matches[1]&tb=1',
        'blog/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&name=$matches[1]&feed=$matches[2]',
        'blog/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&name=$matches[1]&feed=$matches[2]',
        'blog/page/([0-9]{1,})/?$' => 'index.php?post_type=post&paged=$matches[1]',
        'blog/[^/]+/page/?([0-9]{1,})/?$' => 'index.php?post_type=post&name=$matches[1]&paged=$matches[2]',
        'blog/([^/]+)/page/?([0-9]{1,})/?$' => 'index.php?post_type=post&name=$matches[1]&paged=$matches[2]',
        'blog/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?post_type=post&name=$matches[1]&cpage=$matches[2]',
        'blog/([^/]+)(/[0-9]+)?/?$' => 'index.php?post_type=post&name=$matches[1]&page=$matches[2]',
        'blog/[^/]+/([^/]+)/?$' => 'index.php?post_type=post&attachment=$matches[1]',
        'blog/[^/]+/([^/]+)/trackback/?$' => 'index.php?post_type=post&attachment=$matches[1]&tb=1',
        'blog/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=post&attachment=$matches[1]&feed=$matches[2]',
        'blog/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$' => 'index.php?post_type=post&attachment=$matches[1]&cpage=$matches[2]',
    );
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'golden_oak_web_design_blog_generate_rewrite_rules');

function golden_oak_web_design_update_post_link($post_link, $id = 0)
{
    $post = get_post($id);
    if (is_object($post) && $post->post_type == 'post') {
        return home_url('/blog/' . $post->post_name);
    }
    return $post_link;
}
add_filter('post_link', 'golden_oak_web_design_update_post_link', 1, 3);

function hcf_register_meta_boxes()
{
	add_meta_box('hcf-1', __('Permalink Label', 'hcf'), 'hcf_display_callback', 'free-resource');
}
add_action('add_meta_boxes', 'hcf_register_meta_boxes');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function hcf_display_callback($post)
{ ?>

<input id="permalink-btn" value="<?php echo get_post_meta($post->ID, 'permalink-btn', true); ?>" type="text" name="permalink-btn">

<?php }

function hcf_save_meta_box($post_id)
{
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if ($parent_id = wp_is_post_revision($post_id)) {
		$post_id = $parent_id;
	}
	$fields = [
		'permalink-btn',
	];
	foreach ($fields as $field) {
		if (array_key_exists($field, $_POST)) {
			update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
		}
	}
}
add_action('save_post', 'hcf_save_meta_box');


function klf_acf_input_admin_footer() { ?>

    <script type="text/javascript">
    (function($) {
    
    acf.add_filter('color_picker_args', function( args, $field ){
    
    // add the hexadecimal codes here for the colors you want to appear as swatches
    args.palettes = ['#0596A8', '#71B095', '#E27A41', '#D8C172', '#D37271']
    
    // return colors
    return args;
    
    });
    
    })(jQuery);
    </script>
    
    <?php }
    
add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');

function custom_rewrite_rule() {
    add_rewrite_rule('^free-resources/thank-you/?','index.php?page_id=4439','top');
}
add_action('init', 'custom_rewrite_rule');

function remove_url_trailing_slash( $url ) {
    return untrailingslashit( $url );
}
add_filter( 'user_trailingslashit', 'remove_url_trailing_slash', 100, 1 );