<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Product Catalog
 *
 * @package yith-proteo
 */

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
		'label'   => esc_html__( 'Product title font size (default: 14px)', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Product title font color', 'yith-proteo' ),
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
		'label'   => esc_html__( 'Product price font size (default: 14px)', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Product price font color', 'yith-proteo' ),
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
	)
);
$wp_customize->add_control(
	'yith_proteo_products_loop_add_to_cart_style',
	array(
		'type'        => 'radio',
		'label'       => esc_html__( 'Add to cart style', 'yith-proteo' ),
		'section'     => 'woocommerce_product_catalog',
		'description' => esc_html__( 'How should the add to cart button be displayed in product catalog pages?', 'yith-proteo' ),
		'choices'     => array(
			'unstyled_button' => esc_html__( 'Textual link', 'yith-proteo' ),
			'button_style_1'  => esc_html__( 'Button style 1', 'yith-proteo' ),
			'button_style_2'  => esc_html__( 'Button style 2', 'yith-proteo' ),
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
		'label'   => esc_html__( 'Add to cart font size (default: 14px)', 'yith-proteo' ),
		'section' => 'woocommerce_product_catalog',
		'type'    => 'number',
	)
);
