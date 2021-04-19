<?php
/**
 * YITH-Proteo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yith-proteo
 */

if ( ! defined( 'YITH_PROTEO_VERSION' ) ) {
	define( 'YITH_PROTEO_VERSION', wp_get_theme( get_template() )->get( 'Version' ) );
}

if ( ! function_exists( 'yith_proteo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function yith_proteo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on yith-proteo, use a find and replace
		 * to change 'yith-proteo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'yith-proteo', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'yith-proteo' ),
				'mobile'  => esc_html__( 'Mobile Menu', 'yith-proteo' ),
			)
		);

		/**
		 * Fix empty menu locations
		 */
		$menu_locations        = get_theme_mod( 'nav_menu_locations' );
		$update_menu_locations = false;
		if ( ! isset( $menu_locations['primary'] ) && isset( $menu_locations['menu-1'] ) ) {
			$menu_locations        = array_merge( $menu_locations, array( 'primary' => $menu_locations['menu-1'] ) );
			$update_menu_locations = true;
		}
		if ( ! isset( $menu_locations['mobile'] ) && isset( $menu_locations['primary'] ) ) {
			$menu_locations        = array_merge( $menu_locations, array( 'mobile' => $menu_locations['primary'] ) );
			$update_menu_locations = true;
		}

		if ( $update_menu_locations ) {
			set_theme_mod( 'nav_menu_locations', $menu_locations );
		}

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'yith_proteo_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/**
		 * Register additional image size
		 */
		add_image_size( 'proteo-blog-loop-image', 725, 358, true );
		add_image_size( 'proteo-blog-loop-image-wide', 1480, 745, true );
		add_image_size( 'proteo_blog_cropped_cover_image_' . get_theme_mod( 'yith_proteo_single_post_fullwidth_cover_cropping_custom_height', 400 ), 2560, get_theme_mod( 'yith_proteo_single_post_fullwidth_cover_cropping_custom_height', 400 ), array( 'center', 'top' ) );

		/**
		 * Gutenberg box aligning options
		 */
		add_theme_support( 'align-wide' );

		/**
		 * Add support to admin editor style
		 */
		add_theme_support( 'editor-styles' );

		/**
		 * Responsive embedded content
		 */
		add_theme_support( 'responsive-embeds' );

		/**
		 * Gutenberg experimental functions
		 */
		add_theme_support( 'custom-units' );
		add_theme_support( 'custom-line-height' );
		add_theme_support( 'experimental-custom-spacing' );
	}
endif;
add_action( 'after_setup_theme', 'yith_proteo_setup' );


if ( ! function_exists( 'yith_proteo_content_width' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function yith_proteo_content_width() {
		// This variable is intended to be overruled from themes.
		// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
		// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		$GLOBALS['content_width'] = apply_filters( 'yith_proteo_content_width', 1150 );
	}

	add_action( 'after_setup_theme', 'yith_proteo_content_width', 0 );
endif;

if ( ! class_exists( 'YITH_Proteo_Generate_Responsive_CSS_File' ) ) {
	/**
	 * Load Proteo Responsive CSS generator class
	 */
	require get_template_directory() . '/inc/customizer/class-yith-proteo-generate-responsive-css-file.php';
}

/**
 * Proteo admin dashboard class
 */
if ( is_admin() ) {
	require get_template_directory() . '/inc/theme-dashboard/class-proteo-admin-dashboard.php';
}

/**
 * Sidebars handling
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Scripts handling
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Enqueue editor block style
 */
add_editor_style( 'style-editor.css' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Theme metaboxes.
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom comments Walker Class
 */
require get_template_directory() . '/inc/class-yith-proteo-walker-comment.php';

/**
 * Customizer additions.
 *
 * @param object $wp_customize Instance of WP_Customize_Manager class.
 */
function yith_proteo_load_customize_classes( $wp_customize ) {
	require get_template_directory() . '/inc/customizer/custom-controls/class-wp-customize-range.php';
	require get_template_directory() . '/inc/customizer/custom-controls/class-wp-customize-notice.php';
	require get_template_directory() . '/inc/customizer/custom-controls/class-customizer-button-preview.php';
	require get_template_directory() . '/inc/customizer/custom-controls/class-customizer-alpha-color-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/class-google-font-select-custom-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/class-customizer-control-radio-image.php';
	require get_template_directory() . '/inc/customizer/custom-controls/class-customizer-control-yes-no.php';
	require get_template_directory() . '/inc/customizer/custom-controls/class-customizer-control-on-off.php';
	require get_template_directory() . '/inc/customizer/custom-controls/class-customizer-control-spacing.php';
	require get_template_directory() . '/inc/customizer/customizer.php';
}
add_action( 'customize_register', 'yith_proteo_load_customize_classes', 0 );

/**
 * Widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Customizer inline style additions.
 */
require get_template_directory() . '/inc/customizer/customizer-inline-style.php';
require get_template_directory() . '/inc/customizer/custom-controls/google-fonts.php';

/**
 * Load TGM class
 */
if ( ! class_exists( 'TGM_Plugin_Activation' ) ) {
	require_once get_template_directory() . '/third-party/classes/class-tgm-plugin-activation.php';
}

/**
 * Various functions
 */
require get_template_directory() . '/inc/utils.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Block editor colors
 */
require get_template_directory() . '/inc/colors-palette.php';
