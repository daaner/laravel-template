const mix = require('laravel-mix');

// generate sourceMap
const enabledSourceMap = true;


//.version()
//.sourceMaps()
// .disableNotifications()


// sourceMaps only dev/watch
if (!mix.inProduction() && enabledSourceMap) {
  mix.webpackConfig({
    devtool: 'source-map'
  })
  .sourceMaps()
}


mix.sass('resources/sass/app.scss', 'public/css/style.css');
mix.js('resources/js/app.js', 'public/js/script.js');

mix.version().disableNotifications();
