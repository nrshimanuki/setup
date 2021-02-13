'use strict';

const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass');


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
	browser: ['last 2 versions', 'ios_saf >= 8', 'and_chr >= 5', 'Android >= 5'],
	sass: {
		outputStyle: 'expanded', // expanded, compressed
		indentType: 'tab',
		indentWidth: 2,
	}
};


// Task
const scss_to_css = () => {
 return src(path.sass.src)
	.pipe(
		sass({
			outputStyle: setting.sass.outputStyle
		}).on('error', sass.logError)
	)
	.pipe(dest(path.sass.dest))
}


// Watch
const watch_sass = () =>
  watch(path.sass.src, scss_to_css);


// Run
exports.default = series(watch_sass);

