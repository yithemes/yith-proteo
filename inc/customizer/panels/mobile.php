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
		'title'    => esc_html__( 'Mobile options', 'yith-proteo' ),
		'priority' => 75,
	)
);

$wp_customize->add_section(
	'yith_proteo_mobile_topbar_management',
	array(
		'title'    => esc_html__( 'Mobile topbar', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Show topbar in mobile', 'yith-proteo' ),
				'section' => 'yith_proteo_mobile_topbar_management',
			)
		)
	);
}

$wp_customize->add_section(
	'yith_proteo_mobile_header_management',
	array(
		'title'    => esc_html__( 'Mobile header', 'yith-proteo' ),
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
		'label'   => esc_html__( 'Mobile menu opener position', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_header_management',
		'choices' => array(
			'left'  => esc_html__( 'Left', 'yith-proteo' ),
			'right' => esc_html__( 'Right', 'yith-proteo' ),
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
				'label'       => esc_html__( 'Show header sidebar', 'yith-proteo' ),
				'section'     => 'yith_proteo_mobile_header_management',
				'description' => esc_html__( 'Choose whether to show or not the header widget area', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Show search icon in mobile', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Show cart icon in mobile', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Show account icon in mobile', 'yith-proteo' ),
				'section' => 'yith_proteo_mobile_header_management',
			)
		)
	);
}

// Mobile menu managament.
$wp_customize->add_section(
	'yith_proteo_mobile_menu_management',
	array(
		'title'    => esc_html__( 'Mobile menu', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Mobile menu background color', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Mobile menu color', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Mobile menu :hover color', 'yith-proteo' ),
			'section' => 'yith_proteo_mobile_menu_management',
		)
	)
);

// Mobile menu alighment.
$wp_customize->add_setting(
	'yith_proteo_mobile_menu_align',
	array(
		'default'           => 'left',
		'sanitize_callback' => 'yith_proteo_sanitize_radio',
	)
);
$wp_customize->add_control(
	'yith_proteo_mobile_menu_align',
	array(
		'type'    => 'radio',
		'label'   => esc_html__( 'Mobile menu alignment', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_menu_management',
		'choices' => array(
			'left'   => esc_html__( 'Left', 'yith-proteo' ),
			'right'  => esc_html__( 'Right', 'yith-proteo' ),
			'center' => esc_html__( 'Center', 'yith-proteo' ),
		),
	)
);

// Mobile typography managament.
$wp_customize->add_section(
	'yith_proteo_mobile_typography_management',
	array(
		'title'    => esc_html__( 'Mobile typography', 'yith-proteo' ),
		'priority' => 30,
		'panel'    => 'yith_proteo_mobile_options',
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
		'label'   => esc_html__( 'Site Title font size (default: 38px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'Tagline font size (default: 11px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'Body font size (default: 13px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'Topbar font size (default: 13px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'Mobile menu font size (default: 16px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'H1 font size (default: 56px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'H2 font size (default: 32px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'H3 font size (default: 15px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'H4 font size (default: 13px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'H5 font size (default: 10px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'H6 font size (default: 9px)', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);

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
		'label'   => esc_html__( 'Footer font size (default: 13px)', 'yith-proteo' ),
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
		'label'   => esc_html__( 'Footer credits font size (default: 13px)', 'yith-proteo' ),
		'section' => 'yith_proteo_mobile_typography_management',
		'type'    => 'number',
	)
);
