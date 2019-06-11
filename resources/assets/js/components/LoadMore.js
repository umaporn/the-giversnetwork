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
	}

	return {
		initialize: initialize,
	};

})( jQuery );