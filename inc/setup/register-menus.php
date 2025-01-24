<?php

/**
 * Register Menus
 *
 * @package Wordpress
 */

register_nav_menus(
    array(
        'primary' => __('IV Primary', THEME_DOMAIN),
        'footer' => __('IV Footer Menu', THEME_DOMAIN),
        'ooter-social' => __('IV Footer Social', THEME_DOMAIN),
        'mobile'  => __('IV Mobile', THEME_DOMAIN),
    )
);
