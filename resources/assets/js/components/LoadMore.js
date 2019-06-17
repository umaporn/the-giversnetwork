/**
 * @namespace
 * @desc Handles load more content.
 */

const LoadMore = (function(){
	/**
	 * @memberOf LoadMore
	 * @access public
	 * @desc Initialize LoadMore module.
	 * @constant {Object}
	 */
	function initialize(){

		$( document ).on( 'click', '#loadMore', function(){

			Utility.clearErrors();
			let url = $( this ).attr( 'data-url' );

			$.ajax( {
				        url:         url,
				        method:      'GET',
				        cache:       false,
				        contentType: false,
				        processData: false,
				        success:     function( result ){

					        if( url ){
						        $( '#loadMore' ).remove();
						        $( '#content-list-box' ).append( result.data );
					        } else {
						        $( '#loadMore' ).hide();
					        }

				        },
			        } );
		} );

		$( document ).on( 'click', '#loadMore-give', function(){

			Utility.clearErrors();
			let url = $( this ).attr( 'data-url' );

			$.ajax( {
				        url:         url,
				        method:      'GET',
				        cache:       false,
				        contentType: false,
				        processData: false,
				        success:     function( result ){
					        if( url ){
						        $( '.give-load' ).remove();
						        $( '#give-result-box > #content-list-box' ).append( result.data );
					        } else {
						        $( '.give-load' ).remove();
					        }

				        },
			        } );
		} );

		$( document ).on( 'click', '#loadMore-receive', function(){

			Utility.clearErrors();
			let url = $( this ).attr( 'data-url' );

			$.ajax( {
				        url:         url,
				        method:      'GET',
				        cache:       false,
				        contentType: false,
				        processData: false,
				        success:     function( result ){

					        if( url ){
						        $( '.give-load' ).remove();
						        $( '#receive-result-box > #content-list-box' ).append( result.data );
					        } else {
						        $( '.give-load' ).remove();
					        }

				        },
			        } );
		} );
	}

	return {
		initialize: initialize,
	};

})( jQuery );