<?php

/**
 * Limit the excerpt length.
 *
 * @package Wordpress
 *
 * @param array $args Parameters include length and more.
 *
 * @return string The excerpt.
 */
function get_trimmed_excerpt($args = [])
{

	// Set defaults.
	$defaults = [
		'length' => 20,
		'more'   => '...',
		'post'   => '',
	];

	// Parse args.
	$args = wp_parse_args($args, $defaults);

	// Trim the excerpt.
	return wp_trim_words(get_the_excerpt($args['post']), absint($args['length']), esc_html($args['more']));
}

/*
 * @param array post/page $id and length.
 *
 * @return string from excerpt or the content if no excerpt exists based on letter count.
 * 
 */

function get_custom_excerpt($id, $letter_count = 300, $more = '...')
{
	// Check if $id is valid
	if (!$id) {
		return '';
	}

	// Get the post excerpt
	$text = get_the_excerpt($id);

	// If there's no excerpt, get the post content
	if (!$text) {
		$text = get_post_field('post_content', $id);
	}

	// Apply filters and trim the text
	$text = apply_filters('the_content', $text);
	$text = strip_tags($text);

	// Trim text based on letter count without breaking words
	if (mb_strlen($text) > $letter_count) {
		$text = mb_substr($text, 0, $letter_count);

		// Find the last space to avoid breaking words
		$last_space = mb_strrpos($text, ' ');

		if ($last_space !== false) {
			// If a space is found, trim to that position
			$text = mb_substr($text, 0, $last_space);
		}
		// Append the ellipsis
		$text .= $more;
	}

	return $text;
}

// Add custom excerpt function as a filter
add_filter('custom_excerpt', 'get_custom_excerpt', 10, 2);




/*
 * @param array post/page $id and length.
 *
 * @return string from excerpt or the content if no excerpt exists based on word count.
 * 
 */

function get_custom_word_excerpt($id, $word_count = 200, $more = '...')
{
	// Check if $id is valid
	if (!$id) {
		return '';
	}

	// Get the post excerpt
	$text = get_the_excerpt($id);

	// If there's no excerpt, get the post content
	if (!$text) {
		$text = get_post_field('post_content', $id);
	}

	// Apply filters and trim the text
	$text = apply_filters('the_content', $text);
	$text = strip_tags($text);
	$text = wp_trim_words($text, $word_count);

	// Check if the last characters of $text are the same as $more
	if (substr($text, -strlen($more)) === $more) {
		// If they are the same, just return $text
		return $text;
	} else {
		// If not, append $more and return
		return $text . $more;
	}
}



// Add custom excerpt function as a filter
add_filter('custom_word_excerpt', 'get_custom_word_excerpt');



/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'wpdocs_excerpt_more');


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length)
{
	return 40;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);
