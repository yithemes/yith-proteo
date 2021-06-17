/**
 * YITH PROTEO theme.js.
 *
 * Theme specific JS functions
 */
(function ($) {

    // Admin Proteo Icons
    $('#title_icon').each(function () {
        var t = $(this),
            renderOption = function (state) {
                if (!state.id) {
                    return state.text;
                }
                return $(
                    state.text
                );
            };

        t.select2({
            templateResult: renderOption,
            templateSelection: renderOption
        });
    });

    $('.yith_proteo_product_taxonomy_sidebar_position').on( 'change', function(){
        var sidebar_position_element = $(this),
        sidebar_position = sidebar_position_element.val(),
        sidebar_chooser_element = $('.yith_proteo_product_taxonomy_sidebar'),
        sidebar_chooser_form_element = sidebar_chooser_element.parents('.form-field');
        if (sidebar_position === 'no-sidebar') {
            sidebar_chooser_form_element.hide();
        } else {
            sidebar_chooser_form_element.show();
        }
    } ).change();

})
(jQuery);