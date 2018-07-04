/**
 * @namespace
 * @desc Handles search form management.
 */
const Search = (function(){

    const
        /**
         * @memberOf Search
         * @access public
         * @desc div element to display a search result
         * @constant {jQuery}
         */
        ResultDiv  = $( '#search-result' ),
        /**
         * @memberOf Search
         * @access public
         * @desc Search form
         * @const {jQuery}
         */
        SearchForm = $( '#search-form' );

    /**
     * @memberOf Search
     * @access public
     * @desc Submit a search form.
     * @param {jQuery} form - Search form
     */
    function submitForm( form ){

        ResultDiv.removeClass( 'alert' );

        Utility.submitForm( form, function( form, jqXHR ){

            Utility.clearErrors();

            switch( jqXHR.status ){
                case 422:
                    Utility.displayInvalidInputs( jqXHR.responseJSON );
                    ResultDiv.html( '' );
                    break;
                case 200:
                    ResultDiv.html( jqXHR.responseText );
                    break;
                default:
                    let message = jqXHR.statusText;

                    if( jqXHR.hasOwnProperty( 'responseJSON' ) && jqXHR.responseJSON.hasOwnProperty( 'message' ) ){
                        message = jqXHR.responseJSON.message;
                    }

                    ResultDiv.html( Translator.translate( 'utility.result.error' ) + ' ' + message )
                             .addClass( 'alert' );
                    break;
            }

        } );

    }

    /**
     * @memberOf Search
     * @access private
     * @desc Bind pagination.
     */
    function bindPagination(){

        ResultDiv.on( 'click', '.pagination a', function( event ){

            event.preventDefault();

            let form = document.createElement( 'form' );
            form.setAttribute( 'method', 'GET' );
            form.setAttribute( 'action', $( this ).attr( 'href' ) );

            submitForm( $( form ) );

        } );

    }

    /**
     * @memberOf Search
     * @access public
     * @desc Initialize search module.
     */
    function initialize(){

        bindPagination();

    }

    return {
        ResultDiv:  ResultDiv,
        SearchForm: SearchForm,
        initialize: initialize,
        submitForm: submitForm,
    };
})( jQuery );