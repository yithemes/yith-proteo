<?php
if ( class_exists( 'WP_Customize_Control' ) ) {
	class WP_Customize_Range extends WP_Customize_Control {
		public $type = 'range';

		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
			$defaults = array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
			);
			$args     = wp_parse_args( $args, $defaults );

			$this->min  = $args['min'];
			$this->max  = $args['max'];
			$this->step = $args['step'];
		}

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input class='range-slider' min="<?php echo esc_attr( $this->min ); ?>"
						max="<?php echo esc_attr( $this->max ); ?>" step="<?php echo esc_attr( $this->step ); ?>"
						type='range' <?php esc_attr( $this->link() ); ?>
						value="<?php echo esc_attr( $this->value() ); ?>"
						oninput="jQuery(this).next('input').val( jQuery(this).val() )">
				<input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text'
						value='<?php echo esc_attr( $this->value() ); ?>'>
			</label>
			<?php
		}
	}
}
