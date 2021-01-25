/**
* File customize-controls.js.
*
* Theme Customizer enhancements for a better user experience.
*
* Contains handlers to make Theme Customizer preview reload changes asynchronously.
*/

wp.customize.controlConstructor['spacing_control'] = wp.customize.Control.extend({
    
    ready: function() {
        
        'use strict';
        var control = this,
        value;
        
        // Set the spacing container.
        control.spacingContainer = control.container.find( 'ul.spacing-wrapper' ).first();
        
        // Save the value.
        control.spacingContainer.on( 'change keyup paste', 'input.spacing-input', function() {
            value = jQuery( this ).val();
            
            // Update value on change.
            control.updateValue();
        });
    },
    
    /**
    * Updates the sorting list
    */
    updateValue: function() {
        
        'use strict';
        
        var control = this,
        newValue = {};
        
        this.spacingContainer.find( 'input.spacing-input' ).each( function() {
            var spacing_input = jQuery( this ),
            item = spacing_input.data( 'id' ),
            item_value = spacing_input.val();
            
            newValue[item] = item_value;
        });
        
        control.setting.set( newValue );
    }
});