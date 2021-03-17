<?php
/**
 * YITH-proteo Theme Customizer - Store Notice
 *
 * @package yith-proteo
 */

if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'woocommerce_demo_store',
		array(
			'default'           => get_option( 'woocommerce_demo_store', 'no' ),
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'woocommerce_demo_store',
			array(
				'label'    => esc_html_x( 'Enable store notice', 'Customizer option name', 'yith-proteo' ),
				'priority' => 5,
				'section'  => 'woocommerce_store_notice',
			)
		)
	);
}

// Store notice background color.
$wp_customize->add_setting(
	'yith_proteo_store_notice_bg_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#607d8b',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_store_notice_bg_color',
		array(
			'label'           => esc_html_x( 'Background color', 'Customizer option name', 'yith-proteo' ),
			'section'         => 'woocommerce_store_notice',
			'active_callback' => 'yith_proteo_is_store_notice_enabled',
		)
	)
);
// Store notice text color.
$wp_customize->add_setting(
	'yith_proteo_store_notice_text_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#ffffff',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_store_notice_text_color',
		array(
			'label'           => esc_html_x( 'Text color', 'Customizer option name', 'yith-proteo' ),
			'section'         => 'woocommerce_store_notice',
			'active_callback' => 'yith_proteo_is_store_notice_enabled',
		)
	)
);

// Store notice font size.
$wp_customize->add_setting(
	'yith_proteo_store_notice_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 13,
	)
);
$wp_customize->add_control(
	'yith_proteo_store_notice_font_size',
	array(
		'label'           => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
		'section'         => 'woocommerce_store_notice',
		'type'            => 'number',
		'active_callback' => 'yith_proteo_is_store_notice_enabled',
	)
);
