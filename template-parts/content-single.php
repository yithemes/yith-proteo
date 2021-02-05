<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yith-proteo
 */

// get page/post title layout.
$yith_proteo_page_title_layout = get_theme_mod( 'yith_proteo_page_title_layout', 'inside' );
// get single post layout.
$yith_proteo_single_post_layout = get_theme_mod( 'yith_proteo_single_post_layout', 'standard' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'proteo_post_layout_' . $yith_proteo_single_post_layout ); ?>>
	<?php
	if ( ( 'inside' === $yith_proteo_page_title_layout && 'standard' === $yith_proteo_single_post_layout ) ) {
		get_template_part( 'template-parts/title', 'post-single' );
	}
	?>
	<div class="entry-content">
		<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'yith-proteo' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			if ( 'yes' === get_theme_mod( 'yith_proteo_blog_show_post_navigation', 'yes' ) ) {
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yith-proteo' ),
						'after'  => '</div>',
					)
				);
			}
			?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php yith_proteo_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
