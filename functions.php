<?php

/**
 * Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wordpress
 * @subpackage IV Active
 * @since  1.0
 * 
 */


// display all php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// change this to 'your_domain'
define('THEME_DOMAIN', 'iv-active');

// set up the path to your svg sprite declared in your webpack.mix.js file
define('ICON_PATH', '/assets/images/icons/sprite.svg');


/*******************************
  Init Functions
 ********************************/

function theme_init()
{

	function include_inc_files()
	{
		$files = [
			'inc/helper_functions.php', // Globally used functions.
			'inc/customizer/customizer.php', // Customizer additions.
			//  'inc/theme-options/cust-options.php', // Theme options for address, alert, etc.
			'inc/functions/', // Custom functions that are independent of the theme templates.
			'inc/hooks/', // Load custom filters and hooks.
			'inc/post-types/', // Load custom post types.
			'inc/setup/', // Theme setup, menu, widgets, etc.
			'inc/template-tags/', // Custom template tags for this theme.
			'inc/theme-patterns/block-patterns.php', // Custom patterns for this theme.
			'inc/ACF/', // Custom block setup.
			'inc/yoast/', // Custom block setup.
			'template-parts/navigation/walker-overview.php',
		];

		foreach ($files as $include) {
			$include = trailingslashit(get_template_directory()) . $include;

			// Allows inclusion of individual files or all .php files in a directory.
			if (is_dir($include)) {
				foreach (glob($include . '*.php') as $file) {
					require $file;
				}
			} else {
				require $include;
			}
		}
	}

	include_inc_files();
}

theme_init();

// Registers block binding sources.
if (! function_exists('iv_active_register_block_bindings')) :
	/**
	 * Registers the post format block binding source.
	 *
	 * @since Twenty Twenty-Five 1.0
	 *
	 * @return void
	 */
	function iv_active_register_block_bindings()
	{
		register_block_bindings_source(
			'iv_active/format',
			array(
				'label'              => _x('Post format name', 'Label for the block binding placeholder in the editor', 'iv_active'),
				'get_value_callback' => 'iv_active_format_binding',
			)
		);
	}
endif;

function customize_navigation_block_rendering($block_content, $block)
{
	// Check if the block is the 'core/navigation' block
	if ('core/navigation' === $block['blockName']) {
		// Retrieve block attributes
		$class_name = isset($block['attrs']['className']) ? $block['attrs']['className'] : '';
		$ref_id = isset($block['attrs']['ref']) ? (int) $block['attrs']['ref'] : 0;

		$menu = null; // Initialize $menu

		if (isset($block['attrs']['ref'])) {
			$ref_id = $block['attrs']['ref']; // Post ID of the navigation block
			$menu_post = get_post($ref_id);

			if ($menu_post && 'wp_navigation' === $menu_post->post_type) {
				$menu_slug = $menu_post->post_name; // Use the post_name (slug) of the navigation post
				$menu = wp_get_nav_menu_object($menu_slug); // Retrieve the menu by slug

				if ($menu) {
					error_log('Navigation Block Ref ID: ' . $ref_id . ' - Menu Slug: ' . $menu->slug);
				} else {
					error_log('Navigation Block Ref ID: ' . $ref_id . ' - Menu not found.');
				}
			} else {
				error_log('Navigation Block Ref ID: ' . $ref_id . ' - Not a navigation menu post.');
			}
		} else {
			error_log('No Ref ID found in navigation block.');
		}

		// Get the menu name or location if the 'ref' is available
		if ($ref_id && $menu && 'mobile' === $menu->slug) { // Ensure $menu is defined
			// Apply wp_nav_menu for the mobile menu
			ob_start();
			wp_nav_menu([
				'theme_location' => $menu->slug,
				'container'      => false,
				'menu_class'     => 'nav-primary',
				'walker'         => new Block_Navigation_Walker(),
				'aria_label'     => 'Mobile Navigation',
				'items_wrap'     => '%3$s',
			]);
			$block_content = ob_get_clean();
		}
	}
	return $block_content;
}
add_filter('render_block', 'customize_navigation_block_rendering', 10, 2);
