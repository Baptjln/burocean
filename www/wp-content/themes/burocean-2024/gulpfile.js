"use strict";
require('dotenv').config();

const gulp = require("gulp");
const del = require("del");
const plumber = require("gulp-plumber");

const sass = require("gulp-dart-sass");
const sassGlob = require('gulp-sass-glob');
const php2html = require('gulp-php2html');

const postcss = require("gulp-postcss");
const cssnano = require("cssnano");
const autoprefixer = require("autoprefixer");
const babel = require('gulp-babel');
const uglify = require("gulp-uglify");
const imagemin = require("gulp-imagemin");
const newer = require("gulp-newer");
const sourcemaps = require('gulp-sourcemaps');

var config = {
    prod: (process.env.NODE_ENV) === 'prod',
    html: (process.env.COMPILE_HTML) === 'true'
};

/**
 * Deletes the old assets folder
 */
function clean() {
    return del(["./assets/", "./public"]);
}

/**
 * Swallows error to prevent the stream from crashing, but logs the error
 */
function swallow(err) {
    console.log(err.message);
    this.emit('end');
}

/**
 * Builds and compresses images in /src/images/
 */
function images() {
    return gulp
        .src("./src/images/**/*")
        .pipe(newer("./assets/images"))
        .pipe(
            imagemin([
                imagemin.gifsicle({ interlaced: true }),
                imagemin.mozjpeg({ progressive: true }),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({
                    plugins: [
                        {
                            removeViewBox: false,
                            collapseGroups: true
                        }
                    ]
                })
            ])
        )
        .pipe(gulp.dest("./assets/images"))
}

/**
 * Compiles SCSS to CSS files
 */
function css() {
    const stream = gulp
        .src("./src/scss/**/*.scss")
        .pipe(plumber())
        .pipe(sassGlob())

    if (!config.prod) {
        stream
            .pipe(sourcemaps.init())
    }

    stream
        .pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError, swallow))
        .pipe(postcss([autoprefixer(), cssnano()]))
        .pipe(sourcemaps.write('.', { sourceRoot: 'css-source' }))
        .pipe(gulp.dest("./assets/css/"))

    return stream
}

/**
 * Javascript files in /src/js/
 */
function scripts() {
    const stream = gulp
        .src(["./src/js/**/*"])
        .pipe(plumber())
        .pipe(babel({
            presets: ['@babel/preset-env']
        }))

    if (config.prod) {
        stream
            .pipe(uglify().on('error', swallow))
    }

    stream.pipe(gulp.dest("./assets/js/"))

    return stream
}

/**
 * Builds fonts located in /src/fonts/
 */
function fonts() {
    return gulp
        .src(["./src/fonts/**/*"])
        .pipe(gulp.dest("./assets/fonts/"));
}

/**
 * Renders HTML templates found in /views/
 * Will build them in /public/
 */
function html() {
    return gulp
        .src("./views/**/*.php")
        .pipe(php2html().on('error', console.log))
        .pipe(gulp.dest("./public"))
}

/**
 * Watch files
 */
function watchFiles() {
    gulp.watch("./src/scss/**/*", css);
    gulp.watch("./src/js/**/*", gulp.series(scripts));
    gulp.watch("./src/images/**/*", images);
    if (config.html) {
        gulp.watch("./views/**/*", html)
    }
}

let tasks;

if (config.html) {
    tasks = gulp.parallel(html, css, images, fonts, scripts)
} else {
    tasks = gulp.parallel(css, images, fonts, scripts)
}

const build = gulp.series( clean, tasks );
const watch = gulp.parallel( watchFiles );

exports.images = images
exports.scripts = scripts
exports.fonts = fonts
exports.css = css
exports.html = html
exports.clean = clean

exports.build = build
exports.watch = watch
exports.default = build
