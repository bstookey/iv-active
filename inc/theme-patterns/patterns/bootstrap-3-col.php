<?php

/**
 * Title: Bootstrap 3 Col
 * Slug: iv-active/bootstrap-3-col
 * Categories: IV-Active Patterns
 * Description: Bootstrap 2 Column Layout.
 * Keywords: bootstrap, columns
 *
 * @package IV Active
 * @since IV Active 1.0
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Bootstrap 3 Col', THEME_DOMAIN),
    'name'      => __('bootstrap-3-col', THEME_DOMAIN),
    'description' => __('A Bootstrap 3 column layout.', THEME_DOMAIN),
    'categories' => array('iv_bootstrap'),
    'keywords'    => ['columns', 'bootstrap', 'container'],
    'content'    => '<!-- wp:group {"metadata":{"name":"Bootstrap Container"},"className":"is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-default">
<!-- wp:columns {"isStackedOnMobile":false,"metadata":{"name":"Bootstrap Row"},"className":"row"} -->
<div class="wp-block-columns is-not-stacked-on-mobile row">
<!-- wp:column {"metadata":{"name":"Bootstrap Column"},"className":"col-md-6 col-lg-4"} -->
<div class="wp-block-column col-md-6 col-lg-4"></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Bootstrap Column"},"className":"col-md-6 col-lg-4"} -->
<div class="wp-block-column col-md-6 col-lg-4"></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Bootstrap Column"},"className":"col-md-6 col-lg-4"} -->
<div class="wp-block-column col-md-6 col-lg-4"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
);
