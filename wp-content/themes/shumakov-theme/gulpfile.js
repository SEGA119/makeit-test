var gulp = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('autoprefixer'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    cleanCSS = require('gulp-clean-css'),
	plumber = require('gulp-plumber'),
	livereload = require('gulp-livereload'),
	postcss = require('gulp-postcss');

var assets = 'assets/',
	style_assets = assets + 'styles/',
	scripts_assets = assets + 'scripts/';

var onError = function (err) {
    gutil.beep();
    gutil.log(gutil.colors.red(err.message));
    this.emit('end');
};

// --- Basic Tasks ---
gulp.task('sass', function() {
	
    var plugins = [
        autoprefixer({
			browsers: ['last 2 versions', 'safari 5', 'opera 12.1', 'iOS >=7', 'android 4', 'IE 9']
		})
    ];	
	
    return gulp.src([style_assets + '_libraries/*.css', style_assets + '_settings/*.scss', style_assets + 'custom/**/*.scss', style_assets + 'custom/*.scss'])
        .pipe(plumber({
			 errorHandler: onError		
		}))
        .pipe(sourcemaps.init())
		.pipe(concat('style.min.css'))
        .pipe(sass({ errLogToConsole: true }))
        .pipe(postcss(plugins))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('../maps'))
        .pipe(gulp.dest(style_assets))
        .pipe(livereload());
});

gulp.task('js', function() {
    return gulp.src([scripts_assets + '__jquery/*.js', scripts_assets + '_libraries/*.js', scripts_assets + 'custom/**/*.js', scripts_assets + 'custom/**/*.js'])
        .pipe(plumber({
			 errorHandler: onError		
		}))
        .pipe(sourcemaps.init())
        .pipe(concat('build.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('../maps'))
        .pipe(gulp.dest(scripts_assets));
});

gulp.task('watch', function() {
    livereload.listen(35729, function(err) {
        if (err) {
            return console.log(err);
        }
        gulp.watch([style_assets + '_libraries/*.css', style_assets + '_settings/*.scss', style_assets + 'custom/**/*.scss'], ['sass']);
        gulp.watch([scripts_assets + '__jquery/*.js', scripts_assets + '_libraries/*.js', scripts_assets + 'custom/**/*.js', scripts_assets + 'custom/*.js'], ['js']).on('change', function(file) {
            livereload.changed(file.path);
            gutil.log(gutil.colors.yellow('File changed' + ' (' + file.path + ')'));
        });
        gulp.watch('*.html').on('change', function(file) {
            livereload.changed(file.path);
            gutil.log(gutil.colors.yellow('File changed' + ' (' + file.path + ')'));
        });        
    });
});

// Default Task
gulp.task('default', ['sass', 'js', 'watch']);
//gulp.task('build', ['sass-production', 'js-production']);