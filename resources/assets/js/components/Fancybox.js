/**
 * @namespace
 * @desc Handles fancybox management.
 */

const Fancybox = (function() {
	/**
	 * @memberOf Fancybox
	 * @access public
	 * @desc Initialize Fancybox module.
	 * @constant {Object}
	 */

	function initialize() {

		'use strict';
		$("[data-fancybox]").fancybox({
			                              loop: true,
			                              protect: true,
			                              buttons: [
				                              "slideShow",
				                              "zoom",
				                              "close",
			                              ],

		                              });
		$(".map-click").fancybox({
			                         buttons: [
				                         "download",
				                         "zoom",
				                         "close",
			                         ],
		                         });
	}

	return {
		initialize: initialize
	};
})(jQuery);
