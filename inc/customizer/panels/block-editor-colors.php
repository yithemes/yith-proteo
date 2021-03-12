<?php
/**
 * YITH-proteo Theme Customizer - Block editor colors
 *
 * @package yith-proteo
 */

/**
 * Block editor colors management
 */
$wp_customize->add_section(
	'yith_proteo_block_editor_colors',
	array(
		'title'       => esc_html_x( 'Block editor colors', 'Customizer section title', 'yith-proteo' ),
		'description' => esc_html_x( 'Replace the default color swatches of the Gutenberg block editor with your custom colors. In this way when you create a new page using Gutenberg you will find these colors and you can easily apply them to the page elements.', 'Customizer section title', 'yith-proteo' ),
		'priority'    => 20,
		'panel'       => 'yith_proteo_extra',
	)
);

// Custom color #1.
$wp_customize->add_setting(
	'yith_proteo_block_editor_color_1',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#01af8d',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_block_editor_color_1',
		array(
			'label'   => esc_html_x( 'Custom color #1', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_block_editor_colors',
		)
	)
);

// Custom color #2.
$wp_customize->add_setting(
	'yith_proteo_block_editor_color_2',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#ffffff',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_block_editor_color_2',
		array(
			'label'   => esc_html_x( 'Custom color #2', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_block_editor_colors',
		)
	)
);

// Custom color #3.
$wp_customize->add_setting(
	'yith_proteo_block_editor_color_3',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#107774',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_block_editor_color_3',
		array(
			'label'   => esc_html_x( 'Custom color #3', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_block_editor_colors',
		)
	)
);

// Custom color #4.
$wp_customize->add_setting(
	'yith_proteo_block_editor_color_4',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#404040',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_block_editor_color_4',
		array(
			'label'   => esc_html_x( 'Custom color #4', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_block_editor_colors',
		)
	)
);

// Custom color #5.
$wp_customize->add_setting(
	'yith_proteo_block_editor_color_5',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#dd9933',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_block_editor_color_5',
		array(
			'label'   => esc_html_x( 'Custom color #5', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_block_editor_colors',
		)
	)
);

// Custom color #6.
$wp_customize->add_setting(
	'yith_proteo_block_editor_color_6',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#000000',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_block_editor_color_6',
		array(
			'label'   => esc_html_x( 'Custom color #6', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_block_editor_colors',
		)
	)
);

// Custom color #7.
$wp_customize->add_setting(
	'yith_proteo_block_editor_color_7',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#1e73be',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_block_editor_color_7',
		array(
			'label'   => esc_html_x( 'Custom color #7', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_block_editor_colors',
		)
	)
);

// Custom color #8.
$wp_customize->add_setting(
	'yith_proteo_block_editor_color_8',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#dd3333',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_block_editor_color_8',
		array(
			'label'   => esc_html_x( 'Custom color #8', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_block_editor_colors',
		)
	)
);
