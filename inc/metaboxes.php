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
		esc_html_x( 'Title icon', 'page option name', 'yith-proteo' ),
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
		esc_html_x( 'Header slider', 'page option name', 'yith-proteo' ),
		'yith_proteo_header_slider_html',
		array( 'page' ),
		'side'
	);
}


if ( defined( 'YITH_SLIDER_FOR_PAGE_BUILDERS' ) ) {
	add_action( 'add_meta_boxes', 'yith_proteo_header_slider_add_meta_box' );
}

/**
 * Sidebar management metabox
 */
function yith_proteo_sidebar_management_add_meta_box() {
	add_meta_box(
		'yith_proteo_sidebar_management',
		esc_html_x( 'Sidebar management', 'page option name', 'yith-proteo' ),
		'yith_proteo_sidebar_management_html',
		array( 'post', 'page', 'product' ),
		'side'
	);
}
add_action( 'add_meta_boxes', 'yith_proteo_sidebar_management_add_meta_box' );

/**
 * Remove header and footer metabox
 */
function yith_proteo_remove_header_and_footer_add_meta_box() {
	add_meta_box(
		'yith_proteo_header_footer',
		esc_html_x( 'Header and footer', 'page option name', 'yith-proteo' ),
		'yith_proteo_remove_header_and_footer_html',
		array( 'post', 'page', 'product' ),
		'side'
	);
}

add_action( 'add_meta_boxes', 'yith_proteo_remove_header_and_footer_add_meta_box' );

/**
 * Manage page content spacing metabox
 */
function yith_proteo_manage_page_content_spacing_add_meta_box() {
	add_meta_box(
		'yith_proteo_content_spacing',
		esc_html_x( 'Page content', 'page option name', 'yith-proteo' ),
		'yith_proteo_manage_page_content_spacing_html',
		array( 'page' ),
		'side'
	);
}

add_action( 'add_meta_boxes', 'yith_proteo_manage_page_content_spacing_add_meta_box' );


/**
 * Hide page title metabox
 */
