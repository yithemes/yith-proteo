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
			'title'    => esc_html_x( 'Buttons', 'Customizer section title', 'yith-proteo' ),
			'priority' => 30,
			'panel'    => 'yith_proteo_extra',
		)
	);

	// Buttons general options group title.
	$wp_customize->add_setting(
		'yith_proteo_buttons_general_options_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_buttons_general_options_group_title',
			array(
				'label'   => esc_html_x( 'General options', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
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
				'label'   => esc_html_x( 'Border radius (px)', 'Customizer option name', 'yith-proteo' ),
				'min'     => 0,
				'max'     => 50,
				'default' => 50,
				'step'    => 1,
				'unit'    => 'px',
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	// Buttons style 1 options group title.
	$wp_customize->add_setting(
		'yith_proteo_button_style_1_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_button_style_1_group_title',
			array(
				'label'   => esc_html_x( 'Button style 1', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

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
				'label'   => esc_html_x( 'Background color', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Border color', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Text color', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Background :hover color', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Border :hover color', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Text :hover color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	// Button Style 1 preview.
	$wp_customize->add_setting(
		'yith_proteo_buttons_style_1_preview',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new Customizer_Button_Preview(
			$wp_customize,
			'yith_proteo_buttons_style_1_preview',
			array(
				'label'   => esc_html_x( 'Button style 1', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	// Buttons style 2 options group title.
	$wp_customize->add_setting(
		'yith_proteo_button_style_2_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_button_style_2_group_title',
			array(
				'label'       => esc_html_x( 'Button style 2', 'Customizer options group title', 'yith-proteo' ),
				'description' => esc_html_x( 'In this button you can apply a gradient using two different colors.', 'Customizer option description', 'yith-proteo' ),
				'section'     => 'yith_proteo_buttons',
			)
		)
	);

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
				'label'   => esc_html_x( 'Gradient color - Top', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Gradient color - Bottom', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Text color', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Background :hover color', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Text :hover color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	// Button Style 2 preview.
	$wp_customize->add_setting(
		'yith_proteo_buttons_style_2_preview',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new Customizer_Button_Preview(
			$wp_customize,
			'yith_proteo_buttons_style_2_preview',
			array(
				'label'   => esc_html_x( 'Button style 2', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);
