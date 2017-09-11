/**
 * @namespace
 * @desc Handles menu management.
 */
var Menu = (function(){

    /**
     * @memberOf Menu
     * @desc Initialize Menu module.
     * @access public
     */
    var initialize = function(){

        $( '.menu li.active.is-submenu-item' ).parent().parents().each( function( index, element ){
            if( $( element ).is( 'li' ) ){
                $( element ).addClass( 'active' );
            }
        } );

    };

    return {
        init: initialize,
    };
})( jQuery );