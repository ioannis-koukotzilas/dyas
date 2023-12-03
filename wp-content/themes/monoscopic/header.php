<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="site">

		<header class="site-header">

			<div class="container">

				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>

				<div class="site-description"><?php echo get_bloginfo('description', 'display'); ?></div>

				<?php wp_nav_menu(['theme_location' => 'menu-1', 'menu_id' => 'primary-menu']); ?>

			</div>

		</header>