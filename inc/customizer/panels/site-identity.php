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
	'blogname_font',
	array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'Montserrat',
	)
);
$wp_customize->add_control(
	new WP_Font_Selector(
		$wp_customize,
		'blogname_font',
		array(
			'label'    => esc_html__( 'Site Title font family', 'yith-proteo' ),
			'section'  => 'title_tagline',
			'priority' => 10,
			'type'     => 'select',
		)
	)
);

$wp_customize->add_setting(
	'blogname_font_weight',
	array(
		'default'           => 400,
		'sanitize_callback' => 'yith_proteo_sanitize_select',
	)
);
$wp_customize->add_control(
	'blogname_font_weight',
	array(
		'label'   => esc_html__( 'Site Title font weight', 'yith-proteo' ),
		'section' => 'title_tagline',
		'type'    => 'select',
		'choices' => array(
			300 => esc_html__( 'Light - 300', 'yith-proteo' ),
			400 => esc_html__( 'Regular - 400', 'yith-proteo' ),
			500 => esc_html__( 'Light Bold - 500', 'yith-proteo' ),
			700 => esc_html__( 'Bold - 700', 'yith-proteo' ),
		),
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
	'blogdescription_font',
	array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'Montserrat',
	)
);
$wp_customize->add_control(
	new WP_Font_Selector(
		$wp_customize,
		'blogdescription_font',
		array(
			'label'   => esc_html__( 'Tagline font family', 'yith-proteo' ),
			'section' => 'title_tagline',
			'type'    => 'select',
		)
	)
);

$wp_customize->add_setting(
	'blogdescription_font_weight',
	array(
		'default'           => 400,
		'sanitize_callback' => 'yith_proteo_sanitize_select',
	)
);
$wp_customize->add_control(
	'blogdescription_font_weight',
	array(
		'label'   => esc_html__( 'Tagline font weight', 'yith-proteo' ),
		'section' => 'title_tagline',
		'type'    => 'select',
		'choices' => array(
			300 => esc_html__( 'Light - 300', 'yith-proteo' ),
			400 => esc_html__( 'Regular - 400', 'yith-proteo' ),
			500 => esc_html__( 'Light Bold - 500', 'yith-proteo' ),
			700 => esc_html__( 'Bold - 700', 'yith-proteo' ),
		),
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
