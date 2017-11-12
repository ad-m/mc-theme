var gulp = require('gulp');
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');
var rename = require("gulp-rename");
var browserSync = require('browser-sync').create();

gulp.task('css', function(){
    return gulp
        .src('assets/scss/*.scss')
        .pipe(sass())
        .pipe(postcss([autoprefixer()]))
        .pipe(gulp.dest('static/css'))
        .pipe(browserSync.stream())
        .pipe(rename({ extname: ".min.css"}))
        .pipe(postcss([cssnano()]))
        .pipe(gulp.dest('static/css'))
        .pipe(browserSync.stream());
});

gulp.task('js', function(){
    return gulp
        .src('assets/js/*.js')
        .pipe(gulp.dest('static/js'))
        .pipe(rename({ extname: ".min.js"}))
        .pipe(gulp.dest('static/css'))
        .pipe(browserSync.stream());
});


gulp.task('live-reload', function() {
    browserSync.init({
        proxy: "localhost:8080"
    });
});

gulp.task('build', ['css']);

gulp.task('watch', ['live-reload'], function(){
   gulp.watch('assets/scss/**/*.scss', ['build']);
});

gulp.task('default', ['build', 'watch']);

//
// (function() {
//
// })  ();