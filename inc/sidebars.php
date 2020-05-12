<?php
/**
 * Theme sidebars file
 *
 * @package yith-proteo
 */

if ( ! function_exists( 'yith_proteo_widgets_init' ) ) :
	/**
	 * Register widget area.
	 */
	function yith_proteo_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Default Sidebar', 'yith-proteo' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Topbar Sidebar', 'yith-proteo' ),
				'id'            => 'topbar-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Header Sidebar', 'yith-proteo' ),
				'id'            => 'header-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Sidebar 1 (multiple columns can be configured)', 'yith-proteo' ),
				'id'            => 'footer-sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s col-lg-' . ( 12 / get_theme_mod( 'yith_proteo_footer_sidebar_1_widget_per_row', 3 ) ) . '">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Sidebar 2 (multiple columns can be configured)', 'yith-proteo' ),
				'id'            => 'footer-sidebar-2',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s col-lg-' . ( 12 / get_theme_mod( 'yith_proteo_footer_sidebar_2_widget_per_row', 3 ) ) . '">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar 2', 'yith-proteo' ),
				'id'            => 'sidebar-2',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar 3', 'yith-proteo' ),
				'id'            => 'sidebar-3',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Shop sidebar', 'yith-proteo' ),
				'id'            => 'shop-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
endif;
add_action( 'widgets_init', 'yith_proteo_widgets_init' );
