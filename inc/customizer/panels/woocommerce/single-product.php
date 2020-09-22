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

	// Product image management.
	$wp_customize->add_setting(
		'yith_proteo_product_page_image_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_product_page_image_group_title',
			array(
				'label'   => esc_html__( 'Product image', 'yith-proteo' ),
				'section' => 'yith_proteo_product_page_management',
			)
		)
	);

	// Enable image zoom.
	$wp_customize->add_setting(
		'yith_proteo_product_page_image_zoom',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_image_zoom',
		array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Enable featured image zoom', 'yith-proteo' ),
			'section' => 'yith_proteo_product_page_management',
			'choices' => array(
				'yes' => esc_html__( 'Yes', 'yith-proteo' ),
				'no'  => esc_html__( 'No', 'yith-proteo' ),
			),
		)
	);

	// Enable image lightbox.
	$wp_customize->add_setting(
		'yith_proteo_product_page_image_lightbox',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_image_lightbox',
		array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Enable featured image lightbox', 'yith-proteo' ),
			'section' => 'yith_proteo_product_page_management',
			'choices' => array(
				'yes' => esc_html__( 'Yes', 'yith-proteo' ),
				'no'  => esc_html__( 'No', 'yith-proteo' ),
			),
		)
	);

	// Enable gallery slider.
	$wp_customize->add_setting(
		'yith_proteo_product_page_gallery_slider',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_gallery_slider',
		array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Enable additional images slider', 'yith-proteo' ),
			'section' => 'yith_proteo_product_page_management',
			'choices' => array(
				'yes' => esc_html__( 'Yes', 'yith-proteo' ),
				'no'  => esc_html__( 'No', 'yith-proteo' ),
			),
		)
	);

	// Price and add to cart management.
	$wp_customize->add_setting(
		'yith_proteo_product_page_price_and_add_to_cart_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_product_page_price_and_add_to_cart_group_title',
			array(
				'label'   => esc_html__( 'Product price and Add to cart', 'yith-proteo' ),
				'section' => 'yith_proteo_product_page_management',
			)
		)
	);

	// Price font size options.
	$wp_customize->add_setting(
		'yith_proteo_product_page_price_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 35,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_price_font_size',
		array(
			'label'   => esc_html__( 'Product price font size (default: 35px)', 'yith-proteo' ),
			'section' => 'yith_proteo_product_page_management',
			'type'    => 'number',
		)
	);
	// Price font color options.
	$wp_customize->add_setting(
		'yith_proteo_product_page_price_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_product_page_price_color',
			array(
				'label'   => esc_html__( 'Product price font color', 'yith-proteo' ),
				'section' => 'yith_proteo_product_page_management',
			)
		)
	);

	// Quantity font size options.
	$wp_customize->add_setting(
		'yith_proteo_product_page_quantity_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 40,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_quantity_font_size',
		array(
			'label'   => esc_html__( 'Product quantity font size (default: 40px)', 'yith-proteo' ),
			'section' => 'yith_proteo_product_page_management',
			'type'    => 'number',
		)
	);

	// Add to cart button font size options.
	$wp_customize->add_setting(
		'yith_proteo_product_page_add_to_cart_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 20,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_add_to_cart_font_size',
		array(
			'label'   => esc_html__( 'Add to cart button font size (default: 20px)', 'yith-proteo' ),
			'section' => 'yith_proteo_product_page_management',
			'type'    => 'number',
		)
	);

	// Related products management.
	$wp_customize->add_setting(
		'yith_proteo_product_related_products_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_product_related_products_group_title',
			array(
				'label'   => esc_html__( 'Related products', 'yith-proteo' ),
				'section' => 'yith_proteo_product_page_management',
			)
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

	// Sidebar management.
	$wp_customize->add_setting(
		'yith_proteo_product_sidebar_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_product_sidebar_group_title',
			array(
				'label'   => esc_html__( 'Sidebar management', 'yith-proteo' ),
				'section' => 'yith_proteo_product_page_management',
			)
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

	// Tabs management.
	$wp_customize->add_setting(
		'yith_proteo_product_tabs_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_product_tabs_group_title',
			array(
				'label'   => esc_html__( 'Tabs management', 'yith-proteo' ),
				'section' => 'yith_proteo_product_page_management',
			)
		)
	);

	// Tabs title font size options.
	$wp_customize->add_setting(
		'yith_proteo_product_tabs_title_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 30,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_tabs_title_font_size',
		array(
			'label'   => esc_html__( 'Tab title font size (default: 30px)', 'yith-proteo' ),
			'section' => 'yith_proteo_product_page_management',
			'type'    => 'number',
		)
	);

	// Tabs title font color options.
	$wp_customize->add_setting(
		'yith_proteo_product_tabs_title_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#1f1f1f',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_product_tabs_title_font_color',
			array(
				'label'   => esc_html__( 'Tab title font color', 'yith-proteo' ),
				'section' => 'yith_proteo_product_page_management',
			)
		)
	);

	// Tabs content font size options.
	$wp_customize->add_setting(
		'yith_proteo_product_tabs_content_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 16,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_tabs_content_font_size',
		array(
			'label'   => esc_html__( 'Tab content font size (default: 16px)', 'yith-proteo' ),
			'section' => 'yith_proteo_product_page_management',
			'type'    => 'number',
		)
	);
