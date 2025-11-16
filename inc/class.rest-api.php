<?php



if (!defined('ABSPATH')) {

    header('HTTP/1.0 403 Forbidden');

    exit;
}



/**

 ** ALL endpoint commented out since it can be taxing if hit on site with big DB

 **

 ** List of possible GET parameters for each endpoint

 ** SINGLE -

 **   id - Integer of post's ID

 **

 ** RETRIEVE

 **   page - Integer of archive page (default: 1)

 **   amount - Integer of results to show (default: 10)

 **   order - Text of direction order results (default: ASC) (available: DESC, ASC)

 **   orderby - Text of order by results (default: date) (available: id, author, title, name, modified, date)

 **

 */



class RestApi extends WP_REST_Controller

{

    public $post_type;

    public $lower_plural_name;

    public $supports;

    public $custom_fields;

    public $meta_key;

    public $post_taxonomies;



    public function __construct($post_type, $lower_plural_name, $supports, $custom_fields, $meta_key, $taxonomies)

    {

        $this->post_type = $post_type;

        $this->lower_plural_name = $lower_plural_name;

        $this->supports = $supports;

        $this->custom_fields = $custom_fields;

        $this->meta_key = $meta_key;

        $this->post_taxonomies = $taxonomies;



        $this->register_routes();
    }



    public function register_routes()

    {

        $post_type = $this->post_type;

        add_action('rest_api_init', function () use ($post_type) {

            $namespace = "{$post_type}/v1";

            register_rest_route(

                $namespace,

                'single',

                [

                    [

                        'methods' => WP_REST_SERVER::READABLE,

                        'callback' => [$this, 'retrieve_single']

                    ]

                ]

            );

            register_rest_route(

                $namespace,

                'retrieve',

                [

                    [

                        'methods' => WP_REST_SERVER::READABLE,

                        'callback' => [$this, 'retrieve_archive']

                    ]

                ]

            );

            /*

                register_rest_route(

                    $namespace,

                    'all',

                    [

                        [

                            'methods' => WP_REST_SERVER::READABLE,

                            'callback' => [$this, 'retrieve_all']

                        ]

                    ]

                );

                */
        });
    }



    /*

        public function retrieve_all() {

            $posts = $this->retrieve_post_types(0, -1, 0);

            $this->json_response($posts, "No {$this->lower_plural_name} found.");

        }

        */



    public function retrieve_single()

    {

        $id = $_GET['id'] ?? -1;

        $posts = $this->retrieve_post_types($id, 1, 0);

        $this->json_response($posts, "Sorry, no {$this->post_type} with matching ID found.");
    }



    public function retrieve_archive()

    {

        $page = $_GET['page'] ?? 1;

        $limit = $_GET['amount'] ?? 10;

        $order = $_GET['order'] ?? 'ASC';

        $order_by = $_GET['orderby'] ?? 'post_date';

        $posts = $this->retrieve_post_types(0, $limit, $page, $order, $order_by);

        $this->json_response($posts, "No {$this->lower_plural_name} found.");
    }



    public function retrieve_post_types($id = 0, $limit = 1, $page = 1, $order = 'ASC', $order_by = 'post_date')

    {

        global $wpdb;

        $content_col = $meta_col = $meta_join = $meta_find = $find = $limited = $order_state = '';



        switch (strtolower($order)) {

            case 'desc':

                $order = 'DESC';

                break;

            default:

                $order = 'ASC';

                break;
        }



        switch (strtolower($order_by)) {

            case 'id':

                $order_by = 'ID';

                break;

            case 'author':

                $order_by = 'post_author';

                break;

            case 'title':

                $order_by = 'post_title';

                break;

            case 'name':

                $order_by = 'post_name';

                break;

            case 'modified':

                $order_by = 'post_modified';

                break;

            default:

                $order_by = 'post_date';

                break;
        }



        if (in_array('editor', $this->supports)) {

            $content_col = ', a.post_content';
        }



        if ($this->custom_fields) {

            $meta_col = ', b.meta_value';

            $meta_join = "RIGHT JOIN {$wpdb->postmeta} AS b ON (b.post_id = a.ID)";

            $meta_find = "AND b.meta_key = '{$this->meta_key}'";
        }



        if (0 < $id) {

            $find = "AND a.ID = {$id}";
        } elseif (0 > $id) {

            return false;
        }



        if (0 < $limit) {

            $limited = "LIMIT {$limit}";
        }



        if (1 <= $page && 0 < $limit) {

            $amount = $limit ?? 10;

            $offset = ($page * $amount) - $amount;

            $limited = "LIMIT {$amount} OFFSET {$offset}";
        }



        if (0 == $id && 0 < $limit) {

            $order_state = "ORDER BY a.{$order_by} {$order}";
        }



        $sql = "

                SELECT a.ID, a.post_title, a.post_date{$content_col}{$meta_col}

                FROM {$wpdb->posts} AS a

                {$meta_join}

                WHERE a.post_type = '{$this->post_type}'

                AND a.post_status = 'publish'

                {$meta_find}

                {$find}

                {$order_state}

                {$limited}

            ";

        #print_r($sql); die();

        return $wpdb->get_results($sql, ARRAY_A);
    }



    // Private Functions

    private function json_response($posts, $error_message)

    {

        if ($posts) {

            wp_send_json($this->build_response($posts));
        } else {

            wp_send_json(['error' => $error_message]);
        }
    }



    private function build_response($posts)

    {

        $arr = [];

        for ($a = 0; $a < count($posts); $a++) {

            $arr[$a]['id'] = (int) $posts[$a]['ID'];

            $arr[$a]['title'] = $posts[$a]['post_title'];

            $arr[$a]['date'] = date("Y-m-d\TH:i:s", strtotime($posts[$a]['post_date']));

            $arr[$a]['permalink'] = get_the_permalink($arr[$a]['id']);

            if (in_array('editor', $this->supports)) {

                $arr[$a]['content'] = wpautop($posts[$a]['post_content']);
            }

            if (in_array('thumbnail', $this->supports)) {

                $arr[$a]['featured_image'] = get_the_post_thumbnail_url($arr[$a]['id'], 'full');
            }

            if (is_array($this->custom_fields) && 0 < count($this->custom_fields)) {

                $meta = maybe_unserialize($posts[$a]['meta_value']);

                foreach ($this->custom_fields as $field) {

                    $key = strtolower(str_replace(' ', '_', preg_replace("/[^a-zA-Z0-9\s]/", '', $field['label'])));

                    $type = $field['type'];

                    if ('media' == $type) {

                        $value = wp_get_attachment_url($meta[$key]);
                    } elseif ('richtext' == $type) {

                        $value = wpautop($meta[$key]);
                    } else {

                        $value = $meta[$key];
                    }

                    $arr[$a][$key] = $value;
                }
            }

            if (is_array($this->post_taxonomies) && 0 < count($this->post_taxonomies)) {

                foreach ($this->post_taxonomies as $taxonomy) {

                    $terms = wp_get_post_terms($arr[$a]['id'], $taxonomy);

                    for ($b = 0; $b < count($terms); $b++) {

                        $arr[$a][$taxonomy][$b]['term_id'] = $terms[$b]->term_id;

                        $arr[$a][$taxonomy][$b]['name'] = $terms[$b]->name;
                    }
                }
            }
        }

        return $arr;
    }
}
