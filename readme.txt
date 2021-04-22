=== yith-proteo ===
Contributors: yithemes
Tags: one-column, two-columns, left-sidebar, right-sidebar, wide-blocks, accessibility-ready, block-styles, buddypress, custom-background, custom-colors, custom-header, custom-logo, custom-menu, editor-style, featured-images, flexible-header, footer-widgets, full-width-template, rtl-language-support, theme-options, threaded-comments, translation-ready, blog, e-commerce, education, entertainment, food-and-drink, holiday, news, photography, portfolio
Requires at least: 4.9.6
Tested up to: WordPress 5.7
Requires PHP: 5.6
Stable tag: 1.5.3.1
YITH Proteo WordPress Theme, Copyright 2020 YITH
YITH Proteo is distributed under the terms of the GNU GPL
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A starter theme called yith-proteo.

== Description ==

Proteo is a modern, fast and fully customizable WooCommerce theme. Designed and developed by YITH - a team of top developers of premium themes -  with a beautiful UI, a minimal design and an optimized code, is perfect for each kind of site or shop. With the Proteo Wizard you can import our demo content with just a few clicks - in less than 2 minutes! -  and easily customize it using the advanced front-end customizer. Proteo is the best solution if you want a complete WooCommerce theme that works perfectly also in mobile devices and start quickly to sell your products with WooCommerce without technical knowledge. Works perfectly with page builders like Elementor, Gutenberg & Visual composer. Key features: # WooCommerce Ready # Responsive with a perfect mobile design # Compatible with Elementor, Gutenberg, Visual Composer and others page builders # Translation Ready # Frontend customizer with hundred of options to customize header, footer, pages, typography, style, ecc.  # Google fonts support # Regularly updated and improved with new demos and advanced features # Support to all YITH plugins. Check all our Proteo demos: https://proteo.yithemes.com/

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

== Changelog ==
= 1.5.3.1 - April 22 2021 =
* Fix header search widget hover color
* Fix proteo-account-widget default icon display
* Fix topbar and header widget color

= 1.5.3 - April 21 2021 =
* New support for WooCommerce 5.2
* New custom responsive breakpoint options
* New widget typography options
* New social network added to the social profile widget (Skype, Pinterest, TikTok)
* New form element options
* New translation strings
* Fix Google Font json file include on local environments
* Fix select2 and form elements minimum width
* Fix issue with safari and background image support
* Fix products column display on iPad and table devices
* Fix cart page variable product display
* Fix select2 dropdown content typography
* Dev: new CSS classes to avoid styled radio and checkboxes (.yith-proteo-standard-checkbox - .yith-proteo-standard-radio)
* Dev: responsive style moved to independent CSS file responsive.css in theme root folder

= 1.5.2 - March 18 2021 =
* New site identity options
* New page title spacing options
* New design and better naming for all customizer options
* New options for mobile typography
* Add description to block editor color options
* Add context to screen reader strings
* Add translation context to all admin and customizer strings
* Add missing escape functions to some admin strings
* Improve button options preview
* Fix missing "header and footer" metabox on post/page/product
* Fix jQuery deprecated shorthands
* Fix jquery-migrate notices on mobile layout
* Fix empty <p> tags introduced with WP 5.7
* Fix page title icon alignment
* Fix page title conditions to be displayed in homepage with "inside" layout
* Fix hide page title option on Homepage, Shop and Blog
* Fix submenu white upper triangle
* Fix added to cart button style
* Fix sticky header default value
* Update .pot file and .po files
* Dev: fully tested support for WP 5.7
* Dev: improve code readability of header.php template
* Dev: new version upgrade procedure
* Dev: wrap loop product actions into a div
* Dev: minimize customizer scripts to improve performance
* Dev: exclude select elements with class "yith-proteo-standard-select" from select2 rendered elements

= 1.5.1 - February 22 2021 =
* Optimize all bundled images
* Improve performance minifying main theme.js script
* Improve display of out of stock products
* Fix customizer buttons preview
* Fix new spacing options for mobile layouts
* Fix sidebar handling for filtered shop
* Dev: added yith_proteo_woocommmerce_pages_title_layout trigger to manually fix page title layout

