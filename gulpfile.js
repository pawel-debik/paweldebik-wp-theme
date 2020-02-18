const gulp = require('gulp');
const uglify = require('gulp-uglify-es').default;
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const cssnano = require('cssnano');

function s(){
    // folder / files to look at
    return gulp.src('scss/*.scss')
    // do stuff
    .pipe(sass())
    //autoprefix?
    .pipe(autoprefixer({cascade: false}))
    // output destination
    .pipe(gulp.dest('styles'))
}

function u(){
    return gulp.src('js/actions.js')
    .pipe(uglify())
    .pipe(rename("actions.min.js"))
    .pipe(gulp.dest('js'))
};

function c(){
    return gulp.src(['./js/lazyload.min.js','./js/actions.min.js'])
    .pipe(concat('all.js'))
    .pipe(gulp.dest('js'))
};

function watch(){
    // gulp.watch('files-to-watch', gulp.series(['tasks', 'to', 'run']));
    gulp.watch('scss/*.scss', gulp.series('s'));
};

exports.s = s;
exports.u = u;
exports.c = c;
exports.watch = watch;