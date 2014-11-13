var gulp = require('gulp'),
  sass = require('gulp-ruby-sass'),
  browserify = require('gulp-browserify'),
  concat = require('gulp-concat'),
  // embedlr = require('gulp-embedlr'),
  // refresh = require('gulp-livereload'),
  // lrserver = require('tiny-lr')(),
  // express = require('express'),
  // livereload = require('connect-livereload')
  // livereloadport = 35729,
  // serverport = 5000;

//We only configure the server here and start it only when running the watch task
// var server = express();
//Add livereload middleware before static-middleware
// server.use(livereload({
//   port: livereloadport
// }));
// server.use(express.static('./build'));
imagemin   = require('gulp-imagemin');
// --------------------------------------------

gulp.task('images', function(){
    return gulp.src('./images/**/*.png')
        .pipe(imagemin())
        .pipe(gulp.dest('build/images'));
});

// --------------------------------------------

//Task for sass using libsass through gulp-sass
gulp.task('sass', function(){
  gulp.src('style/style.scss')
    .pipe(sass({sourcemapPath: './style'}))
    .on('error', function (err) { console.log(err.message); })
    .pipe(gulp.dest('./'));
});

// --------------------------------------------

//Task for processing js with browserify
gulp.task('browserify', function(){
  gulp.src('js/*.js')
   .pipe(browserify())
   .pipe(concat('bundle.js'))
   .pipe(gulp.dest('build'));
   // .pipe(refresh(lrserver));

});

//Task for moving html-files to the build-dir
//added as a convenience to make sure this gulpfile works without much modification
// gulp.task('html', function(){
//   gulp.src('views/*.html')
//     .pipe(gulp.dest('build'))
//     .pipe(refresh(lrserver));
// });

// --------------------------------------------

//Convenience task for running a one-off build
gulp.task('build', function() {
  gulp.start('browserify', 'sass', 'images');
});

// gulp.task('serve', function() {
//   //Set up your static fileserver, which serves files in the build dir
//   server.listen(serverport);

//   //Set up your livereload server
//   //lrserver.listen(livereloadport);
// });

// --------------------------------------------

gulp.task('watch', function() {

  //Add watching on images
  gulp.watch('images/**/*.png', function() {
    gulp.start('images');
  });

  //Add watching on sass-files
  gulp.watch('style/*.scss', function() {
    gulp.start('sass');
  });

  //Add watching on js-files
  gulp.watch('js/*.js', function() {
    gulp.start('browserify');
  });

  //Add watching on html-files
  // gulp.watch('views/*.html', function () {
  //   gulp.start('html');
  // });
});

gulp.task('default', function () {
  gulp.start('build', 'watch');
});
