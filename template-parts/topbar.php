<?php
/**
 * Template part for topbar
 *
 * @package yith-proteo
 */

?>
<div id="topbar" class="<?php echo get_theme_mod( 'yith_proteo_mobile_topbar_show', 'yes' ) === 'no' ? 'hidden-xs' : ''; ?>">
	<div class="container">
		<?php dynamic_sidebar( 'topbar-sidebar' ); ?>
	</div>
</div>
