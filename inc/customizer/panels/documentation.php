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
			'title'    => esc_html_x( 'Theme documentation & tools', 'Customizer section title', 'yith-proteo' ),
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
				'label'       => esc_html_x( 'Theme documentation', 'Customizer option name', 'yith-proteo' ),
				'description' => sprintf( '%1s <a href="https://docs.yithemes.com/yith-proteo/" target="_blank" rel="noopener nofollow">%2s</a>', esc_html_x( 'Read theme documentation', 'Customizer option description', 'yith-proteo' ), esc_html_x( 'here', 'Customizer option description', 'yith-proteo' ) ),
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
				'label'       => esc_html_x( 'Child theme', 'Customizer option name', 'yith-proteo' ),
				'description' => sprintf( '%1s <a href="https://docs.yithemes.com/yith-proteo/" target="_blank" rel="noopener nofollow">%2s</a>', esc_html_x( 'Download child theme', 'Customizer option description', 'yith-proteo' ), esc_html_x( 'here', 'Customizer option description', 'yith-proteo' ) ),
				'section'     => 'yith_proteo_documentation',
			)
		)
	);

	if ( defined( 'YITH_PROTEO_TOOLKIT' ) ) {
		// Setup Wizard Link.
		$wp_customize->add_setting(
			'yith_proteo_wizard_link',
			array(
				'default'           => '',
				'transport'         => 'postMessage',
				'sanitize_callback' => 'wp_kses_post',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Notice(
				$wp_customize,
				'yith_proteo_wizard_link',
				array(
					'label'       => esc_html_x( 'Setup Wizard', 'Customizer option name', 'yith-proteo' ),
					'description' => sprintf( '%1s <a href="' . esc_url( admin_url( 'themes.php?page=setup-wizard' ) ) . '" target="_blank" rel="noopener nofollow">%2s</a>', esc_html_x( 'Install demo content and suggested plugins', 'Customizer option description', 'yith-proteo' ), esc_html_x( 'here', 'Customizer option description', 'yith-proteo' ) ),
					'section'     => 'yith_proteo_documentation',
				)
			)
		);
	}
