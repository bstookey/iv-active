<?php

/**
 * Block Name: First Read Block
 *
 * This is the template that displays a first read style block.
 */

$enable = get_field('enable');
$carousel_posts = get_field('testimonials');
$interval = get_field('interval');

$classes = '';
if (!empty($block['className'])) {
  $classes .= sprintf(' %s', $block['className']);
}
if ($carousel_posts) :
  $count = count(get_field('testimonial-carousels'));
?>
  <div id="featured-carousel" class="carousel slide carousel-fade <?php echo esc_attr($classes); ?> <?php echo $size; ?>" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php foreach ($carousel_posts as $carousel_post) :
        $id = $carousel_post->ID;
        $slug = $carousel_post->post_name;
        $title = get_the_title($id);
        $content = apply_filters('the_content', get_post_field('post_content', $id));
        $subtitle = get_field('sub_title', $id);
        $filter_img = (get_the_post_thumbnail_url($id, 'full') != '') ? get_the_post_thumbnail_url($id, 'full') : cust_theme_option('default_img');

      ?>
        <div class="carousel-item <?= $theme ?>" style="<?= esc_attr(filtered_background_image_style($id, $theme_color, 'full')); ?>">
          <div class="carousel-content">
            <div class="carousel-content-inner">
              <?php if ($content) : ?>
                <div class="text-content">
                  <?= $content; ?>
                </div>
              <?php endif; ?>
              <p class="title"><?php echo stripslashes($title); ?></p>
              <?php if ($subtitle) : ?>
                <div class="subtitle <?= $theme ?>">
                  <?= $subtitle; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php if ($count > 1) : ?>
      <div class="controls">
        <button class="carousel-control-prev" type="button" data-bs-target="#featured-carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#featured-carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    <?php endif; ?>
    <div class="carousel-indicators carouselDots">
      <?php $i = 0;
      foreach ($carousel_posts as $carousel_post) : ?>
        <button type="button" data-bs-target="#featured-carousel" data-bs-slide-to="<?php echo $i; ?>" aria-label="Slide <?php echo $i; ?>"></button>
      <?php $i++;
      endforeach; ?>
    </div>
  </div>
  <script>
    + function($) {
      $(document).ready(function() {
        APP.Carousel.init(<?= $interval ?>); // function in main.js
      });
    }(jQuery);
  </script>
<?php endif; ?>