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
	      DeletionConfirmationSelector = '.deletion',

	      /**
	       * @memberOf Form
	       * @access private
	       * @desc TinyMCE form
	       * @const {jQuery}
	       */
	      TinyMCEForm               = $( '.tinyMCE-form' );

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

		TinyMCEForm.submit( function( event ){
			tinyMCE.triggerSave();
			event.preventDefault();
			Utility.submitForm( $( this ) );
		} );

		Search.SearchForm.submit( function( event ){
			event.preventDefault();
			Search.submitForm( $( this ) );
		} );

		Search.ResultDiv.on( 'submit', DeletionConfirmationSelector, function( event ){
			event.preventDefault();
			Confirmation.confirmToDelete( $( this ), Search.SearchForm );
		} );

		$( '.deletion' ).submit( function( event ){
			event.preventDefault();
			Confirmation.confirmToDelete( $( this ), Search.SearchForm );
		} );

		$( '#file-image' ).MultiFile( {
			                              max:    1,
			                              accept: 'jpg|png|gif',
		                              } );

		$( '#image_path' ).MultiFile( {
			                              max:    10,
			                              accept: 'jpg|png|gif',
		                              } );

		$( '#file_path' ).MultiFile( {
			                             max:    1,
			                             accept: 'pdf',
		                             } );

		$( '.toggle-password' ).click( function(){
			$( this ).text( $( this ).text() === 'show' ? 'hide' : 'show' );
			var input = $( 'input[class=\'form-fill password\']' );

			if( input.attr( 'type' ) === 'password' ){
				input.attr( 'type', 'text' );
			} else {
				input.attr( 'type', 'password' );
			}
		} );

		$( '.toggle-use-address' ).change( function(){

			var address = $( '#address' );

			if( $( this ).prop( 'checked' ) ){
				address.attr( 'disabled', true );
			} else {
				address.removeAttr( 'disabled' );
			}
		} );

		var text_max = 200;
		$( '#count_message' ).html( text_max + ' remaining' );

		$( '#content_english' ).keyup( function(){
			var text_length    = $( '#content_english' ).val().length;
			var text_remaining = text_max - text_length;

			$( '#count_message' ).html( text_remaining + ' remaining' );
		} );
	}

	return {
		initialize: initialize,
	};

})( jQuery );
