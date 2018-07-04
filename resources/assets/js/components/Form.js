/**
 * @namespace
 * @desc Handles form management.
 */
const Form = (function(){

    const
        /**
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

            _submitEvent = () =>{

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

    }

    return {
        initialize: initialize,
    };

})( jQuery );