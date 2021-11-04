<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Product Catalog
 *
 * @package yith-proteo
 */

// General options group title.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_general_options_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_product_catalog_general_options_group_title',
		array(
			'label'    => esc_html_x( 'General options', 'Customizer options group title', 'yith-proteo' ),
			'section'  => 'woocommerce_product_catalog',
			'priority' => 5,
		)
	)
);

// Product spacing.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_spacing',
	array(
		'default'           => array(
			'horizontal' => 15,
			'vertical'   => 35,
		),
		'sanitize_callback' => 'yith_proteo_sanitize_int_array',
	)
);
$wp_customize->add_control(
	new Customizer_Control_Spacing(
		$wp_customize,
		'yith_proteo_product_catalog_spacing',
		array(
			'label'    => esc_html_x( 'Space between products (px)', 'Customizer option name', 'yith-proteo' ),
			'section'  => 'woocommerce_product_catalog',
			'choices'  => array(
				'horizontal' => array(
					'name' => esc_html_x( 'Horizontal', 'Customizer option value', 'yith-proteo' ),
				),
				'vertical'   => array(
					'name' => esc_html_x( 'Vertical', 'Customizer option value', 'yith-proteo' ),
				),
			),
			'priority' => 10,
		)
	)
);

// Style options group title.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_style_options_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_product_catalog_style_options_group_title',
		array(
			'label'    => esc_html_x( 'Display options', 'Customizer options group title', 'yith-proteo' ),
			'section'  => 'woocommerce_product_catalog',
			'priority' => 10,
		)
	)
);

// Product border enabler.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_product_catalog_with_border',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_product_catalog_with_border',
			array(
				'label'   => esc_html_x( 'Enable border', 'Customizer option name', 'yith-proteo' ),
				'section' => 'woocommerce_product_catalog',
			)
		)
	);
}

// Product border width.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_border_width',
	array(
		'default'           => array(
			'top'    => 1,
			'right'  => 1,
			'bottom' => 1,
			'left'   => 1,
		),
		'sanitize_callback' => 'yith_proteo_sanitize_int_array',
	)
);
$wp_customize->add_control(
	new Customizer_Control_Spacing(
		$wp_customize,
		'yith_proteo_product_catalog_border_width',
		array(
			'label'   => esc_html_x( 'Border width (px)', 'Customizer option name', 'yith-proteo' ),
			'section' => 'woocommerce_product_catalog',
			'choices' => array(
				'top'    => array(
					'name' => esc_html_x( 'Top', 'Customizer option value', 'yith-proteo' ),
				),
				'right'  => array(
					'name' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
				),
				'bottom' => array(
					'name' => esc_html_x( 'Bottom', 'Customizer option value', 'yith-proteo' ),
				),
				'left'   => array(
					'name' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
				),
			),
		)
	)
);

// Product border width.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_border_radius',
	array(
		'default'           => array(
			'top-left'     => 0,
			'top-right'    => 0,
			'bottom-right' => 0,
			'bottom-left'  => 0,
		),
		'sanitize_callback' => 'yith_proteo_sanitize_int_array',
	)
);
$wp_customize->add_control(
	new Customizer_Control_Spacing(
		$wp_customize,
		'yith_proteo_product_catalog_border_radius',
		array(
			'label'   => esc_html_x( 'Border radius (px)', 'Customizer option name', 'yith-proteo' ),
			'section' => 'woocommerce_product_catalog',
			'choices' => array(
				'top-left'     => array(
					'name' => esc_html_x( 'Top Left', 'Customizer option value', 'yith-proteo' ),
				),
				'top-right'    => array(
					'name' => esc_html_x( 'Top Right', 'Customizer option value', 'yith-proteo' ),
				),
				'bottom-right' => array(
					'name' => esc_html_x( 'Bottom Right', 'Customizer option value', 'yith-proteo' ),
				),
				'bottom-left'  => array(
					'name' => esc_html_x( 'Bottom Left', 'Customizer option value', 'yith-proteo' ),
				),
			),
		)
	)
);

// Product border color.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_border_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#ebebeb',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_product_catalog_border_color',
		array(
			'label'   => esc_html_x( 'Border color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'woocommerce_product_catalog',
		)
	)
);

// Header Layout options.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_hover_effect',
	array(
		'default'           => 'glow-alt-image',
		'sanitize_callback' => 'yith_proteo_sanitize_select',
	)
);
$wp_customize->add_control(
	'yith_proteo_product_catalog_hover_effect',
	array(
		'type'    => 'select',
		'label'   => esc_html_x( 'Product hover effect', 'Customizer option name', 'yith-proteo' ),
		'section' => 'woocommerce_product_catalog',
		'choices' => array(
			'none'           => esc_html_x( 'None', 'Customizer option value', 'yith-proteo' ),
			'glow'           => esc_html_x( 'Glow', 'Customizer option value', 'yith-proteo' ),
			'zoom'           => esc_html_x( 'Zoom', 'Customizer option value', 'yith-proteo' ),
			'alt-image'      => esc_html_x( 'Alternative image', 'Customizer option value', 'yith-proteo' ),
			'glow-alt-image' => esc_html_x( 'Glow + alternative image', 'Customizer option value', 'yith-proteo' ),
		),
	)
);

