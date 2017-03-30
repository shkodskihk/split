# Split Theme BETA

Split is a WordPress theme based on Underskeleton.

Mobile Friendly, fast and easy to work with. Underskeleton is the WordPress Starter Theme for your next WordPress Theme or Website. It has beautiful typography, custom colors options and a whole set of editing options in the content editor.


Visit the Underskeleton Project Website: http://getunderskeleton.com

## Stable version

The `master` branch is used for ongoing changes and integration of feature branches.

The stable version is aways the latest release and the version you get at WordPress Themes Directory, [see releases](https://github.com/diegoversiani/split/releases).

## Changelog

        == v0.0.1 March 30th 2017 ==
               - Initial Commit from Underskeleton copy.

## Features

- Widgets Selective Refresh, Custom Logo and Editor Style support
- Translation ready, comes with en-US and pt-BR.
- Combines Underscore’s PHP/JS files and Skeleton Boilerplate HTML/CSS.
- Single minified CSS and JS file for all the basic stuff.
- Simple RTL file.
- Jetpack ready.

#### Features to come

At the moment there is not a list of planned features.

Have a feature request? Please [open an issue](https://github.com/diegoversiani/split/issues) at Github!

## Installation


Download ZIP from [latest release](https://github.com/diegoversiani/underskeleton/releases) or `master` branch. Then:

- Login to your WordPress backend
- Go to Appearance → Themes → Add New → Upload Theme
- Select your theme file → Install Now
- Activate the theme


#### Manual Installation

- Download Underskeleton zip file from GitHub
- Extract files and change the folder name from `underskeleton-master` to `underskeleton` (or one of your choice)
- Upload it into your WordPress themes subfolder: `/wp-content/themes/`
- Login to your WordPress backend
- Go to Appearance → Themes
- Activate the Underskeleton theme

## Folder structure

Most of the folder structure is inherited from _s. Its files are well documented, have a look ;)

Bellow is just Split's file structure

```
split/
  └── css                            
    └── theme.css         // Compiled theme css file
    └── theme.min.css     // Minified version of compiled theme styles
  └── js
    └── *.js              // Compiled javascript files scripts
    └── *.min.js          // Minified version of compiled javascript files scripts
  └── js-src
    └── assets            // Folder for assets from other projects, ie _s.
    └── *.js              // Compiled javascript files scripts
  └── sass
    └── theme             // Folder containing uncompiled Sass files
    └── theme.scss        // Uncompiled theme scss files that basically @imports all other scss files
  └── style.css           // WordPress theme identification file
  ...
```

## Developer Tools

Split is developed with NPM, Bower, Gulp, SASS, Browser Sync and Css Autoprefixer. You can develop without these tools, but its just a lot faster with them ;)

#### Installing Dependencies
- Make sure you have installed `Node.js`, `Bower`, and `Browser-Sync` on your computer globally. To install Bower and Browser-Sync, run*:
```
# May require root/administrator permissions

$ npm install -g bower
$ npm install -g browser-sync
```
- Open your terminal and browse to the location of your Split copy
- Run these comands:
```
# install node.js packages, install bower dependencies, copy assets to source folder

$ npm install
$ bower install
```

#### Running

To work and compile your SASS and JS files on the fly, run:

`$ gulp watch`

Or, to run with Browser-Sync:

- First change the browser-sync options to reflect your environment in `/gulpfile.js` file in the beginning of the file:
```javascript
var browserSyncOptions = {
    proxy: "localhost/split/", // <----- CHANGE HERE
    notify: false
};
```
- then run gulp default task: `$ gulp`
- alternativelly, run: `$ gulp watch-bs`

If you just want to build once:

`$ gulp build-css` or
`$ gulp build-scripts`

#### Want to contribute?

Split is in it's early stages and a lot has to be done yet.

Fork the project, make the change you want to see. Or email me at [diegoversiani@gmail.com](mailto:diegoversiani@gmail.com).

Keep updated about the project: Watch or Star the repository.

## Credits and License

Split WordPress Theme, Copyright 2016 [Diego Versiani](http://diegoversiani.me)
Split WordPress Theme is distributed under the terms of the GNU [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)

* Based on Underskeleton https://getunderskeleton.com/, (C) 2016 [Diego Versiani](http://diegoversiani.me), [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* Based on Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* Skeleton-Sass http://github.com/WhatsNewSaes/Skeleton-Sass/, (C) 2016 Seth Coelen, [MIT](http://opensource.org/licenses/MIT)
* Skeleton http://github.com/dhg/Skeleton/, (C) 2014 Dave Gamache, [MIT](http://opensource.org/licenses/MIT)

## Acknowledgement

Skeleton was created by [Dave Gamache](https://twitter.com/dhg) for a better web.

Skeleton-Sass was created by [Seth Coelen](http://sethcoelen.com) for a better Skeleton.

Underskeleton was created by [Diego Versiani](http://diegoversiani.me) for a better WordPress.

<a href='https://ko-fi.com/A0212ZQ' target='_blank'><img height='32' style='border:0px;height:32px;' src='https://az743702.vo.msecnd.net/cdn/kofi3.png?v=a' border='0' alt='Buy Me a Coffee at ko-fi.com' /></a>