/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function ($) {
	var container, button, menu, links, i, len, body;

	container = $( '#site-navigation' );
	if ( container.length == 0 ) {
		return;
	}

	button = container.find( '.menu-toggle' );
	if ( button.length == 0 ) {
		return;
	}


	menu = container.find( '#mobile-menu' );
	// Hide menu toggle button if menu is empty and return early.
	if ( menu.length == 0 ) {
		button.remove();
		$('.left-toggle .site-branding').css('margin-left', 0);
	}

	menu.attr( 'aria-expanded', 'false' );
	menu.toggleClass('nav-menu');

	button.on('click', function(){
		if( container.hasClass('toggled') ) {
			container.removeClass('toggled');
			$('body').removeClass( 'mobile-menu-opened' );
			button.attr( 'aria-expanded', 'false' );
			menu.attr( 'aria-expanded', 'false' );
		} else {
			container.addClass('toggled');
			$('body').addClass( 'mobile-menu-opened' );
			button.attr( 'aria-expanded', 'true' );
			menu.attr( 'aria-expanded', 'true' );
		}
	});

	// Get all the link elements within the menu.
	links = menu.find( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = $(this);

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( ! self.hasClass('nav-menu') ) {

			// On li elements toggle the class .focus.
			if ( self.is('li') ) {
				self.toggleClass( 'focus' );
			}

			self = self.parent();
		}
	}

	selector = '#yith-proteo-mobile-menu .menu-item-has-children > a';
	// Handle mobile menu submenu opening and click
	if(window.matchMedia("(pointer: coarse)").matches) {
		selector = '.menu-item-has-children > a';
	}

	$(selector).on( 'click',function (ev) {
		if ($(this).hasClass('submenu-opened')) {
			return true;
		} else {
			ev.preventDefault();
			$(this).parent().siblings().find('a').removeClass('submenu-opened');
			$(this).addClass('submenu-opened');
		}
    });

	// Open/close mobile menu on menu item with no children click (go to link)
	$('#mobile-menu li:not(.menu-item-has-children) > a').on('click', function(){
		var t = $(this),
			mobile_menu_container = $('nav#site-navigation');
			if ( mobile_menu_container.hasClass('toggled') ) {
				mobile_menu_container.removeClass('toggled');
			}
	});

	function yith_proteo_edge_menu_items_positioning() {
		var document_width = $( window ).width(),
			parents        = $('#primary-menu .menu-item-has-children'),
			submenu_width  = $('#primary-menu ul.sub-menu').first().outerWidth();
			
			parents.each( function(){
				var parent         = $(this),
					submenus       = parent.find('ul.sub-menu'),
					submenus_count = submenus.length;
				parent.attr('submenu-levels', submenus_count);

				var is_first_level_submenu = !! parent.parent('#primary-menu').length,
					parent_offset = parent.offset().left + ( is_first_level_submenu ? 0 : parent.outerWidth() ),
					isEntirelyVisible = ( parent_offset + submenu_width - 45 <= document_width );

				parent.attr('submenu-visible', isEntirelyVisible);
				if ( ! isEntirelyVisible ) {
					parent.addClass('edge-menu-element');
				}
			} );
	}

	yith_proteo_edge_menu_items_positioning();
})
(jQuery);
