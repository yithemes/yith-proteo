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
		'title'    => esc_html_x( 'Forms', 'Customizer section title', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Input and textarea border radius', 'Customizer option name', 'yith-proteo' ),
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
				'label'       => esc_html_x( 'Use custom style on select elements', 'Customizer option name', 'yith-proteo' ),
				'description' => esc_html_x( 'Replace the default browser style of select elements with the custom Proteo style.', 'Customizer option description', 'yith-proteo' ),
				'section'     => 'yith_proteo_forms',
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
				'label'       => esc_html_x( 'Use custom style on checkbox and radio button elements', 'Customizer option name', 'yith-proteo' ),
				'description' => esc_html_x( 'Replace the default browser style of radio and checkbox elements with the custom Proteo style.', 'Customizer option description', 'yith-proteo' ),
				'section'     => 'yith_proteo_forms',
			)
		)
	);
}
