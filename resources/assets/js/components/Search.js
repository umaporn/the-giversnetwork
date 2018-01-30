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

        $.ajax( {
                    url:         form.attr( 'action' ),
                    method:      form.attr( 'method' ),
                    data:        Utility.getFormData( form ),
                    cache:       false,
                    contentType: false,
                    processData: false,
                    dataType:    'html',
                    success:     function( result ){
                        Utility.clearErrors();
                        ResultDiv.html( result );
                    },
                    error:       function( jqXHR, statusText, errorThrown ){

                        if( jqXHR.status === 422 ){
                            Utility.displayInvalidInputs( JSON.parse( jqXHR.responseText ) );
                            ResultDiv.html( '' );
                        } else {
                            ResultDiv.html( Translator.translate( 'utility.result.error' ) + ' ' + errorThrown )
                                     .addClass( 'alert' );
                        }

                    },
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
