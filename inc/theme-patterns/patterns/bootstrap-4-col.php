<?php

/**
 * Title: Bootstrap $ Col
 * Slug: iv-active/bootstrap-4-col
 * Categories: IV-Active Patterns
 * Description: Bootstrap 4 Column Layout.
 * Keywords: bootstrap, columns
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Bootstrap 4 Col', THEME_DOMAIN),
    'name'      => __('bootstrap-4-col', THEME_DOMAIN),
    'description' => __('A Bootstrap 4 column layout.', THEME_DOMAIN),
    'categories' => array('iv_bootstrap'),
    'keywords'    => ['columns', 'bootstrap', 'container'],
    'content'    => '<!-- wp:group {"metadata":{"name":"Bootstrap Container"},"className":"row is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group row is-style-default">
<!-- wp:columns {"isStackedOnMobile":false,"metadata":{"name":"Bootstrap Row"},"className":"row"} -->
<div class="wp-block-columns is-not-stacked-on-mobile row">
<!-- wp:column {"metadata":{"name":"Bootstrap Column"},"className":"col-md-6 col-lg-3 col-xl-4"} -->
<div class="wp-block-column col-md-6 col-lg-3 col-xl-4"></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Bootstrap Column"},"className":"col-md-6 col-lg-3 col-xl-4"} -->
<div class="wp-block-column col-md-6 col-lg-3 col-xl-4"></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Bootstrap Column"},"className":"col-md-6 col-lg-3 col-xl-4"} -->
<div class="wp-block-column col-md-6 col-lg-3 col-xl-4"></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Bootstrap Column"},"className":"col-md-6 col-lg-3 col-xl-4"} -->
<div class="wp-block-column col-md-6 col-lg-3 col-xl-4"></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->',
);
