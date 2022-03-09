<p align="center">
<img src="https://img.shields.io/github/v/release/yithemes/yith-proteo?label=stable" alt="Latest release">
<img src="https://img.shields.io/github/license/yithemes/yith-proteo" alt="License">
<img src="https://img.shields.io/github/last-commit/yithemes/yith-proteo" alt="Last commit">
<img src="https://img.shields.io/github/languages/code-size/yithemes/yith-proteo" alt="Code size">
</p>


YITH Proteo
===

**YITH Proteo** is a modern, fast and fully customizable WooCommerce theme.  
Designed and developed by [YITH](https://yithemes.com/) - a team of top developers of premium plugins and themes -  with a beautiful UI, a minimal design and an optimized code, is perfect for each kind of site or shop.
With the Proteo Wizard you can import our demo content with just a few clicks - in less than 2 minutes! -  and easily customize it using the advanced front-end customizer.  
Proteo is the best solution if you want a complete WooCommerce theme that works perfectly also in mobile devices and start quickly to sell your products with WooCommerce without technical knowledge.  
Works perfectly with page builders like Elementor, Gutenberg & Visual composer.   

Key features: 
- WooCommerce Ready 
- Responsive with a perfect mobile design 
- Compatible with Elementor, Gutenberg, Visual Composer and others page builders 
- Translation Ready 
- Frontend customizer with hundred of options to customize header, footer, pages, typography, style, ecc.  
- Google fonts support 
- Regularly updated and improved with new demos and advanced features 
- Support to all YITH plugins.  

Check all our YITH Proteo demos: [https://proteo.yithemes.com/](https://proteo.yithemes.com/)  

YITH Proteo is distributed under the terms of the GNU GPL.

Screenshot
---------------

![Theme screenshot](https://proteo.yithemes.com/wp-content/uploads/2020/09/group-6.jpg)

Installation & Development
---------------

### Requirements

`YITH Proteo` requires the following dependencies:

- [Node.js](https://nodejs.org/)

### Setup

To start using all the tools that come with `YITH Proteo`  you need to install the necessary Node.js dependencies :

```sh
$ npm install
```


### Available CLI commands

`YITH Proteo` comes packed with CLI commands tailored for theme development :

- `grunt watch` : starts a watcher for your .scss files and compilate them to .css when saved.
- `grunt uglify` : uglify and minimize all bundled .js files.
- `grunt default` : compiles .scss files into .css file and uglify all .js files. Map files are added for the main .css files to help you debug and navigate the source .scss files.
- `grunt dist` : compiles .scss files into .css file and uglify all .js files. No .css sourcemap added. Use this prior to create a bundle package using the next `npm run bundle` command.
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.

### Windows users note

If you run into problems while using grunt tasks, it may be necessary to do, only the first time, the following:

- open the Git Bash console with Administrative permissions
- `npm install -g sass`
- `npm install -g grunt-cli`

Documentation
-------------

You can view detailed YITH Proteo documentation on the [YITH documentations website](https://docs.yithemes.com/yith-proteo/).

Translations
--------------

YITH Proteo translations can be downloaded from [WordPress.org](https://translate.wordpress.org/projects/wp-themes/yith-proteo).

To use one of these translations it is recommended that you upload it to the folder `wp-content/languages/themes/`. 

Adding .mo files to this location means the file will not be lost when you update the theme.

### Contribute to localize YITH Proteo

Localization is a very important part of every WordPress theme.  

We have a project on [translate.wordpress.org](https://translate.wordpress.org/projects/wp-themes/yith-proteo). You can join the localization team of your language and help by translating YITH Proteo.

Help & support
---------------

You can post help requests on the [WordPress support forums](https://wordpress.org/support/theme/yith-proteo/). Please remember, GitHub is for bug reports and contributions, _not_ support.