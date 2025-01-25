<?php

/**
 * Title: Large Number List
 * Slug: iv-active/large-number-list
 * Categories: IV-Active Patterns
 * Block Types: core/template-part/list
 * Description: A numberd list with large numbers.
 *
 * @package WordPress
 * @subpackage IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Large Number List', 'iv-active'),
    'description' => __('A numberd list with large numbers.', 'iv-active'),
    'categories' => array('theme_patterns'),
    'content'    => '<!-- wp:list {"metadata":{"name":"Large Number List"},"className":"large-number-list"} -->
<ul class="wp-block-list large-number-list"><!-- wp:list-item -->
<li>List item</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>List item</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->'
);
