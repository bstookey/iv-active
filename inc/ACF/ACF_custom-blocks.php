<?php

/**
 *
 * Adds IP theme custom blocks
 *
 * @package Wordpress
 * @subpackage IV-Active
 * @since  1.0
 * 
 */

// Make sure ACF is active.
if (!function_exists('acf_register_block_type')) {
  return;
}

/**
 * Init Custom blocks.
 */

add_action('acf/init', 'iv_active_acf_init');

function iv_active_acf_init()
{
  $category_default = 'iv-active-blocks';
  $mode_default = 'preview';
  $acf_block_path = '/template-parts/acf-custom-blocks/';

  $supports = array(
    'align' => array('full', 'wide'),
    'mode' => true,
    'anchor' => true,
    'jsx' => true,
  );

  /**
   * check function exists.
   */

  if (function_exists('acf_register_block_type')) {

    // Accordion Block
    acf_register_block_type(array(
      'name' => 'accordion-block',
      'title' => __('Accordion Block'),
      'description' => esc_html__('Pull titles and content from selected post to be displayed as an accordion item.', 'iv-active'),
      'render_template' => $acf_block_path . 'accordion-block.php',
      'category'        => $category_default,
      'icon' => 'menu',
      'keywords' => array('dropdown', 'accordion', 'collapse'),
      'align' => 'full',
      'mode' => $mode_default,
      'supports' => array_merge($supports, array('align' => false)),
      // Set up preview
      'example'  => array(
        'attributes' => array(
          'mode' => 'preview',
          'data' => array(
            '_is_preview'   => 'true'
          )
        )
      ),
    ));

    // Iframe Block
    acf_register_block_type(array(
      'name'      => 'iframe-block',
      'title'      => __('Iframe Block'),
      'description' => esc_html__('Display an iframe at full element width maintaining proportions', 'iv-active'),
      'render_template'  => $acf_block_path . 'iframe-block.php',
      'category'    => $category_default,
      'icon'      => 'format-image',
      'keywords'    => array('iframe', 'embed'),
      'align' => 'full',
      'mode'      => $mode_default,
      'supports' => array_merge($supports, array('align' => true)),
    ));

    // Header Connect Block
    acf_register_block_type(array(
      'name'      => 'header-connect-block',
      'title'      => __('Header Connect'),
      'description' => esc_html__('Display a block in the header to display phone and email', 'iv-active'),
      'render_template'  => $acf_block_path . 'header-connect-block.php',
      'category'    => $category_default,
      'icon'      => 'format-image',
      'keywords'    => array('phone', 'email', 'text', 'header'),
      'align' => 'full',
      'mode'      => $mode_default,
      'supports' => array_merge($supports, array(
        'align' => true,
        'inserter' => false, // Prevents block from appearing in the block inserter.
      )),
    ));

    // Footer Connect Block
    acf_register_block_type(array(
      'name'      => 'footer-connect-block',
      'title'      => __('Footer Connect'),
      'description' => esc_html__('Display a block in the footer to display phone and email', 'iv-active'),
      'render_template'  => $acf_block_path . 'footer-connect-block.php',
      'category'    => $category_default,
      'icon'      => 'format-image',
      'keywords'    => array('phone', 'email', 'text', 'footer'),
      'align' => 'full',
      'mode'      => $mode_default,
      'supports' => array_merge($supports, array(
        'align' => true,
        'inserter' => false, // Prevents block from appearing in the block inserter.
      )),
    ));

    // Footer Social Block
    acf_register_block_type(array(
      'name'      => 'footer-social-block',
      'title'      => __('Footer Social'),
      'description' => esc_html__('Display a block in the footer to display social links in the customizer', 'iv-active'),
      'render_template'  => $acf_block_path . 'footer-social-block.php',
      'category'    => $category_default,
      'icon'      => 'format-image',
      'keywords'    => array('facebook', 'instagram', 'tictok', 'social', 'footer'),
      'align' => 'full',
      'mode'      => $mode_default,
      'supports' => array_merge($supports, array(
        'align' => true,
        'inserter' => false, // Prevents block from appearing in the block inserter.
      )),
    ));

    // Footer Copyright Block
    acf_register_block_type(array(
      'name'      => 'footer-copyright-block',
      'title'      => __('Footer Copyright'),
      'description' => esc_html__('Display a block in the footer to display copyright date and text', 'iv-active'),
      'render_template'  => $acf_block_path . 'footer-copyright-block.php',
      'category'    => $category_default,
      'icon'      => 'format-image',
      'keywords'    => array('copyright', 'footer'),
      'align' => 'full',
      'mode'      => $mode_default,
      'supports' => array_merge($supports, array(
        'align' => true,
        //'inserter' => false, // Prevents block from appearing in the block inserter.
      )),
    ));

    // Image Carousel Block
    acf_register_block_type(array(
      'name'      => 'iv-carousel-block',
      'title'      => __('IV Carousel'),
      'description' => esc_html__('Display a block for varius types of carousels', 'iv-active'),
      'render_template'  => $acf_block_path . 'carousel-multi-block.php',
      'category'    => $category_default,
      'icon'      => 'dashicons-images-alt',
      'keywords'    => array('carousel', 'gallery', 'step', 'testimonial'),
      'align' => 'full',
      'mode'      => $mode_default,
      'supports' => array_merge($supports, array(
        'align' => true,
        //'inserter' => false, // Prevents block from appearing in the block inserter.
      )),
    ));

    // Related Posts
    acf_register_block_type(array(
      'name'      => 'related-posts',
      'title'      => __('Related Posts'),
      'description' => esc_html__('Selected posts displayed in a block grid with ', 'iv-active'),
      //'render_template'  => $acf_block_path . 'related-posts.php',
      'render_callback' => 'render_related_posts',
      'category'    => $category_default,
      'icon'      => 'dashicons-grid-view',
      'keywords'    => array('related', 'post', 'blog', 'similar'),
      'align' => 'full',
      'mode'      => $mode_default,
      'supports' => array_merge($supports, array('align' => false)),
    ));

    // Event Posts
    acf_register_block_type(array(
      'name'      => 'event-posts',
      'title'      => __('Event Posts'),
      'description' => esc_html__('Selected events displayed in a block grid with ', 'iv-active'),
      //'render_template'  => $acf_block_path . 'related-posts.php',
      'render_callback' => 'render_event_posts',
      'category'    => $category_default,
      'icon'      => 'dashicons-grid-view',
      'keywords'    => array('event', 'post'),
      'align' => 'full',
      'mode'      => $mode_default,
      'supports' => array_merge($supports, array('align' => false)),
    ));
  }

  /** 
   * hide drafts for selecting posts via post post_status
   */

  add_filter('acf/fields/post_object/query', 'acf_fields_post_object_query', 10, 3);
  function acf_fields_post_object_query($args, $field, $post_id)
  {
    $args['post_status'] = 'publish';
    return $args;
  }
}

