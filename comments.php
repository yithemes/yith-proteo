<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yith-proteo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$yith_proteo_comment_count = get_comments_number();
			if ( '1' === $yith_proteo_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'yith-proteo' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				echo esc_html(
					sprintf(
						/* translators: 1: comment count number, 2: title. */
						_nx( '%1$s comment', '%1$s comments', $yith_proteo_comment_count, 'comments title', 'yith-proteo' ),
						number_format_i18n( $yith_proteo_comment_count )
					)
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'walker'      => new YITH_Proteo_Walker_Comment(),
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 64,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'yith-proteo' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
