<?php
/**
 * YITH-proteo Theme Customizer - Header
 *
 * @package yith-proteo
 */

	/**
	 * Add Header management.
	 */
	$wp_customize->add_section(
		'yith_proteo_header_management',
		array(
			'title'    => esc_html__( 'Header layout and style', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_header_and_topbar_management',
		)
	);

	// Header sticky.
	$wp_customize->add_setting(
		'yith_proteo_header_sticky',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_header_sticky',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Enable sticky header', 'yith-proteo' ),
			'section'     => 'yith_proteo_header_management',
			'description' => esc_html__( 'Choose whether to make the header stick to the page when scrolling down', 'yith-proteo' ),
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'yith-proteo' ),
				'no'  => esc_html__( 'No', 'yith-proteo' ),
			),
		)
	);

	// Header background color.
	$wp_customize->add_setting(
		'yith_proteo_header_background_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_header_background_color',
			array(
				'label'   => esc_html__( 'Header background color', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header Layout options.
	$wp_customize->add_setting(
		'yith_proteo_header_layout',
		array(
			'default'           => 'left_logo_navigation_inline',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_header_layout',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Header layout', 'yith-proteo' ),
			'section'     => 'yith_proteo_header_management',
			'description' => esc_html__( 'Choose the header layout', 'yith-proteo' ),
			'choices'     => array(
				''                             => esc_html__( 'Please select', 'yith-proteo' ),
				'left_logo_navigation_below'   => esc_html__( 'Logo on the left and navigation below', 'yith-proteo' ),
				'left_logo_navigation_inline'  => esc_html__( 'Logo on the left and navigation inline', 'yith-proteo' ),
				'center_logo_navigation_below' => esc_html__( 'Centered logo and navigation below', 'yith-proteo' ),
			),
		)
	);

	// Header sticky.
	$wp_customize->add_setting(
		'yith_proteo_header_fullwidth',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_header_fullwidth',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Enable full width header', 'yith-proteo' ),
			'section'     => 'yith_proteo_header_management',
			'description' => esc_html__( 'Choose whether to make the header full width or not.', 'yith-proteo' ),
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'yith-proteo' ),
				'no'  => esc_html__( 'No', 'yith-proteo' ),
			),
		)
	);

	// Header menu color.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_color',
		array(
			'default'           => get_theme_mod( 'yith_proteo_base_font_color', '#404040' ),
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_header_main_menu_color',
			array(
				'label'   => esc_html__( 'Header menu color', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header menu color hover.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_hover_color',
		array(
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_header_main_menu_hover_color',
			array(
				'label'   => esc_html__( 'Header menu :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);
