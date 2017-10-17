/**
 * @namespace
 * @desc Handles all utility functions.
 */
var Utility = (function(){

    /**
     * @memberOf Utility
     * @desc Result box
     * @access private
     * @constant {jQuery}
     */
    const ResultBoxSelector   = $( '#result-box' ),
          /**
           * @memberOf Utility
           * @desc Result title
           * @access private
           * @constant {jQuery}
           */
          ResultTitleSelector = $( '#result-title' ),
          /**
           * @memberOf Utility
           * @desc Result text
           * @access private
           * @constant {jQuery}
           */
          ResultTextSelector  = $( '#result-text' );

    /**
     * @memberOf Utility
     * @desc Display a result message box.
     * @access private
     * @param {String} message - Result message
     * @param {Boolean} isError - Error flag ( true = error, false = not error )
     */
    var displayMessageBox = function( message, isError ){

        clearErrors();

        ResultTextSelector.html( message );

        if( ResultTextSelector.hasClass( 'alert' ) ){
            if( !isError ){
                ResultTitleSelector.html( Translator.translate( 'utility.result.success' ) );
                ResultTextSelector.removeClass( 'alert' );
            }
        } else {
            if( isError ){
                ResultTitleSelector.html( Translator.translate( 'utility.result.error' ) );
                ResultTextSelector.addClass( 'alert' );
            }
        }

        ResultBoxSelector.foundation( 'open' );

    };

    /**
     * @memberOf Utility
     * @desc Display a success message box.
     * @access public
     * @param {String} successMessage - Success message
     */
    var displaySuccessMessageBox = function( successMessage ){
        displayMessageBox( successMessage, false );
    };

    /**
     * @memberOf Utility
     * @desc Display an error message box.
     * @access public
     * @param {String} errorMessage - Error message
     */
    var displayErrorMessageBox = function( errorMessage ){
        displayMessageBox( errorMessage, true );
    };

    /**
     * @memberOf Utility
     * @desc Clear all errors.
     * @access public
     */
    var clearErrors = function(){
        $( 'form' ).children().removeClass( 'error' );
        $( '.help-text' ).addClass( 'hide' );
    };

    /**
     * @memberOf Utility
     * @desc Display invalid inputs.
     * @access public
     * @param {JSON} error - Input error list
     */
    var displayInvalidInputs = function( error ){

        clearErrors();

        if( error.hasOwnProperty( 'errors' ) ){

            for( name in error['errors'] ){

                var errorMessage = error['errors'][name],
                    id           = $( '[name=' + name + ']' ).attr( 'id' ),
                    errorText    = typeof( errorMessage ) === 'object' ? errorMessage[0] : errorMessage;

                if( id ){
                    $( '#' + id ).addClass( 'error' );
                    $( '#' + id + '-help-text' ).text( errorText ).removeClass( 'hide' );
                } else {
                    var fieldSetId = $( '[name="' + name + '[]"]' ).parent( 'fieldset' ).attr( 'id' );
                    $( '#' + fieldSetId + '-help-text' ).text( errorText ).removeClass( 'hide' );
                }
            }

        }

    };

    /**
     * @memberOf Utility
     * @desc Display an unknown error.
     * @access public
     * @param {XMLHttpRequest} jqXHR - jQuery XMLHttpRequest object
     * @param {String} url - The URL that occurs the error
     */
    var displayUnknownError = function( jqXHR, url ){

        clearErrors();

        var errorText = '<h5>' + Translator.translate( 'utility.calling_system_administrator' ) + '</h5>';
        errorText += '<strong>' + Translator.translate( 'utility.error_url' ) + '</strong> ' + url + '<br>';
        errorText += '<strong>' + Translator.translate( 'utility.error_status_code' ) + '</strong> ' + jqXHR.status + '<br>';
        errorText += '<strong>' + Translator.translate( 'utility.error_status_text' ) + '</strong> ' + jqXHR.statusText + '<br>';

        displayErrorMessageBox( errorText );

    };

    /**
     * @memberOf Utility
     * @desc Take a submitting action.
     * @access private
     * @param {jQuery} formElement - Form element
     * @param {XMLHttpRequest} jqXHR - jQuery XMLHttpRequest object
     * > If jqXHR.status is not 422 or 423 and jqXHR.responseJSON is not empty
     * then the jqXHR.responseJSON format must have the following keys below.
     *
     * Key | Explanation
     * - | -
     * **success** {Boolean} | It is a success status which it can be true or false.
     * **message** {String} | It is a response message which it can be an error message or a success message. *This is an optional key for a success case.*
     * **redirectedUrl** {String} | It is a redirected URL which the browser will be redirected to if success status is true.
     *
     * **Note:** jqXHR.status is HTTP status code.
     */
    var takeSubmitAction = function( formElement, jqXHR ){

        var result = jqXHR.responseJSON;

        if( $.inArray( jqXHR.status, [422, 423] ) !== -1 ){

            displayInvalidInputs( result );

        } else if( result.success === true ){

            if( result.hasOwnProperty( 'message' ) ){

                ResultBoxSelector.on( 'closed.zf.reveal', function(){
                    if( result.redirectedUrl ){
                        location.href = result.redirectedUrl;
                    } else {
                        formElement.reset();
                    }
                } );

                displaySuccessMessageBox( result.message );

            } else if( result.redirectedUrl ){
                location.href = result.redirectedUrl;
            }

        } else {

            displayErrorMessageBox( result.message );

        }

    };

    /**
     * @memberOf Utility
     * @desc Run a callback function.
     * @access private
     * @param {Object} formElement - Form element
     * @param {XMLHttpRequest} jqXHR - jQuery XMLHttpRequest object
     * @param {function} [callbackFunction] - Callback function
     */
    var runCallbackFunction = function( formElement, jqXHR, callbackFunction ){

        if( jqXHR.hasOwnProperty( 'responseJSON' ) ){
            if( typeof( callbackFunction ) === 'function' ){
                callbackFunction.apply( this, [formElement, jqXHR] );
            } else {
                takeSubmitAction( formElement, jqXHR );
            }
        } else {
            displayUnknownError( jqXHR, formElement.getAttribute( 'action' ) );
        }
    };

    /**
     * @memberOf Utility
     * @desc Submit a form and take an action.
     * @access public
     * @param {String} formSelector - Form selector
     * @param {function} [callbackFunction] - Callback function
     */
    var submitForm = function( formSelector, callbackFunction ){

        var formElement = document.querySelector( formSelector ),
            method      = formElement.getAttribute( 'method' ),
            formData    = ( method === 'GET' ) ? $( formSelector ).serialize() : new FormData( formElement );

        $.ajax( {
                    url:         formElement.getAttribute( 'action' ),
                    method:      method,
                    data:        formData,
                    cache:       false,
                    contentType: false,
                    processData: false,
                    dataType:    'json',
                    success:     function( result, statusText, jqXHR ){
                        runCallbackFunction( formElement, jqXHR, callbackFunction );
                    },
                    error:       function( jqXHR ){
                        runCallbackFunction( formElement, jqXHR, callbackFunction );
                    },
                } );
    };

    return {
        submitForm:               submitForm,
        displaySuccessMessageBox: displaySuccessMessageBox,
        displayErrorMessageBox:   displayErrorMessageBox,
        displayInvalidInputs:     displayInvalidInputs,
        displayUnexpectedError:   displayUnknownError,
        clearErrors:              clearErrors,
    };

})( jQuery );