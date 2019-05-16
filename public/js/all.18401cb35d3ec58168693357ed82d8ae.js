/**
 * @namespace
 * @desc JavaScript translator
 */
const Translator = (function(){

    /**
     * @memberOf Translator
     * @access private
     * @desc JavaScript Translator
     * @constant {Object}
     */
    const JSTranslator = JSTranslate.i18n( {
                                               language:        Laravel.languageCodes,
                                               defaultLanguage: Laravel.defaultLanguage,
                                           } );

    /**
     * @memberOf Translator
     * @access public
     * @desc Initialize JavaScript translator.
     */
    function initialize(){

        $.holdReady( true );

        let jsonFiles    = [],
            errorMessage = 'Error! Failed to load some translation files, please contact the system administrator.';

        Laravel.languageCodes.forEach( function( languageCode ){
            jsonFiles.push( $.getJSON( '/languages/' + languageCode + '.json', { timestamp: Date.now() } ) );
        } );

        $.when.apply( this, jsonFiles )
         .then(
             function(){

                 for( let index = 0; index < arguments.length; index++ ){
                     JSTranslator.add( {
                                           language: Laravel.languageCodes[index],
                                           data:     arguments[index][0],
                                       } );
                 }

                 JSTranslator.useLanguage( Laravel.currentLanguage );
             },
             function(){
                 Utility.displayErrorMessageBox( errorMessage );
             },
         ).always( function(){
            $.holdReady( false );
        } );
    }

    /**
     * @memberOf Translator
     * @access public
     * @desc Translate text with a specific key.
     * @param {String} key - Translation key
     * @return {String} Translated text
     */
    function translate( key ){
        return JSTranslator.translate( key );
    }

    return {
        initialize: initialize,
        translate:  translate,
    };

})( jQuery );
/**
 * @namespace
 * @desc Handles all utility functions.
 */
