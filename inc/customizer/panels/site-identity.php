<?php
/**
 * YITH-proteo Theme Customizer - Site Identity
 *
 * @package yith-proteo
 */

// Site logo managment.
$wp_customize->add_setting(
	'yith_proteo_site_logo_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_site_logo_group_title',
		array(
			'label'    => esc_html__( 'Site logo', 'yith-proteo' ),
			'section'  => 'title_tagline',
			'priority' => 5,
		)
	)
);

// Display Site logo.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_display_site_logo',
		array(
			'default'           => get_theme_mod( 'yith_proteo_display_header_text', 'yes' ),
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_display_site_logo',
			array(
				'label'       => esc_html__( 'Display logo', 'yith-proteo' ),
				'section'     => 'title_tagline',
				'description' => esc_html__( 'Choose whether to show the site logo.', 'yith-proteo' ),
				'priority'    => 5,
			)
		)
	);
}

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
			'label'   => esc_html__( 'Logo max width (px)', 'yith-proteo' ),
			'min'     => 40,
			'max'     => 500,
			'step'    => 1,
			'section' => 'title_tagline',
		)
	)
);

// Site title managment.
$wp_customize->add_setting(
	'yith_proteo_site_title_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_site_title_group_title',
		array(
			'label'   => esc_html__( 'Site title', 'yith-proteo' ),
			'section' => 'title_tagline',
		)
	)
);

// Display Site title.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_display_site_title',
		array(
			'default'           => yith_proteo_show_site_title_default_value(),
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_display_site_title',
			array(
				'label'       => esc_html__( 'Display site title', 'yith-proteo' ),
				'section'     => 'title_tagline',
				'description' => esc_html__( 'Choose whether to show the site title.', 'yith-proteo' ),
			)
		)
	);
}

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
			'label'       => __( 'Font', 'yith-proteo' ),
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
		'label'   => esc_html__( 'Font size', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Color', 'yith-proteo' ),
			'section' => 'title_tagline',
		)
	)
);

// Site title spacing control.
$wp_customize->add_setting(
	'yith_proteo_site_title_spacing',
	array(
		'default'           => array(
			'top'    => 0,
			'right'  => 30,
			'bottom' => 0,
			'left'   => 0,
		),
		'sanitize_callback' => 'yith_proteo_sanitize_int_array',
	)
);
$wp_customize->add_control(
	new Customizer_Control_Spacing(
		$wp_customize,
		'yith_proteo_site_title_spacing',
		array(
			'label'   => __( 'Spacing (px)', 'yith-proteo' ),
			'section' => 'title_tagline',
			'choices' => array(
				'top'    => array(
					'name' => esc_html__( 'Top', 'yith-proteo' ),
				),
				'right'  => array(
					'name' => esc_html__( 'Right', 'yith-proteo' ),
				),
				'bottom' => array(
					'name' => esc_html__( 'Bottom', 'yith-proteo' ),
				),
				'left'   => array(
					'name' => esc_html__( 'Left', 'yith-proteo' ),
				),
			),
		)
	)
);

// Tagline managment.
$wp_customize->add_setting(
	'yith_proteo_tagline_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_tagline_group_title',
		array(
			'label'   => esc_html__( 'Tagline', 'yith-proteo' ),
			'section' => 'title_tagline',
		)
	)
);

// Display Tagline.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_display_tagline',
		array(
			'default'           => get_theme_mod( 'yith_proteo_display_header_text', 'yes' ),
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_display_tagline',
			array(
				'label'       => esc_html__( 'Display Tagline', 'yith-proteo' ),
				'section'     => 'title_tagline',
				'description' => esc_html__( 'Choose whether to show the tagline.', 'yith-proteo' ),
			)
		)
	);
}

$wp_customize->add_setting(
	'blogdescription',
	array(
		'default'           => get_option( 'blogdescription' ),
		'type'              => 'option',
		'capability'        => 'manage_options',
		'priority'          => 100,
		'sanitize_callback' => 'sanitize_text_field',
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
			'label'       => __( 'Font', 'yith-proteo' ),
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
		'label'   => esc_html__( 'Font size', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Color', 'yith-proteo' ),
			'section' => 'title_tagline',
		)
	)
);

// Tagline spacing control.
$wp_customize->add_setting(
	'yith_proteo_tagline_spacing',
	array(
		'default'           => array(
			'top'    => 10,
			'right'  => 30,
			'bottom' => 0,
			'left'   => 0,
		),
		'sanitize_callback' => 'yith_proteo_sanitize_int_array',
	)
);
$wp_customize->add_control(
	new Customizer_Control_Spacing(
		$wp_customize,
		'yith_proteo_tagline_spacing',
		array(
			'label'   => __( 'Spacing (px)', 'yith-proteo' ),
			'section' => 'title_tagline',
			'choices' => array(
				'top'    => array(
					'name' => esc_html__( 'Top', 'yith-proteo' ),
				),
				'right'  => array(
					'name' => esc_html__( 'Right', 'yith-proteo' ),
				),
				'bottom' => array(
					'name' => esc_html__( 'Bottom', 'yith-proteo' ),
				),
				'left'   => array(
					'name' => esc_html__( 'Left', 'yith-proteo' ),
				),
			),
		)
	)
);

// Tagline position.
$wp_customize->add_setting(
	'yith_proteo_tagline_position',
	array(
		'default'           => 'below',
		'sanitize_callback' => 'yith_proteo_sanitize_select',
	)
);
$wp_customize->add_control(
	'yith_proteo_tagline_position',
	array(
		'type'    => 'select',
		'label'   => esc_html__( 'Position', 'yith-proteo' ),
		'section' => 'title_tagline',
		'choices' => array(
			'below' => esc_html__( 'Below the title', 'yith-proteo' ),
			'right' => esc_html__( 'Inline with the title', 'yith-proteo' ),
		),
	)
);

// Site Icon managment.
$wp_customize->add_setting(
	'yith_proteo_favicon_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_favicon_group_title',
		array(
			'label'   => esc_html__( 'Favicon', 'yith-proteo' ),
			'section' => 'title_tagline',
		)
	)
);
