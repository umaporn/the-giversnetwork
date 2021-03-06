/**
 * @namespace
 * @desc Handles interest in checklist.
 */

const InterestIn = (function(){

	/**
	 * @memberOf InterestIn
	 * @access public
	 * @desc Initialize InterestIn module.
	 * @constant {Object}
	 */
	function initialize(){

		$( '.checkbox-inter' ).click( function(){

			let interestID    = $( this ).data( 'value' ),
			    interestTitle = $( this ).data( 'title' );

			let stringInterested = '<li class="item-' + interestID + '">' + interestTitle + '</li>' +
			                       '<input type="hidden" ' +
			                       'name="fk_interest_in_id[]" ' +
			                       'id="fk_interest_in_id" ' +
			                       'class="input-' + interestID + '" ' +
			                       'value="' + interestID + '">';

			if( !$( this ).parent().hasClass( 'form-checkbox-ed' ) ){
				$( '#interest-list' ).append( stringInterested );
			} else {
				$( 'li' ).remove( '.item-' + interestID );
				$( 'input' ).remove( '.input-' + interestID );
			}

			$( this ).parent().toggleClass( 'form-checkbox-ed' );
		} );
	}

	return {
		initialize: initialize,
	};

})( jQuery );