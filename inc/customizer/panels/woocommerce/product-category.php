<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Product Category
 *
 * @package yith-proteo
 */

	/**
	 * Product Category page management
	 */
	$wp_customize->add_section(
		'yith_proteo_product_category_page_management',
		array(
			'title'    => esc_html__( 'Product Category page', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'woocommerce',
		)
	);
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_product_category_page_sidebar_position',
			array(
				'default'           => 'no-sidebar',
				'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_product_category_page_sidebar_position',
				array(
					'label'       => esc_html__( 'Choose the position of the sidebar on product category pages', 'yith-proteo' ),
					'section'     => 'yith_proteo_product_category_page_management',
					'description' => esc_html__( 'Select where to display the sidebar.', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html__( 'No sidebar', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html__( 'Left', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html__( 'Right', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}

	// Product Category Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_product_category_page_sidebar',
		array(
			'default'           => 'shop-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_category_page_sidebar',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Choose the product category page sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_category_page_management',
			'description' => esc_html__( 'Select the sidebar to display.', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);
