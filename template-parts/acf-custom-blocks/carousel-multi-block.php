<?php

/**
 * Block Name: IV Carousel Block
 *
 * This is the template that displays a carousel based on the template.
 */

$blockid = $block['id'];
$carousel_type = get_field('carousel_type');
//print_r($carousel_type);

$classes = '';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}

?>

<?php
// check if the flexible content field has rows of data
if (have_rows('carousel_type')): ?>
    <?php
    // loop through the rows of data
    while (have_rows('carousel_type')) : the_row(); ?>
        <?php if (get_row_layout() == 'step_carousel'): ?>
            <?php
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
            <?php endif; ?>
        <?php elseif (get_row_layout() == 'testimonials') : ?>
            <?php if (have_rows('testimonials')): ?>
                <div class="testimonial-carousel <?php echo esc_attr($classes); ?>">
                    <div class="testimonial-navigation">
                        <a class="carousel-control-prev" href="#carousel-<?= $blockid ?>" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true">
                                <?php print_svg([
                                    'icon' => 'chevron-up',
                                    'width'  => '50',
                                    'height' => '30'
                                ]); ?>
                            </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-<?= $blockid ?>" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true">
                                <?php print_svg([
                                    'icon' => 'chevron-down',
                                    'width'  => '50',
                                    'height' => '30'
                                ]); ?>
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div id="carousel-<?= $blockid ?>" class="vertical-carousel carousel slide">
                        <div class="carousel-inner">
                            <?php
                            $i = 0; // Initialize $i before the loop
                            while (have_rows('testimonials')) : the_row(); ?>
                                <?php
                                $testimonial = get_sub_field('testimonial');
                                $testimonial_id = is_object($testimonial) ? $testimonial->ID : $testimonial; // Ensure compatibility with ID or object
                                $featured_image = get_the_post_thumbnail($testimonial_id, 'medium');

                                if ($testimonial): ?>
                                    <div class="carousel-item">
                                        <div class="iv-carousel-item">
                                            <div class="testimonial-image">
                                                <?php if ($featured_image): ?>
                                                    <?= $featured_image ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="testimonial-content">
                                                <div class="testimonial-text"><strong><?= esc_html(get_post_field('post_content', $testimonial_id)) ?></strong></div>
                                                <div class="testimonial-title"><strong> - <?= esc_html(get_the_title($testimonial_id)) ?></strong></div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                    $i++;
                                endif; ?>

                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <p>No testimonials selected.</p>
            <?php endif; ?>
        <?php endif; ?>
    <?php endwhile; ?>
<?php else : ?>

    <p>No layouts found</p>

<?php endif; ?>