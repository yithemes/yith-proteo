<?php
/**
 * YITH-proteo Theme Customizer - Blog
 *
 * @package yith-proteo
 */

/**
 * Blog options management
 */
$wp_customize->add_section(
	'yith_proteo_blog_management',
	array(
		'title'    => esc_html__( 'Blog', 'yith-proteo' ),
		'priority' => 80,
	)
);

// Single post layout.
$wp_customize->add_setting(
	'yith_proteo_single_post_layout',
	array(
		'default'           => 'standard',
		'sanitize_callback' => 'yith_proteo_sanitize_radio',
	)
);
$wp_customize->add_control(
	'yith_proteo_single_post_layout',
	array(
		'type'        => 'radio',
		'label'       => esc_html__( 'Choose the single post layout', 'yith-proteo' ),
		'section'     => 'yith_proteo_blog_management',
		'description' => esc_html__( 'Disable sidebars if you want to use Background picture layout.', 'yith-proteo' ),
		'choices'     => array(
			'standard'              => esc_html__( 'Standard', 'yith-proteo' ),
			'background_picture'    => esc_html__( 'Background picture', 'yith-proteo' ),
			'fullwidth_cover_image' => esc_html__( 'Fullwidth cover image', 'yith-proteo' ),
		),
	)
);

$wp_customize->add_setting(
	'yith_proteo_single_post_fullwidth_cover_cropping_custom_height',
	array(
		'default'              => 400,
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_single_post_fullwidth_cover_cropping_custom_height',
		array(
			'label'           => esc_html__( 'Post featured image height', 'yith-proteo' ),
			'min'             => 180,
			'max'             => 1000,
			'step'            => 10,
			'section'         => 'yith_proteo_blog_management',
			'active_callback' => 'yith_proteo_blog_layout_is_fullwidth_image',
		)
	)
);

// Single post thumbnail background color.
$wp_customize->add_setting(
	'yith_proteo_single_post_background_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#448a85',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_single_post_background_color',
		array(
			'label'   => esc_html__( 'Post thumbnail background overlay', 'yith-proteo' ),
			'section' => 'yith_proteo_blog_management',
		)
	)
);
// Single post thumbnail background color opacity.
$wp_customize->add_setting(
	'yith_proteo_single_post_bg_alpha',
	array(
		'default'           => 70,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_single_post_bg_alpha',
		array(
			'label'   => esc_html__( 'Overlay color opacity % (default: 70%)', 'yith-proteo' ),
			'min'     => 0,
			'max'     => 100,
			'step'    => 1,
			'section' => 'yith_proteo_blog_management',
		)
	)
);

// Single post thumbnail text color.
$wp_customize->add_setting(
	'yith_proteo_single_post_thumbnail_text_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#ffffff',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_single_post_thumbnail_text_color',
		array(
			'label'   => esc_html__( 'Post thumbnail text color', 'yith-proteo' ),
			'section' => 'yith_proteo_blog_management',
		)
	)
);

// Date hover image enable.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_blog_date_on_image_enable',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_blog_date_on_image_enable',
			array(
				'label'       => esc_html__( 'Show date badge', 'yith-proteo' ),
				'section'     => 'yith_proteo_blog_management',
				'description' => esc_html__( 'Choose whether to show the post date badge or not.', 'yith-proteo' ),
			)
		)
	);
}

// Read more text.
$wp_customize->add_setting(
	'yith_proteo_blog_read_more_text',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Read more  &#10230;', 'yith-proteo' ),
	)
);
$wp_customize->add_control(
	'yith_proteo_blog_read_more_text',
	array(
		'type'    => 'text',
		'section' => 'yith_proteo_blog_management',
		'label'   => esc_html__( 'Read more text', 'yith-proteo' ),
	)
);

// Navigation enable.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_blog_show_post_navigation',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_blog_show_post_navigation',
			array(
				'label'   => esc_html__( 'Show navigation links', 'yith-proteo' ),
				'section' => 'yith_proteo_blog_management',
			)
		)
	);
}

// Post author enable.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_blog_show_post_author',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_blog_show_post_author',
			array(
				'label'   => esc_html__( 'Show post author', 'yith-proteo' ),
				'section' => 'yith_proteo_blog_management',
			)
		)
	);
}

// Post categories enable.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_blog_show_post_categories_and_tags',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_blog_show_post_categories_and_tags',
			array(
				'label'   => esc_html__( 'Show post categories and tags', 'yith-proteo' ),
				'section' => 'yith_proteo_blog_management',
			)
		)
	);
}

// Post date enable.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_blog_show_post_date',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_blog_show_post_date',
			array(
				'label'   => esc_html__( 'Show post date', 'yith-proteo' ),
				'section' => 'yith_proteo_blog_management',
			)
		)
	);
}