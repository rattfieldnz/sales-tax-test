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
mix.copy('node_modules/jquery/dist/jquery.js', 'public/js/vendor/jquery/jquery.js');
mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.js', 'public/js/vendor/bootstrap/bootstrap.js');
mix.copy('node_modules/select2/dist/js/select2.js', 'public/js/vendor/select2/select2.js');
mix.copy('node_modules/icheck/icheck.js', 'public/js/vendor/icheck/icheck.js');
mix.copy('node_modules/admin-lte/dist/js/app.js', 'public/js/vendor/admin-lte/app.js');

mix.scripts([
    'public/js/vendor/jquery/jquery.js',
    'public/js/vendor/bootstrap/bootstrap.js',
    'public/js/vendor/select2/select2.js',
    'public/js/vendor/icheck/icheck.js',
    'public/js/vendor/admin-lte/app.js'
], 'public/js/vendor-combined.js').version();


mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
    .version();
