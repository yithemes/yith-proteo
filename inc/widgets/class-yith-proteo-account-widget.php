<?php
/**
 * YITH Proteo Account Widget
 *
 * @package yith-proteo
 */

if ( ! class_exists( 'YITH_Proteo_Account_Widget' ) ) {
	/**
	 * YITH Proteo Account Widget.
	 */
	class YITH_Proteo_Account_Widget extends WP_Widget {

		/**
		 * Class constructor
		 */
		public function __construct() {
			parent::__construct(
				'yith_proteo_account_widget',
				esc_html_x( 'YITH Proteo Account Widget', 'Widget title', 'yith-proteo' ),
				array( 'description' => esc_html_x( 'A shortcut to site login page', 'Widget description', 'yith-proteo' ) )
			);
			add_action( 'admin_footer', array( $this, 'media_fields' ) );
			add_action( 'customize_controls_print_footer_scripts', array( $this, 'media_fields' ) );
		}



		/**
		 * Print widget on frontend
		 *
		 * @param array $args An array of arguments.
		 * @param array $instance Array of settings for the current widget.
		 * @return void
		 */
		public function widget( $args, $instance ) {
			if ( class_exists( 'woocommerce' ) ) {
				$url = ! is_user_logged_in() ? $instance['login-url'] : $instance['myaccount-url'];
			} else {
				$url = ! is_user_logged_in() ? $instance['login-url'] : get_admin_url();
			}

			// Let's filter widget link url.
			$url = apply_filters( 'yith_proteo_account_widget_url', $url, $instance );

			$icon = $instance['custom-icon'];
			if ( ! $icon ) {
				$icon = get_template_directory_uri() . '/img/user.svg';
			}

			if ( get_template_directory_uri() . '/img/user.svg' !== $icon ) {
				$icon = wp_get_attachment_image_src( $icon, 'full' );
				$icon = '<img src="' . esc_url( apply_filters( 'yith_proteo_account_widget_image_url', $icon[0] ) ) . '" width="25" loading="lazy">';
			} else {
				$icon = '<span class="lnr lnr-user"></span>';
			}

			$output  = '';
			$output .= $args['before_widget'];

			$output .= '<a class="yith-proteo-user-welcome-message" href="' . esc_url( $url ) . '">';
			$output .= $icon;

			if ( is_user_logged_in() ) {
				$name = yith_proteo_get_user_username();
				/* translators: %s: user name. */
				$message = sprintf( esc_html_x( 'Hello %s', 'YITH_Proteo_Account_Widget greeting message', 'yith-proteo' ), '<br>' . $name );
				$output .= '<span>' . apply_filters( 'yith_proteo_account_widget_text', $message ) . '</span>';
			}

			$output .= '</a>';
			$output .= $args['after_widget'];

			echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		/**
		 * Support to media fiels for widget
		 *
		 * @return void
		 */
		public function media_fields() {
			?><script>
				jQuery( function( $ ){
					if ( typeof wp.media !== 'undefined' ) {
						var _custom_media = true,
						_orig_send_attachment = wp.media.editor.send.attachment;
						$(document).on('click','.custommedia',function(e) {
							var send_attachment_bkp = wp.media.editor.send.attachment;
							var button = $(this);
							var id = button.attr('id');
							_custom_media = true;
								wp.media.editor.send.attachment = function(props, attachment){
								if ( _custom_media ) {
									$('input#'+id).val(attachment.id);
									$('span#preview'+id).css('background-image', 'url('+attachment.url+')');
									$('input#'+id).trigger('change');
								} else {
									return _orig_send_attachment.apply( this, [props, attachment] );
								};
							}
							wp.media.editor.open(button);
							return false;
						});
						$('.add_media').on('click', function(){
							_custom_media = false;
						});
						$(document).on('click', '.remove-media', function() {
							var parent = $(this).parents('p');
							parent.find('input[type="media"]').val('<?php echo esc_url( get_template_directory_uri() ) . '/img/user.svg'; ?>').trigger('change');
							parent.find('span').css('background-image', 'url(<?php echo esc_url( get_template_directory_uri() ) . '/img/user.svg'; ?>)');
						});
					}
				});
			</script>
			<?php
		}

		/**
		 * Generate backend widget form
		 *
		 * @param array $instance Array of settings for the current widget.
		 * @return void
		 */
		public function field_generator( $instance ) {
			$widget_fields = array(
				array(
					'label'   => esc_html_x( 'Custom icon', 'Widget option', 'yith-proteo' ),
					'id'      => 'custom-icon',
					'type'    => 'media',
					'default' => get_template_directory_uri() . '/img/user.svg',
				),
				array(
					'label'   => esc_html_x( 'Login url', 'Widget option', 'yith-proteo' ),
					'id'      => 'login-url',
					'type'    => 'url',
					'default' => wp_login_url(),
				),
			);
			if ( class_exists( 'woocommerce' ) ) {
				$widget_fields[] = array(
					'label'   => esc_html_x( 'My account url', 'Widget option', 'yith-proteo' ),
					'id'      => 'myaccount-url',
					'type'    => 'url',
					'default' => get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ? get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) : get_home_url( null, '/my-account/' ),
				);
			}
			$output = '';
			foreach ( $widget_fields as $widget_field ) {
				$default = '';
				if ( isset( $widget_field['default'] ) ) {
					$default = $widget_field['default'];
				}
				$widget_value = ! empty( $instance[ $widget_field['id'] ] ) ? $instance[ $widget_field['id'] ] : $default;
				switch ( $widget_field['type'] ) {
					case 'media':
						$media_url = '';
						if ( $widget_value ) {
							$media_url = wp_get_attachment_url( $widget_value );
						}
						if ( get_template_directory_uri() . '/img/user.svg' === $widget_value ) {
							$media_url = get_template_directory_uri() . '/img/user.svg';
						}
						$output .= '<p>';
						$output .= '<label style="display:block;" for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_attr( $widget_field['label'] ) . ':</label> ';
						$output .= '<input style="display:none;" class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" type="' . $widget_field['type'] . '" value="' . $widget_value . '">';
						$output .= '<span id="preview' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" style="padding:5px;margin-right:10px;border:2px solid #eee;display:inline-block;width: 100px;min-height:50px;height:auto;vertical-align:middle;background:url(' . $media_url . ') content-box;background-size:contain;background-repeat:no-repeat;background-position:center;"></span>';
						$output .= '<button id="' . $this->get_field_id( $widget_field['id'] ) . '" class="button select-media custommedia">' . esc_html_x( 'Add Media', 'Widget option', 'yith-proteo' ) . '</button>';
						$output .= '<input style="width: 19%; margin-left: 5px;" class="button remove-media" id="buttonremove" name="buttonremove" type="button" value="' . esc_html_x( 'Reset', 'Widget option', 'yith-proteo' ) . '" />';
						$output .= '</p>';
						break;
					default:
						$output .= '<p>';
						$output .= '<label for="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '">' . esc_attr( $widget_field['label'] ) . ':</label> ';
						$output .= '<input class="widefat" id="' . esc_attr( $this->get_field_id( $widget_field['id'] ) ) . '" name="' . esc_attr( $this->get_field_name( $widget_field['id'] ) ) . '" type="' . $widget_field['type'] . '" value="' . esc_attr( $widget_value ) . '">';
						$output .= '</p>';
				}
			}
			echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		/**
		 * Print widget backend
		 *
		 * @param array $instance Array of settings for the current widget.
		 * @return void
		 */
		public function form( $instance ) {
			$this->field_generator( $instance );
		}

		/**
		 * Save and update
		 *
		 * @param array $new_instance Array of settings.
		 * @param array $old_instance Array of settings.
		 * @return array
		 */
		public function update( $new_instance, $old_instance ) {
			$widget_fields = array(
				array(
					'label'   => esc_html_x( 'Custom icon', 'Widget option', 'yith-proteo' ),
					'id'      => 'custom-icon',
					'type'    => 'media',
					'default' => '',
				),
				array(
					'label'   => esc_html_x( 'Login url', 'Widget option', 'yith-proteo' ),
					'id'      => 'login-url',
					'type'    => 'url',
					'default' => wp_login_url(),
				),
			);
			if ( class_exists( 'woocommerce' ) ) {
				$widget_fields[] = array(
					'label'   => esc_html_x( 'My account url', 'Widget option', 'yith-proteo' ),
					'id'      => 'myaccount-url',
					'type'    => 'url',
					'default' => get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ? get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) : get_home_url( null, '/my-account/' ),
				);
			}
			$instance = array();
			foreach ( $widget_fields as $widget_field ) {
				switch ( $widget_field['type'] ) {
					default:
						$instance[ $widget_field['id'] ] = ( ! empty( $new_instance[ $widget_field['id'] ] ) ) ? wp_strip_all_tags( $new_instance[ $widget_field['id'] ] ) : '';
				}
			}
			return $instance;
		}
	}

}
