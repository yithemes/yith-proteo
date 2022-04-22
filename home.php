<?php
/**
 * The blog template file
 *
 * @package yith-proteo
 */

$sidebar_display = yith_proteo_get_sidebar_position();
$sidebar_show    = yith_proteo_get_sidebar_position( 'sidebar-show' );

get_header();

?>

	<div id="primary" class="content-area <?php echo esc_attr( $sidebar_display ); ?>">
		<main id="main" class="site-main">
			<div class="container">
			<?php if ( 'inside' === get_theme_mod( 'yith_proteo_page_title_layout', 'inside' ) ) : ?>
				<header class="entry-header">
					<?php
					yith_proteo_print_page_titles();
					?>
				</header><!-- .entry-header -->
			<?php endif; ?>
				<?php
				if ( have_posts() ) :

					$post_count = 0;
					?>
					<div class="blog-posts columns-<?php echo esc_attr( yith_proteo_get_blog_grid_columns() ); ?> <?php echo esc_attr( yith_proteo_show_blog_posts_with_borders() ); ?>">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							$post_count ++;
							the_post();

							if ( ( 1 === $post_count && yith_proteo_show_first_post_as_sticky() ) || ( is_sticky() && yith_proteo_show_sticky_posts_wide() ) || 1 === yith_proteo_get_blog_grid_columns() ) {
								/**
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', 'sticky' );
							} else {
								/**
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type() );
							}
						endwhile;

						$pagination_args = array(
							'mid_size'  => 1,
							'prev_text' => '‹',
							'next_text' => '›',
						);
						echo '<div class="navigation posts-navigation">' . wp_kses_post( paginate_links( $pagination_args ) ) . '</div>';
						?>
					</div>
					<?php
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
			</div><!-- .container -->
		</main><!-- #main -->
	</div>
<?php
if ( $sidebar_show ) {
	get_sidebar();
}
get_footer();
