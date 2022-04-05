<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package yith-proteo
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @return void
	 */
	function yith_proteo_register_block_styles() {
		// Button: Style 1.
		register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
			'core/button',
			array(
				'name'         => 'button-style-1',
				'label'        => esc_html__( 'Button Style 1', 'yith-proteo' ),
				'inline_style' => yith_proteo_generate_style_variables(),
			)
		);

		// Button: Style 2.
		register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
			'core/button',
			array(
				'name'  => 'button-style-2',
				'label' => esc_html__( 'Button Style 2', 'yith-proteo' ),
			)
		);

		// Button: Ghost.
		register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
			'core/button',
			array(
				'name'  => 'button-ghost',
				'label' => esc_html__( 'Ghost', 'yith-proteo' ),
			)
		);

		// Button: Unstyled.
		register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
			'core/button',
			array(
				'name'  => 'button-unstyled',
				'label' => esc_html__( 'Unstyled', 'yith-proteo' ),
			)
		);

	}
	add_action( 'init', 'yith_proteo_register_block_styles' );
}
