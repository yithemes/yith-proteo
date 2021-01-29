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
			'title'    => esc_html__( 'Footer options', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Footer background', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Background color', 'yith-proteo' ),
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
				'label'   => __( 'Background image', 'yith-proteo' ),
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
					'label'           => esc_html__( '100% background image', 'yith-proteo' ),
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
			'label'           => esc_html__( 'Background repeat', 'yith-proteo' ),
			'section'         => 'yith_proteo_footer_management',
			'choices'         => array(
				'no-repeat' => esc_html__( 'Don\'t repeat', 'yith-proteo' ),
				'repeat'    => esc_html__( 'Repeat horizontally and vertically', 'yith-proteo' ),
				'repeat-x'  => esc_html__( 'Repeat horizontally', 'yith-proteo' ),
				'repeat-y'  => esc_html__( 'Repeat vertically', 'yith-proteo' ),
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
			'label'           => esc_html__( 'Background position', 'yith-proteo' ),
			'section'         => 'yith_proteo_footer_management',
			'choices'         => array(
				'left-top'      => esc_html__( 'Left top', 'yith-proteo' ),
				'left-center'   => esc_html__( 'Left center', 'yith-proteo' ),
				'left-bottom'   => esc_html__( 'Left bottom', 'yith-proteo' ),
				'right-top'     => esc_html__( 'Right top', 'yith-proteo' ),
				'right-center'  => esc_html__( 'Right center', 'yith-proteo' ),
				'right-bottom'  => esc_html__( 'Right bottom', 'yith-proteo' ),
				'center-top'    => esc_html__( 'Center top', 'yith-proteo' ),
				'center-center' => esc_html__( 'Center', 'yith-proteo' ),
				'center-bottom' => esc_html__( 'Center bottom', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Footer typography', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Font size (default: 16px)', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Font color', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Hyperlink color', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Hyperlink :hover color', 'yith-proteo' ),
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
			'label'   => esc_html__( 'Widgets title font size', 'yith-proteo' ),
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
				'label'   => esc_html__( 'Widgets title color', 'yith-proteo' ),
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
					'label'   => esc_html__( 'Elements alignment', 'yith-proteo' ),
					'section' => 'yith_proteo_footer_management',
					'choices' => array(
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
				'label'   => esc_html__( 'Footer widgets', 'yith-proteo' ),
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
					'label'   => esc_html__( 'Enable footer widget area #1', 'yith-proteo' ),
					'section' => 'yith_proteo_footer_management',
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
				'label'           => esc_html__( 'Footer widget area #1 width (%).', 'yith-proteo' ),
				'min'             => 20,
				'max'             => 100,
				'step'            => 5,
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
				'label'           => esc_html__( 'Columns in footer widget area #1.', 'yith-proteo' ),
				'min'             => 1,
				'max'             => 6,
				'step'            => 1,
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
					'label'   => esc_html__( 'Enable footer widget area #2', 'yith-proteo' ),
					'section' => 'yith_proteo_footer_management',
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
				'label'           => esc_html__( 'Footer widget area #2 width (%).', 'yith-proteo' ),
				'min'             => 20,
				'max'             => 100,
				'step'            => 5,
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
				'label'           => esc_html__( 'Columns in footer widget area #2', 'yith-proteo' ),
				'min'             => 1,
				'max'             => 6,
				'step'            => 1,
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
					'label'           => esc_html__( 'Put the two widget areas side by side', 'yith-proteo' ),
					'section'         => 'yith_proteo_footer_management',
					'active_callback' => 'yith_proteo_is_footer_sidebars_side_by_side_available',
				)
			)
		);
	}
