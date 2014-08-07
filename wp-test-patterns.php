<?php
/*
Plugin Name: WP Test Patterns
Plugin URI:
Description: Example test patterns for WordPress
Version: 1.0
Author: Curtis McHale, Justin Sternberg
Author URI:
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
 * Kills some WC stuff we don't want on the product configurator page
 *
 * @see tests/test-Remove_Action.php
 *
 * @since 1.0
 * @author SFNdesign, Curtis McHale
 *
 * @param null      $post       optional        Only used for unit testing
 * @global $post                                WordPress post global
 * @uses has_shortcode()                        Returns true if content has given shortcode
 * @uses remove_action()                        Removes action from specified hook
 * @return bool                                 remove_action returns true if the action was removed
 */
function remove_woocommerce_breadcrumb(){

	$value = remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

	return $value;

} // kill_wc
add_action( 'wp_head', 'remove_woocommerce_breadcrumb' );
