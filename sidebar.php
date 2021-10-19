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
$widgets_per_row = 1;
if ( function_exists( 'wc' ) ) {
	$shop_page_id                       = get_option( 'woocommerce_shop_page_id' );
	$shop_page_sidebar_position_meta    = get_post_meta( $shop_page_id, 'sidebar_position', true );
	$default_shop_page_sidebar_position = in_array( $shop_page_sidebar_position_meta, array( '', 'inherit' ), true ) ? get_theme_mod( 'yith_proteo_shop_page_sidebar_position', 'right' ) : $shop_page_sidebar_position_meta;
	$shop_page_sidebar_chooser_meta     = get_post_meta( $shop_page_id, 'sidebar_chooser', true );
	$default_shop_page_sidebar_chooser  = in_array( $shop_page_sidebar_chooser_meta, array( '', 'inherit' ), true ) ? get_theme_mod( 'yith_proteo_shop_page_default_sidebar', 'sidebar-1' ) : $shop_page_sidebar_chooser_meta;
	$widgets_per_row                    = 'widgets_per_row_' . get_theme_mod( 'yith_proteo_shop_page_sidebar_widgets_per_row', 3 );

	// WooCommerce shop page support.
	if ( is_product_category() && ! yith_proteo_is_shop_filterd() ) {
		$product_category                          = get_queried_object();
		$product_category_id                       = $product_category->term_id;
		$product_category_sidebar_position         = get_term_meta( $product_category_id, 'yith_proteo_product_taxonomy_meta', true );
		$product_category_sidebar_position         = isset( $product_category_sidebar_position['sidebar_position'] ) ? $product_category_sidebar_position['sidebar_position'] : 'inherit';
		$default_product_category_sidebar_position = get_theme_mod( 'yith_proteo_product_category_page_sidebar_position', 'no-sidebar' );
		$widgets_per_row                           = 'widgets_per_row_' . get_theme_mod( 'yith_proteo_product_category_page_sidebar_widgets_per_row', 3 );
		if ( 'no-sidebar' === $product_category_sidebar_position || ( 'inherit' === $product_category_sidebar_position && 'no-sidebar' === $default_product_category_sidebar_position ) ) {
			return;
		}
	} elseif ( is_product_tag() && ! yith_proteo_is_shop_filterd() ) {
		$product_tag                          = get_queried_object();
		$product_tag_id                       = $product_tag->term_id;
		$product_tag_sidebar_position         = get_term_meta( $product_tag_id, 'yith_proteo_product_taxonomy_meta', true );
		$product_tag_sidebar_position         = isset( $product_tag_sidebar_position['sidebar_position'] ) ? $product_tag_sidebar_position['sidebar_position'] : 'inherit';
		$default_product_tag_sidebar_position = get_theme_mod( 'yith_proteo_product_tag_page_sidebar_position', 'no-sidebar' );
		$widgets_per_row                      = 'widgets_per_row_' . get_theme_mod( 'yith_proteo_product_tag_page_sidebar_widgets_per_row', 3 );
		if ( 'no-sidebar' === $product_tag_sidebar_position || ( 'inherit' === $product_tag_sidebar_position && 'no-sidebar' === $default_product_tag_sidebar_position ) ) {
			return;
		}
	} elseif ( is_product_taxonomy() && ! is_product_category() && ! is_product_tag() && ! yith_proteo_is_shop_filterd() && get_theme_mod( 'yith_proteo_product_tax_page_sidebar_position', 'no-sidebar' ) === 'top' ) {
		$widgets_per_row = 'widgets_per_row_' . get_theme_mod( 'yith_proteo_product_tax_page_sidebar_widgets_per_row', 3 );
	} elseif ( is_product_taxonomy() && ! is_product_category() && ! is_product_tag() && ! yith_proteo_is_shop_filterd() && get_theme_mod( 'yith_proteo_product_tax_page_sidebar_position', 'no-sidebar' ) === 'no-sidebar' ) {
		$widgets_per_row = 'widgets_per_row_' . get_theme_mod( 'yith_proteo_product_tax_page_sidebar_widgets_per_row', 3 );
		return;
	} elseif ( is_shop() && get_theme_mod( 'yith_proteo_shop_page_sidebar_position', $default_shop_page_sidebar_position ) === 'no-sidebar' ) {
		return;
	}
}

?>

<aside id="secondary" class="widget-area <?php echo strpos( yith_proteo_get_sidebar_position(), 'sidebar-position-top' ) !== false ? 'sidebar-position-top' : 'col-lg-3'; ?> <?php echo esc_attr( $widgets_per_row ); ?>">
	<div id="secondary_content">
		<?php
		$sidebar = yith_proteo_sidebar_get_meta( 'sidebar_chooser' );
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_shop() ) {
				$sidebar = get_theme_mod( 'yith_proteo_shop_page_default_sidebar', $default_shop_page_sidebar_chooser );
			} elseif ( is_product_category() ) {
				$sidebar                  = get_theme_mod( 'yith_proteo_product_category_page_sidebar', 'shop-sidebar' );
				$category                 = get_queried_object();
				$category_id              = $category->term_id;
				$category_sidebar_chooser = get_term_meta( $category_id, 'yith_proteo_product_taxonomy_meta', true );
				$category_sidebar         = isset( $category_sidebar_chooser['sidebar_chooser'] ) && 'inherit' !== $category_sidebar_chooser['sidebar_chooser'] ? $category_sidebar_chooser['sidebar_chooser'] : $sidebar;

				$sidebar = $category_sidebar;
			} elseif ( is_product_tag() ) {
				$sidebar                     = get_theme_mod( 'yith_proteo_product_tag_page_sidebar', 'shop-sidebar' );
				$product_tag                 = get_queried_object();
				$product_tag_id              = $product_tag->term_id;
				$product_tag_sidebar_chooser = get_term_meta( $product_tag_id, 'yith_proteo_product_taxonomy_meta', true );
				$product_tag_sidebar         = isset( $product_tag_sidebar_chooser['sidebar_chooser'] ) && 'inherit' !== $product_tag_sidebar_chooser['sidebar_chooser'] ? $product_tag_sidebar_chooser['sidebar_chooser'] : $sidebar;

				$sidebar = $product_tag_sidebar;
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
		} elseif ( is_singular( 'post' ) && 'inherit' === $sidebar ) {
			dynamic_sidebar( get_theme_mod( 'yith_proteo_default_posts_sidebar', get_theme_mod( 'yith_proteo_default_sidebar', 'sidebar-1' ) ) );
		} elseif ( is_page() && 'inherit' === $sidebar ) {
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
	</div>
</aside><!-- #secondary -->
