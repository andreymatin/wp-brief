<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
  exit;
}

function wpb_delete_plugin()
{
  delete_option('wpb_settings');
}

wpb_delete_plugin();
