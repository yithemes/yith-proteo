<?php
/**
 * Proteo My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/proteo-dashboard.php.
 */

?>

<ul class="yith_proteo_dashboard_links row">
	<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
		<?php if ( $endpoint == 'dashboard' ) :
			continue;
		endif; ?>
		<li class="col-lg-4 col-md-6 <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
			<div>
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">
					<?php

					$icon = '';
					switch ( $endpoint ) :
						case 'downloads' :
							$icon = '<span class="yith-proteo-myaccount-icons lnr lnr-download"></span>';
							break;
						case 'orders' :
							$icon = '<span class="yith-proteo-myaccount-icons lnr lnr-cart"></span>';
							break;
						case 'edit-account':
							$icon = '<span class="yith-proteo-myaccount-icons lnr lnr-user"></span>';
							break;
						case 'edit-address' :
							$icon = '<span class="yith-proteo-myaccount-icons lnr lnr-map-marker"></span>';
							break;
						default :
						    $icon = '<span class="yith-proteo-myaccount-icons lnr lnr-star"></span>';
							break;

					endswitch;
					echo $icon;
					echo esc_html( $label );
					?>
				</a>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
