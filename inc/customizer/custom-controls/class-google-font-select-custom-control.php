<?php
/**
 * Google Font Select Custom Control
 *
 * @package yith-proteo
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}
/**
 * Google Font Select Custom Control
 */
class Google_Font_Select_Custom_Control extends WP_Customize_Control {
	/**
	 * The type of control being rendered
	 *
	 * @var string $type The type of control being rendered.
	 */
	public $type = 'google_fonts';
	/**
	 * The list of Google Fonts
	 *
	 * @var bool|array $font_list List of Google Fonts.
	 */
	private $font_list = false;
	/**
	 * The saved font values decoded from json
	 *
	 * @var array $font_values The saved font values decoded from json.
	 */
	private $font_values = array();
	/**
	 * The index of the saved font within the list of Google Fonts
	 *
	 * @var int $font_list_index index of the saved font.
	 */
	private $font_list_index = 0;
	/**
	 * The number of fonts to display from the json file. Either positive integer or 'all'. Default = 'all'
	 *
	 * @var int|string $font_count The number of fonts to display.
	 */
	private $font_count = 'all';
	/**
	 * The font list sort order. Either 'alpha' or 'popular'. Default = 'alpha'
	 *
	 * @var string $font_order_by alpha|popular
	 */
	private $font_order_by = 'alpha';
	/**
	 * Get our list of fonts from the json file
	 *
	 * @param mixed $manager Option manager.
	 * @param int   $id Option id.
	 * @param array $args Args array.
	 * @param array $options Options array.
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
		// Get the font sort order.
		if ( isset( $this->input_attrs['orderby'] ) && strtolower( $this->input_attrs['orderby'] ) === 'popular' ) {
			$this->font_order_by = 'popular';
		}
		// Get the list of Google Fonts.
		if ( isset( $this->input_attrs['font_count'] ) ) {
			if ( 'all' !== strtolower( $this->input_attrs['font_count'] ) ) {
				$this->font_count = ( abs( (int) $this->input_attrs['font_count'] ) > 0 ? abs( (int) $this->input_attrs['font_count'] ) : 'all' );
			}
		}
		$this->font_list = $this->getGoogleFonts( 'all' );
		// Decode the default json font value.
		$this->font_values = json_decode( $this->value() );
		// Find the index of our default font within our list of Google Fonts.
		$this->font_list_index = $this->getFontIndex( $this->font_list, $this->font_values->font );
	}
	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue() {
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_script( 'yith-proteo-gfont-select-script', get_template_directory_uri() . '/inc/customizer/custom-controls/font-selector-assets/js/select' . $suffix . '.js', array( 'jquery' ), '4.0.13', true );
		wp_enqueue_style( 'yith-proteo-gfont-select-style', get_template_directory_uri() . '/inc/customizer/custom-controls/font-selector-assets/css/select.css', array(), '4.0.13', 'all' );
	}
	/**
	 * Export our List of Google Fonts to JavaScript
	 */
	public function to_json() {
		parent::to_json();
		$this->json['yith_proteo_fontslist'] = $this->font_list;
	}
	/**
	 * Render the control in the customizer
	 */
	public function render_content() {
		$font_counter    = 0;
		$is_font_in_list = false;
		$font_list_str   = '';

		if ( ! empty( $this->font_list ) ) {
			?>
				<div class="google_fonts_select_control">
				<?php if ( ! empty( $this->label ) ) { ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php } ?>
				<?php if ( ! empty( $this->description ) ) { ?>
						<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
					<?php } ?>
					<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-google-font-selection" <?php $this->link(); ?> />
					<div class="google-fonts">
						<select class="google-fonts-list" control-name="<?php echo esc_attr( $this->id ); ?>">
						<?php
						foreach ( $this->font_list as $key => $value ) {
							$font_counter++;
							$font_list_str .= '<option value="' . esc_attr( $value->family ) . '" ' . selected( $this->font_values->font, $value->family, false ) . '>' . esc_html( $value->family ) . '</option>';
							if ( $this->font_values->font === $value->family ) {
								$is_font_in_list = true;
							}
							if ( is_int( $this->font_count ) && $font_counter === $this->font_count ) {
								break;
							}
						}
						if ( ! $is_font_in_list && $this->font_list_index ) {
							// If the default or saved font value isn't in the list of displayed fonts, add it to the top of the list as the default font.
							$font_list_str = '<option value="' . $this->font_list[ $this->font_list_index ]->family . '" ' . selected( $this->font_values->font, $this->font_list[ $this->font_list_index ]->family, false ) . '>' . $this->font_list[ $this->font_list_index ]->family . ' (default)</option>' . $font_list_str;
						}
							// Display our list of font options.
							echo $font_list_str; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						?>
						</select>
					</div>
					<div class="customize-control-title"><?php echo esc_html_x( 'Font weight & style', 'Customizer option label', 'yith-proteo' ); ?></div>
					<div class="weight-style">
						<select class="google-fonts-regularweight-style">
							<?php
							foreach ( $this->font_list[ $this->font_list_index ]->variants as $key => $value ) {
								echo '<option value="' . esc_attr( $value ) . '" ' . selected( $this->font_values->regularweight, $value, false ) . '>' . esc_attr( $value ) . '</option>';
							}
							?>
						</select>
					</div>
					<input type="hidden" class="google-fonts-category" value="<?php echo esc_attr( $this->font_values->category ); ?>">
				<?php
		}
	}

	/**
	 * Find the index of the saved font in our multidimensional array of Google Fonts
	 *
	 * @param array  $haystack Array with fonts.
	 * @param string $needle Font family to search.
	 */
	public function getFontIndex( $haystack, $needle ) {
		if ( ! is_array( $haystack ) ) {
			return false;
		}
		foreach ( $haystack as $key => $value ) {
			if ( $value->family === $needle ) {
				return $key;
			}
		}
		return false;
	}

	/**
	 * Return the list of Google Fonts from our json file. Unless otherwise specfied, list will be limited to 30 fonts.
	 *
	 * @param int $count Number of fonts.
	 */
	public function getGoogleFonts( $count = 30 ) {
		// Google Fonts json generated from https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=YOUR-API-KEY.
		$font_file = '/inc/customizer/custom-controls/font-selector-assets/google-fonts-alphabetical.json';
		if ( 'popular' === $this->font_order_by ) {
			$font_file = '/inc/customizer/custom-controls/font-selector-assets/google-fonts-popularity.json';
		}

		// Initialize the WordPress filesystem.
		$wp_filesystem = yith_proteo_init_filesystem();

		$request = $wp_filesystem->get_contents( wp_normalize_path( get_template_directory() . $font_file ) );

		if ( is_wp_error( $request ) ) {
			return '';
		}

		$content = json_decode( $request );

		if ( 'all' === $count ) {
			return $content->items;
		} else {
			return array_slice( $content->items, 0, $count );
		}
	}
}
