const mix = require('laravel-mix');
const LiveReloadPlugin = require('webpack-livereload-plugin');

require('dotenv').config();
require('laravel-mix-polyfill');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

const theme = process.env.WP_THEME;

mix.setResourceRoot('../')
   .setPublicPath(`public/themes/${theme}/assets`)
   .options({
       processCssUrls: false
   });

mix.ts('resources/scripts/app.ts', 'scripts/script.js')
   .sass('resources/admin/login.scss', 'admin')
   .sass('resources/admin/admin.scss', 'admin')
   .sass('resources/admin/editor.scss', 'admin')
   .sass('resources/styles/_vendor.scss', 'styles')
   .sass('resources/styles/style.scss', 'styles')
   .webpackConfig({
        plugins: [
            new LiveReloadPlugin()
        ]
    })
    .polyfill({
        enabled: true,
        useBuiltIns: "usage",
        targets: {"firefox": "50", "ie": 11}
    })
   .version();
