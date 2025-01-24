<?php

/**
 * Function to return posts
 *
 * @param string $type, $order, $limit
 *
 */

function theme_get_posts($type, $order = 'post_date', $limit = null)
{
    if ($order == 'post_date') {
        $dir = 'DESC';
    } else {
        $dir = 'ASC';
    }
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => $type,
        'orderby' => $order,
        'order' => $dir,
        'posts_per_page' => $limit,
        'post_status' => 'publish',
        'paged' => $paged,
    );
    $gp_query = new WP_Query($args);
    return $gp_query;
}
