<?php
/**
 * YITH-proteo Theme Customizer Sidebars section
 *
 * @package yith-proteo
 */

	/**
	 * Add default sidebar management
	 */
	$wp_customize->add_section(
		'yith_proteo_sidebar_management',
		array(
			'title'    => esc_html_x( 'Sidebars', 'Customizer section title', 'yith-proteo' ),
			'priority' => 35,
		)
	);

	// Sidebar Layout options Group options.
	$wp_customize->add_setting(
		'yith_proteo_sidebar_layout_options_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_sidebar_layout_options_group_title',
			array(
				'label'   => esc_html_x( 'Layout options', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_sidebar_management',
			)
		)
	);

	// Sidebar sticky.
	if ( class_exists( 'Customizer_Control_Yes_No' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_sidebar_sticky',
			array(
				'default'           => 'yes',
				'sanitize_callback' => 'yith_proteo_sanitize_yes_no',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Yes_No(
				$wp_customize,
				'yith_proteo_sidebar_sticky',
				array(
					'label'       => esc_html_x( 'Enable sticky sidebar', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_sidebar_management',
					'description' => esc_html_x( 'Choose whether to make the sidebar stick to the page when scrolling down', 'Customizer option description', 'yith-proteo' ),
				)
			)
		);
	}

	// Default Sidebar Group options.
	$wp_customize->add_setting(
		'yith_proteo_default_sidebar_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_default_sidebar_group_title',
			array(
				'label'   => esc_html_x( 'Pages sidebar', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_sidebar_management',
			)
		)
	);

	// Default Sidebar Management options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_default_sidebar_position',
			array(
				'default'           => 'right',
				'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_default_sidebar_position',
				array(
					'label'       => esc_html_x( 'Sidebar position for pages', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_sidebar_management',
					'description' => esc_html_x( 'Select where to display the default sidebar. You can adjust the settings from the page/post edit view.', 'Customizer option description', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html_x( 'No sidebar', 'Customizer option value', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}


	// Default Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_default_sidebar',
		array(
			'default'           => 'sidebar-1',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_default_sidebar',
		array(
			'type'            => 'select',
			'label'           => esc_html_x( 'Sidebar to show', 'Customizer option name', 'yith-proteo' ),
			'section'         => 'yith_proteo_sidebar_management',
			'description'     => esc_html_x( 'Select the sidebar to display. It will be used for archive pages too.', 'Customizer option description', 'yith-proteo' ),
			'choices'         => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
			'active_callback' => 'yith_proteo_default_sidebar_is_enabled',
		)
	);

	// Blog page Sidebar Group options.
	$wp_customize->add_setting(
		'yith_proteo_blog_page_sidebar_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_blog_page_sidebar_group_title',
			array(
				'label'   => esc_html_x( 'Blog page sidebar', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_sidebar_management',
			)
		)
	);

	// Blog Sidebar Management options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_blog_page_sidebar_position',
			array(
				'default'           => 'right',
				'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_blog_page_sidebar_position',
				array(
					'label'       => esc_html_x( 'Sidebar position for the blog page', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_sidebar_management',
					'description' => esc_html_x( 'Select where to display the sidebar. You can pick a specific sidebar from the page edit view.', 'Customizer option description', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html_x( 'No sidebar', 'Customizer option value', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}

	// Blog Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_blog_sidebar',
		array(
			'default'           => 'sidebar-1',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_blog_sidebar',
		array(
			'type'            => 'select',
			'label'           => esc_html_x( 'Sidebar to show', 'Customizer option name', 'yith-proteo' ),
			'section'         => 'yith_proteo_sidebar_management',
			'description'     => esc_html_x( 'Select the sidebar to display. You can pick a specific sidebar from the single post edit page.', 'Customizer option description', 'yith-proteo' ),
			'choices'         => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
			'active_callback' => 'yith_proteo_blog_page_sidebar_is_enabled',
		)
	);

	// Posts Sidebar Group options.
	$wp_customize->add_setting(
		'yith_proteo_default_posts_sidebar_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_default_posts_sidebar_group_title',
			array(
				'label'   => esc_html_x( 'Posts sidebar', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_sidebar_management',
			)
		)
	);

	// Default Posts Sidebar Management options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_default_posts_sidebar_position',
			array(
				'default'           => get_theme_mod( 'yith_proteo_default_sidebar_position', 'right' ),
				'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_default_posts_sidebar_position',
				array(
					'label'       => esc_html_x( 'Sidebar position for posts', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_sidebar_management',
					'description' => esc_html_x( 'Select where to display the default sidebar. You can adjust the settings from the post edit view.', 'Customizer option description', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html_x( 'No sidebar', 'Customizer option value', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}


	// Default Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_default_posts_sidebar',
		array(
			'default'           => get_theme_mod( 'yith_proteo_default_sidebar', 'sidebar-1' ),
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_default_posts_sidebar',
		array(
			'type'        => 'select',
			'label'       => esc_html_x( 'Sidebar to show', 'Customizer option name', 'yith-proteo' ),
			'section'     => 'yith_proteo_sidebar_management',
			'description' => esc_html_x( 'Select the sidebar to display.', 'Customizer option description', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);

	// Blog Category Sidebar Group options.
	$wp_customize->add_setting(
		'yith_proteo_blog_category_sidebar_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_blog_category_sidebar_group_title',
			array(
				'label'   => esc_html_x( 'Blog categories sidebar', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_sidebar_management',
			)
		)
	);

	// Blog Category Sidebar Management options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_blog_category_sidebar_position',
			array(
				'default'           => 'right',
				'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_blog_category_sidebar_position',
				array(
					'label'       => esc_html_x( 'Sidebar position for blog category pages', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_sidebar_management',
					'description' => esc_html_x( 'Select where to display the sidebar.', 'Customizer option description', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html_x( 'No sidebar', 'Customizer option value', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}

	// Blog Category Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_blog_category_sidebar',
		array(
			'default'           => 'blog-category-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_blog_category_sidebar',
		array(
			'type'            => 'select',
			'label'           => esc_html_x( 'Sidebar to show', 'Customizer option name', 'yith-proteo' ),
			'section'         => 'yith_proteo_sidebar_management',
			'description'     => esc_html_x( 'Select the sidebar to display.', 'Customizer option description', 'yith-proteo' ),
			'choices'         => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
			'active_callback' => 'yith_proteo_blog_category_sidebar_is_enabled',
		)
	);

	// Blog Tag Sidebar Group options.
	$wp_customize->add_setting(
		'yith_proteo_blog_tag_sidebar_group_title',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Notice(
			$wp_customize,
			'yith_proteo_blog_tag_sidebar_group_title',
			array(
				'label'   => esc_html_x( 'Blog tags sidebar', 'Customizer options group title', 'yith-proteo' ),
				'section' => 'yith_proteo_sidebar_management',
			)
		)
	);

	// Blog Tag Sidebar Management options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_blog_tag_sidebar_position',
			array(
				'default'           => 'right',
				'sanitize_callback' => 'yith_proteo_sanitize_sidebar_position',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_blog_tag_sidebar_position',
				array(
					'label'       => esc_html_x( 'Sidebar position for blog tag pages', 'Customizer option name', 'yith-proteo' ),
					'section'     => 'yith_proteo_sidebar_management',
					'description' => esc_html_x( 'Select where to display the sidebar.', 'Customizer option description', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html_x( 'No sidebar', 'Customizer option value', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html_x( 'Left', 'Customizer option value', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html_x( 'Right', 'Customizer option value', 'yith-proteo' ),
						),
					),
				)
			)
		);
	}

	// Blog Tag Sidebar Chooser.
	$wp_customize->add_setting(
		'yith_proteo_blog_tag_sidebar',
		array(
			'default'           => 'blog-tag-sidebar',
			'sanitize_callback' => 'yith_proteo_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'yith_proteo_blog_tag_sidebar',
		array(
			'type'            => 'select',
			'label'           => esc_html_x( 'Sidebar to show', 'Customizer option name', 'yith-proteo' ),
			'section'         => 'yith_proteo_sidebar_management',
			'description'     => esc_html_x( 'Select the sidebar to display.', 'Customizer option description', 'yith-proteo' ),
			'choices'         => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
			'active_callback' => 'yith_proteo_blog_tag_sidebar_is_enabled',
		)
	);
