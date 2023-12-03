<?php if (have_rows('gallery')) : ?>
  <div class="gallery">
    <div class="wrapper">
      <header class="header">
        <h2 class="title"><?php esc_html_e('Gallery', 'monoscopic'); ?></h2>
      </header>

      <div class="images">
        <?php while (have_rows('gallery')) : the_row(); ?>
          <?php $gallery_image = get_sub_field('gallery_image'); ?>
          <?php if ($gallery_image) : ?>
            <?php $image_array = wp_get_attachment_image_src($gallery_image, 'large'); ?>
            <?php $image_url = $image_array[0]; ?>
            <a href="<?php echo esc_url($image_url); ?>" target="_blank" rel="noopener noreferrer">
              <?php echo wp_get_attachment_image($gallery_image, 'medium_large'); ?>
            </a>
          <?php endif; ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
<?php endif; ?>