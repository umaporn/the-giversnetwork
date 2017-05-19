/** @namespace window */
/**
 * jQuery framework
 * @type {jQuery}
 */
window.$ = window.jQuery = require( 'jquery' );

/** Load Foundation framework. */
require( 'foundation-sites' );

/** Initialize Foundation framework. */
$( document ).foundation();

/**
 * JavaScript translator library
 * @type {Object}
 */
window.JSTranslate = require( 'js-translate' );