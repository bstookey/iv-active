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
		'iv_first_read' => array('label' => __('IV-Active First Read', THEME_DOMAIN)),
		'iv_callout' => array('label' => __('IV-Active Callouts', THEME_DOMAIN)),
		'iv_blocks' => array('label' => __('IV-Active Blocks', THEME_DOMAIN)),
		'iv_bootstrap' => array('label' => __('IV-Active Bootstrap', THEME_DOMAIN)),
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
		'bootstrap-3-col',
		'bootstrap-4-col',
		'cover-2c',
		'cover-page',
		'cover-cta-block',
		'cover-form-block',
		'list-checkmark',
		'list-checkmark-circle',
		'list-large-numbered',
		'content-post', // query block
		'step-block',
		'image-title-cta',
		'first-read-page-2c',
		'form-with_background'
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