function yith_proteo_hide_page_title_add_meta_box() {
	global $post;
	if ( ! class_exists( 'EditorsKit' ) || ( get_option( 'page_for_posts' ) === $post->ID ) ) {

		add_meta_box(
			'yith_proteo_hide_page_title',
			esc_html_x( 'Hide page title', 'page option name', 'yith-proteo' ),
			'yith_proteo_hide_page_title_html',
			array( 'post', 'page' ),
			'side',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'yith_proteo_hide_page_title_add_meta_box' );


/**
 * Hide page title metabox
 *
 * @param object $post Post object.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_hide_page_title_html( $post ) {
	wp_nonce_field( '_yith_proteo_hide_page_title_nonce', 'yith_proteo_hide_page_title_nonce' );
	$value = get_post_meta( $post->ID, 'yith_proteo_hide_page_title', true );
	?>

	<label for="yith_proteo_hide_page_title">
		<input type="checkbox" name="yith_proteo_hide_page_title" id="yith_proteo_hide_page_title" <?php checked( 'on', $value ); ?> value="on">
		<?php echo esc_html_x( 'Enable this option to hide page title.', 'page option description', 'yith-proteo' ); ?>
	</label>
	<?php
}

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
		<?php echo esc_html_x( 'Enable this option to hide site header and footer.', 'page option description', 'yith-proteo' ); ?>
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
			<?php echo esc_html_x( 'none', 'page option value', 'yith-proteo' ); ?>
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
			<?php echo esc_html_x( 'inherit', 'page option value', 'yith-proteo' ); ?>
		</option>
		<option
			value="no-sidebar" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'no-sidebar' ) ? 'selected' : ''; ?>>
			<?php echo esc_html_x( 'no-sidebar', 'page option value', 'yith-proteo' ); ?>
		</option>
		<option
			value="left" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'left' ) ? 'selected' : ''; ?>>
			<?php echo esc_html_x( 'left', 'page option value', 'yith-proteo' ); ?>
		</option>
		<option
			value="right" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'right' ) ? 'selected' : ''; ?>>
			<?php echo esc_html_x( 'right', 'page option value', 'yith-proteo' ); ?>
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
		<option
			value="inherit" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'inherit' ) ? 'selected' : ''; ?>>
			<?php echo esc_html_x( 'inherit', 'page option value', 'yith-proteo' ); ?>
		</option>
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
 * Sidebar management metabox html
 *
 * @param object $post Post object.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_sidebar_management_html( $post ) {
	wp_nonce_field( '_sidebar_position_nonce', 'sidebar_position_nonce' );
	?>
	<p class="components-base-control__field ">
		<label class="components-base-control__label" for="sidebar_position" style="display: block; margin-bottom: 5px;"><?php echo esc_html_x( 'Position:', 'metabox description label', 'yith-proteo' ); ?></label>
		<select name="sidebar_position" id="sidebar_position"
				class="components-text-control__input">
			<option
				value="inherit" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'inherit' ) ? 'selected' : ''; ?>>
				<?php echo esc_html_x( 'Inherit', 'page option value', 'yith-proteo' ); ?>
			</option>
			<option
				value="no-sidebar" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'no-sidebar' ) ? 'selected' : ''; ?>>
				<?php echo esc_html_x( 'No sidebar', 'page option value', 'yith-proteo' ); ?>
			</option>
			<option
				value="left" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'left' ) ? 'selected' : ''; ?>>
				<?php echo esc_html_x( 'Left', 'page option value', 'yith-proteo' ); ?>
			</option>
			<option
				value="right" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'right' ) ? 'selected' : ''; ?>>
				<?php echo esc_html_x( 'Right', 'page option value', 'yith-proteo' ); ?>
			</option>
		</select>
	</p>
	<?php
		wp_nonce_field( '_sidebar_chooser_nonce', 'sidebar_chooser_nonce' );
	?>
	<p class="components-base-control__field ">
		<label class="components-base-control__label" for="sidebar_chooser" style="display: block; margin-bottom: 5px;"><?php echo esc_html_x( 'Sidebar:', 'metabox description label', 'yith-proteo' ); ?></label>
		<select name="sidebar_chooser" id="sidebar_chooser" class="components-text-control__input">
			<option
				value="inherit" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_position' ) === 'inherit' ) ? 'selected' : ''; ?>>
				<?php echo esc_html_x( 'Inherit', 'page option value', 'yith-proteo' ); ?>
			</option>
			<?php foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { ?>
				<option
					value="<?php echo esc_attr( ucwords( $sidebar['id'] ) ); ?>" <?php echo ( yith_proteo_sidebar_get_meta( 'sidebar_chooser' ) === esc_attr( ucwords( $sidebar['id'] ) ) ) ? 'selected' : ''; ?>>
					<?php echo esc_html( ucwords( $sidebar['name'] ) ); ?>
				</option>
			<?php } ?>
		</select>
	</p>
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
			<?php echo esc_html_x( 'none', 'page option value', 'yith-proteo' ); ?>
		</option>
		<?php
		foreach ( $sliders as $slider ) :
			?>
			<option value="<?php echo esc_attr( $slider ); ?>" <?php selected( $value, $slider ); ?>>
				<?php echo esc_html( get_the_title( $slider ) ); ?>
			</option>
		<?php endforeach; ?>

		<?php
		if ( class_exists( 'RevSlider' ) ) {
			$rev_sliders = yith_proteo_get_all_revolution_slider_alias();
			foreach ( $rev_sliders as $rev_slider_alias ) {
				?>
				<option value="<?php echo esc_attr( $rev_slider_alias ); ?>" <?php selected( $value, $rev_slider_alias ); ?>>
					<?php echo esc_html_x( 'Slider Revolution: ', 'page option value', 'yith-proteo' ) . esc_html( $rev_slider_alias ); ?>
				</option>
				<?php
			}
		}
		?>
	</select>
	<?php
}

/**
 * Manage page content spacing metabox html
 *
 * @param object $post Post object.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_manage_page_content_spacing_html( $post ) {
	wp_nonce_field( '_yith_proteo_custom_page_content_spacing_nonce', 'yith_proteo_custom_page_content_spacing_nonce' );
	$spacing_enabler = get_post_meta( $post->ID, 'yith_proteo_custom_page_content_spacing_enabler', true );
	$spacing         = get_post_meta( $post->ID, 'yith_proteo_custom_page_content_spacing', true );
	?>
	<style>
		.yith-proteo-page-content-spacing-container {
			position: relative;
			display: flex;
		}
		.yith-proteo-page-content-spacing-container li {
			display: inline-block;
			text-align: center;
			-webkit-box-flex: 1;
			-ms-flex: auto;
			flex: auto;
			margin-right: 5px;
		}
		.yith-proteo-page-content-spacing-container li:last-of-type {
			margin-right: 0;
		}
		.yith-proteo-page-content-spacing-container li span {
			display: block;
			font-size: 0.75em;
			text-align: left;
			text-transform: uppercase;
			padding-bottom: 2px;
			font-weight: 500;
		}
		.yith-proteo-page-content-spacing-container li input {
			width: 100%;
			margin: 0;
		}

		body .edit-post-meta-boxes-area .metabox-location-side .postbox .yith-proteo-custom-spacing-control-enabler {
			background: #fff;
			border-color: #757575;
		}

		body .edit-post-meta-boxes-area .metabox-location-side .postbox .yith-proteo-custom-spacing-control-enabler:checked {
			background: #007cba;
			background: var(--wp-admin-theme-color);
			border-color: #007cba;
			border-color: var(--wp-admin-theme-color);
		}

		.yith-proteo-custom-spacing-control-enabler ~ svg {
			display: none;
			fill: #fff;
			cursor: pointer;
			position: absolute;
			left: 14px;
			width: 20px;
			height: 20px;
			-webkit-user-select: none;
			-ms-user-select: none;
			user-select: none;
			pointer-events: none;
		}

		.yith-proteo-custom-spacing-control-enabler ~ .yith-proteo-page-content-spacing-container {
			display: none;
		}
		.yith-proteo-custom-spacing-control-enabler:checked ~ .yith-proteo-page-content-spacing-container {
			display: flex;
		}
		.yith-proteo-custom-spacing-control-enabler:checked ~ svg {
			display: inline;
		}

	</style>
	<h3><?php echo esc_html_x( 'Spacing (px)', 'Page edit metabox label', 'yith-proteo' ); ?></h3>
	<input type="checkbox" class="components-checkbox-control__input yith-proteo-custom-spacing-control-enabler" name="yith_proteo_custom_page_content_spacing_enabler" <?php checked( 'on', $spacing_enabler ); ?> value="on">
	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" role="img" aria-hidden="true" focusable="false"><path d="M18.3 5.6L9.9 16.9l-4.6-3.4-.9 1.2 5.8 4.3 9.3-12.6z"></path></svg>
	<label class="components-checkbox-control__label" for="yith_proteo_custom_page_content_spacing_enabler"><?php echo esc_html_x( 'Set custom content spacing', 'Page edit metabox label', 'yith-proteo' ); ?></label>
	<ul class="yith-proteo-page-content-spacing-container spacing-wrapper">
		<li>
			<label class="control-spacing-label">
				<span><?php echo esc_html_x( 'Top', 'page option value', 'yith-proteo' ); ?></span>
				<input type="number" name="yith_proteo_custom_page_content_spacing[top]" value="<?php echo isset( $spacing['top'] ) ? esc_attr( $spacing['top'] ) : 0; ?>" class="spacing-input">
			</label>
		</li>
		<li>
			<label class="control-spacing-label">
				<span><?php echo esc_html_x( 'Right', 'page option value', 'yith-proteo' ); ?></span>
				<input type="number" name="yith_proteo_custom_page_content_spacing[right]" value="<?php echo isset( $spacing['right'] ) ? esc_attr( $spacing['right'] ) : 0; ?>" class="spacing-input">
			</label>
		</li>
		<li>
			<label class="control-spacing-label">
				<span><?php echo esc_html_x( 'Bottom', 'page option value', 'yith-proteo' ); ?></span>
				<input type="number" name="yith_proteo_custom_page_content_spacing[bottom]" value="<?php echo isset( $spacing['bottom'] ) ? esc_attr( $spacing['bottom'] ) : 0; ?>" class="spacing-input">
			</label>
		</li>
		<li>
			<label class="control-spacing-label">
				<span><?php echo esc_html_x( 'Left', 'page option value', 'yith-proteo' ); ?></span>
				<input type="number" name="yith_proteo_custom_page_content_spacing[left]" value="<?php echo isset( $spacing['left'] ) ? esc_attr( $spacing['left'] ) : 0; ?>" class="spacing-input">
			</label>
		</li>
	</ul>
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
 * Hide page title meta save
 *
 * @param int $post_id Post object ID.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_hide_page_title_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['yith_proteo_hide_page_title_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['yith_proteo_hide_page_title_nonce'] ) ), '_yith_proteo_hide_page_title_nonce' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( isset( $_POST['yith_proteo_hide_page_title'] ) ) {
		update_post_meta( $post_id, 'yith_proteo_hide_page_title', sanitize_text_field( wp_unslash( $_POST['yith_proteo_hide_page_title'] ) ) );
	} else {
		update_post_meta( $post_id, 'yith_proteo_hide_page_title', 'off' );
	}
}

add_action( 'save_post', 'yith_proteo_hide_page_title_save' );

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


/**
 * Custom page spacing save
 *
 * @param int $post_id Post object ID.
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_custom_page_content_spacing_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! isset( $_POST['yith_proteo_custom_page_content_spacing_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['yith_proteo_custom_page_content_spacing_nonce'] ) ), '_yith_proteo_custom_page_content_spacing_nonce' ) ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['yith_proteo_custom_page_content_spacing_enabler'] ) ) {
		update_post_meta( $post_id, 'yith_proteo_custom_page_content_spacing_enabler', sanitize_text_field( wp_unslash( $_POST['yith_proteo_custom_page_content_spacing_enabler'] ) ) );
	} else {
		update_post_meta( $post_id, 'yith_proteo_custom_page_content_spacing_enabler', 'off' );
	}

	if ( isset( $_POST['yith_proteo_custom_page_content_spacing'] ) && is_array( $_POST['yith_proteo_custom_page_content_spacing'] ) ) {
		update_post_meta( $post_id, 'yith_proteo_custom_page_content_spacing', array_map( 'intval', $_POST['yith_proteo_custom_page_content_spacing'] ) );
	}
}

add_action( 'save_post', 'yith_proteo_custom_page_content_spacing_save' );


/**
 * Remove metabox from blog page and shop page
 *
 * @return void
 */
function yith_proteo_remove_page_meta_boxes() {
	// Array of pages when sidebars should not appear.
	$no_sidebar_pages = array(
		get_option( 'page_for_posts' ),
		get_option( 'woocommerce_shop_page_id' ),
		get_option( 'woocommerce_cart_page_id' ),
		get_option( 'woocommerce_checkout_page_id' ),
		get_option( 'woocommerce_myaccount_page_id' ),
	);

	if ( isset( $_GET['post'] ) && in_array( $_GET['post'], $no_sidebar_pages, true ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		remove_meta_box(
			'sidebar_position',
			array( 'post', 'page', 'product' ),
			'side'
		);
		remove_meta_box(
			'sidebar_chooser',
			array( 'post', 'page', 'product' ),
			'side'
		);
	}
}

add_action( 'add_meta_boxes', 'yith_proteo_remove_page_meta_boxes' );
