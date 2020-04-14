/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

    wp.customize( 'yith_proteo_buttons_border_radius', function( value ) {
        value.bind( function( newval ) {
            $( 'button, input[type=button], input[type=reset], input[type=submit], .button, .widget a.button, .wishlist-submit.popup_button' ).css("border-radius", newval+'px');
        } );
    } );

    wp.customize( 'yith_proteo_inputs_border_radius', function( value ) {
        value.bind( function( newval ) {
            $( 'input[type=text], input[type=email], input[type=url], input[type=password], input[type=search], input[type=number], input[type=tel], input[type=range], input[type=date], input[type=month], input[type=week], input[type=time], input[type=datetime], input[type=datetime-local], input[type=color], textarea, input[type=file], .select2-container .select2-selection, .woocommerce a.selectBox.selectBox-dropdown' ).css("border-radius", newval+'px');
        } );
    } );

} )( jQuery );
