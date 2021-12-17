<?php
/**
 * Header navigation template part.
 *
 * @package yith-proteo
 */

?>
<nav id="site-navigation" class="main-navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
		<span class="sr-only"><?php echo esc_html_x( 'Toggle navigation', 'Screen reader text', 'yith-proteo' ); ?></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<div id="yith-proteo-mobile-menu">
		<?php
		dynamic_sidebar( 'mobile-menu-sidebar' );
		$mobile_menu_align = get_theme_mod( 'yith_proteo_mobile_menu_align', 'left' );
		wp_nav_menu(
			array(
				'theme_location' => 'mobile',
				'menu_id'        => 'mobile-menu',
				'container_id'   => 'mobile-nav-menu',
				'menu_class'     => 'menu mobile-menu-align-' . $mobile_menu_align,
				'menu'           => 'mobile',
				'fallback_cb'    => false,
			)
		);
		?>
	</div>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'menu_id'        => 'primary-menu',
			'container_id'   => 'primary-nav-menu',
			'menu'           => 'primary',
			'fallback_cb'    => false,
		)
	);
	?>
</nav><!-- #site-navigation -->
<?php
