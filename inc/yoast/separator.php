<?php

/**
 * Adds wrapper around Yoast breadcrumb separator.
 *
 * @package Wordpress
 *
 */


add_filter('wpseo_breadcrumb_separator', function ($separator) {

    return "<span class='breadcrumb-separator'>&nbsp;" . $separator . "&nbsp;</span>";
});
