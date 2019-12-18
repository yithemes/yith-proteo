<?php
/**
 * The header template of YITH Proteo theme
 *
 * @package yith-proteo
 */

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
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yith-proteo' ); ?></a>

    <header id="masthead"
            class="site-header <?php echo get_theme_mod( 'yith_proteo_header_layout', 'left_logo_navigation_inline' ); ?> " <?php yith_proteo_custom_header_style(); ?>>
		<?php
		if ( get_theme_mod( 'yith_proteo_topbar_enable', 'no' ) == 'yes' ) {
			get_template_part( 'template-parts/topbar' );
		}
		?>
        <div class="container header-contents">
            <div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
                    <h1 class="site-title">
						<?php if ( has_custom_logo() ) :
							the_custom_logo();
						else : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
                            </a>
						<?php endif; ?>
                    </h1>
					<?php
					$yith_proteo_description = get_bloginfo( 'description', 'display' );
					if ( $yith_proteo_description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $yith_proteo_description; /* WPCS: xss ok. */ ?></p>
					<?php endif;
				else :
					if ( has_custom_logo() ) : ?>
                        <p class="site-title"><?php the_custom_logo(); ?></p>

					<?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                                                 rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;
					$yith_proteo_description = get_bloginfo( 'description', 'display' );
					if ( $yith_proteo_description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $yith_proteo_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				<?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
            </nav><!-- #site-navigation -->
            <div class="header-sidebar">
				<?php dynamic_sidebar( 'header-sidebar' ); ?>
            </div>
        </div>
    </header><!-- #masthead -->

<?php if ( defined( 'YITH_PROTEO_UTILS' ) ) {
	global $post;
	if ( $post ) {
		$slider = get_post_meta( $post->ID, 'header_slider', true );
		if ( $slider && $slider != '' ) {
			echo do_shortcode( '[yith-proteo-slider slider="' . get_post_meta( $post->ID, 'header_slider', true ) . '"]' );
		}
	}
} ?>

    <div id="content" class="site-content">
<?php do_action( 'yith_proteo_before_page_content' ); ?>
    <div class="container">
<?php echo '' != yith_proteo_get_sidebar_position() ? '<div class="row">' : '' ?>