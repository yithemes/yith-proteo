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
		'title'    => esc_html_x( 'Shop page', 'Customizer section title', 'yith-proteo' ),
		'priority' => 10,
		'panel'    => 'woocommerce',
	)
);

// Shop page Sidebar Management options.
if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
	$shop_page_sidebar_position_meta    = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'sidebar_position', true );
	$default_shop_page_sidebar_position = in_array( $shop_page_sidebar_position_meta, array( '', 'inherit' ), true ) ? $shop_page_sidebar_position_meta : get_theme_mod( 'yith_proteo_default_sidebar_position', 'right' );
	$wp_customize->add_setting(
		'yith_proteo_shop_page_sidebar_position',
		array(
			'default'           => $default_shop_page_sidebar_position,
			'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Radio_Image(
			$wp_customize,
			'yith_proteo_shop_page_sidebar_position',
			array(
				'label'   => esc_html_x( 'Sidebar position for the shop page', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_shop_page_management',
				'choices' => array(
					'no-sidebar' => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
						'label' => esc_html_x( 'No sidebar', 'Customizer option value', 'yith-proteo' ),
					),
					'left'       => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
						'label' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
					),
					'right'      => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
						'label' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
					),
				),
			)
		)
	);
}

// Shop page default Sidebar Chooser.
$shop_page_sidebar_chooser_meta    = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'sidebar_chooser', true );
$default_shop_page_sidebar_chooser = in_array( $shop_page_sidebar_chooser_meta, array( '', 'inherit' ), true ) ? $shop_page_sidebar_chooser_meta : get_theme_mod( 'yith_proteo_default_sidebar', 'sidebar-1' );

$wp_customize->add_setting(
	'yith_proteo_shop_page_default_sidebar',
	array(
		'default'           => $default_shop_page_sidebar_chooser,
		'sanitize_callback' => 'yith_proteo_sanitize_select',
	)
);
$wp_customize->add_control(
	'yith_proteo_shop_page_default_sidebar',
	array(
		'type'            => 'select',
		'label'           => esc_html_x( 'Shop page sidebar', 'Customizer option name', 'yith-proteo' ),
		'section'         => 'yith_proteo_shop_page_management',
		'choices'         => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		'active_callback' => 'yith_proteo_shop_page_sidebar_is_enabled',
	)
);
