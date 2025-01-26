<?php

/**
 * Title: First Read Default
 * Slug: iv-active/cover-page
 * Categories: IV-Active Patterns
 * Block Types: core/template-part/cover
 * Description: Basic Cover for pages, with breadvrumb.
 *
 * @package WordPress
 * @subpackage IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('First Read Page', 'iv-active'),
    'description' => __('A cover block with title and breadcrumb.', 'iv-active'),
    'categories' => array('theme_patterns'),
    'content'    => '<!-- wp:cover {"url":"http://localhost:8888/iv-active/wp-content/uploads/bg59-2880w.webp","id":251,"dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.5},"contentPosition":"center center","metadata":{"categories":["theme_patterns"],"patternName":"iv-active/cover-page","name":"First Read Default"},"align":"full","className":"first-read default","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0"}},"color":[]}} -->
<div class="wp-block-cover alignfull first-read default" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-251" alt="" src="http://localhost:8888/iv-active/wp-content/uploads/bg59-2880w.webp" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"className":"is-style-container","style":{"spacing":{"blockGap":"48px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-container"><!-- wp:post-title {"textAlign":"center","level":1,"isPostTitleVisible":false} /-->

<!-- wp:yoast-seo/breadcrumbs /--></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"72px"} -->
<div style="height:72px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:cover -->',
);
