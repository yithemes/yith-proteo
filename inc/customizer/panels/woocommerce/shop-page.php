<?php
/**
 * YITH-proteo Theme Customizer - WooCommerce Shop page options
 *
 * @package yith-proteo
 */

/**
 * Shop page management
 */
$wp_customize->add_section(
	'yith_proteo_shop_page_management',
	array(
		'title'    => esc_html__( 'Shop page', 'yith-proteo' ),
		'priority' => 10,
		'panel'    => 'woocommerce',
	)
);

// Shop page Sidebar Management options.
if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_shop_page_sidebar_position',
		array(
			'default'           => '' !== ( get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'sidebar_position', true ) ) ? get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'sidebar_position', true ) : 'no-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Radio_Image(
			$wp_customize,
			'yith_proteo_shop_page_sidebar_position',
			array(
				'label'   => esc_html__( 'Choose the position of the shop page sidebar', 'yith-proteo' ),
				'section' => 'yith_proteo_shop_page_management',
				'choices' => array(
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

// Shop page default Sidebar Chooser.
$wp_customize->add_setting(
	'yith_proteo_shop_page_default_sidebar',
	array(
		'default'           => '' !== ( get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'sidebar_chooser', true ) ) ? get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'sidebar_chooser', true ) : 'shop-sidebar',
		'sanitize_callback' => 'yith_proteo_sanitize_select',
	)
);
$wp_customize->add_control(
	'yith_proteo_shop_page_default_sidebar',
	array(
		'type'            => 'select',
		'label'           => esc_html__( 'Choose the shop page sidebar', 'yith-proteo' ),
		'section'         => 'yith_proteo_shop_page_management',
		'choices'         => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		'active_callback' => 'yith_proteo_shop_page_sidebar_is_enabled',
	)
);
