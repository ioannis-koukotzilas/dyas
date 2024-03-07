<?php if (have_rows('related_links')) : ?>
  <div class="related-links">
    <div class="wrapper">
      <?php
      $post_type = get_post_type();

      if ($post_type == 'tools_services_post') {
        $title = esc_html__('Related Links', 'monoscopic');
      } elseif ($post_type == 'community_post') {
        $title = esc_html__('Related Links', 'monoscopic');
      } elseif ($post_type == 'library_post') {
        $title = esc_html__('Related Links', 'monoscopic');
      } elseif ($post_type == 'page') {
        $title = esc_html__('Related Links', 'monoscopic');
      } else {
        $title = esc_html__('Related Links', 'monoscopic');
      }
      ?>

      <h2 class="title"><?php echo $title; ?></h4>
      <ul>
        <?php while (have_rows('related_links')) : the_row(); ?>
          <li>
            <?php $related_link = get_sub_field('related_link'); ?>
            <?php if ($related_link) : ?>
              <a href="<?php echo esc_url($related_link['url']); ?>" target="<?php echo esc_attr($related_link['target']); ?>"><?php echo esc_html($related_link['title']); ?></a>
            <?php endif; ?>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
<?php endif; ?>