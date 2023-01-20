<?php
/*
 * Plugin Name: Sticky Header & Hide When Scroll Down
 * Plugin URI: https://kodlamayabasla.com
 * Description: A plugin that hides header on scroll down and appear on scroll up. Only works on Astra Themes.
 * Version: 1.0.1
 * Author: Halil Sen
 * Author URI: https://kodlamayabasla.com
 * License: GPLv2 or later
 * 
 * Copyright 2022 KodlamayaBasla
 * 
 * KodlamayaBasla is free software: you can redistribute 
 * it and/or modify it under the terms of the GNU General Public License as published
 * by the Free Software Foundation, either version 3 of the License, 
 * or (at your option) any later version. 
 * 
 * KodlamayaBasla is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
 * See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with KodlamayaBasla. 
 * If not, see <https://www.gnu.org/licenses/>.
 */

 function hwsd_hide_when_scroll_down() {
    $my_file = plugins_url( '/assets/css/hide-header-when-scroll.css', __FILE__ );
	wp_register_style('hwsd_hide_when_scroll_down_header_plugin_css', $my_file);
	wp_enqueue_style('hwsd_hide_when_scroll_down_header_plugin_css');

	$my_file = plugins_url( '/assets/js/hide_navbar_scrolldown.js', __FILE__ );
	wp_register_script('hwsd_hide_when_scroll_down_header_plugin_js', $my_file, array(), null, true);
	wp_enqueue_script('hwsd_hide_when_scroll_down_header_plugin_js');
}
add_action('wp_enqueue_scripts', 'hwsd_hide_when_scroll_down', 999);
