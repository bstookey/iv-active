<?php

/**
 * Block Name: Related Posts
 *
 * This is the template that displays bootstrap tabs of posts.
 */

$post_ID = get_the_ID();
//$title = get_field('related_title', $post_ID);
//$related = get_field('related_posts', $post_ID);

$title = $block_data['related_title'] ?? '';
$related = $block_data['related_posts'] ?? '';

$classes = '';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}

$block_anchor = (!empty($block['anchor'])) ? 'id="' . $block['anchor'] . '"' : '';

if ($related) :
?>
    <div <?= $block_anchor ?> class="related-posts-wrapper <?= $classes ?>">
        <?php if (!empty($title)) : ?><h2 <?= $block_anchor ?> class="related-title"><?= $title ?></h2><?php endif ?>
        <ul class="post-item-wrapper related-posts">
            <?php
            $i = 0;
            foreach ($related as $post) :
                $id = $post->ID;
                $title = $post->post_title;
                $slug = $post->post_name;
                $default_image = get_theme_mod('default_post_image') ? get_theme_mod('default_post_image') : '';
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'full');
                $post_img = ($image != '') ? 'style="' . esc_attr(theme_background_image_style($id, 'medium')) . ';"' : 'style="background-image: url(' . wp_get_attachment_image_url($default_image, "medium") . ')"';
                $link = get_the_permalink($id); ?>

                <li class="wp-block-post related">
                    <div id="<?= $slug ?>" class="post-item wp-block-group">
                        <figure class="wp-block-post-featured-image">
                            <?= get_the_post_thumbnail(
                                $id,
                                'medium',
                                array(
                                    'sizes' => '(max-width: 960px) 75vw, 230px', // Just an example.
                                ),
                            ); ?>
                        </figure>
                        <h2 class="wp-block-post-title">
                            <?= $title ?>
                            </a>
                        </h2>
                        <div class="post-excerpt wp-block-post-excerpt">
                            <?php echo get_custom_word_excerpt($post_ID, 40, ''); ?>
                        </div>
                        <a href="<?= $link ?>" class="post-link wp-block-read-more"><span class="visually-hidden">Click to read <?= $title ?></span></a>
                    </div>
                </li>

            <?php $i++;
            endforeach;
            ?>
        </ul>
    </div>
<?php endif;
?>
<?php wp_reset_postdata(); ?>