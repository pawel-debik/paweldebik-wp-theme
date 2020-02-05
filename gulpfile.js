const gulp = require('gulp');
const uglify = require('gulp-uglify-es').default;
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const cssnano = require('cssnano');

function style(){
    // folder / files to look at
    return gulp.src('scss/*.scss')
    // do stuff
    .pipe(sass())
    //autoprefix?
    .pipe(autoprefixer({cascade: false}))
    // output destination
    .pipe(gulp.dest('styles'))
}

function ugly(){
    return gulp.src('js/actions.js')
    .pipe(uglify())
    .pipe(rename("actions.min.js"))
    .pipe(gulp.dest('js'))
};

function conc(){
    return gulp.src(['./js/lazyload.min.js','./js/actions.min.js'])
    .pipe(concat('all.js'))
    .pipe(gulp.dest('js'))
};

function watch(){
    // gulp.watch('files-to-watch', gulp.series(['tasks', 'to', 'run']));
    gulp.watch('scss/*.scss', gulp.series('style'));
};

exports.style = style;
exports.ugly = ugly;
exports.conc = conc;
exports.watch = watch;