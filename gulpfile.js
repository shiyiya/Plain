var gulp = require('gulp')

var uglify = require('gulp-uglify')

var babel = require('gulp-babel')

var rename = require('gulp-rename')

var cleanCSS = require('gulp-clean-css')

var autoprefixer = require('gulp-autoprefixer')

gulp.task('jscompress', function () {
  return gulp
    .src('./js/index.js')
    .pipe(
      babel({
        presets: ['env']
      })
    )
    .pipe(rename({ suffix: '.min' }))
    .pipe(uglify())
    .pipe(gulp.dest('./js'))
})
gulp.task('csscompress', function () {
  return gulp
    .src(['./style/style.css'])
    .pipe(rename({ suffix: '.min' }))
    .pipe(autoprefixer({ browsers: ['last 3 versions'], cascade: false }))
    .pipe(cleanCSS())
    .pipe(gulp.dest('./style'))
})

gulp.task('start', function () {
  gulp.watch('js/index.js', ['jscompress'])
  gulp.watch('style/style.css', ['csscompress'])
})

gulp.task('build', ['jscompress', 'csscompress'])
