<?php
function custom_taxonomy_search_function()
{
    $searchTerm = $_POST['searchTerm'];
    $taxonomyTerms = isset($_POST['taxonomyTerms']) ? explode(',', $_POST['taxonomyTerms']) : array();

    // Perform search query
    $search_query_args = array(
        'post_type' => 'dlm_download',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        's' => $searchTerm,
        'tax_query' => array(
            'relation' => 'AND',
        ),
    );

    // If taxonomy terms are selected, include them in the tax query
    if (!empty($taxonomyTerms)) {
        $search_query_args['tax_query'][] = array(
            'taxonomy' => 'dlm_download_category',
            'field' => 'term_id',
            'terms' => $taxonomyTerms,
        );
    }

    $search_query = new WP_Query($search_query_args);

    // Initialize an array to hold unique post IDs
    $unique_posts = array();

    // Output search results
    if ($search_query->have_posts()) : ?>
        <ul>
            <?php
            while ($search_query->have_posts()) {
                $search_query->the_post();
                $post_id = get_the_ID();

                // Check if the post ID is already in the unique_posts array
                if (in_array($post_id, $unique_posts)) {
                    continue;
                }

                // Add post ID to the unique_posts array
                $unique_posts[] = $post_id;

                $document_permalink = get_permalink();
                $file_type = '';

                // Get the Download Monitor download object for the given post ID
                try {
                    $download = download_monitor()->service('download_repository')->retrieve_single($post_id);
                } catch (Exception $exception) {
                    // no download found
                }

                // Check if download object is valid
                if ($download) {
                    // Get the version object
                    $version = $download->get_version();

                    // Get the file type
                    $file_type = $version->get_filetype();
                }

                // Display search results as desired
                echo '<li><a href="' . esc_url($document_permalink) . '" target="_blank">' . get_the_title() . ' <span class="file-type" style="text-transform: uppercase;">(' . $file_type . ')</span></a></li>';
            } ?>
        </ul>
    <?php else : ?>
        <p>No documents found for your search.</p>
<?php endif;

    wp_reset_postdata();

    die();
}

add_action('wp_ajax_custom_taxonomy_search_action', 'custom_taxonomy_search_function');
add_action('wp_ajax_nopriv_custom_taxonomy_search_action', 'custom_taxonomy_search_function');
