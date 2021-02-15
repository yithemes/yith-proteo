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
if ( function_exists( 'wc' ) ) {
	$shop_page_id                       = get_option( 'woocommerce_shop_page_id' );
	$shop_page_sidebar_position_meta    = get_post_meta( $shop_page_id, 'sidebar_position', true );
	$default_shop_page_sidebar_position = in_array( $shop_page_sidebar_position_meta, array( '', 'inherit' ), true ) ? get_theme_mod( 'yith_proteo_shop_page_sidebar_position', 'right' ) : $shop_page_sidebar_position_meta;
	$shop_page_sidebar_chooser_meta     = get_post_meta( $shop_page_id, 'sidebar_chooser', true );
	$default_shop_page_sidebar_chooser  = in_array( $shop_page_sidebar_chooser_meta, array( '', 'inherit' ), true ) ? get_theme_mod( 'yith_proteo_shop_page_default_sidebar', 'sidebar-1' ) : $shop_page_sidebar_chooser_meta;

	// WooCommerce shop page support.
	if ( is_product_category() && ! yith_proteo_is_shop_filterd() && get_theme_mod( 'yith_proteo_product_category_page_sidebar_position', 'no-sidebar' ) === 'no-sidebar' ) {
		return;
	} elseif ( is_product_tag() && ! yith_proteo_is_shop_filterd() && get_theme_mod( 'yith_proteo_product_tag_page_sidebar_position', 'no-sidebar' ) === 'no-sidebar' ) {
		return;
	} elseif ( is_product_taxonomy() && ! is_product_category() && ! yith_proteo_is_shop_filterd() && get_theme_mod( 'yith_proteo_product_tax_page_sidebar_position', 'no-sidebar' ) === 'no-sidebar' ) {
		return;
	} elseif ( is_shop() && get_theme_mod( 'yith_proteo_shop_page_sidebar_position', $default_shop_page_sidebar_position ) === 'no-sidebar' ) {
		return;
	}
}

?>

<aside id="secondary" class="widget-area <?php echo yith_proteo_get_sidebar_position() ? 'col-lg-3' : ''; ?>">
	<?php

	$sidebar = yith_proteo_sidebar_get_meta( 'sidebar_chooser' );
	if ( class_exists( 'WooCommerce' ) ) {
		if ( is_shop() ) {
			$sidebar = get_theme_mod( 'yith_proteo_shop_page_default_sidebar', $default_shop_page_sidebar_chooser );
		} elseif ( is_product_category() ) {
			$sidebar = get_theme_mod( 'yith_proteo_product_category_page_sidebar', 'shop-sidebar' );
		} elseif ( is_product_tag() ) {
			$sidebar = get_theme_mod( 'yith_proteo_product_tag_page_sidebar', 'shop-sidebar' );
		} elseif ( is_product_taxonomy() ) {
			$sidebar = get_theme_mod( 'yith_proteo_product_tax_page_sidebar', 'shop-sidebar' );
		} elseif ( is_product() && 'yes' === get_theme_mod( 'yith_proteo_product_page_sidebar_force', 'no' ) ) {
			$sidebar = get_theme_mod( 'yith_proteo_single_product_default_sidebar', 'shop-sidebar' );
		} elseif ( is_product() && 'inherit' === $sidebar ) {
			$sidebar = get_theme_mod( 'yith_proteo_single_product_default_sidebar', 'shop-sidebar' );
		}
	}
	if ( is_home() ) {
		dynamic_sidebar( get_theme_mod( 'yith_proteo_blog_sidebar', 'sidebar-1' ) );
	} elseif ( ( is_single() || is_page() ) && 'inherit' === $sidebar ) {
		dynamic_sidebar( get_theme_mod( 'yith_proteo_default_sidebar', 'sidebar-1' ) );
	} elseif ( is_category() ) {
		dynamic_sidebar( get_theme_mod( 'yith_proteo_blog_category_sidebar', 'sidebar-1' ) );
	} elseif ( is_tag() ) {
		dynamic_sidebar( get_theme_mod( 'yith_proteo_blog_tag_sidebar', 'sidebar-1' ) );
	} elseif ( ! empty( $sidebar ) ) {
		dynamic_sidebar( $sidebar );
	} else {
		dynamic_sidebar( get_theme_mod( 'yith_proteo_default_sidebar', 'sidebar-1' ) );
	}
	?>
</aside><!-- #secondary -->
