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
    .js('resources/assets/js/contact.js', 'public/js')
    .js('resources/assets/js/admin/menu.js', 'public/adm/js')
    .js('resources/assets/js/admin/blog/add.js', 'public/adm/js/blog')
    .js('resources/assets/js/admin/contact.js', 'public/adm/js')
    .sass('resources/assets/sass/style.scss', 'public/css')
    .version();
