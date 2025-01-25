<?php

/**
 * Adds custom pattern category and registers patterns.
 *
 * @package Wordpress
 *
 */

function theme_register_block_patterns()
{
	$block_pattern_categories = array(
		'theme_patterns' => array('label' => __('IV-Active Patterns', THEME_DOMAIN)),
		'theme_layouts' => array('label' => __('IV-Active Layouts', THEME_DOMAIN)),
	);

	/**
	 * Filters the theme block pattern categories.
	 */

	$block_pattern_categories = apply_filters('block_pattern_categories', $block_pattern_categories);

	foreach ($block_pattern_categories as $name => $properties) {
		if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($name)) {
			register_block_pattern_category($name, $properties);
		}
	}

	/**
	 * Filters the theme block patterns.
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */

	$block_patterns = array(
		'bootstrap-50-50',
		'cover-2c',
		'cover-page',
		'list-checkmark',
		'list-checkmark-circle',
		'content-post'
	);

	$block_patterns = apply_filters('theme_block_patterns', $block_patterns);

	foreach ($block_patterns as $block_pattern) {
		$pattern_file = 'patterns/' . $block_pattern . '.php';

		register_block_pattern(
			'iv-active/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action('init', 'theme_register_block_patterns', 9);