// Product title font size options.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_title_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 14,
	)
);
$wp_customize->add_control(
	'yith_proteo_product_catalog_title_font_size',
	array(
		'label'   => esc_html_x( 'Product title Font size', 'Customizer option name', 'yith-proteo' ),
		'section' => 'woocommerce_product_catalog',
		'type'    => 'number',
	)
);
// Product title font color options.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_title_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#404040',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_product_catalog_title_color',
		array(
			'label'   => esc_html_x( 'Product title font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'woocommerce_product_catalog',
		)
	)
);

// Product price font size options.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_price_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 14,
	)
);
$wp_customize->add_control(
	'yith_proteo_product_catalog_price_font_size',
	array(
		'label'   => esc_html_x( 'Product price font size', 'Customizer option name', 'yith-proteo' ),
		'section' => 'woocommerce_product_catalog',
		'type'    => 'number',
	)
);
// Product price font color options.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_price_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#1f1f1f',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_product_catalog_price_color',
		array(
			'label'   => esc_html_x( 'Product price font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'woocommerce_product_catalog',
		)
	)
);

// Add to cart options group title.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_add_to_cart_options_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_product_catalog_add_to_cart_options_group_title',
		array(
			'label'    => esc_html_x( 'Add to cart options', 'Customizer options group title', 'yith-proteo' ),
			'section'  => 'woocommerce_product_catalog',
			'priority' => 20,
		)
	)
);

// Add to cart loop style.
$wp_customize->add_setting(
	'yith_proteo_products_loop_add_to_cart_style',
	array(
		'default'           => 'unstyled_button',
		'sanitize_callback' => 'yith_proteo_sanitize_radio',
		'transport'         => 'refresh',
	)
);
$wp_customize->add_control(
	'yith_proteo_products_loop_add_to_cart_style',
	array(
		'type'        => 'radio',
		'label'       => esc_html_x( 'Add to cart style', 'Customizer option name', 'yith-proteo' ),
		'section'     => 'woocommerce_product_catalog',
		'description' => esc_html_x( 'Choose the style for the Add to cart button in product catalog pages', 'Customizer option description', 'yith-proteo' ),
		'choices'     => array(
			'unstyled_button' => esc_html_x( 'Textual link', 'Customizer option value', 'yith-proteo' ),
			'button_style_1'  => esc_html_x( 'Button style 1', 'Customizer option value', 'yith-proteo' ),
			'button_style_2'  => esc_html_x( 'Button style 2', 'Customizer option value', 'yith-proteo' ),
		),
		'priority'    => 20,
	)
);

// Add to cart font size options.
$wp_customize->add_setting(
	'yith_proteo_product_catalog_add_to_cart_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 14,
	)
);
$wp_customize->add_control(
	'yith_proteo_product_catalog_add_to_cart_font_size',
	array(
		'label'    => esc_html_x( 'Add to cart font size', 'Customizer option name', 'yith-proteo' ),
		'section'  => 'woocommerce_product_catalog',
		'type'     => 'number',
		'priority' => 20,
	)
);

// Add to cart position.
$wp_customize->add_setting(
	'yith_proteo_products_loop_add_to_cart_position',
	array(
		'default'           => 'classic',
		'sanitize_callback' => 'yith_proteo_sanitize_radio',
		'transport'         => 'refresh',
	)
);
$wp_customize->add_control(
	'yith_proteo_products_loop_add_to_cart_position',
	array(
		'type'        => 'radio',
		'label'       => esc_html_x( 'Add to cart position', 'Customizer option name', 'yith-proteo' ),
		'section'     => 'woocommerce_product_catalog',
		'description' => esc_html_x( 'Choose where the add to cart button is displayed in product catalog pages.', 'Customizer option description', 'yith-proteo' ),
		'choices'     => array(
			'classic' => esc_html_x( 'Classic', 'Customizer option value', 'yith-proteo' ),
			'hover'   => esc_html_x( 'On image hover', 'Customizer option value', 'yith-proteo' ),
		),
		'priority'    => 20,
	)
);

// View details enable.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_product_loop_view_details_enable',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_product_loop_view_details_enable',
			array(
				'label'       => esc_html_x( 'Show "View details" link', 'Customizer option name', 'yith-proteo' ),
				'section'     => 'woocommerce_product_catalog',
				'description' => esc_html_x( 'Choose whether to show a "view details" link in product catalog pages.', 'Customizer option value', 'yith-proteo' ),
				'priority'    => 20,
			)
		)
	);
}

// "View details" loop style.
$wp_customize->add_setting(
	'yith_proteo_products_loop_view_details_style',
	array(
		'default'           => 'ghost',
		'sanitize_callback' => 'yith_proteo_sanitize_radio',
		'transport'         => 'refresh',
	)
);
$wp_customize->add_control(
	'yith_proteo_products_loop_view_details_style',
	array(
		'type'        => 'radio',
		'label'       => esc_html_x( '"View details" style', 'Customizer option name', 'yith-proteo' ),
		'section'     => 'woocommerce_product_catalog',
		'description' => esc_html_x( 'Choose the style for the "View details" button in product catalog pages', 'Customizer option description', 'yith-proteo' ),
		'choices'     => array(
			'unstyled_button' => esc_html_x( 'Textual link', 'Customizer option value', 'yith-proteo' ),
			'ghost'           => esc_html_x( 'Ghost button', 'Customizer option value', 'yith-proteo' ),
		),
		'priority'    => 20,
	)
);
