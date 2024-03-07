<?php get_header(); ?>

<main class="site-main page search">

  <div class="container">

    <?php if (have_posts()) : ?>

      <header class="header">
        <div class="wrapper">
          <h1 class="title"><?php esc_html_e('Search', 'monoscopic'); ?></h1>

          <?php get_search_form(); ?>

          <div class="results">
            <?php
            printf(esc_html__('Query results for: %s', 'monoscopic'), '<strong>' . get_search_query() . '</strong>');
            echo ' <strong>(' . $wp_query->found_posts . ')</strong>';
            ?>
          </div>
        </div>
      </header>

      <div class="posts">

        <?php while (have_posts()) : the_post(); ?>

          <div class="post">

            <?php the_published_date(); ?>

            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
              <?php the_title('<h3 class="title">', '</h3>'); ?>
            </a>

            <?php echo the_post_terms_without_links('library_author'); ?>

            <?php if (get_field('post_summary')) : ?>
              <div class="summary"><?php the_field('post_summary'); ?></div>
            <?php endif; ?>

            <?php if (get_the_excerpt()) : ?>
              <div class="excerpt">
                <?php the_excerpt(); ?>
              </div>
            <?php endif; ?>

          </div>
        <?php endwhile; ?>

        <?php the_pagination() ?>

      </div>

    <?php else : ?>
      <header class="header">
        <div class="wrapper">
          <h1 class="title"><?php esc_html_e('Search', 'monoscopic'); ?></h1>

          <?php get_search_form(); ?>

          <div class="results">
            <?php
            printf(esc_html__('No query results for: %s', 'monoscopic'), '<strong>' . get_search_query() . '</strong>');
            ?>
          </div>
        </div>
      </header>

    <?php endif; ?>

  </div>

</main>

<?php
get_footer();