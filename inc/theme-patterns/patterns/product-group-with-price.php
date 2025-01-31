<?php

/**
 * Title: Product Group
 * Slug: iv-active/product-group-with-price
 * Categories: IV-Active Patterns
 * Block Types: core/template-part/group
 * Description: Cover Image, step number, titles, and list in a group.
 * Keywords: product, group
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Product Group With Price', THEME_DOMAIN),
    'name'      => __('product-group-with-price', THEME_DOMAIN),
    'description' => __('Product details, with price, in a group.', THEME_DOMAIN),
    'categories' => array('iv_blocks'),
    'keywords'    => ['product', 'group', 'price'],
    'content'    => '<!-- wp:group {"metadata":{"name":"Product Group With Price"},"className":"product-group has-price has-rounded-default","backgroundColor":"white","layout":{"type":"default"}} -->
<div class="wp-block-group product-group has-price has-rounded-default has-white-background-color has-background"><!-- wp:cover {"url":"/wp-content/uploads/myers-max.png","id":967,"dimRatio":0,"isUserOverlayColor":true,"isDark":false,"metadata":{"name":"Product Image"},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-967" alt="" src="/wp-content/uploads/myers-max.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"Price"},"className":"price-group","backgroundColor":"aqua","layout":{"type":"constrained"}} -->
<div class="wp-block-group price-group has-aqua-background-color has-background"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","metadata":{"name":"Tag"},"className":"tag"} -->
<p class="has-text-align-center tag">PRICE:</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"metadata":{"name":"Cost"},"className":"cost"} -->
<p class="cost">$325</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"800"}},"fontSize":"large-alt"} -->
<h3 class="wp-block-heading has-large-alt-font-size" style="font-style:normal;font-weight:800">Meyers Cocktail</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium","fontFamily":"montserrat"} -->
<p class="has-montserrat-font-family has-medium-font-size" style="font-style:normal;font-weight:500">Comprised of essential multivitamins and other nutrients, this cocktail is designed to help alleviate chronic symptoms, including ongoing pain, asthma and more. Possible&nbsp;<strong>Benefits:</strong>&nbsp;Helps alleviate stress, Improves immunity, Restores balance, Provides hydration, Helps reduce migraines, and Reduces chronic pain.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"medium","fontFamily":"montserrat"} -->
<p class="has-montserrat-font-family has-medium-font-size" style="font-style:normal;font-weight:500"><strong>Includes:</strong>&nbsp;B-Complex Vitamins, B12, Magnesium, Ascorbic Acid (Vitamin C), Glutathione, Zinc, 100mg NAD+, and Taurine</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30"}}}} -->
<div class="wp-block-buttons" style="padding-top:var(--wp--preset--spacing--30)"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/book-now/">Book Now</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->'
);
