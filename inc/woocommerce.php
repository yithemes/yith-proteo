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
	$defaults = array(
		'posts_per_page' => get_theme_mod( 'yith_proteo_product_page_related_max_number', 4 ),
		'columns'        => get_theme_mod( 'yith_proteo_product_page_related_columns', 4 ),
	);

	$args = wp_parse_args( $defaults, $args );

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
			if ( get_theme_mod( 'yith_proteo_cart_layout', 'one_col' ) == 'two_cols' ) {
				$classes[] = 'two-cols-cart';
			} else {
				$classes[] = 'one-col-cart';
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
				echo '<a class="logout-link" href="' . esc_url( wc_logout_url() ) . '">' . esc_html__( 'Logout', 'yith-proteo' ) . '</a></p>';
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

	$menu_links['account-info'] = __( 'Account info', 'yith-proteo' );

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
 * Move breadcrumb on single product page
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 0 );

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
	echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="proceed-to-cart-icon"><span class="lnr lnr-cart"></span><span>' . esc_html( WC()->cart->get_cart_contents_count() ) . '</span></a><div class="yith-proteo-mini-cart-content">';
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
	$args['class'] .= ' unstyled_button ';

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
		$title = esc_html__( 'Thank you.', 'yith-proteo' );
	}

	return $title;
}

add_filter( 'the_title', 'yith_proteo_title_order_received', 10, 2 );


/**
 * Remove WooCommerce Breadcrumb on thankyou page
 */
function yith_proteo_remove_thank_you_breadcrumbs() {

	if ( function_exists( 'is_order_received_page' ) && is_order_received_page() ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
}

add_action( 'template_redirect', 'yith_proteo_remove_thank_you_breadcrumbs' );


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
