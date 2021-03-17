<?php
/**
 * YITH-proteo Theme Customizer - Footer Credits
 *
 * @package yith-proteo
 */

	/**
	 * Add footer credits management
	 */
	$wp_customize->add_section(
		'yith_proteo_footer_credits_management',
		array(
			'title'    => esc_html_x( 'Footer credits', 'Customizer section title', 'yith-proteo' ),
			'priority' => 20,
			'panel'    => 'yith_proteo_footer_and_credits',
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
			'label'   => esc_html_x( 'Enter here the content of the footer credits area', 'Customizer option description', 'yith-proteo' ),
			'section' => 'yith_proteo_footer_credits_management',
			'type'    => 'textarea',
		)
	);
	// Footer credit background color.
	$wp_customize->add_setting(
		'yith_proteo_footer_credits_background_color',
		array(
			'default'           => '#f0f0f0',
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_footer_credits_background_color',
			array(
				'label'   => esc_html_x( 'Background color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_credits_management',
			)
		)
	);
	// Footer credits font size options.
	$wp_customize->add_setting(
		'yith_proteo_footer_credits_font_size',
		array(
			'sanitize_callback' => 'absint',
			'default'           => 16,
		)
	);
	$wp_customize->add_control(
		'yith_proteo_footer_credits_font_size',
		array(
			'label'   => esc_html_x( 'Font size', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_footer_credits_management',
			'type'    => 'number',
		)
	);
	// Footer Credits font color options.
	$wp_customize->add_setting(
		'yith_proteo_footer_credits_font_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#404040',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_footer_credits_font_color',
			array(
				'label'   => esc_html_x( 'Font color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_credits_management',
			)
		)
	);
	// Footer Credits link color options.
	$wp_customize->add_setting(
		'yith_proteo_footer_credits_link_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => '#448a85',
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_footer_credits_link_color',
			array(
				'label'   => esc_html_x( 'Hyperlink color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_credits_management',
			)
		)
	);
	// Footer Credits link :hover color options.
	$wp_customize->add_setting(
		'yith_proteo_footer_credits_link_hover_color',
		array(
			'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
			'default'           => yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_footer_credits_link_color', '#448a85' ), - 0.3 ),
		)
	);
	$wp_customize->add_control(
		new Customizer_Alpha_Color_Control(
			$wp_customize,
			'yith_proteo_footer_credits_link_hover_color',
			array(
				'label'   => esc_html_x( 'Hyperlink :hover color', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_footer_credits_management',
			)
		)
	);
	// Footer Credits alignment.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_footer_credits_align',
			array(
				'default'           => 'left',
				'sanitize_callback' => 'yith_proteo_sanitize_radio',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_footer_credits_align',
				array(
					'label'   => esc_html_x( 'Elements alignment', 'Customizer option name', 'yith-proteo' ),
					'section' => 'yith_proteo_footer_credits_management',
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
