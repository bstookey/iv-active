<?php

/**
 * Block Name: Exhibition Grid
 *
 * This is the template that displays an exhibition grid.
 */

$post_ID = get_the_ID();

$classes = '';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}

$today = current_time('Ymd');
$order = 'ASC';

$meta_query = array(
    'relation' => 'AND',
    array(
        'key' => 'expiration_date',
        'value' => $today,
        'type' => 'DATE',
        'compare' => '>='
    ),
);

$args = array(
    'post_type' => 'events',
    'post_status' => 'publish',
    'posts_per_page' => 9,
    'meta_key' => 'expiration_date',
    'orderby'   => 'meta_value_num',
    'order'     => $order,
    'meta_query' => $meta_query
);
$query = new WP_Query($args);

if ($query->have_posts()) :
    $totalposts = $query->found_posts;
?>
    <div class="events-posts-wrapper  <?php echo esc_attr($classes); ?>">
        <ul class="post-item-wrapper events-posts">
            <?php while ($query->have_posts()) : $query->the_post();
                $id = get_the_ID();
                $title = get_the_title($id);
                $link = get_the_permalink($id);
                $expiration_date = get_field('expiration_date', $id);
                //echo $today . '<br />';
                //echo $expiration_date;
            ?>
                <li class="wp-block-post event">
                    <div class="post-item wp-block-group">
                        <figure class="wp-block-post-featured-image">
                            <?= get_the_post_thumbnail(
                                $id,
                                'medium',
                                array(
                                    'sizes' => '(max-width: 360px) 75vw, 230px', // Just an example.
                                ),
                            ); ?>
                        </figure>
                        <h2 class="wp-block-post-title">
                            <?= $title ?>
                            </a>
                        </h2>
                        <!-- <div class="post-excerpt wp-block-post-excerpt">
                            <?php echo get_custom_word_excerpt($post_ID, 10, ''); ?>
                        </div> -->
                        <div class="detail-link">
                            View Details
                        </div>
                        <a href="<?= $link ?>" class="post-link wp-block-read-more"><span class="visually-hidden">Click to read <?= $title ?></span></a>
                    </div>
                </li>
            <?php endwhile;
            wp_reset_query(); ?>
        </ul>
    </div>
<?php endif; ?>