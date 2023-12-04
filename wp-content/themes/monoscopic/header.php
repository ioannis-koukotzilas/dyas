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

			<nav class="top-nav">
				<div class="container">
					<div class="site-description"><?php echo get_bloginfo('description', 'display'); ?></div>
				</div>
			</nav>

			<nav class="main-nav">
				<div class="container">
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php wp_nav_menu(['theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'primary-menu', 'container' => '']); ?>
				</div>
			</nav>

		</header>