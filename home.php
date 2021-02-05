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
					<div class="row">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							$post_count ++;
							the_post();

							if ( 1 === $post_count ) {
								echo '<div class="col-md-12">';
								/**
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', 'sticky' );
							} else {
								echo '<div class="col-lg-6">';
								/**
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type() );
							}

							echo '</div>';

						endwhile;

						the_posts_navigation();
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
