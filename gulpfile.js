var elixir = require('laravel-elixir'),
    liveReload = require('gulp-livereload'),
    clean    = require('rimraf'),
    gulp    = require('gulp');


var config = {
   asset_path:'./resources/assets',
   build_path:'./public/build'
};

config.bower_path = config.asset_path + '/../bower_components';

config.build_path_js = config.build_path + '/js';
config.build_path_vendor_js = config.build_path_js + '/vendor';
config.vendor_path_js = [
    config.bower_path + '/jquery/dist/jquery.min.js',
    config.bower_path + '/bootstrap/dist/js/bootstrap.min.js',
    config.bower_path + '/angular/angular.min.js',
    config.bower_path + '/angular-route/angular-route.min.js',
    config.bower_path + '/angular-resource/angular-resource.min.js',
    config.bower_path + '/query-string/query-string.js',
    config.bower_path + '/angular-cookies/angular-cookies.min.js',
    config.bower_path + '/angular-oauth2/dist/angular-oauth2.min.js',
    config.bower_path + '/angular-animate/angular-animate.min.js',
    config.bower_path + '/angular-messages/angular-messages.min.js',
    config.bower_path + '/angular-bootstrap/ui-bootstrap.min.js',

    config.bower_path + '/angular-strap/dist//modules/navbar.min.js',

];


config.build_path_css = config.build_path + '/css';
config.build_path_vendor_css = config.build_path_css + '/vendor';
config.vendor_path_css = [
    config.bower_path + '/bootstrap/dist/css/bootstrap.min.css',
    config.bower_path + '/bootstrap/dist/css/bootstrap-theme.min.css'
];


config.build_path_html = config.build_path + '/views';

gulp.task('copy-html',function(){
    gulp.src([
        config.asset_path + '/js/views/**/*.html'
    ]).pipe(gulp.dest(
        config.build_path_html
    )).pipe(liveReload());
});

gulp.task('copy-css', function(){
    gulp.src([
        config.asset_path + '/css/**/*.css'
    ]).pipe(gulp.dest(
        config.build_path_css
    )).pipe(liveReload());

    gulp.src(
        config.vendor_path_css
    ).pipe(gulp.dest(
        config.build_path_vendor_css
    )).pipe(liveReload());

});

gulp.task('copy-js', function(){

    gulp.src([
        config.asset_path + '/js/**/*.js'
    ]).pipe(gulp.dest(
        config.build_path_js
    )).pipe(liveReload());


    gulp.src(
        config.vendor_path_js
    ).pipe(gulp.dest(
        config.build_path_vendor_js
    )).pipe(liveReload());

});
gulp.task('clear-build-folder',function(){
    clean.sync(config.build_path);
});


gulp.task('default', ['clear-build-folder'], function(){

    gulp.start('copy-html');
   elixir(function(mix){
         mix.styles(config.vendor_path_css.concat([config.asset_path + '/css/**/*.css']),
         'public/css/all.css', config.asset_path
         );


       mix.scripts(config.vendor_path_js.concat([config.asset_path + '/js/**/*.js']),
           'public/js/all.js', config.asset_path
       );

       mix.version(['js/all.js', 'css/all.css']);
   });

});


gulp.task('watch-dev',['clear-build-folder'] , function(){
    liveReload.listen();
    gulp.start('copy-js','copy-css','copy-html');
    gulp.watch(config.asset_path + '/**',['copy-js','copy-css','copy-html']);
});



