/**
 * @namespace
 * @desc Handles form management.
 */
const Form = (function(){

    /**
     * @memberOf Form
     * @access private
     * @desc Submission form
     * @const {jQuery}
     */
    const SubmissionForm = $( '.submission-form' );

    /**
     * @memberOf Form
     * @access public
     * @desc Initialize forms module.
     */
    function initialize(){

        SubmissionForm.submit( function( event ){

            event.preventDefault();

            Utility.submitForm( $( this ) );

        } );

        Search.SearchForm.submit( function( event ){

            event.preventDefault();

            Search.submitForm( $( this ) );

        } );

        Search.ResultDiv.on( 'submit', '.deletion', function( event ){

            event.preventDefault();

            Confirmation.confirmToDelete( $( this ), Search.SearchForm );

        } );

    }

    return {
        initialize: initialize,
    };

})( jQuery );