<?php

if (is_admin()) {

  // Add Admin Scripts
  function wpb_add_admin_scripts()
  {
    // Styles for Widget and Config Panel
    wp_enqueue_style('wpb-admin-style', plugins_url() . '/brief/assets/css/styles-admin.css');

    // Markdown Convertor
    wp_enqueue_script('wpb-showdown', plugins_url() . '/brief/assets/js/showdown.js');

    // Scripts for Plugin
    wp_enqueue_script('wpb-main-script', plugins_url() . '/brief/assets/js/scripts-admin.js', 'jquery');
  }

  add_action('admin_init', 'wpb_add_admin_scripts');
}
