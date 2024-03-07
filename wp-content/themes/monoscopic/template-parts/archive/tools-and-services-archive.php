<?php get_header(); ?>

<main class="site-main archive tools-and-services-archive">

  <div class="container">

    <?php if (have_posts()) : ?>

      <header class="page-header">
        <div class="wrapper">
          <?php the_archive_title('<h1 class="title">', '</h1>'); ?>
          <?php if (get_field('tools_and_services_archive_description', 'option')) : ?>
            <div class="description"><?php the_field('tools_and_services_archive_description', 'option'); ?></div>
          <?php endif; ?>
        </div>
      </header>

      <div class="filter-wrapper">
        <?php get_template_part('template-parts/facets'); ?>

        <div class="facetwp-template">
          <div class="posts">
            <?php while (have_posts()) : the_post(); ?>
              <div class="post">
                <?php the_published_date(); ?>

                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                  <?php the_title('<h3 class="title">', '</h3>'); ?>
                </a>

                <?php if (get_field('post_summary')) : ?>
                  <div class="summary"><?php the_field('post_summary'); ?></div>
                <?php endif; ?>

                <?php if (get_the_excerpt()) : ?>
                  <div class="excerpt">
                    <?php the_excerpt(); ?>
                  </div>
                <?php endif; ?>

                <a class="underline" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                  <?php esc_html_e('Read more', 'monoscopic'); ?>
                </a>
              </div>
            <?php endwhile; ?>
          </div>

          <?php the_pagination() ?>
        </div>
      </div>

    <?php else : ?>

      <?php get_template_part('template-parts/content', 'none'); ?>

    <?php endif; ?>

  </div>

</main>

<?php get_footer();
