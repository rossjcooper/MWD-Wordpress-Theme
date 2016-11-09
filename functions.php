<?php
if (file_exists(get_template_directory() . '/vendor/autoload.php')) {
    include get_template_directory() . '/vendor/autoload.php';
}

add_filter('wp_title', 'mwd_fixed_home_wp_title');

/**
 * Customize the title for the home page, if one is not set.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function mwd_fixed_home_wp_title($title)
{
    if (empty($title) && (is_home() || is_front_page())) {
        $title = __('Home', 'textdomain') . ' | ' . get_bloginfo('description');
    }
    return $title;
}