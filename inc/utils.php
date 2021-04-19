<?php
/**
 * Theme utilities
 *
 * @package yith-proteo
 */

if ( ! function_exists( 'yith_proteo_get_icons_list' ) ) :
	/**
	 * Get Proteo Icons
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_get_icons_list() {

		$icons = array(
			'lnr-home'                 => '<span class="lnr lnr-home"></span> <span>home</span>',
			'lnr-apartment'            => '<span class="lnr lnr-apartment"></span> <span>apartment</span>',
			'lnr-pencil'               => '<span class="lnr lnr-pencil"></span> <span>pencil</span>',
			'lnr-magic-wand'           => '<span class="lnr lnr-magic-wand"></span> <span>magic-wand</span>',
			'lnr-drop'                 => '<span class="lnr lnr-drop"></span> <span>drop</span>',
			'lnr-lighter'              => '<span class="lnr lnr-lighter"></span> <span>lighter</span>',
			'lnr-poop'                 => '<span class="lnr lnr-poop"></span> <span>poop</span>',
			'lnr-sun'                  => '<span class="lnr lnr-sun"></span> <span>sun</span>',
			'lnr-moon'                 => '<span class="lnr lnr-moon"></span> <span>moon</span>',
			'lnr-cloud'                => '<span class="lnr lnr-cloud"></span> <span>cloud</span>',
			'lnr-cloud-upload'         => '<span class="lnr lnr-cloud-upload"></span> <span>cloud-upload</span>',
			'lnr-cloud-download'       => '<span class="lnr lnr-cloud-download"></span> <span>cloud-download</span>',
			'lnr-cloud-sync'           => '<span class="lnr lnr-cloud-sync"></span> <span>cloud-sync</span>',
			'lnr-cloud-check'          => '<span class="lnr lnr-cloud-check"></span> <span>cloud-check</span>',
			'lnr-database'             => '<span class="lnr lnr-database"></span> <span>database</span>',
			'lnr-lock'                 => '<span class="lnr lnr-lock"></span> <span>lock</span>',
			'lnr-cog'                  => '<span class="lnr lnr-cog"></span> <span>cog</span>',
			'lnr-trash'                => '<span class="lnr lnr-trash"></span> <span>trash</span>',
			'lnr-dice'                 => '<span class="lnr lnr-dice"></span> <span>dice</span>',
			'lnr-heart'                => '<span class="lnr lnr-heart"></span> <span>heart</span>',
			'lnr-star'                 => '<span class="lnr lnr-star"></span> <span>star</span>',
			'lnr-star-half'            => '<span class="lnr lnr-star-half"></span> <span>star-half</span>',
			'lnr-star-empty'           => '<span class="lnr lnr-star-empty"></span> <span>star-empty</span>',
			'lnr-flag'                 => '<span class="lnr lnr-flag"></span> <span>flag</span>',
			'lnr-envelope'             => '<span class="lnr lnr-envelope"></span> <span>envelope</span>',
			'lnr-paperclip'            => '<span class="lnr lnr-paperclip"></span> <span>paperclip</span>',
			'lnr-inbox'                => '<span class="lnr lnr-inbox"></span> <span>inbox</span>',
			'lnr-eye'                  => '<span class="lnr lnr-eye"></span> <span>eye</span>',
			'lnr-printer'              => '<span class="lnr lnr-printer"></span> <span>printer</span>',
			'lnr-file-empty'           => '<span class="lnr lnr-file-empty"></span> <span>file-empty</span>',
			'lnr-file-add'             => '<span class="lnr lnr-file-add"></span> <span>file-add</span>',
			'lnr-enter'                => '<span class="lnr lnr-enter"></span> <span>enter</span>',
			'lnr-exit'                 => '<span class="lnr lnr-exit"></span> <span>exit</span>',
			'lnr-graduation-hat'       => '<span class="lnr lnr-graduation-hat"></span> <span>graduation-hat</span>',
			'lnr-license'              => '<span class="lnr lnr-license"></span> <span>license</span>',
			'lnr-music-note'           => '<span class="lnr lnr-music-note"></span> <span>music-note</span>',
			'lnr-film-play'            => '<span class="lnr lnr-film-play"></span> <span>film-play</span>',
			'lnr-camera-video'         => '<span class="lnr lnr-camera-video"></span> <span>camera-video</span>',
			'lnr-camera'               => '<span class="lnr lnr-camera"></span> <span>camera</span>',
			'lnr-picture'              => '<span class="lnr lnr-picture"></span> <span>picture</span>',
			'lnr-book'                 => '<span class="lnr lnr-book"></span> <span>book</span>',
			'lnr-bookmark'             => '<span class="lnr lnr-bookmark"></span> <span>bookmark</span>',
			'lnr-user'                 => '<span class="lnr lnr-user"></span> <span>user</span>',
			'lnr-users'                => '<span class="lnr lnr-users"></span> <span>users</span>',
			'lnr-shirt'                => '<span class="lnr lnr-shirt"></span> <span>shirt</span>',
			'lnr-store'                => '<span class="lnr lnr-store"></span> <span>store</span>',
			'lnr-cart'                 => '<span class="lnr lnr-cart"></span> <span>cart</span>',
			'lnr-tag'                  => '<span class="lnr lnr-tag"></span> <span>tag</span>',
			'lnr-phone-handset'        => '<span class="lnr lnr-phone-handset"></span> <span>phone-handset</span>',
			'lnr-phone'                => '<span class="lnr lnr-phone"></span> <span>phone</span>',
			'lnr-pushpin'              => '<span class="lnr lnr-pushpin"></span> <span>pushpin</span>',
			'lnr-map-marker'           => '<span class="lnr lnr-map-marker"></span> <span>map-marker</span>',
			'lnr-map'                  => '<span class="lnr lnr-map"></span> <span>map</span>',
			'lnr-location'             => '<span class="lnr lnr-location"></span> <span>location</span>',
			'lnr-calendar-full'        => '<span class="lnr lnr-calendar-full"></span> <span>calendar-full</span>',
			'lnr-keyboard'             => '<span class="lnr lnr-keyboard"></span> <span>keyboard</span>',
			'lnr-spell-check'          => '<span class="lnr lnr-spell-check"></span> <span>spell-check</span>',
			'lnr-screen'               => '<span class="lnr lnr-screen"></span> <span>screen</span>',
			'lnr-smartphone'           => '<span class="lnr lnr-smartphone"></span> <span>smartphone</span>',
			'lnr-tablet'               => '<span class="lnr lnr-tablet"></span> <span>tablet</span>',
			'lnr-laptop'               => '<span class="lnr lnr-laptop"></span> <span>laptop</span>',
			'lnr-laptop-phone'         => '<span class="lnr lnr-laptop-phone"></span> <span>laptop-phone</span>',
			'lnr-power-switch'         => '<span class="lnr lnr-power-switch"></span> <span>power-switch</span>',
			'lnr-bubble'               => '<span class="lnr lnr-bubble"></span> <span>bubble</span>',
			'lnr-heart-pulse'          => '<span class="lnr lnr-heart-pulse"></span> <span>heart-pulse</span>',
			'lnr-construction'         => '<span class="lnr lnr-construction"></span> <span>construction</span>',
			'lnr-pie-chart'            => '<span class="lnr lnr-pie-chart"></span> <span>pie-chart</span>',
			'lnr-chart-bars'           => '<span class="lnr lnr-chart-bars"></span> <span>chart-bars</span>',
			'lnr-gift'                 => '<span class="lnr lnr-gift"></span> <span>gift</span>',
			'lnr-diamond'              => '<span class="lnr lnr-diamond"></span> <span>diamond</span>',
			'lnr-linearicons'          => '<span class="lnr lnr-linearicons"></span> <span>linearicons</span>',
			'lnr-dinner'               => '<span class="lnr lnr-dinner"></span> <span>dinner</span>',
			'lnr-coffee-cup'           => '<span class="lnr lnr-coffee-cup"></span> <span>coffee-cup</span>',
			'lnr-leaf'                 => '<span class="lnr lnr-leaf"></span> <span>leaf</span>',
			'lnr-paw'                  => '<span class="lnr lnr-paw"></span> <span>paw</span>',
			'lnr-rocket'               => '<span class="lnr lnr-rocket"></span> <span>rocket</span>',
			'lnr-briefcase'            => '<span class="lnr lnr-briefcase"></span> <span>briefcase</span>',
			'lnr-bus'                  => '<span class="lnr lnr-bus"></span> <span>bus</span>',
			'lnr-car'                  => '<span class="lnr lnr-car"></span> <span>car</span>',
			'lnr-train'                => '<span class="lnr lnr-train"></span> <span>train</span>',
			'lnr-bicycle'              => '<span class="lnr lnr-bicycle"></span> <span>bicycle</span>',
			'lnr-wheelchair'           => '<span class="lnr lnr-wheelchair"></span> <span>wheelchair</span>',
			'lnr-select'               => '<span class="lnr lnr-select"></span> <span>select</span>',
			'lnr-earth'                => '<span class="lnr lnr-earth"></span> <span>earth</span>',
			'lnr-smile'                => '<span class="lnr lnr-smile"></span> <span>smile</span>',
			'lnr-sad'                  => '<span class="lnr lnr-sad"></span> <span>sad</span>',
			'lnr-neutral'              => '<span class="lnr lnr-neutral"></span> <span>neutral</span>',
			'lnr-mustache'             => '<span class="lnr lnr-mustache"></span> <span>mustache</span>',
			'lnr-alarm'                => '<span class="lnr lnr-alarm"></span> <span>alarm</span>',
			'lnr-bullhorn'             => '<span class="lnr lnr-bullhorn"></span> <span>bullhorn</span>',
			'lnr-volume-high'          => '<span class="lnr lnr-volume-high"></span> <span>volume-high</span>',
			'lnr-volume-medium'        => '<span class="lnr lnr-volume-medium"></span> <span>volume-medium</span>',
			'lnr-volume-low'           => '<span class="lnr lnr-volume-low"></span> <span>volume-low</span>',
			'lnr-volume'               => '<span class="lnr lnr-volume"></span> <span>volume</span>',
			'lnr-mic'                  => '<span class="lnr lnr-mic"></span> <span>mic</span>',
			'lnr-hourglass'            => '<span class="lnr lnr-hourglass"></span> <span>hourglass</span>',
			'lnr-undo'                 => '<span class="lnr lnr-undo"></span> <span>undo</span>',
			'lnr-redo'                 => '<span class="lnr lnr-redo"></span> <span>redo</span>',
			'lnr-sync'                 => '<span class="lnr lnr-sync"></span> <span>sync</span>',
			'lnr-history'              => '<span class="lnr lnr-history"></span> <span>history</span>',
			'lnr-clock'                => '<span class="lnr lnr-clock"></span> <span>clock</span>',
			'lnr-download'             => '<span class="lnr lnr-download"></span> <span>download</span>',
			'lnr-upload'               => '<span class="lnr lnr-upload"></span> <span>upload</span>',
			'lnr-enter-down'           => '<span class="lnr lnr-enter-down"></span> <span>enter-down</span>',
			'lnr-exit-up'              => '<span class="lnr lnr-exit-up"></span> <span>exit-up</span>',
			'lnr-bug'                  => '<span class="lnr lnr-bug"></span> <span>bug</span>',
			'lnr-code'                 => '<span class="lnr lnr-code"></span> <span>code</span>',
			'lnr-link'                 => '<span class="lnr lnr-link"></span> <span>link</span>',
			'lnr-unlink'               => '<span class="lnr lnr-unlink"></span> <span>unlink</span>',
			'lnr-thumbs-up'            => '<span class="lnr lnr-thumbs-up"></span> <span>thumbs-up</span>',
			'lnr-thumbs-down'          => '<span class="lnr lnr-thumbs-down"></span> <span>thumbs-down</span>',
			'lnr-magnifier'            => '<span class="lnr lnr-magnifier"></span> <span>magnifier</span>',
			'lnr-cross'                => '<span class="lnr lnr-cross"></span> <span>cross</span>',
			'lnr-menu'                 => '<span class="lnr lnr-menu"></span> <span>menu</span>',
			'lnr-list'                 => '<span class="lnr lnr-list"></span> <span>list</span>',
			'lnr-chevron-up'           => '<span class="lnr lnr-chevron-up"></span> <span>chevron-up</span>',
			'lnr-chevron-down'         => '<span class="lnr lnr-chevron-down"></span> <span>chevron-down</span>',
			'lnr-chevron-left'         => '<span class="lnr lnr-chevron-left"></span> <span>chevron-left</span>',
			'lnr-chevron-right'        => '<span class="lnr lnr-chevron-right"></span> <span>chevron-right</span>',
			'lnr-arrow-up'             => '<span class="lnr lnr-arrow-up"></span> <span>arrow-up</span>',
			'lnr-arrow-down'           => '<span class="lnr lnr-arrow-down"></span> <span>arrow-down</span>',
			'lnr-arrow-left'           => '<span class="lnr lnr-arrow-left"></span> <span>arrow-left</span>',
			'lnr-arrow-right'          => '<span class="lnr lnr-arrow-right"></span> <span>arrow-right</span>',
			'lnr-move'                 => '<span class="lnr lnr-move"></span> <span>move</span>',
			'lnr-warning'              => '<span class="lnr lnr-warning"></span> <span>warning</span>',
			'lnr-question-circle'      => '<span class="lnr lnr-question-circle"></span> <span>question-circle</span>',
			'lnr-menu-circle'          => '<span class="lnr lnr-menu-circle"></span> <span>menu-circle</span>',
			'lnr-checkmark-circle'     => '<span class="lnr lnr-checkmark-circle"></span> <span>checkmark-circle</span>',
			'lnr-cross-circle'         => '<span class="lnr lnr-cross-circle"></span> <span>cross-circle</span>',
			'lnr-plus-circle'          => '<span class="lnr lnr-plus-circle"></span> <span>plus-circle</span>',
			'lnr-circle-minus'         => '<span class="lnr lnr-circle-minus"></span> <span>circle-minus</span>',
			'lnr-arrow-up-circle'      => '<span class="lnr lnr-arrow-up-circle"></span> <span>arrow-up-circle</span>',
			'lnr-arrow-down-circle'    => '<span class="lnr lnr-arrow-down-circle"></span> <span>arrow-down-circle</span>',
			'lnr-arrow-left-circle'    => '<span class="lnr lnr-arrow-left-circle"></span> <span>arrow-left-circle</span>',
			'lnr-arrow-right-circle'   => '<span class="lnr lnr-arrow-right-circle"></span> <span>arrow-right-circle</span>',
			'lnr-chevron-up-circle'    => '<span class="lnr lnr-chevron-up-circle"></span> <span>chevron-up-circle</span>',
			'lnr-chevron-down-circle'  => '<span class="lnr lnr-chevron-down-circle"></span> <span>chevron-down-circle</span>',
			'lnr-chevron-left-circle'  => '<span class="lnr lnr-chevron-left-circle"></span> <span>chevron-left-circle</span>',
			'lnr-chevron-right-circle' => '<span class="lnr lnr-chevron-right-circle"></span> <span>chevron-right-circle</span>',
			'lnr-crop'                 => '<span class="lnr lnr-crop"></span> <span>crop</span>',
			'lnr-frame-expand'         => '<span class="lnr lnr-frame-expand"></span> <span>frame-expand</span>',
			'lnr-frame-contract'       => '<span class="lnr lnr-frame-contract"></span> <span>frame-contract</span>',
			'lnr-layers'               => '<span class="lnr lnr-layers"></span> <span>layers</span>',
			'lnr-funnel'               => '<span class="lnr lnr-funnel"></span> <span>funnel</span>',
			'lnr-text-format'          => '<span class="lnr lnr-text-format"></span> <span>text-format</span>',
			'lnr-text-format-remove'   => '<span class="lnr lnr-text-format-remove"></span> <span>text-format-remove</span>',
			'lnr-text-size'            => '<span class="lnr lnr-text-size"></span> <span>text-size</span>',
			'lnr-bold'                 => '<span class="lnr lnr-bold"></span> <span>bold</span>',
			'lnr-italic'               => '<span class="lnr lnr-italic"></span> <span>italic</span>',
			'lnr-underline'            => '<span class="lnr lnr-underline"></span> <span>underline</span>',
			'lnr-strikethrough'        => '<span class="lnr lnr-strikethrough"></span> <span>strikethrough</span>',
			'lnr-highlight'            => '<span class="lnr lnr-highlight"></span> <span>highlight</span>',
			'lnr-text-align-left'      => '<span class="lnr lnr-text-align-left"></span> <span>text-align-left</span>',
			'lnr-text-align-center'    => '<span class="lnr lnr-text-align-center"></span> <span>text-align-center</span>',
			'lnr-text-align-right'     => '<span class="lnr lnr-text-align-right"></span> <span>text-align-right</span>',
			'lnr-text-align-justify'   => '<span class="lnr lnr-text-align-justify"></span> <span>text-align-justify</span>',
			'lnr-line-spacing'         => '<span class="lnr lnr-line-spacing"></span> <span>line-spacing</span>',
			'lnr-indent-increase'      => '<span class="lnr lnr-indent-increase"></span> <span>indent-increase</span>',
			'lnr-indent-decrease'      => '<span class="lnr lnr-indent-decrease"></span> <span>indent-decrease</span>',
			'lnr-pilcrow'              => '<span class="lnr lnr-pilcrow"></span> <span>pilcrow</span>',
			'lnr-direction-ltr'        => '<span class="lnr lnr-direction-ltr"></span> <span>direction-ltr</span>',
			'lnr-direction-rtl'        => '<span class="lnr lnr-direction-rtl"></span> <span>direction-rtl</span>',
			'lnr-page-break'           => '<span class="lnr lnr-page-break"></span> <span>page-break</span>',
			'lnr-sort-alpha-asc'       => '<span class="lnr lnr-sort-alpha-asc"></span> <span>sort-alpha-asc</span>',
			'lnr-sort-amount-asc'      => '<span class="lnr lnr-sort-amount-asc"></span> <span>sort-amount-asc</span>',
			'lnr-hand'                 => '<span class="lnr lnr-hand"></span> <span>hand</span>',
			'lnr-pointer-up'           => '<span class="lnr lnr-pointer-up"></span> <span>pointer-up</span>',
			'lnr-pointer-right'        => '<span class="lnr lnr-pointer-right"></span> <span>pointer-right</span>',
			'lnr-pointer-down'         => '<span class="lnr lnr-pointer-down"></span> <span>pointer-down</span>',
			'lnr-pointer-left'         => '<span class="lnr lnr-pointer-left"></span> <span>pointer-left</span>',
		);

		return $icons;
	}
endif;


if ( ! function_exists( 'yith_proteo_adjust_brightness' ) ) :
	/**
	 * Increases or decreases the brightness of a color by a percentage of the current brightness.
	 *
	 * @param string $hex_code Supported formats: `#FFF`, `#FFFFFF`, `FFF`, `FFFFFF`.
	 * @param float  $adjust_percent A number between -1 and 1. E.g. 0.3 = 30% lighter; -0.4 = 40% darker.
	 *
	 * @return  string
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_adjust_brightness( $hex_code, $adjust_percent ) {
		$hex_code = ltrim( $hex_code, '#' );

		if ( strlen( $hex_code ) === 3 ) {
			$hex_code = $hex_code[0] . $hex_code[0] . $hex_code[1] . $hex_code[1] . $hex_code[2] . $hex_code[2];
		}

		$hex_code = array_map( 'hexdec', str_split( $hex_code, 2 ) );

		foreach ( $hex_code as & $color ) {
			$adjustable_limit = $adjust_percent < 0 ? $color : 255 - $color;
			$adjust_amount    = ceil( $adjustable_limit * $adjust_percent );

			$color = str_pad( dechex( $color + $adjust_amount ), 2, '0', STR_PAD_LEFT );
		}

		return '#' . implode( $hex_code );
	}
endif;

if ( ! function_exists( 'yith_proteo_get_user_username' ) ) {
	/**
	 * Get current user display name
	 *
	 * @return string
	 */
	function yith_proteo_get_user_username() {
		$current_user = wp_get_current_user();
		$username     = ( isset( $current_user->billing_first_name ) && '' !== $current_user->billing_first_name ) ? $current_user->billing_first_name : $current_user->display_name;

		return $username;
	}
}

