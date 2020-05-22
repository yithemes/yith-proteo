<?php
/**
 * YITH-proteo Theme Customizer
 *
 * @package yith-proteo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yith_proteo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'yith_proteo_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'yith_proteo_customize_partial_blogdescription',
			)
		);
	}

	/**
	 * Add YITH theme management panel.
	 */
	$wp_customize->add_panel(
		'yith_proteo_options',
		array(
			'priority'       => 150,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'YITH Theme Options', 'yith-proteo' ),
			'description'    => esc_html__( 'All options related to this theme', 'yith-proteo' ),
		)
	);

	/**
	 * Add default sidebar management
	 */
	$wp_customize->add_section(
		'yith_proteo_sidebar_management',
		array(
			'title'    => esc_html__( 'Sidebars', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_options',
		)
	);

	// Default Sidebar Management options.
	$wp_customize->add_setting(
		'yith_proteo_default_sidebar_position',
		array(
			'default'           => 'right',
			'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_default_sidebar_position',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Choose the position of the default sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_sidebar_management',
			'description' => esc_html__( 'Select where to display the default sidebar. You can adjust the settings from the page/post edit view.', 'yith-proteo' ),
			'choices'     => array(
				'no-sidebar' => esc_html__( 'No sidebar', 'yith-proteo' ),
				'right'      => esc_html__( 'Right', 'yith-proteo' ),
				'left'       => esc_html__( 'Left', 'yith-proteo' ),
			),
		)
	);

	// Blog Sidebar Management options.
	$wp_customize->add_setting(
		'yith_proteo_blog_page_sidebar_position',
		array(
			'default'           => 'right',
			'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_blog_page_sidebar_position',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Choose the position of the blog page sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_sidebar_management',
			'description' => esc_html__( 'Select where to display the sidebar. You can pick up a specific sidebard from the page edit view.', 'yith-proteo' ),
			'choices'     => array(
				'no-sidebar' => esc_html__( 'No sidebar', 'yith-proteo' ),
				'right'      => esc_html__( 'Right', 'yith-proteo' ),
				'left'       => esc_html__( 'Left', 'yith-proteo' ),
			),
		)
	);

	// Blog Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_blog_sidebar',
		array(
			'default'           => 'sidebar-1',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_blog_sidebar',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Choose the blog sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_sidebar_management',
			'description' => esc_html__( 'Select the sidebar to display. You can pick a specific sidebar from the single post edit page.', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);

	/**
	 * Add topbar management.
	 */
	$wp_customize->add_section(
		'yith_proteo_topbar_management',
		array(
			'title'    => esc_html__( 'Topbar', 'yith-proteo' ),
			'priority' => 20,
			'panel'    => 'yith_proteo_options',
		)
	);

	// Topbar enable.
	$wp_customize->add_setting(
		'yith_proteo_topbar_enable',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_topbar_enable',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Enable topbar', 'yith-proteo' ),
			'section'     => 'yith_proteo_topbar_management',
			'description' => esc_html__( 'Choose whether to show the site topbar or not', 'yith-proteo' ),
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'yith-proteo' ),
				'no'  => esc_html__( 'No', 'yith-proteo' ),
			),
		)
	);

	// Topbar background color.
	$wp_customize->add_setting(
		'yith_proteo_topbar_background_color',
		array(
			'default'           => '#ebebeb',
			'sanitize_callback' => 'sanitize_hex_color', // validates 3 or 6 digit HTML hex color code.
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_topbar_background_color',
			array(
				'label'   => esc_html__( 'Topbar background color', 'yith-proteo' ),
				'section' => 'yith_proteo_topbar_management',
			)
		)
	);

	/**
	 * Add Header management.
	 */
	$wp_customize->add_section(
		'yith_proteo_header_management',
		array(
			'title'    => esc_html__( 'Header', 'yith-proteo' ),
			'priority' => 20,
			'panel'    => 'yith_proteo_options',
		)
	);

	// Header sticky.
	$wp_customize->add_setting(
		'yith_proteo_header_sticky',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_header_sticky',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Enable sticky header', 'yith-proteo' ),
			'section'     => 'yith_proteo_header_management',
			'description' => esc_html__( 'Choose whether to make the header stick to the page when scrolling down', 'yith-proteo' ),
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'yith-proteo' ),
				'no'  => esc_html__( 'No', 'yith-proteo' ),
			),
		)
	);

	// Header background color.
	$wp_customize->add_setting(
		'yith_proteo_header_background_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color', // validates 3 or 6 digit HTML hex color code.
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_header_background_color',
			array(
				'label'   => esc_html__( 'Header background color', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header Layout options.
	$wp_customize->add_setting(
		'yith_proteo_header_layout',
		array(
			'default'           => 'left_logo_navigation_inline',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_header_layout',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Header layout', 'yith-proteo' ),
			'section'     => 'yith_proteo_header_management',
			'description' => esc_html__( 'Choose the header layout', 'yith-proteo' ),
			'choices'     => array(
				''                             => esc_html__( 'Please select', 'yith-proteo' ),
				'left_logo_navigation_below'   => esc_html__( 'Logo on the left and navigation below', 'yith-proteo' ),
				'left_logo_navigation_inline'  => esc_html__( 'Logo on the left and navigation inline', 'yith-proteo' ),
				'center_logo_navigation_below' => esc_html__( 'Centered logo and navigation below', 'yith-proteo' ),
			),
		)
	);

	// Header sticky.
	$wp_customize->add_setting(
		'yith_proteo_header_fullwidth',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_header_fullwidth',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Enable full width header', 'yith-proteo' ),
			'section'     => 'yith_proteo_header_management',
			'description' => esc_html__( 'Choose whether to make the header full width or not.', 'yith-proteo' ),
			'choices'     => array(
				'yes' => esc_html__( 'Yes', 'yith-proteo' ),
				'no'  => esc_html__( 'No', 'yith-proteo' ),
			),
		)
	);

	// Header menu color.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_color',
		array(
			'default'           => get_theme_mod( 'yith_proteo_base_font_color', '#404040' ),
			'sanitize_callback' => 'sanitize_hex_color', // validates 3 or 6 digit HTML hex color code.
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_header_main_menu_color',
			array(
				'label'   => esc_html__( 'Header menu color', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header menu color hover.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_hover_color',
		array(
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
			'sanitize_callback' => 'sanitize_hex_color', // validates 3 or 6 digit HTML hex color code.
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_header_main_menu_hover_color',
			array(
				'label'   => esc_html__( 'Header menu :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	/**
	 * Add footer sidebar management.
	 */
	$wp_customize->add_section(
		'yith_proteo_footer_management',
		array(
			'title'    => esc_html__( 'Footer', 'yith-proteo' ),
			'priority' => 30,
			'panel'    => 'yith_proteo_options',
		)
	);

	// Footer background color.
	$wp_customize->add_setting(
		'yith_proteo_footer_background_color',
		array(
			'default'           => '#f7f7f7',
			'sanitize_callback' => 'sanitize_hex_color', // validates 3 or 6 digit HTML hex color code.
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_footer_background_color',
			array(
				'label'   => esc_html__( 'Footer background color', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_management',
			)
		)
	);

	// Footer sidebar 1 options.
	$wp_customize->add_setting(
		'yith_proteo_footer_sidebar_1_widget_per_row',
		array(
			'default'           => 4,
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_footer_sidebar_1_widget_per_row',
		array(
			'label'   => esc_html__( 'Select how many widgets per row to show for Footer Sidebar 1 (new rows are automatically created).', 'yith-proteo' ),
			'section' => 'yith_proteo_footer_management',
			'type'    => 'select',
			'choices' => array(
				1 => esc_html__( 'One', 'yith-proteo' ),
				2 => esc_html__( 'Two', 'yith-proteo' ),
				3 => esc_html__( 'Three', 'yith-proteo' ),
				4 => esc_html__( 'Four', 'yith-proteo' ),
				5 => esc_html__( 'Five', 'yith-proteo' ),
				6 => esc_html__( 'Six', 'yith-proteo' ),
			),
		)
	);

	// Footer sidebar 2 options.
	$wp_customize->add_setting(
		'yith_proteo_footer_sidebar_2_widget_per_row',
		array(
			'default'           => 1,
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_footer_sidebar_2_widget_per_row',
		array(
			'label'   => esc_html__( 'Select how many widgets per row to show for Footer Sidebar 2 (new rows are automatically created).', 'yith-proteo' ),
			'section' => 'yith_proteo_footer_management',
			'type'    => 'select',
			'choices' => array(
				1 => esc_html__( 'One', 'yith-proteo' ),
				2 => esc_html__( 'Two', 'yith-proteo' ),
				3 => esc_html__( 'Three', 'yith-proteo' ),
				4 => esc_html__( 'Four', 'yith-proteo' ),
				5 => esc_html__( 'Five', 'yith-proteo' ),
				6 => esc_html__( 'Six', 'yith-proteo' ),
			),
		)
	);

	/**
	 * Add footer credits management
	 */
	$wp_customize->add_section(
		'yith_proteo_footer_credits_management',
		array(
			'title'    => esc_html__( 'Footer credits', 'yith-proteo' ),
			'priority' => 40,
			'panel'    => 'yith_proteo_options',
		)
	);

	// Footer credit options.
	$wp_customize->add_setting(
		'yith_proteo_footer_credits_content',
		array(
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_footer_credits_content',
		array(
			'label'   => esc_html__( 'Enter here the content of the footer credits area', 'yith-proteo' ),
			'section' => 'yith_proteo_footer_credits_management',
			'type'    => 'textarea',
		)
	);
	// Footer background color.
	$wp_customize->add_setting(
		'yith_proteo_footer_credits_background_color',
		array(
			'default'           => '#f0f0f0',
			'sanitize_callback' => 'sanitize_hex_color', // validates 3 or 6 digit HTML hex color code.
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_footer_credits_background_color',
			array(
				'label'   => esc_html__( 'Footer credits background color', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_credits_management',
			)
		)
	);

	/**
	 * Add Google Font management
	 */
	$wp_customize->add_section(
		'yith_proteo_google_font_management',
		array(
			'title'    => esc_html__( 'Google Font', 'yith-proteo' ),
			'priority' => 50,
			'panel'    => 'yith_proteo_options',
		)
	);

	// Footer credit options.
	$wp_customize->add_setting(
		'yith_proteo_google_font',
		array(
			'sanitize_callback' => 'esc_url_raw',
			'default'           => 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_google_font',
		array(
			'label'   => esc_html__( 'Enter the URL of the Google Font you want to use.', 'yith-proteo' ),
			'section' => 'yith_proteo_google_font_management',
			'type'    => 'textarea',
		)
	);

	/**
	 * Add Google Font management
	 */
	$wp_customize->add_section(
		'yith_proteo_typography',
		array(
			'title'    => esc_html__( 'Typography', 'yith-proteo' ),
			'priority' => 60,
			'panel'    => 'yith_proteo_options',
		)
	);
	// Base font size options.
	$wp_customize->add_setting(
		'yith_proteo_base_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 16,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_base_font_size',
		array(
			'label'   => esc_html__( 'Body font size (default: 16px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// Base font color options.
	$wp_customize->add_setting(
		'yith_proteo_base_font_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_base_font_color',
			array(
				'label'   => esc_html__( 'Body font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H1 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h1_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 70,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h1_font_size',
		array(
			'label'   => esc_html__( 'H1 font size (default: 32px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H1 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h1_font_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_h1_font_color',
			array(
				'label'   => esc_html__( 'H1 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H2 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h2_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 40,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h2_font_size',
		array(
			'label'   => esc_html__( 'H2 font size (default: 24px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H2 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h2_font_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_h2_font_color',
			array(
				'label'   => esc_html__( 'H2 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H3 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h3_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 19,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h3_font_size',
		array(
			'label'   => esc_html__( 'H3 font size (default: 19px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H3 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h3_font_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_h3_font_color',
			array(
				'label'   => esc_html__( 'H3 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H4 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h4_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 16,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h4_font_size',
		array(
			'label'   => esc_html__( 'H4 font size (default: 16px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H4 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h4_font_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_h4_font_color',
			array(
				'label'   => esc_html__( 'H4 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H5 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h5_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 13,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h5_font_size',
		array(
			'label'   => esc_html__( 'H5 font size (default: 13px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H5 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h5_font_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_h5_font_color',
			array(
				'label'   => esc_html__( 'H5 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	// H6 font size options.
	$wp_customize->add_setting(
		'yith_proteo_h6_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 11,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_h6_font_size',
		array(
			'label'   => esc_html__( 'H6 font size (default: 11px)', 'yith-proteo' ),
			'section' => 'yith_proteo_typography',
			'type'    => 'number',
		)
	);
	// H6 font color options.
	$wp_customize->add_setting(
		'yith_proteo_h6_font_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_h6_font_color',
			array(
				'label'   => esc_html__( 'H6 font color', 'yith-proteo' ),
				'section' => 'yith_proteo_typography',
			)
		)
	);

	/**
	 * Buttons management
	 */
	$wp_customize->add_section(
		'yith_proteo_buttons',
		array(
			'title'    => esc_html__( 'Buttons', 'yith-proteo' ),
			'priority' => 70,
			'panel'    => 'yith_proteo_options',
		)
	);

	// Buttons border radius.
	$wp_customize->add_setting(
		'yith_proteo_buttons_border_radius',
		array(
			'default'           => 50,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_buttons_border_radius',
			array(
				'label'   => esc_html__( 'Border radius (default: 50px)', 'yith-proteo' ),
				'min'     => 0,
				'max'     => 50,
				'step'    => 1,
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	// Button Style 1.
	$wp_customize->add_setting(
		'yith_proteo_button_style_1_bg_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_bg_color',
			array(
				'label'   => esc_html__( 'Button Style 1 background color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_1_border_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_border_color',
			array(
				'label'   => esc_html__( 'Button Style 1 border color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_1_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_text_color',
			array(
				'label'   => esc_html__( 'Button Style 1 text color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);
	// Buttons Style 1 hover.
	$wp_customize->add_setting(
		'yith_proteo_button_style_1_bg_color_hover',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_bg_color_hover',
			array(
				'label'   => esc_html__( 'Button Style 1 background :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_1_border_color_hover',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_border_color_hover',
			array(
				'label'   => esc_html__( 'Button Style 1 border :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_1_text_color_hover',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_1_text_color_hover',
			array(
				'label'   => esc_html__( 'Button Style 1 text :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	// Button Style 2.
	$wp_customize->add_setting(
		'yith_proteo_button_style_2_bg_color_1',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_2_bg_color_1',
			array(
				'label'   => esc_html__( 'Button Style 2 background color shade 1', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_2_bg_color_2',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_2_bg_color_2',
			array(
				'label'   => esc_html__( 'Button Style 2 background color shade 2', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_2_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_2_text_color',
			array(
				'label'   => esc_html__( 'Button Style 2 text color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);
	// Buttons Style 2 hover.
	$wp_customize->add_setting(
		'yith_proteo_button_style_2_bg_color_hover',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), - 0.3 ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_2_bg_color_hover',
			array(
				'label'   => esc_html__( 'Button Style 2 background :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_button_style_2_text_color_hover',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_button_style_2_text_color_hover',
			array(
				'label'   => esc_html__( 'Button Style 2 text :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_buttons',
			)
		)
	);

	/**
	 * Forms management
	 */
	$wp_customize->add_section(
		'yith_proteo_forms',
		array(
			'title'    => esc_html__( 'Forms', 'yith-proteo' ),
			'priority' => 70,
			'panel'    => 'yith_proteo_options',
		)
	);

	// Buttons border radius.
	$wp_customize->add_setting(
		'yith_proteo_inputs_border_radius',
		array(
			'default'           => 0,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_inputs_border_radius',
			array(
				'label'   => esc_html__( 'Input and textarea border radius (default: 0px)', 'yith-proteo' ),
				'min'     => 0,
				'max'     => 50,
				'step'    => 1,
				'section' => 'yith_proteo_forms',
			)
		)
	);

	/**
	 * Color shades management
	 */
	$wp_customize->add_section(
		'yith_proteo_color_shades',
		array(
			'title'    => esc_html__( 'Color shades', 'yith-proteo' ),
			'priority' => 80,
			'panel'    => 'yith_proteo_options',
		)
	);

	// Main color shade.
	$wp_customize->add_setting(
		'yith_proteo_main_color_shade',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#448a85',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_main_color_shade',
			array(
				'label'       => esc_html__( 'Main color shade', 'yith-proteo' ),
				'section'     => 'yith_proteo_color_shades',
				'description' => esc_html__( 'Save your settings and reload the page to let the magic happen', 'yith-proteo' ),
			)
		)
	);

	// General link hover color.
	$wp_customize->add_setting(
		'yith_proteo_general_link_hover_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), - 0.3 ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_general_link_hover_color',
			array(
				'label'   => esc_html__( 'General link :hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_color_shades',
			)
		)
	);

	/**
	 * Documentation and more
	 */
	$wp_customize->add_section(
		'yith_proteo_documentation',
		array(
			'title'    => esc_html__( 'Theme documentation & more', 'yith-proteo' ),
			'priority' => 80,
			'panel'    => 'yith_proteo_options',
		)
	);

	// Documentation link.
	$wp_customize->add_setting(
		'yith_proteo_documentation_link',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_documentation_link',
			array(
				'label'       => esc_html__( 'Theme documentation', 'yith-proteo' ),
				'description' => sprintf( '%1s <a href="https://docs.yithemes.com/yith-proteo/" target="_blank" rel="noopener nofollow">%2s</a>', esc_html__( 'Read theme documentation', 'yith-proteo' ), esc_html__( 'here', 'yith-proteo' ) ),
				'section'     => 'yith_proteo_documentation',
			)
		)
	);
	// Blank child theme link.
	$wp_customize->add_setting(
		'yith_proteo_child_link',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_child_link',
			array(
				'label'       => esc_html__( 'Child theme', 'yith-proteo' ),
				'description' => sprintf( '%1s <a href="https://docs.yithemes.com/yith-proteo/" target="_blank" rel="noopener nofollow">%2s</a>', esc_html__( 'Download child theme', 'yith-proteo' ), esc_html__( 'here', 'yith-proteo' ) ),
				'section'     => 'yith_proteo_documentation',
			)
		)
	);
}

add_action( 'customize_register', 'yith_proteo_customize_register' );


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yith_proteo_customize_shop_register( $wp_customize ) {
	/**
	 * Add YITH theme shop panel
	 */
	$wp_customize->add_panel(
		'yith_proteo_shop_options',
		array(
			'priority'       => 150,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'YITH Theme Shop Options', 'yith-proteo' ),
			'description'    => esc_html__( 'All shop related options for this theme', 'yith-proteo' ),
		)
	);

	/**
	 * Store notice management
	 */
	$wp_customize->add_section(
		'yith_proteo_store_notice_management',
		array(
			'title'    => esc_html__( 'Store notices', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_shop_options',
		)
	);
	// Store notice background color.
	$wp_customize->add_setting(
		'yith_proteo_store_notice_bg_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#607d8b',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_store_notice_bg_color',
			array(
				'label'   => esc_html__( 'Store notice background color', 'yith-proteo' ),
				'section' => 'yith_proteo_store_notice_management',
			)
		)
	);
	// Store notice text color.
	$wp_customize->add_setting(
		'yith_proteo_store_notice_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_store_notice_text_color',
			array(
				'label'   => esc_html__( 'Store notice text color', 'yith-proteo' ),
				'section' => 'yith_proteo_store_notice_management',
			)
		)
	);

	// Store notice font size.
	$wp_customize->add_setting(
		'yith_proteo_store_notice_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 13,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_store_notice_font_size',
		array(
			'label'   => esc_html__( 'Store notice font size (default: 13px)', 'yith-proteo' ),
			'section' => 'yith_proteo_store_notice_management',
			'type'    => 'number',
		)
	);

	/**
	 * Sale badge management
	 */
	$wp_customize->add_section(
		'yith_proteo_sale_badge_management',
		array(
			'title'    => esc_html__( 'Sale badge', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_shop_options',
		)
	);

	// Sale badge background color.
	$wp_customize->add_setting(
		'yith_proteo_sale_badge_bg_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_sale_badge_bg_color',
			array(
				'label'   => esc_html__( 'Sale badge background color', 'yith-proteo' ),
				'section' => 'yith_proteo_sale_badge_management',
			)
		)
	);
	// Sale badge text color.
	$wp_customize->add_setting(
		'yith_proteo_sale_badge_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#ffffff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_sale_badge_text_color',
			array(
				'label'   => esc_html__( 'Store notice text color', 'yith-proteo' ),
				'section' => 'yith_proteo_sale_badge_management',
			)
		)
	);
	// Store notice font size.
	$wp_customize->add_setting(
		'yith_proteo_sale_badge_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 13,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_sale_badge_font_size',
		array(
			'label'   => esc_html__( 'Sale badge font size (default: 13px)', 'yith-proteo' ),
			'section' => 'yith_proteo_sale_badge_management',
			'type'    => 'number',
		)
	);

	/**
	 * WooCommerce messages management
	 */
	$wp_customize->add_section(
		'yith_proteo_woo_messages_management',
		array(
			'title'    => esc_html__( 'WooCommerce messages', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_shop_options',
		)
	);

	// WooCommerce messages font size.
	$wp_customize->add_setting(
		'yith_proteo_woo_messages_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 14,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_woo_messages_font_size',
		array(
			'label'   => esc_html__( 'WooCommerce messages font size (default: 16px)', 'yith-proteo' ),
			'section' => 'yith_proteo_woo_messages_management',
			'type'    => 'number',
		)
	);

	// Default Messages Accent Color.
	$wp_customize->add_setting(
		'yith_proteo_woo_default_messages_accent_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#17b4a9',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_woo_default_messages_accent_color',
			array(
				'label'   => esc_html__( 'Default messages: accent color', 'yith-proteo' ),
				'section' => 'yith_proteo_woo_messages_management',
			)
		)
	);

	// Info Messages Accent Color.
	$wp_customize->add_setting(
		'yith_proteo_woo_info_messages_accent_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#e0e0e0',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_woo_info_messages_accent_color',
			array(
				'label'   => esc_html__( 'Info messages: accent color', 'yith-proteo' ),
				'section' => 'yith_proteo_woo_messages_management',
			)
		)
	);

	// Error Messages Accent Color.
	$wp_customize->add_setting(
		'yith_proteo_woo_error_messages_accent_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#ffab91',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'yith_proteo_woo_error_messages_accent_color',
			array(
				'label'   => esc_html__( 'Error messages: accent color', 'yith-proteo' ),
				'section' => 'yith_proteo_woo_messages_management',
			)
		)
	);

	/**
	 * Single product page management
	 */
	$wp_customize->add_section(
		'yith_proteo_product_page_management',
		array(
			'title'    => esc_html__( 'Single product page', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_shop_options',
		)
	);
	// Single product page related products management.
	$wp_customize->add_setting(
		'yith_proteo_product_page_related_max_number',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 4,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_related_max_number',
		array(
			'type'        => 'number',
			'label'       => esc_html__( 'Max related products to show', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_page_management',
			'description' => esc_html__( 'Choose how many related products you want to show (default: 4)', 'yith-proteo' ),
		)
	);
	// Single product page related products management.
	$wp_customize->add_setting(
		'yith_proteo_product_page_related_columns',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 4,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_related_columns',
		array(
			'type'        => 'number',
			'label'       => esc_html__( 'Related products columns', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_page_management',
			'description' => esc_html__( 'Choose how many columns with related products you want to show (default: 4)', 'yith-proteo' ),
		)
	);
	// Single Product Sidebar Management options.
	$wp_customize->add_setting(
		'yith_proteo_product_page_sidebar_position',
		array(
			'default'           => 'no-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_page_sidebar_position',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Choose the position of the sidebar on single product page', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_page_management',
			'description' => esc_html__( 'Select where to display the sidebar. You can adjust the settings from product edit view.', 'yith-proteo' ),
			'choices'     => array(
				'no-sidebar' => esc_html__( 'No sidebar', 'yith-proteo' ),
				'right'      => esc_html__( 'Right', 'yith-proteo' ),
				'left'       => esc_html__( 'Left', 'yith-proteo' ),
			),
		)
	);

	/**
	 * Product Category page management
	 */
	$wp_customize->add_section(
		'yith_proteo_product_category_page_management',
		array(
			'title'    => esc_html__( 'Product Category page', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_shop_options',
		)
	);
	$wp_customize->add_setting(
		'yith_proteo_product_category_page_sidebar_position',
		array(
			'default'           => 'no-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_category_page_sidebar_position',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Choose the position of the sidebar on product category pages', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_category_page_management',
			'description' => esc_html__( 'Select where to display the sidebar.', 'yith-proteo' ),
			'choices'     => array(
				'no-sidebar' => esc_html__( 'No sidebar', 'yith-proteo' ),
				'right'      => esc_html__( 'Right', 'yith-proteo' ),
				'left'       => esc_html__( 'Left', 'yith-proteo' ),
			),
		)
	);
	// Product Category Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_product_category_page_sidebar',
		array(
			'default'           => 'shop-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_category_page_sidebar',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Choose the product category page sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_category_page_management',
			'description' => esc_html__( 'Select the sidebar to display.', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);

	/**
	 * Product Tag page management
	 */
	$wp_customize->add_section(
		'yith_proteo_product_tag_page_management',
		array(
			'title'    => esc_html__( 'Product Tag page', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_shop_options',
		)
	);
	$wp_customize->add_setting(
		'yith_proteo_product_tag_page_sidebar_position',
		array(
			'default'           => 'no-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_tag_page_sidebar_position',
		array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Choose the position of the sidebar on product tag pages', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_tag_page_management',
			'description' => esc_html__( 'Select where to display the sidebar.', 'yith-proteo' ),
			'choices'     => array(
				'no-sidebar' => esc_html__( 'No sidebar', 'yith-proteo' ),
				'right'      => esc_html__( 'Right', 'yith-proteo' ),
				'left'       => esc_html__( 'Left', 'yith-proteo' ),
			),
		)
	);

	// Product Tag Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_product_tag_page_sidebar',
		array(
			'default'           => 'shop-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_product_tag_page_sidebar',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Choose the product tag page sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_product_tag_page_management',
			'description' => esc_html__( 'Select the sidebar to display.', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);

	/**
	 * Cart page management
	 */
	$wp_customize->add_section(
		'yith_proteo_cart_page_management',
		array(
			'title'    => esc_html__( 'Cart page', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_shop_options',
		)
	);

	// Cart Layout options.
	$wp_customize->add_setting(
		'yith_proteo_cart_layout',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_select',
			'default'           => 'one_col',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_cart_layout',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Cart layout', 'yith-proteo' ),
			'section'     => 'yith_proteo_cart_page_management',
			'description' => esc_html__( 'Choose the cart layout', 'yith-proteo' ),
			'choices'     => array(
				''         => esc_html__( 'Please select', 'yith-proteo' ),
				'one_col'  => esc_html__( 'One column layout', 'yith-proteo' ),
				'two_cols' => esc_html__( 'Two column layout', 'yith-proteo' ),
			),
		)
	);

}

if ( function_exists( 'wc' ) ) {
	add_action( 'customize_register', 'yith_proteo_customize_shop_register' );
}


add_action( 'customize_render_control_yith_proteo_google_font', 'yith_proteo_add_gfont_documentation_link' );

/**
 * Render GFont doc guide link
 */
function yith_proteo_add_gfont_documentation_link() {
	printf( '<span class="dashicons dashicons-sos" style="vertical-align: middle;"></span> <a href="%s" target="_blank" rel="noopener nofollow">%s</a>', esc_url( 'https://docs.yithemes.com/yith-proteo/customization/how-to-use-google-fonts/' ), esc_html__( 'Read the documentation to see how to retrieve a Google Font URL', 'yith-proteo' ) );
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function yith_proteo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function yith_proteo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function yith_proteo_customize_preview_js() {
	wp_enqueue_script( 'yith-proteo-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), YITH_PROTEO_VERSION, true );
}

add_action( 'customize_preview_init', 'yith_proteo_customize_preview_js' );


if ( ! function_exists( 'yith_proteo_sanitize_sidebar_position' ) ) :
	/**
	 * Sanitize default sidebar position options
	 *
	 * @param string $input Sidebar position metabox value.
	 *
	 * @return string
	 */
	function yith_proteo_sanitize_sidebar_position( $input ) {
		$valid = array(
			'no-sidebar' => esc_html__( 'No sidebar', 'yith-proteo' ),
			'right'      => esc_html__( 'Right', 'yith-proteo' ),
			'left'       => esc_html__( 'Left', 'yith-proteo' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
endif;

if ( ! function_exists( 'yith_proteo_sanitize_yes_no' ) ) :
	/**
	 * Sanitize Yes/No options
	 *
	 * @param string $input Value to sanitize (Yes and No).
	 *
	 * @return string
	 */
	function yith_proteo_sanitize_yes_no( $input ) {
		$valid = array(
			'yes' => esc_html__( 'Yes', 'yith-proteo' ),
			'no'  => esc_html__( 'No', 'yith-proteo' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';
		}
	}
endif;


if ( ! function_exists( 'yith_proteo_sanitize_select' ) ) :
	/**
	 * Select sanitization function
	 *
	 * @param string $input input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only.
	 *
	 * @param array  $setting select value to check.
	 *
	 * @return string
	 */
	function yith_proteo_sanitize_select( $input, $setting ) {

		$input = sanitize_key( $input );

		// get the list of possible select options.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// return input if valid or return default option.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}
endif;



if ( ! function_exists( 'yith_proteo_range_sanitization' ) ) {
	/**
	 * Slider sanitization
	 *
	 * @param string $input  Slider value to be sanitized.
	 *
	 * @param object $setting  Option to check.
	 *
	 * @return string    Sanitized input
	 */
	function yith_proteo_range_sanitization( $input, $setting ) {
		$attrs = $setting->manager->get_control( $setting->id )->input_attrs;

		$min  = ( isset( $attrs['min'] ) ? $attrs['min'] : $input );
		$max  = ( isset( $attrs['max'] ) ? $attrs['max'] : $input );
		$step = ( isset( $attrs['step'] ) ? $attrs['step'] : 1 );

		$number = floor( $input / $attrs['step'] ) * $attrs['step'];

		return yith_proteo_in_range( $number, $min, $max );
	}
}


if ( ! function_exists( 'yith_proteo_in_range' ) ) {
	/**
	 * Only allow values between a certain minimum & maxmium range
	 *
	 * @param int $input    Input to be sanitized.
	 * @param int $min      Min input value.
	 * @param int $max      Max input value.
	 *
	 * @return number       Sanitized input
	 */
	function yith_proteo_in_range( $input, $min, $max ) {
		if ( $input < $min ) {
			$input = $min;
		}
		if ( $input > $max ) {
			$input = $max;
		}

		return $input;
	}
}

/**
 * Add YITH Customizer CSS
 */
function yith_proteo_customize_enqueue() {
	wp_enqueue_style( 'customizer-css', get_template_directory_uri() . '/customizer-css.css', array(), YITH_PROTEO_VERSION );
}

add_action( 'customize_controls_enqueue_scripts', 'yith_proteo_customize_enqueue' );
