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
				'label'   => esc_html__( 'Footer background color', 'yith-proteo' ),
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
	// Footer alignment.
	$wp_customize->add_setting(
		'yith_proteo_footer_align',
		array(
			'default'           => 'left',
			'sanitize_callback' => 'yith_proteo_sanitize_radio',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_footer_align',
		array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Elements alignment', 'yith-proteo' ),
			'section' => 'yith_proteo_footer_management',
			'choices' => array(
				'left'   => esc_html__( 'Left', 'yith-proteo' ),
				'right'  => esc_html__( 'Right', 'yith-proteo' ),
				'center' => esc_html__( 'Center', 'yith-proteo' ),
			),
		)
	);

	// Footer sidebar 1 options.
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
				'label'   => esc_html__( 'Select how many widgets per row to show for Footer Sidebar 1 (new rows are automatically created).', 'yith-proteo' ),
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'section' => 'yith_proteo_footer_management',
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
				'label'   => esc_html__( 'Select how many widgets per row to show for Footer Sidebar 2 (new rows are automatically created).', 'yith-proteo' ),
				'min'     => 1,
				'max'     => 6,
				'step'    => 1,
				'section' => 'yith_proteo_footer_management',
			)
		)
	);
