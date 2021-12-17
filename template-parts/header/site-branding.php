<?php
/**
 * Header branding template part.
 *
 * @package yith-proteo
 */

// get the tagline.
$yith_proteo_description = get_bloginfo( 'description' );
// get the tagline position.
$yith_proteo_tagline_position = 'tagline-position-' . get_theme_mod( 'yith_proteo_tagline_position', 'below' );
?>
<div class="site-branding <?php echo esc_attr( $yith_proteo_tagline_position ); ?>">
	<?php
	if ( is_front_page() && is_home() ) {
		?>
		<h1 class="site-title">
			<?php
			if ( has_custom_logo() && 'yes' === get_theme_mod( 'yith_proteo_display_site_logo', get_theme_mod( 'yith_proteo_display_header_text', 'yes' ) ) ) {
				the_custom_logo();
			}
			if ( 'yes' === get_theme_mod( 'yith_proteo_display_site_title', yith_proteo_show_site_title_default_value() ) ) {
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			<?php } ?>
		</h1>
		<?php
		if ( $yith_proteo_description && 'yes' === get_theme_mod( 'yith_proteo_display_tagline', get_theme_mod( 'yith_proteo_display_header_text', 'yes' ) ) ) {
			?>
			<p class="site-description"><?php echo $yith_proteo_description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></p>
			<?php
		}
	} else {
		if ( has_custom_logo() && 'yes' === get_theme_mod( 'yith_proteo_display_site_logo', get_theme_mod( 'yith_proteo_display_header_text', 'yes' ) ) ) {
			?>
			<p class="site-title"><?php the_custom_logo(); ?></p>
			<?php
		}
		if ( 'yes' === get_theme_mod( 'yith_proteo_display_site_title', yith_proteo_show_site_title_default_value() ) ) {
			?>
			<p class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</p>
				<?php
		}
		if ( $yith_proteo_description && 'yes' === get_theme_mod( 'yith_proteo_display_tagline', get_theme_mod( 'yith_proteo_display_header_text', 'yes' ) ) ) {
			?>
			<p class="site-description"><?php echo $yith_proteo_description; /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */ ?></p>
			<?php
		}
	}
	?>
</div><!-- .site-branding -->
