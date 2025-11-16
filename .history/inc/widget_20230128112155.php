<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function codelicious_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Widget Area 1', 'codelicious'),
			'id'            => 'sidebar-2',
			'description'   => esc_html__('Add widgets here.', 'codelicious'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Widget Area 2', 'codelicious'),
			'id'            => 'sidebar-3',
			'description'   => esc_html__('Add widgets here.', 'codelicious'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Widget Area 3', 'codelicious'),
			'id'            => 'sidebar-4',
			'description'   => esc_html__('Add widgets here.', 'codelicious'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Widget Area 4', 'codelicious'),
			'id'            => 'sidebar-5',
			'description'   => esc_html__('Add widgets here.', 'codelicious'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		)
	);
}
add_action('widgets_init', 'codelicious_widgets_init');
