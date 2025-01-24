<?php

/**
 * Block Name: Footer Connect 
 *
 * This is the template that displays the footer phone and email.
 * 
 * ACF theme options fields
 * 
 */

?>

<div class="footer-connect">
    <div class="phone d-flex d-md-none"><a href="tel:<?php the_field('phone_number', 'option'); ?>">
            <span><?php print_svg(['icon' => 'phone-volume', 'width'  => '24', 'height' => '24']); ?></span>
            <?php the_field('phone_number', 'option'); ?></a>
    </div>
    <div class="phone d-none d-md-flex">
        <span><?php print_svg(['icon' => 'phone-volume', 'width'  => '24', 'height' => '24']); ?></span>
        <?php the_field('phone_number', 'option'); ?>
    </div>
    <div class="email"><a href="<?php the_field('email_address', 'option'); ?>" class="href">
            <span><?php print_svg(['icon' => 'envelope', 'width'  => '24', 'height' => '24']); ?></span>
            <?php the_field('email_address', 'option'); ?></a>
    </div>
</div>