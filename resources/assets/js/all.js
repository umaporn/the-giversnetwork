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
        HeroBanner.initialize();
        GiveTab.initialize();
        LoadMore.initialize();
        Slide.initialize();
	    InterestIn.initialize();
	    Like.initialize();
	    Comment.initialize();
	    Counter.initialize();
	    TinyMCE.initialize();
	    Fancybox.initialize();
	    Video.initialize();
    } );