<?php
/**
 * YITH-proteo Theme Customizer - Google Font
 *
 * @package yith-proteo
 */

	/**
	 * Add Google Font management
	 */
	$wp_customize->add_section(
		'yith_proteo_google_font_management',
		array(
			'title'    => esc_html__( 'Google Font', 'yith-proteo' ),
			'priority' => 35,
		)
	);

	// Footer credit options.
	$wp_customize->add_setting(
		'yith_proteo_google_font',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_google_font',
		array(
			'label'   => esc_html__( 'Enter the URL of the Google Font you want to use.', 'yith-proteo' ),
			'section' => 'yith_proteo_google_font_management',
			'type'    => 'textarea',
		)
	);
