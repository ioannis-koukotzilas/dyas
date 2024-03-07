<?php get_header(); ?>

<main class="site-main page">

	<div class="container">

		<header class="header">
			<h1 class="title"><?php esc_html_e('That’s an error.', 'monoscopic'); ?></h1>
		</header>

		<div class="content">
			<p><?php esc_html_e('The requested URL was not found on this server.', 'monoscopic'); ?></p>
		</div>
	</div>

</main>

<?php get_footer();
