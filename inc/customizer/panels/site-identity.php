<?php
/**
 * YITH-proteo Theme Customizer - Site Identity
 *
 * @package yith-proteo
 */

// Custom logo max width.
$wp_customize->add_setting(
	'yith_proteo_custom_logo_max_width',
	array(
		'default'           => 375,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
		'priority'          => 5,
	)
);

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_custom_logo_max_width',
		array(
			'label'   => esc_html__( 'Logo image max width (px)', 'yith-proteo' ),
			'min'     => 40,
			'max'     => 500,
			'step'    => 1,
			'section' => 'title_tagline',
		)
	)
);

$wp_customize->add_setting(
	'blogname',
	array(
		'default'           => get_option( 'blogname' ),
		'type'              => 'option',
		'capability'        => 'manage_options',
		'priority'          => 10,
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	)
);

$wp_customize->add_control(
	'blogname',
	array(
		'label'   => esc_html__( 'Site Title', 'yith-proteo' ),
		'section' => 'title_tagline',
	)
);

$wp_customize->add_setting(
	'site_title_font',
	array(
		'sanitize_callback' => 'yith_proteo_google_font_sanitization',
		'default'           => '{"font":"Jost","regularweight":"600","category":"sans-serif"}',
	)
);
$wp_customize->add_control(
	new Google_Font_Select_Custom_Control(
		$wp_customize,
		'site_title_font',
		array(
			'label'       => __( 'Site title font', 'yith-proteo' ),
			'section'     => 'title_tagline',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby'    => 'alpha',
			),
		)
	)
);


// Site title font size.
$wp_customize->add_setting(
	'yith_proteo_site_title_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 48,
		'priority'          => 10,
	)
);

$wp_customize->add_control(
	'yith_proteo_site_title_font_size',
	array(
		'label'   => esc_html__( 'Site Title font size', 'yith-proteo' ),
		'section' => 'title_tagline',
		'type'    => 'number',
	)
);
// Site title color.
$wp_customize->add_setting(
	'yith_proteo_site_title_color',
	array(
		'default'           => '#404040',
		'priority'          => 10,
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
	)
);

$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_site_title_color',
		array(
			'label'   => esc_html__( 'Site Title color', 'yith-proteo' ),
			'section' => 'title_tagline',
		)
	)
);

$wp_customize->add_setting(
	'blogdescription',
	array(
		'default'           => get_option( 'blogdescription' ),
		'type'              => 'option',
		'capability'        => 'manage_options',
		'priority'          => 100,
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	)
);

$wp_customize->add_control(
	'blogdescription',
	array(
		'label'   => esc_html__( 'Tagline', 'yith-proteo' ),
		'section' => 'title_tagline',
	)
);

$wp_customize->add_setting(
	'tagline_font',
	array(
		'sanitize_callback' => 'yith_proteo_google_font_sanitization',
		'default'           => '{"font":"Jost","regularweight":"regular","category":"sans-serif"}',
	)
);
$wp_customize->add_control(
	new Google_Font_Select_Custom_Control(
		$wp_customize,
		'tagline_font',
		array(
			'label'       => __( 'Tagline font', 'yith-proteo' ),
			'section'     => 'title_tagline',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby'    => 'alpha',
			),
		)
	)
);


// Tagline font size.
$wp_customize->add_setting(
	'yith_proteo_tagline_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 14,
		'priority'          => 10,
	)
);

$wp_customize->add_control(
	'yith_proteo_tagline_font_size',
	array(
		'label'   => esc_html__( 'Tagline font size', 'yith-proteo' ),
		'section' => 'title_tagline',
		'type'    => 'number',
	)
);
// Tagline color.
$wp_customize->add_setting(
	'yith_proteo_tagline_color',
	array(
		'default'           => '#404040',
		'priority'          => 10,
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
	)
);

$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_tagline_color',
		array(
			'label'   => esc_html__( 'Tagline color', 'yith-proteo' ),
			'section' => 'title_tagline',
		)
	)
);
