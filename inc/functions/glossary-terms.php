<?php
function custom_glossary_search_function()
{
    $search_value = sanitize_text_field($_POST['glossary_search_value']);

    $args = array(
        'post_type' => 'glossary',
        'posts_per_page' => -1, // Display all glossary posts
        's' => $search_value,
        'orderby' => 'title', // Order by title
        'order' => 'ASC', // Order in ascending order (A-Z)
    );

    $query = new WP_Query($args);

    $first_letters = array(); // Array to store unique first letters

    // Get all unique first letters from existing glossary posts
    while ($query->have_posts()) : $query->the_post();
        $title = get_the_title();
        $first_letter = strtoupper(substr($title, 0, 1));

        if (!in_array($first_letter, $first_letters)) {
            $first_letters[] = $first_letter;
        }
    endwhile;
    wp_reset_postdata(); ?>

    <div class="az-navigation">
        <strong>Jump To:&nbsp;</strong>

        <?php
        foreach (range('A', 'Z') as $letter) {
            if (in_array($letter, $first_letters)) {
                echo '<a href="#' . $letter . '" data-term="' . $letter . '">' . $letter . '</a>';
            }
        } ?>
    </div>
    <?php
    // Query again to get glossary posts
    $query = new WP_Query($args);

    if ($query->have_posts()) : ?>
        <div class="glossary-terms">
            <?php $current_letter = '';
            while ($query->have_posts()) : $query->the_post();
                $title = get_the_title();
                $content = get_the_content();
                // Get all post data
                $post_data = get_post(get_the_ID());
                $slug = $post_data->post_name;

                // Print all post data
                // echo '<pre>';
                // print_r($post_data);
                // echo '</pre>';

                // Get the first letter of the title or content
                $first_letter = strtoupper(substr($title, 0, 1));
                if (empty($first_letter)) {
                    $first_letter = strtoupper(substr($content, 0, 1));
                }

                // Check if the letter has changed
                if ($first_letter != $current_letter) {
                    // Output the letter heading
                    echo '<h2 id="' . $first_letter . '" class="first-letter">' . $first_letter . '</h2>';
                    $current_letter = $first_letter;
                } ?>
                <div id="<?= $slug ?>" class="glossary-term">
                    <h3 class="title h3"><?= $title ?></h3>
                    <div class="term"><?= strip_tags($content) ?></div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php else : ?>
            <?php echo 'No results found'; ?>
        </div>
<?php endif;

    die();
}


add_action('wp_ajax_custom_glossary_search_action', 'custom_glossary_search_function');
add_action('wp_ajax_nopriv_custom_glossary_search_action', 'custom_glossary_search_function');
