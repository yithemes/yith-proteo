<?php
/**
 * Generate and elaborate the responsive css file
 *
 * @package yith-proteo
 */

/**
 * Class YITH_Proteo_generate_responsive_css_file
 */
class YITH_Proteo_Generate_Responsive_CSS_File {
	/**
	 * Instance of this object.
	 *
	 * @static
	 * @access private
	 * @var null|object
	 */
	private static $instance = null;

	/**
	 * The CSS file content.
	 *
	 * @var string
	 */
	private $responsive_css = '';


	/**
	 * Get a unique instance of this object.
	 *
	 * @return object
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Read the responsive.css file and put into variable
	 *
	 * @return bool
	 */
	public function elaborate_css_file() {
		// Initialize the WordPress filesystem.
		$wp_filesystem = yith_proteo_init_filesystem();

		$file_path        = wp_normalize_path( wp_get_upload_dir()['basedir'] . '/yith-proteo-custom-responsive.css' );
		$css_file_content = $wp_filesystem->get_contents( wp_normalize_path( get_template_directory() . '/responsive.css' ) );

		// exit if the css file don't exists.
		if ( ! $css_file_content ) {
			return false;
		}
		$options = array(
			'yith_proteo_mobile_device_width'            => '576',
			'yith_proteo_mobile_device_width_min'        => get_theme_mod( 'yith_proteo_mobile_device_width', 576 ) - 1,
			'yith_proteo_tablet_device_width'            => '768',
			'yith_proteo_tablet_device_width_min'        => get_theme_mod( 'yith_proteo_tablet_device_width', 768 ) - 1,
			'yith_proteo_tablet_device_width_next'       => get_theme_mod( 'yith_proteo_tablet_device_width', 768 ) + 1,
			'yith_proteo_small_desktop_device_width'     => '992',
			'yith_proteo_small_desktop_device_width_min' => get_theme_mod( 'yith_proteo_small_desktop_device_width', 992 ) - 1,
			'yith_proteo_desktop_device_width'           => '1200',
			'yith_proteo_desktop_device_width_min'       => get_theme_mod( 'yith_proteo_desktop_device_width', 1200 ) - 1,
			'yith_proteo_large_desktop_device_width'     => '1400',
			'yith_proteo_large_desktop_device_width_min' => get_theme_mod( 'yith_proteo_large_desktop_device_width', 1400 ) - 1,
		);

		foreach ( $options as $option => $default ) {
			$value            = get_theme_mod( $option, $default );
			$css_file_content = preg_replace( "/(\/\*<{$option}>\*\/)([^\/]*)(\/\*<\/{$option}>\*\/)/", '${1}' . $value . 'px$3', $css_file_content );
		}

		if ( ! defined( 'FS_CHMOD_DIR' ) ) {
			define( 'FS_CHMOD_DIR', ( 0755 & ~ umask() ) );
		}
		if ( ! defined( 'FS_CHMOD_FILE' ) ) {
			define( 'FS_CHMOD_FILE', ( 0644 & ~ umask() ) );
		}

		// Attempt to write the file.
		if ( ! $wp_filesystem->put_contents( $file_path, $css_file_content, FS_CHMOD_FILE ) ) {
			// If the attempt to write to the file failed, then fallback to fwrite.
			$wp_filesystem->delete( $file_path );
			$fp      = $wp_filesystem->touch( $file_path, 'w' );
			$written = $wp_filesystem->put_contents( $fp, $css_file_content );
			if ( false === $written ) {
				return false;
			}
		}

		return true;

	}

}
