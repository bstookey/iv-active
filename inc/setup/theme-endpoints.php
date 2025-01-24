<?php
// Add enpoint to access theme mods.

function get_custom_theme_mods()
{
    $theme_mods = get_theme_mods();
    return $theme_mods;
}

add_action('rest_api_init', function () {
    register_rest_route('wp/v2', '/theme_mods', array(
        'methods' => 'GET',
        'callback' => 'get_custom_theme_mods',
        // 'permission_callback' => function () {
        //     return current_user_can('edit_others_posts');
        // }
        'permission_callback' => '__return_true',
    ));
});
