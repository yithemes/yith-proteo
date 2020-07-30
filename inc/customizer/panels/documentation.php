<?php
/**
 * YITH-proteo Theme Customizer - Documentation
 *
 * @package yith-proteo
 */

/**
 * Documentation and more
 */
	$wp_customize->add_section(
		'yith_proteo_documentation',
		array(
			'title'    => esc_html__( 'Theme documentation & tools', 'yith-proteo' ),
			'priority' => 1000,
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
