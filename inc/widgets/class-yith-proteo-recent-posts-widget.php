<?php

/**
 * Extend Recent Posts Widget
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */
class YITH_Proteo_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	public function widget( $args, $instance ) {

		extract( $args ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Posts', 'yith-proteo' ) : $instance['title'], $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}


		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$posts = new WP_Query(
			apply_filters(
				'widget_posts_args',
				array(
					'posts_per_page'      => $number,
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
				)
			)
		);
		if ( $posts->have_posts() ) :

			echo $before_widget; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			if ( $title ) {
				echo $before_title . esc_html( $title ) . $after_title; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} ?>
			<ul>
				<?php
				while ( $posts->have_posts() ) :
					$posts->the_post();
					?>
					<li>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="post-image">
									<?php the_post_thumbnail( 'small' ); ?>
								</div>
							<?php endif; ?>
							<div class="post-info">
								<?php the_title( '<h3>', '</h3>' ); ?>
								<?php if ( $show_date ) : ?>
									<div class="post-date"><?php echo get_the_date( '', get_the_ID() ); ?></div>
								<?php endif; ?>
								<?php
								if ( get_comments_number() > 0 ) {
									/* translators: comments widget: 1: comments count on widget */
									echo esc_html( sprintf( _nx( '%1$s comment', '%1$s comments', get_comments_number(), 'comments count on widget', 'yith-proteo' ), number_format_i18n( get_comments_number() ) ) );
								}
								?>
							</div>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>

			<?php
			echo $after_widget; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			wp_reset_postdata();

		endif;
	}
}
