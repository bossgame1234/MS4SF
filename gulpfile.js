var elixir = require('laravel-elixir'),
    gulp   = require('gulp'),
    jade   = require('gulp-jade'),
    util   = require('gulp-util');

elixir(function(mix) {

    gulp.task('jade', function() {
        gulp.src('resources/assets/jade/**/*.jade')
            .pipe(jade({
                pretty: !util.env.production
            }))
            .pipe(gulp.dest('public/'));
    });

    mix
        .sass()
        .coffee()
        .task('jade', 'resources/assets/jade/**/*.jade');
});