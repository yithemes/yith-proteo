<?php
/**
 * The header template of YITH Proteo theme
 *
 * @package yith-proteo
 */

global $post;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html_x( 'Skip to content', 'Screen reader text', 'yith-proteo' ); ?></a>

	<?php
	get_template_part( 'template-parts/header/masthead' );

	do_action( 'yith_proteo_content_start' );
