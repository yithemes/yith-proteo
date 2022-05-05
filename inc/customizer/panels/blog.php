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

// Blog general options group.
$wp_customize->add_setting(
	'yith_proteo_blog_general_options_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_blog_general_options_group_title',
		array(
			'label'    => esc_html_x( 'General options', 'Customizer options group title', 'yith-proteo' ),
			'section'  => 'yith_proteo_blog_management',
			'children' => array(
				'yith_proteo_blog_read_more_text',
				'yith_proteo_blog_loop_post_title_font_size',
				'yith_proteo_blog_loop_post_title_color',
				'yith_proteo_blog_loop_post_title_text_transform',
				'yith_proteo_blog_date_on_image_enable',
				'yith_proteo_blog_show_post_navigation',
				'yith_proteo_blog_show_post_author',
				'yith_proteo_blog_show_post_categories_and_tags',
				'yith_proteo_blog_show_post_date',
				'yith_proteo_blog_page_posts_per_row',
				'yith_proteo_blog_page_first_post_wide',
				'yith_proteo_blog_page_sticky_posts_wide',
				'yith_proteo_blog_page_posts_spacing',
				'yith_proteo_blog_page_posts_with_border',
				'yith_proteo_blog_page_posts_border_width',
				'yith_proteo_blog_page_posts_border_radius',
				'yith_proteo_blog_page_posts_border_color',
			),
		)
	)
);

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

// Post title font size.
$wp_customize->add_setting(
	'yith_proteo_blog_loop_post_title_font_size',
	array(
		'sanitize_callback' => 'absint',
		'default'           => get_theme_mod( 'yith_proteo_h2_font_size', 40 ),
	)
);
$wp_customize->add_control(
	'yith_proteo_blog_loop_post_title_font_size',
	array(
		'label'   => esc_html_x( 'Titles font size', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_blog_management',
		'type'    => 'number',
	)
);

// Post title color options.
$wp_customize->add_setting(
	'yith_proteo_blog_loop_post_title_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => get_theme_mod( 'yith_proteo_h2_font_color', '#404040' ),
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_blog_loop_post_title_color',
		array(
			'label'   => esc_html_x( 'Titles font color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_blog_management',
		)
	)
);

// Post title text transform.
$wp_customize->add_setting(
	'yith_proteo_blog_loop_post_title_text_transform',
	array(
		'default'           => 'none',
		'sanitize_callback' => 'yith_proteo_sanitize_select',
	)
);
$wp_customize->add_control(
	'yith_proteo_blog_loop_post_title_text_transform',
	array(
		'type'    => 'select',
		'label'   => esc_html_x( 'Titles text transform', 'Customizer option name', 'yith-proteo' ),
		'section' => 'yith_proteo_blog_management',
		'choices' => array(
			'none'       => esc_html_x( 'None', 'Customizer option value', 'yith-proteo' ),
			'uppercase'  => esc_html_x( 'Uppercase', 'Customizer option value', 'yith-proteo' ),
			'lowercase'  => esc_html_x( 'Lowercase', 'Customizer option value', 'yith-proteo' ),
			'capitalize' => esc_html_x( 'Capitalize', 'Customizer option value', 'yith-proteo' ),
		),
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

// Blog page posts per row.
$wp_customize->add_setting(
	'yith_proteo_blog_page_posts_per_row',
	array(
		'default'           => 2,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);
$wp_customize->add_control(
	new WP_Customize_Range(
		$wp_customize,
		'yith_proteo_blog_page_posts_per_row',
		array(
			'label'   => esc_html_x( 'Posts per row', 'Customizer option name', 'yith-proteo' ),
			'min'     => 1,
			'max'     => 4,
			'step'    => 1,
			'default' => 2,
			'section' => 'yith_proteo_blog_management',
		)
	)
);

// First post full width.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_blog_page_first_post_wide',
		array(
			'default'           => 'yes',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_blog_page_first_post_wide',
			array(
				'label'   => esc_html_x( 'Show first post full width', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_blog_management',
			)
		)
	);
}

// Sticky posts full width.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_blog_page_sticky_posts_wide',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_blog_page_sticky_posts_wide',
			array(
				'label'   => esc_html_x( 'Show sticky posts full width', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_blog_management',
			)
		)
	);
}

// Posts spacing.
$wp_customize->add_setting(
	'yith_proteo_blog_page_posts_spacing',
	array(
		'default'           => array(
			'horizontal' => 30,
			'vertical'   => 50,
		),
		'sanitize_callback' => 'yith_proteo_sanitize_int_array',
	)
);
$wp_customize->add_control(
	new Customizer_Control_Spacing(
		$wp_customize,
		'yith_proteo_blog_page_posts_spacing',
		array(
			'label'    => esc_html_x( 'Space between posts (px)', 'Customizer option name', 'yith-proteo' ),
			'section'  => 'yith_proteo_blog_management',
			'choices'  => array(
				'horizontal' => array(
					'name' => esc_html_x( 'Horizontal', 'Customizer option value', 'yith-proteo' ),
				),
				'vertical'   => array(
					'name' => esc_html_x( 'Vertical', 'Customizer option value', 'yith-proteo' ),
				),
			),
			'priority' => 10,
		)
	)
);

// Posts border enabler.
if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
	$wp_customize->add_setting(
		'yith_proteo_blog_page_posts_with_border',
		array(
			'default'           => 'no',
			'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		new Customizer_Control_Yes_No(
			$wp_customize,
			'yith_proteo_blog_page_posts_with_border',
			array(
				'label'   => esc_html_x( 'Enable border', 'Customizer option name', 'yith-proteo' ),
				'section' => 'yith_proteo_blog_management',
			)
		)
	);
}

