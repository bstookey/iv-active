<?php

/**
 * Enqueue scripts and styles.
 *
 * @package Wordpress
 */

define('IV_ACTIVE_THEME_VERSION', '1.0.8');

// Enqueue Styles
function iv_active_enqueue_styles()
{
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', array(), IV_ACTIVE_THEME_VERSION, false);
	wp_enqueue_style('iv-active-theme-styles', get_stylesheet_directory_uri() . '/assets/css/iv-active.css', array(), IV_ACTIVE_THEME_VERSION, false);
}
add_action('wp_enqueue_scripts', 'iv_active_enqueue_styles', 100);


// Enqueue Global Scripts
function iv_active_enqueue_scripts()
{
	if (! wp_script_is('jquery', 'enqueued')) {
		wp_enqueue_script('jquery');
	}


	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), IV_ACTIVE_THEME_VERSION, true);
	wp_enqueue_script('iv-active-theme-apps-js', get_stylesheet_directory_uri() . '/assets/js/apps.js', array(), IV_ACTIVE_THEME_VERSION, true);
	wp_enqueue_script('iv-active-theme-js', get_stylesheet_directory_uri() . '/assets/js/iv-active.js', array(), IV_ACTIVE_THEME_VERSION, true);
	wp_localize_script('iv-active-theme-js', 'i18n', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'iv_active_enqueue_scripts');

// Add backend styles for Gutenberg.
function admin_editor_assets()
{
	// Load the theme styles within Gutenberg.
	if (is_admin()) {
		wp_enqueue_style('admin-editor-styles', get_stylesheet_directory_uri() . '/assets/css/admin-style.css', array(), IV_ACTIVE_THEME_VERSION, false);
		wp_enqueue_script('iv-editor', get_stylesheet_directory_uri() . '/assets/js/editor.js', array(), IV_ACTIVE_THEME_VERSION, true);
	}
}
add_action('enqueue_block_editor_assets', 'admin_editor_assets');
