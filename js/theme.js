/**
 * YITH PROTEO theme.js.
 *
 * Theme specific JS functions
 */
(function ($) {

    function headerheighfix() {
        var height = $('.site-header').outerHeight(),
            new_height = (20 + height) + 'px';
        //$('header:not(.sticky) + .site-content').css('padding-top', new_height);
        $('header + .yith-proteo-slider .yith-proteo-slider-slide').css('padding-top', height);
        $('header + #content').css('padding-top', new_height);
    }

    $(window).resize(headerheighfix);

    headerheighfix();


    // STICKY HEADER
    if (typeof yith_proteo != 'undefined' && yith_proteo.stickyHeader == 'yes') {
        var site_header = $('.site-header'),
            stickyOffset = site_header.length ? site_header.offset().top : false;
        if (stickyOffset !== false) {
            $(window).scroll(function () {
                var sticky = site_header,
                    scroll = $(window).scrollTop(),
                    content = $('header + #content');

                if (scroll > stickyOffset) {
                    sticky.addClass('sticky');
                    content.css("padding-top", sticky.height() + stickyOffset + 50);
                } else {
                    sticky.removeClass('sticky');
                }
            });
        }
    }


    function initCheckbox() {
        $('input[type="radio"], input[type="checkbox"]').each(function () {

            var type = $(this).attr('type'),
                checked = $(this).is(':checked') ? 'checked' : '';

            if (!$(this).closest('span.' + type + 'button').length) {
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

            t.after($('<div/>', {class: 'separator'}));
        });
    }


    $(document).on('change', 'input[type="radio"], input[type="checkbox"]', function () {
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

    $(document).on('ready yith_wfbt_form_updated yith_wfbt_modal_opened yith_wcwl_popup_opened updated_checkout updated_cart_totals yith_quick_view_loaded yith_wcwl_fragments_loaded yith_wcwl_init_after_ajax yith_welrp_popup_template_loaded yith_wcdp_updated_deposit_form', function () {

        if (typeof $.fn.selectWoo !== 'undefined') {
            $('select').filter(':visible').selectWoo(
                {
                    'minimumResultsForSearch': 7
                }
            );
        }

        initCheckbox();
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
    });

    // Full screen search
    $('header .widget.widget_search').on('focus, click', function (event) {
        // Prevent the default action
        event.preventDefault();

        // Display the Full Screen Search
        $('#full-screen-search').fadeIn('fast', function () {
            $(this).addClass('open');
        });

        // Focus on the Full Screen Search Input Field
        $('#full-screen-search input').focus();
    });

    // function to close full screen search
    function close_full_screen_search() {
        // Hide the Full Screen Search
        $('#full-screen-search').fadeOut('fast', function () {
            $(this).removeClass('open');
        });
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
    $(document).keydown(function (event) {
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
    $(document).ready(function () {
        $(window).on('resize', function () {
            // If there are multiple elements with the same class, "main"
            $('.single-product div.product .woocommerce-product-gallery .flex-control-thumbs li').each(function () {
                $(this).height($(this).width());
            });
        }).resize();
    });

    $('.menu-item-has-children > a').click(function (ev) {
        var t = $(this);
        if (t.hasClass('submenu-opened')) {
            return true;
        } else {
            ev.preventDefault();
            $('.menu-item-has-children > a').removeClass('submenu-opened');
            $(this).addClass('submenu-opened');
        }

    });

    // Modals
    $('a.open-modal').click(function (ev) {
        $(this).modal({
            fadeDuration: 250
        });
        return false;
    });

    // Quantity Inputs
    $(document).on('click', '.quantity .product-qty-arrows span', function () {
        var t = $(this),
            input_selector = t.parents('.quantity').find('input[type="number"]'),
            input_val = parseFloat(input_selector.val()),
            min_val = input_selector.attr('min'),
            max_val = input_selector.attr('max'),
            step = input_selector.attr('step');

        //clean step attr
        if ( typeof step === 'undefined' || !step ) {
            step = 1;
        }
        else {
          step = parseFloat(step);
        }


        if (t.hasClass('product-qty-increase')) {
            input_val = input_val + step;
            if ( typeof max_val !== 'undefined' && parseFloat(max_val) < input_val ) {
                return;
            }
            input_selector.val(input_val).change();

        }else if (t.hasClass('product-qty-decrease')) {
            input_val = input_val - step;
            if ( typeof min_val !== 'undefined' && parseFloat(min_val) > input_val ) {
                return;
            }
            input_selector.val(input_val).change();
        }
    })

})
(jQuery);
