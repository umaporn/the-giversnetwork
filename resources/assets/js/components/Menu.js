/**
 * @namespace
 * @desc Handles menu management.
 */
const Menu = (function(){

    /**
     * @memberOf Menu
     * @access public
     * @desc Initialize Menu module.
     */
    function initialize(){

        $( '.menu li.active.is-submenu-item' ).parent().parents().each( function( index, element ){
            if( $( element ).is( 'li' ) ){
                $( element ).addClass( 'active' );
            }
        } );

    }

    return {
        initialize: initialize,
    };

})( jQuery );