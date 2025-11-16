<?php



if (!defined('ABSPATH')) {

    header('HTTP/1.0 403 Forbidden');

    exit;
}



class CustomPostType

{

    public $post_type_name;

    public $post_type_key;

    public $post_type_args;

    public $post_type_labels;

    public $post_key;

    public $supports;

    public $meta_key;

    public $custom_fields;

    public $post_taxonomies = [];



    /* Class constructor */

    public function __construct($name, $labels = [], $args = [])

    {

        // Set some important variables

        $this->post_type_name = self::uglify($name);

        $this->post_type_key = self::uglify_under($name);

        $this->meta_key = "_{$this->post_type_key}_info";

        $this->post_type_args = $args;

        $this->post_type_labels = $labels;

        $this->supports = (array_key_check($args, 'supports') ? $args['supports'] : ['title']);



        // Add action to register the post type, if the post type does not already exist

        if (!post_type_exists($this->post_type_name)) {

            add_action('init', [&$this, 'register_post_type']);
        }

        $this->enqueue_media();



        // Listen for the save post hook

        $this->save();
    }



    /* Method which enqueues scripts */

    public function enqueue_media()

    {

        $post_type_name = $this->post_type_name;

        add_action('admin_enqueue_scripts', function () use ($post_type_name) {

            $screen = get_current_screen();

            if ($screen->post_type == $post_type_name && 'post' == $screen->base) {

                if (!did_action('wp_enqueue_media')) {

                    wp_enqueue_media();
                }

                wp_enqueue_script('designpickle-admin-script', get_template_directory_uri() . '/assets/js/admin.js', ['jquery'], '20190924', true);
            }
        });
    }



    /* Method which registers the post type */

    public function register_post_type()

    {

        //Capitilize the words and make it plural

        $name = self::beautify($this->post_type_name);

        $plural = self::pluralize($name);

        // We set the default labels based on the post type name and plural. We overwrite them with the given labels.

        $labels = array_merge(

            // Default

            [

                'name' => _x($plural, 'post type general name'),

                'singular_name' => _x($name, 'post type singular name'),

                'add_new' => _x('Add New', strtolower($name)),

                'add_new_item' => __('Add New ' . $name),

                'edit_item' => __('Edit ' . $name),

                'new_item' => __('New ' . $name),

                'all_items' => __('All ' . $plural),

                'view_item' => __('View ' . $name),

                'search_items' => __('Search ' . $plural),

                'not_found' => __('No ' . strtolower($plural) . ' found'),

                'not_found_in_trash' => __('No ' . strtolower($plural) . ' found in Trash'),

                'parent_item_colon' => '',

                'menu_name' => $plural

            ],

            // Given labels

            $this->post_type_labels

        );



        // Same principle as the labels. We set some defaults and overwrite them with the given arguments.

        $args = array_merge(

            // Default

            [

                'label' => $plural,

                'labels' => $labels,

                'public' => true,

                'publicly_queryable' => true,

                'capability_type' => 'post',

                'show_ui' => true,

                'show_in_menu' => true,

                'show_in_rest' => false,

                'menu_position' => 20,

                'menu_icon' => 'dashicons-editor-code',

                'hierarchical' => false,

                'has_archive' => self::pluralize($this->post_type_name),

                'rewrite' => [

                    'slug' => $this->post_type_name,

                    'hierarchical' => true,

                    'with_front' => false

                ],

                'supports' => ['title'],

                'show_in_nav_menus' => true

            ],

            // Given args

            $this->post_type_args

        );

        // Register the post type

        register_post_type($this->post_type_name, $args);
    }



    /* Method to attach the taxonomy to the post type */

    public function add_taxonomy($name, $labels = [], $args = [])

