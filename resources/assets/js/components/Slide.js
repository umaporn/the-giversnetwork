/**
 * @namespace
 * @desc Handles slide management.
 */
const Slide = (function(){
	/**
	 * @memberOf Slide
	 * @access public
	 * @desc Initialize Slide module.
	 * @constant {Object}
	 */
	function initialize(){
		if( $( '.slide-thumb, .slide-thumb-give' ).length ){
			var galleryTop                   = new Swiper( '.gallery-top', {
				spaceBetween: 10,
				navigation:   {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
				loop:         true,
				loopedSlides: 4,
			} );
			var galleryThumbs                = new Swiper( '.gallery-thumbs', {
				spaceBetween:        10,
				centeredSlides:      true,
				slidesPerView:       'auto',
				touchRatio:          0.2,
				slideToClickedSlide: true,
				loop:                true,
				loopedSlides:        4,
			} );
			galleryTop.controller.control    = galleryThumbs;
			galleryThumbs.controller.control = galleryTop;
		}
	}

	return {
		initialize: initialize,
	};
})( jQuery );
