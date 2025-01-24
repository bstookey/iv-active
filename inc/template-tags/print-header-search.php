<?php

/**
 * Display header search.
 *
 * @package Wordpress
 */

function iv_active_display_search()
{

    // Get our button setting.
    $button_setting = get_theme_mod('iv_active_search_checkbox');

    // If we have no button displayed, don't display the markup.
    if (!$button_setting) {
        return false;
    }
?>
    <!-- <div class="desktop-search" id="desktop-search" aria-hidden="false"> -->
    <?php echo get_search_form(); ?>
    <!-- </div> -->
<?php
}