= 1.5.0 - February 11 2021 =
* New options to customize cart icon
* New option to manage site content spacing
* New metabox to manage page content spacing individually 
* New option to manage header spacing (top, right, bottom, left)
* New option to manage sticky header spacing (top, right, bottom, left)
* New option to manage main menu spacing (top, right, bottom, left)
* New option to manage topbar spacing (top, right, bottom, left)
* New options to manage site title and tagline spacing (top, right, bottom, left)
* New options to display/hide posts navigation, author, categories, tags and date
* New option to display a "view detail" link on products loop
* New option to manage page title alignment
* New option to manage page title layout
* New option to hide page/post title
* New option to display and hide blog page title
* New option to manage footer widget titles font size
* New option to manage footer widget titles color
* New option to manage header menu text transform property
* New option to manage header menu letter spacing property
* New option to for add to cart layout on loop
* New option to manage tagline position
* New css classes for Desire skin
* Improve sticky header calculations
* Improve display for sidebar metaboxes
* Improve loop add to cart style
* Improve products widget style
* Improve sidebar assignment for products
* Improve options naming and grouping
* Improve YITH WooCommerce Added to Cart Popup style
* Improve YITH WooCommerce Request a quote style
* Improve YITH WooCommerce Recently Viewed Products style
* Fix double menu displayed on clean installs
* Fix loop add to cart style for out of stock products
* Fix footer area empty spaces when no widget area is enabled
* Fix wrong customizer link in proteo dashboard
* Fix missing page title in blog page
* Fix minicart widget link colors issue with dark backgrounds
* Fix social widget title style issues
* Fix AOS animations delay
* Refactoring and grouping "footer" options
* Refactoring and grouping "header layout and style" options
* Refactoring and grouping "typography" options
* Refactoring and grouping "Site Identity" options
* Remove borders from customizer controls
* Remove white background from products
* Supporto to WooCommerce 5

= 1.4.5.1 - January 11 2021 =
* Fix missing default value on show site title option

= 1.4.5 - January 08 2021 =
* New support for WooCommerce 4.9
* New support to Revolution Slider. Now you can set a Revolution Slider as page header.
* New mobile menu sidebar widget area
* New filter yith_proteo_account_widget_text to override account widget greeting text
* New filter yith_proteo_account_widget_image_url to override account widget icon
* New options to enable/disable enhanced checkbox and radio buttons
* Make class YITH_Proteo_Account_Widget pluggable
* Fix mobile menu second and nested levels not opening

= 1.4.4 - December 22 2020 =
* Support to YITH Proteo Toolkit block patterns
* New Block editor color palette options
* New control to display or hide site descriptions
* New dependency controls for site identity panel
* New js trigger yith_proteo_inizialize_html_elements
* Remove unused sidebar metabox from cart, checkout and my-account pages
* Improved style for Edit Title form in wishlist page
* Better support for YITH WooCommerce Composite Product
* Add option to hide the clear variations link on product page
* Add found_variation to selectWoo triggers
* Fix centered header layout logo positioning issue
* Fix design and spacing of customizer menu panels
* Fix issue about group actions on admin panels
* Fix tagline not displayed when custom logo in use

= 1.4.3 - December 9 2020 =
* Removed deprecated .ready method from scripts
* Update language files
* Support to WP 5.6
* Support to WC 4.8

= 1.4.2 - December 7 2020 =
* New Proteo welcome screen
* New option to make website full width
* New filter yith_proteo_account_widget_url
* New design for buttons options panel
* New shop page sidebar management inside theme options
* Update language files
* Fix select2 customizer control width on ultrawide monitors
* Fix sanitize_callback for site tagline
* Make 'yith_proteo_massive_google_font_enqueue' function pluggable
* Phpcs for WordPress-Extra and Wordpress-Docs ruleset

= 1.4.1 - November 5 2020 =
* New sidebars options style
* New option style for header layout controls
* Add dependency control on all sidebar options
* Add missing dependency to sticky header and woocommerce store notice controls
* Add topbar options dependency controls
* Update all select options to select2 options
* Remove unused customizer help icon from site icon option
* Fix mobile typography unused values

= 1.4.0 - November 2 2020 =
* New customizer style
* New image radio control
* New yes/no control
* New on/off control
* New elements align options
* New help message on complex theme options
* New option to disable enhanced SELECT elements
* Migrate all sidebar controls to new radio control
* Remove unused customizer css
* Move "Additional Google Font" option to the bottom of typography panel
* Fix missing breadcrumb on product categories, tags and taxonomies
* Fix "Read how to retrieve a Google font url" broken link

= 1.3.10 - October 21 2020 =
* Added filter 'yith_proteo_select2_minimum_results_for_search'
* Updated theme description

= 1.3.9 - October 15 2020 =
* Fix sub-menu behaviour on touch devices
* Fix double scroll on full-width pages

