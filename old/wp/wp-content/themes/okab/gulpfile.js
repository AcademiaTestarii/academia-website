/**
 *
 * Gulpfile setup
 *
 * @since 1.0.0
 * @authors @authors Adel Tahri, @adeltahri
 * @package noor
 */


// Project configuration
const project = 'okab-theme', // Project name, used for build zip.
    url = 'http://localhost/wp/okab/', // Local Development URL for BrowserSync. Change as-needed.
    build = './buildtheme/', // Files that you want to package into a zip go here
    plugin_path = '../../plugins/', // Plugins Path
    plugin_build_path = './framework/plugins/', // Plugins Path
    plugin_to_zip = ['dima_shortcodes', 'dima-portfolio'], // Plugins Path

    buildInclude = [
        // include common file types
        '**/*.php',
        '**/*.html',
        '**/*.css',
        '**/*.js',
        '**/*.svg',
        '**/*.ttf',
        '**/*.otf',
        '**/*.eot',
        '**/*.woff',
        '**/*.woff2',
        // include specific files and folders
        'screenshot.png',
        // exclude files and folders
        '!node_modules/**/*',
        '!assets/bower_components/**/*',
        '!*.css.map'
    ];


// Include gulp
const gulp = require('gulp');

// Include Our Plugins
const jshint = require('gulp-jshint'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    minifycss = require('gulp-minify-css'),
    lec = require('gulp-line-ending-corrector'),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    sourcemaps = require('gulp-sourcemaps'),
    clean = require('gulp-clean'),
    filter = require('gulp-filter'),
    imagemin = require('gulp-imagemin'),
    newer = require('gulp-newer'),
    cmq = require('gulp-combine-mq'),
    plugins = require('gulp-load-plugins')({camelize: true}),
    ignore = require('gulp-ignore'), // Helps with ignoring files and directories in our run tasks
    rimraf = require('gulp-rimraf'), // Helps with removing files and directories in our run tasks
    zip = require('gulp-zip'), // Using to zip up our packaged theme into a tasty zip file that can be installed in WordPress!
    plumber = require('gulp-plumber'), // Helps prevent stream crashing on errors
    cache = require('gulp-cache'),
    babel = require("gulp-babel");

const decompress = require('gulp-decompress');
const svgstore = require('gulp-svgstore');
const svgmin = require('gulp-svgmin');
const path = require('path');
const sass_input = './framework/asset/site/css/sass/**/*.scss';
const sass_out = './framework/asset/site/css/';
const js_es6_in = './framework/asset/site/js/es6/**/*.js';
const js_out = './framework/asset/site/js/';
const sassOptions = {
    errLogToConsole: true,
    sourceComments: true,
    outputStyle: 'expanded',
    precision: 10
};
const sassOptions_bot = {
    errLogToConsole: false,
    sourceComments: false,
    outputStyle: 'compact',
    precision: 10
};


var autoprefixerOptions = {
    browsers: ['last 2 version', '> 1%', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4']
};

// Lint Task
gulp.task('lint', function () {
    return gulp
        .src('framework/asset/site/js/module/**/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

/**
 * Styles
 *
 * Looking at src/sass and compiling the files into Expanded format, Autoprefixing and sending the files to the build folder
 *
 * Sass output styles: https://web-design-weekly.com/2014/06/15/different-sass-output-styles/
 */
gulp.task('sass', function () {
    return gulp.src(sass_input)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass(sassOptions))
        //.pipe(sourcemaps.write({includeContent: false}))
        // .pipe(sourcemaps.init({loadMaps: true}))
        .pipe(autoprefixer(autoprefixerOptions))
        //.pipe(sourcemaps.write('.'))
        .pipe(plumber.stop())
        .pipe(gulp.dest(sass_out))
        .pipe(filter('**/*.css')) // Filtering stream to only css files
        .pipe(gulp.dest(sass_out))
        .pipe(notify({message: 'Styles task complete', onLast: true}))
});

gulp.task('sass_bot', function () {
    return gulp.src(sass_input)
        .pipe(plumber())
        .pipe(sass(sassOptions_bot))
        .pipe(autoprefixer(autoprefixerOptions))
        .pipe(plumber.stop())
        .pipe(gulp.dest(sass_out))
        .pipe(filter('**/*.css')) // Filtering stream to only css files
        .pipe(cmq({beautify: false})) // Combines Media Queries
        .pipe(rename({suffix: '.min'}))
        .pipe(minifycss({
            maxLineLen: 80
        }))
        .pipe(gulp.dest(sass_out))
        .pipe(notify({message: 'Styles (bot) task complete', onLast: true}))
});

/**
 * Images
 * Look at src/images, optimize the images and send them to the appropriate place
 */
gulp.task('images', function () {
// Add the newer pipe to pass through newer images only
    return gulp.src(['framework/asset/images/**/*.{png,jpg,gif}'])
        .pipe(newer('framework/asset/images/'))
        .pipe(rimraf({force: true}))
        .pipe(imagemin({optimizationLevel: 7, progressive: true, interlaced: true}))
        .pipe(gulp.dest('framework/asset/images/'))
        .pipe(notify({message: 'Images task complete', onLast: true}));
});

/**
 * Svg Store
 * Look at framework/images/svg/,
 */
gulp.task('svgstore', function () {
    return gulp
        .src('framework/images/svg/*.svg')
        .pipe(svgmin(function (file) {
            var prefix = path.basename(file.relative, path.extname(file.relative));
            return {
                plugins: [{
                    cleanupIDs: {
                        prefix: prefix + '-',
                        minify: true
                    }
                }]
            }
        }))
        .pipe(svgstore())
        .pipe(gulp.dest('framework/images/svg/'));
});

/**
 *  Renem SVG files to {name}.svg.php
 *  Look at framework/images/svg/, for all svg files and change the name and add .php extantion
 */
gulp.task('svgrename', function () {
    gulp.src("framework/images/svg/*.svg")
        .pipe(rename(function (path) {
            path.suffix += ".svg";
            path.extname += '.php';
            //path.basename = path.basename.replace(/_48px/, '');
        }))
        .pipe(gulp.dest("framework/images/svg/"));
});

// Concatenate & Minify JS
gulp.task('scripts', function () {
    return gulp.src('framework/asset/site/js/module/**/*.js')
    //.pipe(sourcemaps.init())
        .pipe(concat('libs.js'))
        .pipe(lec())
        .pipe(gulp.dest(js_out))
        .pipe(rename("libs.min.js"))
        .pipe(uglify())
        //.pipe(sourcemaps.write("./"))
        .pipe(gulp.dest(js_out));
});

gulp.task('es6', function () {
    return gulp.src(js_es6_in)
        .pipe(babel({
            presets: ['es2015']
        }))
        .pipe(gulp.dest(js_out));
});

/**
 * Clean gulp cache
 */
gulp.task('clear', function () {
    cache.clearAll();
});

// Watch Files For Changes
gulp.task('watch', function () {
    var files = [
        './framework/asset/site/css/noor/*.css',
        './**/*.php'
    ];
    gulp.watch('framework/asset/site/js/module/**/*.js', ['scripts']);
    gulp.watch('framework/asset/site/js/es6/**/*.js', ['es6']);
    gulp.watch(sass_input, ['sass'])
        .on('change', function (evt) {
            console.log(
                '[watcher] File ' + evt.path.replace(/.*(?=sass)/, '') + ' was ' + evt.type + ', compiling...'
            );
        });
});

// Default Task
gulp.task('default', ['clear', 'sass_bot', 'buildFiles', 'zipTheme', 'svgrename', 'svgstore', 'imagemin', 'sass', 'scripts', 'es6', 'watch']);


/* ========================== Build The Theme ======================= */
const es = require('event-stream');
/**
 * Build task that moves essential theme files for production-ready sites
 *
 * buildFiles copies all the files in buildInclude to build folder - check variable values at the top
 * buildImages copies all the images from img folder in assets while ignoring images inside raw folder if any
 */

gulp.task('buildFiles', function () {
    return gulp.src(buildInclude)
        .pipe(gulp.dest(build))
        .pipe(notify({message: 'Copy from buildFiles complete', onLast: true}));
});

/**
 * zipPlugins task that zip plugins ( dima-shortcode,dima-portfolio) and move those
 * plugin into {theme}/framework/plugins/
 */
gulp.task('zipPlugins', function () {
    return es.merge(plugin_to_zip.map(function (obj) {
        return gulp.src(plugin_path + '/' + obj + '/**/')
            .pipe(zip(obj + '.zip'))
            .pipe(notify({message: 'Hooo! ' + obj + '.zip is complete', onLast: true}))
            .pipe(gulp.dest(plugin_build_path));
    }));
});

/*gulp.task('update-plugins', function () {
 return es.merge(plugin_to_zip.map(function (obj) {
 return gulp.src(plugin_build_path + '/' + obj + '.zip')
 //.pipe(decompress({strip: 1}))
 .pipe(decompress({strip: 1}))
 .pipe(notify({message: '^_^ Hooo! ' + obj + '.zip is complete', onLast: true}))
 .pipe(gulp.dest(plugin_path + '/' + obj));
 }));
 });*/

/**
 * Zipping build directory for distribution
 *
 * Taking the build folder, which has been cleaned, containing optimized files and zipping it up to send out as an installable theme
 */
gulp.task('zipTheme', ['buildFiles'], function () {
    return gulp.src('./**/')
        .pipe(zip(project + '.zip'))
        .pipe(notify({message: 'Hooo! ' + project + '.zip is complete', onLast: true}))
        .pipe(gulp.dest(build));
});

gulp.task('bot', ['buildFiles', 'zipTheme']);

/* ========================== !Build The Theme ======================= */