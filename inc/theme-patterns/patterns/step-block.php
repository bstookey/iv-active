<?php

/**
 * Title: Steb Block
 * Slug: iv-active/step-block
 * Categories: IV-Active Patterns
 * Block Types: core/template-part/group
 * Description: Cover Image, step number, titles, and list in a group.
 * Keywords: step, slide
 *
 * @package IV Active
 * @since IV Active 1.0
 */

return array(
    'title'      => __('Step Block', THEME_DOMAIN),
    'name'      => __('step-block', THEME_DOMAIN),
    'description' => __('Cover Image, step number, titles, and list in a group.', THEME_DOMAIN),
    'categories' => array('iv_blocks'),
    'keywords'    => ['step', 'slide'],
    'content'    => '<!-- wp:group {"metadata":{"name":"Step Block"},"className":"step-block","layout":{"type":"constrained"}} -->
<div class="wp-block-group step-block"><!-- wp:cover {"url":"http://localhost:8888/iv-active/wp-content/uploads/shutterstock_2188096049-1920w.webp","id":436,"dimRatio":0,"isUserOverlayColor":true,"contentPosition":"top left","layout":{"type":"default"}} -->
<div class="wp-block-cover has-custom-content-position is-position-top-left"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-436" alt="" src="http://localhost:8888/iv-active/wp-content/uploads/shutterstock_2188096049-1920w.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size">Step 1</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"metadata":{"name":"Step Content"},"className":"step-content","layout":{"type":"constrained"}} -->
<div class="wp-block-group step-content"><!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">Schedule Your Visit</h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading">Booking Your Appointment</h4>
<!-- /wp:heading -->

<!-- wp:list {"metadata":{"name":"Checkmark Circled List","categories":["theme_patterns"],"patternName":"iv-active/list-checkmark-circle"},"className":"checkmark-list circle"} -->
<ul class="wp-block-list checkmark-list circle"><!-- wp:list-item -->
<li>Click Book Now and provide your information to submit a request</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>Complete the easy-to-follow steps in your confirmation email to move forward</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>'
);
