var Utility = ( function(){

    /**
     * Clear all errors.
     *
     * @access    private
     *
     * @return    {void}
     */
    var clearErrors = function(){
        $('.alert.help-text').addClass( 'hide' );
        $('.callout.error').addClass( 'hide' );
        $('input').removeClass( 'error' );
    };

    /**
     * Display invalid input.
     *
     * @access    public
     *
     * @param     {JSON}    error    Form error in JSON format
     * @return    void
     */
    var displayInvalidInput = function( error ){

        clearErrors();

        for( name in error ){
            $('input[name=' + name + ']').addClass( 'error' );
            $( '#' + name + '-help-text' ).text( error[name] ).removeClass( 'hide' );
        }
    };

    /**
     * Handle all error cases.
     *
     * @access    public
     *
     * @param     {Object}    xhr    jqXHR
     * @param     {String}    url    URL
     * @return    {void}
     */
    var handleError = function( xhr, url ){

        if( xhr.hasOwnProperty( 'responseJSON' ) ){
            Utility.displayInvalidInput( xhr.responseJSON );
        }else{
            clearErrors();

            errorText = '<h4>' + Translator.translate( 'utility.error' ) + '</h4>';
            errorText += '<h5>' + Translator.translate( 'utility.calling_system_administrator' ) + '</h5>';
            errorText += '<b>' + Translator.translate( 'utility.error_url' ) + '</b> ' + url + '<br>';
            errorText += '<b>' + Translator.translate( 'utility.error_status_code' ) + '</b> ' + xhr.status + '<br>';
            errorText += '<b>' + Translator.translate( 'utility.error_status_text' ) + '</b> ' + xhr.statusText + '<br>';

            displayErrorMessageBox( errorText );
        }
    };

    /**
     * Submit your form, display the result box, and then redirect to another page.
     *
     * @access    public
     *
     * @param     {Object}    args        Arguments
     * args.form              {DOM}       A submitted form
     * args.message           {String}    Response message
     * args.redirectedURL     {URL}       Redirected URL <optional>
     * @return {void}
     */
    var submitForm = function( args ){

        var form        = args['form'],
            url         = form.attr('action'),
            method      = form.attr('method'),
            selector    = form.attr( 'id' ) ? '#'+form.attr( 'id' ) : '.'+form.attr( 'class' ),

            formElement = document.querySelector( selector ),
            formData    = new FormData( formElement );

        $.ajax({
            url: url,
            method: method,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function( result, statusText, xhr ){
                if( result.success === true ){
                    clearErrors();
                    $('#result').on( 'closed.zf.reveal', function(){
                        if( args['redirectedURL'] ){
                            location.href = args['redirectedURL'];
                        }else{
                            form.get(0).reset();
                            form.find('select').change();
                        }
                    });
                    displaySuccessMessageBox( args['message'] );
                }else{
                    if( result.error !== undefined && Object.keys(result.error).length ){

                        var errorMessage = '';

                        $.each( result.error, function( index, value ){
                            errorMessage += value + '<br>';
                        });

                        displayErrorMessageBox( errorMessage );

                    }else{
                        handleError( xhr, url );
                    }
                }
            },
            error: function( xhr, statusText ){
                xhr.statusText = statusText;
                handleError( xhr, url );
            },
        });
    };

    /**
     * Add date and time picker into a specific selector.
     *
     * @access    public
     *
     * @param    {String}    selector    HTML selector
     */
    var addDateTimePicker = function( selector ){

        $(selector).datetimepicker({
            timepicker: false,
            format: 'Y-m-d',
            minDate: new Date()
        });

    };

    /**
     * Display success message box.
     *
     * @access    public
     *
     * @param     {String}    successMessage    Success message
     * @return    {void}
     */
    var displaySuccessMessageBox = function( successMessage ){

        $('#result-text').html( successMessage );

        if( $('#result-text').hasClass('alert') ){
            $('#result-text').removeClass('alert');
        }

        $('#result').foundation('open');
    };

    /**
     * Display error message box.
     *
     * @access    public
     *
     * @param     {String}    errorMessage    Error message
     * @return    {void}
     */
    var displayErrorMessageBox = function( errorMessage ){

        $('#result-text').html( errorMessage );

        if( !$('#result-text').hasClass('alert') ){
            $('#result-text').addClass('alert');
        }

        $('#result').foundation('open');
    };

    return {
        submitForm: submitForm,
        displayInvalidInput: displayInvalidInput,
        handleError: handleError,
        addDateTimePicker: addDateTimePicker,
        displaySuccessMessageBox: displaySuccessMessageBox,
        displayErrorMessageBox: displayErrorMessageBox,
    };
})(jQuery);