    {

        if (!empty($name)) {

            // We need to know the post type name, so the new taxonomy can be attached to it.

            $post_type_name = $this->post_type_name;

            // Taxonomy properties

            $taxonomy_name = $post_type_name . '-' . self::uglify($name);

            $taxonomy_labels = $labels;

            $taxonomy_args = $args;



            if (!taxonomy_exists($taxonomy_name)) {

                //Capitilize the words and make it plural

                $name = self::beautify($name);

                $plural = self::pluralize($name);

                // Default labels, overwrite them with the given labels.

                $labels = array_merge(

                    // Default

                    [

                        'name' => _x($plural, 'taxonomy general name'),

                        'singular_name' => _x($name, 'taxonomy singular name'),

                        'search_items' => __('Search ' . $plural),

                        'all_items' => __('All ' . $plural),

                        'parent_item' => __('Parent ' . $name),

                        'parent_item_colon' => __('Parent ' . $name . ':'),

                        'edit_item' => __('Edit ' . $name),

                        'update_item' => __('Update ' . $name),

                        'add_new_item' => __('Add New ' . $name),

                        'new_item_name' => __('New ' . $name . ' Name'),

                        'menu_name' => __($name)

                    ],

                    // Given labels

                    $taxonomy_labels

                );

                // Default arguments, overwritten with the given arguments

                $args = array_merge(

                    // Default

                    [

                        'label' => $plural,

                        'labels' => $labels,

                        'public' => true,

                        'show_in_rest' => false,

                        'show_ui' => true,

                        'show_in_nav_menus' => true,

                        '_builtin' => false

                    ],

                    // Given

                    $taxonomy_args

                );



                $this->post_taxonomies[] = $taxonomy_name;



                // Add the taxonomy to the post type

                add_action('init', function () use ($taxonomy_name, $post_type_name, $args) {

                    register_taxonomy($taxonomy_name, $post_type_name, $args);
                });
            } else {

                add_action('init', function () use ($taxonomy_name, $post_type_name) {

                    register_taxonomy_for_object_type($taxonomy_name, $post_type_name);
                });
            }
        }
    }



    /* Attaches meta boxes to the post type */

    public function add_meta_box($title, $fields = [], $context = 'normal', $priority = 'default')

    {

        if (!empty($title)) {

            // We need to know the Post Type name again

            $post_type_name = $this->post_type_name;



            // Meta variables

            $box_id = self::uglify_under($title);

            $box_title = self::beautify($title);

            $box_context = $context;

            $box_priority = $priority;



            $this->post_key = $box_id;

            $this->custom_fields = $fields;



            add_action('admin_init', function () use ($box_id, $box_title, $post_type_name, $box_context, $box_priority, $fields) {

                add_meta_box(

                    $box_id,

                    $box_title,

                    function ($post, $data) {

                        global $post;

                        // Nonce field for some validation

                        $nonce_action = wp_basename(__FILE__) . "/{$post->post_type}";

                        $nonce_name = "{$this->post_type_name}_post_type";

                        wp_nonce_field($nonce_action, $nonce_name);

                        // Get the saved values

                        $meta = get_post_meta($post->ID, $this->meta_key, true);



                        // Check the array and loop through it

                        if (!empty($this->custom_fields)) {

                            echo '<section class="meta-info">';

                            /* Loop through $this->custom_fields */

                            foreach ($this->custom_fields as $field) {

                                self::build_field($this->post_type_key, $field, $meta);
                            }

                            echo '</section>';
                        }
                    },

                    $post_type_name,

                    $box_context,

                    $box_priority,

                    [$fields]

                );
            });
        }
    }



    /* Listens for when the post type being saved */

    public function save()

    {

        // Need the post type name again

        $post_type_name = $this->post_type_name;



        add_action('save_post', function () use ($post_type_name) {

            // Deny the WordPress autosave function

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;



            $nonce_action = wp_basename(__FILE__) . "/{$post_type_name}";

            $nonce_name = "{$post_type_name}_post_type";

            if (!isset($_POST) && !wp_verify_nonce($_POST[$nonce_name], $nonce_action)) return;



            global $post;



            if (isset($_POST) && isset($post->ID) && get_post_type($post->ID) == $post_type_name) {

                update_post_meta($post->ID, $this->meta_key, $_POST["{$this->post_type_key}_info"]);
            }
        });
    }



    private static function build_field($post_key, $field, $meta)

