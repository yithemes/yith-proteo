/**
 * File customize-controls.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {

	wp.customize.bind( 'ready', function() {
		/**
		 * Helper showControlIfhasValues()
		 */
		function showControlIfhasValues(setting, ExpectedValues) {

			return function (control) {

				//	Check the current value in the array of ExpectedValues
				var isDisplayed = function () {
					return jQuery.inArray(setting.get(), ExpectedValues) !== -1;
				};

				var setActiveState = function () {
					control.active.set(isDisplayed());
				};

				control.active.validate = isDisplayed;
				setActiveState();
				setting.bind(setActiveState);
			};
		}

		/**
		 * Control Dependency
		 */
		wp.customize('yith_proteo_single_post_layout', function (setting) {

			//  Show control 'yith_proteo_single_post_background_color' if control 'yith_proteo_single_post_layout' value has 'background_picture'.
			wp.customize.control('yith_proteo_single_post_background_color', showControlIfhasValues(setting, ['background_picture']));

			//  Show control 'yith_proteo_single_post_bg_alpha' if control 'yith_proteo_single_post_layout' value has 'background_picture'.
			wp.customize.control('yith_proteo_single_post_bg_alpha', showControlIfhasValues(setting, ['background_picture']));

			//  Show control 'yith_proteo_single_post_thumbnail_text_color' if control 'yith_proteo_single_post_layout' value has 'background_picture'.
			wp.customize.control('yith_proteo_single_post_thumbnail_text_color', showControlIfhasValues(setting, ['background_picture']));

		});

		/**
		 * Control Dependency
		 */
		wp.customize('yith_proteo_display_header_text', function (setting) {

			//  Show control 'custom_logo' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('custom_logo', showControlIfhasValues(setting, ['yes']));

			//  Show control 'yith_proteo_custom_logo_max_width' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('yith_proteo_custom_logo_max_width', showControlIfhasValues(setting, ['yes']));

			//  Show control 'blogname' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('blogname', showControlIfhasValues(setting, ['yes']));

			//  Show control 'site_title_font' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('site_title_font', showControlIfhasValues(setting, ['yes']));

			//  Show control 'yith_proteo_site_title_font_size' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('yith_proteo_site_title_font_size', showControlIfhasValues(setting, ['yes']));

			//  Show control 'yith_proteo_site_title_color' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('yith_proteo_site_title_color', showControlIfhasValues(setting, ['yes']));

			//  Show control 'blogdescription' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('blogdescription', showControlIfhasValues(setting, ['yes']));

			//  Show control 'tagline_font' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('tagline_font', showControlIfhasValues(setting, ['yes']));

			//  Show control 'yith_proteo_tagline_font_size' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('yith_proteo_tagline_font_size', showControlIfhasValues(setting, ['yes']));

			//  Show control 'yith_proteo_tagline_color' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('yith_proteo_tagline_color', showControlIfhasValues(setting, ['yes']));

			//  Show control 'yith_proteo_tagline_position' if control 'yith_proteo_display_header_text' value has 'yes'.
			wp.customize.control('yith_proteo_tagline_position', showControlIfhasValues(setting, ['yes']));

		});


		wp.customize('yith_proteo_footer_sidebar_1_width', function (value) {
			value.bind( function ( newval ) {
				$('.footer-sidebar-1').css("width", newval + '%');
				var footer_2_width = wp.customize('yith_proteo_footer_sidebar_2_width').get();
	
	
				if ( ( parseInt( newval ) + parseInt( footer_2_width ) ) > 100 ) {
					wp.customize.control('yith_proteo_footer_sidebars_side_by_side' ).deactivate();
				} else {
					wp.customize.control('yith_proteo_footer_sidebars_side_by_side' ).activate();
				}
			});
		});

		wp.customize('yith_proteo_footer_sidebar_2_width', function (value) {
			value.bind( function ( newval ) {
				$('.footer-sidebar-2').css("width", newval + '%');
				var footer_1_width = wp.customize('yith_proteo_footer_sidebar_1_width').get();
	
	
				if ( ( parseInt( newval ) + parseInt( footer_1_width ) ) > 100 ) {
					wp.customize.control('yith_proteo_footer_sidebars_side_by_side' ).deactivate();
				} else {
					wp.customize.control('yith_proteo_footer_sidebars_side_by_side' ).activate();
				}
			});
		});

		/**
		 * Select2 for all select controls
		 */
		$('select').each(function (i, obj) {
			if (!$(obj).hasClass('select2-hidden-accessible')) {
				$(obj).select2();
			}
		});

		/**
		 * Googe Font Select Custom Control
		 */
		$('.google-fonts-list').on('change', function() {
			var elementRegularWeight = $(this).parent().parent().find('.google-fonts-regularweight-style');
			var selectedFont = $(this).val();
			var customizerControlName = $(this).attr('control-name');

			// Clear Weight/Style dropdowns
			elementRegularWeight.empty();

			// Get the Google Fonts control object
			var bodyfontcontrol = _wpCustomizeSettings.controls[customizerControlName];

			// Find the index of the selected font
			var indexes = $.map(bodyfontcontrol.yith_proteo_fontslist, function(obj, index) {
				if(obj.family === selectedFont) {
					return index;
				}
			});
			var index = indexes[0];

			// For the selected Google font show the available weight/style variants
			$.each(bodyfontcontrol.yith_proteo_fontslist[index].variants, function(val, text) {
				elementRegularWeight.append(
					$('<option></option>').val(text).html(text)
				);
			});

			// Update the font category based on the selected font
			$(this).parent().parent().find('.google-fonts-category').val(bodyfontcontrol.yith_proteo_fontslist[index].category);

			yith_proteo_get_all_font_selects($(this).parent().parent());
		});

		$('.google_fonts_select_control select').on('change', function() {
			yith_proteo_get_all_font_selects($(this).parent().parent());
		});

		function yith_proteo_get_all_font_selects($element) {
			var selectedFont = {
				font: $element.find('.google-fonts-list').val(),
				regularweight: $element.find('.google-fonts-regularweight-style').val(),
				category: $element.find('.google-fonts-category').val()
			};

			// Important! Make sure to trigger change event so Customizer knows it has to save the field
			$element.find('.customize-control-google-font-selection').val(JSON.stringify(selectedFont)).trigger('change');
		}

		// PRODUCT TITLE MANAGEMENT
		if( typeof yith_proteo_customizer_controls != 'undefined' && yith_proteo_customizer_controls.yith_proteo_customizer_has_woocommerce ) {
			yith_proteo_toggle_product_page_title_section_controls_list();

			$( '#customize-control-yith_proteo_product_page_title_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_product_page_title_controls );

			function yith_proteo_toggle_product_page_title_controls() {
				var section_title = $( '#customize-control-yith_proteo_product_page_title_group_title' ),
				collapsed = section_title.hasClass( 'section-closed' );
				section_title.toggleClass('section-closed');
				wp.customize.control('yith_proteo_product_page_title_font' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_title_font_size' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_title_font_color' ).toggle( collapsed );
			}

			function yith_proteo_toggle_product_page_title_section_controls_list() {
				wp.customize.control('yith_proteo_product_page_title_font' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_title_font_size' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_title_font_color' ).toggle( false );
			}

			// PRODUCT IMAGE MANAGEMENT
			yith_proteo_toggle_product_image_section_controls_list();
			
			$( '#customize-control-yith_proteo_product_page_image_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_product_image_controls );

			function yith_proteo_toggle_product_image_controls() {
				var section_title = $( '#customize-control-yith_proteo_product_page_image_group_title' ),
				collapsed = section_title.hasClass( 'section-closed' );
				section_title.toggleClass('section-closed');
				wp.customize.control('yith_proteo_product_page_image_zoom' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_image_lightbox' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_gallery_slider' ).toggle( collapsed );
			}

			function yith_proteo_toggle_product_image_section_controls_list() {
				wp.customize.control('yith_proteo_product_page_image_zoom' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_image_lightbox' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_gallery_slider' ).toggle( false );
			}

			// PRODUCT PRICE AND ADD TO CART MANAGEMENT
			yith_proteo_toggle_product_price_add_to_cart_section_controls_list();
			
			$( '#customize-control-yith_proteo_product_page_price_and_add_to_cart_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_product_price_add_to_cart_controls );

			function yith_proteo_toggle_product_price_add_to_cart_controls() {
				var section_title = $( '#customize-control-yith_proteo_product_page_price_and_add_to_cart_group_title' ),
				collapsed = section_title.hasClass( 'section-closed' );
				section_title.toggleClass('section-closed');
				wp.customize.control('yith_proteo_product_page_price_font_size' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_price_color' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_quantity_font_size' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_add_to_cart_font_size' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_show_clear_variations_link' ).toggle( collapsed );
			}

			function yith_proteo_toggle_product_price_add_to_cart_section_controls_list() {
				wp.customize.control('yith_proteo_product_page_price_font_size' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_price_color' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_quantity_font_size' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_add_to_cart_font_size' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_show_clear_variations_link' ).toggle( false );
			}

			// RELATED PRODUCTS
			yith_proteo_toggle_related_products_section_controls_list();
			
			$( '#customize-control-yith_proteo_product_related_products_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_related_products_controls );

			function yith_proteo_toggle_related_products_controls() {
				var section_title = $( '#customize-control-yith_proteo_product_related_products_group_title' ),
				collapsed = section_title.hasClass( 'section-closed' );
				section_title.toggleClass('section-closed');
				wp.customize.control('yith_proteo_product_page_related_max_number' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_related_columns' ).toggle( collapsed );
			}

			function yith_proteo_toggle_related_products_section_controls_list() {
				wp.customize.control('yith_proteo_product_page_related_max_number' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_related_columns' ).toggle( false );
			}

			// PRODUCT SIDEBAR MANAGEMENT
			yith_proteo_toggle_sidebar_section_controls_list();
			
			$( '#customize-control-yith_proteo_product_sidebar_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_sidebar_controls );

			function yith_proteo_toggle_sidebar_controls() {
				var section_title = $( '#customize-control-yith_proteo_product_sidebar_group_title' ),
				collapsed = section_title.hasClass( 'section-closed' );
				section_title.toggleClass('section-closed');
				wp.customize.control('yith_proteo_product_page_sidebar_position' ).toggle( collapsed );
				wp.customize.control('yith_proteo_single_product_default_sidebar' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_sidebar_force' ).toggle( collapsed );
			}

			function yith_proteo_toggle_sidebar_section_controls_list() {
				wp.customize.control('yith_proteo_product_page_sidebar_position' ).toggle( false );
				wp.customize.control('yith_proteo_single_product_default_sidebar' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_sidebar_force' ).toggle( false );
			}
			
			// PRODUCT TABS MANAGEMENT
			yith_proteo_toggle_product_tabs_controls_list();
			
			$( '#customize-control-yith_proteo_product_tabs_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_product_tabs_controls );

			function yith_proteo_toggle_product_tabs_controls() {
				var section_title = $( '#customize-control-yith_proteo_product_tabs_group_title' ),
				collapsed = section_title.hasClass( 'section-closed' );
				section_title.toggleClass('section-closed');
				wp.customize.control('yith_proteo_product_tabs_title_font_size' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_tabs_title_font_color' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_tabs_content_font_size' ).toggle( collapsed );
			}

			function yith_proteo_toggle_product_tabs_controls_list() {
				wp.customize.control('yith_proteo_product_tabs_title_font_size' ).toggle( false );
				wp.customize.control('yith_proteo_product_tabs_title_font_color' ).toggle( false );
				wp.customize.control('yith_proteo_product_tabs_content_font_size' ).toggle( false );
			}

			// PRODUCT CATEGORIES AND SKU MANAGEMENT
			yith_proteo_toggle_product_cats_and_sku_controls_list();
			
			$( '#customize-control-yith_proteo_product_page_category_and_sku_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_product_cats_and_sku_controls );

			function yith_proteo_toggle_product_cats_and_sku_controls() {
				var section_title = $( '#customize-control-yith_proteo_product_page_category_and_sku_group_title' ),
				collapsed = section_title.hasClass( 'section-closed' );
				section_title.toggleClass('section-closed');
				wp.customize.control('yith_proteo_product_page_show_categories' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_show_tags' ).toggle( collapsed );
				wp.customize.control('yith_proteo_product_page_show_sku' ).toggle( collapsed );
			}

			function yith_proteo_toggle_product_cats_and_sku_controls_list() {
				wp.customize.control('yith_proteo_product_page_show_categories' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_show_tags' ).toggle( false );
				wp.customize.control('yith_proteo_product_page_show_sku' ).toggle( false );
			}
		}

		/* Description toggle */
		$('span.description.customize-control-description').on('click', function(){
			var t = $(this);
			t.toggleClass('customizer-control-description-expanded');
		});

		/* General sidebar options toggle */
		yith_proteo_toggle_general_sidebars_section_controls_list();

		$( '#customize-control-yith_proteo_default_sidebar_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_general_sidebars_section_controls );

		function yith_proteo_toggle_general_sidebars_section_controls() {
			var section_title = $( '#customize-control-yith_proteo_default_sidebar_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_default_sidebar_position' ).toggle( collapsed );
			wp.customize.control('yith_proteo_default_sidebar' ).toggle( collapsed );
		}

		function yith_proteo_toggle_general_sidebars_section_controls_list() {
			wp.customize.control('yith_proteo_default_sidebar_position' ).toggle( false );
			wp.customize.control('yith_proteo_default_sidebar' ).toggle( false );
		}

		/* Blog page sidebar options toggle */
		yith_proteo_toggle_blog_page_sidebars_section_controls_list();

		$( '#customize-control-yith_proteo_blog_page_sidebar_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_blog_page_sidebars_section_controls );

		function yith_proteo_toggle_blog_page_sidebars_section_controls() {
			var section_title = $( '#customize-control-yith_proteo_blog_page_sidebar_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_blog_page_sidebar_position' ).toggle( collapsed );
			wp.customize.control('yith_proteo_blog_sidebar' ).toggle( collapsed );
		}

		function yith_proteo_toggle_blog_page_sidebars_section_controls_list() {
			wp.customize.control('yith_proteo_blog_page_sidebar_position' ).toggle( false );
			wp.customize.control('yith_proteo_blog_sidebar' ).toggle( false );
		}

		/* Blog categories sidebar options toggle */
		yith_proteo_toggle_blog_categories_sidebars_section_controls_list();

		$( '#customize-control-yith_proteo_blog_category_sidebar_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_blog_categories_sidebars_section_controls );

		function yith_proteo_toggle_blog_categories_sidebars_section_controls() {
			var section_title = $( '#customize-control-yith_proteo_blog_category_sidebar_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_blog_category_sidebar_position' ).toggle( collapsed );
			wp.customize.control('yith_proteo_blog_category_sidebar' ).toggle( collapsed );
		}

		function yith_proteo_toggle_blog_categories_sidebars_section_controls_list() {
			wp.customize.control('yith_proteo_blog_category_sidebar_position' ).toggle( false );
			wp.customize.control('yith_proteo_blog_category_sidebar' ).toggle( false );
		}

		/* Blog tags sidebar options toggle */
		yith_proteo_toggle_blog_tags_sidebars_section_controls_list();

		$( '#customize-control-yith_proteo_blog_tag_sidebar_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_blog_tags_sidebars_section_controls );

		function yith_proteo_toggle_blog_tags_sidebars_section_controls() {
			var section_title = $( '#customize-control-yith_proteo_blog_tag_sidebar_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_blog_tag_sidebar_position' ).toggle( collapsed );
			wp.customize.control('yith_proteo_blog_tag_sidebar' ).toggle( collapsed );
		}

		function yith_proteo_toggle_blog_tags_sidebars_section_controls_list() {
			wp.customize.control('yith_proteo_blog_tag_sidebar_position' ).toggle( false );
			wp.customize.control('yith_proteo_blog_tag_sidebar' ).toggle( false );
		}

		/* Buttons general options */
		yith_proteo_toggle_buttons_general_options_controls_list();

		$( '#customize-control-yith_proteo_buttons_general_options_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_buttons_general_options_controls );

		function yith_proteo_toggle_buttons_general_options_controls() {
			var section_title = $( '#customize-control-yith_proteo_buttons_general_options_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_buttons_border_radius' ).toggle( collapsed );
		}

		function yith_proteo_toggle_buttons_general_options_controls_list() {
			wp.customize.control('yith_proteo_buttons_border_radius' ).toggle( false );
		}

		/* Buttons Style 1 options */
		yith_proteo_toggle_button_style_1_controls_list();

		$( '#customize-control-yith_proteo_button_style_1_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_button_style_1_controls );

		function yith_proteo_toggle_button_style_1_controls() {
			var section_title = $( '#customize-control-yith_proteo_button_style_1_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_buttons_style_1_preview' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_1_bg_color' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_1_border_color' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_1_text_color' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_1_bg_color_hover' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_1_border_color_hover' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_1_text_color_hover' ).toggle( collapsed );
		}

		function yith_proteo_toggle_button_style_1_controls_list() {
			wp.customize.control('yith_proteo_buttons_style_1_preview' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_1_bg_color' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_1_border_color' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_1_text_color' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_1_bg_color_hover' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_1_border_color_hover' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_1_text_color_hover' ).toggle( false );
		}

		/* Buttons Style 2 options */
		yith_proteo_toggle_button_style_2_controls_list();

		$( '#customize-control-yith_proteo_button_style_2_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_button_style_2_controls );

		function yith_proteo_toggle_button_style_2_controls() {
			var section_title = $( '#customize-control-yith_proteo_button_style_2_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_buttons_style_2_preview' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_2_bg_color_1' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_2_bg_color_2' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_2_text_color' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_2_bg_color_hover' ).toggle( collapsed );
			wp.customize.control('yith_proteo_button_style_2_text_color_hover' ).toggle( collapsed );
		}

		function yith_proteo_toggle_button_style_2_controls_list() {
			wp.customize.control('yith_proteo_buttons_style_2_preview' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_2_bg_color_1' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_2_bg_color_2' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_2_text_color' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_2_bg_color_hover' ).toggle( false );
			wp.customize.control('yith_proteo_button_style_2_text_color_hover' ).toggle( false );
		}

		/* Site title options */
		yith_proteo_toggle_site_title_options_controls_list();

		$( '#customize-control-yith_proteo_site_title_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_site_title_options_controls );

		function yith_proteo_toggle_site_title_options_controls() {
			var section_title = $( '#customize-control-yith_proteo_site_title_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('custom_logo' ).toggle( collapsed );
			wp.customize.control('yith_proteo_custom_logo_max_width' ).toggle( collapsed );
			wp.customize.control('blogname' ).toggle( collapsed );
			wp.customize.control('site_title_font' ).toggle( collapsed );
			wp.customize.control('yith_proteo_site_title_font_size' ).toggle( collapsed );
			wp.customize.control('yith_proteo_site_title_color' ).toggle( collapsed );
			wp.customize.control('yith_proteo_site_title_spacing' ).toggle( collapsed );
		}

		function yith_proteo_toggle_site_title_options_controls_list() {
			wp.customize.control('custom_logo' ).toggle( false );
			wp.customize.control('yith_proteo_custom_logo_max_width' ).toggle( false );
			wp.customize.control('blogname' ).toggle( false );
			wp.customize.control('site_title_font' ).toggle( false );
			wp.customize.control('yith_proteo_site_title_font_size' ).toggle( false );
			wp.customize.control('yith_proteo_site_title_color' ).toggle( false );
			wp.customize.control('yith_proteo_site_title_spacing' ).toggle( false );
		}

		/* Tagline options */
		yith_proteo_toggle_tagline_options_controls_list();

		$( '#customize-control-yith_proteo_tagline_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_tagline_options_controls );

		function yith_proteo_toggle_tagline_options_controls() {
			var section_title = $( '#customize-control-yith_proteo_tagline_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('blogdescription' ).toggle( collapsed );
			wp.customize.control('tagline_font' ).toggle( collapsed );
			wp.customize.control('yith_proteo_tagline_font_size' ).toggle( collapsed );
			wp.customize.control('yith_proteo_tagline_color' ).toggle( collapsed );
			wp.customize.control('yith_proteo_tagline_spacing' ).toggle( collapsed );
			wp.customize.control('yith_proteo_tagline_position' ).toggle( collapsed );
		}

		function yith_proteo_toggle_tagline_options_controls_list() {
			wp.customize.control('blogdescription' ).toggle( false );
			wp.customize.control('tagline_font' ).toggle( false );
			wp.customize.control('yith_proteo_tagline_font_size' ).toggle( false );
			wp.customize.control('yith_proteo_tagline_color' ).toggle( false );
			wp.customize.control('yith_proteo_tagline_spacing' ).toggle( false );
			wp.customize.control('yith_proteo_tagline_position' ).toggle( false );
		}

		/* Display site title and tagline group */
		yith_proteo_toggle_display_site_title_group_title_controls_list();

		$( '#customize-control-yith_proteo_display_site_title_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_display_site_title_group_title_controls );

		function yith_proteo_toggle_display_site_title_group_title_controls() {
			var section_title = $( '#customize-control-yith_proteo_display_site_title_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_display_header_text' ).toggle( collapsed );
		}

		function yith_proteo_toggle_display_site_title_group_title_controls_list() {
			wp.customize.control('yith_proteo_display_header_text' ).toggle( false );
		}

		/* Site icon */
		yith_proteo_toggle_favicon_options_controls_list();

		$( '#customize-control-yith_proteo_favicon_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_favicon_options_controls );

		function yith_proteo_toggle_favicon_options_controls() {
			var section_title = $( '#customize-control-yith_proteo_favicon_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('site_icon' ).toggle( collapsed );
		}

		function yith_proteo_toggle_favicon_options_controls_list() {
			wp.customize.control('site_icon' ).toggle( false );
		}

		/* Global layout options grouping */
		yith_proteo_toggle_global_layout_options_controls_list();

		$( '#customize-control-yith_proteo_global_layout_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_global_layout_options_controls );

		function yith_proteo_toggle_global_layout_options_controls() {
			var section_title = $( '#customize-control-yith_proteo_global_layout_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_layout_full_width' ).toggle( collapsed );
		}

		function yith_proteo_toggle_global_layout_options_controls_list() {
			wp.customize.control('yith_proteo_layout_full_width' ).toggle( false );
		}

		/* Page title layout options grouping */
		yith_proteo_toggle_page_title_layout_options_controls_list();

		$( '#customize-control-yith_proteo_page_title_layout_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_page_title_layout_options_controls );

		function yith_proteo_toggle_page_title_layout_options_controls() {
			var section_title = $( '#customize-control-yith_proteo_page_title_layout_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_page_title_layout' ).toggle( collapsed );
			wp.customize.control('yith_proteo_page_title_align' ).toggle( collapsed );
		}

		function yith_proteo_toggle_page_title_layout_options_controls_list() {
			wp.customize.control('yith_proteo_page_title_layout' ).toggle( false );
			wp.customize.control('yith_proteo_page_title_align' ).toggle( false );
		}

		/* Global typography options grouping */
		yith_proteo_toggle_global_typography_controls_list();

		$( '#customize-control-yith_proteo_global_typography_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_global_typography_controls );

		function yith_proteo_toggle_global_typography_controls() {
			var section_title = $( '#customize-control-yith_proteo_global_typography_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_body_font' ).toggle( collapsed );
			wp.customize.control('yith_proteo_base_font_size' ).toggle( collapsed );
			wp.customize.control('yith_proteo_base_font_color' ).toggle( collapsed );
			wp.customize.control('yith_proteo_general_link_color' ).toggle( collapsed );
			wp.customize.control('yith_proteo_general_link_hover_color' ).toggle( collapsed );
			wp.customize.control('yith_proteo_general_link_decoration' ).toggle( collapsed );
		}

		function yith_proteo_toggle_global_typography_controls_list() {
			wp.customize.control('yith_proteo_body_font' ).toggle( false );
			wp.customize.control('yith_proteo_base_font_size' ).toggle( false );
			wp.customize.control('yith_proteo_base_font_color' ).toggle( false );
			wp.customize.control('yith_proteo_general_link_color' ).toggle( false );
			wp.customize.control('yith_proteo_general_link_hover_color' ).toggle( false );
			wp.customize.control('yith_proteo_general_link_decoration' ).toggle( false );
		}

		/* h1 typography options grouping */
		yith_proteo_toggle_h1_typography_controls_list();

		$( '#customize-control-yith_proteo_h1_typography_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_h1_typography_controls );

		function yith_proteo_toggle_h1_typography_controls() {
			var section_title = $( '#customize-control-yith_proteo_h1_typography_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_h1_font' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h1_font_size' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h1_font_color' ).toggle( collapsed );
		}

		function yith_proteo_toggle_h1_typography_controls_list() {
			wp.customize.control('yith_proteo_h1_font' ).toggle( false );
			wp.customize.control('yith_proteo_h1_font_size' ).toggle( false );
			wp.customize.control('yith_proteo_h1_font_color' ).toggle( false );
		}

		/* h2 typography options grouping */
		yith_proteo_toggle_h2_typography_controls_list();

		$( '#customize-control-yith_proteo_h2_typography_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_h2_typography_controls );

		function yith_proteo_toggle_h2_typography_controls() {
			var section_title = $( '#customize-control-yith_proteo_h2_typography_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_h2_font' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h2_font_size' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h2_font_color' ).toggle( collapsed );
		}

		function yith_proteo_toggle_h2_typography_controls_list() {
			wp.customize.control('yith_proteo_h2_font' ).toggle( false );
			wp.customize.control('yith_proteo_h2_font_size' ).toggle( false );
			wp.customize.control('yith_proteo_h2_font_color' ).toggle( false );
		}

		/* h3 typography options grouping */
		yith_proteo_toggle_h3_typography_controls_list();

		$( '#customize-control-yith_proteo_h3_typography_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_h3_typography_controls );

		function yith_proteo_toggle_h3_typography_controls() {
			var section_title = $( '#customize-control-yith_proteo_h3_typography_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_h3_font' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h3_font_size' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h3_font_color' ).toggle( collapsed );
		}

		function yith_proteo_toggle_h3_typography_controls_list() {
			wp.customize.control('yith_proteo_h3_font' ).toggle( false );
			wp.customize.control('yith_proteo_h3_font_size' ).toggle( false );
			wp.customize.control('yith_proteo_h3_font_color' ).toggle( false );
		}

		/* h4 typography options grouping */
		yith_proteo_toggle_h4_typography_controls_list();

		$( '#customize-control-yith_proteo_h4_typography_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_h4_typography_controls );

		function yith_proteo_toggle_h4_typography_controls() {
			var section_title = $( '#customize-control-yith_proteo_h4_typography_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_h4_font' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h4_font_size' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h4_font_color' ).toggle( collapsed );
		}

		function yith_proteo_toggle_h4_typography_controls_list() {
			wp.customize.control('yith_proteo_h4_font' ).toggle( false );
			wp.customize.control('yith_proteo_h4_font_size' ).toggle( false );
			wp.customize.control('yith_proteo_h4_font_color' ).toggle( false );
		}

		/* h5 typography options grouping */
		yith_proteo_toggle_h5_typography_controls_list();

		$( '#customize-control-yith_proteo_h5_typography_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_h5_typography_controls );

		function yith_proteo_toggle_h5_typography_controls() {
			var section_title = $( '#customize-control-yith_proteo_h5_typography_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_h5_font' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h5_font_size' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h5_font_color' ).toggle( collapsed );
		}

		function yith_proteo_toggle_h5_typography_controls_list() {
			wp.customize.control('yith_proteo_h5_font' ).toggle( false );
			wp.customize.control('yith_proteo_h5_font_size' ).toggle( false );
			wp.customize.control('yith_proteo_h5_font_color' ).toggle( false );
		}

		/* h6 typography options grouping */
		yith_proteo_toggle_h6_typography_controls_list();

		$( '#customize-control-yith_proteo_h6_typography_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_h6_typography_controls );

		function yith_proteo_toggle_h6_typography_controls() {
			var section_title = $( '#customize-control-yith_proteo_h6_typography_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_h6_font' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h6_font_size' ).toggle( collapsed );
			wp.customize.control('yith_proteo_h6_font_color' ).toggle( collapsed );
		}

		function yith_proteo_toggle_h6_typography_controls_list() {
			wp.customize.control('yith_proteo_h6_font' ).toggle( false );
			wp.customize.control('yith_proteo_h6_font_size' ).toggle( false );
			wp.customize.control('yith_proteo_h6_font_color' ).toggle( false );
		}

		/* additional typography options grouping */
		yith_proteo_toggle_additional_typography_controls_list();

		$( '#customize-control-yith_proteo_additional_typography_group_title' ).addClass('section-closed').on( 'click', yith_proteo_toggle_additional_typography_controls );

		function yith_proteo_toggle_additional_typography_controls() {
			var section_title = $( '#customize-control-yith_proteo_h4_typography_group_title' ),
			collapsed = section_title.hasClass( 'section-closed' );
			section_title.toggleClass('section-closed');
			wp.customize.control('yith_proteo_google_font' ).toggle( collapsed );
		}

		function yith_proteo_toggle_additional_typography_controls_list() {
			wp.customize.control('yith_proteo_google_font' ).toggle( false );
		}

	});

})(jQuery);
