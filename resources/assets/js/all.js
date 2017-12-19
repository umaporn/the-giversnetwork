/**
 * @const
 * @desc Spinner selector
 * @type {Object}
 */
const SpinnerSelector = $( '#spinner, #spinner-popup' );

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
        Menu.init();
        Confirmation.init();
    } );