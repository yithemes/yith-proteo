<?php
/**
 * YITH-proteo Theme Customizer - Footer
 *
 * @package yith-proteo
 */

	/**
	 * Add footer sidebar management.
	 */
	$wp_customize->add_section(
		'yith_proteo_footer_management',
		array(
			'title'    => esc_html_x( 'Footer options', 'Customizer section title', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_footer_and_credits',
		)
	);

	// Footer background option groupo title.
	$wp_customize->add_setting(
		'yith_proteo_footer_background_group_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_footer_background_group_title',
			array(
				'label'   => esc_html_x( 'Footer background', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_management',
			)
		)
	);

	// Footer background color.
	$wp_customize->add_setting(
		'yith_proteo_footer_background_color',
		array(
			'default'           => '#f7f7f7',
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_footer_background_color',
			array(
				'label'   => esc_html_x( 'Background color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_management',
			)
		)
	);

	// Footer background image.
	$wp_customize->add_setting(
		'yith_proteo_footer_background_image',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'yith_proteo_footer_background_image',
			array(
				'label'   => esc_html_x( 'Background image', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_management',
			)
		)
	);

	// Footer background image background_size.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_footer_background_size_full',
			array(
				'default'           => 'yes',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_footer_background_size_full',
				array(
					'label'           => esc_html_x( '100% background image', 'Customizer option name', 'yith-proteo' ),
					'section'         => 'yith_proteo_footer_management',
					'active_callback' => 'yith_proteo_footer_has_custom_background',
				)
			)
		);
	}

	// Footer background image background_repeat.
	$wp_customize->add_setting(
		'yith_proteo_footer_background_repeat',
		array(
			'default'           => 'repeat',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_footer_background_repeat',
		array(
			'type'            => 'select',
			'label'           => esc_html_x( 'Background repeat', 'Customizer option name', 'yith-proteo' ),
			'section'         => 'yith_proteo_footer_management',
			'choices'         => array(
				'no-repeat' => esc_html_x( 'Don\'t repeat', 'Customizer option value', 'yith-proteo' ),
				'repeat'    => esc_html_x( 'Repeat horizontally and vertically', 'Customizer option value', 'yith-proteo' ),
				'repeat-x'  => esc_html_x( 'Repeat horizontally', 'Customizer option value', 'yith-proteo' ),
				'repeat-y'  => esc_html_x( 'Repeat vertically', 'Customizer option value', 'yith-proteo' ),
			),
			'active_callback' => 'yith_proteo_footer_background_not_is_full_width',
		)
	);

	// Footer background position.
	$wp_customize->add_setting(
		'yith_proteo_footer_background_position',
		array(
			'default'           => 'center-center',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_footer_background_position',
		array(
			'type'            => 'select',
			'label'           => esc_html_x( 'Background position', 'Customizer option name', 'yith-proteo' ),
			'section'         => 'yith_proteo_footer_management',
			'choices'         => array(
				'left-top'      => esc_html_x( 'Left top', 'Customizer option value', 'yith-proteo' ),
				'left-center'   => esc_html_x( 'Left center', 'Customizer option value', 'yith-proteo' ),
				'left-bottom'   => esc_html_x( 'Left bottom', 'Customizer option value', 'yith-proteo' ),
				'right-top'     => esc_html_x( 'Right top', 'Customizer option value', 'yith-proteo' ),
				'right-center'  => esc_html_x( 'Right center', 'Customizer option value', 'yith-proteo' ),
				'right-bottom'  => esc_html_x( 'Right bottom', 'Customizer option value', 'yith-proteo' ),
				'center-top'    => esc_html_x( 'Center top', 'Customizer option value', 'yith-proteo' ),
				'center-center' => esc_html_x( 'Center', 'Customizer option value', 'yith-proteo' ),
				'center-bottom' => esc_html_x( 'Center bottom', 'Customizer option value', 'yith-proteo' ),
			),
			'active_callback' => 'yith_proteo_footer_has_custom_background',
		)
	);

	// Footer typography option groupo title.
	$wp_customize->add_setting(
		'yith_proteo_footer_typography_group_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_footer_typography_group_title',
			array(
				'label'   => esc_html_x( 'Footer typography', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_management',
			)
		)
	);

	// Footer font size options.
	$wp_customize->add_setting(
		'yith_proteo_footer_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 16,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_footer_font_size',
		array(
			'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_footer_management',
			'type'    => 'number',
		)
	);

	// Footer font color options.
	$wp_customize->add_setting(
		'yith_proteo_footer_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_footer_font_color',
			array(
				'label'   => esc_html_x( 'Font color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_management',
			)
		)
	);
	// Footer link color options.
	$wp_customize->add_setting(
		'yith_proteo_footer_link_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#448a85',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_footer_link_color',
			array(
				'label'   => esc_html_x( 'Hyperlink color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_management',
			)
		)
	);
	// Footer link :hover color options.
	$wp_customize->add_setting(
		'yith_proteo_footer_link_hover_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_footer_link_color', '#448a85' ), - 0.3 ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_footer_link_hover_color',
			array(
				'label'   => esc_html_x( 'Hyperlink :hover color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_management',
			)
		)
	);
	// Footer widget title font size options.
	$wp_customize->add_setting(
		'yith_proteo_footer_widgets_title_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => ( get_theme_mod( 'yith_proteo_base_font_size', 16 ) * 1.5 ),
		)
	);
	$wp_customize->add_control(
		'yith_proteo_footer_widgets_title_font_size',
		array(
			'label'   => esc_html_x( 'Widgets title Font size', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_footer_management',
			'type'    => 'number',
		)
	);
	// Footer widget title color options.
	$wp_customize->add_setting(
		'yith_proteo_footer_widgets_title_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => get_theme_mod( 'yith_proteo_h2_font_color', '#404040' ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_footer_widgets_title_color',
			array(
				'label'   => esc_html_x( 'Widgets title color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_management',
			)
		)
	);

	// Footer alignment.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_footer_align',
			array(
				'default'           => 'left',
				'sanitize_callback' => 'yith_proteo_sanitize_radio',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_footer_align',
				array(
					'label'   => esc_html_x( 'Elements alignment', 'Customizer option name', 'yith-proteo' ),
					'section' => 'yith_proteo_footer_management',
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

	// Footer widgets option groupo title.
	$wp_customize->add_setting(
		'yith_proteo_footer_widgets_group_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_footer_widgets_group_title',
			array(
				'label'   => esc_html_x( 'Footer widgets', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_management',
			)
		)
	);

	// Footer sidebar 1 enabler.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_footer_sidebar_1_enable',
			array(
				'default'           => 'yes',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_footer_sidebar_1_enable',
				array(
					'label'       => esc_html_x( 'Enable widget area #1', 'Customizer option name', 'yith-proteo' ),
					'description' => esc_html_x( 'Widgets will be shown in columns. Columns number can be set in the options below.', 'Customizer option description', 'yith-proteo' ),
					'section'     => 'yith_proteo_footer_management',
				)
			)
		);
	}

	// Footer sidebar 1 width.
	$wp_customize->add_setting(
		'yith_proteo_footer_sidebar_1_width',
		array(
			'default'           => 100,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_footer_sidebar_1_width',
			array(
				'label'           => esc_html_x( 'Widget area #1 width', 'Customizer option name', 'yith-proteo' ),
				'min'             => 20,
				'max'             => 100,
				'step'            => 5,
				'default'         => 100,
				'unit'            => '%',
				'section'         => 'yith_proteo_footer_management',
				'active_callback' => 'yith_proteo_is_footer_sidebar_one_enabled',
			)
		)
	);

	// Footer sidebar 1 columns.
	$wp_customize->add_setting(
		'yith_proteo_footer_sidebar_1_widget_per_row',
		array(
			'default'           => 4,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_footer_sidebar_1_widget_per_row',
			array(
				'label'           => esc_html_x( 'Columns', 'Customizer option name', 'yith-proteo' ),
				'min'             => 1,
				'max'             => 6,
				'step'            => 1,
				'default'         => 4,
				'section'         => 'yith_proteo_footer_management',
				'active_callback' => 'yith_proteo_is_footer_sidebar_one_enabled',
			)
		)
	);



	// Footer sidebar 2 enabler.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_footer_sidebar_2_enable',
			array(
				'default'           => 'yes',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_footer_sidebar_2_enable',
				array(
					'label'       => esc_html_x( 'Enable widget area #2', 'Customizer option name', 'yith-proteo' ),
					'description' => esc_html_x( 'Widgets will be shown in columns. Columns number can be set in the options below.', 'Customizer option description', 'yith-proteo' ),
					'section'     => 'yith_proteo_footer_management',
				)
			)
		);
	}

	// Footer sidebar 2 width.
	$wp_customize->add_setting(
		'yith_proteo_footer_sidebar_2_width',
		array(
			'default'           => 100,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_footer_sidebar_2_width',
			array(
				'label'           => esc_html_x( 'Widget area #2 width', 'Customizer option name', 'yith-proteo' ),
				'min'             => 20,
				'max'             => 100,
				'step'            => 5,
				'default'         => 100,
				'unit'            => '%',
				'section'         => 'yith_proteo_footer_management',
				'active_callback' => 'yith_proteo_is_footer_sidebar_two_enabled',
			)
		)
	);

	// Footer sidebar 2 options.
	$wp_customize->add_setting(
		'yith_proteo_footer_sidebar_2_widget_per_row',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_footer_sidebar_2_widget_per_row',
			array(
				'label'           => esc_html_x( 'Columns', 'Customizer option name', 'yith-proteo' ),
				'min'             => 1,
				'max'             => 6,
				'step'            => 1,
				'default'         => 1,
				'section'         => 'yith_proteo_footer_management',
				'active_callback' => 'yith_proteo_is_footer_sidebar_two_enabled',
			)
		)
	);

	// Footer sidebars side by side.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_footer_sidebars_side_by_side',
			array(
				'default'           => 'no',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_footer_sidebars_side_by_side',
				array(
					'label'           => esc_html_x( 'Put the two widget areas side by side', 'Customizer option name', 'yith-proteo' ),
					'section'         => 'yith_proteo_footer_management',
					'active_callback' => 'yith_proteo_is_footer_sidebars_side_by_side_available',
				)
			)
		);
	}
