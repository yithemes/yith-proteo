<?php
/**
 * YITH-proteo Theme Customizer - Mobile
 *
 * @package yith-proteo
 */

/**
 * Mobile options management
 */
$wp_customize->add_panel(
	'yith_proteo_mobile_options',
	array(
		'title'    => esc_html_x( 'Mobile & Responsive', 'Customizer panel name', 'yith-proteo' ),
		'priority' => 75,
	)
);

$wp_customize->add_section(
	'yith_proteo_mobile_topbar_management',
	array(
		'title'    => esc_html_x( 'Mobile topbar', 'Customizer section title', 'yith-proteo' ),
		'priority' => 5,
		'panel'    => 'yith_proteo_mobile_options',
	)
);

// Mobile Topbar show.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_mobile_topbar_show',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_mobile_topbar_show',
			array(
				'label'   => esc_html_x( 'Show topbar in mobile', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_mobile_topbar_management',
			)
		)
	);
}

$wp_customize->add_section(
	'yith_proteo_mobile_header_management',
	array(
		'title'    => esc_html_x( 'Mobile header', 'Customizer section title', 'yith-proteo' ),
		'priority' => 10,
		'panel'    => 'yith_proteo_mobile_options',
	)
);

// Mobile menu opener position.
$wp_customize->add_setting(
	'yith_proteo_mobile_menu_opener_position',
	array(
		'default'           => 'right',
		'sanitize_callback' => 'yith_proteo_sanitize_radio',
		'priority'          => 10,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_menu_opener_position',
	array(
		'type'    => 'radio',
		'label'   => esc_html_x( 'Mobile menu opener position', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_header_management',
		'choices' => array(
			'left'  => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
			'right' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
		),
	)
);

// Mobile Header show sidebar.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_show_mobile_header_sidebar',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_show_mobile_header_sidebar',
			array(
				'label'       => esc_html_x( 'Show header widget area', 'Customizer option name', 'yith-proteo' ),
				'section'     => 'yith_proteo_mobile_header_management',
				'description' => esc_html_x( 'Choose whether to show or not the header widget area', 'Customizer option description', 'yith-proteo' ),
			)
		)
	);
}

// Mobile header search widget.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_mobile_search_widget',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_mobile_search_widget',
			array(
				'label'   => esc_html_x( 'Show search icon in mobile', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_mobile_header_management',
			)
		)
	);
}

// Mobile header cart widget.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_mobile_cart_widget',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_mobile_cart_widget',
			array(
				'label'   => esc_html_x( 'Show cart icon in mobile', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_mobile_header_management',
			)
		)
	);
}

// Mobile header account widget.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_mobile_account_widget',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_mobile_account_widget',
			array(
				'label'   => esc_html_x( 'Show user account icon in mobile', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_mobile_header_management',
			)
		)
	);
}

// Mobile menu managament.
$wp_customize->add_section(
	'yith_proteo_mobile_menu_management',
	array(
		'title'    => esc_html_x( 'Mobile menu', 'Customizer section title', 'yith-proteo' ),
		'priority' => 20,
		'panel'    => 'yith_proteo_mobile_options',
	)
);

// Mobile menu background color.
$wp_customize->add_setting(
	'yith_proteo_mobile_menu_background_color',
	array(
		'default'           => get_theme_mod( 'yith_proteo_header_background_color', '#ffffff' ),
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_mobile_menu_background_color',
		array(
			'label'   => esc_html_x( 'Background color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_mobile_menu_management',
		)
	)
);

// Header menu color.
$wp_customize->add_setting(
	'yith_proteo_mobile_menu_color',
	array(
		'default'           => get_theme_mod( 'yith_proteo_header_main_menu_color', '#404040' ),
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_mobile_menu_color',
		array(
			'label'   => esc_html_x( 'Menu color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_mobile_menu_management',
		)
	)
);

// Header menu color hover.
$wp_customize->add_setting(
	'yith_proteo_mobile_menu_hover_color',
	array(
		'default'           => get_theme_mod( 'yith_proteo_header_main_menu_hover_color', '#448a85' ),
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_mobile_menu_hover_color',
		array(
			'label'   => esc_html_x( 'Hover color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_mobile_menu_management',
		)
	)
);

// Mobile menu alighment.
if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_mobile_menu_align',
		array(
			'default'           => 'left',
			'sanitize_callback' => 'yith_proteo_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Radio_Image(
			$wp_customize,
			'yith_proteo_mobile_menu_align',
			array(
				'label'   => esc_html_x( 'Alignment', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_mobile_menu_management',
				'choices' => array(
					'left'   => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/align-left.svg',
						'label' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
					),
					'center' => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/align-center.svg',
						'label' => esc_html_x( 'Center', 'Customizer option value', 'yith-proteo' ),
					),
					'right'  => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/align-right.svg',
						'label' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
					),
				),
			)
		)
	);
}

// Mobile typography managament.
$wp_customize->add_section(
	'yith_proteo_mobile_typography_management',
	array(
		'title'       => esc_html_x( 'Mobile typography', 'Customizer section title', 'yith-proteo' ),
		'description' => esc_html_x( 'Set font size in px for all elements in mobile devices', 'Customizer section description', 'yith-proteo' ),
		'priority'    => 30,
		'panel'       => 'yith_proteo_mobile_options',
	)
);

// Site title font size.
$wp_customize->add_setting(
	'yith_proteo_mobile_site_title_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 38,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_site_title_font_size',
	array(
		'label'   => esc_html_x( 'Site Title', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

// Tagline font size.
$wp_customize->add_setting(
	'yith_proteo_mobile_tagline_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 11,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_tagline_font_size',
	array(
		'label'   => esc_html_x( 'Tagline', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

// Mobile Topbar font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_topbar_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 13,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_topbar_font_size',
	array(
		'label'   => esc_html_x( 'Topbar', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

// main menu font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_menu_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 16,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_menu_font_size',
	array(
		'label'   => esc_html_x( 'Mobile menu', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

// Base font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_base_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 13,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_base_font_size',
	array(
		'label'   => esc_html_x( 'Body', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

// H1 font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_h1_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 56,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_h1_font_size',
	array(
		'label'   => esc_html_x( 'H1', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

// H2 font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_h2_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 32,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_h2_font_size',
	array(
		'label'   => esc_html_x( 'H2', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);
// H3 font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_h3_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 15,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_h3_font_size',
	array(
		'label'   => esc_html_x( 'H3', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

// H4 font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_h4_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 13,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_h4_font_size',
	array(
		'label'   => esc_html_x( 'H4', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

// H5 font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_h5_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 10,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_h5_font_size',
	array(
		'label'   => esc_html_x( 'H5', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

// H6 font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_h6_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 9,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_h6_font_size',
	array(
		'label'   => esc_html_x( 'H6', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

if ( function_exists( 'wc' ) ) {
	// Single product page title.
	$wp_customize->add_setting(
		'yith_proteo_mobile_single_product_page_title_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 36,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_mobile_single_product_page_title_font_size',
		array(
			'label'   => esc_html_x( 'Product page title', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_mobile_typography_management',
			'type'    => 'number',
		)
	);
}

// Footer font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_footer_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 13,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_footer_font_size',
	array(
		'label'   => esc_html_x( 'Footer', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

// Footer credits font size options.
$wp_customize->add_setting(
	'yith_proteo_mobile_footer_credits_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => 13,
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_footer_credits_font_size',
	array(
		'label'   => esc_html_x( 'Footer credits', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);
