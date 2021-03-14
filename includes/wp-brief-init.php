<?php
function wpb_settings($links)
{
  $links[] = '<a href="' .
    admin_url('options-general.php?page=wpb-options') .
    '">' . __('Settings') . '</a>';
  return $links;
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wpb_settings');
