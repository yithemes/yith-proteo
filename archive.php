<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yith-proteo
 */

$sidebar_display = yith_proteo_get_sidebar_position();
$sidebar_show    = yith_proteo_get_sidebar_position( 'sidebar-show' );

get_header();
?>

	<div id="primary" class="content-area <?php echo esc_attr( $sidebar_display ); ?>">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;

				$pagination_args = array(
					'mid_size'  => 1,
					'prev_text' => '‹',
					'next_text' => '›',
				);
                $paginate_links = paginate_links( $pagination_args );

                if( isset( $paginate_links ) && '' !== $paginate_links ):
				    echo '<div class="navigation posts-navigation">' . wp_kses_post( $paginate_links ) . '</div>';
                endif;

				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( $sidebar_show ) {
	get_sidebar();
}
get_footer();
