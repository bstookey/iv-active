<?php
function iv_active_get_theme_colors()
{
    // these colors are copied from src > scss > global > variables
    $colors = '(
        aqua: #10ddd6,
        aqualight: #d3f9f7,
        grey: #414345,
        darkgrey: #1f488d,
        mediumgray: #939393,
        lightgray: #e2e7ea,
        lightpink: #d6dadc,
        neutraldark: #292828,
        black: #000000,
        white: #ffffff
    )';

    $matches = [];
    preg_match_all('/(\w+):\s*#([0-9a-f]{6})/i', $colors, $matches, PREG_SET_ORDER);

    $color_array = array();
    foreach ($matches as $match) {
        $name = $match[1];
        $value = '#' . $match[2];
        $color_array[$name] = $value;
    }

    $final_array = array_merge($color_array);

    return $final_array;
}
