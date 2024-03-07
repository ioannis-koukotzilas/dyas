<?php if (have_rows('attachments')) : ?>
  <div class="attachments">
    <div class="wrapper">
      <h2 class="title"><?php esc_html_e('Attachments', 'monoscopic'); ?></h2>
      <ul>
        <?php while (have_rows('attachments')) : the_row(); ?>
          <?php $attachment = get_sub_field('attachment'); ?>
          <?php if ($attachment) : ?>
            <li>
              <a class="download" href="<?php echo esc_url($attachment['url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($attachment['title']); ?></a>
            </li>
          <?php endif; ?>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
<?php endif; ?>