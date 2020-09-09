<?php
/**
 * YITH-proteo Theme Customizer - breadcrumbs
 *
 * @package yith-proteo
 */

	/**
	 * Cart page management
	 */
	$wp_customize->add_section(
		'yith_proteo_breadcrumb_management',
		array(
			'title'    => esc_html__( 'Breadcrumbs', 'yith-proteo' ),
			'priority' => 50,
			'panel'    => 'yith_proteo_extra',
		)
	);

	// Cart Layout options.
	$wp_customize->add_setting(
		'yith_proteo_breadcrumb_enable',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			'default'           => 'yes',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_breadcrumb_enable',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Show breadcrumbs', 'yith-proteo' ),
			'section'     => 'yith_proteo_breadcrumb_management',
			'description' => esc_html__( 'Choose whether to show breadcrumbs on pages, posts and products.', 'yith-proteo' ),
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'yith-proteo' ),
				'no'  => esc_html__( 'No', 'yith-proteo' ),
			),
		)
	);
