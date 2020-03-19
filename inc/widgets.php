<?php
/**
 * yith-proteo widgets
 *
 * @package yith-proteo
 */

// Include the recent posts widget.
require get_template_directory() . '/inc/widgets/class-yith-proteo-recent-posts-widget.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

function yith_proteo_recent_post_widget_registration() {
	unregister_widget( 'WP_Widget_Recent_Posts' );
	register_widget( 'YITH_Proteo_Recent_Posts_Widget' );
}

add_action( 'widgets_init', 'yith_proteo_recent_post_widget_registration' );

// Include the recent comments widget.
require get_template_directory() . '/inc/widgets/class-yith-proteo-recent-comments-widget.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

function yith_proteo_recent_comments_widget_registration() {
	unregister_widget( 'WP_Widget_Recent_Comments' );
	register_widget( 'YITH_Proteo_Recent_Comments_Widget' );
}

add_action( 'widgets_init', 'yith_proteo_recent_comments_widget_registration' );


// Include the recent posts widget.
require get_template_directory() . '/inc/widgets/class-yith-proteo-social-icons.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

// register YITH_Proteo_Social_Icons widget
function yith_proteo_register_social_icons_widget() {
	register_widget( 'YITH_Proteo_Social_Icons' );
}

add_action( 'widgets_init', 'yith_proteo_register_social_icons_widget' );
