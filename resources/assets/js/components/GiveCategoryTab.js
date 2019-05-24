/**
 * @namespace
 * @desc Handles give category tab.
 */

const GiveCategoryTab = (function(){
	/**
	 * @memberOf GiveCategoryTab
	 * @access public
	 * @desc Initialize GiveCategoryTab module.
	 * @constant {Object}
	 */
	function initialize(){

		$( '#give-category > a' ).click( function(){
			var url =  $( this ).attr( "data-url" );

			$.ajax( {
				        url:         url,
				        method:      'GET',
				        cache:       false,
				        contentType: false,
				        processData: false,
				        beforeSend: function() {
					        $('#spinner').show();
				        },
				        complete: function(){
					        $('#spinner').hide();
				        },
				        success:     function( result ){
					        $('#give-category-box').html(result);
				        },
				        error:       function( jqXHR ){
					        //runCallbackFunction( form, jqXHR, callbackFunction );
				        },
			        } );

		} );

	}

	return {
		initialize: initialize,
	};

})( jQuery );