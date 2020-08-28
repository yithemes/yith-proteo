<?php
/**
 * Fonts functions
 *
 * @package customizer-controls
 */

define( 'YITH_PROTEO_GFONT_VERSION', '1.0.0' );

/**
 * Enqueues a Google Font
 *
 * @param string $font Font to enqueue.
 * @param string $weight Font weight to enqueue.
 *
 * @since 1.1.38
 */
function yith_proteo_font_selector_enqueue_google_font( $font, $weight ) {

	// Sanitize handle.
	$handle = trim( $font );
	$handle = strtolower( $handle );
	$handle = str_replace( ' ', '-', $handle );

	// Sanitize font name.
	$font = trim( $font );

	$base_url = '//fonts.googleapis.com/css';

	// Edit this to add more subsets.
	$subsets = apply_filters( 'font_subsets', array( 'latin' ) );
	if ( ! empty( $subsets ) ) {
		$font_subsets = array();
		foreach ( $subsets as $get_subset ) {
			$font_subsets[] = $get_subset;
		}
		$subsets = implode( ',', $font_subsets );
	}

	// Add weights to URL.
	if ( ! empty( $weight ) ) {
		$font .= ':' . $weight;
	}

	$query_args = array(
		'family' => rawurlencode( $font ),
	);
	if ( ! empty( $subsets ) ) {
		$query_args['subset'] = rawurlencode( $subsets );
	}
	$url = add_query_arg( $query_args, $base_url );

	// Enqueue style.
	wp_enqueue_style( 'yith-proteo-google-font-' . $handle, $url, array(), YITH_PROTEO_GFONT_VERSION );
}
