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
		var elementItalicWeight = $(this).parent().parent().find('.google-fonts-italicweight-style');
		var elementBoldWeight = $(this).parent().parent().find('.google-fonts-boldweight-style');
		var selectedFont = $(this).val();
		var customizerControlName = $(this).attr('control-name');
		var elementItalicWeightCount = 0;
		var elementBoldWeightCount = 0;

		// Clear Weight/Style dropdowns
		elementRegularWeight.empty();
		elementItalicWeight.empty();
		elementBoldWeight.empty();
		// Make sure Italic & Bold dropdowns are enabled
		elementItalicWeight.prop('disabled', false);
		elementBoldWeight.prop('disabled', false);

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
			if (text.indexOf("italic") >= 0) {
				elementItalicWeight.append(
					$('<option></option>').val(text).html(text)
				);
				elementItalicWeightCount++;
			} else {
				elementBoldWeight.append(
					$('<option></option>').val(text).html(text)
				);
				elementBoldWeightCount++;
			}
		});

		if(elementItalicWeightCount == 0) {
			elementItalicWeight.append(
				$('<option></option>').val('').html('Not Available for this font')
			);
			elementItalicWeight.prop('disabled', 'disabled');
		}
		if(elementBoldWeightCount == 0) {
			elementBoldWeight.append(
				$('<option></option>').val('').html('Not Available for this font')
			);
			elementBoldWeight.prop('disabled', 'disabled');
		}

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
			italicweight: $element.find('.google-fonts-italicweight-style').val(),
			boldweight: $element.find('.google-fonts-boldweight-style').val(),
			category: $element.find('.google-fonts-category').val()
		};

		// Important! Make sure to trigger change event so Customizer knows it has to save the field
		$element.find('.customize-control-google-font-selection').val(JSON.stringify(selectedFont)).trigger('change');
	}

})(jQuery);