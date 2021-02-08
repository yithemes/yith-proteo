<?php
/**
 * YITH-proteo Theme Customizer - Header
 *
 * @package yith-proteo
 */

	/**
	 * Add Header management.
	 */
	$wp_customize->add_section(
		'yith_proteo_header_management',
		array(
			'title'    => esc_html__( 'Header layout and style', 'yith-proteo' ),
			'priority' => 20,
			'panel'    => 'yith_proteo_header_and_topbar_management',
		)
	);

	// General layout options.
	$wp_customize->add_setting(
		'yith_proteo_header_layout_group_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_header_layout_group_title',
			array(
				'label'   => esc_html__( 'Header layout', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header Layout options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_header_layout',
			array(
				'default'           => 'left_logo_navigation_inline',
				'sanitize_callback' => 'yith_proteo_sanitize_radio',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_header_layout',
				array(
					'label'   => esc_html__( 'Header layout', 'yith-proteo' ),
					'section' => 'yith_proteo_header_management',
					'choices' => array(
						'left_logo_navigation_below'   => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/left-logo.svg',
							'label' => esc_html__( 'Left logo, navigation below', 'yith-proteo' ),
						),
						'left_logo_navigation_inline'  => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/left-logo-inline.svg',
							'label' => esc_html__( 'Left logo, navigation inline', 'yith-proteo' ),
						),
						'center_logo_navigation_below' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/center-logo.svg',
							'label' => esc_html__( 'Centered logo, navigation below', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}

	// Header spacing control.
	$wp_customize->add_setting(
		'yith_proteo_header_spacing',
		array(
			'default'           => array(
				'top'    => 15,
				'right'  => 15,
				'bottom' => 15,
				'left'   => 15,
			),
			'sanitize_callback' => 'yith_proteo_sanitize_int_array',
		)
	);
	$wp_customize->add_control(
		new Customizer_Control_Spacing(
			$wp_customize,
			'yith_proteo_header_spacing',
			array(
				'label'   => __( 'Spacing (px)', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
				'choices' => array(
					'top'    => array(
						'name' => esc_html__( 'Top', 'yith-proteo' ),
					),
					'right'  => array(
						'name' => esc_html__( 'Right', 'yith-proteo' ),
					),
					'bottom' => array(
						'name' => esc_html__( 'Bottom', 'yith-proteo' ),
					),
					'left'   => array(
						'name' => esc_html__( 'Left', 'yith-proteo' ),
					),
				),
			)
		)
	);

	// Header fullwidth.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_header_fullwidth',
			array(
				'default'           => 'no',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_header_fullwidth',
				array(
					'label'       => esc_html__( 'Enable full width header', 'yith-proteo' ),
					'section'     => 'yith_proteo_header_management',
					'description' => esc_html__( 'Choose whether to make the header full width or not.', 'yith-proteo' ),
				)
			)
		);
	}

	// Header elements group.
	$wp_customize->add_setting(
		'yith_proteo_header_elements_group_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_header_elements_group_title',
			array(
				'label'   => esc_html__( 'Header elements', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header search widget.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_header_search_widget',
			array(
				'default'           => 'no',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_header_search_widget',
				array(
					'label'   => esc_html__( 'Show search icon', 'yith-proteo' ),
					'section' => 'yith_proteo_header_management',
				)
			)
		);
	}

	// Header cart widget.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_header_cart_widget',
			array(
				'default'           => 'no',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_header_cart_widget',
				array(
					'label'   => esc_html__( 'Show cart icon', 'yith-proteo' ),
					'section' => 'yith_proteo_header_management',
				)
			)
		);
	}

	// Header account widget.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_header_account_widget',
			array(
				'default'           => 'no',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_header_account_widget',
				array(
					'label'   => esc_html__( 'Show user account icon', 'yith-proteo' ),
					'section' => 'yith_proteo_header_management',
				)
			)
		);
	}

	// Header show sidebar.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_show_header_sidebar',
			array(
				'default'           => 'yes',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_show_header_sidebar',
				array(
					'label'       => esc_html__( 'Show header sidebar', 'yith-proteo' ),
					'section'     => 'yith_proteo_header_management',
					'description' => esc_html__( 'Choose whether to show or not the header widget area', 'yith-proteo' ),
				)
			)
		);
	}

	// Header menu typography group.
	$wp_customize->add_setting(
		'yith_proteo_header_menu_group_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_header_menu_group_title',
			array(
				'label'   => esc_html__( 'Header menu options', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_font',
		array(
			'sanitize_callback' => 'yith_proteo_google_font_sanitization',
			'default'           => '{"font":"Montserrat","regularweight":"regular","category":"sans-serif"}',
		)
	);
	$wp_customize->add_control(
		new Google_Font_Select_Custom_Control(
			$wp_customize,
			'yith_proteo_header_main_menu_font',
			array(
				'label'       => __( 'Font', 'yith-proteo' ),
				'section'     => 'yith_proteo_header_management',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby'    => 'alpha',
				),
			)
		)
	);
	// Header menu font size options.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 14,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_header_main_menu_font_size',
		array(
			'label'   => esc_html__( 'Font size (default: 14px)', 'yith-proteo' ),
			'section' => 'yith_proteo_header_management',
			'type'    => 'number',
		)
	);
	// Main menu text transformation.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_text_transform',
		array(
			'default'           => 'uppercase',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_header_main_menu_text_transform',
		array(
			'type'    => 'select',
			'label'   => esc_html__( 'Text transform', 'yith-proteo' ),
			'section' => 'yith_proteo_header_management',
			'choices' => array(
				'none'       => esc_html__( 'None', 'yith-proteo' ),
				'uppercase'  => esc_html__( 'Uppercase', 'yith-proteo' ),
				'lowercase'  => esc_html__( 'Lowercase', 'yith-proteo' ),
				'capitalize' => esc_html__( 'Capitalize', 'yith-proteo' ),
			),
		)
	);

	// Header menu letter spacing.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_letter_spacing',
		array(
			'default'           => 2,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_header_main_menu_letter_spacing',
			array(
				'label'   => esc_html__( 'Letter spacing (px)', 'yith-proteo' ),
				'min'     => -2,
				'max'     => 30,
				'step'    => 1,
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header menu color.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_color',
		array(
			'default'           => get_theme_mod( 'yith_proteo_base_font_color', '#404040' ),
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_header_main_menu_color',
			array(
				'label'   => esc_html__( 'Color', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header menu color hover.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_hover_color',
		array(
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ),
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_header_main_menu_hover_color',
			array(
				'label'   => esc_html__( 'Hover color', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Site title spacing control.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_spacing',
		array(
			'default'           => array(
				'top'    => 0,
				'right'  => 0,
				'bottom' => 0,
				'left'   => 0,
			),
			'sanitize_callback' => 'yith_proteo_sanitize_int_array',
		)
	);
	$wp_customize->add_control(
		new Customizer_Control_Spacing(
			$wp_customize,
			'yith_proteo_header_main_menu_spacing',
			array(
				'label'   => __( 'Spacing (px)', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
				'choices' => array(
					'top'    => array(
						'name' => esc_html__( 'Top', 'yith-proteo' ),
					),
					'right'  => array(
						'name' => esc_html__( 'Right', 'yith-proteo' ),
					),
					'bottom' => array(
						'name' => esc_html__( 'Bottom', 'yith-proteo' ),
					),
					'left'   => array(
						'name' => esc_html__( 'Left', 'yith-proteo' ),
					),
				),
			)
		)
	);

	// Header sticky group.
	$wp_customize->add_setting(
		'yith_proteo_sticky_header_group_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_sticky_header_group_title',
			array(
				'label'   => esc_html__( 'Sticky header', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header sticky.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_header_sticky',
			array(
				'default'           => 'no',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_header_sticky',
				array(
					'label'       => esc_html__( 'Enable sticky header', 'yith-proteo' ),
					'section'     => 'yith_proteo_header_management',
					'description' => esc_html__( 'Choose whether to make the header stick to the page when scrolling down', 'yith-proteo' ),
				)
			)
		);
	}

	// Sticky header background color.
	$wp_customize->add_setting(
		'yith_proteo_sticky_header_background_color',
		array(
			'default'           => get_theme_mod( 'yith_proteo_header_background_color', '#ffffff' ),
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_sticky_header_background_color',
			array(
				'label'           => esc_html__( 'Background color', 'yith-proteo' ),
				'section'         => 'yith_proteo_header_management',
				'active_callback' => 'yith_proteo_sticky_header_is_enabled',
			)
		)
	);

	// Sticky header menu color.
	$wp_customize->add_setting(
		'yith_proteo_sticky_header_main_menu_color',
		array(
			'default'           => get_theme_mod( 'yith_proteo_base_font_color', get_theme_mod( 'yith_proteo_header_main_menu_color', '#404040' ) ),
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_sticky_header_main_menu_color',
			array(
				'label'           => esc_html__( 'Menu color', 'yith-proteo' ),
				'section'         => 'yith_proteo_header_management',
				'active_callback' => 'yith_proteo_sticky_header_is_enabled',
			)
		)
	);

	// Sticky header menu color hover.
	$wp_customize->add_setting(
		'yith_proteo_sticky_header_main_menu_hover_color',
		array(
			'default'           => get_theme_mod( 'yith_proteo_main_color_shade', get_theme_mod( 'yith_proteo_header_main_menu_hover_color', '#448a85' ) ),
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_sticky_header_main_menu_hover_color',
			array(
				'label'           => esc_html__( 'Hover color', 'yith-proteo' ),
				'section'         => 'yith_proteo_header_management',
				'active_callback' => 'yith_proteo_sticky_header_is_enabled',
			)
		)
	);

	// Sticky header spacing control.
	$wp_customize->add_setting(
		'yith_proteo_sticky_header_spacing',
		array(
			'default'           => array(
				'top'    => 8,
				'right'  => 15,
				'bottom' => 8,
				'left'   => 15,
			),
			'sanitize_callback' => 'yith_proteo_sanitize_int_array',
		)
	);
	$wp_customize->add_control(
		new Customizer_Control_Spacing(
			$wp_customize,
			'yith_proteo_sticky_header_spacing',
			array(
				'label'   => __( 'Spacing (px)', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
				'choices' => array(
					'top'    => array(
						'name' => esc_html__( 'Top', 'yith-proteo' ),
					),
					'right'  => array(
						'name' => esc_html__( 'Right', 'yith-proteo' ),
					),
					'bottom' => array(
						'name' => esc_html__( 'Bottom', 'yith-proteo' ),
					),
					'left'   => array(
						'name' => esc_html__( 'Left', 'yith-proteo' ),
					),
				),
			)
		)
	);
