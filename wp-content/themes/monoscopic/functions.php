<?php

if (!defined('_MONOSCOPIC_VERSION')) {
	define('_MONOSCOPIC_VERSION', '1.0.0');
}

function monoscopic_setup()
{

	load_theme_textdomain('monoscopic', get_template_directory() . '/languages');

	add_theme_support('automatic-feed-links');

	add_theme_support('title-tag');

	add_theme_support('post-thumbnails');

	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'monoscopic'),
			'menu-2' => esc_html__('Secondary', 'monoscopic'),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
}
add_action('after_setup_theme', 'monoscopic_setup');

function monoscopic_content_width()
{
	$GLOBALS['content_width'] = apply_filters('monoscopic_content_width', 640);
}
add_action('after_setup_theme', 'monoscopic_content_width', 0);

function monoscopic_scripts()
{
	wp_enqueue_style('monoscopic-style', get_stylesheet_uri(), array(), _MONOSCOPIC_VERSION);

	// CSS
	wp_enqueue_style('style', get_stylesheet_uri(), array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('fonts', get_template_directory_uri() . '/css/fonts.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('variables', get_template_directory_uri() . '/css/variables.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('symbols', get_template_directory_uri() . '/css/symbols.css', array(), _MONOSCOPIC_VERSION);
	wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array(), _MONOSCOPIC_VERSION);

	// JS
	wp_enqueue_script('app', get_template_directory_uri() . '/js/main.js', array(), _MONOSCOPIC_VERSION, true);
}
add_action('wp_enqueue_scripts', 'monoscopic_scripts');

require get_template_directory() . '/helpers/template-handler.php';

require get_template_directory() . '/helpers/helper-functions.php';

function modify_archive_title($title)
{
	if (is_category() || is_tag() || is_tax()) {
		$title = single_term_title('', false);
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	}
	return $title;
}
add_filter('get_the_archive_title', 'modify_archive_title');

/**
 * Custom body class.
 */
function custom_body_class($classes)
{
	// Clear default WordPress classes
	$classes = [];

	if (is_singular('library_post')) {
		$classes[] = 'dark-mode';
	}

	if (is_post_type_archive('library_post')) {
		$classes[] = 'dark-mode';
	}

	if (is_tax('library_category')) {
		$classes[] = 'dark-mode';
	}

	return $classes;
}
add_filter('body_class', 'custom_body_class');
