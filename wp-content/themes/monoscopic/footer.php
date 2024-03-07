<footer class="site-footer">
	<div class="side-projects">
		<div class="wrapper">
			<div class="grid">
				<div class="col">
					<div class="draseis-logo"></div>
					<div class="wrap">
						<a class="title" href="/activities-in-progress//"><?php esc_html_e('Activities in progress', 'monoscopic'); ?></a>
						<div><?php esc_html_e('Visit this page to read the latest news from our partners about activities currently under development and to contribute to our ongoing projects.', 'monoscopic'); ?></div>
					</div>
				</div>

				<div class="col">
					<div class="dhtrip-logo"></div>
					<div class="wrap">
						<a class="title" href="/dht-r-ip/">DHt(r)ip</a>
						<div><?php esc_html_e('Join DHt(r)ip. On the first Friday of the month, you will receive in your email an issue dedicated to a topic of interest to the digital humanities community.', 'monoscopic'); ?></div>
						<a class="subscribe underline" href="http://eepurl.com/gfR_wn" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Subscribe', 'monoscopic'); ?></a>
					</div>
				</div>

				<div class="col">
					<div class="nema-logo"></div>
					<div class="wrap">
						<a class="title" href="http://nema.dyas-net.gr/" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Nema', 'monoscopic'); ?></a>
						<div><?php esc_html_e('A discussion space for the Digital Humanities. Ηere you will find all past issues of DHt(r)ip.', 'monoscopic'); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<nav class="footer-navigation">
		<div class="wrapper">
			<div class="identity">
				<a href="/"><?php bloginfo('name'); ?> — <?php echo get_bloginfo('description', 'display'); ?></a>
				<div class="dyas-dariah-logo"></div>
				<a href="https://www.dariah.eu/" target="_blank" rel="noopener noreferrer"><?php esc_html_e('DARIAH-EU — Digital Research Infrastructure for the Arts and Humanities', 'monoscopic'); ?></a>
				<div class="dariah-logo"></div>
			</div>

			<div class="contact-info">
				<a href="https://goo.gl/maps/xse8RiPAECFEV2Td9" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Academy of Athens Research Centres', 'monoscopic'); ?><br><?php esc_html_e('14 Anagnostopoulou St., 106 73, Athens', 'monoscopic'); ?></a>
				<a href="mailto:dyas@academyofathens.gr">dyas@academyofathens.gr</a>
				<ul class="social-networks">
          <li><a href="https://twitter.com/dyas_net" target="_blank" rel="noopener noreferrer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a></li>
          <li><a href="https://www.facebook.com/DARIAHgrDYAS/" target="_blank" rel="noopener noreferrer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></a></li>
          <li><a href="https://www.youtube.com/channel/UC6nWcEpunkmWMh19DmHdFAg" target="_blank" rel="noopener noreferrer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg></a></li>
        </ul>
			</div>

			<?php wp_nav_menu(['theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'primary-menu', 'container' => '']); ?>

			<?php wp_nav_menu(['theme_location' => 'menu-2', 'menu_id' => 'secondary-menu', 'menu_class' => 'secondary-menu', 'container' => '']); ?>
		</div>
	</nav>

	<div class="partners">
		<div class="wrapper">
			<a href="http://www.academyofathens.gr/" target="_blank" rel="noopener noreferrer" class="academy-of-athens"></a>
			<a href="http://www.dcu.gr/" target="_blank" rel="noopener noreferrer" class="athena-innovation"></a>
			<a href="http://www.arch.uoa.gr/" target="_blank" rel="noopener noreferrer" class="uoa"></a>
			<a href="http://www.asfa.gr/" target="_blank" rel="noopener noreferrer" class="asfa"></a>
			<a href="http://www.iccs.gr" target="_blank" rel="noopener noreferrer" class="iccs"></a>
			<a href="https://www.ics.forth.gr/isl/centre-cultural-informatics?lang=el" target="_blank" rel="noopener noreferrer" class="forth"></a>
		</div>
	</div>

	<div class="cc">
		<div class="wrapper">
			<div><?php esc_html_e('The content of this website is licensed under a', 'monoscopic'); ?> <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.el" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Creative Commons Attribution NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)', 'monoscopic'); ?></a> <?php esc_html_e('license, unless otherwise noted.', 'monoscopic'); ?> <?php post_count(); ?></div>
			<div class="cookies-modal-toggle underline">Cookies notice</div>
		</div>
	</div>

</footer>
</div>

<?php get_template_part('template-parts/mobile-nav'); ?>

<div class="cookies-modal">
	<div class="container">
		<?php esc_html_e('We use tools such as cookies, in order to analyze our website traffic.', 'monoscopic'); ?>
		<span class="cookies-modal-close symbol">close</span>
	</div>
</div>

<div class="elidek-modal">
	<div class="container">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ELIDEK-DIMOSIOTITA.png" alt="<?php esc_html_e('Hellenic Foundation for Research and Innovation', 'monoscopic'); ?>">
		<span class="elidek-modal-close symbol">close</span>
	</div>
</div>

<?php wp_footer(); ?>

</body>

</html>