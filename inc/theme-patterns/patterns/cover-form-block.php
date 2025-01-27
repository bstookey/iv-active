<?php

/**
 * Title: Cover Form Block
 * Slug: iv-active/cover-form-block
 * Categories: IV-Active Patterns
 * Block Types: core/template-part/cover
 * Description: 2 Column Cover Form Block.
 * Keywords: callout, form, newsletter
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('2 Column Cover Form Block', 'iv-active'),
    'name   =>'         => __('cover-form-block', 'iv-active'),
    'description' => __('A 2 column cover block with title, text,  and a form.', 'iv-active'),
    'categories' => array('iv_callout'),
    'content'    => '<!-- wp:group {"metadata":{"name":"Cover Form Block","categories":["theme_patterns"],"patternName":"iv-active/cover-form-block"},"className":"iv-form-block rounded","layout":{"type":"constrained"}} -->
<div class="wp-block-group iv-form-block rounded"><!-- wp:cover {"url":"http://localhost:8888/iv-active/wp-content/uploads/Group75-1920w.webp","id":463,"dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.5,"y":0},"metadata":{"name":"Block Background"},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-463" alt="" src="http://localhost:8888/iv-active/wp-content/uploads/Group75-1920w.webp" style="object-position:50% 0%" data-object-fit="cover" data-object-position="50% 0%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Bootstrap Container","categories":["theme_patterns"],"patternName":"iv-active/bootstrap-50-50"},"className":"row is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group row is-style-default"><!-- wp:columns {"verticalAlignment":null,"isStackedOnMobile":false,"metadata":{"name":"Bootstrap Row"},"className":"row"} -->
<div class="wp-block-columns is-not-stacked-on-mobile row"><!-- wp:column {"verticalAlignment":"center","metadata":{"name":"col-md-6"},"className":"col-md-6"} -->
<div class="wp-block-column is-vertically-aligned-center col-md-6"><!-- wp:heading {"textAlign":"left"} -->
<h2 class="wp-block-heading has-text-align-left">GET 10% OFF YOUR FIRST TREATMENT BY SIGNING UP!</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"left"} -->
<p class="has-text-align-left">Join Our Email List To Stay Up To Date On Deals, Discounts, Upcoming Events, And New Product Releases.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","metadata":{"name":"col-md-6"},"className":"col-md-6"} -->
<div class="wp-block-column is-vertically-aligned-center col-md-6"><!-- wp:cover {"url":"http://localhost:8888/iv-active/wp-content/uploads/Form-bg-1920w-1.webp","id":485,"dimRatio":0,"isUserOverlayColor":true,"contentPosition":"top left","isDark":false,"metadata":{"name":"Form Background"},"className":"iv-rounded","layout":{"type":"default"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-left iv-rounded"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-485" alt="" src="http://localhost:8888/iv-active/wp-content/uploads/Form-bg-1920w-1.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"left","level":3} -->
<h3 class="wp-block-heading has-text-align-left">Sign Up Now</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Form here</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->',
);
