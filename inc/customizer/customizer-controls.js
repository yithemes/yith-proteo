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
	 * Googe Font Select Custom Control
	 */

	$('.google-fonts-list').each(function (i, obj) {
		if (!$(obj).hasClass('select2-hidden-accessible')) {
			$(obj).select2();
		}
	});

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

	});

})(jQuery);
