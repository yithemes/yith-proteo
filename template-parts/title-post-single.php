<?php
/**
 * The template for displaying single posts title
 *
 * @package yith-proteo
 */

$post_layout         = get_theme_mod( 'yith_proteo_single_post_layout', 'standard' );
$post_thumbnail_url  = get_the_post_thumbnail_url( $post->ID, 'full' );
$post_has_thumbnails = has_post_thumbnail( $post->ID );

if ( 'standard' === $post_layout || 'fullwidth_cover_image' === $post_layout ) : ?>
	<header class="entry-header">
		<div class="date-and-thumbnail <?php echo $post_has_thumbnails ? esc_attr( 'post-has-thumbnail' ) : ''; ?>">
			<?php
			if ( 'post' === get_post_type() && ( 'fullwidth_cover_image' !== $post_layout ) && ( 'yes' === get_theme_mod( 'yith_proteo_blog_date_on_image_enable', 'yes' ) ) ) :
				?>
				<div class="entry-meta">
					<?php
					$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
					if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
						$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
					}

					$time_string = sprintf(
						$time_string,
						esc_attr( get_the_date( DATE_W3C ) ),
						esc_html( get_the_date() ),
						esc_attr( get_the_modified_date( DATE_W3C ) ),
						esc_html( get_the_modified_date() )
					);

					echo $time_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			<?php
			if ( 'fullwidth_cover_image' === $post_layout ) {
				echo '<div class="post-thumbnail">';
				the_post_thumbnail( 'proteo_blog_cropped_cover_image_' . get_theme_mod( 'yith_proteo_single_post_fullwidth_cover_cropping_custom_height', 400 ) );
				echo '</div>';
			} else {
				yith_proteo_post_thumbnail();
			}
			?>
		</div>

		<?php
			yith_proteo_print_page_titles();
		?>

		<div class="entry-meta">
			<?php
			yith_proteo_posted_by();
			yith_proteo_posted_on();

			if ( 'post' === get_post_type() && ( 'yes' === get_theme_mod( 'yith_proteo_blog_show_post_categories_and_tags', 'yes' ) ) ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'yith-proteo' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . esc_html__( 'Categories: %1$s', 'yith-proteo' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'yith-proteo' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'yith-proteo' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}

			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'yith-proteo' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				echo '</span>';
			}
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
<?php elseif ( 'background_picture' === $post_layout ) : ?>
	<header class="alignfull entry-header" style="background-image: url(<?php echo esc_url( $post_thumbnail_url ); ?>)">
		<div class="single-post-header-content">
			<div class="container">
			<?php
				yith_proteo_print_page_titles();
			?>
			<div class="entry-meta">
			<?php
			yith_proteo_posted_by();
			yith_proteo_posted_on();

			if ( 'post' === get_post_type() && ( 'yes' === get_theme_mod( 'yith_proteo_blog_show_post_categories_and_tags', 'yes' ) ) ) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'yith-proteo' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					printf( '<span class="cat-links">' . esc_html__( 'Categories: %1$s', 'yith-proteo' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'yith-proteo' ) );
				if ( $tags_list ) {
					/* translators: 1: list of tags. */
					printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'yith-proteo' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}

			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
							/* translators: %s: post title */
							__( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'yith-proteo' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				echo '</span>';
			}
			?>
		</div><!-- .entry-meta -->
			</div>
		</div>

	</header>
<?php endif; ?>
