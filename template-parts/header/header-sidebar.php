<?php
/**
 * Header sidebar template part.
 *
 * @package yith-proteo
 */

?>
<div class="header-sidebar">
	<?php
	if ( get_theme_mod( 'yith_proteo_header_search_widget', 'no' ) === 'yes' ) {
		the_widget(
			'WP_Widget_Search',
			array(),
			array(
				'before_widget' => '<section class="widget %1$s ' . ( get_theme_mod( 'yith_proteo_mobile_search_widget', 'no' ) === 'no' ? 'hidden-xs' : '' ) . '">',
				'after_widget'  => '</section>',
			)
		);
	}
	?>
	<?php
	if ( get_theme_mod( 'yith_proteo_header_account_widget', 'no' ) === 'yes' ) {
		the_widget(
			'YITH_Proteo_Account_Widget',
			array(
				'custom-icon'   => get_template_directory_uri() . '/img/user.svg',
				'login-url'     => wp_login_url(),
				'myaccount-url' => get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ? get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) : get_home_url( null, '/my-account/' ),
			),
			array(
				'before_widget' => '<section class="widget %1$s ' . ( get_theme_mod( 'yith_proteo_mobile_account_widget', 'no' ) === 'no' ? 'hidden-xs' : '' ) . '">',
				'after_widget'  => '</section>',
			)
		);
	}
	?>
	<?php
	if ( class_exists( 'woocommerce' ) && get_theme_mod( 'yith_proteo_header_cart_widget', 'no' ) === 'yes' ) {
		the_widget(
			'WC_Widget_Cart',
			array(
				'title' => '',
			),
			array(
				'before_widget' => '<section class="widget %1$s ' . ( get_theme_mod( 'yith_proteo_mobile_cart_widget', 'no' ) === 'no' ? 'hidden-xs' : '' ) . '">',
				'after_widget'  => '</section>',
			)
		);
	}
	?>
<?php if ( 'yes' === get_theme_mod( 'yith_proteo_show_header_sidebar', 'yes' ) ) { ?>
	<?php dynamic_sidebar( 'header-sidebar' ); ?>
<?php } ?>
</div>