// Posts border width.
$wp_customize->add_setting(
	'yith_proteo_blog_page_posts_border_width',
	array(
		'default'           => array(
			'top'    => 1,
			'right'  => 1,
			'bottom' => 1,
			'left'   => 1,
		),
		'sanitize_callback' => 'yith_proteo_sanitize_int_array',
	)
);
$wp_customize->add_control(
	new Customizer_Control_Spacing(
		$wp_customize,
		'yith_proteo_blog_page_posts_border_width',
		array(
			'label'   => esc_html_x( 'Border width (px)', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_blog_management',
			'choices' => array(
				'top'    => array(
					'name' => esc_html_x( 'Top', 'Customizer option value', 'yith-proteo' ),
				),
				'right'  => array(
					'name' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
				),
				'bottom' => array(
					'name' => esc_html_x( 'Bottom', 'Customizer option value', 'yith-proteo' ),
				),
				'left'   => array(
					'name' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
				),
			),
		)
	)
);

// Posts border width.
$wp_customize->add_setting(
	'yith_proteo_blog_page_posts_border_radius',
	array(
		'default'           => array(
			'top-left'     => 0,
			'top-right'    => 0,
			'bottom-right' => 0,
			'bottom-left'  => 0,
		),
		'sanitize_callback' => 'yith_proteo_sanitize_int_array',
	)
);
$wp_customize->add_control(
	new Customizer_Control_Spacing(
		$wp_customize,
		'yith_proteo_blog_page_posts_border_radius',
		array(
			'label'   => esc_html_x( 'Border radius (px)', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_blog_management',
			'choices' => array(
				'top-left'     => array(
					'name' => esc_html_x( 'Top Left', 'Customizer option value', 'yith-proteo' ),
				),
				'top-right'    => array(
					'name' => esc_html_x( 'Top Right', 'Customizer option value', 'yith-proteo' ),
				),
				'bottom-right' => array(
					'name' => esc_html_x( 'Bottom Right', 'Customizer option value', 'yith-proteo' ),
				),
				'bottom-left'  => array(
					'name' => esc_html_x( 'Bottom Left', 'Customizer option value', 'yith-proteo' ),
				),
			),
		)
	)
);

// Posts border color.
$wp_customize->add_setting(
	'yith_proteo_blog_page_posts_border_color',
	array(
		'sanitize_callback' => 'yith_proteo_sanitize_alpha_colors',
		'default'           => '#ebebeb',
	)
);
$wp_customize->add_control(
	new Customizer_Alpha_Color_Control(
		$wp_customize,
		'yith_proteo_blog_page_posts_border_color',
		array(
			'label'   => esc_html_x( 'Border color', 'Customizer option name', 'yith-proteo' ),
			'section' => 'yith_proteo_blog_management',
		)
	)
);

// Single post options group.
$wp_customize->add_setting(
	'yith_proteo_single_post_options_group_title',
	array(
		'default'           => '',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	new WP_Customize_Notice(
		$wp_customize,
		'yith_proteo_single_post_options_group_title',
		array(
			'label'    => esc_html_x( 'Post page options', 'Customizer options group title', 'yith-proteo' ),
			'section'  => 'yith_proteo_blog_management',
			'children' => array(
				'yith_proteo_single_post_layout',
				'yith_proteo_single_post_fullwidth_cover_cropping_custom_height',
				'yith_proteo_single_post_background_color',
				'yith_proteo_single_post_bg_alpha',
				'yith_proteo_single_post_thumbnail_text_color',
			),
		)
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
			'label'   => esc_html_x( 'Post featured image height', 'Customizer option name', 'yith-proteo' ),
			'min'     => 180,
			'max'     => 1000,
			'step'    => 10,
			'default' => 400,
			'unit'    => 'px',
			'section' => 'yith_proteo_blog_management',
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
