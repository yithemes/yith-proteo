<?php
/**
 * YITH-proteo Theme Customizer - Typography
 *
 * @package yith-proteo
 */

	/**
	 * Add Typography management
	 */
	$wp_customize->add_section(
		'yith_proteo_typography',
		array(
			'title'    => esc_html__( 'Typography', 'yith-proteo' ),
			'priority' => 30,
		)
	);

	// Google Font.
	$wp_customize->add_setting(
		'yith_proteo_google_font',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => '',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_google_font',
		array(
			'label'       => esc_html__( 'Additional Google Font', 'yith-proteo' ),
			'description' => esc_html__( 'Enter the URL of a Google Font you want to use within the theme.', 'yith-proteo' ),
			'section'     => 'yith_proteo_typography',
			'type'        => 'textarea',
		)
	);

	// Body font.
	$wp_customize->add_setting(
		'yith_proteo_body_font',
		array(
			'sanitize_callback' => 'yith_proteo_google_font_sanitization',
			'default'           => '{"font":"Montserrat","regularweight":"regular","category":"sans-serif"}',
		)
	);
	$wp_customize->add_control(
		new Google_Font_Select_Custom_Control(
			$wp_customize,
			'yith_proteo_body_font',
			array(
				'label'       => __( 'Body font', 'yith-proteo' ),
				'section'     => 'yith_proteo_typography',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby'    => 'alpha',
				),
			)
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

	// General link color.
	$wp_customize->add_setting(
		'yith_proteo_general_link_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_general_link_color',
			array(
				'label'   => esc_html__( 'General link color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
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
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// General link decoration.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_general_link_decoration',
			array(
				'default'           => 'yes',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_general_link_decoration',
				array(
					'label'   => esc_html__( 'Show underlined links', 'yith-proteo' ),
					'section' => 'yith_proteo_typography',
				)
			)
		);
	}

	// H1 font.
	$wp_customize->add_setting(
		'yith_proteo_h1_font',
		array(
			'sanitize_callback' => 'yith_proteo_google_font_sanitization',
			'default'           => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
		)
	);
	$wp_customize->add_control(
		new Google_Font_Select_Custom_Control(
			$wp_customize,
			'yith_proteo_h1_font',
			array(
				'label'       => __( 'H1 font', 'yith-proteo' ),
				'section'     => 'yith_proteo_typography',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby'    => 'alpha',
				),
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

	// H2 font.
	$wp_customize->add_setting(
		'yith_proteo_h2_font',
		array(
			'sanitize_callback' => 'yith_proteo_google_font_sanitization',
			'default'           => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
		)
	);
	$wp_customize->add_control(
		new Google_Font_Select_Custom_Control(
			$wp_customize,
			'yith_proteo_h2_font',
			array(
				'label'       => __( 'H2 font', 'yith-proteo' ),
				'section'     => 'yith_proteo_typography',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby'    => 'alpha',
				),
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

	// H3 font.
	$wp_customize->add_setting(
		'yith_proteo_h3_font',
		array(
			'sanitize_callback' => 'yith_proteo_google_font_sanitization',
			'default'           => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
		)
	);
	$wp_customize->add_control(
		new Google_Font_Select_Custom_Control(
			$wp_customize,
			'yith_proteo_h3_font',
			array(
				'label'       => __( 'H3 font', 'yith-proteo' ),
				'section'     => 'yith_proteo_typography',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby'    => 'alpha',
				),
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

	// H4 font.
	$wp_customize->add_setting(
		'yith_proteo_h4_font',
		array(
			'sanitize_callback' => 'yith_proteo_google_font_sanitization',
			'default'           => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
		)
	);
	$wp_customize->add_control(
		new Google_Font_Select_Custom_Control(
			$wp_customize,
			'yith_proteo_h4_font',
			array(
				'label'       => __( 'H4 font', 'yith-proteo' ),
				'section'     => 'yith_proteo_typography',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby'    => 'alpha',
				),
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

	// H5 font.
	$wp_customize->add_setting(
		'yith_proteo_h5_font',
		array(
			'sanitize_callback' => 'yith_proteo_google_font_sanitization',
			'default'           => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
		)
	);
	$wp_customize->add_control(
		new Google_Font_Select_Custom_Control(
			$wp_customize,
			'yith_proteo_h5_font',
			array(
				'label'       => __( 'H5 font', 'yith-proteo' ),
				'section'     => 'yith_proteo_typography',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby'    => 'alpha',
				),
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

	// H6 font.
	$wp_customize->add_setting(
		'yith_proteo_h6_font',
		array(
			'sanitize_callback' => 'yith_proteo_google_font_sanitization',
			'default'           => '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}',
		)
	);
	$wp_customize->add_control(
		new Google_Font_Select_Custom_Control(
			$wp_customize,
			'yith_proteo_h6_font',
			array(
				'label'       => __( 'H6 font', 'yith-proteo' ),
				'section'     => 'yith_proteo_typography',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby'    => 'alpha',
				),
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
