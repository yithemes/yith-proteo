<?php
/**
 * Radio on/off customize control extends the WP_Customize_Control class
 *
 * @package yith-proteo
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Radio on/off customize control.
 */
class Customizer_Control_On_Off extends WP_Customize_Control {
	/**
	 * The type of customize control being rendered.
	 *
	 * @var   string
	 */
	public $type = 'radio-on-off';
	/**
	 * Displays the control content.
	 *
	 * @return void
	 */
	public function render_content() {
		$choices = array(
			'yes' => array(
				'label' => esc_html_x( 'On', 'Customizer option value', 'yith-proteo' ),
			),
			'no'  => array(
				'label' => esc_html_x( 'Off', 'Customizer option value', 'yith-proteo' ),
			),
		); ?>

		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>

		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>

		<div id="<?php echo esc_attr( "input_{$this->id}" ); ?>">

			<?php foreach ( $choices as $value => $args ) : ?>

				<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( "_customize-radio-{$this->id}" ); ?>" id="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>" <?php $this->link(); ?> <?php checked( $this->value(), $value ); ?> />

				<label for="<?php echo esc_attr( "{$this->id}-{$value}" ); ?>">
					<?php echo esc_html( $args['label'] ); ?>
				</label>

			<?php endforeach; ?>

		</div><!-- .image -->

		<script type="text/javascript">
			jQuery( function( $ ) {
				jQuery( '#<?php echo esc_attr( "input_{$this->id}" ); ?>' ).buttonset();
			} );
		</script>
		<?php
	}
	/**
	 * Loads the jQuery UI Button script and hooks our custom styles in.
	 *
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'jquery-ui-button' );
	}
}
