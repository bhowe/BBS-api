
var gulp = require('gulp');
var sass = require('gulp-sass');
var runSequence = require('run-sequence');
var gutil = require('gulp-util');
var postcss = require('gulp-postcss');
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');

gulp.task('sass', function(){
  return gulp.src('css/paypal-frontend-style.scss')
    .pipe(sass({outputStyle:'compact'})) // Converts Sass to CSS with gulp-sass
    .pipe(gulp.dest('css/'))
    .on('error', gutil.log)
});

gulp.task('autoprefix', function () {
    return gulp.src('paypal-frontend-style.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer(), cssnano({zindex: false}) ]))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('.'));
});


gulp.task('build', function(callback) {
  runSequence(
    //gulp'clean:dist',
    //'images',
    'sass', 'autoprefix',

    callback
  )
});