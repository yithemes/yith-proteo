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

})
(jQuery);