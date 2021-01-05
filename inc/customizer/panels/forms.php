<?php
/**
 * YITH-proteo Theme Customizer - Forms
 *
 * @package yith-proteo
 */

/**
 * Forms management
 */
$wp_customize->add_section(
	'yith_proteo_forms',
	array(
		'title'    => esc_html__( 'Forms', 'yith-proteo' ),
		'priority' => 40,
		'panel'    => 'yith_proteo_extra',
	)
);

// Buttons border radius.
$wp_customize->add_setting(
	'yith_proteo_inputs_border_radius',
	array(
		'default'           => 0,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_inputs_border_radius',
		array(
			'label'   => esc_html__( 'Input and textarea border radius (default: 0px)', 'yith-proteo' ),
			'min'     => 0,
			'max'     => 50,
			'step'    => 1,
			'section' => 'yith_proteo_forms',
		)
	)
);

// Select2 enabler.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_use_enanched_selects',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_use_enanched_selects',
			array(
				'label'   => esc_html__( 'Use enhanced select elements', 'yith-proteo' ),
				'section' => 'yith_proteo_forms',
			)
		)
	);
}

// styled checkbox and radio button enabler.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_use_enhanced_checkbox_and_radio',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_use_enhanced_checkbox_and_radio',
			array(
				'label'   => esc_html__( 'Use enhanced checkbox and radio button elements', 'yith-proteo' ),
				'section' => 'yith_proteo_forms',
			)
		)
	);
}
