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
			'before_title'  => '<div class="footer-toggle" data-bs-toggle="collapse" data-bs-target="#menu-about-codelicious-1" aria-expanded="false" aria-controls="menu-about-codelicious-1"> <h5>',
			'after_title'   => '</h5> </div>',

			
    
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Widget Area 2', 'codelicious'),
			'id'            => 'sidebar-3',
			'description'   => esc_html__('Add widgets here.', 'codelicious'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<div class="footer-toggle" data-bs-toggle="collapse" data-bs-target="#menu-curriculum-1" aria-expanded="false" aria-controls="menu-curriculum-1"> <h5>',
			'after_title'   => '</h5> </div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Widget Area 3', 'codelicious'),
			'id'            => 'sidebar-4',
			'description'   => esc_html__('Add widgets here.', 'codelicious'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<div class="footer-toggle" data-bs-toggle="collapse" data-bs-target="#menu-resources-1" aria-expanded="false" aria-controls="menu-resources-1"> <h5>',
			'after_title'   => '</h5> </div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Footer Widget Area 4', 'codelicious'),
			'id'            => 'sidebar-5',
			'description'   => esc_html__('Add widgets here.', 'codelicious'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<div class="footer-toggle" data-bs-toggle="collapse" data-bs-target="#menu-help-and-support-1" aria-expanded="false" aria-controls="menu-help-and-support-1"> <h5>',
			'after_title'   => '</h5> </div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__('Post Sidebar', 'codelicious'),
			'id'            => 'sidebar-6',
			'description'   => esc_html__('Add widgets here.', 'codelicious'),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h5>',
			'after_title'   => '</h5>',
		)
	);
}
add_action('widgets_init', 'codelicious_widgets_init');
