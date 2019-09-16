/**
 * @namespace
 * @desc Handles hero banner management.
 */

const HeroBanner = (function() {
  /**
   * @memberOf HeroBanner
   * @access public
   * @desc Initialize HeroBanner module.
   * @constant {Object}
   */

  function initialize() {
    new Swiper(".swiper-container", {
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
    });
  }

  return {
    initialize: initialize
  };
})(jQuery);
