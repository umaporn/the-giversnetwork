/**
 * @namespace
 * @desc Handles form management.
 */
const Form = (function(){
	const /**
	       * @memberOf Form
	       * @access private
	       * @desc Submission form
	       * @const {jQuery}
	       */
	      SubmissionForm               = $( '.submission-form' ),
	      /**
	       * @memberOf Form
	       * @access private
	       * @desc reCAPTCHA form
	       * @const {jQuery}
	       */
	      RecaptchaForm                = $( '.recaptcha-form' ),
	      /**
	       * @memberOf Form
	       * @access private
	       * @desc Deletion confirmation selector
	       * @const {string}
	       */
	      DeletionConfirmationSelector = '.deletion';

	/**
	 * @memberOf Form
	 * @access public
	 * @desc Initialize Form module.
	 */
	function initialize(){
		SubmissionForm.submit( function( event ){
			event.preventDefault();
			Utility.submitForm( $( this ) );
		} );

		RecaptchaForm.submit( function( event ){
			event.preventDefault();

			_submitEvent = () => {
				Utility.submitForm( $( this ) );
			};
		} );

		Search.SearchForm.submit( function( event ){
			event.preventDefault();

			Search.submitForm( $( this ) );
		} );

		Search.ResultDiv.on( 'submit', DeletionConfirmationSelector, function( event ){
			event.preventDefault();
			Confirmation.confirmToDelete( $( this ), Search.SearchForm );
		} );

		$( '.checkbox-inter' ).click( function(){

			var interestID    = $( this ).data( 'value' ),
			    interestTitle = $( this ).data( 'title' );

			var stringInterested = '<li class="item-' + interestID + '">' + interestTitle + '</li>' +
			                       '<input type="hidden" ' +
			                       'name="fk_interest_in_id[]" ' +
			                       'id="fk_interest_in_id" ' +
			                       'class="input-' + interestID + '" ' +
			                       'value="' + interestID + '">';

			if( !$( this ).parent().hasClass( 'form-checkbox-ed' ) ){
				$( '#interest-list' ).append( stringInterested );
			} else {
				$( 'li' ).remove( '.item-' + interestID );
				$( 'input' ).remove( '.input-' + interestID );
			}

			$( this ).parent().toggleClass( 'form-checkbox-ed' );
		} );

		$( '#file-image' ).MultiFile( {
			                              max:    1,
			                              accept: 'jpg|png|gif',
		                              } );

		$( '#file-image-multi' ).MultiFile( {
			                                    max:    10,
			                                    accept: 'jpg|png|gif',
		                                    } );

		$( '#file-pdf' ).MultiFile( {
			                            max:    1,
			                            accept: 'pdf',
		                            } );

		$( '.toggle-password' ).click( function(){

			$( this ).text( $( this ).text() === 'show' ? 'hide' : 'show' );
			var input = $( $( this ).attr( 'toggle' ) );
			if( input.attr( 'type' ) === 'password' ){
				input.attr( 'type', 'text' );
			} else {
				input.attr( 'type', 'password' );
			}

		} );

		$( 'input[type=file]' ).change( function(){
			$( '#filename' ).val( $( this ).val() );
		} );

		$( '.toggle-password' ).click( function(){
			$( this ).text( $( this ).text() === 'show' ? 'hide' : 'show' );
			var input = $( $( this ).attr( 'toggle' ) );
			if( input.attr( 'type' ) === 'password' ){
				input.attr( 'type', 'text' );
			} else {
				input.attr( 'type', 'password' );
			}
		} );
	}

	return {
		initialize: initialize,
	};

})( jQuery );
