<?php
/**
 * Block editor colors
 *
 * @package yith-proteo
 */

if ( ! function_exists( 'yith_proteo_block_editor_color_palette' ) ) :
	/**
	 * Add theme support and define editor color palettes from customizer values
	 *
	 * @return void
	 */
	function yith_proteo_block_editor_color_palette() {
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Custom color #1', 'yith-proteo' ),
					'slug'  => 'yith-proteo-editor-custom-color-1',
					'color' => get_theme_mod( 'yith_proteo_block_editor_color_1', '#01af8d' ),
				),
				array(
					'name'  => esc_html__( 'Custom color #2', 'yith-proteo' ),
					'slug'  => 'yith-proteo-editor-custom-color-2',
					'color' => get_theme_mod( 'yith_proteo_block_editor_color_2', '#ffffff' ),
				),
				array(
					'name'  => esc_html__( 'Custom color #3', 'yith-proteo' ),
					'slug'  => 'yith-proteo-editor-custom-color-3',
					'color' => get_theme_mod( 'yith_proteo_block_editor_color_3', '#107774' ),
				),
				array(
					'name'  => esc_html__( 'Custom color #4', 'yith-proteo' ),
					'slug'  => 'yith-proteo-editor-custom-color-4',
					'color' => get_theme_mod( 'yith_proteo_block_editor_color_4', '#404040' ),
				),
				array(
					'name'  => esc_html__( 'Custom color #5', 'yith-proteo' ),
					'slug'  => 'yith-proteo-editor-custom-color-5',
					'color' => get_theme_mod( 'yith_proteo_block_editor_color_5', '#dd9933' ),
				),
				array(
					'name'  => esc_html__( 'Custom color #6', 'yith-proteo' ),
					'slug'  => 'yith-proteo-editor-custom-color-6',
					'color' => get_theme_mod( 'yith_proteo_block_editor_color_6', '#000000' ),
				),
				array(
					'name'  => esc_html__( 'Custom color #7', 'yith-proteo' ),
					'slug'  => 'yith-proteo-editor-custom-color-7',
					'color' => get_theme_mod( 'yith_proteo_block_editor_color_7', '#1e73be' ),
				),
				array(
					'name'  => esc_html__( 'Custom color #8', 'yith-proteo' ),
					'slug'  => 'yith-proteo-editor-custom-color-8',
					'color' => get_theme_mod( 'yith_proteo_block_editor_color_8', '#dd3333' ),
				),

			)
		);
	}
endif;
add_action( 'after_setup_theme', 'yith_proteo_block_editor_color_palette' );
