const mix = require('laravel-mix');

require('laravel-mix-tailwind');
require('laravel-mix-purgecss');

mix.webpackConfig({
  resolve: {
    extensions: ['.js', '.vue', '.json'],
    alias: {
      '@': __dirname + '/resources/js'
    },
  },
});

mix.js('resources/js/app.js', 'public/js')
  .js('resources/js/prism.js', 'public/js/prism.js')
  .styles('resources/css/error.css', 'public/css/error.css')
  .styles('resources/css/prism.css', 'public/css/prism.css')
  .extract(['vue'])
  .postCss('resources/css/app.css', 'public/css')
  .tailwind('./tailwind.config.js')
  .purgeCss();

mix.js('resources/js/tail-es.js', 'public/js/es.js');

if (mix.inProduction()) {
  mix.version();
}