    {

        $label = $field['label'] ?? 'Label';

        $width = self::correct_width($field['width']);

        $type = $field['type'] ?? 'text';

        $placeholder = $field['placeholder'] ?? 'Placeholder...';

        $key = self::uglify_under(self::strip_characters($label));

        $value = (array_key_check($meta, $key) ? $meta[$key] : '');

        $name = "{$post_key}_info[{$key}]";



        switch ($type) {

            case 'email':

                $input = "<input type='email' name='{$name}' placeholder='{$placeholder}' value='{$value}'>";

                break;

            case 'number':

                $input = "<input type='number' name='{$name}' placeholder='{$placeholder}' value='{$value}'>";

                break;

            case 'url':

                $input = "<input type='url' name='{$name}' placeholder='{$placeholder}' value='{$value}'>";

                break;

            case 'textarea':

                $input = "<textarea name='{$name}' placeholder='{$placeholder}'>{$value}</textarea>";

                break;

            case 'media':

                $media_btn = 'Add Image';

                $media = $media_class = '';

                $thumbnail = wp_get_attachment_image_src($value, 'thumbnail')[0];

                if ('' != $value) {

                    $media = "<img src='{$thumbnail}'>";

                    $media_btn = 'Change Image';

                    $media_class = 'is-active';
                }

                $input = "

                        {$media}

                        <span class='break'></span>

                        <input type='hidden' name='{$name}' value='{$value}'>

                        <button class='select-image'>{$media_btn}</button>

                        <button class='remove-image {$media_class}'>Remove Image</button>

                    ";

                break;

            case 'cpt_select':

                $cpt = $field['cpt'];

                $args = [

                    'post_type' => $cpt,

                    'numberposts' => -1,

                    'post_status' => 'publish'

                ];

                $posts = get_posts($args);

                $input = "<select name='{$name}'><option value=''>-- Select {$label} --</option>";

                foreach ($posts as $post) {

                    $selected = ($value == $post->ID) ? 'selected="selected"' : '';

                    $input .= "<option value='{$post->ID}' {$selected}>{$post->post_title}</option>";
                }

                $input .= '</select>';

                break;

            case 'richtext':

                ob_start();

                wp_editor($value, $key, [

                    'wpautop' => true,

                    'media_buttons' => false,

                    'textarea_name' => "{$name}",

                    'textarea_rows' => 10,

                    'teeny' => false

                ]);

                $input = ob_get_clean();

                break;

            default:

                $input = "<input type='text' name='{$name}' placeholder='{$placeholder}' value='{$value}'>";

                break;
        }



        echo "

                <div class='w{$width}'>

                    <label>

                        <strong>{$label}</strong><br>

                        {$input}

                    </label>

                </div>

            ";
    }



    public function register_routes()

    {

        $lower_plural_name = strtolower(self::pluralize(self::beautify($this->post_type_name)));



        $route = new RestApi($this->post_type_name, $lower_plural_name, $this->supports, $this->custom_fields, $this->meta_key, $this->post_taxonomies);
    }



    // Public Static Functions

    public static function strip_characters($string)

    {

        return preg_replace("/[^a-zA-Z0-9\s]/", '', $string);
    }



    public static function beautify($string)

    {

        return ucwords(str_replace('-', ' ', $string));
    }



    public static function uglify($string)

    {

        return strtolower(str_replace(' ', '-', $string));
    }



    public static function uglify_under($string)

    {

        return strtolower(str_replace(' ', '_', $string));
    }



    public static function pluralize($string)

    {

        $last = $string[strlen($string) - 1];

        if ($last == 'y') {

            $cut = substr($string, 0, -1);

            //convert y to ies

            $plural = "{$cut}ies";
        } else {

            // just attach an s

            $plural = "{$string}s";
        }

        return $plural;
    }



    // Private Static Functions

    private static function correct_width($width)

    {

        $int_width = (int) $width ?? 100;

        if (25 >= $int_width) {

            $adj_width = 25;
        } elseif (25 < $int_width && 33 >= $int_width) {

            $adj_width = 33;
        } elseif (33 < $int_width && 50 >= $int_width) {

            $adj_width = 50;
        } elseif (50 < $int_width && 66 >= $int_width) {

            $adj_width = 66;
        } elseif (66 < $int_width && 75 >= $int_width) {

            $adj_width = 75;
        } else {

            $adj_width = 100;
        }

        return $adj_width;
    }
}
