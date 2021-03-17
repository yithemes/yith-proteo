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
			'title'    => esc_html_x( 'Cart page', 'Customizer section title', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'woocommerce',
		)
	);

	// Cart Layout options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_cart_layout',
			array(
				'default'           => 'one_col',
				'sanitize_callback' => 'yith_proteo_sanitize_select',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_cart_layout',
				array(
					'label'   => esc_html_x( 'Cart layout', 'Customizer option name', 'yith-proteo' ),
					'section' => 'yith_proteo_cart_page_management',
					'choices' => array(
						'one_col'  => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/cart-full-width.svg',
							'label' => esc_html_x( 'Full width', 'Customizer option value', 'yith-proteo' ),
						),
						'two_cols' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/cart-two-columns.svg',
							'label' => esc_html_x( 'Two columns', 'Customizer option value', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}

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
			'label'   => esc_html_x( 'Update cart button style', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_cart_page_management',
			'choices' => array(
				'textual' => esc_html_x( 'Textual', 'Customizer option value', 'yith-proteo' ),
				'button'  => esc_html_x( 'Button', 'Customizer option value', 'yith-proteo' ),
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
			'label'       => esc_html_x( 'Max cross sell products to show', 'Customizer option name', 'yith-proteo' ),
			'section'     => 'yith_proteo_cart_page_management',
			'description' => esc_html_x( 'Choose how many cross sell products you want to show', 'Customizer option description', 'yith-proteo' ),
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
			'label'       => esc_html_x( 'Columns', 'Customizer option name', 'yith-proteo' ),
			'section'     => 'yith_proteo_cart_page_management',
			'description' => esc_html_x( 'Choose how many columns with cross sell products you want to show', 'Customizer option description', 'yith-proteo' ),
		)
	);
