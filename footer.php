<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the .container and #content divs and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yith-proteo
 */

?>
<?php echo get_theme_mod( 'yith_proteo_default_sidebar_position', 'right' ) != 'no-sidebar' ? '</div>' : '' ?>
</div><!-- .container -->
</div><!-- #content -->

<footer id="main-footer" class="site-footer">
    <div class="footer-sidebar-1 container">
        <div class="row"><?php dynamic_sidebar( 'footer-sidebar-1' ); ?></div>
    </div>
    <div class="footer-sidebar-2 container">
        <div class="row"><?php dynamic_sidebar( 'footer-sidebar-2' ); ?></div>
    </div>

    <div class="site-info">
        <div class="container">
			<?php
			echo do_shortcode( get_theme_mod( 'yith_proteo_footer_credits_content', 'Proteo - A free theme designed with <span class="lnr lnr-heart"></span> by <a href="https://yithemes.com" rel="nofollow">YITH</a>' ) );
			?>
        </div>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
