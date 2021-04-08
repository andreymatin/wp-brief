<?php
global $brief_options;

function brief_dashboard_widgets()
{
  global $wp_meta_boxes;

  wp_add_dashboard_widget('custom_help_widget', 'Brief', 'brief_dashboard_help');
}

function brief_dashboard_help()
{
  global $brief_options;

  $brand_url = $brief_options['brand_url'];
  $brand_img = wp_get_attachment_url($brief_options['brand']);
?>
  <div id="brief-widget" class="brief-widget">

    <?php if (! empty($brand_url) && ! empty($brand_img)) : ?>
      <a class="brief-brand-link" href="<?php echo $brand_url; ?>" target="_blank">
        <img id='brief-brand' src='<?php echo $brand_img; ?>' width='100'>
      </a>
    <?php endif; ?>

    <div class="brief-tabs">
      <ul class="brief-tabs-list">
        <li class="brief-tabs-items">
          <a class="brief-tabs-links active" href="#briefChangelog">Changelog</a>
        </li>
        <li class="brief-tabs-items">
          <a class="brief-tabs-links" href="#briefDocs">Readme</a>
        </li>
      </ul>
    </div>

    <div class="brief-tabs-content">

      <!-- Changelog Card -->
      <div id="briefChangelog" class="brief-tabs-card active">
        <h3>Recently Changed</h3>

        <div class="brief-tabs-card__content">
          <?php
          echo PHP_EOL . $brief_options['changelog'];
          ?>
        </div><!-- /.brief-tabs-card__content -->
      </div>

      <!-- Docs Card -->
      <div id="briefDocs" class="brief-tabs-card">
        <div class="brief-tabs-card__content">
          <?php
          echo PHP_EOL . $brief_options['doc'];
          ?>
        </div>
      </div>
    </div>

    <div class="brief-tabs-card__footer">
      <a class="brief-expand" href="#">Expand</a>
    </div><!-- /.brief-tabs-card__footer -->
  </div>
<?php
}

if ($brief_options['enable']) {
  add_action('wp_dashboard_setup', 'brief_dashboard_widgets');
}
