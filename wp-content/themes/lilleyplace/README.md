# Lilley Place Wordpress Theme

This theme is built on [Foundation](http://foundation.zurb.com), check out the docs while you are there to get a grasp of some of the features that are being used.

## Requirements

This theme is using Sass instead of normal CSS, so please don't edit style.css, there's nothing there but Wordpress theme info. Instead please look at /assets/scss instead if you want to make changes to the theme.

The Sass has been compiled using [Codekit](https://incident57.com/codekit/) and outputs to /assets/css. Planning to move over to Gulp in the near future.

The Javascript has been concatenated using Codekit too and outputs to /assets/js/min.

The language files have been made using [Poedit](https://poedit.net) and are in the /languages folder.

This theme has number of dependencies and they need to be installed and activaed as Wordpress plugins for it to function properly.
The list is here:

[Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/) - Also needs fields to be created as well, contact me for more information
[Advanced Custom Fields: Repeater Field](http://www.advancedcustomfields.com/) - Same as above
[Contact Form 7](https://wordpress.org/plugins/contact-form-7/) - Using custom css/js instead, see the /assets/scss folder
[Really Simple CAPTCHA](https://wordpress.org/plugins/really-simple-captcha/) - Only if needed to use a CAPTCHA with Contact Form 7
[Relevanssi](https://wordpress.org/plugins/relevanssi/) - Having this installed will allow search results to display the content of custom fields
[WP Maintenance Mode](https://wordpress.org/plugins/wp-maintenance-mode/) - When maintenance mode is activated, wp-maintenance-mode.php will show instead of the normal site