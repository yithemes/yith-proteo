<?php
/**
 * Proteo custom style file
 *
 * @package yith-proteo
 */

/**
 * Add a custom style based on customizer theme options
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_inline_style() {
	// Register a dummy empty style to hook to.
	wp_register_style( 'yith-proteo-custom-style', false, array(), YITH_PROTEO_VERSION );
	wp_enqueue_style( 'yith-proteo-custom-style' );

	$custom_css = '';

	$font         = '';
	$default_font = ( get_theme_mod( 'yith_proteo_google_font', esc_url_raw( 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap' ) ) ) == 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap' ? true : false;

	$main_color_shade         = get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' );
	$general_link_hover_color = get_theme_mod( 'yith_proteo_general_link_hover_color', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), - 0.3 ) );

	$header_bg_color         = get_theme_mod( 'yith_proteo_header_background_color', '#ffffff' );
	$topbar_bg_color         = get_theme_mod( 'yith_proteo_topbar_background_color', '#ebebeb' );
	$footer_bg_color         = get_theme_mod( 'yith_proteo_footer_background_color', '#f7f7f7' );
	$footer_credits_bg_color = get_theme_mod( 'yith_proteo_footer_credits_background_color', '#f0f0f0' );

	$header_menu_color       = get_theme_mod( 'yith_proteo_header_main_menu_color', '#404040' );
	$header_menu_hover_color = get_theme_mod( 'yith_proteo_header_main_menu_hover_color', '#448a85' );

	$base_font_size  = get_theme_mod( 'yith_proteo_base_font_size', 16 );
	$base_font_color = get_theme_mod( 'yith_proteo_base_font_color', '#404040' );
	$h1_font_size    = get_theme_mod( 'yith_proteo_h1_font_size', 70 );
	$h1_font_color   = get_theme_mod( 'yith_proteo_h1_font_color', '#404040' );
	$h2_font_size    = get_theme_mod( 'yith_proteo_h2_font_size', 40 );
	$h2_font_color   = get_theme_mod( 'yith_proteo_h2_font_color', '#404040' );
	$h3_font_size    = get_theme_mod( 'yith_proteo_h3_font_size', 19 );
	$h3_font_color   = get_theme_mod( 'yith_proteo_h3_font_color', '#404040' );
	$h4_font_size    = get_theme_mod( 'yith_proteo_h4_font_size', 16 );
	$h4_font_color   = get_theme_mod( 'yith_proteo_h4_font_color', '#404040' );
	$h5_font_size    = get_theme_mod( 'yith_proteo_h5_font_size', 13 );
	$h5_font_color   = get_theme_mod( 'yith_proteo_h5_font_color', '#404040' );
	$h6_font_size    = get_theme_mod( 'yith_proteo_h6_font_size', 11 );
	$h6_font_color   = get_theme_mod( 'yith_proteo_h6_font_color', '#404040' );

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

	/**
	 * Forms
	 */
	$forms_input_borde_radius = get_theme_mod( 'yith_proteo_inputs_border_radius', 0 );

	/**
	 * Store options
	 */
	$store_notice_bg_color   = get_theme_mod( 'yith_proteo_store_notice_bg_color', '#607d8b' );
	$store_notice_text_color = get_theme_mod( 'yith_proteo_store_notice_text_color', '#ffffff' );
	$store_notice_font_size  = get_theme_mod( 'yith_proteo_store_notice_font_size', 13 );
	$sale_badge_bg_color     = get_theme_mod( 'yith_proteo_sale_badge_bg_color', get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ) );
	$sale_badge_text_color   = get_theme_mod( 'yith_proteo_sale_badge_text_color', '#ffffff' );
	$sale_badge_font_size    = get_theme_mod( 'yith_proteo_sale_badge_font_size', 13 );

	$woo_messages_font_size            = get_theme_mod( 'yith_proteo_woo_messages_font_size', 14 );
	$woo_messages_default_accent_color = get_theme_mod( 'yith_proteo_woo_default_messages_accent_color', '#17b4a9' );
	$woo_messages_info_accent_color    = get_theme_mod( 'yith_proteo_woo_info_messages_accent_color', '#e0e0e0' );
	$woo_messages_error_accent_color   = get_theme_mod( 'yith_proteo_woo_error_messages_accent_color', '#ffab91' );

	if ( $default_font ) {
		$font = 'body, body.yith-woocompare-popup { font-family: \'Montserrat\', sans-serif; }';
	}

	$custom_css = "{$font}
