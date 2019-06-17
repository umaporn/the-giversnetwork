/**
 * @namespace
 * @desc Handles give category tab.
 */

const GiveTab = (function(){
	/**
	 * @memberOf GiveTab
	 * @access public
	 * @desc Initialize GiveCategoryTab module.
	 * @constant {Object}
	 */
	function initialize(){

		$( '#give-category > a' ).click( function(){

			let url = $( this ).attr( 'data-url' );

			$.ajax( {
				        url:         url,
				        method:      'GET',
				        cache:       false,
				        contentType: false,
				        processData: false,
				        success:     function( result ){
					        $( '#give-result-box' ).html( result );
				        },
			        } );

		} );

		$( '.give-tab > a' ).click( function(){

			let url = $( this ).attr( 'data-url' );

			$.ajax( {
				        url:         url,
				        method:      'GET',
				        cache:       false,
				        contentType: false,
				        processData: false,
				        success:     function( result ){
					        $( '#give-result-box' ).html( result.data );
				        },
			        } );

		} );

		$( '.receive-tab > a' ).click( function(){

			let url = $( this ).attr( 'data-url' );

			$.ajax( {
				        url:         url,
				        method:      'GET',
				        cache:       false,
				        contentType: false,
				        processData: false,
				        success:     function( result ){
					        $( '#receive-result-box' ).html( result.data );
				        },
			        } );

		} );

		$( '.give-filter' ).change( function(){
			window.location = $( this ).val();
		} );

	}

	return {
		initialize: initialize,
	};

})( jQuery );