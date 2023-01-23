/**
 * File customize-controls.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {

	wp.customize.bind( 'ready', function() {

		const dependencies = {
			'yith_proteo_header_bottom_line_color': {
				'yith_proteo_header_bottom_separator_style': 'line'
			},
			'yith_proteo_header_bottom_line_thickness': {
				'yith_proteo_header_bottom_separator_style': 'line'
			},
			'yith_proteo_header_bottom_line_width': {
				'yith_proteo_header_bottom_separator_style': 'line'
			},
			'yith_proteo_header_bottom_line_alignment': {
				'yith_proteo_header_bottom_separator_style': 'line'
			},

			'yith_proteo_header_bottom_shadow_color': {
				'yith_proteo_header_bottom_separator_style': 'shadow'
			},
			'yith_proteo_header_bottom_shadow_hoffset': {
				'yith_proteo_header_bottom_separator_style': 'shadow'
			},
			'yith_proteo_header_bottom_shadow_voffset': {
				'yith_proteo_header_bottom_separator_style': 'shadow'
			},
			'yith_proteo_header_bottom_shadow_blur': {
				'yith_proteo_header_bottom_separator_style': 'shadow'
			},
			'yith_proteo_header_bottom_shadow_spread': {
				'yith_proteo_header_bottom_separator_style': 'shadow'
			},

			'yith_proteo_header_bottom_image': {
				'yith_proteo_header_bottom_separator_style': 'image'
			},
			'yith_proteo_header_bottom_image_alignment': {
				'yith_proteo_header_bottom_separator_style': 'image'
			},

			'yith_proteo_blog_page_posts_border_width' : {
				'yith_proteo_blog_page_posts_with_border': 'yes'
			},
			'yith_proteo_blog_page_posts_border_radius' : {
				'yith_proteo_blog_page_posts_with_border': 'yes'
			},
			'yith_proteo_blog_page_posts_border_color' : {
				'yith_proteo_blog_page_posts_with_border': 'yes'
			},

			'yith_proteo_single_post_fullwidth_cover_cropping_custom_height' : {
				'yith_proteo_single_post_layout': 'fullwidth_cover_image'
			},

			'yith_proteo_single_post_background_color' : {
				'yith_proteo_single_post_layout': 'background_picture',
			},
			'yith_proteo_single_post_bg_alpha' : {
				'yith_proteo_single_post_layout': 'background_picture',
			},
			'yith_proteo_single_post_thumbnail_text_color' : {
				'yith_proteo_single_post_layout': 'background_picture',
			},

			'yith_proteo_product_tag_page_sidebar_widgets_per_row' : {
				'yith_proteo_product_tag_page_sidebar_position' : 'top',
			},

			'yith_proteo_product_tax_page_sidebar_widgets_per_row' : {
				'yith_proteo_product_tax_page_sidebar_position' : 'top',
			},

			'yith_proteo_product_category_page_sidebar_widgets_per_row' : {
				'yith_proteo_product_category_page_sidebar_position' : 'top',
			},

			'yith_proteo_shop_page_sidebar_widgets_per_row' : {
				'yith_proteo_shop_page_sidebar_position' : 'top',
			},

			'yith_proteo_store_notice_bg_color' : {
				'woocommerce_demo_store' : 'yes'
			},
			'yith_proteo_store_notice_text_color' : {
				'woocommerce_demo_store' : 'yes'
			},
			'yith_proteo_store_notice_font_size' : {
				'woocommerce_demo_store' : 'yes'
			},
			'woocommerce_demo_store_notice' : {
				'woocommerce_demo_store' : 'yes'
			},

			'yith_proteo_products_loop_view_details_style' : {
				'yith_proteo_product_loop_view_details_enable' : 'yes'
			}

		};

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

		function proteoHandleParentGroups(){
			$('.customize-control-simple_notice .has-children')
				.each( function () {
					const children = $(this),
						parent_element = children.parent();

					parent_element.addClass('section-closed')
					
					for ( const child_option_name of children.data('children') ) {
						wp.customize.control( child_option_name ).toggle( false );
					}
				} )
				.on( 'click', function() {
					var t = $(this),
						nested = t.data( 'children' ),
						parent_element = t.parent(),
						closed = parent_element.hasClass( 'section-closed' );

					if ( ! nested ) {
						return;
					}

					parent_element.toggleClass( 'section-closed' );
					
					for ( var child_option_name of nested ) {
						if ( ! proteoCheckControlDependencies( child_option_name ) ) {
							continue;
						}

						wp.customize.control( child_option_name ).toggle( closed );
					}
				} );
		}
		proteoHandleParentGroups();

		function proteoCheckControlDependencies( controlId ) {
			if ( ! dependencies[ controlId ] )  {
				return true;
			}

			for ( depControlId in dependencies[ controlId ] ) {
				const expValue = dependencies[ controlId ][ depControlId ],
					currentValue = wp.customize( depControlId ).get();
		
				if( expValue != currentValue ) {
					return false;
				}
			}

			return true;
		}

		function proteoCheckControlsDependencies() {
			for ( let controlId in dependencies ) {

				const control = wp.customize.control( controlId );

				control.toggle( proteoCheckControlDependencies( controlId ) );

				for ( let depControlId in dependencies[ controlId ] ) {
					const depControl = wp.customize( depControlId );

					depControl.bind( () => {
						control.toggle( proteoCheckControlDependencies( controlId ) );
					} );
				}
			}
		};

		proteoCheckControlsDependencies();

		/**
		 * Footer sidebar width calc
		 */
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
		 * Responsive screen size checker
		 */
		wp.customize('yith_proteo_mobile_device_width', function (value) {
			var next_rule = wp.customize('yith_proteo_tablet_device_width').get(),
				warning_message = yith_proteo_customizer_controls.yith_proteo_responsive_option_notice_text,
				error_code = 'wrong_resolution';
			value.bind( function ( newval ) {
				if ( parseInt( newval ) >= parseInt( next_rule ) ) {
					value.notifications.add( error_code, new wp.customize.Notification(
						error_code,
						{
							type: 'warning',
							message: warning_message
						}
					) );
				} else {
					value.notifications.remove( error_code );
				}
			});
		});
		wp.customize('yith_proteo_tablet_device_width', function (value) {
			var prev_rule = wp.customize('yith_proteo_mobile_device_width').get(),
				next_rule = wp.customize('yith_proteo_small_desktop_device_width').get(),
				warning_message = yith_proteo_customizer_controls.yith_proteo_responsive_option_notice_text,
				error_code = 'wrong_resolution';
			value.bind( function ( newval ) {
				if ( ( parseInt( newval ) >= parseInt( next_rule ) ) || ( parseInt( newval ) <= parseInt( prev_rule ) ) ) {
					value.notifications.add( error_code, new wp.customize.Notification(
						error_code,
						{
							type: 'warning',
							message: warning_message
						}
					) );
				} else {
					value.notifications.remove( error_code );
				}
			});
		});
		wp.customize('yith_proteo_small_desktop_device_width', function (value) {
			var prev_rule = wp.customize('yith_proteo_tablet_device_width').get(),
				next_rule = wp.customize('yith_proteo_desktop_device_width').get(),
				warning_message = yith_proteo_customizer_controls.yith_proteo_responsive_option_notice_text,
				error_code = 'wrong_resolution';
			value.bind( function ( newval ) {
				if ( ( parseInt( newval ) >= parseInt( next_rule ) ) || ( parseInt( newval ) <= parseInt( prev_rule ) ) ) {
					value.notifications.add( error_code, new wp.customize.Notification(
						error_code,
						{
							type: 'warning',
							message: warning_message
						}
					) );
				} else {
					value.notifications.remove( error_code );
				}
			});
		});
		wp.customize('yith_proteo_desktop_device_width', function (value) {
			var prev_rule = wp.customize('yith_proteo_small_desktop_device_width').get(),
				next_rule = wp.customize('yith_proteo_large_desktop_device_width').get(),
				warning_message = yith_proteo_customizer_controls.yith_proteo_responsive_option_notice_text,
				error_code = 'wrong_resolution';
			value.bind( function ( newval ) {
				if ( ( parseInt( newval ) >= parseInt( next_rule ) ) || ( parseInt( newval ) <= parseInt( prev_rule ) ) ) {
					value.notifications.add( error_code, new wp.customize.Notification(
						error_code,
						{
							type: 'warning',
							message: warning_message
						}
					) );
				} else {
					value.notifications.remove( error_code );
				}
			});
		});
		wp.customize('yith_proteo_large_desktop_device_width', function (value) {
			var prev_rule = wp.customize('yith_proteo_desktop_device_width').get(),
				warning_message = yith_proteo_customizer_controls.yith_proteo_responsive_option_notice_text,
				error_code = 'wrong_resolution';
			value.bind( function ( newval ) {
				if ( parseInt( newval ) <= parseInt( prev_rule ) ) {
					value.notifications.add( error_code, new wp.customize.Notification(
						error_code,
						{
							type: 'warning',
							message: warning_message
						}
					) );
				} else {
					value.notifications.remove( error_code );
				}
			});
		});

		/**
		 * Range control reset
		 */
		$('.customize-control-range .customize-control-reset').on( 'click', function() {
			var t           = $(this),
				reset_value = parseInt(t.html());
			t.prevAll('input').val(reset_value).change();
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

		/* Description toggle */
		$('span.description.customize-control-description').on('click', function(){
			var t = $(this);
			t.toggleClass('customizer-control-description-expanded');
		});

		/**
		 * Button style 1 live preview
		 */
		wp.customize('yith_proteo_button_style_1_bg_color', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-1:not(:hover) { background-color: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_1_border_color', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-1:not(:hover) { border-color: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_1_text_color', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-1:not(:hover) { color: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_1_bg_color_hover', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-1:hover { background-color: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_1_border_color_hover', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-1:hover { border-color: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_1_text_color_hover', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-1:hover { color: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});

		/**
		 * Button style 2 live preview
		 */
		wp.customize('yith_proteo_button_style_2_bg_color_1', function (value) {
			value.bind( function ( newval ) {
				var secondVal = wp.customize('yith_proteo_button_style_2_bg_color_2').get();
				var style = $('<style>.yith-proteo-button-preview.button-style-2:not(:hover) { background: linear-gradient( 180deg , ' + newval + ' 0%, '+ secondVal +' 100%); }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_2_bg_color_2', function (value) {
			value.bind( function ( newval ) {
				var firstVal = wp.customize('yith_proteo_button_style_2_bg_color_1').get();
				var style = $('<style>.yith-proteo-button-preview.button-style-2:not(:hover) { background: linear-gradient( 180deg , ' + firstVal + ' 0%, '+ newval +' 100%); }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_2_border_color', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-2:not(:hover) { border-color: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_2_text_color', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-2:not(:hover) { color: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_2_bg_color_hover', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-2:hover { background: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_2_border_color_hover', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-2:hover { border-color: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});
		wp.customize('yith_proteo_button_style_2_text_color_hover', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-2:hover { color: ' + newval + '; }</style>');
				$('html > head').append(style);
			});
		});

		wp.customize('yith_proteo_buttons_border_radius', function (value) {
			value.bind( function ( newval ) {
				var style = $('<style>.yith-proteo-button-preview.button-style-1, .yith-proteo-button-preview.button-style-1 { border-radius: ' + newval + 'px; }</style>');
				$('html > head').append(style);
			});
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

		/**
		 * Control Dependency
		 */
		wp.customize('yith_proteo_default_sidebar_position', function (setting) {
			wp.customize.control('yith_proteo_default_sidebar', showControlIfhasValues(setting, ['left', 'right']));
		});

		/**
		 * Control Dependency
		 */
		wp.customize('yith_proteo_blog_page_sidebar_position', function (setting) {
			wp.customize.control('yith_proteo_blog_sidebar', showControlIfhasValues(setting, ['left', 'right']));
		});

		/**
		 * Control Dependency
		 */
		wp.customize('yith_proteo_blog_category_sidebar_position', function (setting) {
			wp.customize.control('yith_proteo_blog_category_sidebar', showControlIfhasValues(setting, ['left', 'right']));
		});

		/**
		 * Control Dependency
		 */
		wp.customize('yith_proteo_blog_tag_sidebar_position', function (setting) {
			wp.customize.control('yith_proteo_blog_tag_sidebar', showControlIfhasValues(setting, ['left', 'right']));
		});

		/**
		 * Control Dependency
		 */
		wp.customize('yith_proteo_product_page_related_enabler', function (setting) {
			wp.customize.control('yith_proteo_product_page_related_max_number', showControlIfhasValues(setting, ['yes']));
			wp.customize.control('yith_proteo_product_page_related_columns', showControlIfhasValues(setting, ['yes']));
		});

		/**
		 * Control Dependency
		 */
		wp.customize('yith_proteo_product_catalog_with_border', function (setting) {
			wp.customize.control('yith_proteo_product_catalog_border_width', showControlIfhasValues(setting, ['yes']));
			wp.customize.control('yith_proteo_product_catalog_border_radius', showControlIfhasValues(setting, ['yes']));
			wp.customize.control('yith_proteo_product_catalog_border_color', showControlIfhasValues(setting, ['yes']));
		});

	});

})(jQuery);
