<?php
/**
 * Script inclusion file
 *
 * @package yith-proteo
 */

if ( ! function_exists( 'yith_proteo_scripts' ) ) :

	/**
	 * Enqueue scripts and styles.
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_scripts() {

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_dequeue_style( 'select2-css' );

		wp_enqueue_style( 'yith-proteo-linearicons', get_template_directory_uri() . '/third-party/linearicons' . $suffix . '.css', array(), '1.0.0' );
		wp_enqueue_style( 'yith-proteo-simple-line-icons', get_template_directory_uri() . '/third-party/simple-line-icons' . $suffix . '.css', array(), '2.4.1' );

		wp_enqueue_style( 'select2', get_template_directory_uri() . '/third-party/select2' . $suffix . '.css', array(), '4.0.13' );
		if ( function_exists( 'WC' ) ) {
			wp_enqueue_script( 'selectWoo' );
		} else {
			wp_enqueue_script( 'select2', get_template_directory_uri() . '/third-party/select2' . $suffix . '.js', array(), '4.0.13', true );
		}

		wp_enqueue_style( 'yith-proteo-style', get_stylesheet_uri(), array( 'select2' ), YITH_PROTEO_VERSION );

		wp_enqueue_script( 'yith-proteo-navigation', get_template_directory_uri() . '/js/navigation' . $suffix . '.js', array(), YITH_PROTEO_VERSION, true );

		wp_enqueue_style( 'yith-proteo-animations', get_template_directory_uri() . '/third-party/aos' . $suffix . '.css', array(), '2.3.1' );
		wp_enqueue_script( 'yith-proteo-animations-js', get_template_directory_uri() . '/third-party/aos' . $suffix . '.js', array( 'jquery' ), '2.3.1', true );

		// Modals.
		wp_enqueue_script( 'yith-proteo-modals-js', get_template_directory_uri() . '/third-party/jquery.modal' . $suffix . '.js', array(), '0.9.1', true );
		wp_enqueue_style( 'yith-proteo-modals-css', get_template_directory_uri() . '/third-party/jquery.modal' . $suffix . '.css', array(), '0.9.1' );

		$args = array( 'jquery' );
		if ( function_exists( 'WC' ) ) {
			$args[] = 'selectWoo';
		}

		wp_enqueue_script( 'yith-proteo-themejs', get_template_directory_uri() . '/js/theme' . $suffix . '.js', $args, YITH_PROTEO_VERSION, true );
		wp_localize_script(
			'yith-proteo-themejs',
			'yith_proteo',
			array(
				'stickyHeader'                         => apply_filters(
					'yith_proteo_enable_sticky_header',
					get_theme_mod( 'yith_proteo_header_sticky', 'no' )
				),
				'select2minimumResultsForSearch'       => apply_filters( 'yith_proteo_select2_minimum_results_for_search', 7 ),
				'yith_proteo_use_enanched_selects'     => get_theme_mod( 'yith_proteo_use_enanched_selects', 'yes' ),
				'yith_proteo_use_enhanced_checkbox_and_radio' => get_theme_mod( 'yith_proteo_use_enhanced_checkbox_and_radio', 'yes' ),
				'yith_proteo_has_woocommerce'          => function_exists( 'WC' ),
				'yith_proteo_products_loop_add_to_cart_position' => get_theme_mod( 'yith_proteo_products_loop_add_to_cart_position', 'classic' ),
				'yith_proteo_product_loop_view_details_enable' => get_theme_mod( 'yith_proteo_product_loop_view_details_enable', 'no' ),
				'yith_proteo_product_loop_view_details_style' => 'view-details button ' . get_theme_mod( 'yith_proteo_products_loop_view_details_style', 'ghost' ),
				'yith_proteo_loop_product_view_details_text' => apply_filters( 'yith_proteo_loop_product_view_details_text', esc_html_x( 'View details', 'Customizer option value', 'yith-proteo' ) ),
				'yith_proteo_page_title_layout'        => get_theme_mod( 'yith_proteo_page_title_layout', 'inside' ),
				'yith_proteo_site_content_top_spacing' => get_theme_mod(
					'yith_proteo_site_content_spacing',
					array(
						'top'    => 50,
						'right'  => 0,
						'bottom' => 50,
						'left'   => 0,
					)
				)['top'],
			)
		);

		wp_enqueue_script( 'yith-proteo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . $suffix . '.js', array(), '20151215', true );

		if ( get_theme_mod( 'yith_proteo_google_font' ) !== '' ) {
			wp_enqueue_style( 'yith-proteo-google-font', get_theme_mod( 'yith_proteo_google_font' ), array( 'yith-proteo-style' ) ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_style( 'yith-proteo-responsive', get_template_directory_uri() . '/responsive.css', array( 'yith-proteo-style' ), YITH_PROTEO_VERSION );

		if ( 'yes' === get_theme_mod( 'yith_proteo_use_custom_responsive', 'no' ) && file_exists( wp_get_upload_dir()['basedir'] . '/yith-proteo-custom-responsive.css' ) ) {
			wp_dequeue_style( 'yith-proteo-responsive' );
			wp_enqueue_style( 'yith-proteo-custom-responsive', wp_get_upload_dir()['baseurl'] . '/yith-proteo-custom-responsive.css', array( 'yith-proteo-style' ), YITH_PROTEO_VERSION );
		}

	}
endif;
add_action( 'wp_enqueue_scripts', 'yith_proteo_scripts', 10 );


if ( ! function_exists( 'yith_proteo_admin_scripts' ) ) :
	/**
	 * Enqueue custom admin css for slider management
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_admin_scripts() {

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style( 'yith-proteo-linearicons', get_template_directory_uri() . '/third-party/linearicons' . $suffix . '.css', array(), '1.0.0' );
		wp_enqueue_style( 'yith-proteo-simple-line-icons', get_template_directory_uri() . '/third-party/simple-line-icons' . $suffix . '.css', array(), '2.4.1' );

		wp_enqueue_style( 'select2', get_template_directory_uri() . '/third-party/select2' . $suffix . '.css', array(), '4.0.13' );
		if ( function_exists( 'WC' ) ) {
			wp_enqueue_script( 'selectWoo' );
		} else {
			wp_enqueue_script( 'select2', get_template_directory_uri() . '/third-party/select2' . $suffix . '.js', array(), '4.0.13', true );
		}
		wp_enqueue_script( 'yith-proteo-admin-js', get_template_directory_uri() . '/admin-scripts/admin-js.js', array(), YITH_PROTEO_VERSION, true );
		wp_enqueue_style( 'yith-proteo-admin-css', get_template_directory_uri() . '/admin-scripts/admin-css.css', array(), YITH_PROTEO_VERSION );
	}
endif;

add_action( 'admin_enqueue_scripts', 'yith_proteo_admin_scripts', 20 );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function yith_proteo_customize_preview_js() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_script( 'yith-proteo-customizer', get_template_directory_uri() . '/inc/customizer/customizer' . $suffix . '.js', array( 'jquery', 'customize-preview' ), YITH_PROTEO_VERSION, true );
}

add_action( 'customize_preview_init', 'yith_proteo_customize_preview_js', 100 );


/**
 * Load dynamic logic for the customizer controls area.
 */
function yith_proteo_customize_controls_js() {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_script( 'yith-proteo-customizer-controls', get_template_directory_uri() . '/inc/customizer/customizer-controls' . $suffix . '.js', array( 'jquery' ), YITH_PROTEO_VERSION, true );
	wp_localize_script(
		'yith-proteo-customizer-controls',
		'yith_proteo_customizer_controls',
		array(
			'yith_proteo_customizer_has_woocommerce'    => function_exists( 'WC' ),
			'yith_proteo_responsive_option_notice_text' => esc_html_x( 'This value is conflicting with other breakpoints.', 'Customizer option alert', 'yith-proteo' ),
		)
	);
}
add_action( 'customize_controls_enqueue_scripts', 'yith_proteo_customize_controls_js' );
