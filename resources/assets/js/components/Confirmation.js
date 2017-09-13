/**
 * @namespace
 * @desc Handles all confirmation boxes.
 */
var Confirmation = (function(){

    /**
     * @memberOf Confirmation
     * @desc Confirmation box
     * @access private
     * @constant {jQuery}
     */
    const ConfirmationBox  = $( '#confirmation' ),
          /**
           * @memberOf Confirmation
           * @desc Confirmation text
           * @access private
           * @constant {jQuery}
           */
          ConfirmationText = $( '#confirmation-text' ),
          /**
           * @memberOf Confirmation
           * @desc Acceptance button
           * @access private
           * @constant {jQuery}
           */
          AcceptanceButton = $( '#yes-answer' );

    /**
     * @memberOf Confirmation
     * @desc Confirm to delete an object.
     * @access public
     * @param {jQuery} deletionForm - Deletion form
     * @param {String} confirmationKey - Translation key of a confirmation message
     * @param {function} [callbackFunction] - Callback function
     */
    var confirmToDelete = function( deletionForm, confirmationKey, callbackFunction ){

        AcceptanceButton.data( 'form-id', '#' + deletionForm.attr( 'id' ) );
        AcceptanceButton.data( 'callback-function', callbackFunction );

        ConfirmationText.html( Translator.translate( confirmationKey ) + deletionForm.data( 'info' ) + '?' );

        ConfirmationBox.foundation( 'open' );

    };

    /**
     * @memberOf Confirmation
     * @desc Initialize Confirmation module.
     * @access public
     */
    var initialize = function(){

        AcceptanceButton.click( function( event ){

            event.preventDefault();

            ConfirmationBox.foundation( 'close' );

            Utility.submitForm( AcceptanceButton.data( 'form-id' ), AcceptanceButton.data( 'callback-function' ) );

        } );

    };

    return {
        init:            initialize,
        confirmToDelete: confirmToDelete,
    };

})( jQuery );