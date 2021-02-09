<?php
/**
 * YITH-proteo Theme Customizer - Layout
 *
 * @package yith-proteo
 */

/**
 * Layout management
 */
$wp_customize->add_section(
	'yith_proteo_layout_management',
	array(
		'title'    => esc_html__( 'Layout', 'yith-proteo' ),
		'priority' => 100,
		'panel'    => 'yith_proteo_extra',
	)
);

// General layout options.
$wp_customize->add_setting(
	'yith_proteo_global_layout_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_global_layout_group_title',
		array(
			'label'   => esc_html__( 'Global layout options', 'yith-proteo' ),
			'section' => 'yith_proteo_layout_management',
		)
	)
);

// Site content spacing control.
$wp_customize->add_setting(
	'yith_proteo_site_content_spacing',
	array(
		'default'           => array(
			'top'    => 50,
			'right'  => 0,
			'bottom' => 50,
			'left'   => 0,
		),
		'sanitize_callback' => 'yith_proteo_sanitize_int_array',
	)
);
$wp_customize->add_control(
	new Customizer_Control_Spacing(
		$wp_customize,
		'yith_proteo_site_content_spacing',
		array(
			'label'   => __( 'Site content spacing (px)', 'yith-proteo' ),
			'section' => 'yith_proteo_layout_management',
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

// Fullwidth enable.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_layout_full_width',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_layout_full_width',
			array(
				'label'       => esc_html__( 'Use full width layout', 'yith-proteo' ),
				'section'     => 'yith_proteo_layout_management',
				'description' => esc_html__( 'Choose whether to use a full width layout. No matter which resolution your screen has.', 'yith-proteo' ),
			)
		)
	);
}

// Page title layout options.
$wp_customize->add_setting(
	'yith_proteo_page_title_layout_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_page_title_layout_group_title',
		array(
			'label'   => esc_html__( 'Page title options', 'yith-proteo' ),
			'section' => 'yith_proteo_layout_management',
		)
	)
);

// Page title layout options.
if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_page_title_layout',
		array(
			'default'           => 'inside',
			'sanitize_callback' => 'yith_proteo_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Radio_Image(
			$wp_customize,
			'yith_proteo_page_title_layout',
			array(
				'label'   => esc_html__( 'Layout', 'yith-proteo' ),
				'section' => 'yith_proteo_layout_management',
				'choices' => array(
					'inside'  => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/title-layout-inside.svg',
						'label' => esc_html__( 'Inside page content', 'yith-proteo' ),
					),
					'outside' => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/title-layout-outside.svg',
						'label' => esc_html__( 'Outside page content', 'yith-proteo' ),
					),
				),
			)
		)
	);
}

// Page title alignment.
if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_page_title_align',
		array(
			'default'           => 'center',
			'sanitize_callback' => 'yith_proteo_sanitize_radio',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Radio_Image(
			$wp_customize,
			'yith_proteo_page_title_align',
			array(
				'label'   => esc_html__( 'Alignment', 'yith-proteo' ),
				'section' => 'yith_proteo_layout_management',
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
