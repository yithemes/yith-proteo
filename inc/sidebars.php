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
				'before_widget' => '<section id="%1$s" class="widget ' . $show_on_mobile . ' %2$s">',
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
				'before_widget' => '<section id="%1$s" class="widget %2$s col-lg-' . $yith_proteo_footer_sidebar_1_widget_per_row . '">',
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
				'before_widget' => '<section id="%1$s" class="widget %2$s col-lg-' . $yith_proteo_footer_sidebar_2_widget_per_row . '">',
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
				'name'          => esc_html__( 'Sidebar 4', 'yith-proteo' ),
				'id'            => 'sidebar-4',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar 5', 'yith-proteo' ),
				'id'            => 'sidebar-5',
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
		register_sidebar(
			array(
				'name'          => esc_html__( 'Blog category sidebar', 'yith-proteo' ),
				'id'            => 'blog-category-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Blog tag sidebar', 'yith-proteo' ),
				'id'            => 'blog-tag-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'yith-proteo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'           => esc_html__( 'Mobile menu sidebar', 'yith-proteo' ),
				'id'             => 'mobile-menu-sidebar',
				'description'    => esc_html__( 'Add widgets here.', 'yith-proteo' ),
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
