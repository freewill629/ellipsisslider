<?php
    /**
    *   Custom Functions
    *
    *   @package Crunch
    *   @since 5.0.0
    */


    function new_submenu_class($menu) {    
        $menu = preg_replace('/ class="sub-menu"/','/ class="submenu" /',$menu);        
        return $menu;      
    }

    add_action( 'init', 'wpse325327_add_excerpts_to_pages' );
    function wpse325327_add_excerpts_to_pages() {
        add_post_type_support( 'page','featured', 'excerpt' );
        add_post_type_support( 'featured', 'excerpt' );
        add_post_type_support( 'course', 'excerpt' );
        add_post_type_support( 'pilot-course', 'excerpt' );
        add_post_type_support( 'free-resource', 'excerpt' );

    }

    // add_filter( 'render_block', function( $block_content, $block ) {
    //     // Target core/* and core-embed/* blocks.
    //     if ( preg_match( '~^core/|core-embed/~', $block['blockName'] ) ) {
    //        $block_content = sprintf( '<div class="page-container">%s</div>', $block_content );
    //     }
    //     return $block_content;
    // }, PHP_INT_MAX - 1, 2 );

    if ( is_admin() ) {
        add_filter( 'posts_search', 'search_by_title_only', 500, 2 );
    }
    
    function search_by_title_only( $search, $wp_query ) {
        // $wp_query was a reference
        global $wpdb;
        if ( empty( $search ) ) {
            return $search;
        } // skip processing - no search term in query
        $q = $wp_query->query_vars;
        $n = ! empty( $q['exact'] ) ? '' : '%';
        $search =
        $searchand = '';
        foreach ( (array) $q['search_terms'] as $term ) {
            $term      = esc_sql( $wpdb->esc_like( $term ) );
            $search    .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
            $searchand = ' AND ';
        }
        if ( ! empty( $search ) ) {
            $search = " AND ({$search}) ";
            if ( ! is_user_logged_in() ) {
                $search .= " AND ($wpdb->posts.post_password = '') ";
            }
        }
        return $search;
    }

    add_action('enqueue_block_editor_assets', function() {
        wp_enqueue_script('awp-gutenberg-filters', get_template_directory_uri() . '/assets/js/gutenberg-filters.js');
    });

    
    add_filter('wp_nav_menu','new_submenu_class'); 
        /**
         * Show the slug functions
         */

            function the_slug($echo=true){
            	$slug = basename(get_permalink());
                do_action('before_slug', $slug);
                $slug = apply_filters('slug_filter', $slug);
                if( $echo ) echo $slug;
                do_action('after_slug', $slug);
                return $slug;
            }


        /**
         * Get the slug function
         */

            function get_the_slug() {
                global $post;

                if ( is_single() || is_page() ) {
                    return $post->post_name;
                } else {
                    return "";
                }
            }


        /**
         * Create slug
         */

            function create_slug($string){
                $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
                $slug = strtolower($slug);
                return $slug;
            }


        /**
         * Custom pagination
         */

            function custom_pagination() {
                global $wp_query;
                $big = 999999999; // need an unlikely integer
                $pages = paginate_links(
                    array(
                        'base' => str_replace( $big, '%#%',  get_pagenum_link( $big, false ) ),
                        'current' => max( 1, get_query_var('paged') ),
                        'total' => $wp_query->max_num_pages,
                        'prev_next' => false,
                        'type'  => 'array',
                        'add_fragment' => '#posts-loop'
                    )
                );

                $prev_link = get_previous_posts_link(( '<svg class="d-block" enable-background="new 0 0 4 7" width="8" height="14" viewBox="0 0 4 7" xmlns="http://www.w3.org/2000/svg"><path class="single-transition" d="m.5.5 3 3-3 3" fill="none" stroke="#F06E0D" stroke-linecap="round" stroke-linejoin="round"/></svg>'));

                $next_link = get_next_posts_link(( '<svg class="d-block" enable-background="new 0 0 4 7" width="8" height="14" viewBox="0 0 4 7" xmlns="http://www.w3.org/2000/svg"><path class="single-transition" d="m.5.5 3 3-3 3" fill="none" stroke="#F06E0D" stroke-linecap="round" stroke-linejoin="round"/></svg>'));


                if( is_array( $pages ) ) {
                    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                    echo '<nav aria-label="Page navigation">
                            <ul class="crunch-pagination d-flex align-items-center justify-content-center c-mt-7 line-height-1">';

                            if($prev_link) { echo "<li class=\"page-item prev c-mr-2\">"; }

                                echo $prev_link;

                            if($prev_link) { echo "</li>"; }

                            foreach ( $pages as $page ) {
                                echo "<li class=\"page-item c-mx-2 font-weight-bold font-size-20 line-height-1\">$page</li>";
                            }

                            if($next_link) { echo "<li class=\"page-item next c-ml-2\">"; }

                                echo $next_link;

                            if($next_link) { echo "</li>"; }
                    echo '</ul>
                    </nav>';
                }
            }

            add_filter( 'paginate_links', 'custom_pagination_redirect' );
            function custom_pagination_redirect( $link ) {
                return preg_replace( '%/page/1/%', '/', $link );
            }


        /**
         * Author full name
         */

            function author_full_name() {
                global $post;
                $fname = get_the_author_meta('first_name');
                $lname = get_the_author_meta('last_name');
                $full_name = '';

                if( empty($fname)){
                    return $lname;
                } elseif( empty( $lname )){
                    return $fname;
                } else {
                    return "{$fname} {$lname}";
                }
            }


        /**
         * Check if more than one page exists
         */

            function show_posts_nav() {
                global $wp_query;
                return ($wp_query->max_num_pages > 1);
            }


        /**
         * Cut Text
         */

            function cut_text($string, $limit = 150) {
                if(strlen($string) > $limit) {
                    $pos = strpos($string, ' ', $limit);
                    $string = substr($string,0,$pos ).'...';
                }
                echo $string;
            }


            add_filter( 'wpseo_canonical', 'yoast_seo_canonical_slash_remove' );

function yoast_seo_canonical_slash_remove( $canonical_url ) {
         return untrailingslashit( $canonical_url );
}
           

    ?>
