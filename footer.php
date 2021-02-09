<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the .container and #content divs and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yith-proteo
 */

global $post;
?>
<?php echo yith_proteo_get_sidebar_position() ? '</div>' : ''; ?>
</div><!-- .container -->
</div><!-- #content -->
</div><!-- #page -->

<?php
// hide site footer if meta value enabled.
if ( function_exists( 'wc' ) && is_shop() ) {
	$hide_footer = get_post_meta( wc_get_page_id( 'shop' ), 'yith_proteo_remove_header_and_footer', true );
} elseif ( is_home() ) {
	$hide_footer = get_post_meta( get_option( 'page_for_posts' ), 'yith_proteo_remove_header_and_footer', true );
} else {
	$hide_footer = $post ? get_post_meta( $post->ID, 'yith_proteo_remove_header_and_footer', true ) : 'off';
}

if ( 'on' !== $hide_footer ) :
	?>
	<footer id="main-footer" class="site-footer">
		<div class="container footer-sidebars <?php echo ( ( 'yes' === get_theme_mod( 'yith_proteo_footer_sidebars_side_by_side', 'no' ) ) ) ? 'side-by-side-sidebars' : ''; ?>"><?php if ( 'yes' === get_theme_mod( 'yith_proteo_footer_sidebar_1_enable', 'yes' ) ) : ?>
			<div class="footer-sidebar-1">
				<div class="row"><?php dynamic_sidebar( 'footer-sidebar-1' ); ?></div>
			</div>
			<?php endif; ?><?php if ( 'yes' === get_theme_mod( 'yith_proteo_footer_sidebar_2_enable', 'yes' ) ) : ?>
			<div class="footer-sidebar-2">
				<div class="row"><?php dynamic_sidebar( 'footer-sidebar-2' ); ?></div>
			</div>
			<?php endif; ?></div>
		<div class="site-info">
			<div class="container">
				<?php
				echo do_shortcode( get_theme_mod( 'yith_proteo_footer_credits_content', __( '<a href="https://proteo.yithemes.com/" target="_blank" rel="noopener">Proteo</a> - A free theme designed with <span class="lnr lnr-heart"></span> by <a href="https://yithemes.com" rel="nofollow">YITH</a>', 'yith-proteo' ) ) );
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
