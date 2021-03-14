<?php

if (is_admin()) {

  // Add Admin Scripts
  function wpb_add_admin_scripts()
  {
    wp_enqueue_style('wpb-admin-style', plugins_url() . '/wp-brief/assets/dist/styles/main.css');
    wp_enqueue_script('wpb-main-script', plugins_url() . '/wp-brief/assets/dist/javascript/app.js', 'jquery');
  }

  add_action('admin_init', 'wpb_add_admin_scripts');
}

function allow_contributor_uploads()
{
  $contributor = get_role('contributor');
  $contributor->add_cap('upload_files');
  $contributor->add_cap('edit_published_posts');
  $contributor->add_cap('edit_others_posts');
}
add_action('admin_init', 'allow_contributor_uploads');
