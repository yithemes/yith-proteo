<?php
/**
 * The template for displaying all pages
 *
 * @package yith-proteo
 */

$sidebar_display = yith_proteo_get_sidebar_position();
$sidebar_show    = yith_proteo_get_sidebar_position( 'sidebar-show' );

get_header();
?>
	<div id="primary" class="content-area <?php echo esc_attr( $sidebar_display ); ?>">
		<main id="main" class="site-main">

			<?php
			if ( function_exists( 'wc_print_notices' ) ) {
				wc_print_notices();
			}
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( $sidebar_show ) {
	get_sidebar();
}
get_footer();