if ( class_exists( 'RevSlider' ) && ! function_exists( 'yith_proteo_get_all_revolution_slider_alias' ) ) {
	/**
	 * Retrieve list of all registered Revolution Sliders
	 *
	 * @return array
	 */
	function yith_proteo_get_all_revolution_slider_alias() {
		$rev_sliders     = new RevSlider();
		$rev_sliders_obj = $rev_sliders->get_sliders();
		return wp_list_pluck( $rev_sliders_obj, 'alias' );
	}
}

if ( ! function_exists( 'yith_proteo_show_site_title_default_value' ) ) {
	/**
	 * Calculate default value for show site title option
	 *
	 * @return string
	 */
	function yith_proteo_show_site_title_default_value() {
		$old_option_value = get_theme_mod( 'yith_proteo_display_header_text', 'yes' );
		$has_logo_image   = has_custom_logo();
		if ( ! $has_logo_image && 'yes' === $old_option_value ) {
			return 'yes';
		} else {
			return 'no';
		}
	}
}


if ( ! function_exists( 'yith_proteo_theme_version_upgrade_1' ) ) {

	/**
	 * Perform action on version upgrade.
	 *
	 * @return void
	 */
	function yith_proteo_theme_version_upgrade_1() {
		$last_saved_version = get_option( 'yith_proteo_version' );
		$front_page_id      = get_option( 'page_on_front' );
		$blog_page_id       = get_option( 'page_for_posts' );

		if ( ! $last_saved_version || version_compare( '1.5.1.8', $last_saved_version, '>' ) ) {
			if ( $front_page_id ) {
				update_post_meta( $front_page_id, '_editorskit_title_hidden', 1 );
				update_post_meta( $front_page_id, 'yith_proteo_hide_page_title', 'on' );
			}
			if ( $blog_page_id ) {
				update_post_meta( $blog_page_id, '_editorskit_title_hidden', 1 );
				update_post_meta( $blog_page_id, 'yith_proteo_hide_page_title', 'on' );
			}
			update_option( 'yith_proteo_version', YITH_PROTEO_VERSION );
		}
	}
}

