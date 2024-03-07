<?php get_header(); ?>

<main class="site-main single library-single">

  <?php while (have_posts()) : the_post(); ?>
    <div class="container">
      <div class="grid">
        <div class="post">
          <header class="header">
            <?php the_published_date(); ?>
            <?php echo the_post_terms_with_archive('library_category', 'Library'); ?>
            <?php the_title('<h1 class="title">', '</h1>'); ?>
            <?php echo the_post_terms_without_links('library_author'); ?>
          </header>

          <?php if (get_field('post_summary')) : ?>
            <div class="summary"><?php the_field('post_summary'); ?></div>
          <?php endif; ?>

          <?php if (get_the_content()) : ?>
            <div class="content">
              <?php the_content(); ?>
            </div>
          <?php endif ?>

          <?php get_template_part('template-parts/related-links'); ?>

          <?php get_template_part('template-parts/attachments');  ?>
        </div>

        <?php
        global $custom_post_type;
        $custom_post_type = 'library_post';
        get_template_part('template-parts/related-posts');
        ?>
      </div>
    </div>
  <?php endwhile; ?>

</main>

<?php get_footer();
