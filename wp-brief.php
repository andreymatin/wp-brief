<?php

/**
 * @link              https://github.com/andreymatin
 * @since             1.0.0
 * @package           WP Brief
 *
 * @wordpress-plugin
 * Plugin Name:       WP Brief
 * Plugin URI:        https://github.com/andreymatin/wp-brief
 * Description:       Technical documentation
 * Version:           1.0.0
 * Author:            Andrew Matin
 * Author URI:        https://github.com/andreymatin
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpb
 * Domain Path:       /languages
 **/

if (!defined('ABSPATH')) {
  exit;
}

define('WPB_VERSION', '1.0.0');

// Global Options Variable
$wpb_options = get_option('wpb_settings');

if (is_admin()) {
  require_once(plugin_dir_path(__FILE__) . '/includes/wp-brief-init.php');
  require_once(plugin_dir_path(__FILE__) . '/includes/wp-brief-scripts.php');
  require_once(plugin_dir_path(__FILE__) . '/includes/wp-brief-widget.php');
  require_once(plugin_dir_path(__FILE__) . '/includes/wp-brief-settings.php');
}
