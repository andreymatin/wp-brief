<?php

if (is_admin()) {

  // Add Scripts
  function wpb_add_admin_sripts()
  {
    wp_enqueue_style('wpb-admin-style', plugins_url() . '/wp-brief/includes/css/style.css');
    wp_enqueue_script('wpb-mdparser-script', 'https://unpkg.com/showdown/dist/showdown.min.js');
    wp_enqueue_script('wpb-main-script', plugins_url() . '/wp-brief/includes/js/main.js');
  }

  add_action('admin_init', 'wpb_add_admin_sripts');
}
