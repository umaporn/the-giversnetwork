/**
 * @const
 * @desc Spinner selector
 * @type {Object}
 */
const SpinnerSelector = $( '#spinner' );

Translator.init();

$( document )
    .ajaxStart( function(){
        SpinnerSelector.show();
    } )
    .ajaxComplete( function(){
        SpinnerSelector.hide();
    } )
    .ready( function(){
        /** Initialize all JavaScript modules. */
        Forms.init();
        Search.init();
    } );