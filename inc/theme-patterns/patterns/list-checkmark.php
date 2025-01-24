<?php

/**
 * Title: Checkmark List
 * Slug: iv-active/checkmark-list
 * Categories: IV-Active Patterns
 * Block Types: core/template-part/list
 * Description: List with circle checkmarks as bullets.
 *
 * @package WordPress
 * @subpackage IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Checkmark List', 'iv-active'),
    'description' => __('A cover block with two columns.', 'iv-active'),
    'categories' => array('theme_patterns'),
    'content'    => '<!-- wp:list {"metadata":{"name":"Checkmark List"},"className":"checkmark-list"} -->
<ul class="wp-block-list checkmark-list"><!-- wp:list-item -->
<li>List item</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>List item</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->'
);
