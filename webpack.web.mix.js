//  Importar Laravel-Mix
const mix = require('laravel-mix');
require('mix-env-file');

//  Importar esta libreria que permitirá fusionar estos ajustes de webpack con otros
require('laravel-mix-merge-manifest');

mix
  .sass('resources/assets/sass/web/app.scss', 'public/css/web.css')
  .sass('resources/assets/sass/web/vendor.scss', 'public/css/vendor.css')

  .js('resources/assets/js/web/app.js', 'public/js/web')
  .js('resources/assets/js/web/inicio.js', 'public/js/web')
  .js('resources/assets/js/web/contacto.js', 'public/js/web')
  .js('resources/assets/js/web/servicios.js', 'public/js/web')
  .js('resources/assets/js/web/seguros.js', 'public/js/web')
  
  .extract([
    'jquery',
    'bootstrap',
    '@fortawesome/fontawesome-free',
    'sweetalert2',
    'jquery-validation',
    'axios',
    'moment',
    'smartwizard',
    'imask',
    'bs-custom-file-input',
    'load-google-maps-api',
    'aos',
    'owl.carousel',
  ])
  .mergeManifest()
  .autoload({
    jquery: ['$', 'window.jQuery', 'jQuery', 'window.$'],
  })
  .sourceMaps();
