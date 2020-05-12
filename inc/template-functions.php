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
		}

		// Check WooCommerce Shop page settings.
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_shop() ) {
				$general_sidebar = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'sidebar_position', true );
			}
			if ( is_product_category() ) {
				$general_sidebar = get_theme_mod( 'yith_proteo_product_category_page_sidebar_position', 'no-sidebar' );
			}
			if ( is_product_tag() ) {
				$general_sidebar = get_theme_mod( 'yith_proteo_product_tag_page_sidebar_position', 'no-sidebar' );
			}

			if ( is_product() ) {
				$general_sidebar = get_theme_mod( 'yith_proteo_product_page_sidebar_position', 'no-sidebar' );
			}

			if ( is_checkout() || is_cart() || is_account_page() ) {
				return false;
			}
		}

		if ( empty( $local_sidebar ) || 'inherit' == $local_sidebar ) {

			if ( 'no-sidebar' != $general_sidebar ) {
				$sidebar_display .= 'col-lg-9';
			}
			if ( 'left' == $general_sidebar ) {
				$sidebar_display .= ' order-last ';
			}
			if ( 'no-sidebar' == $general_sidebar ) {
				$sidebar_show = false;
			}
		} else {

			if ( 'no-sidebar' != $local_sidebar ) {
				$sidebar_display .= 'col-lg-9';
			}
			if ( 'left' == $local_sidebar ) {
				$sidebar_display .= ' order-last ';
			}
			if ( 'no-sidebar' == $local_sidebar ) {
				$sidebar_show = false;
			}
		}

		if ( 'sidebar-show' == $info ) {
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

		$hide_title_if_wishlist = false;
		if ( function_exists( 'yith_wcwl_is_wishlist_page' ) ) {
			$hide_title_if_wishlist = yith_wcwl_is_wishlist_page();
		}

		if ( ! $hide_title_if_wishlist ) :

			if ( $post instanceof WP_Post && ( 'post' === $post->post_type || 'page' === $post->post_type ) ) {
				$icon = ! empty( get_post_meta( $post->ID, 'title_icon', true ) ) ? '<div class="entry-title lnr ' . get_post_meta( $post->ID, 'title_icon', true ) . '"></div>' : '';
				if ( ! empty( $icon ) ) {
					echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}

			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;

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
						<input type="text" name="s" placeholder="<?php esc_html_e( 'Search', 'yith-proteo' ); ?>" id="full-screen-search-input"/>
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
	return '<a class="more-link" href="' . get_permalink() . '">' . __( 'Read more', 'yith-proteo' ) . ' &xrarr; </a>';
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

	return '<a class="more-link" href="' . get_permalink( $post->ID ) . '">' . __( 'Read more', 'yith-proteo' ) . ' &xrarr; </a>';
}

add_filter( 'excerpt_more', 'yith_proteo_modify_excerpt_more' );
