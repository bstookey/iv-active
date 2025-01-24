<?php

/**
 * Display the customizer header scripts.
 *
 * @package Wordpress
 *
 * @return string Header scripts.
 * 
 * These are injected into the body directly after the <body> tag and this function needs to be manually added to the code directly after the body tag.
 * 
 */

function iv_active_print_customizer_body_scripts()
{
	// Check for header scripts.
	$scripts = get_theme_mod('iv_active_body_scripts');

	// None? Bail...
	if (!$scripts) {
		return false;
	}

	// Otherwise, echo the scripts!
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS OK.
	echo get_post_content($scripts);
}

add_action('after_body', 'iv_active_print_customizer_body_scripts', 999);
