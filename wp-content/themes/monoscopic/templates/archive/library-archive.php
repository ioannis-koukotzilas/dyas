<?php get_header(); ?>

<main class="site-main archive library-archive">

  <div class="container">

    <?php if (have_posts()) : ?>

      <header class="page-header">
        <?php the_archive_title('<h1 class="title">', '</h1>'); ?>
        <?php the_archive_description('<div class="description">', '</div>'); ?>
      </header>

      <div class="posts">

        <?php while (have_posts()) : the_post(); ?>

          <a class="post" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">

            <?php the_published_date(); ?>
            <?php the_title('<h3 class="title">', '</h3>'); ?>

            <?php if (get_field('post_summary')) : ?>
              <div class="summary"><?php the_field('post_summary'); ?></div>
            <?php endif; ?>

            <?php the_excerpt(); ?>

          </a>

        <?php endwhile; ?>

      </div>

      <?php the_posts_navigation(); ?>

    <?php else : ?>

      <?php get_template_part('template-parts/content', 'none'); ?>

    <?php endif; ?>

  </div>

</main>

<?php get_footer();
