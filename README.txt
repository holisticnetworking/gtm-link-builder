=== Google Tag Manager Link Builder ===
Contributors: dragonflyeye
Tags: seo, google
Requires at least: 5.1
Tested up to: 5.1
Stable tag: 0.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create links with Google Tag Manager data attributes of your choice. Set defaults for page-wide settings.

== Description ==

The genesis of this project was a company I worked for that was setting category and title GTM tags on every link on a given
website. This offers your client a very flexible way of being very specific about understanding the paths visitors take on
a website, just as GTM promises. But as always, the problem was the error-prone nature of hand-setting HTML links with the
proper attributes.

The solution this plugin sets out to provide is a developer-friendly means to ensure complete GTM coverage of all links on a
WordPress page, post or CPT. To that end, this project seeks to accomplish the following:
1. Allow the user to enter their GTM ID
1. Provide the header and body GTM script tags (or allow the option not to)
1. Create an object in the global scope for all page loads that provides a set of functions for creating GTM links
programmatically
1. GTM object should provide a set of default values for variables. This list of defaults could come from site-wide
options, page-specific meta values or programmer-set variables in the call.
1. Shortcode that produces all the same output as the object in the body of a post.
1. Some means of also providing this functionality to navigation menus.

== Installation ==

You know the drill. Download, upload, activate.

Using the object should be as simple as:
`global $gtm_link_builder;`

== Frequently Asked Questions ==

= A question that someone might have =

Good question, dude!

== Screenshots ==

Stay tuned!

== Changelog ==

= 0.1beta =
Initial commit to GitHub

== Upgrade Notice ==

= 0.1beta =
Cover your butts

== Contributions ==

This project is being developed on GitHub. Please support this project with your own bug fixes, suggestions and help!
https://github.com/holisticnetworking/gtm-link-builder