/**
 * Adds a IV Active Block category to the Gutenberg category list.
 *
 * @param array  $categories The existing categories.
 * @param object $post The current post.
 * @return array The updated array of categories.
 */
function iv_active_add_block_categories($categories, $post)
{
  $iv_active_category = array(
    array(
      'slug'  => 'iv-active-blocks',
      'title' => esc_html__('IV-Active Blocks', 'iv_active'),
    ),
  );

  // Merge the 'IV-Active Blocks' category at the beginning of the array
  array_unshift($categories, ...$iv_active_category);

  return $categories;
}
add_filter('block_categories_all', 'iv_active_add_block_categories', 10, 2);

// Related Posts callback
function render_related_posts($block)
{
  // Gather data specific to this block
  $block_data = [
    'related_title'   => get_field('related_title', get_the_ID()),
    'related_posts' => get_field('related_posts', get_the_ID()),
  ];

  // Include the shared template
  include get_template_directory() . '/template-parts/acf-custom-blocks/block-related-posts.php';
}

// Related Posts callback
function render_event_posts($block)
{
  // Gather data specific to this block
  $block_data = [
    'expiration_date' => get_field('expiration_date', get_the_ID()),
  ];

  // Include the shared template
  include get_template_directory() . '/template-parts/acf-custom-blocks/block-event-posts.php';
}


