'use strict';

// Plugins
const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const changed = require("gulp-changed");
const imagemin = require('gulp-imagemin');
const mozjpeg = require('imagemin-mozjpeg');
const pngquant = require('imagemin-pngquant');
const gifsicle = require('imagemin-gifsicle');
const svgo = require('imagemin-svgo');

sass.compiler = require('node-sass');

// Settings
const documentRoot = {
	dest: 'httpdocs',
	src: 'src'
};
const path = {
	sass: {
		// dest: documentRoot.dest + '/wp/wp-content/themes/_s_theme/assets/css',
		dest: documentRoot.dest + '/assets/css',
		src:  documentRoot.src  + '/assets/sass/**/*.scss'
	},
	inc: {
		dest: documentRoot.dest + '/assets/inc',
		src:  documentRoot.src  + '/assets/inc/**/*'
	},
	js: {
		dest: documentRoot.dest + '/assets/js',
		src:  documentRoot.src  + '/assets/js/**/*'
	},
	img: {
		// dest: documentRoot.dest + '/wp/wp-content/themes/_s_theme/assets/img',
		dest: documentRoot.dest + '/assets/img',
		src:  documentRoot.src  + '/assets/img/**/*'
	},
	html: {
		src: [
			documentRoot.src  + '/**/*',
			'!' + documentRoot.src + '/assets/**/*',
			// '!' + documentRoot.src + '/assets/img/**/*'
		]
	}
};
const setting = {
	browser: ['ios_saf >= 8', 'Android >= 4'],
	sass: {
		outputStyle: 'compressed', // expanded, compressed
		indentType: 'tab',
		indentWidth: 2,
	}
};

/**
 * sass
 */
gulp.task('sass', function(done) {
	return gulp.src(path.sass.src)
		.pipe(sourcemaps.init())
		.pipe(sass({ outputStyle: setting.sass.outputStyle })
			.on('error', sass.logError))
		.pipe(autoprefixer())
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(path.sass.dest))
		.pipe(browserSync.stream());
	done();
});

/**
 * include
 */
gulp.task('inc', function(done) {
	return gulp.src(path.inc.src)
		.pipe(gulp.dest(path.inc.dest))
		.pipe(browserSync.stream());
	done();
});

/**
 * javascript
 */
gulp.task('js', function(done) {
	return gulp.src(path.js.src)
		.pipe(gulp.dest(path.js.dest))
		.pipe(browserSync.stream());
	done();
});

/**
 * image
 */
gulp.task('image', function(done) {
	return gulp.src(path.img.src)
		.pipe(changed(path.img.dest))
		.pipe(imagemin([
			pngquant({ quality: [0.7, 0.8] }),
			mozjpeg({ quality: 80 }),
			imagemin.gifsicle(),
			imagemin.svgo()
		]))
		.pipe(gulp.dest(path.img.dest))
		.pipe(browserSync.stream());
	done();
});

/**
 * html
 */
gulp.task('html', function(done) {
	return gulp.src(path.html.src)
		.pipe(gulp.dest(documentRoot.dest))
		.pipe(browserSync.stream());
	done();
});

/**
 * BrowserSync
 */
gulp.task('serve', function() {
	browserSync.init({
		notify: false,
		proxy: 'http://html-template.test:8888/',
		// server: { baseDir: documentRoot.dest }
	});
	gulp.watch(path.sass.src, gulp.series('sass'));
	gulp.watch(path.img.src, gulp.series('image'));
	// gulp.watch(path.inc.src, gulp.series('inc'));
	// gulp.watch(path.js.src, gulp.series('js'));
	// gulp.watch(path.html.src, gulp.series('html'));
	// gulp.watch(documentRoot.dest + '/**/*').on('change', browserSync.reload);
});

gulp.task('default', gulp.series('serve'));
