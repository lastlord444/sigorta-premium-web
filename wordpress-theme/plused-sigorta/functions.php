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
    $theme_uri  = get_template_directory_uri();
    $theme_path = get_template_directory();
    $theme_version = '1.1.2';
    $theme_css_version = $theme_version . '.' . (file_exists($theme_css_file) ? (string) filemtime($theme_css_file) : time());
    $style_css_version = $theme_version . '.' . (file_exists($style_css_file) ? (string) filemtime($style_css_file) : time());
    $theme_js_version  = $theme_version . '.' . (file_exists($theme_js_file) ? (string) filemtime($theme_js_file) : time());

    // Theme Styles
    wp_enqueue_style('plused-theme-style', $theme_uri . '/assets/css/theme.css', array(), $theme_css_version);
    wp_enqueue_style('plused-style', get_stylesheet_uri(), array('plused-theme-style'), $style_css_version);

    // Vendor Scripts
    wp_enqueue_script('gsap', $theme_uri . '/assets/js/vendor/gsap.min.js', array(), '3.12.7', true);
    wp_enqueue_script('scroll-trigger', $theme_uri . '/assets/js/vendor/ScrollTrigger.min.js', array('gsap'), '3.12.7', true);
    wp_enqueue_script('lenis', $theme_uri . '/assets/js/vendor/lenis.min.js', array(), '1.1.20', true);
    wp_enqueue_script('canvas-confetti', $theme_uri . '/assets/js/vendor/confetti.browser.min.js', array(), '1.9.4', true);

    // Theme Main Script
    wp_enqueue_script('plused-theme-js', $theme_uri . '/assets/js/theme.js', array('gsap', 'scroll-trigger', 'lenis', 'canvas-confetti'), $theme_js_version, true);

    // Localize Script for AJAX & centralized settings
    wp_localize_script('plused-theme-js', 'plused_settings', array(
        'ajax_url'     => admin_url('admin-ajax.php'),
        'ajax_nonce'   => wp_create_nonce('plused_ajax_nonce'),
        'whatsapp_raw' => plused_get_whatsapp_number(),
        'phone_raw'    => plused_get_option('phone_raw', '905304777737'),
        'company_name' => plused_get_option('company_name', 'PLUSED SİGORTA'),
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
require_once get_template_directory() . '/inc/cli-provisioning.php';

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
    if (is_page('kvkk-aydinlatma') || (isset($_SERVER['REQUEST_URI']) && preg_match('#/kvkk-aydinlatma/?(\\?.*)?$#', $_SERVER['REQUEST_URI']))) {
        $kvkk_template = locate_template('page-kvkk-aydinlatma.php');
        if (!empty($kvkk_template)) {
            status_header(200);
            return $kvkk_template;
        }
    }
    return $template;
}
add_filter('template_include', 'plused_kvkk_template_router', 99);

// 7. Temporary maintenance mode.
// Keep wp-admin, AJAX, CLI and logged-in administrators available.
function plused_temporary_maintenance_mode() {
    if (
        is_admin() ||
        wp_doing_ajax() ||
        (defined('WP_CLI') && WP_CLI) ||
        current_user_can('manage_options')
    ) {
        return;
    }

    status_header(503);
    nocache_headers();
    header('Retry-After: 3600');
    header('Content-Type: text/html; charset=' . get_option('blog_charset'));

    echo '<!doctype html>';
    echo '<html lang="tr">';
    echo '<head>';
    echo '<meta charset="' . esc_attr(get_option('blog_charset')) . '">';
    echo '<meta name="viewport" content="width=device-width,initial-scale=1">';
    echo '<meta name="robots" content="noindex,nofollow">';
    echo '<title>Bakım Çalışması | Plused Sigorta</title>';
    echo '<style>';
    echo 'html,body{margin:0;min-height:100%;background:#07111f;color:#fff;font-family:Arial,Helvetica,sans-serif}';
    echo 'body{min-height:100vh;display:grid;place-items:center;padding:24px;box-sizing:border-box}';
    echo '.maintenance{width:min(680px,100%);text-align:center;padding:56px 32px;border:1px solid rgba(255,255,255,.12);border-radius:24px;background:rgba(255,255,255,.035);box-shadow:0 24px 80px rgba(0,0,0,.28)}';
    echo '.brand{font-size:13px;font-weight:800;letter-spacing:.22em;color:#8fc7ff;margin-bottom:28px}';
    echo 'h1{margin:0 0 18px;font-size:clamp(32px,7vw,56px);line-height:1.05;letter-spacing:-.03em}';
    echo 'p{margin:0 auto;max-width:520px;color:#b8c4d3;font-size:18px;line-height:1.7}';
    echo '.line{width:64px;height:3px;border-radius:99px;background:#8fc7ff;margin:30px auto 0}';
    echo '</style>';
    echo '</head>';
    echo '<body>';
    echo '<main class="maintenance">';
    echo '<div class="brand">PLUSED SİGORTA</div>';
    echo '<h1>Geçici olarak bakımdayız.</h1>';
    echo '<p>Web sitemiz geçici olarak bakım çalışması nedeniyle hizmet verememektedir. Kısa süre içinde tekrar yayında olacağız.</p>';
    echo '<div class="line" aria-hidden="true"></div>';
    echo '</main>';
    echo '</body>';
    echo '</html>';
    exit;
}
add_action('template_redirect', 'plused_temporary_maintenance_mode', 2);

