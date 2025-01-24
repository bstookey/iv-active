<?php

/**
 * Block Name: Footer Social 
 *
 * This is the template that displays the footer social icons.
 * 
 * ACF theme options fields
 * 
 */

?>

<div class="footer-connect">
    <div class="footer-social-nav social">
        <?php
        $social_menu = get_theme_mod('cmap_master_social_menu_checkbox');

        if ($social_menu) {
            get_template_part('/template-parts/navigation/menu', 'footer-social');
        } else {
            print_social_network_links();
        }
        ?>
    </div>
</div>