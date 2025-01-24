<?php

/**
 * Block Name: Header Connect 
 *
 * This is the template that displays the header phone and email.
 * 
 * ACF theme options fields
 * 
 */

?>
<div class="container">
    <div class="header-connect">
        <div class="phone d-none"><a href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a></div>
        <div class="phone ">Contact Us: <?php the_field('phone_number', 'option'); ?></div>
        <div class="email"><a href="<?php the_field('email_address', 'option'); ?>" class="href"><?php print_svg([
                                                                                                        'icon' => 'envelope',
                                                                                                        'width'  => '34',
                                                                                                        'height' => '34'
                                                                                                    ]); ?><?php the_field('email_address', 'option'); ?></a></div>
    </div>
</div>