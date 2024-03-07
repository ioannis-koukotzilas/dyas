<?php

// Single
function handle_single_post_templates($template)
{
  if (is_singular('tools_services_post')) {
    $template = locate_template('templates/single/tools-and-services-single.php');
  } elseif (is_singular('community_post')) {
    $template = locate_template('templates/single/community-single.php');
  } elseif (is_singular('library_post')) {
    $template = locate_template('templates/single/library-single.php');
  } else {
    $template = locate_template('templates/single/single.php');
  }

  return $template;
}
add_filter('single_template', 'handle_single_post_templates');

// Archive
function handle_archive_templates($template)
{
  if (is_post_type_archive('tools_services_post')) {
    $template = locate_template('templates/archive/tools-and-services-archive.php');
  } elseif (is_post_type_archive('community_post')) {
    $template = locate_template('templates/archive/community-archive.php');
  } elseif (is_post_type_archive('library_post')) {
    $template = locate_template('templates/archive/library-archive.php');
  } else {
    $template = locate_template('templates/archive/archive.php');
  }

  return $template;
}
add_filter('archive_template', 'handle_archive_templates');

// Taxonomy
function handle_taxonomy_templates($template)
{
  if (is_tax('tools_services_category')) {
    $template = locate_template('templates/taxonomy/tools-and-services-category.php');
  } elseif (is_tax('community_category')) {
    $template = locate_template('templates/taxonomy/community-category.php');
  } elseif (is_tax('library_category')) {
    $template = locate_template('templates/taxonomy/library-category.php');
  }

  return $template;
}
add_filter('taxonomy_template', 'handle_taxonomy_templates');

// Error
function handle_error_templates($template)
{
  $template = locate_template('templates/error/404.php');

  return $template;
}
add_filter('404_template', 'handle_error_templates');
