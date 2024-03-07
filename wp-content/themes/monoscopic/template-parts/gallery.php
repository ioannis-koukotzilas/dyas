<?php $gallery_images = get_field('gallery'); ?>
<?php if ($gallery_images) :  ?>
  <div class="gallery">
    <div class="wrapper">
      <header class="header">
        <h2 class="title"><?php esc_html_e('Photos', 'monoscopic'); ?></h2>
      </header>

      <div class="grid">
        <?php $count = 0; ?>
        <?php foreach ($gallery_images as $index => $gallery_image) : ?>
          <?php if ($count >= 18) break; ?>
          <a href="<?php echo esc_url($gallery_image['url']); ?>" class="gallery-item" data-index="<?php echo $index; ?>">
            <img src="<?php echo esc_url($gallery_image['sizes']['medium_large']); ?>" alt="<?php echo esc_attr($gallery_image['alt']); ?>" />
          </a>
          <?php $count++; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Swiper Modal -->
  <div id="gallery-modal">
    <div class="wrapper">

      <div class="swiper gallery-swiper">
        <div class="swiper-wrapper">
          <?php foreach ($gallery_images as $gallery_image) : ?>
            <div class="swiper-slide">
              <img src="<?php echo esc_url($gallery_image['sizes']['2048x2048']); ?>" alt="<?php echo esc_attr($gallery_image['alt']); ?>">
              <?php if (!empty($gallery_image['caption'])) : ?>
                <div class="caption">
                  <div class="wrapper">
                    <?php echo esc_html($gallery_image['caption']); ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>

        <div class="swiper-pagination"></div>

        <div class="swiper-navigation">
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>
      </div>
      <div class="close-modal symbol">close</div>
    </div>
  </div>
<?php endif; ?>