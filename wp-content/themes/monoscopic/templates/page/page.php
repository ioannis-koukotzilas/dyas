<?php get_header(); ?>

<main class="site-main page page-<?php the_ID(); ?>">

	<div class="container">

		<?php while (have_posts()) : the_post(); ?>

			<header class="header">
				<?php the_title('<h1 class="title">', '</h1>'); ?>
			</header>

			<?php if (get_the_content()) : ?>
				<div class="content">
					<?php the_content(); ?>
				</div>
			<?php endif ?>

		<?php endwhile; ?>

	</div>

</main>

<?php get_footer();
