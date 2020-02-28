<?php

/**
 * Adds YITH_Proteo_Social_Icons widget.
 */
class YITH_Proteo_Social_Icons extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'YITH_Proteo_Social_Icons',
			__( 'Social Networks', 'yith-proteo' ), // Name
			array(
				'description' => __( 'Links to your social profiles', 'yith-proteo' ),
			)
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

		$facebook  = isset( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '';
		$twitter   = isset( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '';
		$instagram = isset( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '';
		$linkedin  = isset( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '';

		// social profile link
		$facebook_profile  = '<a target="_blank" rel="nofollow noopener" class="facebook" title="facebook" href="' . $facebook . '"><span class="icon-social-facebook"></span></a>';
		$twitter_profile   = '<a target="_blank" rel="nofollow noopener" class="twitter" title="twitter" href="' . $twitter . '"><span class="icon-social-twitter"></span></a>';
		$instagram_profile = '<a target="_blank" rel="nofollow noopener" class="instagram" title="instagram" href="' . $instagram . '"><span class="icon-social-instagram"></span></a>';
		$linkedin_profile  = '<a target="_blank" rel="nofollow noopener" class="linkedin" title="linkedin" href="' . $linkedin . '"><span class="icon-social-linkedin"></span></a>';

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		echo '<div class="yith-proteo-social-icons">';
		echo ( ! empty( $facebook ) ) ? $facebook_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $twitter ) ) ? $twitter_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $instagram ) ) ? $instagram_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $linkedin ) ) ? $linkedin_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo '</div>';

		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
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

		$facebook  = isset( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '#';
		$twitter   = isset( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '#';
		$instagram = isset( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '#';
		$linkedin  = isset( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '#';
		?>
		<p><?php esc_html_e( 'To hide a field, just leave it empty', 'yith-proteo' ); ?></p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
				value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook:', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text"
				value="<?php echo esc_attr( $facebook ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter:', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text"
				value="<?php echo esc_attr( $twitter ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram:', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text"
				value="<?php echo esc_attr( $instagram ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php esc_html_e( 'LinkedIn:', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text"
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
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['facebook']  = ( ! empty( $new_instance['facebook'] ) ) ? wp_strip_all_tags( $new_instance['facebook'] ) : '';
		$instance['twitter']   = ( ! empty( $new_instance['twitter'] ) ) ? wp_strip_all_tags( $new_instance['twitter'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? wp_strip_all_tags( $new_instance['instagram'] ) : '';
		$instance['linkedin']  = ( ! empty( $new_instance['linkedin'] ) ) ? wp_strip_all_tags( $new_instance['linkedin'] ) : '';

		return $instance;
	}

}
