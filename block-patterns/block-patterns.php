<?php
/**
 * A file containing and registering block patterns
 *
 * @package yith-proteo
 */

if ( ! function_exists( 'yith_proteo_register_block_patterns' ) ) {
	/**
	 * Register block patterns
	 */
	function yith_proteo_register_block_patterns() {

		register_block_pattern(
			'yith-proteo/1-3-2-3-image-banner',
			array(
				'title'       => esc_html__( '1/3 2/3 Image banner', 'yith-proteo' ),
				'description' => esc_html_x( 'Two cover blocks configured in 2 columns of equel height.', 'Block pattern description', 'yith-proteo' ),
				'content'     => "<!-- wp:columns {\"className\":\"has-2-columns\"} -->\n<div class=\"wp-block-columns has-2-columns\"><!-- wp:column {\"width\":\"34%\",\"className\":\"animate-fade-right\",\"editorskit\":{\"devices\":false,\"desktop\":true,\"tablet\":true,\"mobile\":true,\"loggedin\":true,\"loggedout\":true,\"acf_visibility\":\"\",\"acf_field\":\"\",\"acf_condition\":\"\",\"acf_value\":\"\",\"migrated\":false,\"unit_test\":false}} -->\n<div class=\"wp-block-column animate-fade-right\" style=\"flex-basis:34%\"><!-- wp:cover {\"url\":\"http://proteo.test/classic-shop/wp-content/uploads/sites/2/2019/08/glass@2x.png\",\"id\":2952,\"dimRatio\":100,\"customOverlayColor\":\"#f0f0f0\"} -->\n<div class=\"wp-block-cover has-background-dim-100 has-background-dim\" style=\"background-image:url(http://proteo.test/classic-shop/wp-content/uploads/sites/2/2019/08/glass@2x.png);background-color:#f0f0f0\"><div class=\"wp-block-cover__inner-container\"><!-- wp:image {\"id\":2952,\"sizeSlug\":\"large\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"http://proteo.test/classic-shop/wp-content/uploads/sites/2/2019/08/glass@2x.png\" alt=\"\" class=\"wp-image-2952\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"very-dark-gray\"} -->\n<p class=\"has-text-align-center has-very-dark-gray-color has-text-color\">DISCOVERY THE TREND OF</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"very-dark-gray\",\"style\":{\"typography\":{\"fontSize\":50}}} -->\n<p class=\"has-text-align-center has-very-dark-gray-color has-text-color\" style=\"font-size:50px\"><strong>GLASSES</strong></p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66%\",\"className\":\"animate-fade-left\",\"editorskit\":{\"devices\":false,\"desktop\":true,\"tablet\":true,\"mobile\":true,\"loggedin\":true,\"loggedout\":true,\"acf_visibility\":\"\",\"acf_field\":\"\",\"acf_condition\":\"\",\"acf_value\":\"\",\"migrated\":false,\"unit_test\":false}} -->\n<div class=\"wp-block-column animate-fade-left\" style=\"flex-basis:66%\"><!-- wp:cover {\"url\":\"http://proteo.test/classic-shop/wp-content/uploads/sites/2/2019/08/Intersection-1@2x.jpg\",\"id\":2953} -->\n<div class=\"wp-block-cover has-background-dim\" style=\"background-image:url(http://proteo.test/classic-shop/wp-content/uploads/sites/2/2019/08/Intersection-1@2x.jpg)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":50}}} -->\n<p class=\"has-text-align-center\" style=\"font-size:50px\"><strong>SAVE 20% IN MAN CLOTHING</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":18}}} -->\n<p class=\"has-text-align-center\" style=\"font-size:18px\">Enjoy a special -20% discount on man category</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'categories'  => array( 'proteo-classic-shop' ),
			)
		);

	}
}

add_action( 'init', 'yith_proteo_register_block_patterns' );

if ( ! function_exists( 'yith_proteo_register_block_patterns_categories' ) ) {
	/**
	 * Register block pattern categories to group patterns
	 *
	 * @return void
	 */
	function yith_proteo_register_block_patterns_categories() {
		register_block_pattern_category(
			'proteo-classic-shop',
			array( 'label' => __( 'Proteo Classic Shop', 'yith-proteo' ) )
		);
	}
}

add_action( 'init', 'yith_proteo_register_block_patterns_categories' );
