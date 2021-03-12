<?php
/**
 * Extends WP_Customize_Control class
 *
 * @package yith-proteo
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Class WP_Customize_Notice
	 */
	class WP_Customize_Notice extends WP_Customize_Control {

		/**
		 * Customizer control type
		 *
		 * @var $type Control type
		 */
		public $type = 'simple_notice';

		/**
		 * Render controls
		 */
		public function render_content() {
			$allowed_html = array(
				'a'      => array(
					'href'   => array(),
					'title'  => array(),
					'class'  => array(),
					'target' => array(),
					'rel'    => array(),
				),
				'br'     => array(),
				'em'     => array(),
				'strong' => array(),
				'i'      => array(
					'class' => array(),
				),
				'span'   => array(
					'class' => array(),
				),
				'code'   => array(),
			);
			?>
			<div class="simple-notice-custom-control">
				<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
			</div>
			<?php if ( ! empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
			<?php } ?>
			<?php
		}
	}
}
