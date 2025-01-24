<?php

/**
 * CMAP Primary Nav Navwalker
 *
 * @package CMAP-Primary-Nav-Navwalker
 * 
 * Custom CMAP nav walker to include back and close actions.
 * 
 */

if (!class_exists('Custom_Nav_Walker')) {

    class Custom_Nav_Walker extends Walker_Nav_menu
    {

        function start_lvl(&$output, $depth = 0, $args = null)
        {
            $indent = str_repeat("\t", $depth);
            $submenu = ($depth > 0) ? ' sub-menu' : '';
            $output .= "\n$indent<ul class=\"cmap-dropdown-menu$submenu  depth_$depth\">\n";
        }

        function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
        {
            $this->current_item = $item;

            $indent = ($depth) ? str_repeat("\t", $depth) : '';

            $li_attributes = '';
            $class_names = $value = '';

            $classes = empty($item->classes) ? array() : (array) $item->classes;

            //$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
            $classes[] = 'nav-item';
            $classes[] = 'nav-item-' . $item->ID;
            // if ($depth > 0 && $args->walker->has_children) {
            //     $classes[] = 'dropdown-sub-menu';
            // }

            $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
            $class_names = ' class="' . esc_attr($class_names) . '"';

            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

            $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
            $nav_link_class = ($depth > 0) ? 'cmap-dropdown-link ' : 'cmap-dropdown-link nav-link ';
            $attributes .= ($args->walker->has_children) ? ' class="' . $nav_link_class . $active_class . ' depth_' . $depth . '" aria-haspopup="true" aria-expanded="false"' : ' class="' . $nav_link_class . $active_class . '"';

            $item_output = $args->before;
            $item_output .= '<a' . $attributes . '>';
            $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
            if ($args->walker->has_children) {
                $item_output .= '<i class="fa-solid fa-chevron-down"></i></a>';
            }
            if (in_array('external', $item->classes)) {
                $item_output .= '<i class="fa-solid fa-up-right-from-square"></i>';
            }
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

            if (in_array("menu-item-has-children", $classes)) {
                if ($depth === 0) { // Only duplicate top-level items
                    $output .= '<li class="nav-link overview-item">';
                    $output .= '<a href="' . esc_url($item->url) . '" class="overview-link">';
                    $output .= 'Overview';
                    $output .= '</a>';
                    $output .= '</li>';
                }
            }
        }
    }
}