= 1.3.8 - October 14 2020 =
* New options to hide/show Categories, tags and SKU un product page
* New Single product page title management
* New "Fullwidth cover image" single post layout option
* New options to customize "READ MORE" text
* New support to WooCommerce 4.6
* Fix overflow to .site-content element
* Fix shop page sidebar position issue
* Fix increase sticky header z-index
* Fix header sidebar width on mobile devices
* Fix mobile sticky header (disable under 992px)
* Fix 5 cols footer layout under 992px
* Fix 'Warning: Invalid argument supplied for foreach' github issue #10
* Fix remove product short description from Products widget

= 1.3.7 - September 30 2020 =
* New Professionally designed demo: Food Shop
* New single product page options
* New single product page options arrangement
* New option for Product hover effect: Alternative image - Glow + Alternative image
* New option for Product hover effect: None - Glow - Zoom
* New footer background options
* New footer sidebar options to manage width and position (with live preview)
* New option to style links decoration (none, underline)
* New topbar options for bottom border
* Add new blog post image size
* Add red border to CF7 controls with warning
* Add top margin to main product image area to match product summary area
* Add minimum width to production variation selector
* Improve appearance of latest posts block
* Improve pagination styling
* Improved css colors for slider dots
* Improved integration with YITH Quick View
* Extending gutenberg button style
* Update footer widget options with range controls instead of dropdowns
* Better spacing for Post Grid block
* Gutenberg buttons use same hover of button-style-1
* Fix cover block appearance with latest version of Gutenberg plugin
* Fix read more arrow
* Fix Loop add to cart button styling
* Fix columns block mobile spacing
* Fix variable product selection
* Fix "apply coupon" font size on cart page
* Fix minicart typography style fix
* Fix footer and widgets wrong fixed font weight


= 1.3.6 - September 11 2020 =
* New options for products in archives: title font size, title font color, price font size, price font color, add to cart font size
* New options for single product page: price color, price font size, quantity input font size, add to cart button font size
* New options to manage breadcrumbs
* Fix prevent page scrolling when full-screen search is opened
* Fix mobile menu font-size media query rule
* Improve scripts include functions

= 1.3.5 - September 08 2020 =
* Fix missing conditions to hide|show header icons

= 1.3.4 - September 08 2020 =
* New customizer options header and mobile layout
* Add support to display_header_text() WordPress template function
* New options to handle header sidebar and header icons on desktop and mobile
* Fix scrolling windows when mobile menu is opened
* Fix "alignwide blocks" image alignments to match new Gutenberg styles
* Fix the <p> tag font size to match customizer and gutenberg settings

= 1.3.3 - September 01 2020 =
* Fix typo in customizer inline style
* Fix typo in buttons.scss
* Add default value to css button variables
* Move google font enqueue after css variables

= 1.3.2 - August 31 2020 =
* New Google Font customizer control
* New typography options for body and headings
* New typography options for main menu
* New icon for the "update cart" link in cart page
* New options to manage single product page featured image (zoom, lightbox, slider)
* New scroll in minicart widget
* New woocommerce tables layout for mobile devices to fix issue with cart and order pages
* Add support to Gutenberg features: 'responsive-embeds', 'custom-units', 'custom-line-height','experimental-custom-spacing'
* Fix thank you page title typo
* Fix overlapping menu issues

= 1.3.1 - August 07 2020 =
* Fix in-page anchor links behavior on mobile menu
* Fix Show header sidebar option not working

= 1.3.0 - August 05 2020 =
* Rearrange Customizer panels and sections
* New option to hide or show "date badge" on blog pages
* New options for footer font size, color, link and alignment management
* New options for footer credits font size, color, link and alignment management
* New topbar font-color, font-size, alignment options
* New topbar links color options
* New option for "update cart" button (textual|button)
* New options for link colors
* New custom logo max width option
* Fix blog sidebar display
* Fix input quantity behaviour when value is empty
* Fix display button when product has no price in product loops
* Fix unstyled button style
* Fix header slider not working on blog page
* Fix yith_proteo_products_loop_add_to_cart_style option not working as expected
* Fix minicart product image issue with hidden visibility products
* Improved style for various YITH plugins
* Refactoring of all scss files
* Support to 'YITH Slider for page builders' on shop page
* Improved WordPress-Core and WordPress-Extra PHPCS
* Improved sticky footer behaviour
* Merge pull request #8 from mklasen/preventTermsExcerpt
* Remove Experimental Lazy Loading options
* Make required plugins function pluggable
* Avoid text decoration from topbar links


