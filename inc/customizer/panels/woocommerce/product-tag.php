<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Product Tag
 *
 * @package yith-proteo
 */

	/**
	 * Product Tag page management
	 */
	$wp_customize->add_section(
		'yith_proteo_product_tag_page_management',
		array(
			'title'    => esc_html__( 'Product Tag page', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'woocommerce',
		)
	);
	$wp_customize->add_setting(
		'yith_proteo_product_tag_page_sidebar_position',
		array(
			'default'           => 'no-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_tag_page_sidebar_position',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Choose the position of the sidebar on product tag pages', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_tag_page_management',
			'description' => esc_html__( 'Select where to display the sidebar.', 'yith-proteo' ),
			'choices'     => array(
				'no-sidebar' => esc_html__( 'No sidebar', 'yith-proteo' ),
				'right'      => esc_html__( 'Right', 'yith-proteo' ),
				'left'       => esc_html__( 'Left', 'yith-proteo' ),
			),
		)
	);

	// Product Tag Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_product_tag_page_sidebar',
		array(
			'default'           => 'shop-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_tag_page_sidebar',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Choose the product tag page sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_tag_page_management',
			'description' => esc_html__( 'Select the sidebar to display.', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);
