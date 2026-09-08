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
require_once get_template_directory() . '/inc/seo.php';
require_once get_template_directory() . '/inc/default-data.php';
// require_once get_template_directory() . '/inc/proposal-handler.php'; // Gelecekteki sigorta API mimarisi için kod taslağı olarak korunmaktadır (şu anda doğrudan WhatsApp akışı aktiftir).
