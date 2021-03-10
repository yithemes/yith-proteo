<?php
/**
 * YITH-proteo Theme Customizer - Colors
 *
 * @package yith-proteo
 */

	// Main color shade.
	$wp_customize->add_setting(
		'yith_proteo_main_color_shade',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#448a85',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_main_color_shade',
			array(
				'label'       => esc_html_x( 'Main color shade', 'Customizer option name', 'yith-proteo' ),
				'section'     => 'colors',
				'description' => esc_html_x( 'Save your settings and reload the page to let the magic happen', 'Customizer option description', 'yith-proteo' ),
			)
		)
	);
