<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Product Catalog
 *
 * @package yith-proteo
 */

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
		'label'   => esc_html_x( 'Add to cart font size', 'Customizer option name', 'yith-proteo' ),
		'section' => 'woocommerce_product_catalog',
		'type'    => 'number',
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
	)
);
