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
			'priority' => 70,
			//'panel'    => 'yith_proteo_options',
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
