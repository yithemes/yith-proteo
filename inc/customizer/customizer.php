<?php
/**
 * YITH-proteo Theme Customizer
 *
 * @package yith-proteo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yith_proteo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->remove_control( 'header_textcolor' );
	$wp_customize->remove_control( 'display_header_text' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'yith_proteo_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'yith_proteo_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_panel(
		'yith_proteo_header_and_topbar_management',
		array(
			'title'    => esc_html_x( 'Header and Topbar', 'Customizer panel name', 'yith-proteo' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_section(
		'header_image',
		array(
			'title'    => esc_html_x( 'Header background', 'Customizer section title', 'yith-proteo' ),
			'priority' => 30,
			'panel'    => 'yith_proteo_header_and_topbar_management',
		)
	);

	// Header background color.
	$wp_customize->add_setting(
		'yith_proteo_header_background_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_header_background_color',
			array(
				'label'   => esc_html_x( 'Background color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'header_image',
			)
		)
	);

	$wp_customize->add_panel(
		'yith_proteo_footer_and_credits',
		array(
			'title'    => esc_html_x( 'Footer and Credits', 'Customizer panel name', 'yith-proteo' ),
			'priority' => 60,
		)
	);

	$wp_customize->add_panel(
		'yith_proteo_extra',
		array(
			'title'    => esc_html_x( 'Miscellaneous', 'Customizer panel name', 'yith-proteo' ),
			'priority' => 70,
		)
	);

	$wp_customize->add_section(
		'colors',
		array(
			'title'    => esc_html_x( 'Site colors', 'Customizer section title', 'yith-proteo' ),
			'priority' => 5,
			'panel'    => 'yith_proteo_extra',
		)
	);

	$wp_customize->add_section(
		'background_image',
		array(
			'title'    => esc_html_x( 'Site background image', 'Customizer section title', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_extra',
		)
	);

	$wp_customize->add_panel(
		'woocommerce',
		array(
			'title'    => esc_html_x( 'WooCommerce', 'Customizer panel name', 'yith-proteo' ),
			'priority' => 100,
		)
	);

	$wp_customize->add_section(
		'static_front_page',
		array(
			'title'       => esc_html_x( 'Homepage Settings', 'Customizer section title', 'yith-proteo' ),
			'priority'    => 20,
			'description' => esc_html_x( 'You can choose what&#8217;s displayed on the homepage of your site. It can be posts in reverse chronological order (classic blog), or a fixed/static page. To set a static homepage, you first need to create two Pages. One will become the homepage, and the other will be where your posts are displayed.', 'Customizer section description', 'yith-proteo' ),
		)
	);

	include_once get_template_directory() . '/inc/customizer/panels/sidebars.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/topbar.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/header.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/footer.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/footer-credits.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/typography.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/buttons.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/forms.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/blog.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/color-shades.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/documentation.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/site-identity.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/mobile.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/responsive.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/layout.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/block-editor-colors.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
}

add_action( 'customize_register', 'yith_proteo_customize_register' );


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yith_proteo_customize_shop_register( $wp_customize ) {

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/store-notice.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/sale-badge.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/messages.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/shop-page.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/single-product.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/product-category.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/product-tag.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/product-tax.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/cart.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/product-catalog.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	include_once get_template_directory() . '/inc/customizer/panels/woocommerce/breadcrumbs.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

}

if ( function_exists( 'wc' ) ) {
	add_action( 'customize_register', 'yith_proteo_customize_shop_register' );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function yith_proteo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function yith_proteo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


if ( ! function_exists( 'yith_proteo_sanitize_sidebar_position' ) ) :
	/**
	 * Sanitize default sidebar position options
	 *
	 * @param string $input Sidebar position metabox value.
	 *
	 * @return string
	 */
	function yith_proteo_sanitize_sidebar_position( $input ) {
		$valid = array(
			'no-sidebar' => esc_html_x( 'No sidebar', 'Customizer option value', 'yith-proteo' ),
			'right'      => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
			'left'       => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
endif;

if ( ! function_exists( 'yith_proteo_sanitize_yes_no' ) ) :
	/**
	 * Sanitize Yes/No options
	 *
	 * @param string $input Value to sanitize (Yes and No).
	 *
	 * @return string
	 */
	function yith_proteo_sanitize_yes_no( $input ) {
		$valid = array(
			'yes' => esc_html_x( 'Yes', 'Customizer option value', 'yith-proteo' ),
			'no'  => esc_html_x( 'No', 'Customizer option value', 'yith-proteo' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
endif;


if ( ! function_exists( 'yith_proteo_sanitize_select' ) ) :
	/**
	 * Select sanitization function
	 *
	 * @param string $input input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
	 *
	 * @param array  $setting select value to check.
	 *
	 * @return string
	 */
	function yith_proteo_sanitize_select( $input, $setting ) {

		$input = sanitize_key( $input );

		// get the list of possible select options.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// return input if valid or return default option.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}
endif;

if ( ! function_exists( 'yith_proteo_sanitize_radio' ) ) :
	/**
	 * Radio sanitization function
	 *
	 * @param string $input input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
	 *
	 * @param array  $setting select value to check.
	 *
	 * @return string
	 */
	function yith_proteo_sanitize_radio( $input, $setting ) {

		// input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
		$input = sanitize_key( $input );

		// get the list of possible radio box options.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// return input if valid or return default option.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}
endif;

if ( ! function_exists( 'yith_proteo_sanitize_int_array' ) ) :
	/**
	 * Int Array sanitization function
	 *
	 * @param string $input input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
	 *
	 * @param array  $setting select value to check.
	 *
	 * @return string
	 */
	function yith_proteo_sanitize_int_array( $input, $setting ) {

		// return input if valid or return default option.
		return ( array_map( 'intval', $input ) );
	}
endif;

if ( ! function_exists( 'yith_proteo_range_sanitization' ) ) {
	/**
	 * Slider sanitization
	 *
	 * @param string $input  Slider value to be sanitized.
	 *
	 * @param object $setting  Option to check.
	 *
	 * @return string    Sanitized input
	 */
	function yith_proteo_range_sanitization( $input, $setting ) {
		$attrs = $setting->manager->get_control( $setting->id )->input_attrs;

		$min  = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
		$max  = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
		$step = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );

		$number = floor( $input / $attrs['step'] ) * $attrs['step'];

		return yith_proteo_in_range( $number, $min, $max );
	}
}


if ( ! function_exists( 'yith_proteo_in_range' ) ) {
	/**
	 * Only allow values between a certain minimum & maxmium range
	 *
	 * @param int $input    Input to be sanitized.
	 * @param int $min      Min input value.
	 * @param int $max      Max input value.
	 *
	 * @return number       Sanitized input
	 */
	function yith_proteo_in_range( $input, $min, $max ) {
		if ( $input < $min ) {
			$input = $min;
		}
		if ( $input > $max ) {
			$input = $max;
		}

		return $input;
	}
}

if ( ! function_exists( 'yith_proteo_sanitize_alpha_colors' ) ) {
	/**
	 * Sanitize alpha color picker values when arriving as string
	 *
	 * @param string $value color code.
	 */
	function yith_proteo_sanitize_alpha_colors( $value ) {
		// This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
		$pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';
		\preg_match( $pattern, $value, $matches );
		// Return the 1st match found.
		if ( isset( $matches[0] ) ) {
			if ( is_string( $matches[0] ) ) {
				return $matches[0];
			}
			if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
				return $matches[0][0];
			}
		}
		// If no match was found, return an empty string.
		return '';
	}
}


if ( ! function_exists( 'yith_proteo_google_font_sanitization' ) ) {
	/**
	 * Google Font sanitization
	 *
	 * @param  string $input JSON string to be sanitized.
	 * @return string   Sanitized input
	 */
	function yith_proteo_google_font_sanitization( $input ) {
		$val = json_decode( $input, true );
		if ( is_array( $val ) ) {
			foreach ( $val as $key => $value ) {
				$val[ $key ] = sanitize_text_field( $value );
			}
			$input = wp_json_encode( $val );
		} else {
			$input = wp_json_encode( sanitize_text_field( $val ) );
		}
		return $input;
	}
}

if ( ! function_exists( 'yith_proteo_is_footer_sidebar_one_enabled' ) ) {
	/**
	 * Callback function to enable Footer Sidebar #1 options
	 *
	 * @return bool
	 */
	function yith_proteo_is_footer_sidebar_one_enabled() {
		return 'yes' === get_theme_mod( 'yith_proteo_footer_sidebar_1_enable', 'yes' );
	}
}

if ( ! function_exists( 'yith_proteo_is_footer_sidebar_two_enabled' ) ) {
	/**
	 * Callback function to enable Footer Sidebar #2 options
	 *
	 * @return bool
	 */
	function yith_proteo_is_footer_sidebar_two_enabled() {
		return 'yes' === get_theme_mod( 'yith_proteo_footer_sidebar_2_enable', 'yes' );
	}
}

if ( ! function_exists( 'yith_proteo_is_footer_sidebars_side_by_side_available' ) ) {
	/**
	 * Callback function to enable Footer Sidebars side by side positioning
	 *
	 * @return bool
	 */
	function yith_proteo_is_footer_sidebars_side_by_side_available() {
		$sidebar_1_enabled = yith_proteo_is_footer_sidebar_one_enabled();
		$sidebar_2_enabled = yith_proteo_is_footer_sidebar_two_enabled();
		$sidebar_1_width   = get_theme_mod( 'yith_proteo_footer_sidebar_1_width', 100 );
		$sidebar_2_width   = get_theme_mod( 'yith_proteo_footer_sidebar_2_width', 100 );

		$enable = false;
		if ( $sidebar_1_enabled && $sidebar_2_enabled && ( $sidebar_1_width + $sidebar_2_width <= 100 ) ) {
			$enable = true;
		}
		return $enable;
	}
}

if ( ! function_exists( 'yith_proteo_footer_has_custom_background' ) ) {
	/**
	 * Callback function to enable Footer background additional settings
	 *
	 * @return bool
	 */
	function yith_proteo_footer_has_custom_background() {
		return ! empty( get_theme_mod( 'yith_proteo_footer_background_image' ) );
	}
}

if ( ! function_exists( 'yith_proteo_footer_background_not_is_full_width' ) ) {
	/**
	 * Callback function to check state of Footer background full width
	 *
	 * @return bool
	 */
	function yith_proteo_footer_background_not_is_full_width() {
		if ( ! yith_proteo_footer_has_custom_background() ) {
			return false;
		} else {
			return 'no' === get_theme_mod( 'yith_proteo_footer_background_size_full', 'yes' );
		}
	}
}

if ( ! function_exists( 'yith_proteo_topbar_is_enabled' ) ) {
	/**
	 * Callback function to check if topbar bottom border is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_topbar_is_enabled() {
		return 'yes' === get_theme_mod( 'yith_proteo_topbar_enable', 'no' );
	}
}

if ( ! function_exists( 'yith_proteo_topbar_has_bottom_border' ) ) {
	/**
	 * Callback function to check if topbar bottom border is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_topbar_has_bottom_border() {
		if ( yith_proteo_topbar_is_enabled() ) {
			return 'yes' === get_theme_mod( 'yith_proteo_topbar_bottom_border', 'no' );
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'yith_proteo_blog_layout_is_fullwidth_image' ) ) {
	/**
	 * Callback function to check state of Blog layout
	 *
	 * @return bool
	 */
	function yith_proteo_blog_layout_is_fullwidth_image() {
		return 'fullwidth_cover_image' === get_theme_mod( 'yith_proteo_single_post_layout', 'standard' );
	}
}

if ( ! function_exists( 'yith_proteo_sticky_header_is_enabled' ) ) {
	/**
	 * Callback function to check if sticky header is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_sticky_header_is_enabled() {
		return 'yes' === get_theme_mod( 'yith_proteo_header_sticky', 'no' );
	}
}

if ( ! function_exists( 'yith_proteo_default_sidebar_is_enabled' ) ) {
	/**
	 * Callback function to check if default sidebar is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_default_sidebar_is_enabled() {
		return 'no-sidebar' !== get_theme_mod( 'yith_proteo_default_sidebar_position', 'right' );
	}
}

if ( ! function_exists( 'yith_proteo_blog_page_sidebar_is_enabled' ) ) {
	/**
	 * Callback function to check if blog sidebar is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_blog_page_sidebar_is_enabled() {
		return 'no-sidebar' !== get_theme_mod( 'yith_proteo_blog_page_sidebar_position', 'right' );
	}
}

if ( ! function_exists( 'yith_proteo_blog_category_sidebar_is_enabled' ) ) {
	/**
	 * Callback function to check if blog category page sidebar is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_blog_category_sidebar_is_enabled() {
		return 'no-sidebar' !== get_theme_mod( 'yith_proteo_blog_category_sidebar_position', 'right' );
	}
}

if ( ! function_exists( 'yith_proteo_blog_tag_sidebar_is_enabled' ) ) {
	/**
	 * Callback function to check if blog tag page sidebar is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_blog_tag_sidebar_is_enabled() {
		return 'no-sidebar' !== get_theme_mod( 'yith_proteo_blog_tag_sidebar_position', 'right' );
	}
}

if ( ! function_exists( 'yith_proteo_product_page_sidebar_is_enabled' ) ) {
	/**
	 * Callback function to check if product page sidebar is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_product_page_sidebar_is_enabled() {
		return 'no-sidebar' !== get_theme_mod( 'yith_proteo_product_page_sidebar_position', 'no-sidebar' );
	}
}

if ( ! function_exists( 'yith_proteo_shop_page_sidebar_is_enabled' ) ) {
	/**
	 * Callback function to check if shop page sidebar is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_shop_page_sidebar_is_enabled() {
		return 'no-sidebar' !== get_theme_mod( 'yith_proteo_shop_page_sidebar_position', 'no-sidebar' );
	}
}

if ( ! function_exists( 'yith_proteo_product_category_page_sidebar_is_enabled' ) ) {
	/**
	 * Callback function to check if product category page sidebar is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_product_category_page_sidebar_is_enabled() {
		return 'no-sidebar' !== get_theme_mod( 'yith_proteo_product_category_page_sidebar_position', 'no-sidebar' );
	}
}

if ( ! function_exists( 'yith_proteo_product_tag_page_sidebar_is_enabled' ) ) {
	/**
	 * Callback function to check if product tag page sidebar is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_product_tag_page_sidebar_is_enabled() {
		return 'no-sidebar' !== get_theme_mod( 'yith_proteo_product_tag_page_sidebar_position', 'no-sidebar' );
	}
}

if ( ! function_exists( 'yith_proteo_product_tax_page_sidebar_is_enabled' ) ) {
	/**
	 * Callback function to check if product tax page sidebar is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_product_tax_page_sidebar_is_enabled() {
		return 'no-sidebar' !== get_theme_mod( 'yith_proteo_product_tax_page_sidebar_position', 'no-sidebar' );
	}
}

if ( ! function_exists( 'yith_proteo_is_store_notice_enabled' ) ) {
	/**
	 * Callback function to check if product tax page sidebar is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_is_store_notice_enabled() {
		update_option( 'woocommerce_demo_store', get_theme_mod( 'woocommerce_demo_store', get_option( 'woocommerce_demo_store', 'no' ) ) );
		return 'no' !== get_theme_mod( 'woocommerce_demo_store', get_option( 'woocommerce_demo_store', 'no' ) );
	}
}

if ( ! function_exists( 'yith_proteo_is_custom_responsive_enabled' ) ) {
	/**
	 * Callback function to check if custom responsive css option is enabled
	 *
	 * @return bool
	 */
	function yith_proteo_is_custom_responsive_enabled() {
		return 'no' !== get_theme_mod( 'yith_proteo_use_custom_responsive', 'no' );
	}
}

/**
 * Add YITH Customizer CSS
 */
function yith_proteo_customize_enqueue() {
	wp_enqueue_style( 'customizer-css', get_template_directory_uri() . '/inc/customizer/customizer-css.css', array(), YITH_PROTEO_VERSION );
}

add_action( 'customize_controls_enqueue_scripts', 'yith_proteo_customize_enqueue' );

/**
 * Add YITH Customizer Buttons preview CSS
 */
function yith_proteo_customizer_buttons_preview_style() {
	/**
	 * Buttons
	 */
	$button_1_bg_color           = get_theme_mod( 'yith_proteo_button_style_1_bg_color', get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ) );
	$button_1_border_color       = get_theme_mod( 'yith_proteo_button_style_1_border_color', get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ) );
	$button_1_font_color         = get_theme_mod( 'yith_proteo_button_style_1_text_color', '#ffffff' );
	$button_1_bg_hover_color     = get_theme_mod( 'yith_proteo_button_style_1_bg_color_hover', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ) );
	$button_1_border_hover_color = get_theme_mod( 'yith_proteo_button_style_1_border_color_hover', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ) );
	$button_1_font_hover_color   = get_theme_mod( 'yith_proteo_button_style_1_text_color_hover', '#ffffff' );

	$button_2_bg_color_1       = get_theme_mod( 'yith_proteo_button_style_2_bg_color_1', get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ) );
	$button_2_bg_color_1       = yith_proteo_hex2rgba( $button_2_bg_color_1, 1 );
	$button_2_bg_color_2       = get_theme_mod( 'yith_proteo_button_style_2_bg_color_2', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ) );
	$button_2_bg_color_2       = yith_proteo_hex2rgba( $button_2_bg_color_2, 1 );
	$button_2_font_color       = get_theme_mod( 'yith_proteo_button_style_2_text_color', '#ffffff' );
	$button_2_bg_hover_color   = get_theme_mod( 'yith_proteo_button_style_2_bg_color_hover', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), - 0.3 ) );
	$button_2_font_hover_color = get_theme_mod( 'yith_proteo_button_style_2_text_color_hover', '#ffffff' );

	$buttons_border_radius = get_theme_mod( 'yith_proteo_buttons_border_radius', 50 );

	$custom_css = "
	.button-preview-custom-control {
		--proteo-button_1_bg_color: {$button_1_bg_color};
		--proteo-button_1_border_color: {$button_1_border_color};
		--proteo-button_1_font_color: {$button_1_font_color};
		--proteo-button_1_bg_hover_color: {$button_1_bg_hover_color};
		--proteo-button_1_border_hover_color: {$button_1_border_hover_color};
		--proteo-button_1_font_hover_color: {$button_1_font_hover_color};
		--proteo-button_2_bg_color_1: {$button_2_bg_color_1};
		--proteo-button_2_bg_color_2: {$button_2_bg_color_2};
		--proteo-button_2_font_color: {$button_2_font_color};
		--proteo-button_2_bg_hover_color: {$button_2_bg_hover_color};
		--proteo-button_2_font_hover_color: {$button_2_font_hover_color};
		--proteo-buttons_border_radius: {$buttons_border_radius}px;
	}";
	if ( ! empty( $custom_css ) ) {
		wp_add_inline_style( 'customizer-css', $custom_css );
	}
}

add_action( 'customize_controls_enqueue_scripts', 'yith_proteo_customizer_buttons_preview_style' );

add_action( 'customize_save_after', 'yith_proteo_custom_responsive_css_file_save', 99 );

/**
 * Generate and save custom responsive css file in upload folder
 *
 * @return void
 */
function yith_proteo_custom_responsive_css_file_save() {
	if ( 'yes' === get_theme_mod( 'yith_proteo_use_custom_responsive', 'no' ) ) {
		$yith_proteo_responsive_css = YITH_Proteo_Generate_Responsive_CSS_File::get_instance();
		$yith_proteo_responsive_css->elaborate_css_file();
	}
}
