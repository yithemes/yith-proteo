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
	class Customizer_Button_Preview extends WP_Customize_Control {

		/**
		 * Customizer control type
		 *
		 * @var $type Control type
		 */
		public $type = 'button_preview';

		/**
		 * Render controls
		 */
		public function render_content() {
			$label       = ! empty( $this->label ) ? $this->label : 'button';
			$button_type = sanitize_title( $label );
			?>
			<style>

			</style>
			<div class="button-preview-custom-control">
				<span class="customize-control-title"><?php echo esc_html_x( 'Preview', 'Customizer button label', 'yith-proteo' ); ?></span>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo wp_kses( $this->description, $allowed_html ); ?></span>
				<?php } ?>
				<div class="yith-proteo-button-preview-box">
					<span class="yith-proteo-button-preview <?php echo esc_attr( $button_type ); ?>"><?php echo esc_html( $this->label ); ?></span>
				</div>
			</div>
			<?php
		}
	}
}
