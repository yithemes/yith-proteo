<?php
/**
 * Fonts functions
 *
 * @package yith-proteo
 */

define( 'YITH_PROTEO_GFONT_VERSION', '1.0.0' );

/**
 * Get the font family
 *
 * @param object $font Json containing the font.
 */
function yith_proteo_get_font_family( $font ) {
	$decoded = json_decode( $font );
	return $decoded->font;
}

/**
 * Get the font weight
 *
 * @param object $font Json containing the font.
 */
function yith_proteo_get_font_weight( $font ) {
	$decoded           = json_decode( $font );
	$decoded_substring = substr( $decoded->regularweight, 0, 3 );
	if ( is_numeric( $decoded_substring ) ) {
		return $decoded_substring;
	} else {
		return preg_replace( '/[0-9]/', '', $decoded->regularweight );
	}
}

/**
 * Get the font weight raw
 *
 * @param object $font Json containing the font.
 */
function yith_proteo_get_font_weight_raw( $font ) {
	$decoded = json_decode( $font );
	return $decoded->regularweight;
}

/**
 * Get the font style
 *
 * @param object $font Json containing the font.
 */
function yith_proteo_get_font_style( $font ) {
	$decoded = json_decode( $font );
	return strpos( $decoded->regularweight, 'italic' ) ? 'italic' : 'normal';
}


/**
 * Get the font category
 *
 * @param object $font Json containing the font.
 */
function yith_proteo_get_font_category( $font ) {
	$decoded = json_decode( $font );
	if ( 'display' === $decoded ) {
		return 'sans-serif';
	}
	if ( 'handwriting' === $decoded ) {
		return 'cursive';
	}
	return $decoded->category;
}

/**
 * Read all theme_mod Google Font options
 */
function yith_proteo_read_all_font_options() {
	$options = array(
		'site_title_font'                     => array(
			'default'  => '{"font":"Jost","regularweight":"600","category":"sans-serif"}',
			'selector' => '.site-branding .site-title',
		),
		'tagline_font'                        => array(
			'default'  => '{"font":"Jost","regularweight":"regular","category":"sans-serif"}',
			'selector' => '.site-branding .site-description',
		),
		'yith_proteo_body_font'               => array(
			'default'  => '{"font":"Montserrat","regularweight":"regular","category":"sans-serif"}',
			'selector' => 'body, body.yith-woocompare-popup',
		),
		'yith_proteo_h1_font'                 => array(
			'default'  => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
			'selector' => 'h1, body.page header.entry-header h1, article:not(.has-post-thumbnail).page header.entry-header h1',
		),
		'yith_proteo_h2_font'                 => array(
			'default'  => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
			'selector' => 'h2',
		),
		'yith_proteo_h3_font'                 => array(
			'default'  => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
			'selector' => 'h3',
		),
		'yith_proteo_h4_font'                 => array(
			'default'  => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
			'selector' => 'h4',
		),
		'yith_proteo_h5_font'                 => array(
			'default'  => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
			'selector' => 'h5',
		),
		'yith_proteo_h6_font'                 => array(
			'default'  => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
			'selector' => 'h6',
		),
		'yith_proteo_header_main_menu_font'   => array(
			'default'  => '{"font":"Montserrat","regularweight":"regular","category":"sans-serif"}',
			'selector' => '.main-navigation ul',
		),
		'yith_proteo_product_page_title_font' => array(
			'default'  => '{"font":"Montserrat","regularweight":"regular","category":"sans-serif"}',
			'selector' => 'h1.product_title',
		),
		'yith_proteo_widget_title_font'       => array(
			'default'  => get_theme_mod( 'yith_proteo_h3_font', '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}' ),
			'selector' => 'h2.widget-title, h3.widget-title',
		),
		'yith_proteo_widget_content_font'     => array(
			'default'  => get_theme_mod( 'yith_proteo_body_font', '{"font":"Montserrat","regularweight":"regular","category":"sans-serif"}' ),
			'selector' => '.widget',
		),

	);
	return $options;
}


if ( ! function_exists( 'yith_proteo_massive_google_font_enqueue' ) ) :
	/**
	 * Handle fonts
	 */
	function yith_proteo_massive_google_font_enqueue() {
		$options      = yith_proteo_read_all_font_options();
		$css          = '';
		$unique_fonts = array();

		foreach ( $options as $option => $value ) {
			$option_font_typography = get_theme_mod( $option, $value['default'] );
			$option_font            = yith_proteo_get_font_family( $option_font_typography );
			$option_font_weight_raw = yith_proteo_get_font_weight_raw( $option_font_typography );
			$option_font_weight     = yith_proteo_get_font_weight( $option_font_typography );
			$option_font_style      = yith_proteo_get_font_style( $option_font_typography );
			$option_font_category   = yith_proteo_get_font_category( $option_font_typography );

			if ( ! isset( $unique_fonts[ $option_font ] ) ) {
				$unique_fonts[ $option_font ] = array( $option_font_weight_raw );
			} elseif ( ! in_array( $option_font_weight_raw, $unique_fonts[ $option_font ], true ) ) {
				$unique_fonts[ $option_font ][] = $option_font_weight_raw;
			}

			$css .= "
			{$value['selector']} {
				font-family: {$option_font}, {$option_font_category};
				font-weight: {$option_font_weight};
				font-style: {$option_font_style};
			}
			";
		}

		// Enqueue font.
		$url = yith_proteo_enqueue_google_fonts_unique_url( $unique_fonts ) . '&display=swap';

		if ( ! empty( $url ) ) {
			wp_enqueue_style( 'yith-proteo-custom-google-fonts', $url, array(), YITH_PROTEO_GFONT_VERSION );
		}

		if ( ! empty( $css ) ) {
			wp_add_inline_style( 'yith-proteo-custom-style', $css );
		}
	}
endif;

/**
 * Get the font category
 *
 * @param array $fonts Objects array with all fonts.
 */
function yith_proteo_enqueue_google_fonts_unique_url( $fonts ) {

	/* URL */
	$base_url  = '//fonts.googleapis.com/css';
	$font_args = array();
	$family    = array();

	/* Format Each Font Family in Array */
	foreach ( $fonts as $font_name => $font_weight ) {
		$font_name = str_replace( ' ', '+', $font_name );
		if ( ! empty( $font_weight ) ) {
			if ( is_array( $font_weight ) ) {
				$font_weight = implode( ',', $font_weight );
			}
			$family[] = trim( $font_name . ':' . rawurlencode( trim( $font_weight ) ) );
		} else {
			$family[] = trim( $font_name );
		}
	}

	/* Only return URL if font family defined. */
	if ( ! empty( $family ) ) {

		/* Make Font Family a String */
		$family = implode( '|', $family );

		/* Add font family in args */
		$font_args['family'] = $family;

		return add_query_arg( $font_args, $base_url );
	}

	return '';
}
