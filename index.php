<?php
/**
 * The main template file
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

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

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

					the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

				endif;
					?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( $sidebar_show ) {
	get_sidebar();
}
get_footer();
