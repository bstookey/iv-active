<?php

/**
 * Print tilte of parent page.
 *
 * @param string  $level
 * 
 * @package Wordpress
 */

function get_parent_title($level = 'null')
{
    // Get the current page ID
    $current_page_id = get_the_ID();

    if (($level != 'null') and ($level == "top")) {
        // Get the top-level parent ID
        $top_parent_id = $current_page_id;
        while ($top_parent_id) {
            $page_ancestors = get_post_ancestors($top_parent_id);
            if ($page_ancestors) {
                $top_parent_id = end($page_ancestors);
            } else {
                break;
            }
        }

        // Get the title of the top-level parent
        //$top_parent_title = get_the_title($top_parent_id);
        $parent_title = (!empty(get_field('alternate_title', $top_parent_id))) ? get_field('alternate_title', $top_parent_id) : get_the_title($top_parent_id);
        // Output the top-level parent title

    } else {
        // Get the parent ID of the current page
        $parent_id = wp_get_post_parent_id($current_page_id);

        if ($parent_id) {
            // Get the title of the parent page
            $parent_title = (!empty(get_field('alternate_title', $parent_id))) ? get_field('alternate_title', $parent_id) : get_the_title($parent_id);
        }
    }

    return $parent_title;
}
