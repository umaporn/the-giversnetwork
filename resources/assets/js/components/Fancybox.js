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

		//stickybar
		$('.head-box').on('sticky.zf.stuckto:top', function () {
			$(this).addClass('head-box-size');
		}).on('sticky.zf.unstuckfrom:top', function () {
			$(this).removeClass('head-box-size');
		});

		//nav
		$('.nav-mobile-click').on('toggled.zf.responsiveToggle', function () {
			$(this).toggleClass('nav-mobile-bg');
			$('.head-show, .nav-mobile-click').addClass('nav-animation');


		});

		$('.content-all,.head-show').click(function () {
			if (Foundation.MediaQuery.atLeast('xlarge')) {} else {
				$(".head-show").css("display", "none");
			}
		});

		$('.social-click').on('click', function () {
			$('.social-click-sub').toggle();
		});

	}

	return {
		initialize: initialize
	};
})(jQuery);
