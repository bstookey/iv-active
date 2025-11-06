<?php

/**
 * Enqueue scripts and styles.
 *
 * @package Wordpress
 */

define('HAPPY_TAPIR_THEME_VERSION', '1.10.5');

// Adobe Fonts
function mytheme_enqueue_adobe_fonts()
{
	wp_enqueue_style(
		'adobe-fonts',
		'https://use.typekit.net/jul1odg.css',
		array(),
		null
	);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_adobe_fonts');


// Enqueue Styles
function happytapir_enqueue_styles()
{
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', array(), HAPPY_TAPIR_THEME_VERSION, false);
	wp_enqueue_style('happytapir-theme-styles', get_stylesheet_directory_uri() . '/assets/css/happytapir.css', array(), HAPPY_TAPIR_THEME_VERSION, false);
}
add_action('wp_enqueue_scripts', 'happytapir_enqueue_styles', 100);


// Enqueue Global Scripts
function happytapir_enqueue_scripts()
{
	if (! wp_script_is('jquery', 'enqueued')) {
		wp_enqueue_script('jquery');
	}


	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), HAPPY_TAPIR_THEME_VERSION, true);
	wp_enqueue_script('happytapir-theme-apps-js', get_stylesheet_directory_uri() . '/assets/js/apps.js', array(), HAPPY_TAPIR_THEME_VERSION, true);
	wp_enqueue_script('happytapir-theme-js', get_stylesheet_directory_uri() . '/assets/js/happytapir.js', array(), HAPPY_TAPIR_THEME_VERSION, true);
	wp_localize_script('happytapir-theme-js', 'i18n', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'happytapir_enqueue_scripts');

// Add backend styles for Gutenberg.
function admin_editor_assets()
{
	// Load the theme styles within Gutenberg.
	if (is_admin()) {
		wp_enqueue_style('admin-editor-styles', get_stylesheet_directory_uri() . '/assets/css/admin-style.css', array(), HAPPY_TAPIR_THEME_VERSION, false);
		wp_enqueue_script('iv-editor', get_stylesheet_directory_uri() . '/assets/js/editor.js', array(), HAPPY_TAPIR_THEME_VERSION, true);
		wp_enqueue_style(
			'editor-styles',
			'https://use.typekit.net/jul1odg.css',
			array(),
			null
		);
	}
}
add_action('enqueue_block_editor_assets', 'admin_editor_assets');

function enqueue_editor_assets()
{
	wp_enqueue_style('editor-styles', 'https://use.typekit.net/jul1odg.css',);
}
add_action('enqueue_block_editor_assets', 'enqueue_editor_assets');
