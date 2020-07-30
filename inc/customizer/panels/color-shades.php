<?php
/**
 * YITH-proteo Theme Customizer - Color Shades
 *
 * @package yith-proteo
 */

	/**
	 * Color shades management
	 */
	$wp_customize->add_section(
		'yith_proteo_color_shades',
		array(
			'title'    => esc_html__( 'Color shades', 'yith-proteo' ),
			'priority' => 80,
			//'panel'    => 'yith_proteo_options',
		)
	);

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
				'label'       => esc_html__( 'Main color shade', 'yith-proteo' ),
				'section'     => 'yith_proteo_color_shades',
				'description' => esc_html__( 'Save your settings and reload the page to let the magic happen', 'yith-proteo' ),
			)
		)
	);

	// General link hover color.
	$wp_customize->add_setting(
		'yith_proteo_general_link_hover_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), - 0.3 ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_general_link_hover_color',
			array(
				'label'   => esc_html__( 'General link :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_color_shades',
			)
		)
	);
