<?php

/**
 * Block Name: IV Carousel Block
 *
 * This is the template that displays a carousel based on the template.
 */


// check if the flexible content field has rows of data
if (have_rows('carousel_type')):
    // loop through the rows of data
    while (have_rows('carousel_type')) : the_row();
        // check current row layout
        if (get_row_layout() == 'step_carousel'):
            // check if the nested repeater field has rows of data
            if (have_rows('carousel_item')): ?>
                <div>
                    <?php
                    // loop through the rows of data
                    while (have_rows('carousel_item')) : the_row();
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $sub_title = get_sub_field('sub_title');
                        $step_content = get_sub_field('step_content'); ?>

                        <div class="iv-carousel-item">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            <h3><?php echo $title; ?></h3>
                            <h4><?php echo $sub_title; ?></h4>
                            <div><?php echo $step_content; ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
    <?php endif;
        endif;
    endwhile;
else : ?>

    <p>No layouts found</p>

<?php endif; ?>