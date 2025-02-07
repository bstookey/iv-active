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
<div class="wp-block-group step-block"><!-- wp:cover {"url":"https://staging2.danc125.sg-host.com/wp-content/uploads/High-Res-How-It-Works-Step-2.jpg","id":737,"dimRatio":0,"isUserOverlayColor":true,"contentPosition":"top left","isDark":false,"layout":{"type":"default"}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-left"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-737" alt="" src="https://staging2.danc125.sg-host.com/wp-content/uploads/High-Res-How-It-Works-Step-2.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"medium-alt"} -->
<p class="has-text-align-center has-medium-alt-font-size">Step 2</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"className":"step-content","layout":{"type":"constrained"}} -->
<div class="wp-block-group step-content"><!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","fontStyle":"normal"}},"fontSize":"large-alt"} -->
<h3 class="wp-block-heading has-large-alt-font-size" style="font-style:normal;font-weight:700">Telehealth Screening</h3>
<!-- /wp:heading -->

<!-- wp:heading {"level":4,"fontSize":"medium-plus","fontFamily":"montserrat"} -->
<h4 class="wp-block-heading has-montserrat-font-family has-medium-plus-font-size">Medical Clearance</h4>
<!-- /wp:heading -->

<!-- wp:list {"metadata":{"name":"Checkmark Circled List","categories":["theme_patterns"],"patternName":"iv-active/list-checkmark-circle"},"className":"checkmark-list circle"} -->
<ul class="wp-block-list checkmark-list circle"><!-- wp:list-item -->
<li>Connect with a licensed practitioner to review your medical history</li>
<!-- /wp:list-item -->

<!-- wp:list-item -->
<li>New clients must be cleared prior to treatment and renewed once annually</li>
<!-- /wp:list-item --></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->'
);