:root {
	--proteo-main_color_shade: {$main_color_shade};
	--proteo-general_link_hover_color: {$general_link_hover_color};
	--proteo-header_bg_color: {$header_bg_color};
	--proteo-header_menu_color: {$header_menu_color};
	--proteo-header_menu_hover_color: {$header_menu_hover_color};
	--proteo-topbar_bg_color: {$topbar_bg_color};
	--proteo-footer_bg_color: {$footer_bg_color};
	--proteo-footer_credits_bg_color: {$footer_credits_bg_color};
	--proteo-base_font_size: {$base_font_size};
	--proteo-base_font_color: {$base_font_color};
	--proteo-h1_font_size: {$h1_font_size}px;
	--proteo-h1_font_color: {$h1_font_color};
	--proteo-h2_font_size: {$h2_font_size }px;
	--proteo-h2_font_color: {$h2_font_color};
	--proteo-h3_font_size: {$h3_font_size }px;
	--proteo-h3_font_color: {$h3_font_color};
	--proteo-h4_font_size: {$h4_font_size }px;
	--proteo-h4_font_color: {$h4_font_color};
	--proteo-h5_font_size: {$h5_font_size }px;
	--proteo-h5_font_color: {$h5_font_color};
	--proteo-h6_font_size: {$h6_font_size }px;
	--proteo-h6_font_color: {$h6_font_color};
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
	--proteo-forms_input_borde_radius: {$forms_input_borde_radius}px;
	--proteo-store_notice_bg_color: {$store_notice_bg_color};
	--proteo-store_notice_text_color: {$store_notice_text_color};
	--proteo-store_notice_font_size: {$store_notice_font_size}px;
	--proteo-sale_badge_bg_color: {$sale_badge_bg_color};
	--proteo-sale_badge_text_color: {$sale_badge_text_color};
	--proteo-sale_badge_font_size: {$sale_badge_font_size}px;
	--proteo-woo_messages_font_size: {$woo_messages_font_size}px;
	--proteo-woo_messages_default_accent_color: {$woo_messages_default_accent_color};
	--proteo-woo_messages_info_accent_color: {$woo_messages_info_accent_color};
	--proteo-woo_messages_error_accent_color: {$woo_messages_error_accent_color};
}";

	if ( ! empty( $custom_css ) ) {
		wp_add_inline_style( 'yith-proteo-custom-style', $custom_css );
	}
}

add_action( 'wp_enqueue_scripts', 'yith_proteo_inline_style', 10 );

if ( ! function_exists( 'yith_proteo_hex2rgba' ) ) :
	/**
	 * Convert hexdec color string to rgb(a) string
	 *
	 * @param string $color Color code string.
	 * @param bool   $opacity Opacity boolean.
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_hex2rgba( $color, $opacity = false ) {

		$default = 'rgb(0,0,0)';

		// Return default if no color provided.
		if ( empty( $color ) ) {
			return $default;
		}

		// Sanitize $color if "#" is provided.
		if ( '#' == $color[0] ) {
			$color = substr( $color, 1 );
		}

		// Check if color has 6 or 3 characters and get values.
		if ( strlen( $color ) == 6 ) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		// Convert hexadec to rgb.
		$rgb = array_map( 'hexdec', $hex );

		// Check if opacity is set(rgba or rgb).
		if ( $opacity ) {
			if ( abs( $opacity ) > 1 ) {
				$opacity = 1.0;
			}
			$output = 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';
		} else {
			$output = 'rgb(' . implode( ',', $rgb ) . ')';
		}

		// Return rgb(a) color string.
		return $output;
	}
endif;
