<?php
/**
 * Extends WP_Customize_Control class
 *
 * @package yith-proteo
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
	/**
	 * Class Customizer_Control_Spacing
	 */
	class Customizer_Control_Spacing extends WP_Customize_Control {
		/**
		 * Customizer control type
		 *
		 * @var $type Control type
		 */
		public $type = 'spacing_control';

		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
			?>
			<div class="spacing_control">
				<?php if ( ! empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<?php $spacing_values = $this->value(); ?>
				<ul class="spacing-wrapper">
				<?php foreach ( $this->choices as $key => $value ) { ?>
					<li>
						<label class="control-spacing-label">
							<span><?php echo esc_html( $value['name'] ); ?></span>
							<input type="number" value="<?php echo esc_attr( $spacing_values[ $key ] ); ?>" data-id="<?php echo esc_attr( $key ); ?>" class="spacing-input"/>
						</label>
					</li>
				<?php	} ?>
				</ul>
			</div>
			<?php
		}

		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_script( 'yith-proteo-spacing-control-script', get_template_directory_uri() . '/inc/customizer/custom-controls/spacing-control.js', array( 'jquery', 'customize-base' ), '1.0.0', true );
		}
	}
}
