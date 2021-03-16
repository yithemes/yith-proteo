<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package yith-proteo
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function yith_proteo_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'gallery_thumbnail_image_width' => 150,
			'product_grid'                  => array(
				'default_rows'    => 3,
				'min_rows'        => 2,
				'max_rows'        => 8,
				'default_columns' => 4,
				'min_columns'     => 2,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'yith_proteo_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function yith_proteo_woocommerce_scripts() {

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'yith-proteo-style', $inline_font );
}

add_action( 'wp_enqueue_scripts', 'yith_proteo_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param array $classes CSS classes applied to the body tag.
 *
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function yith_proteo_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}

add_filter( 'body_class', 'yith_proteo_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 *
 * @return array $args related products args.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_woocommerce_related_products_args( $args ) {
	$args['posts_per_page'] = get_theme_mod( 'yith_proteo_product_page_related_max_number', 4 );
	$args['columns']        = get_theme_mod( 'yith_proteo_product_page_related_columns', 4 );
	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'yith_proteo_woocommerce_related_products_args' );

if ( ! function_exists( 'yith_proteo_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function yith_proteo_woocommerce_product_columns_wrapper() {
		$columns = get_option( 'woocommerce_catalog_columns' );
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'yith_proteo_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'yith_proteo_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function yith_proteo_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'yith_proteo_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'yith_proteo_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function yith_proteo_woocommerce_wrapper_before() {
		$sidebar_display = yith_proteo_get_sidebar_position();
		?>
		<div id="primary" class="content-area <?php echo esc_attr( $sidebar_display ); ?>">
		<main id="main" class="site-main" role="main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'yith_proteo_woocommerce_wrapper_before' );

if ( ! function_exists( 'yith_proteo_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function yith_proteo_woocommerce_wrapper_after() {
		?>
		</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'yith_proteo_woocommerce_wrapper_after' );


if ( ! function_exists( 'yith_proteo_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 *
	 * @return array Fragments to refresh via AJAX.
	 */
	function yith_proteo_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		yith_proteo_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'yith_proteo_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'yith_proteo_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function yith_proteo_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'yith-proteo' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'yith-proteo' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span
				class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'yith_proteo_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function yith_proteo_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php yith_proteo_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}


if ( ! function_exists( 'yith_proteo_cart_layout' ) ) {

	add_filter( 'body_class', 'yith_proteo_cart_layout' );

	/**
	 * Set the cart page layout according to customizer option
	 *
	 * @param array $classes Cart layout CSS classes.
	 *
	 * @return array
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_cart_layout( $classes ) {
		if ( is_cart() ) {
			if ( get_theme_mod( 'yith_proteo_cart_layout', 'one_col' ) === 'two_cols' ) {
				$classes[] = 'two-cols-cart';
			} else {
				$classes[] = 'one-col-cart';
			}
			if ( get_theme_mod( 'yith_proteo_update_cart_button_style', 'textual' ) === 'button' ) {
				$classes[] = 'update-cart-button-style';
			}
		}

		return $classes;
	}
}

/**
 * Add account user photo on sidebar
 */
add_action( 'woocommerce_before_account_navigation', 'yith_proteo_open_my_account_sidebar', 10 );

if ( ! function_exists( 'yith_proteo_open_my_account_sidebar' ) ) :
	/**
	 * Add a user avatar on top of sidebar (Opening)
	 */
	function yith_proteo_open_my_account_sidebar() {
		global $current_user;
		?>
		<div class="yith-proteo-my-account-sidebar">
		<div class="yith-proteo-my-account-user-image">

			<div class="user-photo">
				<?php echo get_avatar( $current_user->ID, 130 ); ?>
			</div>

			<div class="user-info">
				<?php
				$username = $current_user->display_name;
				echo '<p><strong class="user-name">' . esc_html( $username ) . '</strong>';
				echo '<span class="user-email">' . esc_html( antispambot( $current_user->user_email ) ) . '</span>';
				echo '<a class="logout-link" href="' . esc_url( wc_logout_url() ) . '">' . esc_html_x( 'Logout', 'Account logout link', 'yith-proteo' ) . '</a></p>';
				?>
			</div>

		</div>
		<?php
	}
endif;

add_action( 'woocommerce_after_account_navigation', 'yith_proteo_close_my_account_sidebar', 10 );
if ( ! function_exists( 'yith_proteo_close_my_account_sidebar' ) ) :
	/**
	 * Add a user avatar on top of sidebar (Closing)
	 */
	function yith_proteo_close_my_account_sidebar() {
		echo '</div>';
	}
endif;

add_action( 'init', 'yith_proteo_custom_my_account_endpoint' );

/**
 * Add account endpoints
 */
function yith_proteo_custom_my_account_endpoint() {
	add_rewrite_endpoint( 'account-info', EP_ROOT | EP_PAGES );
}



add_filter( 'woocommerce_account_menu_items', 'yith_proteo_arrange_my_account_links' );
/**
 * Rearrange account endpoints
 *
 * @param array $menu_links My account menu items.
 */
function yith_proteo_arrange_my_account_links( $menu_links ) {

	unset( $menu_links['customer-logout'] ); // Remove Logout link.
	unset( $menu_links['edit-account'] ); // Remove edit account link.
	unset( $menu_links['edit-address'] ); // Remove edit address link.

	$menu_links['account-info'] = esc_html_x( 'Account info', 'Account menu item', 'yith-proteo' );

	return $menu_links;

}


add_action( 'woocommerce_account_account-info_endpoint', 'yith_proteo_account_info_endpoint_content' );
/**
 * Add new endpoint content
 */
function yith_proteo_account_info_endpoint_content() {
	wc_get_template( 'myaccount/proteo-account-info.php' );
}

/**
 * Manage WooCommerce Tabs headings
 */

add_filter( 'woocommerce_product_description_heading', '__return_null' );
add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );



if ( ! function_exists( 'yith_proteo_show_additional_product_loop_image_on_hover' ) ) :

	/**
	 * Additional product loop image on hover
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_show_additional_product_loop_image_on_hover() {

		global $product;
		$attachment_ids = $product->get_gallery_image_ids();
		if ( $attachment_ids ) {
			echo wp_get_attachment_image( $attachment_ids[0], 'woocommerce_thumbnail' );
		}
	}
endif;

add_action( 'woocommerce_before_shop_loop_item_title', 'yith_proteo_show_additional_product_loop_image_on_hover', 15 );


add_action( 'woocommerce_before_mini_cart', 'yith_proteo_before_mini_cart', 10 );
/**
 * Mini Cart item count (before)
 */
function yith_proteo_before_mini_cart() {
	$cart_icon = get_theme_mod( 'yith_proteo_header_cart_widget_custom_icon', false );
	if ( '' === $cart_icon || strpos( $cart_icon, '/img/proteo-cart-icon.png' ) !== false || ! $cart_icon ) {
		$cart_icon = '<span class="lnr lnr-cart"></span>';
	} else {
		$cart_icon = '<img class="custom-cart-icon" src="' . esc_url( $cart_icon ) . '">';
	}
	echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="proceed-to-cart-icon">' . $cart_icon . '<span>' . esc_html( WC()->cart->get_cart_contents_count() ) . '</span></a><div class="yith-proteo-mini-cart-content">'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	if ( WC()->cart->get_cart_contents_count() > 0 ) {
		/* translators: number of items in the mini cart. */
		echo '<p class="items-count">' . esc_html( sprintf( _n( '%d item in cart', '%d items in cart', WC()->cart->get_cart_contents_count(), 'yith-proteo' ), WC()->cart->get_cart_contents_count() ) ) . '</p>';
	}
}

add_action( 'woocommerce_after_mini_cart', 'yith_proteo_after_mini_cart', 10 );
/**
 * Mini Cart item count (after)
 */
function yith_proteo_after_mini_cart() {
	echo '</div>';

}

/**
 * Move single product sale badge inside gallery box
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 5 );


if ( class_exists( 'YITH_WCWL_Frontend_Premium' ) ) {
	/**
 * Support to YITH WooCommerce Wishlist - Move wishlist page links from footer to head
 */
	// prints wishlist pages links.
	remove_action(
		'yith_wcwl_wishlist_after_wishlist_content',
		array(
			YITH_WCWL_Frontend_Premium(),
			'add_wishlist_links',
		)
	);
	add_action(
		'yith_wcwl_wishlist_before_wishlist_content',
		array(
			YITH_WCWL_Frontend_Premium(),
			'add_wishlist_links',
		),
		15
	);
}

/**
 * Change yith wishlist title tag from h2 to h1
 *
 * @param string $title Wishlist page title.
 *
 * @return mixed
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_change_wishlist_title_tag( $title ) {
	global $post;
	$icon = '';
	if ( $post ) {
		$post_id = $post->ID;
		$icon    = ! empty( get_post_meta( $post->ID, 'title_icon', true ) ) ? '<div class="lnr ' . get_post_meta( $post->ID, 'title_icon', true ) . '"></div>' : '';
	}

	$title = str_replace( '<h2>', '<h1 class="entry-title wishlistpage-title">' . $icon, $title );
	$title = str_replace( '</h2>', '</h1>', $title );

	return $title;
}

add_filter( 'yith_wcwl_wishlist_title', 'yith_proteo_change_wishlist_title_tag' );

/**
 * Additional CSS class on loop add to cart buttons
 *
 * @param array  $args Array containing css classes.
 * @param object $product Product object.
 *
 * @return mixed
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_loop_add_to_cart_additional_class( $args, $product ) {

	$button_class   = get_theme_mod( 'yith_proteo_products_loop_add_to_cart_style', 'unstyled_button' );
	$button_class   = str_replace( '_', '-', $button_class );
	$args['class'] .= ' ' . $button_class;

	return $args;
}

add_filter( 'woocommerce_loop_add_to_cart_args', 'yith_proteo_loop_add_to_cart_additional_class', 10, 2 );

if ( ! function_exists( 'yith_proteo_account_dashboard' ) ) :
	/**
	 * Add my-account dashboard grid content
	 */
	function yith_proteo_account_dashboard() {
		wc_get_template( 'myaccount/proteo-dashboard.php' );
	}
endif;
add_action( 'woocommerce_account_dashboard', 'yith_proteo_account_dashboard', 10 );

/**
 * Limit products short description when not in product single page
 *
 * @param string $post_excerpt Post excerpt.
 *
 * @return false|string
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_limit_woocommerce_short_description( $post_excerpt ) {

	$length = 40;

	if ( is_shop() ) {
		return $post_excerpt;
	}

	if ( is_search() ) {
		$length = 300;
	}

	if ( is_product() ) {
		return $post_excerpt;
	}

	if ( is_product_taxonomy() ) {
		return $post_excerpt;
	}

	if ( is_checkout() ) {
		return $post_excerpt;
	}

	$post_excerpt = wp_strip_all_tags( $post_excerpt );

	if ( strlen( $post_excerpt ) <= $length ) {
		return $post_excerpt;
	}
	// find last space within length.
	$last_space   = strrpos( substr( $post_excerpt, 0, $length ), ' ' );
	$trimmed_text = substr( $post_excerpt, 0, $last_space );

	// add ellipses.
	$trimmed_text .= '...';

	return $trimmed_text;
}

add_filter( 'woocommerce_short_description', 'yith_proteo_limit_woocommerce_short_description', 10, 1 );

/**
 * Change Thank you page title
 *
 * @param string $title Page title.
 * @param int    $id    Page id.
 *
 * @return string
 */
function yith_proteo_title_order_received( $title, $id ) {
	if ( function_exists( 'is_order_received_page' ) && is_order_received_page() && get_the_ID() === $id ) {
		$title = esc_html_x( 'Thank you.', 'Thank you page title', 'yith-proteo' );
	}

	return $title;
}

add_filter( 'the_title', 'yith_proteo_title_order_received', 10, 2 );


/**
 * Remove WooCommerce Breadcrumbs
 */
function yith_proteo_remove_breadcrumbs() {

	if ( is_product() ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 0 );
	}

	// Remove WooCommerce Breadcrumb on all Woo pages.
	if ( 'no' === get_theme_mod( 'yith_proteo_breadcrumb_enable', 'yes' ) ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 0 );
	}

	// Remove WooCommerce Breadcrumb on thankyou page.
	if ( function_exists( 'is_order_received_page' ) && is_order_received_page() ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
}

add_action( 'template_redirect', 'yith_proteo_remove_breadcrumbs' );


/**
 * Add arrows to quantity inputs
 */
function yith_proteo_customize_quantity_inputs() {
	?>
		<span class="product-qty-arrows">
			<span class="product-qty-increase lnr lnr-chevron-up"></span>
			<span class="product-qty-decrease lnr lnr-chevron-down"></span>
		</span>
	<?php
}

add_action( 'woocommerce_after_quantity_input_field', 'yith_proteo_customize_quantity_inputs' );



add_action( 'woocommerce_before_shop_loop', 'yith_proteo_before_shop_loop_opener', 15 );
add_action( 'woocommerce_before_shop_loop', 'yith_proteo_before_shop_loop_closer', 35 );

/**
 * Opening tag before shop loop
 */
function yith_proteo_before_shop_loop_opener() {
	?>
		<div class="yith-proteo-before-shop-loop">
	<?php
}

/**
 * Closing tag before shop loop
 */
function yith_proteo_before_shop_loop_closer() {
	?>
		</div>
	<?php
}

/**
 * Move cross sells position
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );

/**
 * Set cross sell products columns number
 *
 * @param int $columns Columns number.
 * @return int
 */
function yith_proteo_cross_sell_columns( $columns ) {
	return get_theme_mod( 'yith_proteo_cross_sell_columns', 4 );
}
add_filter( 'woocommerce_cross_sells_columns', 'yith_proteo_cross_sell_columns' );


/**
 * Set cross sell products number
 *
 * @param int $total Max products count.
 * @return int
 */
function yith_proteo_cross_sell_max_number( $total ) {
	return get_theme_mod( 'yith_proteo_cross_sell_max_number', 4 );
}
add_filter( 'woocommerce_cross_sells_total', 'yith_proteo_cross_sell_max_number' );

/**
 * Handle single product page featured image features
 */
function yith_proteo_manage_single_product_image_features() {
	if ( 'no' === get_theme_mod( 'yith_proteo_product_page_image_zoom', 'yes' ) ) {
		remove_theme_support( 'wc-product-gallery-zoom' );
	}
	if ( 'no' === get_theme_mod( 'yith_proteo_product_page_image_lightbox', 'yes' ) ) {
		remove_theme_support( 'wc-product-gallery-lightbox' );
	}
	if ( 'no' === get_theme_mod( 'yith_proteo_product_page_gallery_slider', 'yes' ) ) {
		remove_theme_support( 'wc-product-gallery-slider' );
	}
}
add_action( 'wp', 'yith_proteo_manage_single_product_image_features', 99 );


if ( ! function_exists( 'yith_proteo_product_hover_effect' ) ) {

	add_filter( 'body_class', 'yith_proteo_product_hover_effect' );

	/**
	 * Set the products hover effect according to customizer option
	 *
	 * @param array $classes body CSS classes.
	 *
	 * @return array
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_product_hover_effect( $classes ) {
		$hover_effect = get_theme_mod( 'yith_proteo_product_catalog_hover_effect', 'glow' );
		$classes[]    = 'yith-proteo-products-hover-' . esc_attr( $hover_effect );
		return $classes;
	}
}

if ( ! function_exists( 'yith_proteo_products_loop_add_to_cart_style' ) ) {

	add_filter( 'body_class', 'yith_proteo_products_loop_add_to_cart_style' );

	/**
	 * Set the products hover effect according to customizer option
	 *
	 * @param array $classes body CSS classes.
	 *
	 * @return array
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_products_loop_add_to_cart_style( $classes ) {
		$add_to_cart_style = get_theme_mod( 'yith_proteo_products_loop_add_to_cart_style', 'unstyled_button' );
		$classes[]         = 'yith-proteo-add-to-cart-style-' . $add_to_cart_style;
		return $classes;
	}
}

if ( ! function_exists( 'yith_proteo_show_product_page_clear_variations_link' ) ) {
	/**
	 * Show or hide the clear variations link on product page according to theme option
	 *
	 * @param [type] $link Clear link.
	 *
	 * @return mixed
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_show_product_page_clear_variations_link( $link ) {
		if ( 'no' === get_theme_mod( 'yith_proteo_product_page_show_clear_variations_link', 'yes' ) ) {
			return '';
		} else {
			return $link;
		}
	}
	add_filter( 'woocommerce_reset_variations_link', 'yith_proteo_show_product_page_clear_variations_link' );
}

/**
 * Wrap loop product image in a container
 */
add_action( 'woocommerce_before_shop_loop_item_title', 'yith_proteo_loop_product_image_wrap_start', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'yith_proteo_loop_product_image_wrap_end', 100 );

if ( ! function_exists( 'yith_proteo_loop_product_image_wrap_start' ) ) {
	/**
	 * Wrap loop product image in a container. Opening tag.
	 */
	function yith_proteo_loop_product_image_wrap_start() {
		echo '<div class="yith-proteo-product-loop-image">';
	}
}
if ( ! function_exists( 'yith_proteo_loop_product_image_wrap_end' ) ) {
	/**
	 * Wrap loop product image in a container. Opening tag.
	 */
	function yith_proteo_loop_product_image_wrap_end() {
		echo '</div>';
	}
}

/**
 * Move loop add to cart inside the new .yith-proteo-product-loop-image container
 */
if ( 'hover' === get_theme_mod( 'yith_proteo_products_loop_add_to_cart_position', 'classic' ) ) {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'yith_proteo_products_loop_add_to_cart_hover_position', 50 );

	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 110 );
}

if ( ! function_exists( 'yith_proteo_products_loop_add_to_cart_hover_position' ) ) {
	/**
	 * Template for products loop add to cart when position is on hover
	 *
	 * @author Francesco Licandro
	 * @return void
	 */
	function yith_proteo_products_loop_add_to_cart_hover_position() {
		// Open wrapper.
		echo '<div class="yith-proteo-product-loop-actions wp-block-button wc-block-grid__product-add-to-cart">';
		// Default WooCommerce add to cart.
		woocommerce_template_loop_add_to_cart();
		// Let's third party add actions.
		do_action( 'yith_proteo_products_loop_add_to_cart_actions' );
		// Close wrapper.
		echo '</div>';
	}
}


add_filter( 'body_class', 'yith_proteo_products_loop_add_to_cart_position_css_class' );

if ( ! function_exists( 'yith_proteo_products_loop_add_to_cart_position_css_class' ) ) {
	/**
	 * Set the products add to cart body class according to customizer option
	 *
	 * @param array $classes body CSS classes.
	 *
	 * @return array
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_products_loop_add_to_cart_position_css_class( $classes ) {
		$add_to_cart_style = get_theme_mod( 'yith_proteo_products_loop_add_to_cart_position', 'classic' );
		$classes[]         = 'yith-proteo-product-loop-add-to-cart-position-' . esc_attr( $add_to_cart_style );
		return $classes;
	}
}

if ( 'yes' === get_theme_mod( 'yith_proteo_product_loop_view_details_enable', 'no' ) ) {
	if ( 'hover' === get_theme_mod( 'yith_proteo_products_loop_add_to_cart_position', 'classic' ) ) {
		add_action( 'yith_proteo_products_loop_add_to_cart_actions', 'yith_proteo_add_view_product_button', 60 );
	} else {
		add_action( 'woocommerce_after_shop_loop_item', 'yith_proteo_add_view_product_button', 10 );
	}
}

if ( ! function_exists( 'yith_proteo_add_view_product_button' ) ) {
	/**
	 * Add "View details" button on product loops
	 */
	function yith_proteo_add_view_product_button() {
		global $product;
		$link        = $product->get_permalink();
		$button_type = 'button ' . get_theme_mod( 'yith_proteo_products_loop_view_details_style', 'ghost' );
		echo '<a href="' . esc_url( $link ) . '" class="' . esc_attr( $button_type ) . ' view-details woocommerce-LoopProduct-link woocommerce-loop-product__link">' . esc_html( apply_filters( 'yith_proteo_loop_product_view_details_text', esc_html_x( 'View details', 'Customizer option value', 'yith-proteo' ) ) ) . '</a>';
	}
}

if ( ! function_exists( 'yith_proteo_is_shop_filterd' ) ) {
	/**
	 * Checks whether is filtered shop
	 *
	 * @return bool
	 */
	function yith_proteo_is_shop_filterd() {
		$is_filtered = ! ! WC_Query::get_layered_nav_chosen_attributes();

		/**
		 * YITH WooCommerce Ajax Product filter compatibility.
		 */
		if ( defined( 'YITH_WCAN' ) ) {
			$is_filtered = $is_filtered || YITH_WCAN_Query()->should_filter();
		}

		return apply_filters( 'yith_proteo_is_shop_filterd', is_shop() && $is_filtered );
	}
}

if ( ! function_exists( 'yith_show_hide_shop_page_title' ) ) {
	add_action( 'template_redirect', 'yith_show_hide_shop_page_title' );

	/**
	 * Show/Hide shop page title
	 *
	 * @return void
	 */
	function yith_show_hide_shop_page_title() {
		$yith_proteo_page_id_to_check = get_option( 'woocommerce_shop_page_id' );
		// Retrieve meta value.
		$yith_proteo_hide_page_title = 'on' === get_post_meta( $yith_proteo_page_id_to_check, 'yith_proteo_hide_page_title', true ) ? true : false;
		if ( class_exists( 'EditorsKit' ) ) {
			$yith_proteo_hide_page_title = '1' === get_post_meta( $yith_proteo_page_id_to_check, '_editorskit_title_hidden', true ) ? true : false;
		}
		if ( is_shop() && $yith_proteo_hide_page_title ) {
			add_filter( 'woocommerce_show_page_title', '__return_false' );
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
		}
	}
}
