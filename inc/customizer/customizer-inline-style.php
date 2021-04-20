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

	$main_color_shade         = get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' );
	$general_link_color       = get_theme_mod( 'yith_proteo_general_link_color', get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ) );
	$general_link_hover_color = get_theme_mod( 'yith_proteo_general_link_hover_color', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), - 0.3 ) );
	$general_link_decoration  = 'yes' === get_theme_mod( 'yith_proteo_general_link_decoration', 'yes' ) ? 'underline' : 'none';

	$header_bg_color        = get_theme_mod( 'yith_proteo_header_background_color', '#ffffff' );
	$sticky_header_bg_color = get_theme_mod( 'yith_proteo_sticky_header_background_color', get_theme_mod( 'yith_proteo_header_background_color', '#ffffff' ) );

	$topbar_bg_color            = get_theme_mod( 'yith_proteo_topbar_background_color', '#ebebeb' );
	$topbar_font_size           = get_theme_mod( 'yith_proteo_topbar_font_size', 16 );
	$topbar_font_color          = get_theme_mod( 'yith_proteo_topbar_font_color', '#404040' );
	$topbar_align               = get_theme_mod( 'yith_proteo_topbar_align', 'right' );
	$topbar_link_color          = get_theme_mod( 'yith_proteo_topbar_link_color', '#448a85' );
	$topbar_link_hover_color    = get_theme_mod( 'yith_proteo_topbar_link_hover_color', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_topbar_link_color', '#448a85' ), - 0.3 ) );
	$topbar_bottom_border       = 'yes' === get_theme_mod( 'yith_proteo_topbar_bottom_border', 'no' ) ? '1px solid' : 'none';
	$topbar_bottom_border_color = get_theme_mod( 'yith_proteo_topbar_bottom_border_color', '#000000' );
	$topbar_bottom_border_width = get_theme_mod( 'yith_proteo_topbar_bottom_border_width', 1 );

	$footer_bg_color                = get_theme_mod( 'yith_proteo_footer_background_color', '#f7f7f7' );
	$footer_bg_image                = get_theme_mod( 'yith_proteo_footer_background_image', '' );
	$footer_bg_image                = '' === $footer_bg_image ? 'none' : "url({$footer_bg_image})";
	$footer_bg_image_size           = 'yes' === get_theme_mod( 'yith_proteo_footer_background_size_full', 'yes' ) ? 'cover' : 'initial';
	$footer_bg_image_repeat         = get_theme_mod( 'yith_proteo_footer_background_repeat', 'repeat' );
	$footer_bg_image_position       = str_replace( '-', ' ', get_theme_mod( 'yith_proteo_footer_background_position', 'center center' ) );
	$footer_font_size               = get_theme_mod( 'yith_proteo_footer_font_size', 16 );
	$footer_font_color              = get_theme_mod( 'yith_proteo_footer_font_color', '#404040' );
	$footer_align                   = get_theme_mod( 'yith_proteo_footer_align', 'left' );
	$footer_link_color              = get_theme_mod( 'yith_proteo_footer_link_color', '#448a85' );
	$footer_link_hover_color        = get_theme_mod( 'yith_proteo_footer_link_hover_color', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_topbar_link_color', '#448a85' ), - 0.3 ) );
	$footer_widgets_title_color     = get_theme_mod( 'yith_proteo_footer_widgets_title_color', get_theme_mod( 'yith_proteo_h2_font_color', '#404040' ) );
	$footer_widgets_title_font_size = get_theme_mod( 'yith_proteo_footer_widgets_title_font_size', get_theme_mod( 'yith_proteo_base_font_size', 16 ) * 1.5 );

	$footer_credits_bg_color         = get_theme_mod( 'yith_proteo_footer_credits_background_color', '#f0f0f0' );
	$footer_credits_font_size        = get_theme_mod( 'yith_proteo_footer_credits_font_size', 16 );
	$footer_credits_font_color       = get_theme_mod( 'yith_proteo_footer_credits_font_color', '#404040' );
	$footer_credits_align            = get_theme_mod( 'yith_proteo_footer_credits_align', 'left' );
	$footer_credits_link_color       = get_theme_mod( 'yith_proteo_footer_credits_link_color', '#448a85' );
	$footer_credits_link_hover_color = get_theme_mod( 'yith_proteo_footer_credits_link_hover_color', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_topbar_link_color', '#448a85' ), - 0.3 ) );

	$footer_sidebar_1_width = get_theme_mod( 'yith_proteo_footer_sidebar_1_width', 100 );
	$footer_sidebar_2_width = get_theme_mod( 'yith_proteo_footer_sidebar_2_width', 100 );

	$header_menu_font_size          = get_theme_mod( 'yith_proteo_header_main_menu_font_size', 14 );
	$header_menu_text_transform     = get_theme_mod( 'yith_proteo_header_main_menu_text_transform', 'uppercase' );
	$header_menu_letter_spacing     = get_theme_mod( 'yith_proteo_header_main_menu_letter_spacing', 2 );
	$header_menu_color              = get_theme_mod( 'yith_proteo_header_main_menu_color', '#404040' );
	$header_menu_hover_color        = get_theme_mod( 'yith_proteo_header_main_menu_hover_color', '#448a85' );
	$sticky_header_menu_color       = get_theme_mod( 'yith_proteo_sticky_header_main_menu_color', get_theme_mod( 'yith_proteo_header_main_menu_color', '#404040' ) );
	$sticky_header_menu_hover_color = get_theme_mod( 'yith_proteo_sticky_header_main_menu_hover_color', get_theme_mod( 'yith_proteo_header_main_menu_hover_color', '#448a85' ) );
	$mobile_menu_bg_color           = get_theme_mod( 'yith_proteo_mobile_menu_background_color', get_theme_mod( 'yith_proteo_header_background_color', '#ffffff' ) );
	$mobile_menu_color              = get_theme_mod( 'yith_proteo_mobile_menu_color', get_theme_mod( 'yith_proteo_header_main_menu_color', '#404040' ) );
	$mobile_menu_hover_color        = get_theme_mod( 'yith_proteo_mobile_menu_hover_color', get_theme_mod( 'yith_proteo_header_main_menu_hover_color', '#448a85' ) );

	$site_custom_logo_max_width = get_theme_mod( 'yith_proteo_custom_logo_max_width', 375 );
	$site_title_font_size       = get_theme_mod( 'yith_proteo_site_title_font_size', 48 );
	$site_title_color           = get_theme_mod( 'yith_proteo_site_title_color', '#404040' );
	$tagline_font_size          = get_theme_mod( 'yith_proteo_tagline_font_size', 14 );
	$tagline_color              = get_theme_mod( 'yith_proteo_tagline_color', '#404040' );

	$base_font_size             = get_theme_mod( 'yith_proteo_base_font_size', 16 );
	$base_font_color            = get_theme_mod( 'yith_proteo_base_font_color', '#404040' );
	$h1_font_size               = get_theme_mod( 'yith_proteo_h1_font_size', 70 );
	$h1_font_color              = get_theme_mod( 'yith_proteo_h1_font_color', '#404040' );
	$h2_font_size               = get_theme_mod( 'yith_proteo_h2_font_size', 40 );
	$h2_font_color              = get_theme_mod( 'yith_proteo_h2_font_color', '#404040' );
	$h3_font_size               = get_theme_mod( 'yith_proteo_h3_font_size', 19 );
	$h3_font_color              = get_theme_mod( 'yith_proteo_h3_font_color', '#404040' );
	$h4_font_size               = get_theme_mod( 'yith_proteo_h4_font_size', 16 );
	$h4_font_color              = get_theme_mod( 'yith_proteo_h4_font_color', '#404040' );
	$h5_font_size               = get_theme_mod( 'yith_proteo_h5_font_size', 13 );
	$h5_font_color              = get_theme_mod( 'yith_proteo_h5_font_color', '#404040' );
	$h6_font_size               = get_theme_mod( 'yith_proteo_h6_font_size', 11 );
	$h6_font_color              = get_theme_mod( 'yith_proteo_h6_font_color', '#404040' );
	$widgets_title_font_size    = get_theme_mod( 'yith_proteo_widget_title_font_size', 1.5 * $base_font_size );
	$widgets_title_font_color   = get_theme_mod( 'yith_proteo_widget_title_font_color', $h2_font_color );
	$widgets_content_font_size  = get_theme_mod( 'yith_proteo_widget_content_font_size', 1.125 * $base_font_size );
	$widgets_content_font_color = get_theme_mod( 'yith_proteo_widget_content_font_color', $base_font_color );

	/**
	 * Page title
	 */
	$page_title_align = get_theme_mod( 'yith_proteo_page_title_align', 'center' );

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
	 * Blog
	 */
	$post_thumbnail_background_color         = get_theme_mod( 'yith_proteo_single_post_background_color', '#448a85' );
	$post_thumbnail_background_color_opacity = get_theme_mod( 'yith_proteo_single_post_bg_alpha', 70 ) / 100;
	$post_thumbnail_text_color               = get_theme_mod( 'yith_proteo_single_post_thumbnail_text_color', '#ffffff' );

	/**
	 * Forms
	 */
	$forms_input_borde_radius = get_theme_mod( 'yith_proteo_inputs_border_radius', 0 );
	$forms_input_border_width = get_theme_mod( 'yith_proteo_inputs_border_width_size', 1 );
	$forms_input_font_size    = get_theme_mod( 'yith_proteo_inputs_font_size', $base_font_size );

	/**
	 * Mobile typography
	 */
	$mobile_site_title_font_size                = get_theme_mod( 'yith_proteo_mobile_site_title_font_size', 38 );
	$mobile_tagline_font_size                   = get_theme_mod( 'yith_proteo_mobile_tagline_font_size', 11 );
	$mobile_base_font_size                      = get_theme_mod( 'yith_proteo_mobile_base_font_size', 13 );
	$mobile_topbar_font_size                    = get_theme_mod( 'yith_proteo_mobile_topbar_font_size', 13 );
	$mobile_menu_font_size                      = get_theme_mod( 'yith_proteo_mobile_menu_font_size', 16 );
	$mobile_h1_font_size                        = get_theme_mod( 'yith_proteo_mobile_h1_font_size', 56 );
	$mobile_h2_font_size                        = get_theme_mod( 'yith_proteo_mobile_h2_font_size', 32 );
	$mobile_h3_font_size                        = get_theme_mod( 'yith_proteo_mobile_h3_font_size', 15 );
	$mobile_h4_font_size                        = get_theme_mod( 'yith_proteo_mobile_h4_font_size', 13 );
	$mobile_h5_font_size                        = get_theme_mod( 'yith_proteo_mobile_h5_font_size', 10 );
	$mobile_h6_font_size                        = get_theme_mod( 'yith_proteo_mobile_h6_font_size', 9 );
	$mobile_footer_font_size                    = get_theme_mod( 'yith_proteo_mobile_footer_font_size', 13 );
	$mobile_footer_credits_font_size            = get_theme_mod( 'yith_proteo_mobile_footer_credits_font_size', 13 );
	$mobile_single_product_page_title_font_size = get_theme_mod( 'yith_proteo_mobile_single_product_page_title_font_size', 36 );

	/**
	 * Other options
	 */
	$site_background_color = get_theme_mod( 'background_color', 'ffffff' );

	/**
	 * Block editor custom colors
	 */
	$yith_proteo_editor_custom_color_1 = get_theme_mod( 'yith_proteo_block_editor_color_1', '#01af8d' );
	$yith_proteo_editor_custom_color_2 = get_theme_mod( 'yith_proteo_block_editor_color_2', '#ffffff' );
	$yith_proteo_editor_custom_color_3 = get_theme_mod( 'yith_proteo_block_editor_color_3', '#107774' );
	$yith_proteo_editor_custom_color_4 = get_theme_mod( 'yith_proteo_block_editor_color_4', '#404040' );
	$yith_proteo_editor_custom_color_5 = get_theme_mod( 'yith_proteo_block_editor_color_5', '#dd9933' );
	$yith_proteo_editor_custom_color_6 = get_theme_mod( 'yith_proteo_block_editor_color_6', '#000000' );
	$yith_proteo_editor_custom_color_7 = get_theme_mod( 'yith_proteo_block_editor_color_7', '#1e73be' );
	$yith_proteo_editor_custom_color_8 = get_theme_mod( 'yith_proteo_block_editor_color_8', '#dd3333' );

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

	$single_product_price_font_size              = get_theme_mod( 'yith_proteo_product_page_price_font_size', 35 );
	$single_product_price_color                  = get_theme_mod( 'yith_proteo_product_page_price_color', get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ) );
	$single_product_quantity_input_font_size     = get_theme_mod( 'yith_proteo_product_page_quantity_font_size', 40 );
	$single_product_add_to_cart_button_font_size = get_theme_mod( 'yith_proteo_product_page_add_to_cart_font_size', 20 );
	$single_product_title_font_size              = get_theme_mod( 'yith_proteo_product_page_title_font_size', 70 );
	$single_product_title_font_color             = get_theme_mod( 'yith_proteo_product_page_title_font_color', '#404040' );

	$single_product_tabs_title_font_size   = get_theme_mod( 'yith_proteo_product_tabs_title_font_size', 30 );
	$single_product_tabs_title_color       = get_theme_mod( 'yith_proteo_product_tabs_title_font_color', '#1f1f1f' );
	$single_product_tabs_content_font_size = get_theme_mod( 'yith_proteo_product_tabs_content_font_size', 16 );

	$catalog_product_title_font_size       = get_theme_mod( 'yith_proteo_product_catalog_title_font_size', 14 );
	$catalog_product_title_color           = get_theme_mod( 'yith_proteo_product_catalog_title_color', '#404040' );
	$catalog_product_price_font_size       = get_theme_mod( 'yith_proteo_product_catalog_price_font_size', 14 );
	$catalog_product_price_color           = get_theme_mod( 'yith_proteo_product_catalog_price_color', '#1f1f1f' );
	$catalog_product_add_to_cart_font_size = get_theme_mod( 'yith_proteo_product_catalog_add_to_cart_font_size', 14 );

	$responsive_breakpoint_mobile        = get_theme_mod( 'yith_proteo_mobile_device_width', 600 );
	$responsive_breakpoint_table         = get_theme_mod( 'yith_proteo_tablet_device_width', 768 );
	$responsive_breakpoint_small_desktop = get_theme_mod( 'yith_proteo_small_desktop_device_width', 992 );
	$responsive_breakpoint_desktop       = get_theme_mod( 'yith_proteo_desktop_device_width', 1200 );
	$responsive_breakpoint_large_desktop = get_theme_mod( 'yith_proteo_large_desktop_device_width', 1400 );

	/*
	 * Spacing options
	 */
	$site_title_spacing       = implode(
		'px ',
		get_theme_mod(
			'yith_proteo_site_title_spacing',
			array(
				'top'    => 0,
				'right'  => 30,
				'bottom' => 0,
				'left'   => 0,
			)
		)
	) . 'px';
	$tagline_spacing          = implode(
		'px ',
		get_theme_mod(
			'yith_proteo_tagline_spacing',
			array(
				'top'    => 10,
				'right'  => 30,
				'bottom' => 0,
				'left'   => 0,
			)
		)
	) . 'px';
	$topbar_spacing           = implode(
		'px ',
		get_theme_mod(
			'yith_proteo_topbar_spacing',
			array(
				'top'    => 15,
				'right'  => 0,
				'bottom' => 15,
				'left'   => 0,
			)
		)
	) . 'px';
	$header_manu_menu_spacing = implode(
		'px ',
		get_theme_mod(
			'yith_proteo_header_main_menu_spacing',
			array(
				'top'    => 0,
				'right'  => 0,
				'bottom' => 0,
				'left'   => 0,
			)
		)
	) . 'px';
	$header_spacing           = implode(
		'px ',
		get_theme_mod(
			'yith_proteo_header_spacing',
			array(
				'top'    => 15,
				'right'  => 15,
				'bottom' => 15,
				'left'   => 15,
			)
		)
	) . 'px';
	$sticky_header_spacing    = implode(
		'px ',
		get_theme_mod(
			'yith_proteo_sticky_header_spacing',
			array(
				'top'    => 8,
				'right'  => 15,
				'bottom' => 8,
				'left'   => 15,
			)
		)
	) . 'px';
	$site_content_spacing     = implode(
		'px ',
		get_theme_mod(
			'yith_proteo_site_content_spacing',
			array(
				'top'    => 50,
				'right'  => 0,
				'bottom' => 50,
				'left'   => 0,
			)
		)
	) . 'px';
	$page_title_spacing       = implode(
		'px ',
		get_theme_mod(
			'yith_proteo_page_title_spacing',
			array(
				'top'    => 0,
				'right'  => 0,
				'bottom' => 35,
				'left'   => 0,
			)
		)
	) . 'px';

	$custom_css = ":root {
		--proteo-main_color_shade: {$main_color_shade};
		--proteo-general_link_color: {$general_link_color};
		--proteo-general_link_hover_color: {$general_link_hover_color};
		--proteo-general_link_decoration: {$general_link_decoration};
		--proteo-header_bg_color: {$header_bg_color};
		--proteo-sticky_header_bg_color: {$sticky_header_bg_color};
		--proteo-header_menu_font_size: {$header_menu_font_size}px;
		--proteo-header_menu_text_transform: {$header_menu_text_transform};
		--proteo-header_menu_letter_spacing: {$header_menu_letter_spacing}px;
		--proteo-header_menu_color: {$header_menu_color};
		--proteo-header_menu_hover_color: {$header_menu_hover_color};
		--proteo-sticky_header_menu_color: {$sticky_header_menu_color};
		--proteo-sticky_header_menu_hover_color: {$sticky_header_menu_hover_color};
		--proteo-mobile_menu_bg_color: {$mobile_menu_bg_color};
		--proteo-mobile_menu_color: {$mobile_menu_color};
		--proteo-mobile_menu_hover_color: {$mobile_menu_hover_color};
		--proteo-site_custom_logo_max_width: {$site_custom_logo_max_width}px;
		--proteo-site_title_font_size: {$site_title_font_size}px;
		--proteo-site_title_color: {$site_title_color};
		--proteo-tagline_font_size: {$tagline_font_size}px;
		--proteo-tagline_color: {$tagline_color};
		--proteo-topbar_bg_color: {$topbar_bg_color};
		--proteo-topbar_font_size: {$topbar_font_size}px;
		--proteo-topbar_font_color: {$topbar_font_color};
		--proteo-topbar_align: {$topbar_align};
		--proteo-topbar_link_color: {$topbar_link_color};
		--proteo-topbar_link_hover_color: {$topbar_link_hover_color};
		--proteo-topbar_bottom_border: {$topbar_bottom_border};
		--proteo-topbar_bottom_border_color: {$topbar_bottom_border_color};
		--proteo-topbar_bottom_border_width: {$topbar_bottom_border_width}px;
		--proteo-footer_bg_color: {$footer_bg_color};
		--proteo-footer_bg_image: {$footer_bg_image};
		--proteo-footer_bg_image_size: {$footer_bg_image_size};
		--proteo-footer_bg_image_repeat: {$footer_bg_image_repeat};
		--proteo-footer_bg_image_position: {$footer_bg_image_position};
		--proteo-footer_font_size: {$footer_font_size}px;
		--proteo-footer_font_color: {$footer_font_color};
		--proteo-footer_align: {$footer_align};
		--proteo-footer_link_color: {$footer_link_color};
		--proteo-footer_link_hover_color: {$footer_link_hover_color};
		--proteo-footer_widgets_title_color: {$footer_widgets_title_color};
		--proteo-footer_widgets_title_font_size: {$footer_widgets_title_font_size}px;
		--proteo-footer_credits_bg_color: {$footer_credits_bg_color};
		--proteo-footer_credits_font_size: {$footer_credits_font_size}px;
		--proteo-footer_credits_font_color: {$footer_credits_font_color};
		--proteo-footer_credits_align: {$footer_credits_align};
		--proteo-footer_credits_link_color: {$footer_credits_link_color};
		--proteo-footer_credits_link_hover_color: {$footer_credits_link_hover_color};
		--proteo-footer_sidebar_1_width: {$footer_sidebar_1_width}%;
		--proteo-footer_sidebar_2_width: {$footer_sidebar_2_width}%;
		--proteo-base_font_size: {$base_font_size}px;
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
		--proteo-widgets_title_font_size: {$widgets_title_font_size }px;
		--proteo-widgets_title_font_color: {$widgets_title_font_color};
		--proteo-widgets_content_font_size: {$widgets_content_font_size }px;
		--proteo-widgets_content_font_color: {$widgets_content_font_color};
		--proteo-mobile_site_title_font_size:{$mobile_site_title_font_size }px;
		--proteo-mobile_tagline_font_size:{$mobile_tagline_font_size}px;
		--proteo-mobile_base_font_size:{$mobile_base_font_size}px;
		--proteo-mobile_topbar_font_size:{$mobile_topbar_font_size}px;
		--proteo-mobile_menu_font_size:{$mobile_menu_font_size}px;
		--proteo-mobile_h1_font_size:{$mobile_h1_font_size}px;
		--proteo-mobile_h2_font_size:{$mobile_h2_font_size}px;
		--proteo-mobile_h3_font_size:{$mobile_h3_font_size}px;
		--proteo-mobile_h4_font_size:{$mobile_h4_font_size}px;
		--proteo-mobile_h5_font_size:{$mobile_h5_font_size}px;
		--proteo-mobile_h6_font_size:{$mobile_h6_font_size}px;
		--proteo-mobile_single_product_page_title_font_size:{$mobile_single_product_page_title_font_size}px;
		--proteo-mobile_footer_font_size:{$mobile_footer_font_size}px;
		--proteo-mobile_footer_credits_font_size:{$mobile_footer_credits_font_size}px;
		--proteo-page_title_align: {$page_title_align};
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
		--proteo-post_thumbnail_background_color: {$post_thumbnail_background_color};
		--proteo-post_thumbnail_background_color_opacity: {$post_thumbnail_background_color_opacity};
		--proteo-post_thumbnail_text_color: {$post_thumbnail_text_color};
		--proteo-forms_input_borde_radius: {$forms_input_borde_radius}px;
		--proteo-forms_input_border_width: {$forms_input_border_width}px;
		--proteo-forms_input_font_size: {$forms_input_font_size}px;
		--proteo-site_background_color: #{$site_background_color};
		--proteo-yith_proteo_editor_custom_color_1: {$yith_proteo_editor_custom_color_1};
		--proteo-yith_proteo_editor_custom_color_2: {$yith_proteo_editor_custom_color_2};
		--proteo-yith_proteo_editor_custom_color_3: {$yith_proteo_editor_custom_color_3};
		--proteo-yith_proteo_editor_custom_color_4: {$yith_proteo_editor_custom_color_4};
		--proteo-yith_proteo_editor_custom_color_5: {$yith_proteo_editor_custom_color_5};
		--proteo-yith_proteo_editor_custom_color_6: {$yith_proteo_editor_custom_color_6};
		--proteo-yith_proteo_editor_custom_color_7: {$yith_proteo_editor_custom_color_7};
		--proteo-yith_proteo_editor_custom_color_8: {$yith_proteo_editor_custom_color_8};
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
		--proteo-single_product_price_font_size: {$single_product_price_font_size}px;
		--proteo-single_product_price_color: {$single_product_price_color};
		--proteo-single_product_quantity_input_font_size: {$single_product_quantity_input_font_size}px;
		--proteo-single_product_add_to_cart_button_font_size: {$single_product_add_to_cart_button_font_size}px;
		--proteo-single_product_tabs_title_font_size: {$single_product_tabs_title_font_size}px;
		--proteo-single_product_tabs_title_color: {$single_product_tabs_title_color};
		--proteo-single_product_tabs_content_font_size: {$single_product_tabs_content_font_size}px;
		--proteo-single_product_title_font_size: {$single_product_title_font_size}px;
		--proteo-single_product_title_font_color: {$single_product_title_font_color};
		--proteo-catalog_product_title_font_size: {$catalog_product_title_font_size}px;
		--proteo-catalog_product_title_color: {$catalog_product_title_color};
		--proteo-catalog_product_price_font_size: {$catalog_product_price_font_size}px;
		--proteo-catalog_product_price_color: {$catalog_product_price_color};
		--proteo-catalog_product_add_to_cart_font_size: {$catalog_product_add_to_cart_font_size}px;
		--proteo-site_title_spacing: {$site_title_spacing};
		--proteo-tagline_spacing: {$tagline_spacing};
		--proteo-topbar_spacing: {$topbar_spacing};
		--proteo-header_manu_menu_spacing: {$header_manu_menu_spacing};
		--proteo-header_spacing: {$header_spacing};
		--proteo-sticky_header_spacing: {$sticky_header_spacing};
		--proteo-site_content_spacing: {$site_content_spacing};
		--proteo-page_title_spacing: {$page_title_spacing};
		--proteo-responsive_breakpoint_mobile: {$responsive_breakpoint_mobile}px;
		--proteo-responsive_breakpoint_table: {$responsive_breakpoint_table}px;
		--proteo-responsive_breakpoint_small_desktop: {$responsive_breakpoint_small_desktop}px;
		--proteo-responsive_breakpoint_desktop: {$responsive_breakpoint_desktop}px;
		--proteo-responsive_breakpoint_large_desktop: {$responsive_breakpoint_large_desktop}px;
	}";

	if ( ! empty( $custom_css ) ) {
		wp_add_inline_style( 'yith-proteo-custom-style', $custom_css );
	}

	yith_proteo_massive_google_font_enqueue();
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
		if ( '#' === $color[0] ) {
			$color = substr( $color, 1 );
		}

		// Check if color has 6 or 3 characters and get values.
		if ( strlen( $color ) === 6 ) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) === 3 ) {
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
