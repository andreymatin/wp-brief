<?php
global $wpb_options;

function wpb_dashboard_widgets()
{
  global $wp_meta_boxes;

  wp_add_dashboard_widget('custom_help_widget', 'Brief', 'wpb_dashboard_help');
}

function wpb_dashboard_help()
{
  global $wpb_options;

  $brand_url = $wpb_options['brand_url'];
  $brand_img = wp_get_attachment_url($wpb_options['brand']);
?>
  <div id="brief-widget" class="brief-widget">

    <?php if (! empty($brand_url) && ! empty($brand_img)) : ?>
      <a class="wpb-brand-link" href="<?php echo $brand_url; ?>" target="_blank">
        <img id='wpb-brand' src='<?php echo $brand_img; ?>' width='100'>
      </a>
    <?php endif; ?>

    <div class="wpb-tabs">
      <ul class="wpb-tabs-list">
        <li class="wpb-tabs-items">
          <a class="wpb-tabs-links active" href="#wpbChangelog">Changelog</a>
        </li>
        <li class="wpb-tabs-items">
          <a class="wpb-tabs-links" href="#wpbDocs">Readme</a>
        </li>
      </ul>
    </div>

    <div class="wpb-tabs-content">

      <!-- Changelog Card -->
      <div id="wpbChangelog" class="wpb-tabs-card active">
        <h3>Recently Changed</h3>

        <div class="wpb-tabs-card__content">
          <?php
          echo PHP_EOL . $wpb_options['changelog'];
          ?>
        </div><!-- /.wpb-tabs-card__content -->
      </div>

      <!-- Docs Card -->
      <div id="wpbDocs" class="wpb-tabs-card">
        <div class="wpb-tabs-card__content">
          <?php
          echo PHP_EOL . $wpb_options['doc'];
          ?>
        </div>
      </div>
    </div>

    <div class="wpb-tabs-card__footer">
      <a class="wpb-expand" href="#">Expand</a>
    </div><!-- /.wpb-tabs-card__footer -->
  </div>
<?php
}

if ($wpb_options['enable']) {
  add_action('wp_dashboard_setup', 'wpb_dashboard_widgets');
}
