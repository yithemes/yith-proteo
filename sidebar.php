<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yith-proteo
 */

if ( ! yith_proteo_get_sidebar_position( 'sidebar-show' ) ) {
	return;
}

// WooCommerce shop page support.
if ( function_exists( 'wc' ) && is_shop() && get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'sidebar_position', true ) == 'no-sidebar' ) {
	return;
}

// WooCommerce category page support.
if ( function_exists( 'wc' ) && is_product_category() && get_theme_mod( 'yith_proteo_product_category_page_sidebar_position', 'no-sidebar' ) == 'no-sidebar' ) {
	return;
}

// WooCommerce tag page support.
if ( function_exists( 'wc' ) && is_product_tag() && get_theme_mod( 'yith_proteo_product_tag_page_sidebar_position', 'no-sidebar' ) == 'no-sidebar' ) {
	return;
}

?>

<aside id="secondary" class="widget-area <?php echo '' != yith_proteo_get_sidebar_position() ? 'col-lg-3' : ''; ?>">
	<?php

	$sidebar = yith_proteo_sidebar_get_meta( 'sidebar_chooser' );
	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_shop() ) {
			$sidebar = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'sidebar_chooser', true );
		}
		if ( is_product_category() ) {
			$sidebar = get_theme_mod( 'yith_proteo_product_category_page_sidebar', 'shop-sidebar' );
		}
		if ( is_product_tag() ) {
			$sidebar = get_theme_mod( 'yith_proteo_product_tag_page_sidebar', 'shop-sidebar' );
		}
	}

	if ( is_home() ) {
		$sidebar = get_theme_mod( 'yith_proteo_blog_sidebar', 'sidebar-1' );
	}
	if ( ! empty( $sidebar ) ) {
		dynamic_sidebar( $sidebar );
	} else {
		dynamic_sidebar( 'sidebar-1' );
	}
	?>
</aside><!-- #secondary -->
