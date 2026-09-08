<?php
/**
 * Plused Sigorta Theme Functions
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

// 1. Theme Setup
function plused_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Ana Menü',
        'footer'  => 'Footer Menü',
    ));
}
add_action('after_setup_theme', 'plused_theme_setup');

// 2. Enqueue Frontend Scripts & Styles
function plused_enqueue_scripts() {
    $theme_uri = get_template_directory_uri();
    $version   = '2.0.0';

    // Theme Styles
    wp_enqueue_style('plused-theme-style', $theme_uri . '/assets/css/theme.css', array(), $version);
    wp_enqueue_style('plused-style', get_stylesheet_uri(), array('plused-theme-style'), $version);

    // Vendor Scripts
    wp_enqueue_script('gsap', $theme_uri . '/assets/js/vendor/gsap.min.js', array(), '3.12.7', true);
    wp_enqueue_script('scroll-trigger', $theme_uri . '/assets/js/vendor/ScrollTrigger.min.js', array('gsap'), '3.12.7', true);
    wp_enqueue_script('lenis', $theme_uri . '/assets/js/vendor/lenis.min.js', array(), '1.1.20', true);
    wp_enqueue_script('canvas-confetti', $theme_uri . '/assets/js/vendor/confetti.browser.min.js', array(), '1.9.4', true);

    // Theme Main Script
    wp_enqueue_script('plused-theme-js', $theme_uri . '/assets/js/theme.js', array('gsap', 'scroll-trigger', 'lenis', 'canvas-confetti'), $version, true);

    // Localize Script for AJAX & centralized settings
    wp_localize_script('plused-theme-js', 'plused_settings', array(
        'ajax_url'     => admin_url('admin-ajax.php'),
        'ajax_nonce'   => wp_create_nonce('plused_ajax_nonce'),
        'whatsapp_raw' => plused_get_whatsapp_number(),
        'phone_raw'    => plused_get_option('phone_raw', '905304777737'),
        'theme_uri'    => $theme_uri,
        'home_url'     => home_url('/'),
    ));
}
add_action('wp_enqueue_scripts', 'plused_enqueue_scripts');

// 3. Enqueue Admin Scripts & Styles
function plused_admin_enqueue_scripts($hook) {
    $theme_uri = get_template_directory_uri();

    wp_enqueue_media();
    wp_enqueue_style('plused-admin-style', $theme_uri . '/assets/css/admin.css', array(), '2.0.0');
    wp_enqueue_script('plused-admin-js', $theme_uri . '/assets/js/admin.js', array('jquery'), '2.0.0', true);
}
add_action('admin_enqueue_scripts', 'plused_admin_enqueue_scripts');

// 4. Include Core Theme Modules
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/user-roles.php';
require_once get_template_directory() . '/inc/post-types.php';
require_once get_template_directory() . '/inc/meta-boxes.php';
require_once get_template_directory() . '/inc/admin-dashboard.php';
require_once get_template_directory() . '/inc/admin-settings.php';
require_once get_template_directory() . '/inc/default-data.php';
require_once get_template_directory() . '/inc/seo.php';

// 5. Enforce HTTPS 301 Redirect for Insecure Requests & Favicon
function plused_enforce_https() {
    $is_ssl = is_ssl() || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https');
    if (!$is_ssl && !is_admin() && isset($_SERVER['HTTP_HOST']) && isset($_SERVER['REQUEST_URI'])) {
        wp_safe_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301);
        exit;
    }
}
add_action('template_redirect', 'plused_enforce_https', 1);

function plused_favicon_fallback() {
    if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/favicon.ico') !== false) {
        wp_redirect(get_template_directory_uri() . '/favicon.ico', 301);
        exit;
    }
}
add_action('init', 'plused_favicon_fallback', 1);

// 6. Template routing for /kvkk-aydinlatma/
function plused_kvkk_template_router($template) {
    if (is_page('kvkk-aydinlatma') || (isset($_SERVER['REQUEST_URI']) && preg_match('#/kvkk-aydinlatma/?(\?.*)?$#', $_SERVER['REQUEST_URI']))) {
        $kvkk_template = locate_template('page-kvkk-aydinlatma.php');
        if (!empty($kvkk_template)) {
            status_header(200);
            return $kvkk_template;
        }
    }
    return $template;
}
add_filter('template_include', 'plused_kvkk_template_router', 99);



