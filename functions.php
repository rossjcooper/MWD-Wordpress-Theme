<?php
if (file_exists(get_template_directory() . '/vendor/autoload.php')) {
    include get_template_directory() . '/vendor/autoload.php';
}

add_filter('wp_title', 'mwd_fixed_home_wp_title');
add_action('wp_enqueue_scripts', 'mwd_enqueue_styles');
add_action('wp_enqueue_scripts', 'mwd_enqueue_scripts');

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

/**
 * Enqueues styles for the theme.
 */
function mwd_enqueue_styles()
{
    wp_enqueue_style('theme-screen-style', get_template_directory_uri() . '/public/css/screen' . mwd_get_asset_suffix() . '.css');
    wp_enqueue_style('theme-print-style', get_template_directory_uri() . '/public/css/print' . mwd_get_asset_suffix() . '.css');
}

/**
 *  Enqueues the scripts for the theme.
 */
function mwd_enqueue_scripts()
{
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/public/js/main' . mwd_get_asset_suffix() . '.js', array('jquery'), '1.0.0', true);
}

/**
 * Returns '.min' if Wordpress is not in DEBUG mode.
 *
 * Useful for including production files when DEBUG is off.
 *
 * @return string '.min' if Debug is on otherwise empty string.
 */
function mwd_get_asset_suffix()
{
    return (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';
}

