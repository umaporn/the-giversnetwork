/**
 * @namespace
 * @desc Handles comment action.
 */

const Comment = (function(){

	const /**
	       * @memberOf Form
	       * @access private
	       * @desc Comment form
	       * @const {jQuery}
	       */
	      CommentForm = $( '.comment-form' );

	/**
	 * @memberOf Comment
	 * @access public
	 * @desc Initialize Comment module.
	 * @constant {Object}
	 */
	function initialize(){

		CommentForm.submit( function( event ){

			event.preventDefault();
			Utility.clearErrors();

			let commentBox = $( '#show-comment-box' );

			$.ajax( {
				        url:         $( this ).attr( 'action' ),
				        method:      $( this ).attr( 'method' ),
				        data:        getFormData( $( this ) ),
				        cache:       false,
				        contentType: false,
				        processData: false,
				        success:     function( result ){

					        if( result.data ){
						        commentBox.empty();
						        commentBox.append( result.data );
					        }

					        $('#comment_text').val('');
				        },
				        error:       function( jqXHR ){
					        Utility.takeSubmitAction( $( this ), jqXHR );
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