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
	if ( ! menu.hasClass( 'nav-menu' ) ) {
		menu.addClass('nav-menu');
	}

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
				if ( self.hasClass( 'focus' ) ) {
					self.removeClass( 'focus' );
				} else {
					self.addClass( 'focus' );
				}
			}

			self = self.parent();
		}
	}

	// Handle mobile menu submenu opening and click
	if(window.matchMedia("(pointer: coarse)").matches) {
		// touchscreen
		$('.menu-item-has-children > a').on( 'click',function (ev) {
			var t = $(this);
			if (t.hasClass('submenu-opened')) {
				return true;
			} else {
				ev.preventDefault();
				//$('.menu-item-has-children > a').removeClass('submenu-opened');
				$(this).addClass('submenu-opened');
			}
	
		});
	} else {
		// is desktop
		$('#yith-proteo-mobile-menu .menu-item-has-children > a').on( 'click',function (ev) {
			var t = $(this);
			if (t.hasClass('submenu-opened')) {
				return true;
			} else {
				ev.preventDefault();
				$(this).addClass('submenu-opened');
			}
	
		});
	}

	// Open/close mobile menu on menu item with no children click (go to link)
	$('#mobile-menu li:not(.menu-item-has-children) > a').on('click', function(){
		var t = $(this),
			mobile_menu_container = $('nav#site-navigation');
			if ( mobile_menu_container.hasClass('toggled') ) {
				mobile_menu_container.removeClass('toggled');
			}
	});
})
(jQuery);
