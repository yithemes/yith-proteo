<?php
/**
 * YITH-proteo Theme Customizer - YITH Booking
 *
 * @package yith-proteo
 */

/**
 * YITH Booking options management
 */
$wp_customize->add_section(
	'yith_proteo_booking_product_page_management',
	array(
		'title'    => esc_html_x( 'Bookable products', 'Customizer section title', 'yith-proteo' ),
		'priority' => 15,
		'panel'    => 'woocommerce',
	)
);

if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_booking_products_specific_layout',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_booking_products_specific_layout',
			array(
				'label'    => esc_html_x( 'Enable bookable products layout', 'Customizer option name', 'yith-proteo' ),
				'priority' => 5,
				'section'  => 'yith_proteo_booking_product_page_management',
			)
		)
	);
}

// Product category widgets columns.
$wp_customize->add_setting(
	'yith_proteo_booking_products_image_grid_layout',
	array(
		'default'           => 1,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);
$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_booking_products_image_grid_layout',
		array(
			'label'   => esc_html_x( 'Images to show as grid', 'Customizer option name', 'yith-proteo' ),
			'min'     => 1,
			'max'     => 6,
			'step'    => 1,
			'default' => 1,
			'section' => 'yith_proteo_booking_product_page_management',
		)
	)
);