/**
 * Our callback function – this looks for the block based on its given name.
 * Name accordingly to the file name!
 *
 * @param array $block The block details.
 * @return void Bail if the block has expired.
 */
function iv_active_acf_block_registration_callback($block)
{

  // Convert the block name into a handy slug.
  $block_slug = str_replace('acf/', '', $block['name']);

  // Make sure we have fields.
  $start_date = isset($block['data']['other_options_start_date']) ? $block['data']['other_options_start_date'] : '';
  $end_date   = isset($block['data']['other_options_end_date']) ? $block['data']['other_options_end_date'] : '';

  // If the block has expired, then bail! But only on the frontend, so we can still see and edit the block in the backend.
  if (! is_admin() && _s_has_block_expired(
    array(
      'start_date' => strtotime($block['data']['other_options_start_date'], true),
      'end_date'   => strtotime($block['data']['other_options_end_date'], true),
    )
  )) {
    return;
  }

  iv_active_display_expired_block_message();

  // Include our template part.
  if (file_exists(get_theme_file_path('/template-parts/acf-custom-blocks/block-' . $block_slug . '.php'))) {
    include get_theme_file_path('/template-parts/acf-custom-blocks/block-' . $block_slug . '.php');
  }
}

/**
 * Returns the class names set for a content block.
 *
 * @param array $block The block settings.
 * @return string The class, if one is set.
 */
function iv_active_get_block_classes($block)
{

  if (!$block) {
    return;
  }

  $classes  = '';
  $classes  = iv_active_get_block_expired_class();
  $classes .= !empty($block['className']) ? ' ' . esc_attr($block['className']) : '';

  return $classes;
}

/**
 * Returns a class to be used for expired blocks.
 *
 * @return string The class, if one is set.
 */
function iv_active_get_block_expired_class()
{

  if (!is_admin()) {
    return;
  }

  $other_options = get_sub_field('other_options') ? get_sub_field('other_options') : get_field('other_options')['other_options'];

  if (iv_active_has_block_expired(
    array(
      'start_date' => $other_options['start_date'],
      'end_date'   => $other_options['end_date'],
    )
  )) {
    return ' block-expired';
  }
}

/**
 * Displays a message for the user on the backend if a block is expired.
 *
 * @return void Bail if the block isn't expired.
 */
function iv_active_display_expired_block_message()
{

  if (!iv_active_get_block_expired_class()) {
    return;
  }

?>
  <div class="block-expired-message">
    <span class="block-expired-text"><?php esc_html_e('Your block has expired. Please change or remove the Start and End dates under Other Options to display your block on the frontend.', 'iv_active'); ?></span>
  </div>
<?php
}

/**
 * Returns the alignment set for a content block.
 *
 * @param array $block The block settings.
 * @return string The class, if one is set.
 */
function iv_active_get_block_alignment($block)
{

  if (!$block) {
    return;
  }

  return !empty($block['align']) ? ' align' . esc_attr($block['align']) : 'alignwide';
}

/**
 * Returns the ID (anchor link field) set for a content block.
 *
 * @param array $block The block settings.
 * @return string The ID, if one is set.
 */
function iv_active_get_block_id($block)
{

  if (!$block) {
    return;
  }

  return empty($block['anchor']) ? str_replace('_', '-', $block['id']) : esc_attr($block['anchor']);
}

add_filter('acf/load_field/name=iv_menu_select', function ($field) {
  // Get all registered menus
  $menus = get_terms('nav_menu', ['hide_empty' => false]);

  // Prepare choices
  $choices = [];
  if (!empty($menus) && !is_wp_error($menus)) {
    foreach ($menus as $menu) {
      $choices[$menu->slug] = $menu->name; // Use slug as the value, name as the label
    }
  }

  // Assign choices to the field
  $field['choices'] = $choices;

  return $field;
});
