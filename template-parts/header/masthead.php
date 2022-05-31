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

// Get header slider to use if any.
$slider = yith_proteo_get_header_slider();

$yith_proteo_header_classes = array();

if ( 'on' !== $hide_header ) {
	?>
	<header id="masthead" class="site-header <?php echo esc_attr( yith_proteo_get_header_classes() ); ?>" <?php yith_proteo_custom_header_style(); ?>>
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
			<?php
			if ( 'center_logo_navigation_below' === get_theme_mod( 'yith_proteo_header_layout', 'left_logo_navigation_inline' ) ) {
				get_template_part( 'template-parts/header/header-sidebar-left' );
			}
			?>
			<?php get_template_part( 'template-parts/header/header-sidebar' ); ?>
		</div>
		<?php
		if ( 'image' === get_theme_mod( 'yith_proteo_header_bottom_separator_style', 'none' ) && get_theme_mod( 'yith_proteo_header_bottom_image' ) ) {
			?>
			<div class="header-bottom-image alignfull">
				<img src="<?php echo esc_url( get_theme_mod( 'yith_proteo_header_bottom_image' ) ); ?>" loading="lazy" class="align<?php echo esc_attr( get_theme_mod( 'yith_proteo_header_bottom_image_alignment', 'center' ) ); ?>" alt="<?php esc_attr_e( 'Header separator image', 'yith-proteo' ); ?>">
			</div>
			<?php
		}
		?>
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
