<?php

if (!defined('_MONOSCOPIC_VERSION')) {
  define('_MONOSCOPIC_VERSION', '1.4.0');
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
  wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css', array(), _MONOSCOPIC_VERSION);
  wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css', array(), _MONOSCOPIC_VERSION);
  wp_enqueue_style('facets', get_template_directory_uri() . '/css/facets.css', array(), _MONOSCOPIC_VERSION);
  wp_enqueue_style('swiper', get_template_directory_uri() . '/css/swiper-bundle.css', array(), _MONOSCOPIC_VERSION);

  // JS
  wp_enqueue_script('swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), _MONOSCOPIC_VERSION, true);
  wp_enqueue_script('app', get_template_directory_uri() . '/js/main.js', array(), _MONOSCOPIC_VERSION, true);
}
add_action('wp_enqueue_scripts', 'monoscopic_scripts');

require get_template_directory() . '/helpers/template-handler.php';
require get_template_directory() . '/helpers/helper-functions.php';
require get_template_directory() . '/helpers/extend-search.php';

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

// Facets
add_filter('facetwp_index_row', function ($params, $class) {
  if ('year' == $params['facet_name']) { // change date_as_year to name of your facet
    $raw_value = $params['facet_value'];
    $params['facet_value'] = date('Y', strtotime($raw_value)); // "2019-04" for the permalink
    $params['facet_display_value'] = date('Y', strtotime($raw_value)); // "April 2019" for the display value
  }
  return $params;
}, 10, 2);

add_filter('facetwp_facet_orderby', function ($orderby, $facet) {
  if ('year' == $facet['name']) {
    $orderby = 'f.facet_value DESC';
  }
  return $orderby;
}, 10, 2);

add_filter('facetwp_assets', function ($assets) {
  unset($assets['front.css']);
  unset($assets['facetwp-flyout.css']);
  return $assets;
});

function custom_body_class($classes)
{
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

  if (is_search()) {
    $classes[] = 'dark-mode';
  }

  return $classes;
}
add_filter('body_class', 'custom_body_class');

function change_posts_navigation_text($args)
{
  $args['prev_text'] = __('Previous', 'monoscopic');
  $args['next_text'] = __('Next', 'monoscopic');
  return $args;
}
add_filter('the_posts_pagination_args', 'change_posts_navigation_text');


function custom_search_form_placeholder($form)
{
  $new_placeholder = 'What are you looking for?';

  if (strpos($form, 'placeholder="') !== false) {
    $form = preg_replace('/placeholder="[^"]*"/', 'placeholder="' . esc_attr($new_placeholder) . '"', $form);
  }

  return $form;
}
add_filter('get_search_form', 'custom_search_form_placeholder', 100, 1);