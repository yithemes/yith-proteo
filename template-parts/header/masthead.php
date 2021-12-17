<?php
/**
 * Mastehead template part.
 *
 * @package yith-proteo
 */

global $post;
// hide site header if meta value enabled.
if ( function_exists( 'wc' ) && is_shop() ) {
	$hide_header = get_post_meta( wc_get_page_id( 'shop' ), 'yith_proteo_remove_header_and_footer', true );
} elseif ( is_home() ) {
	$hide_header = get_post_meta( get_option( 'page_for_posts' ), 'yith_proteo_remove_header_and_footer', true );
} else {
	$hide_header = $post ? get_post_meta( $post->ID, 'yith_proteo_remove_header_and_footer', true ) : 'off';
}
$slider = '';
if ( defined( 'YITH_SLIDER_FOR_PAGE_BUILDERS' ) ) {
	if ( function_exists( 'wc' ) && is_shop() ) {
		$slider = get_post_meta( wc_get_page_id( 'shop' ), 'header_slider', true );
	} elseif ( is_home() ) {
		$slider = get_post_meta( get_option( 'page_for_posts' ), 'header_slider', true );
	} elseif ( $post ) {
		$slider = get_post_meta( $post->ID, 'header_slider', true );
	}
}
if ( 'on' !== $hide_header ) {
	?>
	<header id="masthead"
			class="site-header <?php echo esc_attr( get_theme_mod( 'yith_proteo_header_layout', 'left_logo_navigation_inline' ) ); ?> <?php echo esc_attr( get_theme_mod( 'yith_proteo_header_fullwidth', 'no' ) === 'yes' ? 'fullwidth-header' : '' ); ?> <?php echo esc_attr( $slider && '' !== $slider ? 'with-header-slider' : '' ); ?>" <?php yith_proteo_custom_header_style(); ?>>
		<?php
		if ( get_theme_mod( 'yith_proteo_topbar_enable', 'no' ) === 'yes' ) {
			get_template_part( 'template-parts/header/topbar' );
		}
		?>
		<div class="container header-contents <?php echo esc_attr( get_theme_mod( 'yith_proteo_mobile_menu_opener_position', 'right' ) === 'left' ? 'left-toggle' : 'right-toggle' ); ?>">
			<?php if ( yith_proteo_display_header_text() ) { ?>
				<?php get_template_part( 'template-parts/header/site-branding' ); ?>
			<?php } ?>
			<?php get_template_part( 'template-parts/header/site-nav' ); ?>
			<?php get_template_part( 'template-parts/header/header-sidebar' ); ?>
		</div>
	</header><!-- #masthead -->
	<?php
}
/**
 * Print header slider if any.
 */
if ( class_exists( 'RevSliderSlider' ) && $slider && '' !== $slider && in_array( $slider, yith_proteo_get_all_revolution_slider_alias(), true ) ) {
	echo do_shortcode( '[rev_slider alias="' . $slider . '"][/rev_slider]' );
} elseif ( defined( 'YITH_SLIDER_FOR_PAGE_BUILDERS' ) ) {
	if ( $slider && '' !== $slider ) {
		echo do_shortcode( '[yith-slider slider="' . $slider . '"]' );
	}
}
