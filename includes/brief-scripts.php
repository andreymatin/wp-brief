<?php

if (is_admin()) {

  // Add Admin Scripts
  function wpb_add_admin_scripts()
  {
    // Styles for Widget and Config Panel
    wp_enqueue_style('wpb-admin-style', plugins_url('/assets/css/styles-admin.css', __FILE__));

    // Markdown Convertor
    wp_enqueue_script('wpb-showdown', plugins_url('/assets/js/showdown.js', __FILE__));

    // Scripts for Plugin
    wp_enqueue_script('wpb-main-script', plugins_url('/assets/js/scripts-admin.js', __FILE__), 'jquery');
  }

  add_action('admin_init', 'wpb_add_admin_scripts');
}
