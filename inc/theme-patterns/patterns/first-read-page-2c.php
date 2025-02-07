<?php

/**
 * Title: Page First Read Two Column
 * Slug: iv-active/iv_page_first_read_two_columns
 * Categories: iv_page_first_read
 * Block Types: core/template-part/cover
 * Description: 2 Column cover with image.
 * Keywords: step, slide
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Page First Read Two Column', THEME_DOMAIN),
    'description' => __('A cover block with two columns.', THEME_DOMAIN),
    'name   =>'         => __('iv_page_first_read_two_columns', THEME_DOMAIN),
    'categories' => array('iv_first_read'),
    'content'    => '<!-- wp:cover {"url":"/wp-content/uploads/bg59-2880w.webp","id":251,"dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.5},"metadata":{"categories":["iv_first_read"],"patternName":"core/block/822","name":"IV First Read / 2 Col"},"align":"full","className":"first-read","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0"}},"color":[]}} -->
<div class="wp-block-cover alignfull first-read" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-251" alt="" src="/wp-content/uploads/bg59-2880w.webp" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"First Read Content"},"className":"is-style-container","style":{"spacing":{"blockGap":"48px","padding":{"bottom":"var:preset|spacing|70"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-container" style="padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:post-title {"level":1} /-->

<!-- wp:paragraph {"fontSize":"medium-alt"} -->
<p class="has-medium-alt-font-size">We come to you—home, office, or hotel! Our IV drips provide a quick and safe way to get the vitamins and medications you need. They ensure fast absorption and rehydration for speedy recovery and proactive wellness.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:post-featured-image /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
);
