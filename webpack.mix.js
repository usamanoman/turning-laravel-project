const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
    	'public/css/vendor/bootstrap.min.css', 
    	'public/css/flat-ui.css',
        'public/css/fontawesome.css',
    	// 'public/css/style.css'
    ], 'public/css/all.css')
    .scripts([
    	'public/js/flat-ui.js',
        'public/js/fontawesome.js',
        // 'public/js/jquery-ui.js',
    ], 'public/js/all.js');
