<?php
/**
 * YITH-proteo Theme Customizer - breadcrumbs
 *
 * @package yith-proteo
 */

	/**
	 * Breadcrumbs management
	 */
	$wp_customize->add_section(
		'yith_proteo_breadcrumb_management',
		array(
			'title'    => esc_html_x( 'Breadcrumbs', 'Customizer section title', 'yith-proteo' ),
			'priority' => 50,
			'panel'    => 'yith_proteo_extra',
		)
	);

	// Breadcrump enable.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_breadcrumb_enable',
			array(
				'default'           => 'yes',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_breadcrumb_enable',
				array(
					'label'       => esc_html_x( 'Show breadcrumbs', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_breadcrumb_management',
					'description' => esc_html_x( 'Choose whether to show breadcrumbs on pages, posts and products.', 'Customizer option description', 'yith-proteo' ),
				)
			)
		);
	}
