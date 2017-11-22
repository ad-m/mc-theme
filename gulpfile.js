var gulp = require('gulp');
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');
var rename = require("gulp-rename");
var browserSync = require('browser-sync').create();
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sourcemaps = require('gulp-sourcemaps');
var gettext = require('gulp-gettext');
var zip = require('gulp-zip');
var replace = require('gulp-replace');
var p = require('./package.json');
var plumber = require('gulp-plumber');

config = {
    'po': 'languages/**/*.po',
    'css': 'assets/scss/*.scss',
    'js': 'assets/js/*.js'
}

gulp.task('css', function () {
    return gulp
        .src(config.css)
        .pipe(sass().on('error', sass.logError))
        .pipe(plumber())
        .pipe(postcss([autoprefixer()]))
        .pipe(gulp.dest('static/css'))
        .pipe(browserSync.stream())
        .pipe(rename({extname: ".min.css"}))
        .pipe(postcss([cssnano()]))
        .pipe(gulp.dest('static/css'))
        .pipe(browserSync.stream());
});

gulp.task('js', function () {
    return gulp
        .src(config.js)
        .pipe(gulp.dest('static/js'))
        .pipe(sourcemaps.init())
        .pipe(concat('script.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('static/js'))
        .pipe(browserSync.stream())
        .pipe(rename({extname: ".min.js"}))
        .pipe(uglify())
        .pipe(gulp.dest('static/js'))
        .pipe(browserSync.stream());
});


gulp.task('live-reload', function () {
    browserSync.init({
        proxy: "localhost:8080"
    });
});

gulp.task('gettext', function () {
    gulp.src(config.po)
        .pipe(gettext())
        .pipe(gulp.dest('languages'))
})

gulp.task('release', ['version'], function () {
    gulp.src(['./**/*.{mo,po,min.css,min.js,jpg,min.svg,png,php}',
        'LICENSE',
        'style.css',
        '!node_modules/**'])
        .pipe(zip(p.name + ".zip"))
        .pipe(gulp.dest('.'));
});

gulp.task('version', function () {
    gulp.src(['style.css'])
        .pipe(replace(/^Version: (.+?)$/, "Version: " + p.version))
        .pipe(gulp.dest('.'));
});

gulp.task('build', ['js', 'css', 'gettext', 'gettext', 'version']);

gulp.task('watch', ['live-reload'], function () {
    gulp.watch([config.css, config.js, config.po], ['build']);
});

gulp.task('default', ['build', 'watch']);
