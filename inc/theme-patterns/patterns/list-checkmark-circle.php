<?php

/**
 * Title: Checkmark Circle List
 * Slug: iv-active/checkmark-circle-list
 * Categories: IV-Active Patterns
 * Block Types: core/template-part/list
 * Description: A list with a circled checkmark before..
 *
 * @package WordPress
 * @subpackage IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Checkmark Circle List', 'iv-active'),
    'name'      => __('checkmark-circle-list', 'iv-active'),
    'description' => __('A list with a circled checkmark before.', 'iv-active'),
    'categories' => array('theme_patterns'),
    'content'    => '<!-- wp:list {"metadata":{"name":"Checkmark Circled List"},"className":"checkmark-list circle"} -->
<ul class="wp-block-list checkmark-list circle"><!-- wp:list-item -->
<li>List item</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>List item</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->'
);
