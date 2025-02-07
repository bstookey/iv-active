<?php
$custom_code = get_field('custom_code'); // ACF field for user input
if ($custom_code):
?>

    <?php echo $custom_code;
    ?>

<?php endif; ?>
