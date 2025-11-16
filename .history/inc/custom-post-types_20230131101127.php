<?php



if (!defined('ABSPATH')) {

    header('HTTP/1.0 403 Forbidden');

    exit;
}



include_once __DIR__ . '/class.rest-api.php';

include_once __DIR__ . '/class.custom-post-type.php';



$post_type_files = glob(get_template_directory() . "/post-types/class.*.php");



if (is_array($post_type_files)) {

    foreach ($post_type_files as $file) {

        include_once $file;
    }
}
