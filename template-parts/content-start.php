<?php
/**
 * Content start template part.
 *
 * @package yith-proteo
 */

// get page/post title layout.
$yith_proteo_page_title_layout = get_theme_mod( 'yith_proteo_page_title_layout', 'inside' );
// get single post layout.
$yith_proteo_single_post_layout = get_theme_mod( 'yith_proteo_single_post_layout', 'standard' );
// get page/post custom spacing.
$custom_spacing = yith_proteo_get_content_spacing();

?>
<div id="content" class="site-content" <?php echo $custom_spacing ? $custom_spacing : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php do_action( 'yith_proteo_before_page_content' ); ?>
	<div class="container">
		<?php if ( ( is_page() || is_home() ) && 'outside' === $yith_proteo_page_title_layout && function_exists( 'wc' ) && ! is_account_page() ) { ?>
			<header class="entry-header page-header">
				<?php
				yith_proteo_print_page_titles();
				?>
			</header><!-- .entry-header -->
		<?php } elseif ( is_singular( 'post' ) && 'outside' === $yith_proteo_page_title_layout ) { ?>
			<?php
				// single post header template.
				get_template_part( 'template-parts/title', 'post-single' );
			?>
		<?php } elseif ( is_singular( 'post' ) && ( 'inside' === $yith_proteo_page_title_layout ) && ( 'standard' !== $yith_proteo_single_post_layout ) ) { ?>
			<?php
				// single post header template.
				get_template_part( 'template-parts/title', 'post-single' );
			?>
		<?php } ?>
		<?php echo yith_proteo_get_sidebar_position() ? '<div class="row">' : ''; ?>
