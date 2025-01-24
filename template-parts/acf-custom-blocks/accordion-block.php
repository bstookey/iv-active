<?php

/**
 * Block Name: Accordion Block
 *
 * This is the template that displays rows of accordion posts.
 */

$blockid = $block['id'];
$simple_text_accordion = get_field('simple_text_accordion');
$accordion_title = get_field('accordion_title');
$accordion_text = get_field('accordion_text');
$posts = get_field('posts');

//print_r(get_field('posts'));

$classes = '';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}

?>

<?php // Block preview
if (!empty($block['data']['_is_preview'])) : ?>
    <figure>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/template-parts/acf-custom-blocks/previews/accordion.png" alt="Preview of Accordion custom block" style="min-width: 100%; max-width: 100%; max-height: 100%;">
    </figure>
<?php elseif (($simple_text_accordion == 1) and ($accordion_text != '')) :
    $accordion_title_slug = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "_", $accordion_title));
?>
    <div id="<?= $blockid ?>" class="post-accordion-list<?= $classes ?>">
        <div class="post-item">
            <h2 class="post-header accordion-header">
                <button id="<?= $accordion_title_slug ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ac-<?= $accordion_title_slug . '_' . $blockid ?>" aria-expanded="false" aria-controls="collapseOne"><?= $accordion_title ?>
                    <span class="arrow">
                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="18" cy="18" r="16.5" stroke="#008FD5" stroke-width="3" />
                            <path class="plus" d="M9 18.1182H18.1348M18.1348 18.1182H27M18.1348 18.1182L18.1348 9M18.1348 18.1182V27" stroke="#008FD5" stroke-width="3" />
                            <path class="minus" d="M9 18.1182H18.1348H27" stroke="#008FD5" stroke-width="3" />
                        </svg>
                    </span>
                </button>
            </h2>
            <div id="ac-<?= $accordion_title_slug . '_' . $blockid ?>" class="accordion-collapse collapse" aria-labelledby="accordion-header">
                <div class="accordion-body">
                    <?= $accordion_text; ?>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($posts) : ?>
    <div id="<?= $blockid ?>" class="post-accordion-list <?= $classes ?>">
        <?php foreach ($posts as $post) :
            $id = $post->ID;
            $slug = $post->post_name;
            $content = apply_filters('the_content', get_post_field('post_content', $id));
        ?>
            <div class="post-item">
                <h2 class="post-header accordion-header" data-title="<?= $post->post_title ?>">
                    <button id="<?= $slug ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ac-<?= $slug . '_' . $blockid ?>" aria-expanded="false" aria-controls="collapseOne"><?= $post->post_title ?>
                        <span class="arrow">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="18" cy="18" r="16.5" stroke="#008FD5" stroke-width="3" />
                                <path class="plus" d="M9 18.1182H18.1348M18.1348 18.1182H27M18.1348 18.1182L18.1348 9M18.1348 18.1182V27" stroke="#008FD5" stroke-width="3" />
                                <path class="minus" d="M9 18.1182H18.1348H27" stroke="#008FD5" stroke-width="3" />
                            </svg>

                        </span>
                    </button>
                </h2>
                <div id="ac-<?= $slug . '_' . $blockid  ?>" class="accordion-collapse collapse" aria-labelledby="<?= $slug . '_' . $blockid ?>" data-bs-parent="#<?= $blockid ?>" aria-labelledby="accordion-header">
                    <div class="accordion-body">
                        <?= $content; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <strong>No posts for this accordion have been selected or no text has been added.</strong><br />
<?php endif; ?>