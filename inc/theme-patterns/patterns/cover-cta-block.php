<?php

/**
 * Title: CTA Cover Block
 * Slug: iv-active/cta-cover-block
 * Categories: IV-Active Patterns
 * Block Types: core/template-part/cover
 * Description: Basic Cover for pages, with breadvrumb.
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('CTA Callout Block', THEME_DOMAIN),
    'name   =>'         => __('cta-allout-block', THEME_DOMAIN),
    'description' => __('A cover block with title, text, and button.', THEME_DOMAIN),
    'categories' => array('iv_callout'),
    'content'    => '<!-- wp:group {"metadata":{"name":"CTA Cover Block","categories":["iv_callout"],"patternName":"iv-active/cover-cta-block"},"align":"full","className":"iv-cta-block","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull iv-cta-block" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:cover {"url":"http://localhost:8888/iv-active/wp-content/uploads/Cta-bg9-2880w.webp","id":445,"dimRatio":0,"isUserOverlayColor":true,"metadata":{"name":"CTA Block Background"},"align":"full","className":"cta-block-background","layout":{"type":"default"}} -->
<div class="wp-block-cover alignfull cta-block-background"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-445" alt="" src="http://localhost:8888/iv-active/wp-content/uploads/Cta-bg9-2880w.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"CTA Block Content"},"className":"cta-block-content is-style-container-sm","layout":{"type":"constrained"}} -->
<div class="wp-block-group cta-block-content is-style-container-sm"><!-- wp:heading {"textAlign":"center","fontSize":"28-38"} -->
<h2 class="wp-block-heading has-text-align-center has-28-38-font-size">Ready to experience the transformative benefits of IV therapy?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Book your appointment today and take the first step towards a healthier, more vibrant you!</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"isCustomToggleEnabled":true} -->
<div class="wp-block-buttons on-dark-background"><!-- wp:button {"textAlign":"center"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button" href="/book-now/">Book Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->',
);
