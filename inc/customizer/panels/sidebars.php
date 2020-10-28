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
			'title'    => esc_html__( 'Sidebars', 'yith-proteo' ),
			'priority' => 35,
		)
	);

	// Default Sidebar Management options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_default_sidebar_position',
			array(
				'default' => 'right',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_default_sidebar_position',
				array(
					'label'       => esc_html__( 'Choose the position of the default sidebar', 'yith-proteo' ),
					'section'     => 'yith_proteo_sidebar_management',
					'description' => esc_html__( 'Select where to display the default sidebar. You can adjust the settings from the page/post edit view.', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html__( 'No sidebar', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html__( 'Left', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html__( 'Right', 'yith-proteo' ),
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
			'type'        => 'select',
			'label'       => esc_html__( 'Choose the default sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_sidebar_management',
			'description' => esc_html__( 'Select the sidebar to display. It will be used for archive pages too.', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);

	// Blog Sidebar Management options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_blog_page_sidebar_position',
			array(
				'default' => 'right',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_blog_page_sidebar_position',
				array(
					'label'       => esc_html__( 'Choose the position of the blog page sidebar', 'yith-proteo' ),
					'section'     => 'yith_proteo_sidebar_management',
					'description' => esc_html__( 'Select where to display the sidebar. You can pick up a specific sidebard from the page edit view.', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html__( 'No sidebar', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html__( 'Left', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html__( 'Right', 'yith-proteo' ),
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
			'type'        => 'select',
			'label'       => esc_html__( 'Choose the blog sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_sidebar_management',
			'description' => esc_html__( 'Select the sidebar to display. You can pick a specific sidebar from the single post edit page.', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);

	// Blog Category Sidebar Management options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_blog_category_sidebar_position',
			array(
				'default' => 'right',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_blog_category_sidebar_position',
				array(
					'label'       => esc_html__( 'Choose the position of blog category pages sidebar', 'yith-proteo' ),
					'section'     => 'yith_proteo_sidebar_management',
					'description' => esc_html__( 'Select where to display the sidebar.', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html__( 'No sidebar', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html__( 'Left', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html__( 'Right', 'yith-proteo' ),
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
			'type'        => 'select',
			'label'       => esc_html__( 'Choose blog category pages sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_sidebar_management',
			'description' => esc_html__( 'Select the sidebar to display.', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);

	// Blog Tag Sidebar Management options.
	if ( class_exists( 'Customizer_Control_Radio_Image' ) ) {
		$wp_customize->add_setting(
			'yith_proteo_blog_tag_sidebar_position',
			array(
				'default' => 'right',
			)
		);

		$wp_customize->add_control(
			new Customizer_Control_Radio_Image(
				$wp_customize,
				'yith_proteo_blog_tag_sidebar_position',
				array(
					'label'       => esc_html__( 'Choose the position of blog tag pages sidebar', 'yith-proteo' ),
					'section'     => 'yith_proteo_sidebar_management',
					'description' => esc_html__( 'Select where to display the sidebar.', 'yith-proteo' ),
					'choices'     => array(
						'no-sidebar' => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-no.svg',
							'label' => esc_html__( 'No sidebar', 'yith-proteo' ),
						),
						'left'       => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-left.svg',
							'label' => esc_html__( 'Left', 'yith-proteo' ),
						),
						'right'      => array(
							'url'   => trailingslashit( get_template_directory_uri() ) . '/img/panel-icons/sidebar-right.svg',
							'label' => esc_html__( 'Right', 'yith-proteo' ),
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
			'type'        => 'select',
			'label'       => esc_html__( 'Choose blog tag pages sidebar', 'yith-proteo' ),
			'section'     => 'yith_proteo_sidebar_management',
			'description' => esc_html__( 'Select the sidebar to display.', 'yith-proteo' ),
			'choices'     => wp_list_pluck( $GLOBALS['wp_registered_sidebars'], 'name' ),
		)
	);
