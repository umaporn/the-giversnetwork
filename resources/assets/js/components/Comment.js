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
				        },
				        error:       function( jqXHR ){
					        runCallbackFunction( form, jqXHR, callbackFunction );
				        },
			        } );
		} );
	}

	/**
	 * @memberOf Utility
	 * @access private
	 * @desc Run a callback function.
	 * @param {jQuery} form - Form
	 * @param {XMLHttpRequest} jqXHR - jQuery XMLHttpRequest object
	 * @param {function} [callbackFunction] - Callback function
	 */
	function runCallbackFunction( form, jqXHR, callbackFunction ){
		if( typeof callbackFunction === 'function' ){
			callbackFunction.apply( this, [form, jqXHR, result] );
		} else {
			Utility.takeSubmitAction( form, jqXHR );
		}
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