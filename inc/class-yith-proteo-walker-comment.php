<?php
/**
 * Extends Walker_Comment class
 *
 * @package yith-proteo
 */

/**
 * Class YITH_Proteo_Walker_Comment
 */
class YITH_Proteo_Walker_Comment extends Walker_Comment {

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth Depth of the current comment.
	 * @param array      $args An array of arguments.
	 *
	 * @see wp_list_comments()
	 */
	protected function html5_comment( $comment, $depth, $args ) {

		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

		?>
		<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->


			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
					$comment_author_link = get_comment_author_link( $comment );
					$comment_author_url  = get_comment_author_url( $comment );
					$comment_author      = get_comment_author( $comment );
					$avatar              = get_avatar( $comment, $args['avatar_size'] );
					if ( 0 !== $args['avatar_size'] ) {
						if ( empty( $comment_author_url ) ) {
							echo $avatar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						} else {
							printf( '<a href="%s" rel="external nofollow" class="url">', esc_url( $comment_author_url ) );
							echo $avatar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
					}
					if ( ! empty( $comment_author_url ) ) {
						echo '</a>';
					}
					?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
								'before'    => '<div class="comment-reply">',
								'after'     => '</div>',
							)
						)
					);
					?>
					<?php
					printf(
						wp_kses(
							/* translators: %s: comment author link */
							__( '%s <span class="screen-reader-text says">says:</span>', 'yith-proteo' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						'<b class="fn">' . get_comment_author_link( $comment ) . '</b>'
					);
					?>
					<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
						<?php
						/* translators: 1: comment date, 2: comment time */
						$comment_timestamp = sprintf( __( '%1$s at %2$s', 'yith-proteo' ), get_comment_date( '', $comment ), get_comment_time() );
						?>
						<time datetime="<?php comment_time( 'c' ); ?>" title="<?php echo esc_attr( $comment_timestamp ); ?>">
							<?php echo esc_html( $comment_timestamp ); ?>
						</time>
					</a>
					<?php
					edit_comment_link( esc_html_x( '(Edit)', 'Edit comment link', 'yith-proteo' ), '&nbsp;&nbsp;', '' );
					?>
				</div><!-- .comment-metadata -->

				<?php if ( 0 === $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'yith-proteo' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->


		</article><!-- .comment-body -->
		<?php
	}
}
