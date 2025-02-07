<?php

/**
 * Title: First Read Default
 * Slug: iv-active/cover-page
 * Categories: IV-First Read
 * Block Types: core/template-part/cover
 * Description: Basic Cover for pages, with breadvrumb.
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('First Read Page', THEME_DOMAIN),
    'description' => __('A cover block with title and breadcrumb.', THEME_DOMAIN),
    'categories' => array('iv_first_read'),
    'content'    => '<!-- wp:cover {"url":"https://staging2.danc125.sg-host.com/wp-content/uploads/bg59-2880w.webp","id":251,"dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.5},"contentPosition":"center center","metadata":{"categories":["theme_patterns"],"patternName":"iv-active/cover-page","name":"First Read Default"},"align":"full","className":"first-read default","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0"}},"color":[]}} -->
<div class="wp-block-cover alignfull first-read default" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-251" alt="" src="https://staging2.danc125.sg-host.com/wp-content/uploads/bg59-2880w.webp" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"First Read Content"},"className":"is-style-container text-center","style":{"spacing":{"blockGap":"48px","padding":{"bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-container text-center" style="padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:post-title {"textAlign":"center","level":1} /-->

<!-- wp:yoast-seo/breadcrumbs /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
);
