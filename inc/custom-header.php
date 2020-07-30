<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package yith-proteo
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses yith_proteo_header_style()
 */
function yith_proteo_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'yith_proteo_custom_header_args',
			array(
				'default-image' => '',
				'width'         => 1920,
				'flex-width'    => true,
				'height'        => 250,
				'flex-height'   => true,
			)
		)
	);
}

add_action( 'after_setup_theme', 'yith_proteo_custom_header_setup' );
