<?php
/**
 * yith-proteo widgets
 *
 * @package yith-proteo
 */

/**
 * Extend Recent Posts Widget
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */
Class YITH_Proteo_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget( $args, $instance ) {

		extract( $args );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Posts', 'yith-proteo' ) : $instance['title'], $instance, $this->id_base );

		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) ) {
			$number = 10;
		}

		$posts = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );
		if ( $posts->have_posts() ) :

			echo $before_widget;
			if ( $title ) {
				echo $before_title . $title . $after_title;
			} ?>
            <ul>
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-image">
									<?php the_post_thumbnail( 'small' ); ?>
                                </div>
							<?php endif; ?>
                            <div class="post-info">
								<?php the_title( '<h3>', '</h3>' ); ?>
								<?php
								if ( get_comments_number() > 0 ) {
									printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments count on widget', 'yith-proteo' ), number_format_i18n( get_comments_number() ) );
								}
								?>
                            </div>
                        </a>
                    </li>
				<?php endwhile; ?>
            </ul>

			<?php
			echo $after_widget;

			wp_reset_postdata();

		endif;
	}
}

function yith_proteo_recent_post_widget_registration() {
	unregister_widget( 'WP_Widget_Recent_Posts' );
	register_widget( 'YITH_Proteo_Recent_Posts_Widget' );
}

add_action( 'widgets_init', 'yith_proteo_recent_post_widget_registration' );


/**
 * Extend Recent Comments Widget
 *
 * Adds different formatting to the default WordPress Recent Comments Widget
 */
Class YITH_Proteo_Recent_Comments_Widget extends WP_Widget_Recent_Comments {

	function widget( $args, $instance ) {
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
				/* translators: comments widget: 1: comment author, 2: post link */
				$output .= '<div class="comment-excerpt">' . get_comment_excerpt( $comment ) . '</div>';
				$output .= '<div class="comment-meta">';
				$output .= sprintf(
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

		echo $output;
	}
}

function yith_proteo_recent_comments_widget_registration() {
	unregister_widget( 'WP_Widget_Recent_Comments' );
	register_widget( 'YITH_Proteo_Recent_Comments_Widget' );
}

add_action( 'widgets_init', 'yith_proteo_recent_comments_widget_registration' );


/**
 * Social Icons widget
 */

/**
 * Adds YITH_Proteo_Social_Icons widget.
 */
class YITH_Proteo_Social_Icons extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'YITH_Proteo_Social_Icons',
			__( 'Social Networks Profiles', 'yith-proteo' ), // Name
			array( 'description' => __( 'Links to your social profiles', 'yith-proteo' ), )
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 *
	 * @see WP_Widget::widget()
	 *
	 */
	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );

		$facebook  = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
		$twitter   = isset( $instance['twitter'] ) ? $instance['twitter'] : '';
		$instagram = isset( $instance['instagram'] ) ? $instance['instagram'] : '';
		$linkedin  = isset( $instance['linkedin'] ) ? $instance['linkedin'] : '';

		// social profile link
		$facebook_profile  = '<a target="_blank" rel="nofollow" class="facebook" title="facebook" href="' . $facebook . '"><span class="icon-social-facebook"></span></a>';
		$twitter_profile   = '<a target="_blank" rel="nofollow" class="twitter" title="twitter" href="' . $twitter . '"><span class="icon-social-twitter"></span></a>';
		$instagram_profile = '<a target="_blank" rel="nofollow" class="instagram" title="instagram" href="' . $instagram . '"><span class="icon-social-instagram"></span></a>';
		$linkedin_profile  = '<a target="_blank" rel="nofollow" class="linkedin" title="linkedin" href="' . $linkedin . '"><span class="icon-social-linkedin"></span></a>';

		echo $args['before_widget'];

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		echo '<div class="yith-proteo-social-icons">';
		echo ( ! empty( $facebook ) ) ? $facebook_profile : null;
		echo ( ! empty( $twitter ) ) ? $twitter_profile : null;
		echo ( ! empty( $instagram ) ) ? $instagram_profile : null;
		echo ( ! empty( $linkedin ) ) ? $linkedin_profile : null;
		echo '</div>';

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @see WP_Widget::form()
	 *
	 */
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';

		$facebook  = isset( $instance['facebook'] ) ? $instance['facebook'] : '#';
		$twitter   = isset( $instance['twitter'] ) ? $instance['twitter'] : '#';
		$instagram = isset( $instance['instagram'] ) ? $instance['instagram'] : '#';
		$linkedin  = isset( $instance['linkedin'] ) ? $instance['linkedin'] : '#';
		?>
        <p><?php _e( 'You can hide a field by leaving it empty', 'yith-proteo' ); ?></p>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'yith-proteo' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
                   value="<?php echo esc_attr( $title ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:', 'yith-proteo' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>"
                   name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text"
                   value="<?php echo esc_attr( $facebook ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:', 'yith-proteo' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>"
                   name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text"
                   value="<?php echo esc_attr( $twitter ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram:', 'yith-proteo' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>"
                   name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text"
                   value="<?php echo esc_attr( $instagram ); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin:', 'yith-proteo' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>"
                   name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text"
                   value="<?php echo esc_attr( $linkedin ); ?>">
        </p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 * @see WP_Widget::update()
	 *
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['facebook']  = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
		$instance['twitter']   = ( ! empty( $new_instance['twitter'] ) ) ? strip_tags( $new_instance['twitter'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? strip_tags( $new_instance['instagram'] ) : '';
		$instance['linkedin']  = ( ! empty( $new_instance['linkedin'] ) ) ? strip_tags( $new_instance['linkedin'] ) : '';

		return $instance;
	}

}

// register YITH_Proteo_Social_Icons widget
function register_yith_proteo_social_icons() {
	register_widget( 'YITH_Proteo_Social_Icons' );
}

add_action( 'widgets_init', 'register_yith_proteo_social_icons' );