= 1.2.15 - July 22 2020 =
* Suggest YITH Proteo Toolkit plugin for a better onboardin experience
* New loop add to cart button style (unstyled | style 1 | style 2)
* Extend alpha color picker to all customizer options
* Remove branding from customizer panels
* Remove text logo zoom effect on page scroll
* Move customizer files to dedicated folders
* Updated Dutch language file (100%)


= 1.2.14 - July 08 2020 =
* Fix  `Call to undefined function is_product() in /wp-content/themes/yith-proteo/sidebar.php:45`

= 1.2.13 - July 08 2020 =
* Add Alpha Color Picker to theme customizer
* New option to force all products to use the same sidebar
* Add general sidebar management for blog categories and blog tags
* Experimental: lazy loading on loop product images
* Fix single product default sidebar behaviour
* Fix centered header layout issue when using custom logo
* Fix woocommerce label positioning in checkout pages
* Solve issue #5 opened by @design311 on github
* Remove reference to missing bootstrap .map file


= 1.2.12 - June 30 2020 =
* New option to set the default sidebar
* New cross sell products management options
* Improve style for: Filter by rating widget, Recent Product reviews widget, Product categories widget, Products by rating widget, Product search widget
* Fix related products management
* Fix wrong conditions for sidebar display


= 1.2.11 - June 26 2020 =
* Fix shop pages sidebar position management


= 1.2.10 - June 24 2020 =
* Add One Click Demo Import support and configuration
* Fix header submenus background color. Fix header widget colors. Fix mobile menu background color matching header background color.
* New sticky footer
* Improvements to YITH WooCommerce Subscription integration
* Improvements to YITH WooCommerce Frequently Bought Together integration
* Language files update


= 1.2.9 - June 17 2020 =
* New product taxonomy sidebar management (like YITH Brands)
* New my-account responsive toggle structure
* New wp_body_open hook for developers
* New Tagline color and font size options added to customizer
* New YITH WooCommerce Subscription plugin integration
* New Site Title color and font size options added to customizer
* New Youtube profile link to social profiles widget
* New Blog Single post layout
* Tweak: minor improvments to YITH Event Ticket integration
* Fix mobile menu toggle positioning
* Fix "centered logo" header layout style
* Fix sticky header unwanted side movement when revealing


= 1.2.8 - May 25 2020 =
* Fix "Undefined index" on menu location


= 1.2.7 - May 22 2020 =
* New options for main menu color
* New mobile menu position to use a different menu between desktop and mobile
* New login widget
* Move all customizer css from php file to css variables to reduce page impact, load time and increase performance
* Fix search widget button alignment
* Fix issue with header background color
* Enanched support to: Group block, Cover block, WooCommerce products block
* Improve cart shipping calculator css
* Refactor all scss files

= 1.2.6 - May 11 2020 =
* New: Suggested plugins message
* Fix: Merge pull request #3 from kloukas/bugfix-sidebar-metabox (Fixed a bug in Sidebar Metabox Html.)
* Tweak: PHPCS and WPCS improved
* Tweak: Minor improvements to Wishlist style integration

= 1.2.5 - Apr 30 2020 =
* Support to YITH Slider for page builders

= 1.2.4 - Apr 21 2020 =
* New customizer links to theme documentation and child theme

= 1.2.3 - Apr 20 2020 =
* New customizer options to set specific product category and product tag sidebars
* Update .pot language file

= 1.2.1 - Apr 20 2020 =
* Fix Customizer settings without sanitization callback function.

= 1.2.0 - Apr 20 2020 =
* New thankyou page layout
* New border-radius for buttons theme option
* New form inputs border-radius theme option
* New header fullwidth theme option
* New option to hide single page/post/product site header and footer
* New support to YITH Store Locator plugin
* Fix missing customizer css on child themes
* Fix minicart widget display issues with product variation attributes
* Fix quantity input arrows display issue
* Improved cart responsive design

= 1.1.0 - Apr 01 2020 =
* New tested support to WordPress 5.4
* New inline style for WooCommerce ordering and results count
* New style for product loop infos (title, price, buttons)
* New datepicker style when jqueryUI in use
* New Improved support to YITH plugins
* Update quantity form & coupon form style
* Update select2 style
* Fix form elements padding
* Fix mini cart on secondary sidebars style
* Fix menu dropdown elements style
* Fix header non sticky z-index
* Fix header sub menu flickering
* Fix cart shipping methods style
* Fix radio buttons and checkboxes click issue
* Fix trimmed product taxonomy description

= 1.0.10 - Mar 23 2020 =
* Fix missing escape and translate functions on customizer strings
* Fix copyright declaration
* Fix missing focus visual effects on form elements
* Update form components borders
* Update bundled language files
* Update screenshot file format from jpg to png
* Update remove unnecessary files from theme files

