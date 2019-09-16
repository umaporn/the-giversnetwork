/** @namespace window */
/**
 * jQuery framework
 * @type {jQuery}
 */
window.$ = window.jQuery = require( 'jquery' );

/** Load Foundation framework. */
require( 'foundation-sites/dist/js/foundation.min' );

/** Load TinyMCE library */
require( 'tinymce' );

/** Load Fancybox library */
require( '@fancyapps/fancybox' );

/** Initialize Foundation framework. */
$( document ).foundation();

/**
 * JavaScript translator library
 * @type {Object}
 */
window.JSTranslate = require( 'js-translate' );
window.Swiper    = require( 'swiper/dist/js/swiper' );
window.Multifile = require( 'jquery-multifile' );
