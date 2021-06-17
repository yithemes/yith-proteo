<?php
/**
 * Taxonomies metaboxes file
 *
 * @package yith-proteo
 */

/**
 * Add product category meta to new taxonomy
 *
 * @return void
 */
function yith_proteo_taxonomy_add_new_meta_field() {
	?>
	<div class='form-field'>
		<label for='yith_proteo_term_meta[sidebar_position]'><?php esc_html_e( 'Sidebar position', 'yith-proteo' ); ?></label>
		<select name="yith_proteo_term_meta[sidebar_position]" id="yith_proteo_term_meta[sidebar_position]" class="components-text-control__input yith_proteo_product_taxonomy_sidebar_position">
			<option value="inherit" selected>
				<?php echo esc_html_x( 'inherit', 'page option value', 'yith-proteo' ); ?>
			</option>
			<option value="no-sidebar" >
				<?php echo esc_html_x( 'no-sidebar', 'page option value', 'yith-proteo' ); ?>
			</option>
			<option value="left">
				<?php echo esc_html_x( 'left', 'page option value', 'yith-proteo' ); ?>
			</option>
			<option value="right">
				<?php echo esc_html_x( 'right', 'page option value', 'yith-proteo' ); ?>
			</option>
		</select>
	</div>

	<div class='form-field'>
		<label for='yith_proteo_term_meta[sidebar_chooser]'><?php esc_html_e( 'Sidebar to display', 'yith-proteo' ); ?></label>
		<select name="yith_proteo_term_meta[sidebar_chooser]" id="yith_proteo_term_meta[sidebar_chooser]" class="components-text-control__input yith_proteo_product_taxonomy_sidebar">
			<option value="inherit" selected>
				<?php echo esc_html_x( 'inherit', 'page option value', 'yith-proteo' ); ?>
			</option>
			<?php foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { ?>
				<option value="<?php echo esc_attr( ucwords( $sidebar['id'] ) ); ?>">
					<?php echo esc_html( ucwords( $sidebar['name'] ) ); ?>
				</option>
			<?php } ?>
		</select>
	</div>
	<?php
}

add_action( 'product_cat_add_form_fields', 'yith_proteo_taxonomy_add_new_meta_field', 10, 2 );

/**
 * Add product category meta to edit taxonomy screen
 *
 * @param object $term the taxonomy Wp_Term object.
 * @return void
 */
function yith_proteo_taxonomy_edit_meta_field( $term ) {

	// getting term ID.
	$term_id = $term->term_id;

	// retrieve the existing value(s) for this meta field. This returns an array.
	$yith_proteo_term_meta = get_term_meta( $term_id, 'yith_proteo_product_taxonomy_meta', true );

	?>
	<tr class='form-field'>
		<th scope="row" valign="top">
			<label for='yith_proteo_term_meta[sidebar_position]'><?php esc_html_e( 'Sidebar position', 'yith-proteo' ); ?></label>
		</th>
		<td>
			<select name="yith_proteo_term_meta[sidebar_position]" id="yith_proteo_term_meta[sidebar_position]" class="components-text-control__input yith_proteo_product_taxonomy_sidebar_position">
				<option
					value="inherit" <?php echo ( isset( $yith_proteo_term_meta['sidebar_position'] ) && 'inherit' === $yith_proteo_term_meta['sidebar_position'] ) ? 'selected' : ''; ?>>
					<?php echo esc_html_x( 'inherit default sidebar position', 'page option value', 'yith-proteo' ); ?>
				</option>
				<option
					value="no-sidebar" <?php echo ( isset( $yith_proteo_term_meta['sidebar_position'] ) && 'no-sidebar' === $yith_proteo_term_meta['sidebar_position'] ) ? 'selected' : ''; ?>>
					<?php echo esc_html_x( 'no-sidebar', 'page option value', 'yith-proteo' ); ?>
				</option>
				<option
					value="left" <?php echo ( isset( $yith_proteo_term_meta['sidebar_position'] ) && 'left' === $yith_proteo_term_meta['sidebar_position'] ) ? 'selected' : ''; ?>>
					<?php echo esc_html_x( 'left', 'page option value', 'yith-proteo' ); ?>
				</option>
				<option
					value="right" <?php echo ( isset( $yith_proteo_term_meta['sidebar_position'] ) && 'right' === $yith_proteo_term_meta['sidebar_position'] ) ? 'selected' : ''; ?>>
					<?php echo esc_html_x( 'right', 'page option value', 'yith-proteo' ); ?>
				</option>
			</select>
		</td>
	</tr>

	<tr class='form-field'>
		<th scope="row" valign="top">
			<label for='yith_proteo_term_meta[sidebar_chooser]'><?php esc_html_e( 'Sidebar to display', 'yith-proteo' ); ?></label>
		</th>
		<td>
			<select name="yith_proteo_term_meta[sidebar_chooser]" id="yith_proteo_term_meta[sidebar_chooser]" class="components-text-control__input yith_proteo_product_taxonomy_sidebar">
				<option
					value="inherit" <?php echo ( isset( $yith_proteo_term_meta['sidebar_chooser'] ) && 'inherit' === $yith_proteo_term_meta['sidebar_chooser'] ) ? 'selected' : ''; ?>>
					<?php echo esc_html_x( 'inherit default sidebar', 'page option value', 'yith-proteo' ); ?>
				</option>
				<?php foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { ?>
					<option
						value="<?php echo esc_attr( ucwords( $sidebar['id'] ) ); ?>" <?php echo ( isset( $yith_proteo_term_meta['sidebar_chooser'] ) && esc_attr( ucwords( $sidebar['id'] ) ) === $yith_proteo_term_meta['sidebar_chooser'] ) ? 'selected' : ''; ?>>
						<?php echo esc_html( ucwords( $sidebar['name'] ) ); ?>
					</option>
				<?php } ?>
			</select>
		</td>
	</tr>
	<?php
}

add_action( 'product_cat_edit_form_fields', 'yith_proteo_taxonomy_edit_meta_field', 10, 2 );

/**
 * Save product category metaboxes
 *
 * @param int $term_id The taxonomy ID.
 * @return void
 */
function yith_proteo_save_taxonomy_meta( $term_id ) {
	// exit if WooCommerce is not enabled.
	if ( ! defined( 'WOOCOMMERCE_VERSION' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// phpcs:disable WordPress.Security.NonceVerification.Missing
	if ( isset( $_POST['yith_proteo_term_meta'] ) ) {
		$yith_proteo_term_meta = wc_clean( wp_unslash( $_POST['yith_proteo_term_meta'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

		update_term_meta( $term_id, 'yith_proteo_product_taxonomy_meta', $yith_proteo_term_meta );
	}
	// phpcs:enable WordPress.Security.NonceVerification.Missing
}

add_action( 'edited_product_cat', 'yith_proteo_save_taxonomy_meta', 10, 2 );
add_action( 'create_product_cat', 'yith_proteo_save_taxonomy_meta', 10, 2 );
