var elixir = require('laravel-elixir');

var bowerDir = './resources/assets/vendor/';

var lessPaths = [
    bowerDir + "bootstrap/less",
    bowerDir + "font-awesome/less",
    bowerDir + "bootstrap-select/less"
];

elixir(function(mix) {
    mix.less('app.less', 'public/assets/css', { paths: lessPaths })
        .scripts([
            'jquery/dist/jquery.min.js',
            'bootstrap/dist/js/bootstrap.min.js',
            'bootstrap-select/dist/js/bootstrap-select.min.js'
        ], 'public/assets/js/vendor.js', bowerDir)
        .copy('resources/assets/js/app.js', 'public/assets/js/app.js')
        .copy(bowerDir + 'font-awesome/fonts', 'public/assets/fonts');

});