<?php

/**
 * Bootstrap 50/50
 * Title: Bootstrap 50 50
 * Slug: iv-active/bootstrap-50-50
 * Categories: IV-Active Patterns
 * Description: Bootstrap 2 Column Layout.
 *
 * @package WordPress
 * @subpackage IV Active
 * @since IV Active 1.0
 */

return array(
	'title'      => __('Bootstrap 50/50', THEME_DOMAIN),
	'categories' => array('theme_patterns'),
	'content'    => '<!-- wp:group {"metadata":{"name":"Bootstrap Container"},"className":"row is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group row is-style-default"><!-- wp:columns {"isStackedOnMobile":false,"metadata":{"name":"Bootstrap Row"},"className":"row"} -->
<div class="wp-block-columns is-not-stacked-on-mobile row"><!-- wp:column {"metadata":{"name":"col-md-6"},"className":"col-md-6"} -->
<div class="wp-block-column col-md-6"></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"col-md-6"},"className":"col-md-6"} -->
<div class="wp-block-column col-md-6"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
);
