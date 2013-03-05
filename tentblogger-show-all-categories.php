<?php
/*
Plugin Name: TentBlogger Show All Categories
Plugin URI: http://tentblogger.com/show-all-categories
Description: This plugin does one very simple thing and yet can change the way you blog by saving you tons of time: It shows all your categories in the blog post editing screen in WordPress. No more scrolling to find that missing category! This is especially helpful if you've got a number of sub-categories as well.
Version: 2.3
Author: TentBlogger
Author URI: http://tentblogger.com
License:

    Copyright 2011 - 2012 TentBlogger (info@tentblogger.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class TentBlogger_Show_All_Categories {

	/*--------------------------------------------*
	 * Constructors and Filters
	 *---------------------------------------------*/

	function __construct() {
		if(function_exists('add_action')) {
			add_action('admin_init', array($this, 'add_category_css'));
		} // end if
	} // end constructor
	
	/*--------------------------------------------*
	 * Functions
	 *---------------------------------------------*/
	
	/**
	 * Includes the category list expander CSS files if the user is on the post page
	 * or the new post page.
	 */
	public function add_category_css() {
		if(is_admin()) {
			$this->load_file('tentblogger-show-all-post-categories-style', '/tentblogger-show-all-post-categories/css/tentblogger-category-list-expander.css');
		} // end if
	} // end add_category_css
	
	/*--------------------------------------------*
	 * Private Functions
	 *---------------------------------------------*/
	
	/**
	 * Helper function for registering and loading scripts and styles.
	 *
	 * @name	The 	ID to register with WordPress
	 * @file_path		The path to the actual file
	 * @is_script		Optional argument for if the incoming file_path is a JavaScript source file.
	 */
	private function load_file($name, $file_path, $is_script = false) {
		$url = WP_PLUGIN_URL . $file_path;
		$file = WP_PLUGIN_DIR . $file_path;
		if(file_exists($file)) {
			if($is_script) {
				wp_register_script($name, $url);
				wp_enqueue_script($name);
			} else {
				wp_register_style($name, $url);
				wp_enqueue_style($name);
			} // end if
		} // end if
	} // end _load_file
	
} // end class
new TentBlogger_Show_All_Categories();