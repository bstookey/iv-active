<?php

/**
 * Title: Form With Background
 * Slug: iv-active/iv_form-with_background
 * Categories: iv_blocks
 * Block Types: core/template-part/group
 * Description: Cover block with heading a form.
 * Keywords: step, slide
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Form With Background', THEME_DOMAIN),
    'description' => __('A block with a background for a from', THEME_DOMAIN),
    'name'      => __('iv_form-with_background', THEME_DOMAIN),
    'categories' => array('iv_blocks'),
    'content'    => '<!-- wp:cover {"url":"https://staging2.danc125.sg-host.com/wp-content/uploads/Form-bg-1920w-1.webp","id":485,"dimRatio":0,"isUserOverlayColor":true,"contentPosition":"top left","isDark":false,"metadata":{"name":"Form With Background","categories":["iv_blocks"],"patternName":"iv-active/form-with_background"},"className":"iv-rounded","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|45","bottom":"var:preset|spacing|45","left":"var:preset|spacing|42","right":"var:preset|spacing|42"}},"shadow":"var:preset|shadow|centered"},"layout":{"type":"default"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-left iv-rounded" style="border-radius:20px;padding-top:var(--wp--preset--spacing--45);padding-right:var(--wp--preset--spacing--42);padding-bottom:var(--wp--preset--spacing--45);padding-left:var(--wp--preset--spacing--42);box-shadow:var(--wp--preset--shadow--centered)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-485" alt="" src="https://staging2.danc125.sg-host.com/wp-content/uploads/Form-bg-1920w-1.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"left","level":3} -->
<h3 class="wp-block-heading has-text-align-left">Sign Up Now</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Form Here</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->',
);
