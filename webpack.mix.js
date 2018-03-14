let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css').options({ resourceRoot: '../' });

mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery']
});

if (process.env.NODE_ENV != 'testing') {
    mix.extract(['jquery', 'bootstrap', 'lodash', 'vue']);
    mix.version();
}

if (process.env.NODE_ENV == 'development') {
    mix.sourceMaps();
}
