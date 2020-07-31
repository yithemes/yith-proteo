<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Cart
 *
 * @package yith-proteo
 */

	/**
	 * Cart page management
	 */
	$wp_customize->add_section(
		'yith_proteo_cart_page_management',
		array(
			'title'    => esc_html__( 'Cart page', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'woocommerce',
		)
	);

	// Cart Layout options.
	$wp_customize->add_setting(
		'yith_proteo_cart_layout',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_select',
			'default'           => 'one_col',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_cart_layout',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Cart layout', 'yith-proteo' ),
			'section'     => 'yith_proteo_cart_page_management',
			'description' => esc_html__( 'Choose the cart layout', 'yith-proteo' ),
			'choices'     => array(
				''         => esc_html__( 'Please select', 'yith-proteo' ),
				'one_col'  => esc_html__( 'One column layout', 'yith-proteo' ),
				'two_cols' => esc_html__( 'Two column layout', 'yith-proteo' ),
			),
		)
	);

	// Cart page cross sell products management.
	$wp_customize->add_setting(
		'yith_proteo_cross_sell_max_number',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 4,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_cross_sell_max_number',
		array(
			'type'        => 'number',
			'label'       => esc_html__( 'Max cross sell products to show', 'yith-proteo' ),
			'section'     => 'yith_proteo_cart_page_management',
			'description' => esc_html__( 'Choose how many cross sell products you want to show (default: 4)', 'yith-proteo' ),
		)
	);
	// Cart page cross sell products columns management.
	$wp_customize->add_setting(
		'yith_proteo_cross_sell_columns',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 4,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_cross_sell_columns',
		array(
			'type'        => 'number',
			'label'       => esc_html__( 'Cross sell columns', 'yith-proteo' ),
			'section'     => 'yith_proteo_cart_page_management',
			'description' => esc_html__( 'Choose how many columns with cross sell products you want to show (default: 4)', 'yith-proteo' ),
		)
	);

	// Update cart button style.
	$wp_customize->add_setting(
		'yith_proteo_update_cart_button_style',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_select',
			'default'           => 'textual',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_update_cart_button_style',
		array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Update cart button style', 'yith-proteo' ),
			'section' => 'yith_proteo_cart_page_management',
			'choices' => array(
				'textual' => esc_html__( 'Textual', 'yith-proteo' ),
				'button'  => esc_html__( 'Button', 'yith-proteo' ),
			),
		)
	);
