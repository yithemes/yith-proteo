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

<body <?php body_class( 'animatedParent' ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html_x( 'Skip to content', 'Screen reader text', 'yith-proteo' ); ?></a>

	<?php
	// get the tagline.
	$yith_proteo_description = get_bloginfo( 'description' );
	// get the tagline position.
	$yith_proteo_tagline_position = 'tagline-position-' . get_theme_mod( 'yith_proteo_tagline_position', 'below' );
	// get page/post title layout.
	$yith_proteo_page_title_layout = get_theme_mod( 'yith_proteo_page_title_layout', 'inside' );
	// get single post layout.
	$yith_proteo_single_post_layout = get_theme_mod( 'yith_proteo_single_post_layout', 'standard' );
	// hide site header if meta value enabled.
	if ( function_exists( 'wc' ) && is_shop() ) {
		$hide_header = get_post_meta( wc_get_page_id( 'shop' ), 'yith_proteo_remove_header_and_footer', true );
	} elseif ( is_home() ) {
		$hide_header = get_post_meta( get_option( 'page_for_posts' ), 'yith_proteo_remove_header_and_footer', true );
	} else {
		$hide_header = $post ? get_post_meta( $post->ID, 'yith_proteo_remove_header_and_footer', true ) : 'off';
	}
	$slider = '';
	if ( defined( 'YITH_SLIDER_FOR_PAGE_BUILDERS' ) ) {
		if ( function_exists( 'wc' ) && is_shop() ) {
			$slider = get_post_meta( wc_get_page_id( 'shop' ), 'header_slider', true );
		} elseif ( is_home() ) {
			$slider = get_post_meta( get_option( 'page_for_posts' ), 'header_slider', true );
		} elseif ( $post ) {
			$slider = get_post_meta( $post->ID, 'header_slider', true );
		}
	}
	$custom_spacing = false;
	if ( function_exists( 'wc' ) && is_shop() ) {
		if ( 'on' === get_post_meta( wc_get_page_id( 'shop' ), 'yith_proteo_custom_page_content_spacing_enabler', true ) ) {
			$custom_spacing = 'style="padding:' . implode(
				'px ',
				get_post_meta( wc_get_page_id( 'shop' ), 'yith_proteo_custom_page_content_spacing', true )
			) . 'px"';
		}
	} elseif ( is_home() ) {
		if ( 'on' === get_post_meta( get_option( 'page_for_posts' ), 'yith_proteo_custom_page_content_spacing_enabler', true ) ) {
			$custom_spacing = 'style="padding:' . implode(
				'px ',
				get_post_meta( get_option( 'page_for_posts' ), 'yith_proteo_custom_page_content_spacing', true )
			) . 'px"';
		}
	} elseif ( $post ) {
		if ( 'on' === get_post_meta( $post->ID, 'yith_proteo_custom_page_content_spacing_enabler', true ) ) {
			$custom_spacing = 'style="padding:' . implode(
				'px ',
				get_post_meta( $post->ID, 'yith_proteo_custom_page_content_spacing', true )
			) . 'px"';
		}
	}

	if ( 'on' !== $hide_header ) {
		?>
		<header id="masthead"
				class="site-header <?php echo esc_attr( get_theme_mod( 'yith_proteo_header_layout', 'left_logo_navigation_inline' ) ); ?> <?php echo esc_attr( get_theme_mod( 'yith_proteo_header_fullwidth', 'no' ) === 'yes' ? 'fullwidth-header' : '' ); ?> <?php echo esc_attr( $slider && '' !== $slider ? 'with-header-slider' : '' ); ?>" <?php yith_proteo_custom_header_style(); ?>>
			<?php
			if ( get_theme_mod( 'yith_proteo_topbar_enable', 'no' ) === 'yes' ) {
				get_template_part( 'template-parts/topbar' );
			}
			?>
			<div class="container header-contents <?php echo esc_attr( get_theme_mod( 'yith_proteo_mobile_menu_opener_position', 'right' ) === 'left' ? 'left-toggle' : 'right-toggle' ); ?>">
				<?php if ( yith_proteo_display_header_text() ) { ?>
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
				<?php } ?>

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
				<div class="header-sidebar">
					<?php
					if ( get_theme_mod( 'yith_proteo_header_search_widget', 'no' ) === 'yes' ) {
						the_widget(
							'WP_Widget_Search',
							array(),
							array(
								'before_widget' => '<section class="widget %1$s ' . ( get_theme_mod( 'yith_proteo_mobile_search_widget', 'no' ) === 'no' ? 'hidden-xs' : '' ) . '">',
								'after_widget'  => '</section>',
							)
						);
					}
					?>
					<?php
					if ( get_theme_mod( 'yith_proteo_header_account_widget', 'no' ) === 'yes' ) {
						the_widget(
							'YITH_Proteo_Account_Widget',
							array(
								'custom-icon'   => get_template_directory_uri() . '/img/user.svg',
								'login-url'     => wp_login_url(),
								'myaccount-url' => get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ? get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) : get_home_url( null, '/my-account/' ),
							),
							array(
								'before_widget' => '<section class="widget %1$s ' . ( get_theme_mod( 'yith_proteo_mobile_account_widget', 'no' ) === 'no' ? 'hidden-xs' : '' ) . '">',
								'after_widget'  => '</section>',
							)
						);
					}
					?>
					<?php
					if ( class_exists( 'woocommerce' ) && get_theme_mod( 'yith_proteo_header_cart_widget', 'no' ) === 'yes' ) {
						the_widget(
							'WC_Widget_Cart',
							array(
								'title' => '',
							),
							array(
								'before_widget' => '<section class="widget %1$s ' . ( get_theme_mod( 'yith_proteo_mobile_cart_widget', 'no' ) === 'no' ? 'hidden-xs' : '' ) . '">',
								'after_widget'  => '</section>',
							)
						);
					}
					?>
				<?php if ( 'yes' === get_theme_mod( 'yith_proteo_show_header_sidebar', 'yes' ) ) { ?>
					<?php dynamic_sidebar( 'header-sidebar' ); ?>
				<?php } ?>

				</div>
			</div>
		</header><!-- #masthead -->
	<?php } ?>
	<?php
	if ( class_exists( 'RevSliderSlider' ) && $slider && '' !== $slider && in_array( $slider, yith_proteo_get_all_revolution_slider_alias(), true ) ) {
			echo do_shortcode( '[rev_slider alias="' . $slider . '"][/rev_slider]' );
	} elseif ( defined( 'YITH_SLIDER_FOR_PAGE_BUILDERS' ) ) {
		if ( $slider && '' !== $slider ) {
			echo do_shortcode( '[yith-slider slider="' . $slider . '"]' );
		}
	}
	?>
	<div id="content" class="site-content" <?php echo $custom_spacing ? $custom_spacing : ''; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php do_action( 'yith_proteo_before_page_content' ); ?>
		<div class="container">
			<?php if ( ( is_page() || is_home() ) && 'outside' === $yith_proteo_page_title_layout ) { ?>
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
