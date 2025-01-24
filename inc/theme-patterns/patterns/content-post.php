<?php

/**
 * Title: Post Grid Template
 * Slug: iv-active/post-grid-template
 * Categories: query
 * Description: A custom post grid layout for your posts page.
 * Keywords: posts, grid, query loop
 */


return array(
    'title'      => __('IV Post Grid Template', 'iv-active'),
    'description' => __(' A custom post grid layout for your posts page.', 'iv-active'),
    'categories' => array('query'),
    'blockTypes'  => array('core/query'),
    'content'    => '<!-- wp:query {"queryId":9,"query":{"perPage":2,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false},"metadata":{"categories":["posts"],"patternName":"iv-active/content-post","name":"IV Blog Grid"},"className":"blog-query"} -->
<div class="wp-block-query blog-query">
<!-- wp:post-template {"className":"blog-posts","layout":{"type":"grid","columnCount":4}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"30px","right":"30px","bottom":"30px","left":"30px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px"><!-- wp:post-featured-image /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black","fontSize":"large","fontFamily":"poppins"} /-->

<!-- wp:post-excerpt {"style":{"elements":{"link":{"color":{"text":"var:preset|color|mediumgrey"}}},"typography":{"fontSize":"1.5rem"}},"textColor":"mediumgrey","fontFamily":"poppins"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-pagination -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query -->'
);
