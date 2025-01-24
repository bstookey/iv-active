<?php

/**
 * Social Sharing Buttons.
 *
 * @return string
 */

function theme_social_sharing_buttons()
{
    global $post;
    if (is_singular() || is_home()) {
        // Get current page URL
        $articleURL = urlencode(get_permalink());
        // Get current page title
        $articleTitle = str_replace(' ', '%20', get_the_title());
        // Construct sharing URL without using any script
        $twitterURL  = 'https://twitter.com/intent/tweet?text=' . $articleTitle . '&amp;url=' . $articleURL . '&amp;';
        $facebookURL = 'https://www.facebook.com/sharer.php?u=' . $articleURL . '&t=' . $articleTitle . '';
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $articleURL . '&amp;title=' . $articleTitle;
        $emailURL = 'mailto:recipient@example.com?subject=NACHC%20Link&body=' . $articleURL;
        // Add sharing button at the end of page/page content
        $content = '<div class="social-share">';
        $content .= '<a class="share facebook" href="' . $facebookURL . '" data-network="facebook">Share on Facebook' . get_svg(['icon' => 'facebook', 'height' => 24]) . '</a>';
        $content .= '<a class="share linkedin" href="' . $linkedInURL . '"  data-network="linkedin">Share on Linked in' . get_svg(['icon' => 'linkedin', 'height' => 24]) . '</a>';
        $content .= '<a class="share twitter" href="' . $twitterURL . '"  data-network="twitter">Share on Twitter' . get_svg(['icon' => 'twitter', 'height' => 24]) . '</a>';
        $content .= '<a class="share email" href="' . $emailURL . '">Share via email' . get_svg(['icon' => 'email', 'height' => 24]) . '</a>';
        $content .= '</div>';
        echo $content;
    }
}

/**
 * Get the Twitter social sharing URL for the current page.
 *
 * @return string
 */
function theme_get_twitter_share_url()
{
    return add_query_arg(
        array(
            'text' => rawurlencode(html_entity_decode(get_the_title())),
            'url'  => rawurlencode(get_the_permalink()),
        ),
        'https://twitter.com/share'
    );
}

/**
 * Get the Facebook social sharing URL for the current page.
 *
 * @return string
 */
function theme_get_facebook_share_url()
{
    return add_query_arg('u', rawurlencode(get_the_permalink()), 'https://www.facebook.com/sharer/sharer.php');
}

/**
 * Get the LinkedIn social sharing URL for the current page.
 *
 * @return string
 */
function theme_get_linkedin_share_url()
{
    return add_query_arg(
        array(
            'title' => rawurlencode(html_entity_decode(get_the_title())),
            'url'   => rawurlencode(get_the_permalink()),
        ),
        'https://www.linkedin.com/shareArticle'
    );
}
