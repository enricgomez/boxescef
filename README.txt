=== Custom Call to action Elementor Addon ===
Contributors: enricgomez
Requires at least: 5.6
Tested up to: 7.0
Requires PHP: 7.4
Stable tag: 2.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Elementor widget "Custom Call To Action": image, title, description and an icon button, each with its own link.

== Description ==

Adds the "Custom Call To Action" widget (custom_call_to_action) to Elementor. It is used, for example, in the
accommodation cards on campingelfar.com. Title, description and the three links are translatable with WPML.

== Installation ==

1. Upload the `c_c_t_a` folder to `/wp-content/plugins/` (or upload the zip from Plugins > Add New > Upload, replacing the current version).
2. Activate the plugin.

== Changelog ==

= 2.1.0 =
* Fix: the icon was printed twice (a loose copy next to the button), because render_icon() was called inside empty().
* Fix: title and description are now sanitized on output (wp_kses_post).
* Fix: duplicated 'selector' key in the image overlay background control (only ::before was ever used; kept that).
* Fix: stray "s" after a CSS rule in c_c_t_a-public.css.
* WPML: image, title and icon links are now translatable, registered with the correct format for URL controls.
* Icon size and colour controls also apply to SVG icons.
* Removed unused `use` statements and the closing PHP tag of the widget file; direct access guard added.

= 2.0.0 =
* WPML support for title, description and image link (Enric Gómez).
