<?php
/*
Template Name: Home
Template Post Type: page
*/
?>

<?php get_header(); ?>

<main class="site-main page home">

  <?php if (have_rows('highlight')) : ?>
    <div class="highlights">
      <div class="wrapper">
        <div class="swiper highlights-swiper">
          <div class="swiper-wrapper">
            <?php while (have_rows('highlight')) : the_row(); ?>
              <?php $highlight_image = get_sub_field('highlight_image'); ?>
              <?php $highlight_link = get_sub_field('highlight_link'); ?>
              <?php if ($highlight_image) : ?>
                <div class="swiper-slide">
                  <?php if ($highlight_link) : ?>
                    <a href="<?php echo esc_url($highlight_link['url']); ?>" target="<?php echo esc_attr($highlight_link['target']); ?>">
                      <?php echo wp_get_attachment_image($highlight_image, 'full'); ?>
                      <div class="content">
                        <div class="wrapper">
                          <div class="title"><?php the_sub_field('highlight_title'); ?></div>
                          <div class="description"><?php the_sub_field('highlight_description'); ?></div>
                        </div>
                      </div>
                    </a>
                  <?php else : ?>
                    <?php echo wp_get_attachment_image($highlight_image, 'full'); ?>
                    <div class="content">
                      <div class="wrapper">
                        <div class="title"><?php the_sub_field('highlight_title'); ?></div>
                        <?php $highlight_description = get_sub_field('highlight_description'); ?>
                        <?php if ($highlight_description) : ?>
                          <div class="description"><?php the_sub_field('highlight_description'); ?></div>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            <?php endwhile; ?>
          </div>
          <div class="swiper-navigation">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <section class="identity">
    <div class="wrapper">
      <div class="grid">
        <div class="col">
          <h2 class="title"><?php esc_html_e('What is DARIAH-GR / DYAS?', 'monoscopic'); ?></h2>
          <div class="subtitle"><?php esc_html_e('DYAS — Research Infrastructure Network for the Humanities implements the mission of the Greek research infrastructure for the arts and humanities DARIAH-GR.', 'monoscopic'); ?></div>
          <div class="description"><?php esc_html_e('The infrastructure supports the Greek scientific communities of the arts and humanities and contributes to the development of research with the use of information technologies, expands the scope of research through the interconnection of distributed digital resources of various kinds, promotes access, use, creation and long-term preservation of research data in digital format and supports the exchange of knowledge, methods and work practices between scientific communities.', 'monoscopic'); ?></div>
          <div class="dyas-dariah"></div>
        </div>

        <div class="col">
          <h2 class="title"><?php esc_html_e('What is the National Infrastructure APOLLONIS?', 'monoscopic'); ?></h2>
          <div class="subtitle"><?php esc_html_e('APOLLONIS is the national infrastructure that supports and promotes digital arts and humanities, and language technology and innovation in Greece.', 'monoscopic'); ?></div>
          <div class="description"><?php esc_html_e('It arose from the partnership of the two infrastructure components CLARIN:EL and DARIAH-GR / DYAS and, in the current phase, has as its primary object to further consolidate the services of the two infrastructure components, within a framework of interoperability and mutual support. At the same time, Greece continues to participate in the corresponding European infrastructures.', 'monoscopic'); ?></div>
          <div class="apollonis"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="search-section">
    <div class="wrapper">
      <?php get_search_form(); ?>
    </div>
  </section>

  <?php
  $query = new WP_Query(array(
    'post_type' => 'tools_services_post',
    'post__in' => array(63, 29, 115, 84),
  ));
  ?>

  <?php if ($query->have_posts()) : ?>
    <section class="tools-and-services">
      <div class="wrapper">
        <h2 class="section-title"><?php esc_html_e('Tools and Services', 'monoscopic'); ?></h2>

        <div class="posts">
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <a class="post" href="<?php the_permalink(); ?>">

              <?php if (has_post_thumbnail()) : ?>
                <figure class="featured-image">
                  <?php the_post_thumbnail('large'); ?>
                </figure>
              <?php endif; ?>

              <div class="content">
                <?php the_title('<h3 class="title">', '</h3>'); ?>

                <?php if (get_field('post_summary')) : ?>
                  <div class="summary"><?php the_field('post_summary') ?></div>
                <?php endif; ?>
              </div>
            </a>
          <?php endwhile; ?>
        </div>

      </div>
    </section>

    <?php wp_reset_postdata(); ?>
  <?php endif; ?>

  <?php
  $query = new WP_Query(array(
    'post_type' => 'community_post',
    'posts_per_page' => 4,
  ));
  ?>

  <?php if ($query->have_posts()) : ?>
    <div class="news">
      <div class="wrapper">
        <h3 class="section-title"><?php _e('Recent news'); ?></h3>
        <ul class="items">
          <?php while ($query->have_posts()) : $query->the_post(); ?>
            <li class="item">
              <?php the_published_date(); ?>
              <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                <?php the_title('<h3 class="title">', '</h3>'); ?>
                <?php the_excerpt(); ?>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
    <?php wp_reset_postdata(); ?>
  <?php endif; ?>

</main>

<?php
get_footer();