<?php get_header(); ?>

<main class="site-main archive tools-and-services-archive">

  <div class="container">

    <?php if (have_posts()) : ?>

      <header class="page-header">
        <?php the_archive_title('<h1 class="title">', '</h1>'); ?>
        <?php the_archive_description('<div class="description">', '</div>'); ?>
      </header>

      <div class="filter-wrapper">
        <?php get_template_part('template-parts/facets'); ?>

        <div class="posts">
          <?php while (have_posts()) : the_post(); ?>
            <div class="post">
              <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                  <figure class="featured-image">
                    <?php the_post_thumbnail('large'); ?>
                  </figure>
                <?php endif; ?>

                <?php the_published_date(); ?>
                <?php the_title('<h3 class="title">', '</h3>'); ?>
              </a>

              <?php if (get_field('post_summary')) : ?>
                <div class="summary"><?php the_field('post_summary'); ?></div>
              <?php endif; ?>

              <?php the_excerpt(); ?>
            </div>
          <?php endwhile; ?>
        </div>
      </div>

      <?php the_posts_navigation(); ?>

    <?php else : ?>

      <?php get_template_part('template-parts/content', 'none'); ?>

    <?php endif; ?>

  </div>

</main>

<?php get_footer();
