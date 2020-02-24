<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$logged_in_user = wp_get_current_user();
$username     = $logged_in_user->display_name;
$user_id      = get_current_user_id();
$is_company   = ! empty( $logged_in_user->billing_company );
?>
<div class="row">
    <div class="col-md-6">
        <div class="account-info-box">
            <h3><?php _e( 'Personal info', 'yith-proteo' ); ?></h3>
            <p>
                <b><?php _e( 'First name:', 'yith-proteo' ) ?></b>
				<?php echo $logged_in_user->billing_first_name; ?>
            </p>
            <p>
                <b><?php _e( 'Last name:', 'yith-proteo' ) ?></b>
				<?php echo $logged_in_user->billing_last_name; ?>
            </p>
            <p>
                <b><?php _e( 'E-mail:', 'yith-proteo' ) ?></b>
				<?php echo antispambot( $logged_in_user->billing_email ); ?>
            </p>
            <p>
                <b><?php _e( 'Password:', 'yith-proteo' ) ?></b>
                **********
            </p>
            <div class="actions">
                <a href="<?php echo wc_get_endpoint_url( 'edit-account' ) ?>"
                   class="button"><?php _e( 'Edit info', 'yith-proteo' ) ?></a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="account-info-box">
            <h3><?php _e( 'Billing info & address', 'yith-proteo' ); ?></h3>
            <p>
                <b><?php _e( 'First name:', 'yith-proteo' ) ?></b>
				<?php echo $logged_in_user->billing_first_name; ?>
            </p>
            <p>
                <b><?php _e( 'Last name:', 'yith-proteo' ) ?></b>
				<?php echo $logged_in_user->billing_last_name; ?>
            </p>
			<?php if ( $is_company ) : ?>
                <p>
                    <b><?php _e( 'Company name:', 'yith-proteo' ) ?></b>
					<?php echo $logged_in_user->billing_company; ?>
                </p>
                <p>
                    <b><?php _e( 'VAT:', 'yith-proteo' ) ?></b>
					<?php echo $logged_in_user->billing_vat; ?>
                </p>
			<?php else: ?>
                <p>
                    <b><?php _e( 'CIF/SSN:', 'yith-proteo' ) ?></b>
					<?php echo $logged_in_user->billing_ssn; ?>
                </p>
			<?php endif; ?>
            <p>
                <b><?php _e( 'Address:', 'yith-proteo' ) ?></b>
				<?php echo $logged_in_user->billing_address_1 . ' ' . $logged_in_user->billing_address_2 . ' ' . $logged_in_user->billing_postcode . ' ' . $logged_in_user->billing_city . ' ' . $logged_in_user->billing_state . ' ' . $logged_in_user->billing_country; ?>
            </p>
            <div class="actions">
                <a href="<?php echo wc_get_endpoint_url( 'edit-address', 'billing' ) ?>"
                   class="button"><?php _e( 'Edit info', 'yith-proteo' ) ?></a>
            </div>
        </div>
    </div>

	<div class="col-md-6">
		<div class="account-info-box">
			<h3><?php _e( 'Shipping info & address', 'yith-proteo' ); ?></h3>
			<p>
				<b><?php _e( 'First name:', 'yith-proteo' ) ?></b>
				<?php echo $logged_in_user->shipping_first_name; ?>
			</p>
			<p>
				<b><?php _e( 'Last name:', 'yith-proteo' ) ?></b>
				<?php echo $logged_in_user->shipping_last_name; ?>
			</p>
			<?php if ( $is_company ) : ?>
				<p>
					<b><?php _e( 'Company name:', 'yith-proteo' ) ?></b>
					<?php echo $logged_in_user->shipping_company; ?>
				</p>
				<p>
					<b><?php _e( 'VAT:', 'yith-proteo' ) ?></b>
					<?php echo $logged_in_user->shipping_vat; ?>
				</p>
			<?php else: ?>
				<p>
					<b><?php _e( 'CIF/SSN:', 'yith-proteo' ) ?></b>
					<?php echo $logged_in_user->shipping_ssn; ?>
				</p>
			<?php endif; ?>
			<p>
				<b><?php _e( 'Address:', 'yith-proteo' ) ?></b>
				<?php echo $logged_in_user->shipping_address_1 . ' ' . $logged_in_user->shipping_address_2 . ' ' . $logged_in_user->shipping_postcode . ' ' . $logged_in_user->shipping_city . ' ' . $logged_in_user->shipping_state . ' ' . $logged_in_user->shipping_country; ?>
			</p>
			<div class="actions">
				<a href="<?php echo wc_get_endpoint_url( 'edit-address', 'billing' ) ?>"
				   class="button"><?php _e( 'Edit info', 'yith-proteo' ) ?></a>
			</div>
		</div>
	</div>
</div>