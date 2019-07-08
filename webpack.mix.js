let mix = require('laravel-mix');
let webpack = require('webpack'); // Summernote FIX

mix.autoload({
    jquery: ['$', 'window.jQuery','jQuery','window.$','jquery','window.jquery'],
});

// Summernote FIX
mix.webpackConfig({
    plugins: [
        new webpack.IgnorePlugin(/^codemirror$/)
    ]
});

mix.js([
    'src/resources/assets/js/jquery-3.1.1.min.js',
    'src/resources/assets/js/popper.min.js',
    'src/resources/assets/js/bootstrap.js',
    'src/resources/assets/js/inspinia.js',
    'src/resources/assets/js/plugins/metisMenu/jquery.metisMenu.js',
    'src/resources/assets/js/plugins/slimscroll/jquery.slimscroll.min.js',
    'src/resources/assets/js/plugins/pace/pace.min.js',
    'src/resources/assets/js/plugins/iCheck/icheck.min.js',
    'src/resources/assets/js/plugins/bootstrapTour/bootstrap-tour.min.js',
    'src/resources/assets/js/plugins/summernote/summernote-bs4.js',
    // 'src/resources/assets/js/plugins/dataTables/datatables.min.js',
    // 'src/resources/assets/js/plugins/dataTables/dataTables.bootstrap4.min.js',
    // 'src/resources/assets/js/app.js',
    ], 'src/public/js/inspinia-theme.js').sourceMaps()
   .styles([  
    'src/resources/assets/css/animate.css',
    'src/resources/assets/css/bootstrap.min.css',
    'src/resources/assets/css/style.css',
    'src/resources/assets/font-awesome/css/font-awesome.css',
    'src/resources/assets/css/plugins/css/plugins/bootstrapTour/bootstrap-tour.min.css',
    ], 'src/public/css/inspinia-theme.css')
    .combine('src/resources/assets/css/plugins', 'src/public/css/inspinia-theme-plugins.css')
    .combine('src/resources/assets/js/plugins', 'src/public/js/inspinia-theme-plugins.js')
    .copy('src/resources/assets/font-awesome/fonts/*', 'src/public/fonts')
    .copy('src/resources/assets/css/patterns/*', 'src/public/css/patterns')
