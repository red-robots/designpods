/* Gulpfile 4.0 */

var project             = 'DesignPods'; // Project Name.
var projecturl          = 'http://designpods.test/'; // Project URL. Could be something like localhost:8888.


var styleSRC            = './assets/sass/style.scss'; // Path to main .scss file.
var styleDestination    = './'; // Path to place the compiled CSS file.
								// Defualt set to root folder.


var jsVendorSRC         = './assets/js/vendors/*.js'; // Path to JS vendors folder.
var jsVendorDestination = './assets/js/'; // Path to place the compiled JS vendors file.
var jsVendorFile        = 'vendors'; // Compiled JS vendors file name.
									// Default set to vendors i.e. vendors.js.


var jsCustomSRC         = './assets/js/custom/*.js'; // Path to JS custom scripts folder.
var jsCustomDestination = './assets/js/'; // Path to place the compiled JS custom scripts file.
var jsCustomFile        = 'custom'; // Compiled JS custom file name.
									// Default set to custom i.e. custom.js.


var imagesSRC			= './images-raw/*.{png,jpg,gif,svg}'; // Source folder of images which should be optimized.
var imagesDestination	= './images/'; // Destination folder of optimized images. Must be different from the imagesSRC folder.var imagesDestination	= './assets/img/'; // Destination folder of optimized images. Must be different from the imagesSRC folder.


// Watch files paths.
var styleWatchFiles     = './assets/sass/**/*.scss'; // Path to all *.scss files inside css folder and inside them.
var vendorJSWatchFiles  = './assets/js/vendors/*.js'; // Path to all vendors JS files.
var customJSWatchFiles  = './assets/js/custom/*.js'; // Path to all custom JS files.


// Browsers you care about for autoprefixing.
// Browserlist https://github.com/ai/browserslist
const AUTOPREFIXER_BROWSERS = [
    'last 2 version',
    '> 1%',
    'ie >= 9',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4',
    'bb >= 10'
  ];


/**
 * Load Plugins.
 *
 * Load gulp plugins and assing them semantic names.
 */
var gulp         = require('gulp'); // Gulp of-course

// CSS related plugins.
var sass         = require('gulp-sass'); // Gulp pluign for Sass compilation
var minifycss    = require('gulp-uglifycss'); // Minifies CSS files
var autoprefixer = require('gulp-autoprefixer'); // Autoprefixing magic

// JS related plugins.
var concat       = require('gulp-concat'); // Concatenates JS files
var uglify       = require('gulp-uglify'); // Minifies JS files

// Image realted plugins.
var imagemin     = require('gulp-imagemin'); // Minify PNG, JPEG, GIF and SVG images with imagemin.

// Utility related plugins.
var rename       = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
var sourcemaps   = require('gulp-sourcemaps'); // Maps code in a compressed file (E.g. style.css) back to it’s original position in a source file (E.g. structure.scss, which was later combined with other css files to generate style.css)
var notify       = require('gulp-notify'); // Sends message notification to you
var browserSync  = require('browser-sync').create(); // Reloads browser and injects CSS. Time-saving synchronised browser testing.
var reload       = browserSync.reload; // For manual browser reload.

const through2  = require( 'through2' );
const touch = () => through2.obj( function( file, enc, cb ) {
  if ( file.stat ) {
    file.stat.atime = file.stat.mtime = file.stat.ctime = new Date();
  }
  cb( null, file );
});

function reload(done) {
	browserSync.reload();
	done();
}


/**
 * Task: `browser-sync`.
 */

 gulp.task( 'browser-sync', function() {
 	browserSync.init( {

 		// For more options
 		// @link http://www.browsersync.io/docs/options/

 		// Project URL.
 		proxy: projecturl,

 		// Stop the browser from automatically opening.
 		open: false,

 		// Inject CSS changes.
 		// Comment it to reload browser for every CSS change.
 		// injectChanges: true,

 		// Use a specific port (instead of the one auto-detected by Browsersync).
 		// port: 7000,

 	} );
 });


/**
 * Task: `styles`.
 *
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 *
 * This task does the following:
 * 		1. Gets the source scss file
 * 		2. Compiles Sass to CSS
 * 		3. Writes Sourcemaps for it
 * 		4. Autoprefixes it and generates style.css
 * 		5. Renames the CSS file with suffix .min.css
 * 		6. Minifies the CSS file and generates style.min.css
 * 		7. Injects CSS or reloads the browser via browserSync
 */
