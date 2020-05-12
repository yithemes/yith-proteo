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

		if ( function_exists( 'WC' ) ) {
			wp_enqueue_style( 'yith-proteo-style', get_stylesheet_uri(), array( 'select2' ), YITH_PROTEO_VERSION );
		} else {
			wp_enqueue_style( 'yith-proteo-style', get_stylesheet_uri(), array(), YITH_PROTEO_VERSION );
		}

		wp_enqueue_script( 'yith-proteo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), YITH_PROTEO_VERSION, true );

		wp_enqueue_style( 'select2' );

		wp_enqueue_style( 'yith-proteo-animations', get_template_directory_uri() . '/third-party/aos' . $suffix . '.css', array(), '2.3.1' );
		wp_enqueue_script( 'yith-proteo-animations-js', get_template_directory_uri() . '/third-party/aos' . $suffix . '.js', array( 'jquery' ), '2.3.1', true );

		// Modals.
		wp_enqueue_script( 'yith-proteo-modals-js', get_template_directory_uri() . '/third-party/jquery.modal' . $suffix . '.js', array(), '0.9.1', true );
		wp_enqueue_style( 'yith-proteo-modals-css', get_template_directory_uri() . '/third-party/jquery.modal' . $suffix . '.css', array(), '0.9.1' );

		$args = array( 'jquery' );
		if ( function_exists( 'WC' ) ) {
			$args[] = 'selectWoo';
		}

		wp_enqueue_script( 'yith-proteo-themejs', get_template_directory_uri() . '/js/theme.js', $args, YITH_PROTEO_VERSION, true );
		wp_localize_script(
			'yith-proteo-themejs',
			'yith_proteo',
			array(
				'stickyHeader' => apply_filters(
					'yith_proteo_enable_sticky_header',
					get_theme_mod( 'yith_proteo_header_sticky', 'yes' )
				),
			)
		);

		wp_enqueue_script( 'yith-proteo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

		if ( get_theme_mod( 'yith_proteo_google_font' ) !== '' ) {
			wp_enqueue_style( 'yith-proteo-google-font', get_theme_mod( 'yith_proteo_google_font', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap' ), array( 'yith-proteo-style' ) ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
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
