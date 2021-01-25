<?php
/**
 * YITH-proteo Theme Customizer - Layout
 *
 * @package yith-proteo
 */

/**
 * Layout management
 */
$wp_customize->add_section(
	'yith_proteo_layout_management',
	array(
		'title'    => esc_html__( 'Layout', 'yith-proteo' ),
		'priority' => 100,
		'panel'    => 'yith_proteo_extra',
	)
);

// Fullwidth enable.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_layout_full_width',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_layout_full_width',
			array(
				'label'       => esc_html__( 'Make website layout full width', 'yith-proteo' ),
				'section'     => 'yith_proteo_layout_management',
				'description' => esc_html__( 'Choose whether to make your site layout full width. No matter which resolution your screen has.', 'yith-proteo' ),
			)
		)
	);
}


// Test of spacing control.
$wp_customize->add_setting(
	'test_spacing_option',
	array(
		'default'           => '',
		'sanitize_callback' => 'yith_proteo_sanitize_int_array',
	)
);
$wp_customize->add_control(
	new Customizer_Control_Spacing(
		$wp_customize,
		'test_spacing_option',
		array(
			'label'   => __( 'Spacing (px)', 'yith-proteo' ),
			'section' => 'yith_proteo_layout_management',
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
