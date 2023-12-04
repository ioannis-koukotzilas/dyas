<?php if (have_rows('attachments')) : ?>
  <div class="attachments">
    <h2 class="title"><?php esc_html_e('Attachments', 'monoscopic'); ?></h2>
    <ul class="files">
      <?php while (have_rows('attachments')) : the_row(); ?>
        <?php $attachment = get_sub_field('attachment'); ?>
        <?php if ($attachment) : ?>
          <li class="file">
            <a href="<?php echo esc_url($attachment['url']); ?>"><?php echo esc_html($attachment['filename']); ?></a>
          </li>
        <?php endif; ?>
      <?php endwhile; ?>
    </ul>
  </div>
<?php endif; ?>