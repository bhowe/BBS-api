var gulpftp = require('./config.js');
var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');
var del = require('del');
var runSequence = require('run-sequence');
var gutil = require('gulp-util');
var ftp = require('vinyl-ftp');
var notify = require('gulp-notify');
var postcss = require('gulp-postcss');
var sourcemaps   = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');

gulp.task('sass', function(){
  return gulp.src('scss/style.scss')
    .pipe(sass({outputStyle:'compact'})) // Converts Sass to CSS with gulp-sass
    .pipe(gulp.dest(''))
    .pipe(gulp.dest('./css/custom-editor-style'))
    .pipe(browserSync.reload({
      stream: true
    }))
    .on('error', gutil.log)
});

gulp.task('browserSync', function() {
	var files = [
    'style.css',
    '*.php'
    ];

  browserSync.init(files, {
    reloadOnRestart: false,
	proxy: "localhost/np2",
    notify:false
  })
});

gulp.task('images', function(){
  gulp.src('../../uploads/**/**/*.+(png|jpg|jpeg|gif|svg)')
        .pipe(imagemin({
          verbose:true
        }))
        .pipe(gulp.dest('../../uploads/'))
});



gulp.task('clean:dist', function() {
  return del.sync('dist');
});

gulp.task('deploy-dev', function() {
    var conn = ftp.create( {
        host:     gulpftp.config.host,
        user:     gulpftp.config.user,
        password: gulpftp.config.pass,
        parallel: 3,
        log:      gutil.log
    } );

    /* list all files you wish to ftp in the glob variable */
    var globs = [
        '**/*',
        '*',
        '!dist',
        '!dest',
        '!node_modules/**', // if you wish to exclude directories, start the item with an !
        '!*.sublime-project',
        '!*.sublime-workspace',
        '!package.json',
        '!package-lock.json',
        '!postcss.config.js',
        '!config.js'
    ];

    return gulp.src( globs, { cwd: '.', buffer: false } )
        .pipe( conn.newer( '/public_html/wp-content/themes/NP-theme' ) ) // only upload newer files
        .pipe( conn.dest( '/public_html/wp-content/themes/NP-theme' ) )
        .pipe(notify("Dev site updated!"));

});

gulp.task('watch', ['browserSync', 'sass'], function (){
  gulp.watch('scss/*.scss', ['sass']);
  // Other watchers
});

gulp.task('autoprefix', function () {
    return gulp.src('style.css')
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