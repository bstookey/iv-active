<?php

/**
 * Plugin Name: Custom Post Type Models
 * Description: WordPress plugin containing content models, supports responsive Guttenburg theme
 * Version: 1.0.0
 * license GPL v2
 */

//require_once('cpt-maker.php'); // included via the functions file

/********************************
 * Simple Post Type Registration
 * See cpt-maker.php(DO NOT EDIT) for all of the defaults. Override here. DO NOT edit cpt-maker.php.
 * 
 * https://developer.wordpress.org/resource/dashicons/
 * 
 ********************************/

global $location, $testimonials, $events;

/* News */
$locations = new CPT_Maker(
    array(
        'key'        => 'locations',
        'singular'    => 'Location',
        'plural'    => 'Locations',
    ),
    '_',
    array(
        'supports'         => array('title', 'editor', 'page-attributes', 'excerpt', 'thumbnail', 'revisions'),
        'hierarchical'     => false, // needs to be set to true to support 'page-attributes' default is false
        'has_archive'      => false,
        'menu_icon'        => 'dashicons-location', // see link above
        'menu_position'    => 6,
        'show_in_rest'     => true,
        //'query_var'        => true,
    )
);


/* Testimonials */
$testimonials = new CPT_Maker(
    array(
        'key'        => 'testimonials',
        'singular'    => 'Testimonial',
        'plural'    => 'Testimonials',
    ),
    '_',
    array(
        'supports'        => array('title', 'editor', 'page-attributes', 'thumbnail', 'revisions'),
        'menu_icon'        => 'dashicons-testimonial',
        'menu_position'    => 7,
        'has_archive' => false,
        'show_in_rest' => true,
    )
);

/* Events */
$events = new CPT_Maker(
    array(
        'key'        => 'events',
        'singular'    => 'Event',
        'plural'    => 'Events',
    ),
    '_',
    array(
        'supports'        => array('title', 'editor', 'page-attributes', 'thumbnail', 'revisions'),
        'menu_icon'        => 'dashicons-calendar',
        'menu_position'    => 8,
        'has_archive' => false,
        'show_in_rest' => true,
    )
);


/* Categories */

$locations->add_taxonomy(
    array(
        'key'        => 'region',
        'singular'    => 'Region',
        'plural'    => 'Regions'
    ),
    '_'
);

$locations->register();
$testimonials->register();
$events->register();
