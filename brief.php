<?php

/**
 * @link              https://github.com/andreymatin
 * @since             1.0.0
 * @package           Brief
 *
 * @wordpress-plugin
 * Plugin Name:       Brief
 * Plugin URI:        
 * Description:       Development reports and documentation
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
  require_once(plugin_dir_path(__FILE__) . '/includes/brief-scripts.php');
  require_once(plugin_dir_path(__FILE__) . '/includes/brief-widget.php');
  require_once(plugin_dir_path(__FILE__) . '/includes/brief-settings.php');

  /**
   * Add Settings Link
   *
   * @param [type] $links
   * @return void
   */
  function wpb_settings($links)
  {
    $links[] = '<a href="' . admin_url('options-general.php?page=wpb-options') . '">' . __('Settings') . '</a>';
    return $links;
  }

  add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wpb_settings');
}
