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
		'title'    => esc_html_x( 'Typography', 'Customizer section title', 'yith-proteo' ),
		'priority' => 30,
	)
);

// General typography options.
$wp_customize->add_setting(
	'yith_proteo_global_typography_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_global_typography_group_title',
		array(
			'label'   => esc_html_x( 'Global typography', 'Customizer options group title', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
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
			'label'       => esc_html_x( 'Body font', 'Customizer option name', 'yith-proteo' ),
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
		'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Text color', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Links color', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Links :hover color', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Show underlined links', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);
}

// H1 typography options.
$wp_customize->add_setting(
	'yith_proteo_h1_typography_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_h1_typography_group_title',
		array(
			'label'   => esc_html_x( 'H1', 'Customizer options group title', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);

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
			'label'       => esc_html_x( 'Font', 'Customizer option name', 'yith-proteo' ),
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
		'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);

// H2 typography options.
$wp_customize->add_setting(
	'yith_proteo_h2_typography_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_h2_typography_group_title',
		array(
			'label'   => esc_html_x( 'H2', 'Customizer options group title', 'yith-proteo' ),
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
			'label'       => esc_html_x( 'Font', 'Customizer option name', 'yith-proteo' ),
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
		'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);

// H3 typography options.
$wp_customize->add_setting(
	'yith_proteo_h3_typography_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_h3_typography_group_title',
		array(
			'label'   => esc_html_x( 'H3', 'Customizer options group title', 'yith-proteo' ),
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
			'label'       => esc_html_x( 'Font', 'Customizer option name', 'yith-proteo' ),
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
		'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);

// H4 typography options.
$wp_customize->add_setting(
	'yith_proteo_h4_typography_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_h4_typography_group_title',
		array(
			'label'   => esc_html_x( 'H4', 'Customizer options group title', 'yith-proteo' ),
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
			'label'       => esc_html_x( 'Font', 'Customizer option name', 'yith-proteo' ),
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
		'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);

// H5 typography options.
$wp_customize->add_setting(
	'yith_proteo_h5_typography_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_h5_typography_group_title',
		array(
			'label'   => esc_html_x( 'H5', 'Customizer options group title', 'yith-proteo' ),
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
			'label'       => esc_html_x( 'Font', 'Customizer option name', 'yith-proteo' ),
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
		'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);

// H6 typography options.
$wp_customize->add_setting(
	'yith_proteo_h6_typography_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_h6_typography_group_title',
		array(
			'label'   => esc_html_x( 'H6', 'Customizer options group title', 'yith-proteo' ),
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
			'label'       => esc_html_x( 'Font', 'Customizer option name', 'yith-proteo' ),
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
		'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);

// Widgets title typography options.
$wp_customize->add_setting(
	'yith_proteo_widgets_title_typography_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_widgets_title_typography_group_title',
		array(
			'label'   => esc_html_x( 'Widgets title', 'Customizer options group title', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);

// Widget title font.
$wp_customize->add_setting(
	'yith_proteo_widget_title_font',
	array(
		'sanitize_callback' => 'yith_proteo_google_font_sanitization',
		'default'           => get_theme_mod( 'yith_proteo_h3_font', '{"font":"Montserrat","regularweight":"700","category":"sans-serif"}' ),
	)
);
$wp_customize->add_control(
	new Google_Font_Select_Custom_Control(
		$wp_customize,
		'yith_proteo_widget_title_font',
		array(
			'label'       => esc_html_x( 'Font', 'Customizer option name', 'yith-proteo' ),
			'section'     => 'yith_proteo_typography',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby'    => 'alpha',
			),
		)
	)
);
// Widget title font size options.
$wp_customize->add_setting(
	'yith_proteo_widget_title_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 1.5 * get_theme_mod( 'yith_proteo_base_font_size', 16 ),
	)
);
$wp_customize->add_control(
	'yith_proteo_widget_title_font_size',
	array(
		'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_typography',
		'type'    => 'number',
	)
);
// Widget title font color options.
$wp_customize->add_setting(
	'yith_proteo_widget_title_font_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#404040',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_widget_title_font_color',
		array(
			'label'   => esc_html_x( 'Font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);

// Widgets content typography options.
$wp_customize->add_setting(
	'yith_proteo_widgets_content_typography_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_widgets_content_typography_group_title',
		array(
			'label'   => esc_html_x( 'Widgets content', 'Customizer options group title', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);

// Widget content font.
$wp_customize->add_setting(
	'yith_proteo_widget_content_font',
	array(
		'sanitize_callback' => 'yith_proteo_google_font_sanitization',
		'default'           => get_theme_mod( 'yith_proteo_body_font', '{"font":"Montserrat","regularweight":"regular","category":"sans-serif"}' ),
	)
);
$wp_customize->add_control(
	new Google_Font_Select_Custom_Control(
		$wp_customize,
		'yith_proteo_widget_content_font',
		array(
			'label'       => esc_html_x( 'Font', 'Customizer option name', 'yith-proteo' ),
			'section'     => 'yith_proteo_typography',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby'    => 'alpha',
			),
		)
	)
);
// Widget content font size options.
$wp_customize->add_setting(
	'yith_proteo_widget_content_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 1.125 * get_theme_mod( 'yith_proteo_base_font_size', 16 ),
	)
);
$wp_customize->add_control(
	'yith_proteo_widget_content_font_size',
	array(
		'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_typography',
		'type'    => 'number',
	)
);
// Widget content font color options.
$wp_customize->add_setting(
	'yith_proteo_widget_content_font_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#404040',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_widget_content_font_color',
		array(
			'label'   => esc_html_x( 'Font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
	)
);
// Additionals typography options.
$wp_customize->add_setting(
	'yith_proteo_additional_typography_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_additional_typography_group_title',
		array(
			'label'   => esc_html_x( 'Additional typography options', 'Customizer options group title', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
		)
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
		'label'       => esc_html_x( 'Additional Google Font', 'Customizer option name', 'yith-proteo' ),
		'description' => esc_html_x( 'Enter the URL of a Google Font you want to use within the theme.', 'Customizer option description', 'yith-proteo' ) . ' ' . sprintf( '<a href="%s" target="_blank" rel="noopener nofollow">%s</a>', esc_url( 'https://docs.yithemes.com/yith-proteo/theme-options/typography/' ), esc_html_x( 'Read how to retrieve a Google Font url', 'Customizer option description', 'yith-proteo' ) ),
		'section'     => 'yith_proteo_typography',
		'type'        => 'textarea',
	)
);
