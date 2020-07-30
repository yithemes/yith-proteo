<?php
/**
 * YITH-proteo Theme Customizer - Buttons
 *
 * @package yith-proteo
 */

	/**
	 * Buttons management
	 */
	$wp_customize->add_section(
		'yith_proteo_buttons',
		array(
			'title'    => esc_html__( 'Buttons', 'yith-proteo' ),
			'priority' => 30,
			'panel'    => 'yith_proteo_extra',
		)
	);

	// Buttons border radius.
	$wp_customize->add_setting(
		'yith_proteo_buttons_border_radius',
		array(
			'default'           => 50,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_buttons_border_radius',
			array(
				'label'   => esc_html__( 'Border radius (default: 50px)', 'yith-proteo' ),
				'min'     => 0,
				'max'     => 50,
				'step'    => 1,
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	// Button Style 1.
	$wp_customize->add_setting(
		'yith_proteo_button_style_1_bg_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_bg_color',
			array(
				'label'   => esc_html__( 'Button Style 1 background color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_1_border_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_border_color',
			array(
				'label'   => esc_html__( 'Button Style 1 border color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_1_text_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_text_color',
			array(
				'label'   => esc_html__( 'Button Style 1 text color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);
	// Buttons Style 1 hover.
	$wp_customize->add_setting(
		'yith_proteo_button_style_1_bg_color_hover',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_bg_color_hover',
			array(
				'label'   => esc_html__( 'Button Style 1 background :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_1_border_color_hover',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_border_color_hover',
			array(
				'label'   => esc_html__( 'Button Style 1 border :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_1_text_color_hover',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_text_color_hover',
			array(
				'label'   => esc_html__( 'Button Style 1 text :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	// Button Style 2.
	$wp_customize->add_setting(
		'yith_proteo_button_style_2_bg_color_1',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_2_bg_color_1',
			array(
				'label'   => esc_html__( 'Button Style 2 background color shade 1', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_2_bg_color_2',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_2_bg_color_2',
			array(
				'label'   => esc_html__( 'Button Style 2 background color shade 2', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_2_text_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_2_text_color',
			array(
				'label'   => esc_html__( 'Button Style 2 text color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);
	// Buttons Style 2 hover.
	$wp_customize->add_setting(
		'yith_proteo_button_style_2_bg_color_hover',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), - 0.3 ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_2_bg_color_hover',
			array(
				'label'   => esc_html__( 'Button Style 2 background :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_2_text_color_hover',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_2_text_color_hover',
			array(
				'label'   => esc_html__( 'Button Style 2 text :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);
