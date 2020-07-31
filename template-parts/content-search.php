<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yith-proteo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php

	if ( 'product' === get_post_type() ) :

		$product = wc_get_product( get_the_ID() );
		?>
		<div class="product-image">
			<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
				<?php
				echo $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				?>
			</a>
		</div>
		<div class="product-info">
			<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
				<span class="product-title"><?php echo wp_kses_post( $product->get_name() ); ?></span>
			</a>


			<?php if ( ! empty( $show_rating ) ) : ?>
				<?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<?php endif; ?>

			<?php
			echo $product->get_price_html(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
			<div class="widget-product-short-description">
				<?php echo esc_html( apply_filters( 'woocommerce_short_description', $product->get_short_description() ) ); ?>
			</div>
		</div>
	<?php else : ?>
		<div class="search-result-article-image">
			<?php yith_proteo_post_thumbnail(); ?>
		</div>
		<div class="search-result-article-content">

			<header class="entry-header">


				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php
						yith_proteo_posted_on();
						yith_proteo_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->


			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<footer class="entry-footer">
				<?php yith_proteo_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>

	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
