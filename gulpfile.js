//gulp plugins
var gulp = require('gulp');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var cleancss = require('gulp-clean-css');
//Bundle paths
var bundleSrc = [
    'node_modules/html5shiv/dist/html5shiv.js'
];
//javascript paths
var jsSrc = 'src/js/**/*.js';
var jsDest = 'public/js';
//sass paths    
var sassSrc = 'src/sass/**/*.scss';
var sassDest = 'public/css';

gulp.task('bundle', function(){
    return gulp.src(bundleSrc)
        .pipe(concat('bundle.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(sourcemaps.write())
        .pipe(rename('bundle.min.js'))
        .pipe(uglify().on('error', function (e) {
            console.log(e);
        }))
        .pipe(gulp.dest(jsDest));
});

//javascript task
gulp.task('scripts', function () {
    return gulp.src(jsSrc)
        .pipe(concat('theme.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(sourcemaps.write())
        .pipe(rename('theme.min.js'))
        .pipe(uglify().on('error', function (e) {
            console.log(e);
        }))
        .pipe(gulp.dest(jsDest));
});
//sass task
gulp.task('sass', function () {
    return gulp.src(sassSrc)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(sassDest))
        .pipe(sourcemaps.write())
        .pipe(autoprefixer())
        .pipe(rename({suffix: '.min'}))
        .pipe(cleancss())
        .pipe(gulp.dest(sassDest))
});

gulp.task('default', ['bundle','scripts', 'sass']);

gulp.task('watch', function () {
    // watch sass files
    gulp.watch(sassSrc, ['sass']);
    // watch .js files
    gulp.watch(jsSrc, ['scripts']);
});