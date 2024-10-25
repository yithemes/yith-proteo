/**
 * YITH PROTEO theme.js.
 *
 * Theme specific JS functions
 */
(function ($) {

	function headerheightfix() {
		var height = $('.site-header').outerHeight();
		$('header + .yith-slider .yith-slider-slide').css('padding-top', height);
	}

	$(window).on( 'resize', headerheightfix );

	headerheightfix();


	// STICKY HEADER
	if (typeof yith_proteo != 'undefined' && yith_proteo.stickyHeader == 'yes') {
		var site_header = $('.site-header'),
			stickyOffset = site_header.length ? site_header.offset().top : false,
			site_content_top_spacing = parseInt( yith_proteo.yith_proteo_site_content_top_spacing );
			stickyOffset = 0;
		if (stickyOffset !== false) {
			$(window).on( 'scroll', function () {
				var sticky = site_header,
					scroll = $(window).scrollTop(),
					content = $('header + #content');
				if (scroll > stickyOffset) {
					sticky.addClass('sticky');
					content.css("padding-top", sticky.height() + site_content_top_spacing);
				} else {
					sticky.removeClass('sticky');
					content.css("padding-top", site_content_top_spacing);
				}
			});
		}
	}
	else {
		$('body').addClass('static-header');
	}


	function initCheckbox() {
		$('input[type="radio"]:not(.yith-proteo-standard-radio), input[type="checkbox"]:not(.yith-proteo-standard-checkbox)')
			.not( '.yith-wcaf-toggle' )
			.each(function () {
				var type = $(this).attr('type'),
					checked = $(this).is(':checked') ? 'checked' : '',
					visible = $(this).is(':visible');

				if ( visible && !$(this).closest('span.' + type + 'button').length) {
					$(this).wrap('<span class="' + type + 'button ' + checked + '"></span>');
				}
			});
	}

	function initFields() {
		$('input').each(function () {
			var t = $(this),
				type = t.attr('type');

			if (
				type !== 'text' &&
				type !== 'email' &&
				type !== 'url' &&
				type !== 'password' &&
				type !== 'search' &&
				type !== 'number' &&
				type !== 'tel' &&
				type !== 'range' &&
				type !== 'date' &&
				type !== 'month' &&
				type !== 'week' &&
				type !== 'time' &&
				type !== 'datetime' &&
				type !== 'datetime-local' &&
				type !== 'color'
			) {
				return;
			}

			if (t.next('.separator').length) {
				return;
			}

			t.after($('<div/>', { class: 'separator' }));
		});
	}


	if (yith_proteo.yith_proteo_use_enhanced_checkbox_and_radio === 'yes') {
		$(document).on('change', 'input[type="radio"]:not(.yith-proteo-standard-radio), input[type="checkbox"]:not(.yith-proteo-standard-checkbox)', function () {
			var t = $(this),
				tname = t.attr('name'),
				tform = t.closest('form'),
				type = t.attr('type');
	
			if (!t.is(':checked')) {
				t.parent().removeClass('checked');
				return;
			}
	
			if (type === 'radio') {
				tform.find('input[name="' + tname + '"]').parent().removeClass('checked');
			}
			t.parent().addClass('checked');
		});	
	}
	
	$(yith_proteo_inizialize_html_elements);

	$(document).on('yith_proteo_inizialize_html_elements found_variation ywcp_inizialized yith_wfbt_form_updated yith_wfbt_modal_opened yith_wcwl_popup_opened yith_wcwl_tab_selected updated_checkout updated_cart_totals yith_quick_view_loaded yith_wcwl_fragments_loaded yith_wcwl_init_after_ajax yith_welrp_popup_template_loaded yith_wcdp_updated_deposit_form yith-wcan-ajax-filtered yith_wcan_dropdown_updated yith_wcaf_init_fields', yith_proteo_inizialize_html_elements);
	function yith_proteo_inizialize_html_elements(){
		if (typeof $.fn.selectWoo !== 'undefined' && yith_proteo.yith_proteo_use_enanched_selects === 'yes') {
			$('select:not(.yith-proteo-standard-select, enhanced)').filter(':visible').selectWoo(
				{
					'dropdownAutoWidth' : true,
					'minimumResultsForSearch': yith_proteo.select2minimumResultsForSearch
				}
			).addClass('enhanced');
		}

		if (yith_proteo.yith_proteo_use_enhanced_checkbox_and_radio === 'yes') {
			initCheckbox();
		}
		//initFields();

		$('[class*="animate-"]').each(function () {
			var t = $(this),
				tclass = t.attr('class'),
				animationClass = tclass.split(' ').filter(function (value) {
					return value.match(/animate-.*/);
				}).shift().replace('animate-', '');
			if (t.is('[data-aos]')) {
				return;
			}
			t.attr('data-aos', animationClass);
		});

		AOS.init({
			anchorPlacement: 'top-bottom'
		});

		$(document).on('scroll',function(e){
            AOS.refresh(true);
        });
	}

	// Full screen search
	$('header .widget.widget_search').on('focus, click', function (event) {
		// Prevent the default action
		event.preventDefault();

		// Display the Full Screen Search
		$('#full-screen-search').fadeIn('fast', function () {
			$(this).addClass('open');
		});
		$('html').add('body').addClass('mobile-menu-opened');
		// Focus on the Full Screen Search Input Field
		$('#full-screen-search input').trigger('focus');
	});

	// function to close full screen search
	function close_full_screen_search() {
		// Hide the Full Screen Search
		$('#full-screen-search').fadeOut('fast', function () {
			$(this).removeClass('open');
		});
		$('html').add('body').removeClass('mobile-menu-opened');
	}

	// Hide the Full Screen search when the user clicks the close button
	$('#full-screen-search button.close, #full-screen-search').on('click', function (event) {
		// Prevent the default event
		event.preventDefault();

		// Hide the Full Screen Search
		close_full_screen_search();
	});

	// Avoid search closing when writing on form
	$('#full-screen-search form > div').on('click', function (event) {
		event.stopPropagation();
	});


	// Hide the Full Screen search when the user presses the escape key
	$(document).on( 'keydown', function (event) {
		// Don't do anything if the Full Screen Search is not displayed
		if (!$('#full-screen-search').hasClass('open')) {
			return;
		}

		// Don't do anything if the user did not press the escape key
		if (event.keyCode != 27) {
			return;
		}

		// Prevent the default event
		event.preventDefault();

		// Hide the Full Screen Search
		$('#full-screen-search').fadeOut('slow', function () {
			$(this).removeClass('open');
		});
	});


	// Product gallery image height
	jQuery( function( $ ) {
		$(window).on('resize', function () {
			// If there are multiple elements with the same class, "main"
			$('.single-product div.product .woocommerce-product-gallery .flex-control-thumbs li').each(function () {
				$(this).height($(this).width());
			});
		}).trigger('resize');
	});	

	// Modals
	$('a.open-modal').on( 'click',function (ev) {
		$(this).modal({
			fadeDuration: 250
		});
		return false;
	});

	// Quantity Inputs
	$(document).on('click', '.quantity .product-qty-arrows span', function (ev) {
		ev.stopPropagation();
		var t = $(this),
			input_selector = t.parents('.quantity').find('input[type="number"]'),
			input_val = parseFloat(input_selector.val()),
			min_val = input_selector.attr('min'),
			max_val = input_selector.attr('max'),
			step = input_selector.attr('step');

		//clean step attr
		if (typeof step === 'undefined' || !step) {
			step = 1;
		}
		else {
			step = parseFloat(step);
		}

		if ( isNaN( input_val ) ) {
			input_val = parseFloat( min_val - step );
		}

		if (t.hasClass('product-qty-increase')) {
			input_val = input_val + step;
			if (typeof max_val !== 'undefined' && parseFloat(max_val) < input_val) {
				return;
			}
			input_selector.val(input_val).change();

		} else if (t.hasClass('product-qty-decrease')) {
			input_val = input_val - step;
			if (typeof min_val !== 'undefined' && parseFloat(min_val) > input_val) {
				return;
			}
			input_selector.val(input_val).change();
		}
	});

	let is_mobile = false;

	$(window).on('resize', function () {
		var viewport = window.innerWidth;
		//change my-account layout on mobile
		if (viewport <= 992 && ! is_mobile ) {
			is_mobile = true;
			$('.woocommerce-MyAccount-navigation-link.is-active').append($('.woocommerce-MyAccount-content'));

		} else if ( viewport > 992 && is_mobile ) {
			is_mobile = false;
			$('.yith-proteo-my-account-sidebar').after($('.woocommerce-MyAccount-content'));
		}
	}).trigger('resize');


	// Lazy loading images
	document.addEventListener("DOMContentLoaded", function () {
		let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
		let active = false;

		const lazyLoad = function () {
			if (active === false) {
				active = true;

				setTimeout(function () {
					lazyImages.forEach(function (lazyImage) {
						if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
							lazyImage.src = lazyImage.dataset.src;
							lazyImage.srcset = lazyImage.dataset.srcset;
							lazyImage.classList.remove("lazy");

							lazyImages = lazyImages.filter(function (image) {
								return image !== lazyImage;
							});

							if (lazyImages.length === 0) {
								document.removeEventListener("scroll", lazyLoad);
								window.removeEventListener("resize", lazyLoad);
								window.removeEventListener("orientationchange", lazyLoad);
							}
						}
					});

					active = false;
				}, 200);
			}
		};

		lazyLoad();

		document.addEventListener("scroll", lazyLoad);
		window.addEventListener("resize", lazyLoad);
		window.addEventListener("orientationchange", lazyLoad);
	});

	// Loop add to cart :hover position
	if (typeof yith_proteo != 'undefined' && -1 != jQuery.inArray( yith_proteo.yith_proteo_products_loop_add_to_cart_position, ['hover','hover-light'] ) ) {
		$('.wc-block-grid__product').each(function() {
			var t = $(this),
			product_link_tag_opener = t.find('.wc-block-grid__product-link'),
			product_image_tag = t.find('.wc-block-grid__product-image'),
			product_add_to_cart_tag = t.find('.wc-block-grid__product-add-to-cart');
			product_image_tag.insertBefore(product_link_tag_opener);
			product_add_to_cart_tag.appendTo(product_image_tag);

			if ( yith_proteo.yith_proteo_product_loop_view_details_enable == 'yes' ) {
				product_link_tag_opener.clone().appendTo(product_add_to_cart_tag).addClass(yith_proteo.yith_proteo_product_loop_view_details_style).html(yith_proteo.yith_proteo_loop_product_view_details_text);
			}
		});
	}

	// Shop page title layout fix
	$( document ).on( 'yith_proteo_woocommmerce_pages_title_layout yith-wcan-ajax-filtered', function() {
		if (typeof yith_proteo != 'undefined' && yith_proteo.yith_proteo_page_title_layout == 'outside') {
			$( 'body.woocommerce.archive' ).find( 'header.woocommerce-products-header' ).prependTo($('#content > .container'));
			$( 'body.woocommerce.archive' ).find( '.woocommerce-breadcrumb' ).prependTo($('#content > .container'));
		}
	} ).trigger( 'yith_proteo_woocommmerce_pages_title_layout' );

	function isMobile() {
		return window.innerWidth <= 992;
	}

	// sticky the sidebar if it's fully visible
	function stickySidebar() {
		var sidebar = $( '#secondary_content' );
		if ( sidebar.length && !sidebar.hasClass( '.no-sticky' ) ) {
			var site_header = $('.site-header'),
				sidebarTop = 80;

			if ( site_header.hasClass( 'sticky' ) ) {
				sidebarTop = site_header.height() + 80;
			}

			if ( !isMobile() && window.innerHeight >= ( sidebar.outerHeight() + sidebarTop ) ) {
				sidebar.css( { position: 'sticky', top: sidebarTop + 'px' } );
				sidebar.addClass( 'sticky-sidebar' );
			} else {
				sidebar.css( { position: 'static' } );
				sidebar.removeClass( 'sticky-sidebar' );
			}
		}
	}

	if (typeof yith_proteo != 'undefined' && yith_proteo.yith_proteo_sticky_sidebars == 'yes') {
		$( window ).on( 'scroll', function () {
			stickySidebar();
		} );
		stickySidebar();
		$( window ).on( 'load', function(){
			stickySidebar();
		} );
	}

	// sticky the single product image if it's fully visible
	function stickySingleProductImage() {
		var productImage = $( '.woocommerce-product-gallery' );
		if ( productImage.length ) {
			var site_header = $('.site-header'),
				productImageTop = 80;

			if ( site_header.hasClass( 'sticky' ) ) {
				productImageTop = site_header.height() + 80;
			}

			if ( !isMobile() && window.innerHeight >= ( productImage.outerHeight() + productImageTop ) ) {
				productImage.css( { position: 'sticky', top: productImageTop + 'px' } );
				productImage.addClass( 'sticky-product-image' );
			} else {
				productImage.css( { position: 'relative' } );
				productImage.removeClass( 'sticky-product-image' );
			}
		}
	}
	if (typeof yith_proteo != 'undefined' && yith_proteo.yith_proteo_sticky_product_image == 'yes') {
		$( window ).on( 'scroll', function () {
			stickySingleProductImage();
		} );
		stickySingleProductImage();
		$( window ).on( 'load', function(){
			stickySingleProductImage();
		} );
	}

	// Support to plugin named "Grid/List View for WooCommerce"
	$(document).on('berocket_lgv_after_style_set', yith_proteo_berocket_grid_list_products_layout_fixer);

	function yith_proteo_berocket_grid_list_products_layout_fixer() {
		var first_product = $( 'li.product.berocket_lgv_list_grid' ).first(),
			products_list = first_product.parent('ul.products');
		if( first_product.hasClass('berocket_lgv_list') ){
			products_list.addClass('list_products_layout');
		} else {
			products_list.removeClass('list_products_layout');
		}
	}
})
(jQuery);
