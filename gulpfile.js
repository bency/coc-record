var gulp = require('gulp'),
    //notify  = require('gulp-notify'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps');

gulp.task('style', function () {
    gulp
    .src("resources/assets/sass/**/*.+(sass|scss)")
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest("public/css"));
});
gulp.task('default', ['style']);
