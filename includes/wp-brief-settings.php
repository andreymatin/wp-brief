<?php

// Create menu Link
function wpb_options_menu_link()
{
  add_options_page(
    'Brief Options',
    'Brief',
    'manage_options',
    'wpb-options',
    'wpb_options_content'
  );
}

// Create Options Page Content
function wpb_options_content()
{

  // Init Options Global
  global $wpb_options;

  ob_start(); ?>
  <div class="wrap">
    <h2><?php _e('Brief Settings', 'wpb_domain'); ?></h2>
    <p><?php _e('Settings for Brief plugin', 'wpb_domain'); ?></p>
    <form method="post" action="options.php">
      <?php settings_fields('wpb_settings_group'); ?>
      <table class="form-table">
        <tbody>

          <!-- Enable / Disable Script -->
          <tr>
            <th scope="row"><label for="wpb_settings[enable]"><?php _e('Enable', 'wpb_domain'); ?></label></th>
            <td><input name="wpb_settings[enable]" type="checkbox" id="wpb_settings[enable]" value="1" <?php checked('1', $wpb_options['enable']); ?></td>
          </tr>

          <!-- Changelog Textarea -->
          <tr>
            <th scope="row">
              <label for="wpb_settings[changelog]"><?php _e('Changelog', 'wpb_domain'); ?></label>
            </th>
            <td>
              <textarea name="wpb_settings[changelog]" id="wpb_settings[changelog]" class="large-text" rows="10" cols="50"><?php echo $wpb_options['changelog']; ?></textarea>
              <p class="description"><?php _e('Last changes for the site, reports', 'wpb_domain'); ?></p>
            </td>
          </tr>

          <!-- Documentation Textarea -->
          <tr>
            <th scope="row"><label for="wpb_settings[doc]"><?php _e('Documentation', 'wpb_domain'); ?></label></th>
            <td>
              <textarea name="wpb_settings[doc]" type="text" id="wpb_settings[doc]" class="large-text" rows="10" cols="50"><?php echo $wpb_options['doc']; ?></textarea>
              <p class="description"><?php _e('Documentation, instructions, FAQ', 'wpb_domain'); ?></p>
            </td>
          </tr>

        </tbody>
      </table>
      <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'wpb_domain'); ?>" </p>
    </form>
  </div>
<?php
  echo ob_get_clean();
}

add_action('admin_menu', 'wpb_options_menu_link');

// Register Settings
function wpb_register_settings()
{
  register_setting('wpb_settings_group', 'wpb_settings');
}

add_action('admin_init', 'wpb_register_settings');
