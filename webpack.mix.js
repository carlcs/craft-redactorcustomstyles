const mix = require('laravel-mix');
require('@ayctor/laravel-mix-svg-sprite');

const paths = {
    src: 'src/assets/redactorplugin/src',
    dist: 'src/assets/redactorplugin/dist',
    examplesSrc: '_examples/src',
    examplesDist: '_examples/redactor/resources',
};

mix.js(paths.src+'/customstyles.js', paths.dist+'/redactorplugin')
    .js(paths.src+'/svg-polyfill.js', paths.dist+'/assetbundle')
    .sass(paths.src+'/customstyles.scss', paths.dist+'/assetbundle')
    .sass(paths.examplesSrc+'/example.scss', paths.examplesDist)
    .svgSprite({
        src: paths.src+'/icons/**/*.svg',
        filename: paths.dist+'/assetbundle/icons.svg',
        prefix: '',
    });
