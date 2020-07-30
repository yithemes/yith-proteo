<?php
/**
 * YITH-proteo Theme Customizer - Typography
 *
 * @package yith-proteo
 */

	/**
	 * Add Google Font management
	 */
	$wp_customize->add_section(
		'yith_proteo_typography',
		array(
			'title'    => esc_html__( 'Typography', 'yith-proteo' ),
			'priority' => 30,
		)
	);
	// Base font size options.
	$wp_customize->add_setting(
		'yith_proteo_base_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 16,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_base_font_size',
		array(
			'label'   => esc_html__( 'Body font size (default: 16px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// Base font color options.
	$wp_customize->add_setting(
		'yith_proteo_base_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_base_font_color',
			array(
				'label'   => esc_html__( 'Body font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H1 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h1_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 70,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h1_font_size',
		array(
			'label'   => esc_html__( 'H1 font size (default: 32px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H1 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h1_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_h1_font_color',
			array(
				'label'   => esc_html__( 'H1 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H2 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h2_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 40,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h2_font_size',
		array(
			'label'   => esc_html__( 'H2 font size (default: 24px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H2 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h2_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_h2_font_color',
			array(
				'label'   => esc_html__( 'H2 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H3 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h3_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 19,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h3_font_size',
		array(
			'label'   => esc_html__( 'H3 font size (default: 19px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H3 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h3_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_h3_font_color',
			array(
				'label'   => esc_html__( 'H3 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H4 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h4_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 16,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h4_font_size',
		array(
			'label'   => esc_html__( 'H4 font size (default: 16px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H4 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h4_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_h4_font_color',
			array(
				'label'   => esc_html__( 'H4 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H5 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h5_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 13,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h5_font_size',
		array(
			'label'   => esc_html__( 'H5 font size (default: 13px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H5 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h5_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_h5_font_color',
			array(
				'label'   => esc_html__( 'H5 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H6 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h6_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 11,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h6_font_size',
		array(
			'label'   => esc_html__( 'H6 font size (default: 11px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H6 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h6_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_h6_font_color',
			array(
				'label'   => esc_html__( 'H6 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);
