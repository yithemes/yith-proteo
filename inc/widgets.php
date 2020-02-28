<?php
/**
 * yith-proteo widgets
 *
 * @package yith-proteo
 */

// Include the recent posts widget.
require get_template_directory() . '/inc/widgets/class-yith-proteo-recent-posts-widget.php';

function yith_proteo_recent_post_widget_registration() {
	unregister_widget( 'WP_Widget_Recent_Posts' );
	register_widget( 'YITH_Proteo_Recent_Posts_Widget' );
}

add_action( 'widgets_init', 'yith_proteo_recent_post_widget_registration' );

// Include the recent comments widget.
require get_template_directory() . '/inc/widgets/class-yith-proteo-recent-comments-widget.php';

function yith_proteo_recent_comments_widget_registration() {
	unregister_widget( 'WP_Widget_Recent_Comments' );
	register_widget( 'YITH_Proteo_Recent_Comments_Widget' );
}

add_action( 'widgets_init', 'yith_proteo_recent_comments_widget_registration' );


// Include the recent posts widget.
require get_template_directory() . '/inc/widgets/class-yith-proteo-social-icons.php';

// register YITH_Proteo_Social_Icons widget
function register_yith_proteo_social_icons() {
	register_widget( 'YITH_Proteo_Social_Icons' );
}

add_action( 'widgets_init', 'register_yith_proteo_social_icons' );
