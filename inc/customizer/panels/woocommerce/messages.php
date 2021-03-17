<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Messages
 *
 * @package yith-proteo
 */

	/**
	 * WooCommerce messages management
	 */
	$wp_customize->add_section(
		'yith_proteo_woo_messages_management',
		array(
			'title'    => esc_html_x( 'Messages', 'Customizer section title', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'woocommerce',
		)
	);

	// WooCommerce messages font size.
	$wp_customize->add_setting(
		'yith_proteo_woo_messages_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 14,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_woo_messages_font_size',
		array(
			'label'   => esc_html_x( 'WooCommerce messages Font size', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_woo_messages_management',
			'type'    => 'number',
		)
	);

	// Default Messages Accent Color.
	$wp_customize->add_setting(
		'yith_proteo_woo_default_messages_accent_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#17b4a9',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_woo_default_messages_accent_color',
			array(
				'label'   => esc_html_x( 'Accent color for default messages', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_woo_messages_management',
			)
		)
	);

	// Info Messages Accent Color.
	$wp_customize->add_setting(
		'yith_proteo_woo_info_messages_accent_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#e0e0e0',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_woo_info_messages_accent_color',
			array(
				'label'   => esc_html_x( 'Accent color for info messages', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_woo_messages_management',
			)
		)
	);

	// Error Messages Accent Color.
	$wp_customize->add_setting(
		'yith_proteo_woo_error_messages_accent_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#ffab91',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_woo_error_messages_accent_color',
			array(
				'label'   => esc_html_x( 'Accent color for error messages', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_woo_messages_management',
			)
		)
	);
