<?php

/**
 * Title: Image/Title CTA
 * Slug: iv-active/image-title-cta
 * Categories: IV-Active Patterns
 * Description: An image and title as a link.
 * Keywords: cta, image
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Image/Title CTA', THEME_DOMAIN),
    'name'      => __('image-title-cta', THEME_DOMAIN),
    'description' => __('An image and title as a link.', THEME_DOMAIN),
    'categories' => array('iv_bootstrap'),
    'keywords'    => ['cta', 'image'],
    'content'    => '<!-- wp:group {"metadata":{"name":"Image/Title CTA"},"className":"image-title-cta is-link","layout":{"type":"constrained"}} -->
<div class="wp-block-group image-title-cta is-link"><!-- wp:image {"id":436,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="http://localhost:8888/iv-active/wp-content/uploads/shutterstock_2188096049-1920w.webp" alt="" class="wp-image-436"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontWeight":"700","fontStyle":"normal"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-center has-x-large-font-size" style="font-style:normal;font-weight:700">Philadelphia</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"metadata":{"name":"Hidden Link"},"className":"group-link"} -->
<p class="group-link"><a href="/styles/">Read More</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->'
);
