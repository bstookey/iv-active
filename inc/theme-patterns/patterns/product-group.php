<?php

/**
 * Title: Steb Block
 * Slug: iv-active/step-block
 * Categories: IV-Active Patterns
 * Block Types: core/template-part/group
 * Description: Cover Image, step number, titles, and list in a group.
 * Keywords: product, group
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Product Group', THEME_DOMAIN),
    'name'      => __('product-group', THEME_DOMAIN),
    'description' => __('Product details, without price, in a group.', THEME_DOMAIN),
    'categories' => array('iv_blocks'),
    'keywords'    => ['product', 'group'],
    'content'    => '<!-- wp:group {"metadata":{"name":"Product Group"},"className":"product-group has-rounded-default","backgroundColor":"white","layout":{"type":"default"}} -->
<div class="wp-block-group product-group has-rounded-default has-white-background-color has-background"><!-- wp:cover {"url":"http://localhost:8888/iv-active/wp-content/uploads/img-02.png","id":637,"dimRatio":0,"isUserOverlayColor":true,"isDark":false,"metadata":{"name":"Product Image"},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-637" alt="" src="http://localhost:8888/iv-active/wp-content/uploads/img-02.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"800"}},"fontSize":"large-alt"} -->
<h3 class="wp-block-heading has-large-alt-font-size" style="font-style:normal;font-weight:800">Meyers Cocktail</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium","fontFamily":"montserrat"} -->
<p class="has-montserrat-font-family has-medium-font-size" style="font-style:normal;font-weight:500">Our Best Seller comprised of essential multivitamins and other important nutrients.&nbsp; This cocktail is designed to help alleviate chronic symptoms, manage pain, boost immunity, and more!</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><strong>Includes:</strong></p>
<!-- /wp:paragraph -->

<!-- wp:list {"metadata":{"name":"Checkmark Circled List","categories":["iv_blocks"],"patternName":"iv-active/list-checkmark-circle"},"className":"checkmark-list circle"} -->
<ul class="wp-block-list checkmark-list circle"><!-- wp:list-item -->
<li>B-Complex</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>B12</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Magnesium</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Vitamin C</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Glutathione</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Zink</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Book Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->'
);
