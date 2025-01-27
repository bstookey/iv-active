<?php

/**
 * Title: Checkmark List
 * Slug: iv-active/checkmark-list
 * Categories: IV-Active Patterns
 * Block Types: core/template-part/list
 * Description: List with circle checkmarks as bullets.
 * Keywords: list, checkmark
 * 
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Checkmark List', 'iv-active'),
    'description' => __('A list with a checkmark before.', 'iv-active'),
    'categories' => array('iv_blocks'),
    'blockTypes'  => array('core/list'),
    'content'    => '<!-- wp:list {"metadata":{"name":"Checkmark List"},"className":"checkmark-list"} -->
<ul class="wp-block-list checkmark-list"><!-- wp:list-item -->
<li>List item</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>List item</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->'
);
