<?php
/**
 * Font selector.
 *
 * @package yith-proteo
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class WP_Font_Selector
 */
class WP_Font_Selector extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'selector-font';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		wp_enqueue_script( 'yith-proteo-gfont-select-script', get_template_directory_uri() . '/inc/customizer/custom-controls/font-selector-assets/js/select.js', array( 'jquery' ), YITH_PROTEO_GFONT_VERSION, true );
		wp_enqueue_style( 'yith-proteo-gfont-select-style', get_template_directory_uri() . '/inc/customizer/custom-controls/font-selector-assets/css/select.css', null, YITH_PROTEO_GFONT_VERSION );
		wp_enqueue_script( 'yith-proteo-gfont-typography-js', get_template_directory_uri() . '/inc/customizer/custom-controls/font-selector-assets/js/typography.js', array( 'jquery', 'yith-proteo-gfont-select-script' ), YITH_PROTEO_GFONT_VERSION, true );
		wp_enqueue_style( 'yith-proteo-gfont-typography', get_template_directory_uri() . '/inc/customizer/custom-controls/font-selector-assets/css/typography.css', null, YITH_PROTEO_GFONT_VERSION );
	}

	/**
	 * Render the control's content.
	 * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
	 *
	 * @access protected
	 */
	protected function render_content() {
		$this_val = $this->value(); ?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
			<?php endif; ?>

			<select class="typography-select" <?php $this->link(); ?>>
				<option value="" 
				<?php
				if ( ! $this_val ) {
					echo 'selected="selected"';}
				?>
				><?php esc_html_e( 'Default', 'yith-proteo' ); ?></option>
				<?php
				// Get Standard font options.
				$std_fonts = yith_proteo_font_selector_get_standard_fonts();
				if ( ! empty( $std_fonts ) ) {
					?>
					<optgroup label="<?php esc_html_e( 'Standard Fonts', 'yith-proteo' ); ?>">
						<?php
						// Loop through font options and add to select.
						foreach ( $std_fonts as $font ) {
							?>
							<option value="<?php echo esc_html( $font ); ?>" <?php selected( $font, $this_val ); ?>><?php echo esc_html( $font ); ?></option>
						<?php } ?>
					</optgroup>
					<?php
				}

				// Google font options.
				$google_fonts = yith_proteo_font_selector_get_google_fonts_array();
				if ( ! empty( $google_fonts ) ) {
					?>
					<optgroup label="<?php esc_html_e( 'Google Fonts', 'yith-proteo' ); ?>">
						<?php
						// Loop through font options and add to select.
						foreach ( $google_fonts as $font ) {
							?>
							<option value="<?php echo esc_html( $font ); ?>" <?php selected( $font, $this_val ); ?>><?php echo esc_html( $font ); ?></option>
						<?php } ?>
					</optgroup>
				<?php } ?>
			</select>

		</label>

		<?php
	}
}
