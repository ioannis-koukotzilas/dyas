<?php
global $custom_post_type;
$currentID = get_the_ID();
$query = new WP_Query(array(
  'post_type' => $custom_post_type,
  'posts_per_page' => 6,
  'post__not_in' => array($currentID),
));
?>

<?php if ($query->have_posts()) : ?>
  <div class="related-posts">
    <div class="wrapper">
      <h3 class="section-title"><?php _e('Recent Articles'); ?></h3>
      <ul class="items">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
          <li class="item">
            <?php the_published_date(); ?>
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
              <?php the_title('<h3 class="title">', '</h3>'); ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>