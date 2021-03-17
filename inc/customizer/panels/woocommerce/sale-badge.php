<?php
/**
 * YITH-proteo Theme Customizer - Sale Badge
 *
 * @package yith-proteo
 */

/**
 * Sale badge management
 */
	$wp_customize->add_section(
		'yith_proteo_sale_badge_management',
		array(
			'title'    => esc_html_x( 'Sale badge', 'Customizer section title', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'woocommerce',
		)
	);

	// Sale badge background color.
	$wp_customize->add_setting(
		'yith_proteo_sale_badge_bg_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_sale_badge_bg_color',
			array(
				'label'   => esc_html_x( 'Background color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_sale_badge_management',
			)
		)
	);
	// Sale badge text color.
	$wp_customize->add_setting(
		'yith_proteo_sale_badge_text_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_sale_badge_text_color',
			array(
				'label'   => esc_html_x( 'Text color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_sale_badge_management',
			)
		)
	);
	// Sale badge font size.
	$wp_customize->add_setting(
		'yith_proteo_sale_badge_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 13,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_sale_badge_font_size',
		array(
			'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_sale_badge_management',
			'type'    => 'number',
		)
	);
