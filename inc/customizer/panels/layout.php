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
