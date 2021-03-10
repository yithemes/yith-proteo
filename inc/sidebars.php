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
		$show_on_mobile                              = get_theme_mod( 'yith_proteo_show_mobile_header_sidebar', 'yes' ) === 'no' ? 'hidden-xs' : '';
		$yith_proteo_footer_sidebar_1_widget_per_row = get_theme_mod( 'yith_proteo_footer_sidebar_1_widget_per_row', 3 );
		$yith_proteo_footer_sidebar_2_widget_per_row = get_theme_mod( 'yith_proteo_footer_sidebar_2_widget_per_row', 3 );
		$mobile_menu_align                           = get_theme_mod( 'yith_proteo_mobile_menu_align', 'left' );

		/**
		 * Fix column class in case of 5 elements per row
		 */
		if ( 5 === $yith_proteo_footer_sidebar_1_widget_per_row ) {
			$yith_proteo_footer_sidebar_1_widget_per_row = 20;
		} else {
			$yith_proteo_footer_sidebar_1_widget_per_row = 12 / $yith_proteo_footer_sidebar_1_widget_per_row;
		}

		/**
		 * Fix column class in case of 5 elements per row
		 */
		if ( 5 === $yith_proteo_footer_sidebar_2_widget_per_row ) {
			$yith_proteo_footer_sidebar_2_widget_per_row = 20;
		} else {
			$yith_proteo_footer_sidebar_2_widget_per_row = 12 / $yith_proteo_footer_sidebar_2_widget_per_row;
		}

		register_sidebar(
			array(
				'name'          => esc_html_x( 'Default sidebar', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Topbar sidebar', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'topbar-sidebar',
				'description'   => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Header sidebar', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'header-sidebar',
				'description'   => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget ' . $show_on_mobile . ' %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Footer sidebar 1', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'footer-sidebar-1',
				'description'   => esc_html_x( 'Add widgets here. Multiple columns can be configured.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s col-lg-' . $yith_proteo_footer_sidebar_1_widget_per_row . '">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Footer sidebar 2', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'footer-sidebar-2',
				'description'   => esc_html_x( 'Add widgets here. Multiple columns can be configured.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s col-lg-' . $yith_proteo_footer_sidebar_2_widget_per_row . '">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Sidebar 2', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'sidebar-2',
				'description'   => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Sidebar 3', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'sidebar-3',
				'description'   => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Sidebar 4', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'sidebar-4',
				'description'   => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Sidebar 5', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'sidebar-5',
				'description'   => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Shop sidebar', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'shop-sidebar',
				'description'   => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Blog category sidebar', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'blog-category-sidebar',
				'description'   => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html_x( 'Blog tag sidebar', 'Sidebar name', 'yith-proteo' ),
				'id'            => 'blog-tag-sidebar',
				'description'   => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'           => esc_html_x( 'Mobile menu sidebar', 'Sidebar name', 'yith-proteo' ),
				'id'             => 'mobile-menu-sidebar',
				'description'    => esc_html_x( 'Add widgets here.', 'Sidebar description', 'yith-proteo' ),
				'before_widget'  => '<section id="%1$s" class="widget %2$s">',
				'after_widget'   => '</section>',
				'before_title'   => '<h2 class="widget-title">',
				'after_title'    => '</h2>',
				'before_sidebar' => '<div id="%1$s" class="mobile-menu-sidebar-align-' . $mobile_menu_align . '">',
				'after_sidebar'  => '</div>',
			)
		);
	}
endif;
add_action( 'widgets_init', 'yith_proteo_widgets_init' );
