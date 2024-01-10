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
<<<<<<< HEAD
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
=======
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1
