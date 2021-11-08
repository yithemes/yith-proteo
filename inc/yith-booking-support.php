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

			$images_layout = get_theme_mod( 'yith_proteo_booking_products_image_grid_layout', 1 );
			$image_size    = 'yith_proteo_booking_gallery_1920';

			switch ( $images_layout ) {
				case 1:
					$image_size = 'yith_proteo_booking_gallery_2560';
					break;
				case 2:
					$image_size = 'yith_proteo_booking_gallery_960';
					break;
				case 3:
					$image_size = 'yith_proteo_booking_gallery_960';
					break;
				case 4:
					$image_size = 'yith_proteo_booking_gallery_960';
					break;
				case 5:
					$image_size = 'yith_proteo_booking_gallery_960';
					break;
				case 6:
					$image_size = 'yith_proteo_booking_gallery_640';
					break;
			}
			return $image_size;
		}

		add_action( 'yith_proteo_before_page_content', 'yith_proteo_booking_product_image_gallery_in_header_content' );

		/**
		 * Add booking images to header content
		 *
		 * @returnvoid
		 */
		function yith_proteo_booking_product_image_gallery_in_header_content() {
			if ( is_product() && has_post_thumbnail() ) {
				global $product;
				$product       = wc_get_product();
				$images_layout = get_theme_mod( 'yith_proteo_booking_products_image_grid_layout', 1 );
				$images_layout = 'grid-elements-count-' . $images_layout;
				woocommerce_show_product_sale_flash();
				echo "<div class='yith-booking-woocommerce-images " . esc_attr( $images_layout ) . "'>";
				woocommerce_show_product_images();
				$attachment_ids = $product->get_gallery_image_ids();
				if ( $attachment_ids ) {
					echo "<span class='open-gallery'><svg width='20px' height='20px' viewBox='0 0 20 20'><path d='M20 14L20 2C20 0.9 19.1 0 18 0L6 0C4.9 0 4 0.9 4 2L4 14C4 15.1 4.9 16 6 16L18 16C19.1 16 20 15.1 20 14ZM0 18L0 4L2 4L2 18L16 18L16 20L2 20C0.9 20 0 19.1 0 18ZM9 10L11.03 12.71L14 9L18 14L6 14L9 10Z' id='Shape' fill='inherit' fill-rule='evenodd' stroke='none' /></svg>" . esc_html__( 'Show images', 'yith-proteo' ) . '</span>';
				}
				echo '</div>';
			}
		}

		// Fix product image display for Bookable products.
		remove_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		remove_theme_support( 'wc-product-gallery-slider' );
	}
}
