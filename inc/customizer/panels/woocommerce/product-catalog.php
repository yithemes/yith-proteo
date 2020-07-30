<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Product Catalog
 *
 * @package yith-proteo
 */

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
