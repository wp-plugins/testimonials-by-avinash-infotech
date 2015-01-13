=== Testimonials by Avinash Infotech ===
Contributors: Sarmistha Chatterjee
Donate link: http://www.avinashinfotech.com/
Tags: testimonials, widget, shortcode, feedback, customers
Requires at least: 3.0
Tested up to: 4.0
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


Show off what your customers are saying about your business and how great they say you are, using our shortcode or widget.

== Description ==

"Testimonials by Avinash Infotech" is a clean and easy-to-use testimonials management system for WordPress. Load in what your customers are saying about your business, and display the testimonials via a shortcode or widget.

Looking for a helping hand? [View plugin documentation](http://www.avinashinfotech.com/blog/testimonials/).


== Usage ==

To display your testimonials via a theme or a custom plugin, please use the following code:

'<?php do_action( 'testimonials' ); ?>'

To add arguments to this, please use any of the following arguments, using the syntax provided below:

* 'limit' => 5 (the maximum number of items to display)
* 'per_row' => 3 (when creating rows, how many items display in a single row?)
* 'orderby' => 'menu_order' (how to order the items - accepts all default WordPress ordering options)
* 'order' => 'DESC' (the order direction)
* 'id' => 0 (display a specific item)
* 'display_author' => true (whether or not to display the author information)
* 'display_avatar' => true (whether or not to display the author avatar)
* 'display_url' => true (whether or not to display the URL information)
* 'echo' => true (whether to display or return the data - useful with the template tag)
* 'size' => 50 (the pixel dimensions of the image)
* 'title' => '' (an optional title)
* 'before' => '&lt;div class="widget AI_Widget_Testimonials"&gt;' (the starting HTML, wrapping the testimonials)
* 'after' => '&lt;/div&gt;' (the ending HTML, wrapping the testimonials)
* 'before_title' => '&lt;h2&gt;' (the starting HTML, wrapping the title)
* 'after_title' => '&lt;/h2&gt;' (the ending HTML, wrapping the title)
* 'category' => 0 (the ID/slug of the category to filter by)

The various options for the "orderby" parameter are:

* 'none'
* 'ID'
* 'title'
* 'date'
* 'menu_order'

'<?php do_action( 'testimonials', array( 'limit' => 10, 'display_author' => false ) ); ?>'

The same arguments apply to the shortcode which is '[testimonials]'.

== Usage Examples ==

Adjusting the limit and image dimension, using the arguments in the 2 possible methods:

do_action() call:

`<?php do_action( 'testimonials', array( 'limit' => 10, 'size' => 100 ) ); ?>`


[testimonials] shortcode:

'[testimonials limit="10" size="100"]'

== Installation ==

Installing "Testimonials by Avinash Infotech" can be done either by searching for "Testimonials by Avinash Infotech" via the "Plugins > Add New" screen in your WordPress dashboard, or by using the following steps:

1. Download the plugin via WordPress.org.
1. Upload the ZIP file through the "Plugins > Add New > Upload" screen in your WordPress dashboard.
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action( 'testimonials' ); ?>` in your templates, or use the provided widget or shortcode.

== Frequently Asked Questions ==

= The plugin looks unstyled when I activate it. Why is this? =

"Testimonials by Avinash Infotech" is a lean plugin that aims to keep it's purpose as clean and clear as possible. Thus, we don't load any preset CSS styling, to allow full control over the styling within your theme or child theme.


== Screenshots ==

1. The testimonials management screen within the WordPress admin.
2. Display Testimonial Shortcode Screenshot
3. Display Testimonial Widget Screenshot


== Changelog ==

= 1.0.0 - 2015-01-06 =
* Initial release.

== Upgrade Notice ==

= 1.0.0 =
* Initial release, Avinash Infotech