const Utility = (function(){

    const
        /**
         * @memberOf Utility
         * @access private
         * @desc Result box
         * @constant {jQuery}
         */
        ResultBoxSelector   = $( '#result-box' ),
        /**
         * @memberOf Utility
         * @access private
         * @desc Result title
         * @constant {jQuery}
         */
        ResultTitleSelector = $( '#result-title' ),
        /**
         * @memberOf Utility
         * @access private
         * @desc Result text
         * @constant {jQuery}
         */
        ResultTextSelector  = $( '#result-text' );

    /**
     * @memberOf Utility
     * @access private
     * @desc Display a result message box.
     * @param {String} message - Result message
     * @param {Boolean} isError - Error flag ( true = error, false = not error )
     */
    function displayMessageBox( message, isError ){

        clearErrors();

        ResultTextSelector.html( message );

        if( ResultTextSelector.hasClass( 'alert' ) ){
            if( !isError ){
                ResultTitleSelector.html( Translator.translate( 'utility.result.success' ) );
                ResultTextSelector.removeClass( 'alert' );
            }
        } else {
            if( isError ){
                ResultTitleSelector.html( Translator.translate( 'error' ) );
                ResultTextSelector.addClass( 'alert' );
            }
        }

        ResultBoxSelector.foundation( 'open' );

    }

    /**
     * @memberOf Utility
     * @access public
     * @desc Display a success message box.
     * @param {String} successMessage - Success message
     */
    function displaySuccessMessageBox( successMessage ){
        displayMessageBox( successMessage, false );
    }

    /**
     * @memberOf Utility
     * @access public
     * @desc Display an error message box.
     * @param {String} errorMessage - Error message
     */
    function displayErrorMessageBox( errorMessage ){
        displayMessageBox( errorMessage, true );
    }

    /**
     * @memberOf Utility
     * @access public
     * @desc Clear all errors.
     */
    function clearErrors(){
        $( 'form' ).children().removeClass( 'error' );
        $( '.help-text' ).addClass( 'hide' );
    }

    /**
     * @memberOf Utility
     * @access public
     * @desc Display invalid inputs.
     * @param {JSON} error - Input error list
     */
    function displayInvalidInputs( error ){

        clearErrors();

        if( error.hasOwnProperty( 'errors' ) ){

            for( name in error['errors'] ){

                let errorMessage = error['errors'][name],
                    id           = $( '[name=' + name + ']' ).attr( 'id' ),
                    errorText    = typeof(errorMessage) === 'object' ? errorMessage[0] : errorMessage;

                if( id ){
                    $( '#' + id ).addClass( 'error' );
                    $( '#' + id + '-help-text' ).text( errorText ).removeClass( 'hide' );
                } else {
                    let fieldSetId = $( '[name="' + name + '[]"]' ).parent( 'fieldset' ).attr( 'id' );
                    $( '#' + fieldSetId + '-help-text' ).text( errorText ).removeClass( 'hide' );
                }
            }

        }

    }

    /**
     * @memberOf Utility
     * @access public
     * @desc Display an unknown error.
     * @param {XMLHttpRequest} jqXHR - jQuery XMLHttpRequest object
     * @param {String} url - The URL that occurs the error
     */
    function displayUnknownError( jqXHR, url ){

        clearErrors();

        let errorText = '<h5>' + Translator.translate( 'utility.calling_system_administrator' ) + '</h5>';
        errorText += '<strong>' + Translator.translate( 'utility.error_url' ) + '</strong> ' + url + '<br>';
        errorText += '<strong>' + Translator.translate( 'utility.error_status_code' ) + '</strong> ' + jqXHR.status + '<br>';
        errorText += '<strong>' + Translator.translate( 'utility.error_status_text' ) + '</strong> ' + jqXHR.statusText + '<br>';

        displayErrorMessageBox( errorText );

    }

    /**
     * @memberOf Utility
     * @access private
     * @desc Take a submitting action.
     * @param {jQuery} form - Form
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
    function takeSubmitAction( form, jqXHR ){

        let result = jqXHR.responseJSON;

        if( $.inArray( jqXHR.status, [422, 423] ) !== -1 ){

            displayInvalidInputs( result );

        } else if( result.success === true ){

            if( result.hasOwnProperty( 'message' ) ){

                ResultBoxSelector.on( 'closed.zf.reveal', function(){
                    if( result.redirectedUrl ){
                        location.href = result.redirectedUrl;
                    } else {
                        form.trigger( 'reset' );
                    }
                } );

                displaySuccessMessageBox( result.message );

            } else if( result.redirectedUrl ){
                location.href = result.redirectedUrl;
            }

        } else {

            displayErrorMessageBox( result.message );

        }

    }

    /**
     * @memberOf Utility
     * @access private
     * @desc Run a callback function.
     * @param {jQuery} form - Form
     * @param {XMLHttpRequest} jqXHR - jQuery XMLHttpRequest object
     * @param {function} [callbackFunction] - Callback function
     */
    function runCallbackFunction( form, jqXHR, callbackFunction ){

        if( jqXHR.hasOwnProperty( 'responseJSON' ) ){
            if( typeof(callbackFunction) === 'function' ){
                callbackFunction.apply( this, [form, jqXHR] );
            } else {
                takeSubmitAction( form, jqXHR );
            }
        } else {
            displayUnknownError( jqXHR, form.attr( 'action' ) );
        }
    }

    /**
     * @memberOf Utility
     * @access public
     * @desc Get form data.
     * @param {jQuery} form - Form
     * @return {Array|Object} Form data
     */
    function getFormData( form ){

        return (form.attr( 'method' ) === 'GET') ? form.serialize() : new FormData( form[0] );

    }

    /**
     * @memberOf Utility
     * @access public
     * @desc Submit a form and take an action.
     * @param {jQuery} form - Form
     * @param {function} [callbackFunction] - Callback function
     */
    function submitForm( form, callbackFunction ){

        $.ajax( {
                    url:         form.attr( 'action' ),
                    method:      form.attr( 'method' ),
                    data:        getFormData( form ),
                    cache:       false,
                    contentType: false,
                    processData: false,
                    dataType:    'json',
                    success:     function( result, statusText, jqXHR ){
                        runCallbackFunction( form, jqXHR, callbackFunction );
                    },
                    error:       function( jqXHR ){
                        runCallbackFunction( form, jqXHR, callbackFunction );
                    },
                } );
    }

    return {
        submitForm:               submitForm,
        displaySuccessMessageBox: displaySuccessMessageBox,
        displayErrorMessageBox:   displayErrorMessageBox,
        displayInvalidInputs:     displayInvalidInputs,
        displayUnexpectedError:   displayUnknownError,
        clearErrors:              clearErrors,
        getFormData:              getFormData,
    };

})( jQuery );
/**
 * @desc Spinner selector
 * @const {jQuery}
 */
const SpinnerSelector = $( '#spinner, #spinner-popup' );

Translator.initialize();

$.ajaxSetup( {
                 headers: {
                     'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' ),
                 },
             } );

$( document )
    .ajaxStart( function(){
        SpinnerSelector.show();
    } )
    .ajaxComplete( function(){
        SpinnerSelector.hide();
    } )
    .ready( function(){
        /** Initialize all JavaScript modules. */
        Menu.initialize();
        Search.initialize();
        Confirmation.initialize();
        Form.initialize();
        ReportMenu.initialize();
    } );
