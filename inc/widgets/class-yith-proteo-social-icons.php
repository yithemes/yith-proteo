<?php
/**
 * Social icons widget
 *
 * @package yith-proteo
 */

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
			esc_html_x( 'YITH Proteo Social Networks', 'Widget title', 'yith-proteo' ), // Name.
			array(
				'description' => esc_html_x( 'Links to your social profiles', 'Widget description', 'yith-proteo' ),
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
	 */
	public function widget( $args, $instance ) {

		$title = apply_filters( 'widget_title', isset( $instance['title'] ) ? $instance['title'] : '' );

		$facebook  = isset( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '';
		$twitter   = isset( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '';
		$instagram = isset( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '';
		$linkedin  = isset( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '';
		$youtube   = isset( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '';
		$pinterest = isset( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '';
		$skype     = isset( $instance['skype'] ) ? esc_url( $instance['skype'] ) : '';
		$tiktok    = isset( $instance['tiktok'] ) ? esc_url( $instance['tiktok'] ) : '';

		$tiktok_svg = '<svg class="tiktok" width="48px" height="48px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<title>Tiktok</title>
						<g id="tiktok" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<path d="M38.0766847,15.8542954 C36.0693906,15.7935177 34.2504839,14.8341149 32.8791434,13.5466056 C32.1316475,12.8317108 31.540171,11.9694126 31.1415066,11.0151329 C30.7426093,10.0603874 30.5453728,9.03391952 30.5619062,8 L24.9731521,8 L24.9731521,28.8295196 C24.9731521,32.3434487 22.8773693,34.4182737 20.2765028,34.4182737 C19.6505623,34.4320127 19.0283477,34.3209362 18.4461858,34.0908659 C17.8640239,33.8612612 17.3337909,33.5175528 16.8862248,33.0797671 C16.4386588,32.6422142 16.0833071,32.1196657 15.8404292,31.5426268 C15.5977841,30.9658208 15.4727358,30.3459348 15.4727358,29.7202272 C15.4727358,29.0940539 15.5977841,28.4746337 15.8404292,27.8978277 C16.0833071,27.3207888 16.4386588,26.7980074 16.8862248,26.3604545 C17.3337909,25.9229017 17.8640239,25.5791933 18.4461858,25.3491229 C19.0283477,25.1192854 19.6505623,25.0084418 20.2765028,25.0219479 C20.7939283,25.0263724 21.3069293,25.1167239 21.794781,25.2902081 L21.794781,19.5985278 C21.2957518,19.4900128 20.7869423,19.436221 20.2765028,19.4380839 C18.2431278,19.4392483 16.2560928,20.0426009 14.5659604,21.1729264 C12.875828,22.303019 11.5587449,23.9090873 10.7814424,25.7878401 C10.003907,27.666593 9.80084889,29.7339663 10.1981162,31.7275214 C10.5953834,33.7217752 11.5748126,35.5530237 13.0129853,36.9904978 C14.4509252,38.4277391 16.2828722,39.4064696 18.277126,39.8028054 C20.2711469,40.1991413 22.3382874,39.9951517 24.2163416,39.2169177 C26.0948616,38.4384508 27.7002312,37.1209021 28.8296253,35.4300711 C29.9592522,33.7397058 30.5619062,31.7522051 30.5619062,29.7188301 L30.5619062,18.8324027 C32.7275484,20.3418321 35.3149087,21.0404263 38.0766847,21.0867664 L38.0766847,15.8542954 Z"></path>
						</g>
						</svg>';

		// social profile link.
		$facebook_profile  = '<a target="_blank" rel="nofollow noopener" class="yith-proteo-social-icon facebook" title="facebook" href="' . $facebook . '"><span class="icon-social-facebook"></span></a>';
		$twitter_profile   = '<a target="_blank" rel="nofollow noopener" class="yith-proteo-social-icon twitter" title="twitter" href="' . $twitter . '"><span class="icon-social-twitter"></span></a>';
		$instagram_profile = '<a target="_blank" rel="nofollow noopener" class="yith-proteo-social-icon instagram" title="instagram" href="' . $instagram . '"><span class="icon-social-instagram"></span></a>';
		$linkedin_profile  = '<a target="_blank" rel="nofollow noopener" class="yith-proteo-social-icon linkedin" title="linkedin" href="' . $linkedin . '"><span class="icon-social-linkedin"></span></a>';
		$youtube_profile   = '<a target="_blank" rel="nofollow noopener" class="yith-proteo-social-icon youtube" title="youtube" href="' . $youtube . '"><span class="icon-social-youtube"></span></a>';
		$pinterest_profile = '<a target="_blank" rel="nofollow noopener" class="yith-proteo-social-icon pinterest" title="pinterest" href="' . $pinterest . '"><span class="icon-social-pinterest"></span></a>';
		$skype_profile     = '<a target="_blank" rel="nofollow noopener" class="yith-proteo-social-icon skype" title="skype" href="' . $skype . '"><span class="icon-social-skype"></span></a>';
		$tiktok_profile    = '<a target="_blank" rel="nofollow noopener" class="yith-proteo-social-icon tiktok" title="tiktok" href="' . $tiktok . '">' . $tiktok_svg . '</a>';

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		if ( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		echo '<div class="yith-proteo-social-icons">';
		echo ( ! empty( $facebook ) ) ? $facebook_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $twitter ) ) ? $twitter_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $instagram ) ) ? $instagram_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $linkedin ) ) ? $linkedin_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $youtube ) ) ? $youtube_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $pinterest ) ) ? $pinterest_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $skype ) ) ? $skype_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo ( ! empty( $tiktok ) ) ? $tiktok_profile : null; // phpcs:ignore WordPress.Security.EscapeOutput
		echo '</div>';

		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Back-end widget form.
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @see WP_Widget::form()
	 */
	public function form( $instance ) {
		$title = isset( $instance['title'] ) ? $instance['title'] : '';

		$facebook  = isset( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '#';
		$twitter   = isset( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '#';
		$instagram = isset( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '#';
		$linkedin  = isset( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '#';
		$youtube   = isset( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '#';
		$pinterest = isset( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '#';
		$skype     = isset( $instance['skype'] ) ? esc_url( $instance['skype'] ) : '#';
		$tiktok    = isset( $instance['tiktok'] ) ? esc_url( $instance['tiktok'] ) : '#';
		?>
		<p><?php echo esc_html_x( 'To hide a field, just leave it empty', 'Widget option label', 'yith-proteo' ); ?></p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html_x( 'Title:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
				value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"><?php echo esc_html_x( 'Facebook:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="text"
				value="<?php echo esc_attr( $facebook ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"><?php echo esc_html_x( 'Twitter:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="text"
				value="<?php echo esc_attr( $twitter ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"><?php echo esc_html_x( 'Instagram:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="text"
				value="<?php echo esc_attr( $instagram ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"><?php echo esc_html_x( 'LinkedIn:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="text"
				value="<?php echo esc_attr( $linkedin ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"><?php echo esc_html_x( 'Youtube:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="text"
				value="<?php echo esc_attr( $youtube ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"><?php echo esc_html_x( 'Pinterest:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="text"
				value="<?php echo esc_attr( $pinterest ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'skype' ) ); ?>"><?php echo esc_html_x( 'Skype:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'skype' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'skype' ) ); ?>" type="text"
				value="<?php echo esc_attr( $skype ); ?>">
		</p>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'tiktok' ) ); ?>"><?php echo esc_html_x( 'Tiktok:', 'Widget option', 'yith-proteo' ); ?></label>
			<input
				class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tiktok' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'tiktok' ) ); ?>" type="text"
				value="<?php echo esc_attr( $tiktok ); ?>">
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
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = array();
		$instance['title']     = ( ! empty( $new_instance['title'] ) ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['facebook']  = ( ! empty( $new_instance['facebook'] ) ) ? wp_strip_all_tags( $new_instance['facebook'] ) : '';
		$instance['twitter']   = ( ! empty( $new_instance['twitter'] ) ) ? wp_strip_all_tags( $new_instance['twitter'] ) : '';
		$instance['instagram'] = ( ! empty( $new_instance['instagram'] ) ) ? wp_strip_all_tags( $new_instance['instagram'] ) : '';
		$instance['linkedin']  = ( ! empty( $new_instance['linkedin'] ) ) ? wp_strip_all_tags( $new_instance['linkedin'] ) : '';
		$instance['youtube']   = ( ! empty( $new_instance['youtube'] ) ) ? wp_strip_all_tags( $new_instance['youtube'] ) : '';
		$instance['pinterest'] = ( ! empty( $new_instance['pinterest'] ) ) ? wp_strip_all_tags( $new_instance['pinterest'] ) : '';
		$instance['skype']     = ( ! empty( $new_instance['skype'] ) ) ? wp_strip_all_tags( $new_instance['skype'] ) : '';
		$instance['tiktok']    = ( ! empty( $new_instance['tiktok'] ) ) ? wp_strip_all_tags( $new_instance['tiktok'] ) : '';

		return $instance;
	}

}
