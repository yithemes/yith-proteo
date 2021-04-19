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
	class WP_Customize_Range extends WP_Customize_Control {

		/**
		 * Customizer control type
		 *
		 * @var $type Control type
		 */
		public $type = 'range';

		/**
		 * WP_Customize_Range constructor.
		 *
		 * @param mixed $manager manager.
		 * @param int   $id element ID.
		 * @param array $args arguments.
		 */
		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$defaults = array(
				'min'     => 0,
				'max'     => 10,
				'step'    => 1,
				'default' => 0,
				'unit'    => '',
			);
			$args     = wp_parse_args( $args, $defaults );

			$this->min     = $args['min'];
			$this->max     = $args['max'];
			$this->step    = $args['step'];
			$this->default = $args['default'];
			$this->unit    = $args['unit'];
		}

		/**
		 * Render control
		 */
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input class='range-slider' min="<?php echo esc_attr( $this->min ); ?>"
						max="<?php echo esc_attr( $this->max ); ?>" step="<?php echo esc_attr( $this->step ); ?>"
						type='range' <?php esc_attr( $this->link() ); ?>
						value="<?php echo esc_attr( $this->value() ); ?>"
						oninput="jQuery(this).next('input').val( jQuery(this).val() )">
				<input class="range-value" oninput="jQuery(this).prev('input').val( jQuery(this).val() )" type='number' min="<?php echo esc_attr( $this->min ); ?>"
						max="<?php echo esc_attr( $this->max ); ?>" step="<?php echo esc_attr( $this->step ); ?>" value='<?php echo esc_attr( $this->value() ); ?>'>
				<span class="customize-control-unit"><?php echo esc_html( $this->unit ); ?></span>
				<span class="customize-control-reset"><?php echo esc_html( $this->default ); ?></span>
			</label>
			<?php
		}
	}
}
