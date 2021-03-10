<?php
/**
 * Proteo admin page class
 *
 * @package yith-proteo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Proteo_Admin_Dashboard' ) ) {
	/**
	 * Base class for displaying a list of items in an ajaxified HTML table.
	 *
	 * @access private
	 */
	class Proteo_Admin_Dashboard {

		/**
		 * Admin Dashboard slug
		 *
		 * @var array $proteo_dashboard_slug
		 */
		public static $proteo_dashboard_slug = 'yith-proteo-dashboard';

		/**
		 * Constructor
		 */
		public function __construct() {

			if ( ! is_admin() ) {
				return;
			}

			add_action( 'after_setup_theme', __CLASS__ . '::init_proteo_admin_dashboard', 99 );

			/* Redirect on theme activation */
			add_action( 'admin_init', __CLASS__ . '::theme_activation_redirect' );
		}

		/**
		 * Redirect to "Install Plugins" page on activation
		 */
		public static function theme_activation_redirect() {
			global $pagenow;
			if ( 'themes.php' === $pagenow && is_admin() && isset( $_GET['activated'] ) ) { // phpcs:ignore
				wp_safe_redirect( esc_url_raw( add_query_arg( 'page', 'yith-proteo-dashboard', admin_url( 'themes.php' ) ) ) );
			}
		}

		/**
		 * Delay __contruction and initialize Proteo admin dashboard only after_setup_theme
		 *
		 * @return void
		 */
		public static function init_proteo_admin_dashboard() {

			add_action( 'admin_enqueue_scripts', __CLASS__ . '::register_scripts' );

			add_action( 'wp_ajax_yith-proteo-plugin-activate', __CLASS__ . '::required_plugin_activate' );

			add_action( 'admin_menu', __CLASS__ . '::add_test_theme_page' );

		}

		/**
		 * Add the admin menu page
		 *
		 * @return void
		 */
		public static function add_test_theme_page() {
			add_theme_page( 'Proteo theme', 'Proteo theme', 'edit_theme_options', 'yith-proteo-dashboard', __CLASS__ . '::yith_proteo_dashboard_callback', 10 );
		}

		/**
		 * Callback to load a template to display theme dashboard
		 *
		 * @return void
		 */
		public static function yith_proteo_dashboard_callback() {
			require get_template_directory() . '/inc/theme-dashboard/theme-dashboard.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		/**
		 * Build plugin's page URL on WordPress.org
		 * https://wordpress.org/plugins/{plugin-slug}
		 *
		 * @param String $slug plugin slug.
		 * @return String Plugin URL on WordPress.org
		 */
		private static function build_worg_plugin_link( $slug ) {
			return esc_url( trailingslashit( 'https://wordpress.org/plugins/' . $slug ) );
		}

		/**
		 * Required Plugin Activate
		 */
		public static function required_plugin_activate() {

			$nonce = ( isset( $_POST['nonce'] ) ) ? sanitize_key( $_POST['nonce'] ) : '';

			if ( false === wp_verify_nonce( $nonce, 'yith-proteo-recommended-plugin-nonce' ) ) {
				wp_send_json_error( esc_html_e( 'WordPress Nonce not validated.', 'yith-proteo' ) );
			}

			if ( ! current_user_can( 'install_plugins' ) || ! isset( $_POST['init'] ) || ! sanitize_text_field( wp_unslash( $_POST['init'] ) ) ) {
				wp_send_json_error(
					array(
						'success' => false,
						'message' => esc_html_x( 'No plugin specified', 'Proteo dashboard debug message', 'yith-proteo' ),
					)
				);
			}

			$plugin_init = ( isset( $_POST['init'] ) ) ? sanitize_text_field( wp_unslash( $_POST['init'] ) ) : '';

			$activate = activate_plugin( $plugin_init, '', false, true );

			if ( is_wp_error( $activate ) ) {
				wp_send_json_error(
					array(
						'success'               => false,
						'message'               => $activate->get_error_message(),
						'starter_template_slug' => self::$proteo_dashboard_slug,
					)
				);
			}

			wp_send_json_success(
				array(
					'success'               => true,
					'message'               => esc_html_x( 'Plugin successfully activated', 'Proteo dashboard debug message', 'yith-proteo' ),
					'starter_template_slug' => self::$proteo_dashboard_slug,
				)
			);
		}

		/**
		 * Register admin scripts.
		 *
		 * @param String $hook Screen name where the hook is fired.
		 * @return void
		 */
		public static function register_scripts( $hook ) {

			global $pagenow;

			if ( ! is_customize_preview() ) {

				if ( ! current_user_can( 'manage_options' ) ) {
					return;
				}

				wp_register_script( 'yith-proteo-admin-dashboard', get_template_directory_uri() . '/js/proteo-admin-dashboard.js', array( 'jquery', 'wp-util', 'updates' ), YITH_PROTEO_VERSION, false );

				$localize = array(
					'ajaxUrl'                            => admin_url( 'admin-ajax.php' ),
					'btnActivating'                      => esc_html_x( 'Activating importer plugin ', 'Proteo dashboard', 'yith-proteo' ) . '&hellip;',
					'proteoDashboarLink'                 => admin_url( 'themes.php?page=' ),
					'recommendedPluiginActivatingText'   => esc_html_x( 'Activating', 'Proteo dashboard', 'yith-proteo' ) . '&hellip;',
					'recommendedPluiginDeactivatingText' => esc_html_x( 'Deactivating', 'Proteo dashboard', 'yith-proteo' ) . '&hellip;',
					'recommendedPluiginActivateText'     => esc_html_x( 'Activate', 'Proteo dashboard', 'yith-proteo' ),
					'recommendedPluiginDeactivateText'   => esc_html_x( 'Deactivate', 'Proteo dashboard', 'yith-proteo' ),
					'recommendedPluiginSettingsText'     => esc_html_x( 'Settings', 'Proteo dashboard', 'yith-proteo' ),
					'proteoPluginManagerNonce'           => wp_create_nonce( 'yith-proteo-recommended-plugin-nonce' ),
					'successChecboxSVG'                  => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="#1a9b9f" d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6.25 8.891l-1.421-1.409-6.105 6.218-3.078-2.937-1.396 1.436 4.5 4.319 7.5-7.627z"/></svg>',
					'proteoToolkitEnabled'               => defined( 'YITH_PROTEO_TOOLKIT' ),
					'proteoWizardUrl'                    => admin_url( 'themes.php?page=setup-wizard' ),
				);

				wp_localize_script( 'yith-proteo-admin-dashboard', 'yith_proteo', $localize );

				// Enqueue script.
				if ( 'themes.php' === $pagenow ) {
					wp_enqueue_script( 'yith-proteo-admin-dashboard' );
				}
			}
		}
	}
}
new Proteo_Admin_Dashboard();
