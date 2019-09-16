/**
 * @namespace
 * @desc Handles like action.
 */

const Like = (function(){
	/**
	 * @memberOf Like
	 * @access public
	 * @desc Initialize Like module.
	 * @constant {Object}
	 */
	function initialize(){

		$( document ).on( 'click', '.share-like-button', function( event ){

			$( '.spinner-box' ).removeAttr( 'id' );

			event.preventDefault();

			let likeAction = $( '#like-action' ),
			    url        = likeAction.attr( 'action' ),
			    method     = likeAction.attr( 'method' ),
			    likeBox    = $( '#show-like-box' );

			$.ajax( {
				        url:         url,
				        method:      method,
				        data:        getFormData( likeAction ),
				        cache:       false,
				        contentType: false,
				        processData: false,
				        success:     function( result ){
					        if( result.data ){
						        likeBox.empty();
						        likeBox.append( result.data );
						        $( '.spinner-box' ).attr( 'id', 'spinner' );
					        }
				        },
			        } );
		} );
	}

	/**
	 * @memberOf Utility
	 * @access private
	 * @desc Get form data.
	 * @param {jQuery} form - Form
	 * @return {Array|Object} Form data
	 */
	function getFormData( form ){
		return form.attr( 'method' ) === 'GET'
		       ? form.serialize()
		       : new FormData( form.get( 0 ) );
	}

	return {
		initialize: initialize,
	};

})( jQuery );