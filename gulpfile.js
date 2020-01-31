const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const autoprefixer = require('gulp-autoprefixer');


gulp.task('sass', function(){
    // folder / files to look at
    return gulp.src('scss/*.scss')
    // do stuff
    .pipe(sass())
    //autoprefix?
    .pipe(autoprefixer({cascade: false}))
    // output destination
    .pipe(gulp.dest('styles'))
});

gulp.task('watch', function(){
    // gulp.watch('files-to-watch', gulp.series(['tasks', 'to', 'run']));
    gulp.watch('scss/*.scss', gulp.series('sass'));
});