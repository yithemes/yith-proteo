<?php
/**
 * Theme metaboxes file
 *
 * @package yith-proteo
 */

if ( ! function_exists( 'yith_proteo_sidebar_get_meta' ) ) :
	/**
	 * Function to easily retrieve sidebar position
	 *
	 * @param string $value meta value to retrieve.
	 *
	 * @return bool|mixed|string
	 *
	 * @author Francesco Grasso <francgrasso@yithemes.com>
	 */
	function yith_proteo_sidebar_get_meta( $value ) {
		global $post;
		if ( ! $post ) {
			return false;
		}
		$field = get_post_meta( $post->ID, $value, true );
		if ( ! empty( $field ) ) {
			return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
		} else {
			return false;
		}
	}
endif;


/**
 * Title icon metabox
 */
function yith_proteo_title_icon_add_meta_box() {
	add_meta_box(
		'title_icon_meta',
		__( 'Title icon', 'yith-proteo' ),
		'yith_proteo_title_icon_html',
		array( 'post', 'page' ),
		'side'
	);
}

add_action( 'add_meta_boxes', 'yith_proteo_title_icon_add_meta_box' );


/**
 * Header slider metabox add
 */
function yith_proteo_header_slider_add_meta_box() {
	add_meta_box(
		'header_slider',
		__( 'Header slider', 'yith-proteo' ),
		'yith_proteo_header_slider_html',
		array( 'page' ),
		'side'
	);
}


if ( defined( 'YITH_SLIDER_FOR_PAGE_BUILDERS' ) ) {
	add_action( 'add_meta_boxes', 'yith_proteo_header_slider_add_meta_box' );
}

/**
 * Sidebar position metabox add
 */
function yith_proteo_sidebar_position_add_meta_box() {
	add_meta_box(
		'sidebar_position',
		__( 'Sidebar position', 'yith-proteo' ),
		'yith_proteo_sidebar_position_html',
		array( 'post', 'page', 'product' ),
		'side'
	);
}

add_action( 'add_meta_boxes', 'yith_proteo_sidebar_position_add_meta_box' );

/**
 * Sidebar chooser metabox
 */
function yith_proteo_sidebar_chooser_add_meta_box() {
	add_meta_box(
		'sidebar_chooser',
		__( 'Sidebar Chooser', 'yith-proteo' ),
		'yith_proteo_sidebar_chooser_html',
		array( 'post', 'page', 'product' ),
		'side'
	);
}

add_action( 'add_meta_boxes', 'yith_proteo_sidebar_chooser_add_meta_box' );


/**
 * Remove header and footer metabox
 */
function yith_proteo_remove_header_and_footer_add_meta_box() {
	add_meta_box(
		'yith_proteo_header_footer',
		__( 'Header and footer', 'yith-proteo' ),
		'yith_proteo_remove_header_and_footer_html',
		array( 'post', 'page', 'product' ),
		'side'
	);
}

add_action( 'add_meta_boxes', 'yith_proteo_remove_header_and_footer_add_meta_box' );

