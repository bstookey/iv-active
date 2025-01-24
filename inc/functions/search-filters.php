<?php

$post_types = array('news', 'page', 'dlm_download', 'events', 'recommendation', 'indicator', 'profiles');

function custom_search_filter($query)
{
    global $post_types;

    if (!is_admin() && $query->is_main_query() && $query->is_search()) {

        $query->set('post_type', $post_types);

        add_filter('posts_orderby', 'custom_search_orderby', 10, 2);
    }
}

function custom_search_orderby($orderby, $query)
{
    global $wpdb;

    if ($query->is_search()) {
        $orderby = "
            CASE
                WHEN {$wpdb->posts}.post_type = 'page' THEN 1
                WHEN {$wpdb->posts}.post_type = 'news' THEN 2
                WHEN {$wpdb->posts}.post_type = 'dlm_download' THEN 3
                WHEN {$wpdb->posts}.post_type = 'events' THEN 4
                WHEN {$wpdb->posts}.post_type = 'recommendation' THEN 5
                WHEN {$wpdb->posts}.post_type = 'indicator' THEN 6
                WHEN {$wpdb->posts}.post_type = 'profiles' THEN 7
                ELSE 8
            END, {$wpdb->posts}.post_date DESC";
    }

    return $orderby;
}

//add_action('pre_get_posts', 'custom_search_filter');
