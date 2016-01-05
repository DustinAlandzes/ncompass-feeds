var elixir = require('laravel-elixir');
var gulp = require('gulp');
var minifycss = require('gulp-minify-css');
var autoprefixer = require('gulp-phpspec');
var phpspec = require('gulp-phpspec');
var run = require('gulp-run');
var notify = require('gulp-notify');
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
    mix.phpUnit();
});

var cssDir = 'public/css'
var jsDir = 'public/js';

var targetCSSDir = 'public/css';
var targetJSDir = 'public/js';

gulp.task('css', function() {
    return gulp.src(cssDir + '/main.css')
        .pipe(autoprefixer('last 15 versions'))
        .pipe(minifycss())
        .pipe(gulp.dest(targetCSSDir))
        .pipe(notify({ message: 'CSS prefixed, and minified'}));
});

gulp.task('js', function() {

});

gulp.task('test', function() {
    gulp.src('tests/spec/**/*.php')
        .pipe(run('clear'))
        .pipe(phpspec('', { notify: true }))
        .on('error', notify.onError({
            title: 'Test Failed',
            message: 'Your tests failed!',
            icon: __dirname + '/fail.png'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'All tests have returned green!'
        }));
});

gulp.task('watch', function() {
    gulp.watch(['**/*.css'], ['css']);
    gulp.watch(['**/*.php', 'src/**/*.php'], ['test'])
})

gulp.task('default', ['css','test', 'watch']);
