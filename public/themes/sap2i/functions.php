<?php

declare(strict_types=1);

/*
 * Structure
 * ------------------
 */
$autoloader = new Autoloader([
    get_template_directory() . '/includes/helpers/',
    get_template_directory() . '/includes/cpt/',
    get_template_directory() . '/includes/taxo/',
    get_template_directory() . '/App/Acf/',
]);

/*
 * Global settings
 * ---------------------------
 */
add_action('after_setup_theme', function () {
    show_admin_bar(false);

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);

    register_nav_menu('primary', __('Menu Principal'));
    register_nav_menu('footer', __('Pied de page'));
});

add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);

/*
 * Add admin menu to Editor role
 * ---------------------------
 */
$roleObject = get_role('editor');
if (!$roleObject->has_cap('view_menu')) {
    $roleObject->add_cap('view_menu');
}

if (!$roleObject->has_cap('edit_theme_options')) {
    $roleObject->add_cap('edit_theme_options');
}

/*
 * Define styles and scripts
 * ---------------------------
 */
function defineScripts()
{
    $assetsUrl = __DIR__;

    //Define style to inline
    if (function_exists('addEnqueueStyle')) {
        addEnqueueStyle('vendors', get_stylesheet_directory_uri() . mix('/styles/_vendor.css', $assetsUrl), '', '', 'all', true);
        addEnqueueStyle('style', get_stylesheet_directory_uri() . mix('/styles/style.css', $assetsUrl), '', '', 'all');
    } else {
        wp_enqueue_style('vendors', get_stylesheet_directory_uri() . mix('/styles/_vendor.css', $assetsUrl), '', '', true);
        wp_enqueue_style('style', get_stylesheet_directory_uri() . mix('/styles/style.css', $assetsUrl), '', '', true);
    }

    //Define script
    wp_enqueue_script('script', get_stylesheet_directory_uri() . mix('/scripts/script.js', $assetsUrl), '', '', true);
    wp_localize_script('script', 'jsData', [
        'adminAjax' => admin_url('admin-ajax.php'),
        'tplDir' => get_stylesheet_directory_uri(),
        'pin' => get_stylesheet_directory_uri() . '/assets/images/pin.png'
    ]);

    //Disabled Gutenberg CSS if not use
    wp_dequeue_style('wp-block-library');

    //Add Contact form 7 JS / CSS if page is contact
    if (is_page('contact')) {
        if (function_exists('wpcf7_enqueue_scripts')) {
            wpcf7_enqueue_scripts();
        }
    } else {
        wp_dequeue_script('wpcf7-recaptcha');
        wp_dequeue_script('google-recaptcha');
    }
}
add_action('wp_enqueue_scripts', 'defineScripts');
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');

/*
 * Add custom style for admin role and login page
 * ---------------------------
 */
if (function_exists('addAdminRoleCss')) {
    addAdminRoleCss('editor', get_template_directory_uri() . '/assets/admin/editor.css');
    addAdminRoleCss('administrator', get_template_directory_uri() . '/assets/admin/admin.css');
}

if (function_exists('addCustomCssLogin')) {
    $loginFile = get_bloginfo('stylesheet_directory') . '/assets/admin/login.css';
    addCustomCssLogin($loginFile);
}

/**
 * Disable auto resize image
 */
function remove_image_sizes($sizes, $metadata)
{
    return [];
}
add_filter('intermediate_image_sizes_advanced', 'remove_image_sizes', 10, 2);

/**
 * Map
 */
function shortcode_map()
{
    return '<div class="content_map"><div class="map"><iframe src="https://www.google.com/maps/d/embed?mid=1WeQOyNSWAfoF8aAn1YrN7A2he_Bh3RXA" width="640" height="480"></iframe></div></div>';
}
add_shortcode('map', 'shortcode_map');
