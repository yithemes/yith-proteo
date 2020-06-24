<?php
/**
 * One Click Demo Import predefined demo configurations file
 *
 * @package yith-proteo
 */

/**
 * Predefined demo content here
 */
function yith_proteo_ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => 'Classic Shop',
			'categories'                 => array( 'Ecommerce' ),
			'import_file_url'            => 'https://proteo.yithemes.com/demo-content/classic-shop/proteo-wordpress-export.xml',
			'import_widget_file_url'     => 'https://proteo.yithemes.com/demo-content/classic-shop/proteo.yithemes.com-classic-shop-widgets.wie',
			'import_customizer_file_url' => 'https://proteo.yithemes.com/demo-content/classic-shop/yith-proteo-export.dat',
			'import_preview_image_url'   => 'https://proteo.yithemes.com/demo-content/classic-shop/screenshot.png',
			'import_notice'              => __( 'After you import this demo, check WooCommerce settings to get the best from your store.', 'yith-proteo' ),
			'preview_url'                => 'https://proteo.yithemes.com/classic-shop/',
		),
		array(
			'import_file_name'           => 'Classic Shop',
			'categories'                 => array( 'Ecommerce' ),
			'import_file_url'            => 'https://proteo.yithemes.com/demo-content/classic-shop/proteo-wordpress-export.xml',
			'import_widget_file_url'     => 'https://proteo.yithemes.com/demo-content/classic-shop/proteo.yithemes.com-classic-shop-widgets.wie',
			'import_customizer_file_url' => 'https://proteo.yithemes.com/demo-content/classic-shop/yith-proteo-export.dat',
			'import_preview_image_url'   => 'https://proteo.yithemes.com/demo-content/classic-shop/screenshot.png',
			'import_notice'              => __( 'After you import this demo, check WooCommerce settings to get the best from your store.', 'yith-proteo' ),
			'preview_url'                => 'https://proteo.yithemes.com/classic-shop/',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'yith_proteo_ocdi_import_files' );

/**
 * Set home page, blog page and menu
 */
function yith_proteo_ocdi_after_import_setup() {
	if ( 'Classic Shop' === $selected_import['import_file_name'] ) {
		// Assign menus to their locations.
		$main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary' => $main_menu->term_id,
				'mobile'  => $main_menu->term_id,
			)
		);

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Front Page' );
		$blog_page_id  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );

		// Assign WooCommerce pages.
		$shop_page_id     = get_page_by_title( 'Shop' );
		$cart_page_id     = get_page_by_title( 'Cart' );
		$checkout_page_id = get_page_by_title( 'Checkout' );
		$account_page_id  = get_page_by_title( 'My Account' );

		update_option( 'woocommerce_shop_page_id', $shop_page_id->ID );
		update_option( 'woocommerce_cart_page_id', $shop_page_id->ID );
		update_option( 'woocommerce_checkout_page_id', $shop_page_id->ID );
		update_option( 'woocommerce_myaccount_page_id', $shop_page_id->ID );
	}
}
add_action( 'pt-ocdi/after_import', 'yith_proteo_ocdi_after_import_setup' );
