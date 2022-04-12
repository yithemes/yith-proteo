<?php
/**
 * Header sidebar template part.
 *
 * @package yith-proteo
 */

?>
<div class="header-sidebar-left">
<?php if ( 'yes' === get_theme_mod( 'yith_proteo_show_header_sidebar', 'yes' ) ) { ?>
	<?php dynamic_sidebar( 'header-sidebar-left' ); ?>
<?php } ?>
</div>
