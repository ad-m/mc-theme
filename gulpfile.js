var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('css', function(){
    return gulp
        .src('assets/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('static/css'));
});

gulp.task('build', ['css']);


gulp.task('watch', function(){
   gulp.watch('assets/scss/**/*.scss', ['build']);
});

gulp.task('default', ['build', 'watch']);