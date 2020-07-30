<?php
/**
 * YITH-proteo Theme Customizer - Store Notice
 *
 * @package yith-proteo
 */

	// Store notice background color.
	$wp_customize->add_setting(
		'yith_proteo_store_notice_bg_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#607d8b',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_store_notice_bg_color',
			array(
				'label'   => esc_html__( 'Store notice background color', 'yith-proteo' ),
				'section' => 'woocommerce_store_notice',
			)
		)
	);
	// Store notice text color.
	$wp_customize->add_setting(
		'yith_proteo_store_notice_text_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_store_notice_text_color',
			array(
				'label'   => esc_html__( 'Store notice text color', 'yith-proteo' ),
				'section' => 'woocommerce_store_notice',
			)
		)
	);

	// Store notice font size.
	$wp_customize->add_setting(
		'yith_proteo_store_notice_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 13,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_store_notice_font_size',
		array(
			'label'   => esc_html__( 'Store notice font size (default: 13px)', 'yith-proteo' ),
			'section' => 'woocommerce_store_notice',
			'type'    => 'number',
		)
	);
