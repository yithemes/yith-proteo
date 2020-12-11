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
		'title'    => esc_html__( 'Block editor colors', 'yith-proteo' ),
		'priority' => 20,
		'panel'    => 'yith_proteo_extra',
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
			'label'   => esc_html__( 'Custom color #1', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Custom color #2', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Custom color #3', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Custom color #4', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Custom color #5', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Custom color #6', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Custom color #7', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Custom color #8', 'yith-proteo' ),
			'section' => 'yith_proteo_block_editor_colors',
		)
	)
);
