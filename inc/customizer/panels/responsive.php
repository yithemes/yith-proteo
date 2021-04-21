<?php
/**
 * YITH-proteo Theme Customizer - Responsive
 *
 * @package yith-proteo
 */

/**
 * Responsive options management
 */

$wp_customize->add_section(
	'yith_proteo_responsive_management',
	array(
		'title'    => esc_html_x( 'Responsive breakpoints', 'Customizer section title', 'yith-proteo' ),
		'priority' => 100,
		'panel'    => 'yith_proteo_mobile_options',
	)
);

// Custom responsive enable.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_use_custom_responsive',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_use_custom_responsive',
			array(
				'label'       => esc_html_x( 'Use custom responsive breakpoints', 'Customizer option name', 'yith-proteo' ),
				'section'     => 'yith_proteo_responsive_management',
				'description' => esc_html_x( 'Choose whether to use custom responsive breakpoints or not. This option will generate a custom responsive.css file in your uploads folder.', 'Customizer option description', 'yith-proteo' ),
			)
		)
	);
}

// Mobile width.
$wp_customize->add_setting(
	'yith_proteo_mobile_device_width',
	array(
		'default'           => 600,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_mobile_device_width',
		array(
			'label'           => esc_html_x( 'Mobile', 'Customizer option name', 'yith-proteo' ),
			'min'             => 350,
			'max'             => 2560,
			'step'            => 1,
			'default'         => 600,
			'unit'            => 'px',
			'section'         => 'yith_proteo_responsive_management',
			'active_callback' => 'yith_proteo_is_custom_responsive_enabled',
		)
	)
);

// Tablet width.
$wp_customize->add_setting(
	'yith_proteo_tablet_device_width',
	array(
		'default'           => 768,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_tablet_device_width',
		array(
			'label'           => esc_html_x( 'Tablet', 'Customizer option name', 'yith-proteo' ),
			'min'             => 350,
			'max'             => 2560,
			'step'            => 1,
			'default'         => 768,
			'unit'            => 'px',
			'section'         => 'yith_proteo_responsive_management',
			'active_callback' => 'yith_proteo_is_custom_responsive_enabled',
		)
	)
);

// Small desktop width.
$wp_customize->add_setting(
	'yith_proteo_small_desktop_device_width',
	array(
		'default'           => 992,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_small_desktop_device_width',
		array(
			'label'           => esc_html_x( 'Small desktop', 'Customizer option name', 'yith-proteo' ),
			'min'             => 350,
			'max'             => 2560,
			'step'            => 1,
			'default'         => 992,
			'unit'            => 'px',
			'section'         => 'yith_proteo_responsive_management',
			'active_callback' => 'yith_proteo_is_custom_responsive_enabled',
		)
	)
);

// Desktop width.
$wp_customize->add_setting(
	'yith_proteo_desktop_device_width',
	array(
		'default'           => 1200,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_desktop_device_width',
		array(
			'label'           => esc_html_x( 'Desktop', 'Customizer option name', 'yith-proteo' ),
			'min'             => 350,
			'max'             => 2560,
			'step'            => 1,
			'default'         => 1200,
			'unit'            => 'px',
			'section'         => 'yith_proteo_responsive_management',
			'active_callback' => 'yith_proteo_is_custom_responsive_enabled',
		)
	)
);

// Large desktop width.
$wp_customize->add_setting(
	'yith_proteo_large_desktop_device_width',
	array(
		'default'           => 1400,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_large_desktop_device_width',
		array(
			'label'           => esc_html_x( 'Wide desktop', 'Customizer option name', 'yith-proteo' ),
			'min'             => 350,
			'max'             => 2560,
			'step'            => 1,
			'default'         => 1400,
			'unit'            => 'px',
			'section'         => 'yith_proteo_responsive_management',
			'active_callback' => 'yith_proteo_is_custom_responsive_enabled',
		)
	)
);
