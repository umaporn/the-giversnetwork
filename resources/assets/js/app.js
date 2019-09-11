/** @namespace window */
/**
 * jQuery framework
 * @type {jQuery}
 */
window.$ = window.jQuery = require( 'jquery' );

/** Load Foundation framework. */
require( 'foundation-sites/dist/js/foundation.min' );

/** Initialize Foundation framework. */
$( document ).foundation();


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


/**
 * JavaScript translator library
 * @type {Object}
 */
window.JSTranslate = require( 'js-translate' );
window.Swiper = require( 'swiper/dist/js/swiper' );
window.Multifile = require( 'jquery-multifile' );
require( '@fancyapps/fancybox' );