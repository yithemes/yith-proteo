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
		'title'    => esc_html_x( 'Blog', 'Customizer section title', 'yith-proteo' ),
		'priority' => 80,
	)
);

// Single post layout.
if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_single_post_layout',
		array(
			'default'           => 'standard',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Radio_Image(
			$wp_customize,
			'yith_proteo_single_post_layout',
			array(
				'label'   => esc_html_x( 'Single post layout', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_blog_management',
				'choices' => array(
					'standard'              => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/blog-standard.svg',
						'label' => esc_html_x( 'Standard layout', 'Customizer option value', 'yith-proteo' ),
					),
					'background_picture'    => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/blog-background-picture.svg',
						'label' => esc_html_x( 'Background picture', 'Customizer option value', 'yith-proteo' ),
					),
					'fullwidth_cover_image' => array(
						'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/blog-fullwidth-cover.svg',
						'label' => esc_html_x( 'Fullwidth cover image', 'Customizer option value', 'yith-proteo' ),
					),
				),
			)
		)
	);
}

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
			'label'           => esc_html_x( 'Post featured image height', 'Customizer option name', 'yith-proteo' ),
			'min'             => 180,
			'max'             => 1000,
			'step'            => 10,
			'default'         => 400,
			'unit'            => 'px',
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
			'label'   => esc_html_x( 'Post thumbnail background overlay', 'Customizer option name', 'yith-proteo' ),
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
			'label'   => esc_html_x( 'Overlay color opacity %', 'Customizer option name', 'yith-proteo' ),
			'min'     => 0,
			'max'     => 100,
			'step'    => 1,
			'default' => 70,
			'unit'    => '%',
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
			'label'   => esc_html_x( 'Post thumbnail text color', 'Customizer option name', 'yith-proteo' ),
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
				'label'       => esc_html_x( 'Show date badge', 'Customizer option name', 'yith-proteo' ),
				'section'     => 'yith_proteo_blog_management',
				'description' => esc_html_x( 'Choose whether to show the post date badge or not.', 'Customizer option description', 'yith-proteo' ),
			)
		)
	);
}

// Read more text.
$wp_customize->add_setting(
	'yith_proteo_blog_read_more_text',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html_x( 'Read more  &#10230;', 'Customizer option default value', 'yith-proteo' ),
	)
);
$wp_customize->add_control(
	'yith_proteo_blog_read_more_text',
	array(
		'type'    => 'text',
		'section' => 'yith_proteo_blog_management',
		'label'   => esc_html_x( 'Read more text', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Show navigation links', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Show post author', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Show post categories and tags', 'Customizer option name', 'yith-proteo' ),
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
				'label'   => esc_html_x( 'Show post date', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_blog_management',
			)
		)
	);
}
