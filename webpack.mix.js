const mix = require( 'laravel-mix' );

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js( 'resources/assets/js/app.js', 'public/js' )
   .sass( 'resources/assets/sass/app.scss', 'public/css' )
   .sass( 'resources/assets/sass/app_registration.scss', 'public/css' )
   .copy('node_modules/tinymce/plugins','public/js/plugins')
   .copy('node_modules/tinymce/skins','public/js/skins')
   .copy('node_modules/tinymce/themes','public/js/themes')
   .babel( [
	           'resources/assets/js/components/HeroBanner.js',
	           'resources/assets/js/components/Confirmation.js',
	           'resources/assets/js/components/Form.js',
	           'resources/assets/js/components/Slide.js',
	           'resources/assets/js/components/Menu.js',
	           'resources/assets/js/components/Search.js',
	           'resources/assets/js/components/Translator.js',
	           'resources/assets/js/components/Utility.js',
	           'resources/assets/js/components/GiveTab.js',
	           'resources/assets/js/components/LoadMore.js',
	           'resources/assets/js/components/InterestIn.js',
	           'resources/assets/js/components/Like.js',
	           'resources/assets/js/components/Comment.js',
	           'resources/assets/js/components/Counter.js',
	           'resources/assets/js/components/TinyMCE.js',
	           'resources/assets/js/components/Fancybox.js',
	           'resources/assets/js/components/Video.js',
	           'resources/assets/js/all.js',
           ], 'public/js/all.js' )
   .version();
