<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Single Product page
 *
 * @package yith-proteo
 */

	/**
	 * Single product page management
	 */
	$wp_customize->add_section(
		'yith_proteo_product_page_management',
		array(
			'title'    => esc_html__( 'Single product page', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'woocommerce',
		)
	);
	// Single product page related products management.
	$wp_customize->add_setting(
		'yith_proteo_product_page_related_max_number',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 4,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_related_max_number',
		array(
			'type'        => 'number',
			'label'       => esc_html__( 'Max related products to show', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_page_management',
			'description' => esc_html__( 'Choose how many related products you want to show (default: 4)', 'yith-proteo' ),
		)
	);
	// Single product page related products management.
	$wp_customize->add_setting(
		'yith_proteo_product_page_related_columns',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 4,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_related_columns',
		array(
			'type'        => 'number',
			'label'       => esc_html__( 'Related products columns', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_page_management',
			'description' => esc_html__( 'Choose how many columns with related products you want to show (default: 4)', 'yith-proteo' ),
		)
	);
	// Single Product Sidebar Management options.
	$wp_customize->add_setting(
		'yith_proteo_product_page_sidebar_position',
		array(
			'default'           => 'no-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_sidebar_position',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Choose the position of the sidebar on single product page', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_page_management',
			'description' => esc_html__( 'Select where to display the sidebar. You can adjust the settings from product edit view.', 'yith-proteo' ),
			'choices'     => array(
				'no-sidebar' => esc_html__( 'No sidebar', 'yith-proteo' ),
				'right'      => esc_html__( 'Right', 'yith-proteo' ),
				'left'       => esc_html__( 'Left', 'yith-proteo' ),
			),
		)
	);

	// Single Product default Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_single_product_default_sidebar',
		array(
			'default'           => 'shop-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_single_product_default_sidebar',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Choose the sidebar to use on single product page', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_page_management',
			'description' => esc_html__( 'You can adjust the settings from product edit view.', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);
	// Force all products to use the same sidebar.
	$wp_customize->add_setting(
		'yith_proteo_product_page_sidebar_force',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_sidebar_force',
		array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Force all product to use the same sidebar.', 'yith-proteo' ),
			'section' => 'yith_proteo_product_page_management',
			'choices' => array(
				'yes' => esc_html__( 'Yes', 'yith-proteo' ),
				'no'  => esc_html__( 'No', 'yith-proteo' ),
			),
		)
	);
