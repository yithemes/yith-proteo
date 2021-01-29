<?php
/**
 * YITH-proteo Theme Customizer - Topbar
 *
 * @package yith-proteo
 */

	/**
	 * Add topbar management.
	 */
	$wp_customize->add_section(
		'yith_proteo_topbar_management',
		array(
			'title'    => esc_html__( 'Topbar', 'yith-proteo' ),
			'priority' => 10,
			'panel'    => 'yith_proteo_header_and_topbar_management',
		)
	);

	// Topbar enable.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_topbar_enable',
			array(
				'default'           => 'no',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_topbar_enable',
				array(
					'label'       => esc_html__( 'Show topbar', 'yith-proteo' ),
					'section'     => 'yith_proteo_topbar_management',
					'description' => esc_html__( 'Choose whether to show the site topbar or not', 'yith-proteo' ),
				)
			)
		);
	}

	// Topbar background color.
	$wp_customize->add_setting(
		'yith_proteo_topbar_background_color',
		array(
			'default'           => '#ebebeb',
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors', // validates 3 or 6 digit HTML hex color code.
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_topbar_background_color',
			array(
				'label'           => esc_html__( 'Background color', 'yith-proteo' ),
				'section'         => 'yith_proteo_topbar_management',
				'active_callback' => 'yith_proteo_topbar_is_enabled',
			)
		)
	);

	// Topbar spacing control.
	$wp_customize->add_setting(
		'yith_proteo_topbar_spacing',
		array(
			'default'           => array(
				'top'    => 15,
				'right'  => 0,
				'bottom' => 15,
				'left'   => 0,
			),
			'sanitize_callback' => 'yith_proteo_sanitize_int_array',
		)
	);
	$wp_customize->add_control(
		new Customizer_Control_Spacing(
			$wp_customize,
			'yith_proteo_topbar_spacing',
			array(
				'label'           => __( 'Spacing (px)', 'yith-proteo' ),
				'section'         => 'yith_proteo_topbar_management',
				'active_callback' => 'yith_proteo_topbar_is_enabled',
				'choices'         => array(
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

	// Topbar font size options.
	$wp_customize->add_setting(
		'yith_proteo_topbar_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 16,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_topbar_font_size',
		array(
			'label'           => esc_html__( 'Font size (default: 16px)', 'yith-proteo' ),
			'section'         => 'yith_proteo_topbar_management',
			'type'            => 'number',
			'active_callback' => 'yith_proteo_topbar_is_enabled',
		)
	);
	// Topbar font color options.
	$wp_customize->add_setting(
		'yith_proteo_topbar_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_topbar_font_color',
			array(
				'label'           => esc_html__( 'Font color', 'yith-proteo' ),
				'section'         => 'yith_proteo_topbar_management',
				'active_callback' => 'yith_proteo_topbar_is_enabled',
			)
		)
	);
	// Topbar link color options.
	$wp_customize->add_setting(
		'yith_proteo_topbar_link_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#448a85',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_topbar_link_color',
			array(
				'label'           => esc_html__( 'Hyperlink color', 'yith-proteo' ),
				'section'         => 'yith_proteo_topbar_management',
				'active_callback' => 'yith_proteo_topbar_is_enabled',
			)
		)
	);
	// Topbar link :hover color options.
	$wp_customize->add_setting(
		'yith_proteo_topbar_link_hover_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_topbar_link_color', '#448a85' ), - 0.3 ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_topbar_link_hover_color',
			array(
				'label'           => esc_html__( 'Hyperlink :hover color', 'yith-proteo' ),
				'section'         => 'yith_proteo_topbar_management',
				'active_callback' => 'yith_proteo_topbar_is_enabled',
			)
		)
	);
	// Topbar alignment.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_topbar_align',
			array(
				'default'           => 'right',
				'sanitize_callback' => 'yith_proteo_sanitize_radio',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_topbar_align',
				array(
					'label'           => esc_html__( 'Elements alignment', 'yith-proteo' ),
					'section'         => 'yith_proteo_topbar_management',
					'active_callback' => 'yith_proteo_topbar_is_enabled',
					'choices'         => array(
						'left'   => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/align-left.svg',
							'label' => esc_html__( 'Left', 'yith-proteo' ),
						),
						'center' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/align-center.svg',
							'label' => esc_html__( 'Center', 'yith-proteo' ),
						),
						'right'  => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/align-right.svg',
							'label' => esc_html__( 'Right', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}

	// Topbar bottom border.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_topbar_bottom_border',
			array(
				'default'           => 'no',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_topbar_bottom_border',
				array(
					'label'           => esc_html__( 'Show bottom border', 'yith-proteo' ),
					'section'         => 'yith_proteo_topbar_management',
					'active_callback' => 'yith_proteo_topbar_is_enabled',
				)
			)
		);
	}

	// Topbar bottom border.
	$wp_customize->add_setting(
		'yith_proteo_topbar_bottom_border_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#000000',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_topbar_bottom_border_color',
			array(
				'label'           => esc_html__( 'Border color', 'yith-proteo' ),
				'section'         => 'yith_proteo_topbar_management',
				'active_callback' => 'yith_proteo_topbar_has_bottom_border',
			)
		)
	);

	// Topbar bottom border width.
	$wp_customize->add_setting(
		'yith_proteo_topbar_bottom_border_width',
		array(
			'default'           => 2,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Range(
			$wp_customize,
			'yith_proteo_topbar_bottom_border_width',
			array(
				'label'           => esc_html__( 'Input and textarea border radius (default: 0px)', 'yith-proteo' ),
				'min'             => 1,
				'max'             => 50,
				'step'            => 1,
				'section'         => 'yith_proteo_topbar_management',
				'active_callback' => 'yith_proteo_topbar_has_bottom_border',
			)
		)
	);
