/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, i, len, body;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	button.onclick = function() {

		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			jQuery('html').add('body').removeClass('mobile-menu-opened');
			button.setAttribute( 'aria-expanded', 'false' );

		} else {
			container.className += ' toggled';
			jQuery('html').add('body').addClass('mobile-menu-opened');
			button.setAttribute( 'aria-expanded', 'true' );
		}
	};

	jQuery('#primary-nav-menu > ul').attr('role',"navigation");
	jQuery(".menu-item-has-children > a").attr({
	'aria-label':'sub menu',
	'aria-haspopup':'true',
	'aria-expanded':'true'
	});
	

} )();
