/**
 * @namespace
 * @desc Handles all confirmation boxes.
 */
const Confirmation = (function(){

	const
		/**
		 * @memberOf Confirmation
		 * @access private
		 * @desc Confirmation box
		 * @constant {jQuery}
		 */
		ConfirmationBox  = $( '#confirmation-box' ),
		/**
		 * @memberOf Confirmation
		 * @access private
		 * @desc Confirmation text
		 * @constant {jQuery}
		 */
		ConfirmationText = $( '#confirmation-text' ),
		/**
		 * @memberOf Confirmation
		 * @access private
		 * @desc Acceptance button
		 * @constant {jQuery}
		 */
		AcceptanceButton = $( '#yes-answer' );

	/**
	 * @memberOf Confirmation
	 * @access public
	 * @desc Confirm to delete an object.
	 * @param {jQuery} deletionForm - Deletion form
	 * @param {jQuery} searchForm - Search form
	 */
	function confirmToDelete( deletionForm, searchForm ){

		AcceptanceButton.data( 'form-id', '#' + deletionForm.attr( 'id' ) );
		AcceptanceButton.data( 'callback-function', function( form, jqXHR ){

			switch( jqXHR.status ){
				case 422:
					Utility.displayErrorMessageBox( Object.values( jqXHR.responseJSON.errors ).join( '<br>' ) );
					break;
				case 200:
					if( jqXHR.hasOwnProperty( 'responseJSON' ) ){

						let result = jqXHR.responseJSON;

						if( result.success === true ){

							Utility.displaySuccessMessageBox( result.message );

							if( result.hasOwnProperty( 'message' ) ){
								$( '#result-box' ).on( 'closed.zf.reveal', function(){
									if( result.redirectedUrl ){
										location.href = result.redirectedUrl;
									} else {
										form.trigger( 'reset' );
									}
								} );
							}
							//searchForm.submit();

						} else {

							Utility.displayErrorMessageBox( result.message );

						}

					} else {
						Utility.displayJsonResponseError( jqXHR, form.attr( 'action' ) );
					}
					break;
				default:
					Utility.displayUnknownError( jqXHR, form.attr( 'action' ) );
					break;
			}

		} );

		ConfirmationText.html( deletionForm.data( 'deletion-confirmation-message' ) + deletionForm.data( 'info' ) + '?' );

		ConfirmationBox.foundation( 'open' );

	}

	/**
	 * @memberOf Confirmation
	 * @access public
	 * @desc Initialize Confirmation module.
	 */
	function initialize(){

		AcceptanceButton.click( function( event ){

			event.preventDefault();

			ConfirmationBox.foundation( 'close' );

			Utility.submitForm( $( AcceptanceButton.data( 'form-id' ) ), AcceptanceButton.data( 'callback-function' ) );

		} );

	}

	return {
		confirmToDelete: confirmToDelete,
		initialize:      initialize,
	};

})( jQuery );