gulp.task('styles', function () {
 	gulp.src( styleSRC )
		.pipe( sourcemaps.init() )
		.pipe(sass().on('error', sass.logError))
		.pipe( sourcemaps.write( { includeContent: false } ) )
		.pipe( sourcemaps.init( { loadMaps: true } ) )
		.pipe( autoprefixer( AUTOPREFIXER_BROWSERS ) )

		.pipe( sourcemaps.write ( styleDestination ) )
		.pipe( touch() )
		.pipe( gulp.dest( styleDestination ) )

		.pipe( rename( { suffix: '.min' } ) )
		.pipe( minifycss( {
			maxLineLen: 10
		}))
		.pipe( gulp.dest( styleDestination ) )
		.pipe( browserSync.stream() )
		//.pipe(browserSync.reload({stream: true}))
		.pipe( notify( { message: 'TASK: "styles" Completed!', onLast: true } ) )
});


/**
 * Task: `vendorJS`.
 *
 * Concatenate and uglify vendor JS scripts.
 *
 * This task does the following:
 * 		1. Gets the source folder for JS vendor files
 * 		2. Concatenates all the files and generates vendors.js
 * 		3. Renames the JS file with suffix .min.js
 * 		4. Uglifes/Minifies the JS file and generates vendors.min.js
 */
gulp.task( 'vendorsJs', function() {
	//gulp.src( jsVendorSRC )
	gulp.src( [
		'./assets/js/vendors/parallax.js',
		'./assets/js/vendors/wow.js',
		'./assets/js/vendors/blocks.js',
		'./assets/js/vendors/masonry.js',
		'./assets/js/vendors/imagesloaded.js'
		] )
		.pipe( concat( jsVendorFile + '.js' ) )
		.pipe( gulp.dest( jsVendorDestination ) )
		.pipe( rename( {
			basename: jsVendorFile,
			suffix: '.min'
		}))
		.pipe( uglify() )
		.pipe( gulp.dest( jsVendorDestination ) )
		.pipe( notify( { message: 'TASK: "vendorsJs" Completed!', onLast: true } ) );
});


/**
 * Task: `customJS`.
 *
 * Concatenate and uglify custom JS scripts.
 *
 * This task does the following:
 * 		1. Gets the source folder for JS custom files
 * 		2. Concatenates all the files and generates custom.js
 * 		3. Renames the JS file with suffix .min.js
 * 		4. Uglifes/Minifies the JS file and generates custom.min.js
 */
gulp.task( 'customJS', function() {
 	gulp.src( jsCustomSRC )
		.pipe( concat( jsCustomFile + '.js' ) )
		.pipe( gulp.dest( jsCustomDestination ) )
		.pipe( rename( {
			basename: jsCustomFile,
			suffix: '.min'
		}))
		.pipe( uglify() )
		.pipe( gulp.dest( jsCustomDestination ) )
		.pipe( notify( { message: 'TASK: "customJs" Completed!', onLast: true } ) );
});


/**
 * Task: `images`.
 *
 * Minifies PNG, JPEG, GIF and SVG images.
 *
 * This task does the following:
 * 		1. Gets the source of images raw folder
 * 		2. Minifies PNG, JPEG, GIF and SVG images
 * 		3. Generates and saves the optimized images
 *
 * This task will run only once, if you want to run it
 * again, do it with the command `gulp images`.
 */
gulp.task( 'images', function() {
	gulp.src( imagesSRC )
		.pipe( imagemin( {
					progressive: true,
					optimizationLevel: 3, // 0-7 low-high
					interlaced: true,
					svgoPlugins: [{removeViewBox: false}]
				} ) )
		.pipe(gulp.dest( imagesDestination ))
		.pipe( notify( { message: 'TASK: "images" Completed!', onLast: true } ) );
});


//Do everything once!
function watch() {
	gulp.watch( styleWatchFiles, gulp.series('styles') );
	gulp.watch( customJSWatchFiles, gulp.series('customJS',reload) );
	gulp.watch( vendorJSWatchFiles, gulp.series('vendorsJs',reload) );
	//gulp.watch( styleWatchFiles, gulp.series('images') );
}

var build = gulp.parallel('styles', 'vendorsJs', 'customJS', 'browser-sync', watch);
gulp.task(build);
gulp.task('default', build);

