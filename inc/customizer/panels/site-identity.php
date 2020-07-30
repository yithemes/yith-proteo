<?php
/**
 * YITH-proteo Theme Customizer - Site Identity
 *
 * @package yith-proteo
 */

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
