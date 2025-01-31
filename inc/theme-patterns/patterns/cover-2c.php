<?php

/**
 * Title: First Read Two Column
 * Slug: iv-active/cover-2c
 * Categories: iv_first_read
 * Block Types: core/template-part/cover
 * Description: 2 Column cover with image.
 * Keywords: step, slide
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('First Read Two Column', THEME_DOMAIN),
    'description' => __('A cover block with two columns.', THEME_DOMAIN),
    'categories' => array('iv_first_read'),
    'content'    => '
<!-- wp:cover {"url":"http://localhost:8888/iv-active/wp-content/uploads/bg59-2880w.webp","id":251,"dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0.5},"metadata":{"categories":["banner"],"patternName":"core/cover-image-with-bold-heading-and-button-left","name":"IV First Read / 2 Col"},"align":"full","className":"first-read","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"margin":{"top":"0"}},"color":[]}} -->
<div class="wp-block-cover alignfull first-read" style="margin-top:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-251" alt="" src="http://localhost:8888/iv-active/wp-content/uploads/bg59-2880w.webp" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"First Read Content"},"className":"is-style-container","style":{"spacing":{"blockGap":"48px","padding":{"bottom":"var:preset|spacing|70"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-container" style="padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"metadata":{"name":"Bootstrap Row"},"className":"row"} -->
<div class="wp-block-columns row"><!-- wp:column {"className":"col-lg-7"} -->
<div class="wp-block-column col-lg-7"><!-- wp:heading {"level":1,"textColor":"white"} -->
<h1 class="wp-block-heading has-white-color has-text-color">Feel Better Faster</h1>
<!-- /wp:heading -->

<!-- wp:heading {"textColor":"aqua","fontSize":"x-large"} -->
<h2 class="wp-block-heading has-aqua-color has-text-color has-x-large-font-size"><strong>#1 Mobile IV Therapy in PA</strong></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|42","bottom":"var:preset|spacing|42"}}},"fontSize":"medium-alt"} -->
<p class="has-medium-alt-font-size" style="padding-top:var(--wp--preset--spacing--42);padding-bottom:var(--wp--preset--spacing--42)">We come to you—home, office, or hotel! Our IV drips provide a quick and safe way to get the vitamins and medications you need. They ensure fast absorption and rehydration for speedy recovery and proactive wellness.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left","flexWrap":"wrap"},"isCustomToggleEnabled":true} -->
<div class="wp-block-buttons on-dark-background"><!-- wp:button {"backgroundColor":"aqua","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-aqua-background-color has-background wp-element-button" href="https://staging2.danc125.sg-host.com/book-now/">Book now</a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"white","className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-white-background-color has-background wp-element-button" href="tel:8149199611">Call Us</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-outline"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="sms:18149199611&amp;body=Hello%2C%20I%20would%20like%20to%20learn%20more%20about%20IV%20Active">Text Us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"col-lg-5"} -->
<div class="wp-block-column col-lg-5"><!-- wp:image {"id":632,"sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
<figure class="wp-block-image size-large is-style-default"><img src="http://localhost:8888/iv-active/wp-content/uploads/IMG_7272-901x1024.jpg" alt="" class="wp-image-632"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->',
);
