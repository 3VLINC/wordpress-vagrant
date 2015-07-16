// gulp
var gulp = require('gulp');

// plugins
var minifyCSS = require('gulp-minify-css');
var del = require('del');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var browserify = require('browserify');
var source = require('vinyl-source-stream');
var sourcemaps = require('gulp-sourcemaps');
var buffer = require('vinyl-buffer');
var notify = require('gulp-notify');
var plumber = require('gulp-plumber');

var src_path = './src/theme/fhac-theme/';

var dest_path = './public/wp-content/themes/fhac-theme/';

function copy(src_glob, dest, delete_glob) {

	if(!delete_glob) delete_glob = dest;

	del(

		delete_glob,
		function() {

			gulp.src(
				src_glob
			).pipe(
				gulp.dest(
					dest
				)
			).pipe(
				notify(
					{
						message: 'File matching ' + src_glob +' copied to ' + dest + '.'
					}
				)
			);
			
		}

	);

}

function browserifyJavascript(src_file, dest_filename, dest, delete_glob) {

	if(!delete_glob) delete_glob = dest;

	del(

		delete_glob,
		function() {

			browserify(src_file)
			.bundle()
			.on(
				'error', 
				notify.onError("Error Building Scripts: <%= error.message %>")
			)
			.pipe(
				source(dest_filename)
			)
			.pipe(
				buffer()
			)
			.pipe(
				uglify()
			)
			.pipe(
				gulp.dest(dest)
			)
			.pipe(
				notify(
					{
						message: 'Javascript Browserified'
					}
				)
			);

		}

	);	

}

function compileSCSS(src_file, dest_filename, dest, delete_glob) {

	if(!delete_glob) delete_glob = dest;

	del(

		delete_glob,
		function() {

			gulp.src(src_file)
			.pipe(
				plumber(
					{
						errorHandler: notify.onError("Error Building Styles: <%= error.message %>")
					}
				)
			)
			.pipe(
				sass()
			)
			.pipe(
				minifyCSS()
			)
			.pipe(
				rename(dest_filename)
			)
			.pipe(
				plumber.stop()
			)
			.pipe(
				gulp.dest(dest)
			)
			.pipe(
				notify(
					{
						message: 'SCSS compiled.'
					}
				)
			);
			

		}

	);

}

gulp.task(
	'copy-php', 
	function() { 

		copy(src_path+'php/**/*', dest_path+'php') 

	}
);

gulp.task(
	'copy-fonts', 
	function() { 

		copy(src_path+'fonts/**/*', dest_path+'fonts') 

	}
);

gulp.task(
	'copy-modules', 
	function() { 

		copy(src_path+'modules/**/*', dest_path+'modules') 

	}
);

gulp.task(
	'copy-images', 
	function() { 

		copy(src_path+'images/**/*', dest_path+'images') 

	}
);

gulp.task(
	'copy-templates', 
	function() { 

		copy(src_path+'*.php', dest_path, dest_path+'*.php') 

	}
);

gulp.task(
	'copy-screenshot', 
	function() { 

		copy(src_path+'screenshot.png', dest_path, dest_path+'screenshot.png') 

	}
);

gulp.task(
	'copy-theme-file', 
	function() { 

		copy(src_path+'style.css', dest_path, dest_path+'style.css') 

	}
);

gulp.task(
	'browserify-javascript', 
	function() { 

		browserifyJavascript(src_path + 'scripts/theme.js', 'theme-min.js', dest_path+'scripts') 

	}
);

gulp.task(
	'compile-scss', 
	function() { 

		compileSCSS(src_path + 'styles/theme.scss', 'theme-min.css', dest_path+'styles') 

	}
);

gulp.task('watch', 

	function() {

		gulp.watch(src_path+'styles/*.scss', ['compile-scss']);

		gulp.watch(src_path+'scripts/**/*.js', ['browserify-javascript']);

		gulp.watch(src_path+'php/**/*', ['copy-php']);

		gulp.watch(src_path+'fonts/**/*', ['copy-fonts']);

		gulp.watch(src_path+'modules/**/*', ['copy-modules']);

		gulp.watch(src_path+'images/**/*', ['copy-images']);

		gulp.watch(src_path+'*.php', ['copy-templates']);

		gulp.watch(src_path+'screenshot.png', ['copy-screenshot']);

		gulp.watch(src_path+'style.css', ['copy-theme-file']);

	}

);

gulp.task('default', ['watch']);