<?php

/**
 * Block Name: Iframe Block
 *
 * This is the template that displays a proportional iframe block.
 */

$iframe = get_field('iframe');
$classes = '';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}

if ($iframe) : ?>
    <div class="iframe-block-wrapper">
        <div class="iframe-block<?= $classes ?>">
            <?= $iframe ?>
        </div>
    </div>
<?php endif; ?>