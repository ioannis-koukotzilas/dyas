<div class="facets">
  <div class="facetwp-flyout-open"><?php esc_html_e('Filters', 'monoscopic'); ?></div>
  
  <div class="wrapper">
    <?php
    if (is_post_type_archive('tools_services_post') || is_tax('tools_services_category')) {
      echo do_shortcode('[facetwp facet="tools_and_services_categories"]');
      echo do_shortcode('[facetwp facet="year"]');
      echo do_shortcode('[facetwp facet="tools_and_services_tags"]');
    } elseif (is_post_type_archive('community_post') || is_tax('community_category')) {
      echo do_shortcode('[facetwp facet="community_categories"]');
      echo do_shortcode('[facetwp facet="year"]');
      echo do_shortcode('[facetwp facet="community_tags"]');
    } elseif (is_post_type_archive('library_post') || is_tax('library_category')) {
      echo do_shortcode('[facetwp facet="library_categories"]');
      echo do_shortcode('[facetwp facet="library_authors"]');
      echo do_shortcode('[facetwp facet="year"]');
    }
    ?>
  </div>
</div>