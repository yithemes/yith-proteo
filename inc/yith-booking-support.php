<?php
/**
 * Modify single product page layout for YITH Booking products when option is enabled.
 *
 * @package yith-proteo
 */

add_action( 'wp', 'yith_proteo_booking_product_page_template_load' );
add_filter( 'body_class', 'yith_proteo_booking_product_page_body_class' );

add_action( 'after_setup_theme', 'yith_proteo_register_booking_product_image_sizes' );

/**
 * Register additional image sizes for Booking product page
 */
function yith_proteo_register_booking_product_image_sizes() {
	add_image_size( 'yith_proteo_booking_gallery_2560', 2560, 0, false );
	add_image_size( 'yith_proteo_booking_gallery_1920', 1920, 0, false );
	add_image_size( 'yith_proteo_booking_gallery_960', 960, 0, false );
	add_image_size( 'yith_proteo_booking_gallery_640', 640, 0, false );
	add_image_size( 'yith_proteo_booking_gallery_480', 480, 0, false );
}

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param array $classes CSS classes applied to the body tag.
 *
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function yith_proteo_booking_product_page_body_class( $classes ) {
	if ( 'yes' === get_theme_mod( 'yith_proteo_booking_products_specific_layout', 'yes' ) ) {
		$classes[] = 'yith-proteo-booking-product-layout-enabled';
	}

	return $classes;
}


/**
 * Modify single product page layout for YITH Booking products when option is enabled.
 */
function yith_proteo_booking_product_page_template_load() {
	global $product_id;
	if ( 'yes' === get_theme_mod( 'yith_proteo_booking_products_specific_layout', 'yes' ) && class_exists( 'WC_Product_Factory' ) && 'booking' === WC_Product_Factory::get_product_type( $product_id ) ) {

		remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

		/*
		 * Woocommerce Remove excerpt from single product
		 */

		add_filter( 'woocommerce_gallery_image_size', 'yith_proteo_booking_full_image_size', 999 );

		/**
		 * Filter image size
		 *
		 * @returnstring
		 */
		function yith_proteo_booking_full_image_size() {
			return 'yith_proteo_booking_gallery_1920';
		}

		add_action( 'yith_proteo_before_page_content', 'yith_proteo_booking_product_image_gallery_in_header_content' );

		/**
		 * Add booking images to header content
		 *
		 * @returnvoid
		 */
		function yith_proteo_booking_product_image_gallery_in_header_content() {
			if ( is_product() ) {
				global $product;
				$product = wc_get_product();
				woocommerce_show_product_sale_flash();
				echo "<div class='yith-booking-woocommerce-images'>";
				woocommerce_show_product_images();
				$attachment_ids = $product->get_gallery_image_ids();
				if ( $attachment_ids ) {
					echo "<span class='open-gallery'>" . esc_html__( 'Show images', 'yith-proteo' ) . '</span>';
				}
				echo '</div>';
			}
		}
	}
}