= 1.0.9 - Mar 19 2020 =
* New theme screenshot with credits
* New improved support to YITH various plugins
* Fix header backgrounds not working
* Fix missing focus on mobile menu opener button
* Fix untranslatable text on header template
* Fix function name prefix in widgets.php file
* Fix readme file structure

= 1.0.8 - Feb 28 2020 =
* Fix site description showed when custom logo is active
* Fix missing title icon

= 1.0.7 - Feb 28 2020 =
* Minimum PHP is now 5.6
* Fix theme code to match PHP WordPress Coding standards
* Fix blog posts date layout issue
* Fix menu layout issue
* Fix php notice
* Fix missing select2 scripts when WooCommerce is not enabled
* New screenshot with author credits

= 1.0.6 - Feb 24 2020 =
* Add Dutch translation file
* Fix css issue on radio buttons click
* Add "yith_proteo_myaccount_custom_icon" filter to change icons on my account page
* Add Greek language files
* Move woocommerce ordering on right side
* Fix sticky header behavior when header element is not present
* Add missing post date from Recent Posts widget
* Fix missing $post variable
* Add all third party css and js minified and unminified versions

= 1.0.5 - Dec 27 2019 =
* Italian translation file
* Spanish translation file
* update inline style
* update gutenberg cover block style

= 1.0.4 - Dec 20 2019 =
* update language .pot file
* fix order-pay screen css issue

= 1.0.3 - Dec 20 2019 =
* update localized strings
* update theme option labels
* update css for submenu navigation

= 1.0.2 - Dec 18 2019 =
* fix to two-cols cart layout on mobile
* cart responsive fixes
* fix widgets style
* fix products page alignments
* fix card shipping forms style
* fix cart update link style
* fix shipping calculator style
* fix checkout shipping style
* better support to gutenberg image block alignments
* fix CF7 contact form error messages color
* update search results page template


= 1.0.1 - Dec 12 2019 =
* Fix woocommerce templates text domain

= 1.0.0 - Dec 12 2019 =
* Initial release

== Resources ==

* Based on Underscores https://underscores.me/, (C) 2012-2019 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* AOS - Animate On Scroll Library https://michalsnik.github.io/aos/, (C) 2015 Michał Sajnóg, [MIT](https://opensource.org/licenses/MIT)
* Linearicons https://linearicons.com/, (C) https://perxis.com/, [CC BY-SA 4.0](https://creativecommons.org/licenses/by-sa/4.0)
* Simple Line Icons - https://github.com/thesabbir/simple-line-icons, [MIT](https://opensource.org/licenses/MIT)
* JQuery Modal https://github.com/kylefox/jquery-modal, (c) 2012 Kyle Fox, [MIT](https://opensource.org/licenses/MIT)
* Select2 - https://github.com/select2/select2,  (c) 2012-2017 Kevin Brown, Igor Vaynberg, and Select2 contributors, [MIT](https://opensource.org/licenses/MIT)
* bootstrap-grid.scss - https://github.com/twbs/bootstrap, (c) 2011-2020 the Bootstrap Authors and Twitter, Inc. Code released under the MIT License (https://opensource.org/licenses/MIT)
* TGM Plugin Activation - http://tgmpluginactivation.com/

== Screenshot Licenses ==

https://stocksnap.io/photo/ZI3P3U28P8 by Kris Kemp - [CC0 1.0](https://creativecommons.org/publicdomain/zero/1.0/)
https://stocksnap.io/photo/ODNPHGUMP7 by Icons8 team - [CC0 1.0](https://creativecommons.org/publicdomain/zero/1.0/)
https://stocksnap.io/photo/Y33U47TZA0 by Matthew Henry - [CC0 1.0](https://creativecommons.org/publicdomain/zero/1.0/)
https://stocksnap.io/photo/X6BW9YMWXV by Burst - [CC0 1.0](https://creativecommons.org/publicdomain/zero/1.0/)
https://stocksnap.io/photo/XPGUG6AKFB by Nordwood Themes - [CC0 1.0](https://creativecommons.org/publicdomain/zero/1.0/)
https://stocksnap.io/photo/0FMO7ARXDL by The Lazy Artist Gallery - [CC0 1.0](https://creativecommons.org/publicdomain/zero/1.0/)
https://stocksnap.io/photo/A79NQ95LOI by Daria Shevtsova - [CC0 1.0](https://creativecommons.org/publicdomain/zero/1.0/)
