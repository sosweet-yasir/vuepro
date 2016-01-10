var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass([
        "app.scss",
        "bootstrap.min.scss"
    ], "public/assets/css");

    mix.scripts([
        'vue.js',
        'jquery.js',
        'bootstrap.min.js'

    ], 'public/js/app.js')

});


