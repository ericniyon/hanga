const mix = require('laravel-mix');
const newMix = require('laravel-mix');
require('laravel-mix-purgecss');


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

mix.js('resources/js/app.js', 'public/frontend/js')
    .sass('resources/sass/app.scss', 'public/frontend/css')
    .sourceMaps(!mix.inProduction())
    .purgeCss({
        // content: [path.join(__dirname, 'vendor/spatie/menu/**/*.php')],
        safelist: {
            deep: [
                /^modal/, /^ps/, /^owl/, /^pika/, /^is/,
                /^ki/,
                /^select2/,
                /^flatpickr/,
                /^arrow/,
                /^num/,
                /^multiselect/,
                /^slideIn/,
                /^show/,
                /^fade/,
                /^collapse/,
                /^collapsed/,
            ]
        },
    });
//dsp
mix.js('resources/js/dsp.js', 'public/frontend/js')
    .sourceMaps();
mix.js('resources/js/msme.js', 'public/frontend/js')
    .sourceMaps();
mix.js('resources/js/iworker.js', 'public/frontend/js')
    .sourceMaps();

mix.postCss("resources/css/tailwind.css", "public/frontend/css", [
    require("tailwindcss"),
]);


if (mix.inProduction()) {
    mix.version();
}

mix.browserSync('http://127.0.0.1:8001');
