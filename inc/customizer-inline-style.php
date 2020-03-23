<?php
/**
 * @package yith-proteo
 */

/**
 * Add a custom style based on customizer theme options
 *
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */
function yith_proteo_inline_style() {
	// Register a dummy empty style to hook to
	wp_register_style( 'yith-proteo-custom-style', false, array(), YITH_PROTEO_VERSION );
	wp_enqueue_style( 'yith-proteo-custom-style' );

	$custom_css = '';

	$font         = '';
	$default_font = ( get_theme_mod( 'yith_proteo_google_font', esc_url_raw( 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap' ) ) ) == 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap' ? true : false;

	$main_color_shade         = get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' );
	$general_link_hover_color = get_theme_mod( 'yith_proteo_general_link_hover_color', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), - 0.3 ) );

	$header_bg_color         = get_theme_mod( 'yith_proteo_header_background_color', '#ffffff' );
	$topbar_bg_color         = get_theme_mod( 'yith_proteo_topbar_background_color', '#ebebeb' );
	$footer_bg_color         = get_theme_mod( 'yith_proteo_footer_background_color', '#f7f7f7' );
	$footer_credits_bg_color = get_theme_mod( 'yith_proteo_footer_credits_background_color', '#f0f0f0' );

	$base_font_size  = get_theme_mod( 'yith_proteo_base_font_size', 16 );
	$base_font_color = get_theme_mod( 'yith_proteo_base_font_color', '#404040' );
	$h1_font_size    = get_theme_mod( 'yith_proteo_h1_font_size', 70 );
	$h1_font_color   = get_theme_mod( 'yith_proteo_h1_font_color', '#404040' );
	$h2_font_size    = get_theme_mod( 'yith_proteo_h2_font_size', 40 );
	$h2_font_color   = get_theme_mod( 'yith_proteo_h2_font_color', '#404040' );
	$h3_font_size    = get_theme_mod( 'yith_proteo_h3_font_size', 19 );
	$h3_font_color   = get_theme_mod( 'yith_proteo_h3_font_color', '#404040' );
	$h4_font_size    = get_theme_mod( 'yith_proteo_h4_font_size', 16 );
	$h4_font_color   = get_theme_mod( 'yith_proteo_h4_font_color', '#404040' );
	$h5_font_size    = get_theme_mod( 'yith_proteo_h5_font_size', 13 );
	$h5_font_color   = get_theme_mod( 'yith_proteo_h5_font_color', '#404040' );
	$h6_font_size    = get_theme_mod( 'yith_proteo_h6_font_size', 11 );
	$h6_font_color   = get_theme_mod( 'yith_proteo_h6_font_color', '#404040' );

	/**
	 * Buttons
	 */
	$button_1_bg_color           = get_theme_mod( 'yith_proteo_button_style_1_bg_color', get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ) );
	$button_1_border_color       = get_theme_mod( 'yith_proteo_button_style_1_border_color', get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ) );
	$button_1_font_color         = get_theme_mod( 'yith_proteo_button_style_1_text_color', '#ffffff' );
	$button_1_bg_hover_color     = get_theme_mod( 'yith_proteo_button_style_1_bg_color_hover', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ) );
	$button_1_border_hover_color = get_theme_mod( 'yith_proteo_button_style_1_border_color_hover', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ) );
	$button_1_font_hover_color   = get_theme_mod( 'yith_proteo_button_style_1_text_color_hover', '#ffffff' );

	$button_2_bg_color_1       = get_theme_mod( 'yith_proteo_button_style_2_bg_color_1', get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ) );
	$button_2_bg_color_1       = yith_proteo_hex2rgba( $button_2_bg_color_1, 1 );
	$button_2_bg_color_2       = get_theme_mod( 'yith_proteo_button_style_2_bg_color_2', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), 0.2 ) );
	$button_2_bg_color_2       = yith_proteo_hex2rgba( $button_2_bg_color_2, 1 );
	$button_2_font_color       = get_theme_mod( 'yith_proteo_button_style_2_text_color', '#ffffff' );
	$button_2_bg_hover_color   = get_theme_mod( 'yith_proteo_button_style_2_bg_color_hover', yith_proteo_adjust_brightness( get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ), - 0.3 ) );
	$button_2_font_hover_color = get_theme_mod( 'yith_proteo_button_style_2_text_color_hover', '#ffffff' );

	/**
	 * Store options
	 */
	$store_notice_bg_color   = get_theme_mod( 'yith_proteo_store_notice_bg_color', '#607d8b' );
	$store_notice_text_color = get_theme_mod( 'yith_proteo_store_notice_text_color', '#ffffff' );
	$store_notice_font_size  = get_theme_mod( 'yith_proteo_store_notice_font_size', 13 );
	$sale_badge_bg_color     = get_theme_mod( 'yith_proteo_sale_badge_bg_color', get_theme_mod( 'yith_proteo_main_color_shade', '#448a85' ) );
	$sale_badge_text_color   = get_theme_mod( 'yith_proteo_sale_badge_text_color', '#ffffff' );
	$sale_badge_font_size    = get_theme_mod( 'yith_proteo_sale_badge_font_size', 13 );

	$woo_messages_font_size            = get_theme_mod( 'yith_proteo_woo_messages_font_size', 14 );
	$woo_messages_default_accent_color = get_theme_mod( 'yith_proteo_woo_default_messages_accent_color', '#17b4a9' );
	$woo_messages_info_accent_color    = get_theme_mod( 'yith_proteo_woo_info_messages_accent_color', '#e0e0e0' );
	$woo_messages_error_accent_color   = get_theme_mod( 'yith_proteo_woo_error_messages_accent_color', '#ffab91' );

	if ( $default_font ) {
		$font = 'body, body.yith-woocompare-popup { font-family: \'Montserrat\', sans-serif; }';
	}


	$custom_css = "
				{$font}

				* {
				  outline-color: {$main_color_shade};
				}

				a,
				.comment-reply a,
				.button.ghost,
				.wishlist-title a.show-title-form,
				.wishlist-title a.hide-title-form,
				.submit-wishlist-changes,
				.yith_wcwl_wishlist_bulk_action input[type=submit],
				.yith_wcwl_wishlist_footer .yith_wcwl_wishlist_update input[type=submit],
				.wpcf7-form-control.ghost,
				.button.ywgc_apply_gift_card_button,
				.checkout_coupon button[name=apply_coupon],
				.unstyled_button, .button.unstyled_button,
				.unstyled_button:hover, .button.unstyled_button:hover,
				span.checkboxbutton:before,
				.widget_yith_proteo_social_icons a:hover,
				header.entry-header .entry-title a:hover,
				header.entry-header .entry-meta a:hover,
				.comment-list .comment-body .comment-meta .comment-metadata a.url:hover,
				table.cart tbody tr td.actions .coupon button, table.cart tfoot tr td.actions .coupon button, table.shop_table tbody tr td.actions .coupon button, table.shop_table tfoot tr td.actions .coupon button,
				body.woocommerce-cart .cart-collaterals .cart_totals table tr.order-total,
				body.woocommerce-checkout table.woocommerce-checkout-review-order-table .order-total th,
				.woocommerce-breadcrumb a:hover,
				.widget_shopping_cart .proceed-to-cart-icon:hover span.lnr,
				.widget_shopping_cart .yith-proteo-mini-cart-content ul li > *:hover,
				.widget_shopping_cart .yith-proteo-mini-cart-content .woocommerce-mini-cart__buttons a.wc-forward:not(.checkout),
				.widget_nav_menu ul li a:hover,
				.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover,
				.woocommerce-account ul.yith_proteo_dashboard_links li > div a:hover,
				.woocommerce .ywcps-wrapper #nav_prev_def_free span:hover,
				.woocommerce .ywcps-wrapper #nav_next_def_free span:hover,
				.wishlist_table.modern_grid li .product-remove a:hover,
				.wishlist_table.images_grid li .product-remove a:hover,
				.single-product .single-product-layout-cols .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:not(.button):hover,
				.single-product .woocommerce-tabs + .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:not(.button):hover,
				.single-product .single-product-layout-cols .yith-wcwl-add-to-wishlist a:not(.button):hover,
				.single-product .woocommerce-tabs + .yith-wcwl-add-to-wishlist a:not(.button):hover,
				.wishlist-page-links a:hover, .wishlist-page-links a.active,
				table.wishlist_table.wishlist_manage_table td.wishlist-download a:hover,
				table.wishlist_table.wishlist_manage_table td.wishlist-delete a:hover,
				.wishlist_manage_table.modern_grid li .wishlist-title-with-form .show-title-form .fa-pencil:hover:before,
				.wishlist_manage_table.modern_grid li .item-details table.item-details-table td.value a:hover,
				.widget_yith-wcwl-items div.list ul li > *.mini-cart-item-info a:hover,
				.widget_yith-wcwl-items div.list ul li > *.mini-cart-item-info .mini-cart-wishlist-info a,
				.widget_yith-wcwl-items div.list a.show-wishlist,
				.single-product div.product .summary.entry-summary a.compare:not(.button):hover,
				.single-product div.product .summary.entry-summary .price,
				.main-navigation a:hover,
				.site-branding .site-title a:hover,
				.single-product .single-product-layout-cols .yith-wcwl-add-to-wishlist .yith-wcwl-icon,
				.single-product .woocommerce-tabs + .yith-wcwl-add-to-wishlist .yith-wcwl-icon,
				table.cart tbody tr td.actions button[name=update_cart],
				.woocommerce .products .add-request-quote-button.button,
                .woocommerce .products .add-request-quote-button-addons.button,
                #yith-wacp-popup .yith-wacp-content .yith-wacp-related a.button,
                #yith-wacp-popup .yith-wacp-content .yith-wacp-related a.button:hover {
					color: {$main_color_shade};
				}

				.woocommerce .products .add-request-quote-button.button:hover,
                .woocommerce .products .add-request-quote-button-addons.button:hover,
				a:hover, a:focus, a:active, table.cart tbody tr td.actions button[name=update_cart]:hover {
				    color: {$general_link_hover_color};
				}

				.select2-dropdown .select2-results__option.select2-results__option--highlighted,
				.select2-dropdown .select2-results__option.select2-results__option[data-selected=true],
				 .selectBox-dropdown-menu li.selectBox-selected a,
				 .selectBox-dropdown-menu li.selectBox-hover a {
				    color: {$main_color_shade} !important;
				}

				button,
				input[type=button],
				input[type=reset],
				input[type=submit],
				.button,
				.widget a.button,
				.wishlist-submit.popup_button,
				.button.ghost:hover,
				.wishlist-title a.show-title-form:hover,
				.wishlist-title a.hide-title-form:hover,
				.submit-wishlist-changes:hover,
				.yith_wcwl_wishlist_bulk_action input[type=submit]:hover,
				.yith_wcwl_wishlist_footer .yith_wcwl_wishlist_update input[type=submit]:hover,
				.wpcf7-form-control.ghost:hover,
				.button.ywgc_apply_gift_card_button:hover,
				.checkout_coupon button[name=apply_coupon]:hover,
				table.cart tbody tr td.actions .coupon button, table.cart tfoot tr td.actions .coupon button, table.shop_table tbody tr td.actions .coupon button, table.shop_table tfoot tr td.actions .coupon button,
				.button.ghost,
				.wishlist-title a.show-title-form,
				.wishlist-title a.hide-title-form,
				.submit-wishlist-changes,
				.yith_wcwl_wishlist_bulk_action input[type=submit],
				.yith_wcwl_wishlist_footer .yith_wcwl_wishlist_update input[type=submit],
				.wpcf7-form-control.ghost,
				.button.ywgc_apply_gift_card_button,
				.checkout_coupon button[name=apply_coupon],
				.with-tooltip .yith-wcwl-tooltip:before,
				.with-dropdown .with-tooltip .yith-wcwl-tooltip:before,
				input[type=text]:focus,
				input[type=email]:focus,
				input[type=url]:focus,
				input[type=password]:focus,
				input[type=search]:focus,
				input[type=number]:focus,
				input[type=tel]:focus,
				input[type=range]:focus,
				input[type=date]:focus,
				input[type=month]:focus,
				input[type=week]:focus,
				input[type=time]:focus,
				input[type=datetime]:focus,
				input[type=datetime-local]:focus,
				input[type=color]:focus,
				textarea:focus{
					border-color: {$main_color_shade};
				}

				input[type=text]:focus,
				input[type=email]:focus,
				input[type=url]:focus,
				input[type=password]:focus,
				input[type=search]:focus,
				input[type=number]:focus,
				input[type=tel]:focus,
				input[type=range]:focus,
				input[type=date]:focus,
				input[type=month]:focus,
				input[type=week]:focus,
				input[type=time]:focus,
				input[type=datetime]:focus,
				input[type=datetime-local]:focus,
				input[type=color]:focus,
				textarea:focus{
					box-shadow: 0 0 2px {$main_color_shade};
				}

				.button.ghost:hover,
				.wishlist-title a.show-title-form:hover,
				.wishlist-title a.hide-title-form:hover,
				.submit-wishlist-changes:hover,
				.yith_wcwl_wishlist_bulk_action input[type=submit]:hover,
				.yith_wcwl_wishlist_footer .yith_wcwl_wishlist_update input[type=submit]:hover,
				.wpcf7-form-control.ghost:hover,
				.button.ywgc_apply_gift_card_button:hover,
				.checkout_coupon button[name=apply_coupon]:hover,
				table.cart tbody tr td.actions .coupon button:hover, table.cart tfoot tr td.actions .coupon button:hover, table.shop_table tbody tr td.actions .coupon button:hover, table.shop_table tfoot tr td.actions .coupon button:hover,
				.widget_shopping_cart .yith-proteo-mini-cart-content .woocommerce-mini-cart__buttons a.checkout {
					background-color: {$main_color_shade};
				}

				button,
				input[type=button],
				input[type=reset],
				input[type=submit],
				.button,
				.widget a.button,
				.wishlist-submit.popup_button,
				span.checkboxbutton.checked:before,
				span.radiobutton.checked:before,
				header.entry-header .date-and-thumbnail time.published,
				span.onsale, .wc-block-grid .wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-onsale,
				.pswp__bg,
				.widget_price_filter .ui-slider .ui-slider-handle,
				.widget_price_filter .ui-slider .ui-slider-range,
				.with-tooltip .yith-wcwl-tooltip {
					background: {$main_color_shade};
				}

                header.site-header {
                    background-color: {$header_bg_color};
                }
                #topbar {
                    background-color: {$topbar_bg_color};
                }
                #main-footer {
                    background-color: {$footer_bg_color};
                }
                #main-footer .site-info {
                    background-color: {$footer_credits_bg_color};
                }

                body, body.yith-woocompare-popup, button, input, select, optgroup, textarea {
                    font-size: {$base_font_size}px;
                    color: {$base_font_color};
                }

                h1,
                article.page header.entry-header h1,
                article:not(.has-post-thumbnail).page header.entry-header h1,
                article.page header.entry-header .entry-title.lnr{
                    font-size: {$h1_font_size}px;
                    color: {$h1_font_color};
                }

                h2 {
                    font-size: {$h2_font_size}px;
                    color: {$h2_font_color};
                }

                h3, .widget_products .product-title {
                    font-size: {$h3_font_size}px;
                    color: {$h3_font_color};
                }

                h4 {
                    font-size: {$h4_font_size}px;
                    color: {$h4_font_color};
                }

                h5 {
                    font-size: {$h5_font_size}px;
                    color: {$h5_font_color};
                }

                h6 {
                    font-size: {$h6_font_size}px;
                    color: {$h6_font_color};
                }

                /* Button style 1*/
                button,
                input[type=\"button\"],
                input[type=\"reset\"],
                input[type=\"submit\"],
                .button,
                .widget a.button,
                .button-style-1:not(.wp-block-button), .button-style-1 a {
					background: none;
                    background-color: {$button_1_bg_color};
					border-color: {$button_1_border_color};
					color: {$button_1_font_color};
                }

                 button:hover,
                 input[type=\"button\"]:hover,
                 input[type=\"reset\"]:hover,
                 input[type=\"submit\"]:hover,
                 .button:hover,
                 .widget a.button:hover,
                 .wishlist-submit.popup_button:hover,
                 .button.flat:hover,
				 .yith_wcwl_footer_additional_action .ask-an-estimate-button:hover,
				 .widget_shopping_cart .yith-proteo-mini-cart-content .woocommerce-mini-cart__buttons a.checkout:hover,
				 .button-style-1:not(.wp-block-button):hover, .button-style-1 a:hover {
					background: none;
                    background-color: {$button_1_bg_hover_color};
					border-color: {$button_1_border_hover_color};
					color: {$button_1_font_hover_color};
                 }

                /* Button style 2*/
                button.alt,
                input[type=\"button\"].alt,
                input[type=\"reset\"].alt,
                input[type=\"submit\"].alt,
                .button.alt,
                .widget-area .widget a.button.alt,
                .wishlist-submit.popup_button,
                .yith_wcwl_wishlist_footer input[name=\"add_all_to_cart\"],
                .button-style-2:not(.wp-block-button), .button-style-2 a {
                    background-color: {$button_2_bg_color_1};
                    background: linear-gradient(180deg, {$button_2_bg_color_1} 0%, {$button_2_bg_color_2} 100%);
					color: {$button_2_font_color};
					border: none;
                }
                button.alt:hover,
                input[type=\"button\"].alt:hover,
                input[type=\"reset\"].alt:hover,
                input[type=\"submit\"].alt:hover,
                .button.alt:hover,
                .widget-area .widget a.button.alt:hover,
                .wishlist-submit.popup_button:hover,
                .yith_wcwl_wishlist_footer input[name=\"add_all_to_cart\"]:hover,
                .button-style-2:not(.wp-block-button):hover, .button-style-2 a:hover {
                    background-color: {$button_2_bg_hover_color};
                    background: linear-gradient(180deg, {$button_2_bg_hover_color} 0%, {$button_2_bg_hover_color} 100%);
					color: {$button_2_font_hover_color};
                }

                /* Store options */

                .woocommerce-store-notice.demo_store {
                    background-color: {$store_notice_bg_color};
                    color: {$store_notice_text_color};
                    font-size: {$store_notice_font_size}px;
                }
                .woocommerce span.onsale {
                    background-color: {$sale_badge_bg_color};
                    color: {$sale_badge_text_color};
                    font-size: {$sale_badge_font_size}px;
                }
                .woocommerce-message,
				.woocommerce-info,
				.woocommerce-error,
				 .entry-content .ywgc_enter_code p,
				 body.woocommerce-checkout .checkout_coupon p{
				    font-size: {$woo_messages_font_size}px;
				}
				.woocommerce-message {
					border-color: {$woo_messages_default_accent_color};
				}
				.woocommerce-info {
					border-color: {$woo_messages_info_accent_color};
				}
				.woocommerce-error, div.wpcf7-validation-errors {
					border-color: {$woo_messages_error_accent_color};
				}
	";


	if ( ! empty( $custom_css ) ) {
		wp_add_inline_style( 'yith-proteo-custom-style', $custom_css );
	}
}

add_action( 'wp_enqueue_scripts', 'yith_proteo_inline_style', 10 );

/**
 * Convert hexdec color string to rgb(a) string
 * @author Francesco Grasso <francgrasso@yithemes.com>
 */

if ( ! function_exists( 'yith_proteo_hex2rgba' ) ) :
	function yith_proteo_hex2rgba( $color, $opacity = false ) {

		$default = 'rgb(0,0,0)';

		//Return default if no color provided
		if ( empty( $color ) ) {
			return $default;
		}

		//Sanitize $color if "#" is provided
		if ( '#' == $color[0] ) {
			$color = substr( $color, 1 );
		}

		//Check if color has 6 or 3 characters and get values
		if ( strlen( $color ) == 6 ) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		//Convert hexadec to rgb
		$rgb = array_map( 'hexdec', $hex );

		//Check if opacity is set(rgba or rgb)
		if ( $opacity ) {
			if ( abs( $opacity ) > 1 ) {
				$opacity = 1.0;
			}
			$output = 'rgba(' . implode( ',', $rgb ) . ',' . $opacity . ')';
		} else {
			$output = 'rgb(' . implode( ',', $rgb ) . ')';
		}

		//Return rgb(a) color string
		return $output;
	}
endif;
