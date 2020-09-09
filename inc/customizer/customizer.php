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
			'title'    => esc_html__( 'Header and Topbar', 'yith-proteo' ),
			'priority' => 30,
		)
	);

	$wp_customize->add_section(
		'header_image',
		array(
			'title'    => esc_html__( 'Header background image', 'yith-proteo' ),
			'priority' => 30,
			'panel'    => 'yith_proteo_header_and_topbar_management',
		)
	);

	$wp_customize->add_panel(
		'yith_proteo_footer_and_credits',
		array(
			'title'    => esc_html__( 'Footer and Credits', 'yith-proteo' ),
			'priority' => 60,
		)
	);

	$wp_customize->add_panel(
		'yith_proteo_extra',
		array(
			'title'    => esc_html__( 'Extra', 'yith-proteo' ),
			'priority' => 70,
		)
	);

	$wp_customize->add_section(
		'colors',
		array(
			'title'    => esc_html__( 'Site colors', 'yith-proteo' ),
			'priority' => 5,
			'panel'    => 'yith_proteo_extra',
		)
	);

	$wp_customize->add_section(
		'background_image',
		array(
			'title'    => esc_html__( 'Site background image', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_extra',
		)
	);

	$wp_customize->add_panel(
		'woocommerce',
		array(
			'title'    => esc_html__( 'WooCommerce', 'yith-proteo' ),
			'priority' => 100,
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


add_action( 'customize_render_control_yith_proteo_body_font', 'yith_proteo_add_gfont_documentation_link' );

/**
 * Render GFont doc guide link
 */
function yith_proteo_add_gfont_documentation_link() {
	printf( '<div class="gfont-tooltip" style="margin-bottom: 25px;"><a href="%s" target="_blank" rel="noopener nofollow">%s</a></div>', esc_url( 'https://docs.yithemes.com/yith-proteo/customization/how-to-use-google-fonts/' ), esc_html__( 'Read how to retrieve a Google font url', 'yith-proteo' ) );
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
			'no-sidebar' => esc_html__( 'No sidebar', 'yith-proteo' ),
			'right'      => esc_html__( 'Right', 'yith-proteo' ),
			'left'       => esc_html__( 'Left', 'yith-proteo' ),
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
			'yes' => esc_html__( 'Yes', 'yith-proteo' ),
			'no'  => esc_html__( 'No', 'yith-proteo' ),
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

/**
 * Add YITH Customizer CSS
 */
function yith_proteo_customize_enqueue() {
	wp_enqueue_style( 'customizer-css', get_template_directory_uri() . '/inc/customizer/customizer-css.css', array(), YITH_PROTEO_VERSION );
}

add_action( 'customize_controls_enqueue_scripts', 'yith_proteo_customize_enqueue' );
