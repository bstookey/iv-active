<?php

/**
 * Title: Checkmark Circle List
 * Slug: iv-active/checkmark-circle-list
 * Categories: iv_blocks
 * Block Types: core/template-part/list
 * Description: A list with a circled checkmark before.
 * Keywords: list, checkmark, circle
 * 
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Checkmark Circle List', 'iv-active'),
    'name'      => __('checkmark-circle-list', 'iv-active'),
    'description' => __('A list with a circled checkmark before.', 'iv-active'),
    'categories' => array('iv_blocks'),
    'blockTypes'  => array('core/list'),
    'keywords'    => ['list', 'checkmark', 'circle'],
    'content'    => '<!-- wp:list {"metadata":{"name":"Checkmark Circled List"},"className":"checkmark-list circle"} -->
<ul class="wp-block-list checkmark-list circle"><!-- wp:list-item -->
<li>List item</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>List item</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->'
);
