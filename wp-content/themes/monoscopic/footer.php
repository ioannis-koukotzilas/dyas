<footer class="site-footer">

	<div class="container">

		<div class="cc">c. 2023</div>

		<?php wp_nav_menu(['theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'primary-menu', 'container' => '']); ?>

		<?php wp_nav_menu(['theme_location' => 'menu-2', 'menu_id' => 'secondary-menu', 'menu_class' => 'secondary-menu', 'container' => '']); ?>

		<a href="https://github.com/ioannis-koukotzilas/dyas/tree/main/wp-content/themes/monoscopic" target="_blank" rel="noopener noreferrer">Source code</a>

	</div>

</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>