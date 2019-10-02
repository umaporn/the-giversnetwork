/**
 * @namespace
 * @desc Handles tinyMCE textarea.
 */

const TinyMCE = (function(){

	const generalSelectors = '#content-tinymce-english, #content-tinymce-thai, #description-tinymce-english, #description-tinymce-thai',
	      newsSelectors    = '#tinymce-news-content-english, #tinymce-news-content-thai, #tinymce-news-content-chinese',
	      generalToolbar   = 'undo redo | styleselect | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist | link image table | code preview save',
	      newsToolbar      = generalToolbar.replace( 'save', '' ),
	      generalPlugins   = 'advlist autolink lists link image preview anchor media table contextmenu paste code textcolor colorpicker save';

	/** @const {String} Upload form selector */
	const UPLOAD_FORM = '#tinymce-uploadform',
	      /** @const {String} Upload file selector */
	      UPLOAD_FILE = '#tinymce-uploadfile';

	function initialize(){

		if( $( generalSelectors ).length ){
			tinyMCE.init( {
				              selector:                    generalSelectors,
				              height:                      500,
				              menubar:                     true,
				              relative_urls:               false,
				              plugins:                     [generalPlugins],
				              file_browser_callback_types: 'image',
				              toolbar:                     generalToolbar,
				              file_picker_callback:        filePickerCallback,
				              save_onsavecallback:         saveContent,
			              } );
		}

	}

	/**
	 * Save content.
	 *
	 * @access    private
	 *
	 * @param     {Object}    value   Current value of the affected field
	 * @return    {void}
	 */
	function saveContent( value ){

		var form = $( '#' + value.id ).closest( 'form' ),
		    url  = form.attr( 'action' );

		$.ajax( {
			        url:      url,
			        method:   'POST',
			        data:     form.serialize(),
			        dataType: 'json',
			        success:  function( result, statusText, xhr ){
				        if( result.success ){
					        Utility.displaySuccessMessageBox( Translator.translate( 'tinymce.success_update' ) );
				        } else {
					        displayErrors( xhr, value.id );
				        }
			        },
			        error:    function( xhr ){
				        displayErrors( xhr, value.id );
			        },
		        } );
	}

	/**
	 * File picker callback function
	 *
	 * @access    private
	 *
	 * @param     {Function}    callback    Callback function
	 * @param     {Object}      value       Current value of the affected field
	 * @param     {Object}      meta        Metadata
	 * @return    {void}
	 */
	function filePickerCallback( callback, value, meta ){

		// Reset file input value to address repeat upload attempt of same file
		$( UPLOAD_FILE ).val( '' );

		if( meta.filetype === 'image' ){

			$( UPLOAD_FILE ).off();

			$( UPLOAD_FILE ).change( function( event ){
				submitUploadForm( event, callback );
			} );

			$( UPLOAD_FILE ).click();
		}
	}

	/**
	 * Display errors.
	 *
	 * @access    private
	 *
	 * @param     {jqXHR}    xhr          jqXHR object
	 * @param     {Number}   contentID    Content ID
	 * @return    {void}
	 */
	function displayErrors( xhr, contentID ){

		Utility.displayErrorMessageBox( Translator.translate( 'tinymce.error_message' ) );

		reloadContent( contentID );
	}

	/**
	 * Reload old content when save unsuccessfully.
	 *
	 * @access    private
	 *
	 * @param     {String}    id    Tinymce id.
	 * @return    {void}
	 */
	function reloadContent( id ){

		var currentContent = $( '#' + id ).closest( 'form' ).find( 'input[name="current_content"]' ).val();

		tinymce.get( id ).setContent( currentContent );
	}

	/**
	 * Submit file upload form and attempt to save file into storage.
	 *
	 * @access    private
	 *
	 * @param     {Event}       event       Event
	 * @param     {Function}    callback    Callback function
	 * @return    {void}
	 */
	function submitUploadForm( event, callback ){

		$( UPLOAD_FORM ).off();

		$( UPLOAD_FORM ).submit( function( event ){

			event.preventDefault();

			var formUrl      = $( this ).attr( 'action' ),
			    formElement  = document.querySelector( UPLOAD_FORM ),
			    formData     = new FormData( formElement ),
			    errorMessage = Translator.translate( 'tinymce.uploading_file_failure' );

			$.each( event.target.files, function( i, file ){
				formData.append( 'image', file );
			} );

			$.ajax( {
				        method:      'POST',
				        url:         formUrl,
				        data:        formData,
				        cache:       false,
				        contentType: false,
				        processData: false,
				        success:     function( response, statusText, xhr ){
					        if( response.success === true ){
						        callback( response.path );
					        } else {
					        	Utility.displayErrorMessageBox(errorMessage)
						        //tinymce.activeEditor.windowManager.alert( errorMessage );
					        }
				        },
				        error:       function(){
					        Utility.displayErrorMessageBox(errorMessage)
					        //tinymce.activeEditor.windowManager.alert( errorMessage );
				        },
			        } );
		} );

		$( UPLOAD_FORM ).submit();
	}

	return {
		initialize: initialize,
	};
})( jQuery );