/**
 * Remove header and footer metabox
 *
 * @param object $post Post object.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_remove_header_and_footer_html( $post ) {
	wp_nonce_field( '_yith_proteo_remove_header_and_footer_nonce', 'yith_proteo_remove_header_and_footer_nonce' );
	$value = get_post_meta( $post->ID, 'yith_proteo_remove_header_and_footer', true );
	?>

	<label for="yith_proteo_remove_header_and_footer">
		<input type="checkbox" name="yith_proteo_remove_header_and_footer" id="yith_proteo_remove_header_and_footer" <?php checked( 'on', $value ); ?> value="on">
		<?php esc_html_e( 'Enable this option to hide site header and footer.', 'yith-proteo' ); ?>
	</label>
	<?php
}

/**
 * Title icon metabox html
 *
 * @param object $post Post object.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_title_icon_html( $post ) {
	wp_nonce_field( '_title_icon_nonce', 'title_icon_nonce' );
	$value = get_post_meta( $post->ID, 'title_icon', true );

	$icons = yith_proteo_get_icons_list();

	?>
	<select name="title_icon" id="title_icon"
			class="components-text-control__input" style="width: 100%">
		<option value="" <?php selected( $value, '' ); ?>>
			<?php esc_html_e( 'none', 'yith-proteo' ); ?>
		</option>
		<?php
		foreach ( $icons as $key => $icon ) :
			?>
			<option value="<?php echo esc_attr( $key ); ?>" <?php selected( $value, $key ); ?>>
				<?php echo esc_html( $icon ); ?>
			</option>
		<?php endforeach; ?>

	</select>
	<?php
}

/**
 * Sidebar position metabox html
 *
 * @param object $post Post object.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_sidebar_position_html( $post ) {
	wp_nonce_field( '_sidebar_position_nonce', 'sidebar_position_nonce' );
	?>
	<select name="sidebar_position" id="sidebar_position"
			class="components-text-control__input">
		<option
			value="inherit" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'inherit' ) ? 'selected' : ''; ?>>
			<?php esc_html_e( 'inherit', 'yith-proteo' ); ?>
		</option>
		<option
			value="no-sidebar" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'no-sidebar' ) ? 'selected' : ''; ?>>
			<?php esc_html_e( 'no-sidebar', 'yith-proteo' ); ?>
		</option>
		<option
			value="left" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'left' ) ? 'selected' : ''; ?>>
			<?php esc_html_e( 'left', 'yith-proteo' ); ?>
		</option>
		<option
			value="right" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'right' ) ? 'selected' : ''; ?>>
			<?php esc_html_e( 'right', 'yith-proteo' ); ?>
		</option>
		<option
			value="bottom" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'bottom' ) ? 'selected' : ''; ?>>
			<?php esc_html_e( 'bottom', 'yith-proteo' ); ?>
		</option>
	</select>
	<?php
}

/**
 * Sidebar chooser metabox html
 *
 * @param object $post Post object.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_sidebar_chooser_html( $post ) {
	wp_nonce_field( '_sidebar_chooser_nonce', 'sidebar_chooser_nonce' );
	?>

	<select name="sidebar_chooser" id="sidebar_chooser" class="components-text-control__input">
		<?php foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { ?>
			<option
				value="<?php echo esc_attr( ucwords( $sidebar['id'] ) ); ?>" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_chooser' ) === esc_attr( ucwords( $sidebar['id'] ) ) ) ? 'selected' : ''; ?>>
				<?php echo esc_html( ucwords( $sidebar['name'] ) ); ?>
			</option>
		<?php } ?>
	</select>
	<?php
}

/**
 * Header slider metabox html
 *
 * @param object $post Post object.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_header_slider_html( $post ) {
	wp_nonce_field( '_header_slider_nonce', 'header_slider_nonce' );
	$value = get_post_meta( $post->ID, 'header_slider', true );
	?>

	<?php
	$args    = array(
		'posts_per_page' => - 1,
		'post_type'      => 'yith_slider',
		'post_status'    => 'publish',
		'fields'         => 'ids',
	);
	$sliders = get_posts( $args );
	?>

	<select name="header_slider" id="header_slider"
			class="components-text-control__input">
		<option value="" <?php selected( $value, '' ); ?>>
			<?php esc_html_e( 'none', 'yith-proteo' ); ?>
		</option>
		<?php
		foreach ( $sliders as $slider ) :
			?>
			<option value="<?php echo esc_attr( $slider ); ?>" <?php selected( $value, $slider ); ?>>
				<?php echo esc_html( get_the_title( $slider ) ); ?>
			</option>
		<?php endforeach; ?>

	</select>
	<?php
}

/**
 * Title icon meta save
 *
 * @param int $post_id Post object ID.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_remove_header_and_footer_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['yith_proteo_remove_header_and_footer_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['yith_proteo_remove_header_and_footer_nonce'] ) ), '_yith_proteo_remove_header_and_footer_nonce' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( isset( $_POST['yith_proteo_remove_header_and_footer'] ) ) {
		update_post_meta( $post_id, 'yith_proteo_remove_header_and_footer', sanitize_text_field( wp_unslash( $_POST['yith_proteo_remove_header_and_footer'] ) ) );
	} else {
		update_post_meta( $post_id, 'yith_proteo_remove_header_and_footer', 'off' );
	}
}

add_action( 'save_post', 'yith_proteo_remove_header_and_footer_save' );

/**
 * Page header footer meta save
 *
 * @param int $post_id Post object ID.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_title_icon_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['title_icon_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['title_icon_nonce'] ) ), '_title_icon_nonce' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['title_icon'] ) ) {
		update_post_meta( $post_id, 'title_icon', sanitize_text_field( wp_unslash( $_POST['title_icon'] ) ) );
	}
}

add_action( 'save_post', 'yith_proteo_title_icon_save' );

/**
 * Sidebar position meta save
 *
 * @param int $post_id Post object ID.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_sidebar_position_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['sidebar_position_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sidebar_position_nonce'] ) ), '_sidebar_position_nonce' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['sidebar_position'] ) ) {
		update_post_meta( $post_id, 'sidebar_position', sanitize_text_field( wp_unslash( $_POST['sidebar_position'] ) ) );
	}
}

add_action( 'save_post', 'yith_proteo_sidebar_position_save' );

/**
 * Sidebar chooser meta save
 *
 * @param int $post_id Post object ID.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_sidebar_chooser_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['sidebar_chooser_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['sidebar_chooser_nonce'] ) ), '_sidebar_chooser_nonce' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['sidebar_chooser'] ) ) {
		update_post_meta( $post_id, 'sidebar_chooser', sanitize_text_field( wp_unslash( $_POST['sidebar_chooser'] ) ) );
	}
}

add_action( 'save_post', 'yith_proteo_sidebar_chooser_save' );

/**
 * Header slider meta save
 *
 * @param int $post_id Post object ID.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_header_slider_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['header_slider_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['header_slider_nonce'] ) ), '_header_slider_nonce' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['header_slider'] ) ) {
		update_post_meta( $post_id, 'header_slider', sanitize_text_field( wp_unslash( $_POST['header_slider'] ) ) );
	}
}

add_action( 'save_post', 'yith_proteo_header_slider_save' );
