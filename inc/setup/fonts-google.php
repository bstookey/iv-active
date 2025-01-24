<?php

/**
 * Register Google font.
 *
 * @link http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 *
 * @return string
 */
function iv_active_font_url()
{

    $fonts_url = '';

    /**
     * Translators: If there are characters in your language that are not
     * supported by the following, translate this to 'off'. Do not translate
     * into your own language.
     */
    $open_sans = esc_html_x('on', 'Open Sans font: on or off', 'iv_active');
    $montserrat = esc_html_x('on', 'Montserrat font: on or off', 'iv_active');
    $poppins = esc_html_x('on', 'Poppins font: on or off', 'iv_active');

    if ('off' !== $open_sans) {
        $font_families = array();

        if ('off' !== $open_sans) {
            $font_families[] = 'Open Sans:300,400,600,700';
        }

        if ('off' !== $montserrat) {
            $font_families[] = 'Montserrat:300,400,600,700,900';
        }

        if ('off' !== $poppins) {
            $font_families[] = 'Poppins:300,400,600,700,900';
        }

        $query_args = array(
            'family' => rawurlencode(implode('|', $font_families)),
        );

        $fonts_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
    }

    return $fonts_url;
}

function theme_google_fonts()
{
    // Register google fonts.
    wp_register_style('iv_active-google-font', iv_active_font_url(), array(), null);

    // Enqueue google fonts.
    wp_enqueue_style('iv_active-google-font');
}

//add_action('wp_enqueue_scripts', 'theme_google_fonts');
