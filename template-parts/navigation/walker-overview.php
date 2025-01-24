<?php
class Block_Navigation_Walker extends Walker_Nav_Menu
{
    private $is_nav_opened = false;

    public function start_lvl(&$output, $depth = 0, $args = null)
    {
        // Add submenu <ul>
        $output .= '<ul class="sub-menu">';
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        // Only wrap with <nav> for the top-level menu (depth 0)
        if (!$this->is_nav_opened && $depth === 0) {
            $classes = 'walker items-justified-right no-wrap nav-primary wp-block-navigation ' . ($args->theme_location ?? '');
            $output .= '<nav class="' . esc_attr($classes) . '" aria-label="' . esc_attr($args->theme_location ?? 'Menu') . '">';
            $output .= '<ul class="top-level-menu">'; // Start top-level <ul>
            $this->is_nav_opened = true;
        }

        // Add classes to the <li>
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        // Build the menu item
        $attributes = !empty($item->url) ? ' href="' . esc_url($item->url) . '"' : '';
        $output .= '<li' . $class_names . '>';
        $output .= '<a' . $attributes . '>' . apply_filters('the_title', $item->title, $item->ID) . '</a>';
        if ($args->walker->has_children) {
            $output .= '<button><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" stroke="#ffffff" viewBox="0 0 12 12" fill="none" aria-hidden="true" focusable="false"><path d="M1.50002 4L6.00002 8L10.5 4" stroke-width="1.5"></path></svg></button>';
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        // Close submenu <ul>
        $output .= '</ul>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= '</li>';

        // Close the top-level <ul> and <nav> if it's the last item
        if ($this->is_nav_opened && $depth === 0 && $item->menu_order === $args->menu->count) {
            $output .= '</ul>'; // Close top-level <ul>
            $output .= '</nav>'; // Close <nav>
            $this->is_nav_opened = false;
        }
    }
}
