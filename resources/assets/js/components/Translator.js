/**
 * @namespace
 * @desc JavaScript translator
 */
var Translator = (function(){
    /**
     * @memberOf Translator
     * @desc JavaScript Translator
     * @access private
     * @constant {Object}
     */
    const JSTranslator = JSTranslate.i18n( {
                                               language:        Laravel.languageCodes,
                                               defaultLanguage: Laravel.defaultLanguage,
                                           } );

    /**
     * @memberOf Translator
     * @desc Initialize JavaScript translator.
     * @access public
     */
    var initialize = function(){

        $.holdReady( true );

        var jsonFiles    = [],
            errorMessage = 'Error! Failed to load some translation files, please contact the system administrator.';

        Laravel.languageCodes.forEach( function( languageCode ){
            jsonFiles.push( $.getJSON( '/languages/' + languageCode + '.json', { timestamp: Date.now() } ) );
        } );

        $.when.apply( this, jsonFiles )
         .then(
             function(){

                 for( var index = 0; index < arguments.length; index++ ){
                     JSTranslator.add( {
                                           language: Laravel.languageCodes[index],
                                           data:     arguments[index][0],
                                       } );
                 }

                 JSTranslator.useLanguage( Laravel.currentLanguage );
             },
             function(){
                 Utility.displayErrorMessageBox( errorMessage );
             }
         ).always( function(){
            $.holdReady( false );
        } );
    };

    /**
     * @memberOf Translator
     * @desc Translate text with a specific key.
     * @access public
     * @param {String} key - Translation key
     * @return {String} Translated text
     */
    var translate = function( key ){
        return JSTranslator.translate( key );
    };

    return {
        init:      initialize,
        translate: translate,
    };

})( jQuery );