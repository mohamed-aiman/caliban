const mix = require('laravel-mix');

// set js home directory
mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      '@': __dirname + '/resources/js'
    },
  },
})

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
        require('autoprefixer')
    ])
    .js('resources/js/vue-editor.js', 'public/js').vue(3)
    .js('resources/js/spa.js', 'public/js').vue(3)
    .js('resources/js/spa-dashboard.js', 'public/js').vue(3)
    .js('resources/js/listing-create-page.js', 'public/js')
    .js('resources/js/listing-edit-page.js', 'public/js')
    .vue(3)
    .version();
