<?php

/**
 * Display the customizer header scripts.
 *
 * @package Wordpress
 *
 * @return string Header scripts.
 * 
 * These are injected into the head directly and this function needs to be manually added to the code directly after the body tag.
 * 
 */

function happytapir_print_customizer_header_scripts()
{
	// Check for header scripts.
	$scripts = get_theme_mod('happytapir_header_scripts');

	// None? Bail...
	if (!$scripts) {
		return false;
	}

	// Otherwise, echo the scripts!
	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- XSS OK.
	echo $scripts;
}

add_action('wp_head', 'happytapir_print_customizer_header_scripts', 1);
