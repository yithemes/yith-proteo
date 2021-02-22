/**
 * Proteo Admin Dashboard
 */

(function($){
	ProteoAdminDashboard = {

		init: function()
		{
			this._bind();
		},

		launchToolkitWizard: false,

		/**
		 * Binds events.
		 */
		_bind: function()
		{
			$( document ).on( 'click' , '.yith-proteo-install-recommended-plugin', ProteoAdminDashboard._installNow );
			$( document ).on( 'click' , '.yith-proteo-activate-recommended-plugin', ProteoAdminDashboard._activatePlugin );
			$( document ).on( 'wp-plugin-install-success' , ProteoAdminDashboard._activatePlugin );
			$( document ).on( 'wp-plugin-install-error'   , ProteoAdminDashboard._installError );
			$( document ).on( 'wp-plugin-installing'      , ProteoAdminDashboard._pluginInstalling );
			$( document ).on( 'click', '.yith-proteo-install-toolkit', ProteoAdminDashboard._installNow );
			$( document ).on( 'click', '.yith-proteo-activate-toolkit', ProteoAdminDashboard._activatePlugin );
		},

		/**
		 * Plugin Installation Error.
		 */
		_installError: function( event, response ) {

			var $card = jQuery( '.yith-proteo-install-recommended-plugin' );

			$card
				.removeClass( 'button-primary' )
				.addClass( 'disabled' )
				.html( wp.updates.l10n.installFailedShort );
		},

		/**
		 * Installing Plugin
		 */
		_pluginInstalling: function(event, args) {
			event.preventDefault();

			var slug = args.slug;

			var $card = jQuery( '.yith-proteo-install-recommended-plugin' );
			var activatingText = yith_proteo.recommendedPluiginActivatingText;


			$card.each(function( index, element ) {
				element = jQuery( element );
				if ( element.data('slug') === slug ) {
					element.addClass('updating-message');
					element.html( activatingText );
				}
			});

		},

		/**
		 * Activate Success
		 */
		_activatePlugin: function( event, response ) {
			var $t = $(this);
			if ( $t.parents('.demo-actions').length != 0 ) {
				ProteoAdminDashboard.launchToolkitWizard = true
			}
			event.preventDefault();
			var $message = jQuery(event.target),
				$init = $message.data('init'),
				activatedSlug; 

			if (typeof $init === 'undefined') {
				var $message = jQuery('.yith-proteo-install-recommended-plugin[data-slug=' + response.slug + ']');
				activatedSlug = response.slug;
			} else {
				activatedSlug = $init;
			}

			// Transform the 'Install' button into an 'Activate' button.
			var $init                    = $message.data('init');
			var activatingText           = yith_proteo.recommendedPluiginActivatingText;
			var proteoPluginManagerNonce = yith_proteo.proteoPluginManagerNonce;
			var successChecboxSVG        = yith_proteo.successChecboxSVG;
			var proteoWizardUrl          = yith_proteo.proteoWizardUrl;

			$message.removeClass( 'install-now installed button-disabled updated-message' )
				.addClass('updating-message')
				.html( activatingText );

			//setTimeout( function() {

				$.ajax({
					url: yith_proteo.ajaxUrl,
					type: 'POST',
					data: {
						'action' : 'yith-proteo-plugin-activate',
						'nonce'  : proteoPluginManagerNonce,
						'init'   : $init,
					},
				})
				.done(function (result) {
					if( result.success ) {
						$message.removeClass('updating-message yith-proteo-install-recommended-plugin yith-proteo-activate-recommended-plugin').addClass('yith-proteo-installed-recommended-plugin').html( successChecboxSVG );
						if ( ProteoAdminDashboard.launchToolkitWizard === true ) {
							window.location.replace( proteoWizardUrl );
						}
						else {
							location.reload();
						}
						
					} else {
						$message.removeClass( 'updating-message' );
					}
				});
			//}, 1200 );
		},

		/**
		 * Install Now
		 */
		_installNow: function(event)
		{
			event.preventDefault();

			var $t = $(this),
				$button   = jQuery( event.target ),
				$document = jQuery(document);

			if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
				return;
			}

			if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
				wp.updates.requestFilesystemCredentials( event );

				$document.on( 'credential-modal-cancel', function() {
					var $message = $( '.yith-proteo-install-recommended-plugin.updating-message' );

					$message
						.addClass('yith-proteo-activate-recommended-plugin')
						.removeClass( 'updating-message yith-proteo-install-recommended-plugin' )
						.text( wp.updates.l10n.installNow );

					wp.a11y.speak( wp.updates.l10n.updateCancel, 'polite' );
				} );
			}

			if ( $t.parents('.demo-actions').length != 0 ) {
				ProteoAdminDashboard.launchToolkitWizard = true
			}
			
			wp.updates.installPlugin( {
				slug: $button.data( 'slug' )
			});
		},
	};

	/**
	 * Initialize ProteoAdminDashboard
	 */
	$(function(){
		ProteoAdminDashboard.init();
	});

})(jQuery);