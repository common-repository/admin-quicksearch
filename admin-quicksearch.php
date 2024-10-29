<?php
/**
 * Admin Quicksearch
 * 
 * Copyright 2010, 2011 by hakre <http::/hakre.wordpress.com>, some rights reserved.
 *
 * Wordpress Plugin Header:
 * 
 *   Plugin Name:    Admin Quicksearch
 *   Plugin URI:     http://hakre.wordpress.com/plugins/admin-quicksearch/
 *   Description:    Quicksearch the Admin Menu and Plugin Tables.
 *   Version:        0.2.2
 *   Min WP Version: 2.9
 *   Author:         hakre
 *   Author URI:     http://hakre.wordpress.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

return (defined('WP_ADMIN') && WP_ADMIN)
		? adminQuickSearchPlugin::bootstrap()
		: null;

/**
 * Admin Quicksearch Plugin Class
 * 
 * @since 0.1
 * @author hakre
 */
class adminQuickSearchPlugin {
	static protected $instance;
	static public function bootstrap() {
		(null === adminQuickSearchPlugin::$instance)
		&& adminQuickSearchPlugin::$instance = new adminQuickSearchPlugin();
		
		return adminQuickSearchPlugin::$instance;
	}
	public function __construct() {
		add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
	}
	public function enqueue_scripts($hook_suffix) {
		switch($hook_suffix) {
			case 'plugins.php':
			case 'plugin-install.php':
			default:
				wp_enqueue_script('admin-quicksearch-js',  plugins_url('', __FILE__).'/admin-quicksearch.js');
		}
	}
}

#EOF;