/**
 * @namespace
 * @desc Handles counter action.
 */

const Counter = (function(){

	const /**
	       * @memberOf Form
	       * @access private
	       * @desc Counter title
	       * @const {jQuery}
	       */
	      CounterTitle           = $( 'input[id=title_english]' ),

	      /**
	       * @memberOf Form
	       * @access private
	       * @desc Counter title
	       * @const {jQuery}
	       */
	      CounterDescription     = $( '#content_english' ),

	      /**
	       * @memberOf Form
	       * @access private
	       * @desc Counter name
	       * @const {jQuery}
	       */
	      CounterName            = $( '#name' ),

	      /**
	       * @memberOf Form
	       * @access private
	       * @desc Counter description text
	       * @const {jQuery}
	       */
	      CounterDescriptionText = $( '#description_text' );

	/**
	 * @memberOf Comment
	 * @access public
	 * @desc Initialize Comment module.
	 * @constant {Object}
	 */
	function initialize(){

		if( CounterTitle.length ){
			var text_title_max = 90;
			$( '#count_title_english' ).html( text_title_max + ' remaining' );

			$( CounterTitle ).keyup( function(){
				var text_title_length    = CounterTitle.val().length;
				var text_title_remaining = text_title_max - text_title_length;

				$( '#count_title_english' ).html( text_title_remaining + ' remaining' );
			} );
		}

		if( CounterDescription.length ){
			var text_content_max = 5000;
			$( '#count_content_english' ).html( text_content_max + ' remaining' );

			$( CounterDescription ).keyup( function(){
				var text_content_length    = CounterDescription.val().length;
				var text_content_remaining = text_content_max - text_content_length;

				$( '#count_content_english' ).html( text_content_remaining + ' remaining' );
			} );
		}

		if( CounterName.length ){
			var text_name_max = 90;
			$( '#count_name' ).html( text_name_max + ' remaining' );

			$( CounterName ).keyup( function(){
				var text_name_length    = CounterName.val().length;
				var text_name_remaining = text_name_max - text_name_length;

				$( '#count_name' ).html( text_name_remaining + ' remaining' );
			} );
		}

		if( CounterDescriptionText.length ){
			var text_description_text_max = 200;
			$( '#count_description_text' ).html( text_description_text_max + ' remaining' );

			$( CounterDescriptionText ).keyup( function(){
				var text_description_text_length    = CounterDescriptionText.val().length;
				var text_description_text_remaining = text_description_text_max - text_description_text_length;

				$( '#count_description_text' ).html( text_description_text_remaining + ' remaining' );
			} );
		}
	}

	return {
		initialize: initialize,
	};

})( jQuery );