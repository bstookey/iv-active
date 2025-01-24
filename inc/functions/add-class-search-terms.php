<?php
// Add Bold to searched term
function highlight_results($text)
{
    if (is_search() && !is_admin()) {
        $sr = get_query_var('s');
        if ($sr) {
            $keys = explode(" ", $sr);
            $keys = array_filter($keys);
            $regEx = '\'(?!((<.*?)|(<a.*?)))(\b' . implode('|', $keys) . '\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'iu';
            $text = preg_replace($regEx, '<span class="search-highlight">\0</span>', $text);
        }
    }
    return $text;
}
//add_filter('the_excerpt', 'highlight_results');
//add_filter('custom_excerpt', 'highlight_results', 20);
//add_filter('the_title', 'highlight_results');

function strip_unwanted_content($content)
{
    // Remove script tags and their content
    $content = preg_replace('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i', '', $content);
    // Remove shortcodes
    $content = strip_shortcodes($content);
    // Remove HTML tags
    $content = strip_tags($content);
    // Remove embed URLs
    $content = preg_replace('/https?:\/\/[^\s]+/', '', $content);
    // Remove HTML comments
    $content = preg_replace('/<!--.*?-->/s', '', $content);
    return $content;
}

function highlight_and_extract_snippet($content, $length = 140)
{
    if (is_search() && !is_admin()) {
        $sr = get_query_var('s');
        if ($sr) {
            // Strip unwanted content
            $content = strip_unwanted_content($content);

            $keys = explode(" ", $sr);
            $keys = array_filter($keys);
            $regEx = '\'(?!((<.*?)|(<a.*?)))(\b' . implode('|', $keys) . '\b)(?!(([^<>]*?)>)|([^>]*?</a>))\'iu';

            // Check for the first match and highlight it
            if (preg_match($regEx, $content, $match, PREG_OFFSET_CAPTURE)) {
                $match_pos = $match[0][1];
                $start = max($match_pos - intval($length / 2), 0);
                $end = min($match_pos + intval($length / 2), strlen($content));

                // Ensure start and end are at word boundaries and do not exceed content length
                while ($start > 0 && !ctype_space($content[$start - 1])) {
                    $start--;
                }
                while ($end < strlen($content) && !ctype_space($content[$end])) {
                    $end++;
                }

                $snippet = substr($content, $start, min($length, $end - $start));

                // Add ellipses if the snippet is not from the start or end of the text
                if ($start > 0) {
                    $snippet = '...' . $snippet;
                }
                if ($end < strlen($content)) {
                    $snippet .= '...';
                }

                // Highlight the keywords in the snippet
                $snippet = preg_replace($regEx, '<span class="search-highlight">\0</span>', $snippet);

                return $snippet;
            }
        }
    }
    return mb_substr($content, 0, $length) . (strlen($content) > $length ? '...' : '');
}
