<?php

/**
 * Extend Recent Comments Widget
 *
 * Adds different formatting to the default WordPress Recent Comments Widget
 */
class YITH_Proteo_Recent_Comments_Widget extends WP_Widget_Recent_Comments {

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$output = '';

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments', 'yith-proteo' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}

		/**
		 * Filters the arguments for the Recent Comments widget.
		 *
		 * @param array $comment_args An array of arguments used to retrieve the recent comments.
		 * @param array $instance Array of settings for the current widget.
		 *
		 * @see WP_Comment_Query::query() for information on accepted arguments.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 */
		$comments = get_comments(
			apply_filters(
				'widget_comments_args',
				array(
					'number'      => $number,
					'status'      => 'approve',
					'post_status' => 'publish',
				),
				$instance
			)
		);

		$output .= $args['before_widget'];
		if ( $title ) {
			$output .= $args['before_title'] . $title . $args['after_title'];
		}

		$output .= '<ul id="recentcomments">';
		if ( is_array( $comments ) && $comments ) {
			// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
			$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

			foreach ( (array) $comments as $comment ) {
				$output .= '<li class="recentcomments">';
				$output .= '<div class="comment-excerpt">' . get_comment_excerpt( $comment ) . '</div>';
				$output .= '<div class="comment-meta">';
				$output .= sprintf(
					/* translators: comments widget: 1: comment author, 2: post link */
					_x( '%1$s on %2$s', 'widgets', 'yith-proteo' ),
					'<span class="comment-author-link">' . get_comment_author_link( $comment ) . '</span>',
					'<a href="' . esc_url( get_comment_link( $comment ) ) . '">' . get_the_title( $comment->comment_post_ID ) . '</a>'
				);
				$output .= '</div>';
				$output .= '</li>';
			}
		}
		$output .= '</ul>';
		$output .= $args['after_widget'];

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
