var Search = ( function(){

    /**
     * Initialize Search module.
     *
     * @access    public
     *
     * @return    {void}
     */
    var initialize = function(){

        $('#search-form').submit( function( event ){
            event.preventDefault();

            if( $('p.relation') ){
                $('p.relation').hide();
            }

            search( $(this).attr('action'), $(this).serialize() );
        });



    };

    /**
     * Search, sort, and make pagination for data.
     *
     * @access    public
     *
     * @param     {String}    url         URL
     * @param     {String}    data        Serialized data
     * @param     {Object}    scrollTo    Element to scroll to, offset amount and transition speed
     * @return    {void}
     */
    var search = function( url, data, scrollTo ){
        
        $.ajax({
            url: url,
            method: 'GET',
            data: data,
            dataType: 'JSON',
            success: function( result ){
                $('#data').html( result.data );
                $('#data-footer').html( result.footer );
            },
            error: function( xhr, statusText ){
                xhr.statusText = statusText;
                //Utility.handleError( xhr, url );
            },
            complete: function(){
                if( scrollTo ) {
                    $( 'html, body' ).animate({
                        scrollTop: scrollTo.element.offset().top - scrollTo.offset
                    }, scrollTo.speed );
                }
            }
        });
    };

    return {
        init: initialize,
        search: search,
    };

})(jQuery);