add_action( 'init', 'yith_proteo_theme_version_upgrade_1' );

if ( ! function_exists( 'yith_proteo_init_filesystem' ) ) {
	/**
	 * Init the filesystem
	 */
	function yith_proteo_init_filesystem() {

		$credentials = array();

		if ( ! defined( 'FS_METHOD' ) ) {
			define( 'FS_METHOD', 'direct' );
		}

		$method = defined( 'FS_METHOD' ) ? FS_METHOD : false;

		if ( 'ftpext' === $method ) {
			// If defined, set it to that, Else, set to NULL.
			$credentials['hostname'] = defined( 'FTP_HOST' ) ? preg_replace( '|\w+://|', '', FTP_HOST ) : null;
			$credentials['username'] = defined( 'FTP_USER' ) ? FTP_USER : null;
			$credentials['password'] = defined( 'FTP_PASS' ) ? FTP_PASS : null;

			// Set FTP port.
			if ( strpos( $credentials['hostname'], ':' ) && null !== $credentials['hostname'] ) {
				list( $credentials['hostname'], $credentials['port'] ) = explode( ':', $credentials['hostname'], 2 );
				if ( ! is_numeric( $credentials['port'] ) ) {
					unset( $credentials['port'] );
				}
			} else {
				unset( $credentials['port'] );
			}

			// Set connection type.
			if ( ( defined( 'FTP_SSL' ) && FTP_SSL ) && 'ftpext' === $method ) {
				$credentials['connection_type'] = 'ftps';
			} elseif ( ! array_filter( $credentials ) ) {
				$credentials['connection_type'] = null;
			} else {
				$credentials['connection_type'] = 'ftp';
			}
		}

		// The WordPress filesystem.
		global $wp_filesystem;

		if ( empty( $wp_filesystem ) ) {
			require_once wp_normalize_path( ABSPATH . '/wp-admin/includes/file.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			WP_Filesystem( $credentials );
		}

		return $wp_filesystem;
	}
}
