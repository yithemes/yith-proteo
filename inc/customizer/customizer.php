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
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

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

	require get_template_directory() . '/inc/customizer/panels/sidebars.php';

	require get_template_directory() . '/inc/customizer/panels/topbar.php';

	require get_template_directory() . '/inc/customizer/panels/header.php';

	require get_template_directory() . '/inc/customizer/panels/footer.php';

	require get_template_directory() . '/inc/customizer/panels/footer-credits.php';

	require get_template_directory() . '/inc/customizer/panels/google-font.php';

	require get_template_directory() . '/inc/customizer/panels/typography.php';

	require get_template_directory() . '/inc/customizer/panels/buttons.php';

	require get_template_directory() . '/inc/customizer/panels/forms.php';

	require get_template_directory() . '/inc/customizer/panels/blog.php';

	require get_template_directory() . '/inc/customizer/panels/color-shades.php';

	require get_template_directory() . '/inc/customizer/panels/documentation.php';

	require get_template_directory() . '/inc/customizer/panels/site-identity.php';
}

add_action( 'customize_register', 'yith_proteo_customize_register' );


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yith_proteo_customize_shop_register( $wp_customize ) {

	require get_template_directory() . '/inc/customizer/panels/woocommerce/store-notice.php';

	require get_template_directory() . '/inc/customizer/panels/woocommerce/sale-badge.php';

	require get_template_directory() . '/inc/customizer/panels/woocommerce/messages.php';

	require get_template_directory() . '/inc/customizer/panels/woocommerce/single-product.php';

	require get_template_directory() . '/inc/customizer/panels/woocommerce/product-category.php';

	require get_template_directory() . '/inc/customizer/panels/woocommerce/product-tag.php';

	require get_template_directory() . '/inc/customizer/panels/woocommerce/product-tax.php';

	require get_template_directory() . '/inc/customizer/panels/woocommerce/cart.php';

	require get_template_directory() . '/inc/customizer/panels/woocommerce/product-catalog.php';

}

if ( function_exists( 'wc' ) ) {
	add_action( 'customize_register', 'yith_proteo_customize_shop_register' );
}


add_action( 'customize_render_control_yith_proteo_google_font', 'yith_proteo_add_gfont_documentation_link' );

/**
 * Render GFont doc guide link
 */
function yith_proteo_add_gfont_documentation_link() {
	printf( '<span class="dashicons dashicons-sos" style="vertical-align: middle;"></span> <a href="%s" target="_blank" rel="noopener nofollow">%s</a>', esc_url( 'https://docs.yithemes.com/yith-proteo/customization/how-to-use-google-fonts/' ), esc_html__( 'Read the documentation to see how to retrieve a Google Font URL', 'yith-proteo' ) );
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

/**
 * Add YITH Customizer CSS
 */
function yith_proteo_customize_enqueue() {
	wp_enqueue_style( 'customizer-css', get_template_directory_uri() . '/inc/customizer/customizer-css.css', array(), YITH_PROTEO_VERSION );
}

add_action( 'customize_controls_enqueue_scripts', 'yith_proteo_customize_enqueue' );
