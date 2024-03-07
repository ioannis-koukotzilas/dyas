<?php

function the_published_date()
{
	$date = get_the_date('j F Y');
	$iso_date = get_the_date('c');

	echo '<time class="published-date" datetime="' . $iso_date . '" itemprop="date-published">' . $date . '</time>';
}

function the_pagination()
{
	the_posts_pagination(array(
		'mid_size' => 2,
		'prev_text' => __('Previous', 'monoscopic'),
		'next_text' => __('Next', 'monoscopic'),
	));
}

function the_post_terms($taxonomy)
{
	$terms = get_the_terms(get_the_ID(), $taxonomy);
	if (!empty($terms) && !is_wp_error($terms)) {
		$html = '<ul>';
		foreach ($terms as $term) {
			$html .= '<li><a href="' . esc_url(get_term_link($term)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'monoscopic'), $term->name)) . '">' . $term->name . '</a></li>';
		}
		$html .= '</ul>';
		return $html;
	}
	return '';
}

function the_post_terms_without_links($taxonomy)
{
	$terms = get_the_terms(get_the_ID(), $taxonomy);
	$term_names = [];

	if (!empty($terms) && !is_wp_error($terms)) {
		foreach ($terms as $term) {
			$term_names[] = esc_html($term->name);
		}
	}

	$terms_string = implode(', ', $term_names);

	$html = '<div class="terms-no-link">' . $terms_string . '</div>';

	return $html;
}

function the_post_terms_with_archive($taxonomy, $archive_name = '')
{
	$terms = get_the_terms(get_the_ID(), $taxonomy);
	$html = '<div class="terms">';

	$post_type = get_post_type();
	$archive_link = get_post_type_archive_link($post_type);
	if ($archive_link) {
		$archive_name = !empty($archive_name) ? $archive_name : $post_type;
		$html .= '<a href="' . esc_url($archive_link) . '">' . esc_html__($archive_name, 'monoscopic') . '</a>';
	}

	if (!empty($terms) && !is_wp_error($terms)) {
		$html .= '<ul>';
		foreach ($terms as $term) {
			$html .= '<li><a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a></li>';
		}
		$html .= '</ul>';
	}

	$html .= '</div>';

	return $html;
}

function list_available_image_sizes()
{
	global $_wp_additional_image_sizes;

	$sizes = array();

	foreach (get_intermediate_image_sizes() as $size) {
		if (in_array($size, array('thumbnail', 'medium', 'medium_large', 'large'))) {
			$sizes[$size]['width'] = get_option("{$size}_size_w");
			$sizes[$size]['height'] = get_option("{$size}_size_h");
			$sizes[$size]['crop'] = (bool) get_option("{$size}_crop");
		} elseif (isset($_wp_additional_image_sizes[$size])) {
			$sizes[$size] = array(
				'width' => $_wp_additional_image_sizes[$size]['width'],
				'height' => $_wp_additional_image_sizes[$size]['height'],
				'crop' => $_wp_additional_image_sizes[$size]['crop']
			);
		}
	}

	foreach ($sizes as $size => $attrs) {
		echo 'Size: ' . $size . ' | Width: ' . $attrs['width'] . 'px | Height: ' . $attrs['height'] . 'px | Crop: ' . ($attrs['crop'] ? 'Yes' : 'No') . '<br>';
	}
}

function post_count_____disabled()
{
	$post_types_names = array(
		'page' => 'Page',
		'community_post' => 'Community',
		'library_post' => 'Library',
		'tools_services_post' => 'Tools and Services'
	);

	$items = array();

	foreach ($post_types_names as $post_type => $name) {
		$count_posts = wp_count_posts($post_type);
		$count = $count_posts->publish;

		$items[] = $name . ': ' . $count;
	}

	$outputItems = implode(' / ', $items);

	$output = '<span>Count of published posts: ' . $outputItems . '</span>';

	echo $output;
}

function post_count()
{
	$post_types = array('page', 'community_post', 'library_post', 'tools_services_post');

	$total_count = 0;

	foreach ($post_types as $post_type) {
		$count_posts = wp_count_posts($post_type);
		$total_count += $count_posts->publish;
	}

	$output = '<span>Count of published posts: ' . $total_count . '</span>';

	echo $output;
}
