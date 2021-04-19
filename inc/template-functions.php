<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package yith-proteo
 */

if ( ! function_exists( 'yith_proteo_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		// get single post layout.
		$yith_proteo_single_post_layout = get_theme_mod( 'yith_proteo_single_post_layout', 'standard' );
		$classes[]                      = 'proteo_post_layout_' . $yith_proteo_single_post_layout;

		return $classes;
	}
endif;

add_filter( 'body_class', 'yith_proteo_body_classes' );


if ( ! function_exists( 'yith_proteo_custom_header_style' ) ) :
	/**
	 * Set custom header as background property.
	 * Additional CSS in .scss files
	 */
	function yith_proteo_custom_header_style() {
		$style = '';
		if ( has_custom_header() ) {
			$custom_header_url = esc_url( get_header_image() );
			$style             = 'style=" background-image: url(' . $custom_header_url . '); "';
		}
		echo $style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;


if ( ! function_exists( 'yith_proteo_get_sidebar_position' ) ) :
	/**
	 * Get Sidebar position
	 *
	 * @param string $info Sidebar show.
	 *
	 * @return string containing css classes
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_get_sidebar_position( $info = null ) {
		$sidebar_display = '';
		$sidebar_show    = true;
		$local_sidebar   = yith_proteo_sidebar_get_meta( 'sidebar_position' );
		$general_sidebar = get_theme_mod( 'yith_proteo_default_sidebar_position', 'right' );

		// Check Blog page settings from customizer.
		if ( is_home() ) {
			$general_sidebar = get_theme_mod( 'yith_proteo_blog_page_sidebar_position', 'right' );
		} elseif ( is_category() ) {
			$general_sidebar = get_theme_mod( 'yith_proteo_blog_category_sidebar_position', 'right' );
		} elseif ( is_tag() ) {
			$general_sidebar = get_theme_mod( 'yith_proteo_blog_tag_sidebar_position', 'right' );
		}

		// Check WooCommerce Shop page settings.
		if ( class_exists( 'WooCommerce' ) ) {
			$shop_page_id                       = get_option( 'woocommerce_shop_page_id' );
			$shop_page_sidebar_position_meta    = get_post_meta( $shop_page_id, 'sidebar_position', true );
			$default_shop_page_sidebar_position = in_array( $shop_page_sidebar_position_meta, array( '', 'inherit' ), true ) ? get_theme_mod( 'yith_proteo_shop_page_sidebar_position', 'right' ) : $shop_page_sidebar_position_meta;
			if ( is_shop() ) {
				$local_sidebar   = get_theme_mod( 'yith_proteo_shop_page_sidebar_position', $default_shop_page_sidebar_position );
				$general_sidebar = $local_sidebar;
			} elseif ( is_product_category() ) {
				$local_sidebar   = 'inherit';
				$general_sidebar = get_theme_mod( 'yith_proteo_product_category_page_sidebar_position', 'no-sidebar' );
			} elseif ( is_product_tag() ) {
				$local_sidebar   = 'inherit';
				$general_sidebar = get_theme_mod( 'yith_proteo_product_tag_page_sidebar_position', 'no-sidebar' );
			} elseif ( is_product_taxonomy() ) {
				$local_sidebar   = 'inherit';
				$general_sidebar = get_theme_mod( 'yith_proteo_product_tax_page_sidebar_position', 'no-sidebar' );
			} elseif ( is_product() ) {
				$general_sidebar = get_theme_mod( 'yith_proteo_product_page_sidebar_position', 'no-sidebar' );
			} elseif ( is_checkout() || is_cart() || is_account_page() ) {
				return false;
			}
		}

		if ( empty( $local_sidebar ) || 'inherit' === $local_sidebar ) {

			if ( 'no-sidebar' !== $general_sidebar ) {
				$sidebar_display .= 'col-lg-9';
			}
			if ( 'left' === $general_sidebar ) {
				$sidebar_display .= ' order-last ';
			}
			if ( 'no-sidebar' === $general_sidebar ) {
				$sidebar_show = false;
			}
		} else {

			if ( 'no-sidebar' !== $local_sidebar ) {
				$sidebar_display .= 'col-lg-9';
			}
			if ( 'left' === $local_sidebar ) {
				$sidebar_display .= ' order-last ';
			}
			if ( 'no-sidebar' === $local_sidebar ) {
				$sidebar_show = false;
			}
		}

		if ( 'sidebar-show' === $info ) {
			return $sidebar_show;
		}

		return $sidebar_display;

	}
endif;


if ( ! function_exists( 'yith_proteo_print_page_titles' ) ) :
	/**
	 * Print page titles
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_print_page_titles() {
		global $post;

		// Initialize variables to use.
		$yith_proteo_is_frontpage    = is_front_page();
		$is_wishlist_page            = false;
		$yith_proteo_is_blog_page    = is_home();
		$yith_proteo_hide_page_title = false;

		if ( function_exists( 'yith_wcwl_is_wishlist_page' ) ) {
			$is_wishlist_page = yith_wcwl_is_wishlist_page();
		}

		// Retrieve ID of the page to check.
		if ( function_exists( 'wc' ) && is_shop() ) {
			$yith_proteo_page_id_to_check = get_option( 'woocommerce_shop_page_id' );
		} elseif ( $yith_proteo_is_blog_page ) {
			$yith_proteo_page_id_to_check = get_option( 'page_for_posts' );
		} else {
			$yith_proteo_page_id_to_check = $post->ID;
		}

		// Retrieve meta value.
		$yith_proteo_hide_page_title = 'on' === get_post_meta( $yith_proteo_page_id_to_check, 'yith_proteo_hide_page_title', true ) ? true : false;
		if ( class_exists( 'EditorsKit' ) && ! $yith_proteo_is_blog_page ) {
			$yith_proteo_hide_page_title = '1' === get_post_meta( $yith_proteo_page_id_to_check, '_editorskit_title_hidden', true ) ? true : false;
		}

		if ( ! $is_wishlist_page && ! $yith_proteo_hide_page_title ) {

			// Print breadcrumbs.
			if ( function_exists( 'woocommerce_breadcrumb' ) && ! ( is_order_received_page() ) && ( 'yes' === get_theme_mod( 'yith_proteo_breadcrumb_enable', 'yes' ) ) ) {
				woocommerce_breadcrumb();
			}

			// Print icons.
			if ( $post instanceof WP_Post && ( 'post' === $post->post_type || 'page' === $post->post_type ) ) {
				$icon = ! empty( get_post_meta( $yith_proteo_page_id_to_check, 'title_icon', true ) ) ? '<div class="entry-title lnr ' . get_post_meta( $yith_proteo_page_id_to_check, 'title_icon', true ) . '"></div>' : '';
				if ( ! empty( $icon ) ) {
					echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}

			// Print page title.
			if ( $yith_proteo_is_blog_page ) {
				?>
				<h1 class="page-title"><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></h1>
				<?php
			} else {
				the_title( '<h1 class="entry-title">', '</h1>' );
			}
		}

	}
endif;



if ( ! function_exists( 'yith_proteo_output_full_screen_search' ) ) :
	/**
	 * FULL SCREEN SEARCH
	 */
	function yith_proteo_output_full_screen_search() {
		?>
		<div id="full-screen-search">

			<?php
			if ( defined( 'YITH_WCAS_DIR' ) ) :
				echo do_shortcode( '[yith_woocommerce_ajax_search]' );
				echo '<button type="button" class="close" id="full-screen-search-close"><span class="lnr lnr-cross"></span></button>';
			else :
				?>
				<button type="button" class="close" id="full-screen-search-close"><span class="lnr lnr-cross"></span>
				</button>
				<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" id="full-screen-search-form">
					<div id="full-screen-search-container">
						<input type="text" name="s" placeholder="<?php echo esc_attr_x( 'Search', 'Search widget input placeholder', 'yith-proteo' ); ?>" id="full-screen-search-input"/>
						<button type="submit" id="submit-full-screen-search">
							<span class="lnr lnr-magnifier"></span>
						</button>
					</div>
				</form>
			<?php endif; ?>
		</div>
		<?php
	}
endif;

add_action( 'wp_footer', 'yith_proteo_output_full_screen_search' );


/**
 * Modify the_content read_more text with a link
 *
 * @return string
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_modify_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">' . esc_html( get_theme_mod( 'yith_proteo_blog_read_more_text', 'Read more  &#10230;' ) ) . '</a>';
}

add_filter( 'the_content_more_link', 'yith_proteo_modify_read_more_link' );


/**
 * Modify the_excerpt read_more text with a link
 *
 * @param string $more More string.
 *
 * @return string
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_modify_excerpt_more( $more ) {
	global $post;

	return '<a class="more-link" href="' . get_permalink( $post->ID ) . '">' . esc_html( get_theme_mod( 'yith_proteo_blog_read_more_text', 'Read more  &#10230;' ) ) . '</a>';
}

add_filter( 'excerpt_more', 'yith_proteo_modify_excerpt_more' );


if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open action hook
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}


if ( ! function_exists( 'yith_proteo_site_layout_body_class' ) ) {

	add_filter( 'body_class', 'yith_proteo_site_layout_body_class' );

	/**
	 * Set the site layout to customizer option
	 *
	 * @param array $classes body CSS classes.
	 *
	 * @return array
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_site_layout_body_class( $classes ) {
		$site_full_width_layout = get_theme_mod( 'yith_proteo_layout_full_width', 'no' );
		$site_full_width_layout = ( 'yes' === $site_full_width_layout ) ? 'proteo-full-width-layout' : '';
		$classes[]              = $site_full_width_layout;
		return $classes;
	}
}

if ( ! function_exists( 'yith_proteo_display_header_text' ) ) {
	/**
	 * Return option value for theme_mod yith_proteo_display_header_text
	 */
	function yith_proteo_display_header_text() {
		return get_theme_mod( 'yith_proteo_display_header_text', 'yes' ) === 'yes' ? true : false;
	}
}
