// gulp
var gulp = require('gulp');

// plugins

var minifyCSS = require('gulp-minify-css'), 
del = require('del'), 
sass = require('gulp-sass'), 
rename = require('gulp-rename'),
uglify = require('gulp-uglify'), 
browserify = require('browserify'), 
source = require('vinyl-source-stream'), 
sourcemaps = require('gulp-sourcemaps'), 
buffer = require('vinyl-buffer'), 
notify = require('gulp-notify'), 
plumber = require('gulp-plumber'),
args = require('yargs').argv,
replace = require('gulp-replace');

var ENV_DEV = 0;
var ENV_PROD = 1;

builder = false;

Build = function(environment) {

  this.environment = environment;

  this.theme_name = (environment == ENV_DEV) ? 'fhac-theme-dev' : 'fhac-theme';

  this.environment_name = (environment == ENV_DEV) ? 'Development' : 'Production';

  this.base_path = '../../public/wp-content/themes/'+this.theme_name+'/';

  this.notifications = [];

  this.clean = function() {
    
    // To do! fix this because del doesn't let you
    // delete outside of working directory tree
    // del([
    //   this.base_path+'/**/*'
    // ]);
    
  };

  this.processPHP = function() {

    gulp.src(['fhac-theme/php/**/*'])
    .pipe(gulp.dest(this.base_path+'php'))
    .pipe(notify({ message: 'PHP built.' }));

  };

  this.processFonts = function() {

    gulp.src(['fhac-theme/fonts/**/*'])
    .pipe(gulp.dest(this.base_path+'fonts'))
    .pipe(notify({ message: 'Fonts built.' }));

  };

  this.processModules = function() {
    
    gulp.src('fhac-theme/modules/**/*')
    .pipe(gulp.dest(this.base_path+'modules/'))
    .pipe(notify({ message: 'Modules built.' }));

  };

  this.processStaticTemplates = function() {
    
    gulp.src('fhac-theme/scripts/**/templates/*.html')
    .pipe(gulp.dest(this.base_path+'scripts/'))
    .pipe(notify({ message: 'Static Templates built.' }));

  };

  this.processTemplates = function() {
    
    gulp.src('fhac-theme/*.php')
    .pipe(gulp.dest(this.base_path))
    .pipe(notify({ message: 'Templates built.' }));

  };

  this.processImages = function() {
    
    gulp.src('fhac-theme/images/**/*')
    .pipe(gulp.dest(this.base_path+'images/'))
    .pipe(notify({ message: 'Images built.' }));

  };

  this.processJS = function() {

    if(this.environment == ENV_DEV)
    {

      var bundleStream = browserify(
          './fhac-theme/scripts/theme.js'
        )
        .bundle()
        .on(
          'error', 
          notify.onError("Error Building Scripts: <%= error.message %>")
          )
        .pipe(source('theme-min.js'))
        .pipe(buffer())
        .pipe(gulp.dest(this.base_path+'scripts/'))
        .pipe(notify({ message: 'JS built.' }));

    }
    else
    {

      var bundleStream = browserify(
          './fhac-theme/scripts/theme.js'
        )
        .bundle()
        .on(
          'error', 
          notify.onError("Error Building Scripts: <%= error.message %>")
          )
        .pipe(source('theme-min.js'))
        .pipe(buffer())
        .pipe(uglify())
        .pipe(gulp.dest(this.base_path+'scripts/'))
        .pipe(notify({ message: 'JS built.' }));

    }


  };

  this.processSCSS = function() {

    if(this.environment == ENV_DEV)
    {

      gulp.src('fhac-theme/styles/theme.scss')
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
      .pipe(rename('theme-min.css'))
      .pipe(gulp.dest(this.base_path+'styles/'))
      .pipe(notify({ message: 'SCSS built.' }));

    } else {

       gulp.src('fhac-theme/styles/theme.scss')
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
      .pipe(minifyCSS())
      .pipe(rename('theme-min.css'))
      .pipe(gulp.dest(this.base_path+'styles/'))
      .pipe(notify({ message: 'SCSS built.' }));


    }

  };

  this.processMO = function() {

    gulp.src('fhac-theme/languages/**/*.mo')
    .pipe(gulp.dest(this.base_path+'languages'))
    .pipe(notify({ message: 'Languages built.'}));

  };

  this.processMisc = function() {

     gulp.src('fhac-theme/screenshot.png')
      .pipe(gulp.dest(this.base_path))
      .pipe(notify({ message: 'Screenshot built.'}));

      gulp.src('fhac-theme/style.css')
      .pipe(replace(/\{\{ENVIRONMENT_NAME\}\}/g, this.environment_name))
      .pipe(gulp.dest(this.base_path))
      .pipe(notify({ message: 'Theme file built.'}));

  };

};


if(args.production == true)
{

  builder = new Build(ENV_PROD);

}
else{

  builder = new Build(ENV_DEV);

}

gulp.task('clean', function() { return builder.clean(); });

gulp.task('process-php', function() { builder.processPHP(); });

gulp.task('process-fonts', function() { builder.processFonts(); });

gulp.task('process-modules', function() { builder.processModules(); });

gulp.task('process-static-templates', function() { builder.processStaticTemplates(); });

gulp.task('process-templates', function() { builder.processTemplates(); });

gulp.task('process-js', function() { builder.processJS(); });

gulp.task('process-scss', function() { builder.processSCSS(); });

gulp.task('process-mo', function() { builder.processMO(); });

gulp.task('process-images', function() { builder.processImages(); });

gulp.task('process-misc', function() { builder.processMisc(); });

gulp.task('build', ['process-php', 'process-fonts', 'process-modules', 'process-static-templates', 'process-templates', 'process-js', 'process-scss', 'process-mo', 'process-images', 'process-misc']);

gulp.task('watch', function() {

  gulp.watch('fhac-theme/**/*.php', ['process-php']);

  gulp.watch('fhac-theme/fonts/**/*', ['process-fonts']);

  gulp.watch('fhac-theme/**/*.php', ['process-modules']);

  gulp.watch('fhac-theme/scripts/**/templates/*.html', ['process-static-templates']);

  gulp.watch('fhac-theme/**/*.php', ['process-templates']);

  gulp.watch('fhac-theme/**/*.js', ['process-js']);

  gulp.watch('fhac-theme/**/*.scss', ['process-scss']);

  gulp.watch('fhac-theme/**/*.mo', ['process-mo']);
  
  gulp.watch('fhac-theme/images/**/*', ['process-images']);

  gulp.watch('fhac-theme/images/**/*', ['process-images']);

  gulp.watch(['fhac-theme/screenshot.png','fhac-theme/style.css'], ['process-misc']);

});

gulp.task('default', ['watch']);