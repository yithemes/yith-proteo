<?php
/**
 * YITH-proteo Theme Customizer - Header
 *
 * @package yith-proteo
 */

	/**
	 * Add Header management.topba
	 */
	$wp_customize->add_section(
		'yith_proteo_header_management',
		array(
			'title'    => esc_html_x( 'Header layout and style', 'Customizer section title', 'yith-proteo' ),
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
				'label'    => esc_html_x( 'Header layout', 'Customizer options group title', 'yith-proteo' ),
				'section'  => 'yith_proteo_header_management',
				'children' => array(
					'yith_proteo_header_layout',
					'yith_proteo_header_spacing',
					'yith_proteo_header_fullwidth',
				),
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
					'label'   => esc_html_x( 'Header layout', 'Customizer option name', 'yith-proteo' ),
					'section' => 'yith_proteo_header_management',
					'choices' => array(
						'left_logo_navigation_below'   => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/left-logo.svg',
							'label' => esc_html_x( 'Left logo, navigation below', 'Customizer option value', 'yith-proteo' ),
						),
						'left_logo_navigation_inline'  => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/left-logo-inline.svg',
							'label' => esc_html_x( 'Left logo, navigation inline', 'Customizer option value', 'yith-proteo' ),
						),
						'center_logo_navigation_below' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/center-logo.svg',
							'label' => esc_html_x( 'Centered logo, navigation below', 'Customizer option value', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Spacing (px)', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
				'choices' => array(
					'top'    => array(
						'name' => esc_html_x( 'Top', 'Customizer option value', 'yith-proteo' ),
					),
					'right'  => array(
						'name' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
					),
					'bottom' => array(
						'name' => esc_html_x( 'Bottom', 'Customizer option value', 'yith-proteo' ),
					),
					'left'   => array(
						'name' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
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
					'label'       => esc_html_x( 'Enable full width header', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_header_management',
					'description' => esc_html_x( 'Choose whether to make the header full width or not.', 'Customizer option description', 'yith-proteo' ),
				)
			)
		);
	}

	// Header bottom separator group.
	$wp_customize->add_setting(
		'yith_proteo_header_bottom_separator_group_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_header_bottom_separator_group_title',
			array(
				'label'    => esc_html_x( 'Header bottom separator', 'Customizer options group title', 'yith-proteo' ),
				'section'  => 'yith_proteo_header_management',
				'children' => array(
					'yith_proteo_header_bottom_separator_style',
					'yith_proteo_header_bottom_line_color',
					'yith_proteo_header_bottom_line_thickness',
					'yith_proteo_header_bottom_line_width',
					'yith_proteo_header_bottom_line_alignment',
					'yith_proteo_header_bottom_shadow_color',
					'yith_proteo_header_bottom_shadow_hoffset',
					'yith_proteo_header_bottom_shadow_voffset',
					'yith_proteo_header_bottom_shadow_blur',
					'yith_proteo_header_bottom_shadow_spread',
					'yith_proteo_header_bottom_image',
					'yith_proteo_header_bottom_image_alignment',
				),
			)
		)
	);

	// Header Layout options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_header_bottom_separator_style',
			array(
				'default'           => 'none',
				'sanitize_callback' => 'yith_proteo_sanitize_radio',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_header_bottom_separator_style',
				array(
					'label'   => esc_html_x( 'Separator style', 'Customizer option name', 'yith-proteo' ),
					'section' => 'yith_proteo_header_management',
					'choices' => array(
						'none'   => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/left-logo.svg',
							'label' => esc_html_x( 'None', 'Customizer option value', 'yith-proteo' ),
						),
						'line'   => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/left-logo.svg',
							'label' => esc_html_x( 'Simple line', 'Customizer option value', 'yith-proteo' ),
						),
						'shadow' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/center-logo.svg',
							'label' => esc_html_x( 'Shadow', 'Customizer option value', 'yith-proteo' ),
						),
						'image'  => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/left-logo-inline.svg',
							'label' => esc_html_x( 'Image', 'Customizer option value', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}

	// Header bottom border color.
	$wp_customize->add_setting(
		'yith_proteo_header_bottom_line_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#000000',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_header_bottom_line_color',
			array(
				'label'   => esc_html_x( 'Border color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header bottom border thickness.
	$wp_customize->add_setting(
		'yith_proteo_header_bottom_line_thickness',
		array(
			'default'           => 2,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_header_bottom_line_thickness',
			array(
				'label'   => esc_html_x( 'Border thickness (px)', 'Customizer option name', 'yith-proteo' ),
				'min'     => 1,
				'max'     => 50,
				'step'    => 1,
				'default' => 2,
				'unit'    => 'px',
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header bottom border width.
	$wp_customize->add_setting(
		'yith_proteo_header_bottom_line_width',
		array(
			'default'           => 100,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_header_bottom_line_width',
			array(
				'label'   => esc_html_x( 'Border width (%)', 'Customizer option name', 'yith-proteo' ),
				'min'     => 10,
				'max'     => 100,
				'step'    => 10,
				'default' => 100,
				'unit'    => '%',
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header bottom border alignment.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_header_bottom_line_alignment',
			array(
				'default'           => 'center',
				'sanitize_callback' => 'yith_proteo_sanitize_radio',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_header_bottom_line_alignment',
				array(
					'label'   => esc_html_x( 'Border alignment', 'Customizer option name', 'yith-proteo' ),
					'section' => 'yith_proteo_header_management',
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

		// Header bottom shadow color.
	$wp_customize->add_setting(
		'yith_proteo_header_bottom_shadow_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#0000004D',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_header_bottom_shadow_color',
			array(
				'label'   => esc_html_x( 'Shadow color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header bottom shadow h-offset.
	$wp_customize->add_setting(
		'yith_proteo_header_bottom_shadow_hoffset',
		array(
			'default'           => -2,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_header_bottom_shadow_hoffset',
			array(
				'label'   => esc_html_x( 'Shadow h-offset (px)', 'Customizer option name', 'yith-proteo' ),
				'min'     => -30,
				'max'     => 30,
				'step'    => 1,
				'default' => -2,
				'unit'    => 'px',
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header bottom shadow v-offset.
	$wp_customize->add_setting(
		'yith_proteo_header_bottom_shadow_voffset',
		array(
			'default'           => 2,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_header_bottom_shadow_voffset',
			array(
				'label'   => esc_html_x( 'Shadow v-offset (px)', 'Customizer option name', 'yith-proteo' ),
				'min'     => -30,
				'max'     => 30,
				'step'    => 1,
				'default' => 2,
				'unit'    => 'px',
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header bottom shadow blur.
	$wp_customize->add_setting(
		'yith_proteo_header_bottom_shadow_blur',
		array(
			'default'           => 80,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_header_bottom_shadow_blur',
			array(
				'label'   => esc_html_x( 'Shadow blur (px)', 'Customizer option name', 'yith-proteo' ),
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'default' => 80,
				'unit'    => 'px',
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header bottom shadow spread.
	$wp_customize->add_setting(
		'yith_proteo_header_bottom_shadow_spread',
		array(
			'default'           => -30,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_header_bottom_shadow_spread',
			array(
				'label'   => esc_html_x( 'Shadow spread (px)', 'Customizer option name', 'yith-proteo' ),
				'min'     => -30,
				'max'     => 30,
				'step'    => 1,
				'default' => -30,
				'unit'    => 'px',
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header bottom separator image.
	$wp_customize->add_setting(
		'yith_proteo_header_bottom_image',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'yith_proteo_header_bottom_image',
			array(
				'label'   => esc_html_x( 'Image to use as separator', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
			)
		)
	);

	// Header bottom separator image alignment.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_header_bottom_image_alignment',
			array(
				'default'           => 'center',
				'sanitize_callback' => 'yith_proteo_sanitize_radio',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_header_bottom_image_alignment',
				array(
					'label'   => esc_html_x( 'Image alignment', 'Customizer option name', 'yith-proteo' ),
					'section' => 'yith_proteo_header_management',
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
				'label'    => esc_html_x( 'Header elements', 'Customizer options group title', 'yith-proteo' ),
				'section'  => 'yith_proteo_header_management',
				'children' => array(
					'yith_proteo_header_search_widget',
					'yith_proteo_header_cart_widget',
					'yith_proteo_header_cart_widget_custom_image_control',
					'yith_proteo_header_account_widget',
					'yith_proteo_show_header_sidebar',
				),
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
					'label'   => esc_html_x( 'Show search icon', 'Customizer option name', 'yith-proteo' ),
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
					'label'   => esc_html_x( 'Show cart icon', 'Customizer option name', 'yith-proteo' ),
					'section' => 'yith_proteo_header_management',
				)
			)
		);
	}

	$wp_customize->add_setting(
		'yith_proteo_header_cart_widget_custom_icon',
		array(
			'default'           => esc_url( get_template_directory_uri() . '/img/proteo-cart-icon.png' ),
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'yith_proteo_header_cart_widget_custom_image_control',
			array(
				'label'         => esc_html_x( 'Cart icon', 'Customizer option name', 'yith-proteo' ),
				'section'       => 'yith_proteo_header_management',
				'settings'      => 'yith_proteo_header_cart_widget_custom_icon',
				'description'   => esc_html_x( 'Use this option to upload your cart icon', 'Customizer option description', 'yith-proteo' ),
				'button_labels' => array(
					'select' => esc_html_x( 'Select icon', 'Customizer option value', 'yith-proteo' ),
					'remove' => esc_html_x( 'Use default icon', 'Customizer option value', 'yith-proteo' ),
					'change' => esc_html_x( 'Change icon', 'Customizer option value', 'yith-proteo' ),
				),
			)
		)
	);

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
					'label'   => esc_html_x( 'Show user account icon', 'Customizer option name', 'yith-proteo' ),
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
					'label'       => esc_html_x( 'Show header widget area', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_header_management',
					'description' => esc_html_x( 'Choose whether to show or not the header widget area', 'Customizer option description', 'yith-proteo' ),
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
				'label'    => esc_html_x( 'Header menu options', 'Customizer options group title', 'yith-proteo' ),
				'section'  => 'yith_proteo_header_management',
				'children' => array(
					'yith_proteo_header_main_menu_font',
					'yith_proteo_header_main_menu_text_transform',
					'yith_proteo_header_main_menu_font_size',
					'yith_proteo_header_main_menu_letter_spacing',
					'yith_proteo_header_main_menu_color',
					'yith_proteo_header_main_menu_hover_color',
					'yith_proteo_header_main_menu_spacing',
				),
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
				'label'       => esc_html_x( 'Font', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Text transform', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_header_management',
			'choices' => array(
				'none'       => esc_html_x( 'None', 'Customizer option value', 'yith-proteo' ),
				'uppercase'  => esc_html_x( 'Uppercase', 'Customizer option value', 'yith-proteo' ),
				'lowercase'  => esc_html_x( 'Lowercase', 'Customizer option value', 'yith-proteo' ),
				'capitalize' => esc_html_x( 'Capitalize', 'Customizer option value', 'yith-proteo' ),
			),
		)
	);

	// Header menu letter spacing.
	$wp_customize->add_setting(
		'yith_proteo_header_main_menu_letter_spacing',
		array(
			'default'           => 2,
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_header_main_menu_letter_spacing',
			array(
				'label'   => esc_html_x( 'Letter spacing (px)', 'Customizer option name', 'yith-proteo' ),
				'min'     => -2,
				'max'     => 30,
				'default' => 2,
				'step'    => 1,
				'unit'    => 'px',
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
				'label'   => esc_html_x( 'Color', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Hover color', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Spacing (px)', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_header_management',
				'choices' => array(
					'top'    => array(
						'name' => esc_html_x( 'Top', 'Customizer option value', 'yith-proteo' ),
					),
					'right'  => array(
						'name' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
					),
					'bottom' => array(
						'name' => esc_html_x( 'Bottom', 'Customizer option value', 'yith-proteo' ),
					),
					'left'   => array(
						'name' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
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
				'label'    => esc_html_x( 'Sticky header', 'Customizer options group title', 'yith-proteo' ),
				'section'  => 'yith_proteo_header_management',
				'children' => array(
					'yith_proteo_header_sticky',
					'yith_proteo_sticky_header_background_color',
					'yith_proteo_sticky_header_main_menu_color',
					'yith_proteo_sticky_header_main_menu_hover_color',
					'yith_proteo_sticky_header_spacing',
				),
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
					'label'       => esc_html_x( 'Enable sticky header', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_header_management',
					'description' => esc_html_x( 'Choose whether to make the header stick to the page when scrolling down', 'Customizer option description', 'yith-proteo' ),
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
				'label'           => esc_html_x( 'Background color', 'Customizer option name', 'yith-proteo' ),
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
				'label'           => esc_html_x( 'Menu color', 'Customizer option name', 'yith-proteo' ),
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
				'label'           => esc_html_x( 'Hover color', 'Customizer option name', 'yith-proteo' ),
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
				'label'           => esc_html_x( 'Spacing (px)', 'Customizer option name', 'yith-proteo' ),
				'section'         => 'yith_proteo_header_management',
				'choices'         => array(
					'top'    => array(
						'name' => esc_html_x( 'Top', 'Customizer option value', 'yith-proteo' ),
					),
					'right'  => array(
						'name' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
					),
					'bottom' => array(
						'name' => esc_html_x( 'Bottom', 'Customizer option value', 'yith-proteo' ),
					),
					'left'   => array(
						'name' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
					),
				),
				'active_callback' => 'yith_proteo_sticky_header_is_enabled',
			)
		)
	);
