/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
(function ($) {

	// Site title and description.
	wp.customize('blogname', function (value) {
		value.bind(function (to) {
			$('.site-title a').text(to);
		});
	});
	wp.customize('blogdescription', function (value) {
		value.bind(function (to) {
			$('.site-description').text(to);
		});
	});

	wp.customize('yith_proteo_buttons_border_radius', function (value) {
		value.bind(function (newval) {
			$('button, input[type=button], input[type=reset], input[type=submit], .button, .widget a.button, .wishlist-submit.popup_button').css("border-radius", newval + 'px');
		});
	});

	wp.customize('yith_proteo_inputs_border_radius', function (value) {
		value.bind(function (newval) {
			$('input[type=text], input[type=email], input[type=url], input[type=password], input[type=search], input[type=number], input[type=tel], input[type=range], input[type=date], input[type=month], input[type=week], input[type=time], input[type=datetime], input[type=datetime-local], input[type=color], textarea, input[type=file], .select2-container .select2-selection, .woocommerce a.selectBox.selectBox-dropdown').css("border-radius", newval + 'px');
		});
	});

	wp.customize('yith_proteo_single_post_bg_alpha', function (value) {
		value.bind(function (newval) {
			$("<style>article.proteo_post_layout_background_picture header.alignfull:before { opacity: " + newval / 100 + "; }</style>").appendTo("head");
		});
	});

	wp.customize('yith_proteo_custom_logo_max_width', function (value) {
		value.bind(function (newval) {
			$('.custom-logo-link').css("max-width", newval + 'px');
		});
	});

	wp.customize('yith_proteo_footer_sidebar_1_widget_per_row', function (value) {
		value.bind(function (newval) {
			if ( parseInt( newval ) === 5) {
				var newClass = 20;
			}
			else {
				var newClass = (12 / newval);
			}
			$(".footer-sidebar-1 section[class*='col-lg']").removeClass(function (index, css) {
				return (css.match(/(^|\s)col-lg\S+/g) || []).join(' ');
			}).addClass('col-lg-' + newClass);
		});
	});

	wp.customize('yith_proteo_footer_sidebar_2_widget_per_row', function (value) {
		value.bind(function (newval) {
			if ( parseInt( newval ) === 5) {
				var newClass = 20;
			}
			else {
				var newClass = (12 / newval);
			}
			$(".footer-sidebar-2 section[class*='col-lg']").removeClass(function (index, css) {
				return (css.match(/(^|\s)col-lg\S+/g) || []).join(' ');
			}).addClass('col-lg-' + newClass);
		});
	});

	wp.customize('yith_proteo_footer_sidebar_2_width', function (value) {
		value.bind(function (newval) {
			$('.footer-sidebar-2').css("width", newval + '%');
		});
	});

	/**
	 * Minicart icon change and cart fragments refresh
	 */

	wp.customize('yith_proteo_header_cart_widget_custom_icon', function (value) {
		$( document.body ).trigger( 'wc_fragment_refresh');
	});


})(jQuery);