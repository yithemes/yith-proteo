<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package yith-proteo
 */

get_header();
?>

	<section id="primary" class="content-area col-12">
		<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search results for: %s', 'yith-proteo' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

				$pagination_args = array(
					'mid_size'  => 1,
					'prev_text' => '‹',
					'next_text' => '›',
				);
				echo '<div class="navigation posts-navigation">' . wp_kses_post( paginate_links( $pagination_args ) ?? '' ) . '</div>';

				else :

					get_template_part( 'template-parts/content', 'none' );

			endif;
				?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
