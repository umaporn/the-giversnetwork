/**
 * @namespace
 * @desc Handles form management.
 */
var Forms = (function(){

    /**
     * @memberOf Forms
     * @desc Form selectors
     * @access private
     * @const {Array}
     */
    const formSelectors = [
        '#change-password-form',
        '#login-form',
        '#register-form',
        '#password-reset-request-form',
        '#password-reset-form',
    ];

    /**
     * @memberOf Forms
     * @desc Initialize Forms module.
     * @access public
     * @return {void}
     */
    var initialize = function(){

        formSelectors.forEach( function( selector ){
            $( selector ).submit( function( event ){
                event.preventDefault();
                Utility.submitForm( selector );
            } );
        } );
    };

    return {
        init: initialize,
    };
})( jQuery );