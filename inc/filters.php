<?php
    /**
    *   Crunch WordPress Filters
    *
    *   @package Crunch
    *   @since 5.1.0
    */

    /**
     * OG image Fix
     * @return {string}
     * @filter wpseo_pre_analysis_post_content
     */

    	function crunch_opengraph_content($val) {
    		return preg_replace("/<img[^>]+>/i", "", $val);
    	}

    	add_filter('wpseo_pre_analysis_post_content', 'crunch_opengraph_content');


    /**
     * Hide ACF
     */

    	// add_filter('acf/settings/show_admin', '__return_false');


    /**
     * Add "nocookie" oo wordpress oEmbeded youtube videos
     * @return {string} add nocookie to string
     * @filter oembed_dataparse
     */

    	function wpex_youtube_nocookie_oembed( $return ) {
    		$return = str_replace( 'youtube', 'youtube-nocookie', $return );
    		return $return;
    	}

    	add_filter( 'oembed_dataparse', 'wpex_youtube_nocookie_oembed' );


    /**
     * German Slugs
     * @return {string} Replace germany letters to normal letters
     * @filter sanitize_title
     * core: http://core.trac.wordpress.org/ticket/16905
     */

    	function transliterate_aeoeuess($title, $raw_title = NULL, $context = 'query') {
    	    if ($raw_title != NULL) {
    	        $title = $raw_title;
    	    }

    	    $title = str_replace('Ä', 'ae', $title);
    	    $title = str_replace('ä', 'ae', $title);
    	    $title = str_replace('Ö', 'oe', $title);
    	    $title = str_replace('ö', 'oe', $title);
    	    $title = str_replace('Ü', 'ue', $title);
    	    $title = str_replace('ü', 'ue', $title);
    	    $title = str_replace('ẞ', 'ss', $title);
    	    $title = str_replace('ß', 'ss', $title);

    	    if ($context == 'save') {
    	        $title = remove_accents($title);
    	    }

    	    return $title;
    	}

    	add_filter('sanitize_title', 'transliterate_aeoeuess', 5, 3);


    /**
     * Remove Default Sizes
     * @return {array} remove from array not used sizes
     * @filter intermediate_image_sizes_advanced
     */

        function prefix_remove_default_images( $sizes ) {
            unset( $sizes['medium']); // 300px
            unset( $sizes['large']); // 1024px
            unset( $sizes['medium_large']); // 768px

            return $sizes;
        }

        add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );


    /**
     * Remove Wordpress Comments
     */

        /**
         * Close Comments on the front-end
         */

            add_filter('comments_open', '__return_false', 20, 2);
            add_filter('pings_open', '__return_false', 20, 2);


        /**
         * Hide Existing Comments
         */

            add_filter('comments_array', '__return_empty_array', 10, 2);


    /**
     * Enable Shortcode in Text / Textarea fields ACF
     */

        add_filter('acf/format_value/type=text', 'do_shortcode');
        add_filter('acf/format_value/type=textarea', 'do_shortcode');


    /**
     * Add Custom Block Categories for Gutenberg
     */

        /**
         * Inner Blocks Category
         * @return {array} add new block category to wordpress block categories
         * @filter block_categories
         */

            function inner_blocks_category( $categories, $post ) {
                return array_merge(
                    $categories,
                    array(
                        array(
                            'slug' => 'inner-blocks',
                            'title' => __( 'Inner Blocks', 'crunch' ),
                            'icon'  => 'layout',
                        ),
                    )
                );
            }

            add_filter( 'block_categories', 'inner_blocks_category', 10, 2 );

        /**
         * Full Width Blocks Category
         * @return {array} add new block category to wordpress block categories
         * @filter block_categories
         */

            function full_width_categories( $categories, $post ) {
                return array_merge(
                    $categories,
                    array(
                        array(
                            'slug' => 'full-width-blocks',
                            'title' => __( 'Full Width Blocks', 'crunch' ),
                            'icon'  => 'tagcloud',
                        ),
                    )
                );
            }

        add_filter( 'block_categories', 'full_width_categories', 10, 2 );


    /**
     * Add Meta Query to Search
     */

        /**
         * [list_searcheable_acf list all the custom fields we want to include in our search query]
         * @return {array} [list of custom fields]
         */

            function list_searcheable_acf(){
              $list_searcheable_acf = array("title", "sub_title", "excerpt_short", "excerpt_long", "xyz", "myACF");
              return $list_searcheable_acf;
            }


        /**
         * [advanced_custom_search search that encompasses ACF/advanced custom fields and taxonomies and split expression before request]
         * @param  [query-part/string]      $where    [the initial "where" part of the search query]
         * @param  [object]                 $wp_query []
         * @return [query-part/string]      $where    [the "where" part of the search query as we customized]
         * see https://vzurczak.wordpress.com/2013/06/15/extend-the-default-wordpress-search/
         * credits to Vincent Zurczak for the base query structure/spliting tags section
         */

            function advanced_custom_search( $where, $wp_query ) {
                global $wpdb;

                if ( empty( $where ))
                    return $where;

                // get search expression
                $terms = $wp_query->query_vars[ 's' ];

                // explode search expression to get search terms
                $exploded = explode( ' ', $terms );
                if( $exploded === FALSE || count( $exploded ) == 0 )
                    $exploded = array( 0 => $terms );

                // reset search in order to rebuilt it as we whish
                $where = '';

                // get searcheable_acf, a list of advanced custom fields you want to search content in
                $list_searcheable_acf = list_searcheable_acf();
                foreach( $exploded as $tag ) :
                    $where .= "
                        AND (
                            (wre_posts.post_title LIKE '%$tag%')
                            OR (wre_posts.post_content LIKE '%$tag%')
                            OR EXISTS (
                                SELECT * FROM wre_postmeta
                                    WHERE post_id = wre_posts.ID
                                        AND (";
                    foreach ($list_searcheable_acf as $searcheable_acf) :
                        if ($searcheable_acf == $list_searcheable_acf[0]):
                            $where .= " (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
                        else:
                            $where .= " OR (meta_key LIKE '%" . $searcheable_acf . "%' AND meta_value LIKE '%$tag%') ";
                        endif;
                    endforeach;
                        $where .= ")
                        )
                        OR EXISTS (
                            SELECT * FROM wre_comments
                            WHERE comment_post_ID = wre_posts.ID
                                AND comment_content LIKE '%$tag%'
                        )
                        OR EXISTS (
                            SELECT * FROM wre_terms
                            INNER JOIN wre_term_taxonomy
                                ON wre_term_taxonomy.term_id = wre_terms.term_id
                            INNER JOIN wre_term_relationships
                                ON wre_term_relationships.term_taxonomy_id = wre_term_taxonomy.term_taxonomy_id
                            WHERE (
                                taxonomy = 'post_tag'
                                    OR taxonomy = 'category'
                                    OR taxonomy = 'myCustomTax'
                                )
                                AND object_id = wre_posts.ID
                                AND wre_terms.name LIKE '%$tag%'
                            )
                        )";
                endforeach;
                return $where;
            }

            add_filter( 'posts_search', 'advanced_custom_search', 500, 2 );


    /**
     * Replace Input to Button for Gravity Forms Plugin
     * @return {object} return new button
     * @filter gform_next_button
     * @filter gform_previous_button
     * @filter gform_submit_button
     * @filter gform_send_resume_link_button
     */

        function input_to_button( $button, $form ) {
            $color_profile = get_field('color_profile');

            if ($color_profile):
                $default_color = $color_profile->post_title == 'Default Colors' ? true : false;

                if ($default_color): 
                    // default colors profile
                    $button_light_color = get_field('button_light', $color_profile->ID);
                    $button_dark_color = get_field('button_dark', $color_profile->ID);
                else:
                    // custom colors profile
                    $button_color = get_field('button', $color_profile->ID);
                endif;
            endif;

            $dom = new DOMDocument();
            $dom->loadHTML( $button );
            $textFormated = $form['button']['text'];
            $input = $dom->getElementsByTagName( 'input' )->item(0);
            $new_button = $dom->createElement( 'button' );
            $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
            $input->removeAttribute( 'value' );
            foreach( $input->attributes as $attribute ) {
                $new_button->setAttribute( $attribute->name, $attribute->value );
            }
            $new_button->setAttribute("class", $input->getAttribute( 'class' )." crunch-button crunch-button__full-background crunch-button__full-background--large border-0");

            if ($color_profile):
                if ($default_color):
                    $new_button->setAttribute("button-color-light", $button_light_color);$new_button->setAttribute("button-color-dark", $button_dark_color);
                else:
                    $new_button->setAttribute("style", "--before-color: $button_color");
                endif;
            else:
                $new_button->setAttribute("style", "--before-color: var(--default-button-color)");
            endif;
            
            $input->parentNode->replaceChild( $new_button, $input );

            return $dom->saveHtml( $new_button );
        }

        add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
        add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
        add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
        add_filter( 'gform_send_resume_link_button', 'input_to_button', 10, 2 );


    /**
     * Block default scrolling during error in Gravity Form
     */
    add_filter( 'gform_confirmation_anchor', '__return_false' );

    /**
     * Disable Gutenberg
     * return boolean
     */
    function wire_disable_editor( $id = false ) {

        $excluded_templates = array(
            'page-templates/thank-you.php',
            'page-templates/page-search.php'
        );
    
        $excluded_ids = array(
            // get_option( 'page_on_front' )
        );
    
        if( empty( $id ) )
            return false;
    
        $id = intval( $id );
        $template = get_page_template_slug( $id );
    
        return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
    }
    
    /**
     * Disable Gutenberg by page template
     * return boolean
     * @filter use_block_editor_for_post_type
     */
    function wire_disable_gutenberg( $can_edit, $post_type ) {
    
        if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
            return $can_edit;
    
        if( wire_disable_editor( $_GET['post'] ) )
            $can_edit = false;
    
        return $can_edit;
    
    }
    
    /**
     * Disable Classic Editor for thank-you page template
     * filter admin_head
     */
    function wire_disable_classic_editor() {
        global $post;
        $screen = get_current_screen();
        if( 'page' !== $screen->id || ! isset( $_GET['post']) )
            return;

        if( wire_disable_editor( $_GET['post'] ) ) {
            if ("page-templates/thank-you.php" === get_post_meta( $post->ID, '_wp_page_template', true ) || "page-templates/page-search.php" === get_post_meta( $post->ID, '_wp_page_template', true ) ) {
                remove_post_type_support( 'page', 'editor' );
            }
        }
    }

    add_filter( 'use_block_editor_for_post_type', 'wire_disable_gutenberg', 10, 2 );
    add_action( 'admin_head', 'wire_disable_classic_editor' );


    /**
     * Change Image Attr
     * @return {object} change src or srcset for lazyload
     * @filter wp_get_attachment_image_attributes
     */

        function gs_change_attachment_image_markup($attributes) {

            if(isset($attributes["data-lazy"])){
                if (isset($attributes['src'])) {
                    $attributes['data-src'] = $attributes['src'];
                    $attributes['src'] = get_template_directory_uri() . '/images/img__empty.png';
                }

                if (isset($attributes['srcset'])) {
                    $attributes['data-srcset'] = $attributes['srcset'];
                    $attributes['srcset'] = get_template_directory_uri() . '/images/img__empty.png 1w';
                }
            }

            return $attributes;
        }

        add_filter( 'wp_get_attachment_image_attributes', 'gs_change_attachment_image_markup' );


    /**
     * Changes the Default Gravity Forms AJAX Spinner to Transparent Image (The Spinner has styles in Gravity Form Styles)
     * @return {string} transparent image string
     * @filter gform_ajax_spinner_url
     */

        function ns_io_custom_gforms_spinner( $src ) {
            return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
        }

        add_filter( 'gform_ajax_spinner_url', 'ns_io_custom_gforms_spinner' );


    /**
     * Disable XML-RPC
     */

        add_filter('xmlrpc_enabled', '__return_false');


    /**
     * Hide WP Version Strings from Scripts and Styles
     * @return {string} $src
     * @filter script_loader_src
     * @filter style_loader_src
     */

        function crunch_remove_wp_version_strings( $src ) {
            global $wp_version;
            parse_str(parse_url($src, PHP_URL_QUERY), $query);
            if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
                $src = remove_query_arg('ver', $src);
            }
            return $src;
        }

        add_filter( 'script_loader_src', 'crunch_remove_wp_version_strings' );
        add_filter( 'style_loader_src', 'crunch_remove_wp_version_strings' );


    /* Hide WP version strings from generator meta tag */

        function crunch_remove_version() {
            return '';
        }

        add_filter('the_generator', 'crunch_remove_version');
        remove_action( 'wp_head', 'wp_generator' );

?>
