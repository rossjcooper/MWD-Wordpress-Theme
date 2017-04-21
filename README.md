# MWD Wordpress Theme
A starter theme designed for the modern web developer using the latest and most popular development tools and patterns.

## Requirements
* [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* [Node/npm](https://nodejs.org/en/download/)

## Installation
This theme is designed to be used a starting point to developing your own theme with most the leg work done for you. Please do not install this theme how it comes out the box as it is the bare-minimum. 
These installation instructions are for development.

1. Clone/download the repo.
2. `cd` into the theme's directory.
3. Run `composer install` to download all php packages.
4. Run `npm install` to download all `node_modules`.
5. Run `npm install -g gulp` (if not already installed globally).
4. Run `bower install` to download bower components, saved to `libs/` directory.

## Styling and Javscript
This theme currently uses [gulp.js](http://gulpjs.com/) to run tasks to build the production `.css` and `.js` files into the `public/` directory.

To compile and minify simply run `gulp`, or `gulp watch` to watch files for changes and auto-run build tasks.

### Sass Files
Sass files should be in the `src/sass/` directory. They will compile and build both a minified and non-minified `.css` version of each main `.scss` file in the `src/sass/` directory. Gulp also uses [gulp-autoprefixer](https://github.com/postcss/autoprefixer) to automatically add vendor prefixes to `css`.
### Javascript Files
Javascript files should be in the `src/js/` directory. Gulp will concatinate all `.js` files into one and produce both a `main.js` and a `main.min.js` file in the `public/js` directory.

## Issues
Please report any issues or suggestions to the [issue tracker](https://github.com/rossjcooper/MWD-Wordpress-Theme/issues).
