const mix = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix
  .sass('resources/assets/sass/intranet/app.scss', 'public/css/intranet.css')
  .js('resources/assets/js/intranet/app.js', 'public/js/intranet')
  .extract([
    'jquery',
    '@fortawesome/fontawesome-free',
    'admin-lte',
    'jquery-validation',
    'bootstrap-table',
    'axios',
    "moment",
    'sweetalert2',
  ])
  .mergeManifest()
  .autoload({
    jquery: ['$', 'window.jQuery', 'jQuery', 'window.$'],
  });
