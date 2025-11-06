<?php

/**
 * Register Menus
 *
 * @package Wordpress
 */

register_nav_menus(
    array(
        'primary' => __('Happy Tapir Primary', THEME_DOMAIN),
        'footer' => __('Happy Tapir Footer Menu', THEME_DOMAIN),
        'ooter-social' => __('Happy Tapir Footer Social', THEME_DOMAIN),
        'mobile'  => __('Happy Tapir Mobile', THEME_DOMAIN),
    )
);
