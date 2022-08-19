var gulp = require('gulp'),
  uglify = require('gulp-uglify'),
  babel = require('gulp-babel'),
  rename = require('gulp-rename'),
  cleanCSS = require('gulp-clean-css'),
  autoprefixer = require('gulp-autoprefixer')

gulp.task('jscompress', function () {
  return (
    gulp
      .src('./js/index.js')
      .pipe(
        babel({
          presets: ['@babel/preset-env'],
        })
      )
      /* .pipe(rename({ suffix: '.min' })) */
      .pipe(uglify())
      .pipe(rename('plain.js'))
      .pipe(gulp.dest('./js'))
  )
})
gulp.task('csscompress', function () {
  return (
    gulp
      .src(['./style/style.css'])
      /* .pipe(rename({ suffix: '.min' })) */
      .pipe(autoprefixer({ cascade: false }))
      .pipe(cleanCSS())
      .pipe(rename('plain.css'))
      .pipe(gulp.dest('./style'))
  )
})

gulp.task('buildjs', function () {
  return gulp
    .src(['./js/index.js'])
    .pipe(
      babel({
        presets: ['@babel/preset-env'],
      })
    )
    .pipe(rename('plain.js'))
    .pipe(uglify())
    .pipe(gulp.dest('./Plain/js'))
})

gulp.task('buildcss', function () {
  return gulp
    .src(['./style/style.css'])
    .pipe(rename('plain.css'))
    .pipe(autoprefixer({ cascade: false }))
    .pipe(cleanCSS())
    .pipe(gulp.dest('./Plain/style'))
})

// gulp.task('buildsw', function () {
//   return gulp
//     .src('./sw.js')
//     .pipe(
//       babel({
//         presets: ['@babel/preset-env'],
//       })
//     )
//     .pipe(rename('sw.min.js'))
//     .pipe(uglify())
//     .pipe(gulp.dest('./Plain/'))
// })

gulp.task('start', function () {
  gulp.watch('js/index.js', gulp.parallel(['jscompress']))
  gulp.watch('style/style.css', gulp.parallel(['csscompress']))
})

gulp.task('build', gulp.parallel(['buildjs', 'buildcss']))
