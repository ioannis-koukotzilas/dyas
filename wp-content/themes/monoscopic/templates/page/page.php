<?php get_header(); ?>

<main class="site-main page">

	<?php while (have_posts()) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

			<?php the_content(); ?>

		</article>

	<?php endwhile; ?>

</main>

<?php get_footer();
