<?php
/**
 * User Roles & Admin Permissions (Plused Yöneticisi & Tasarım Kilidi)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Register 'plused_manager' Role
 */
function plused_register_custom_roles() {
    if (!get_role('plused_manager')) {
        add_role(
            'plused_manager',
            'Plused Yöneticisi',
            array(
                'read'                   => true,
                'upload_files'           => true, // Medya yönetebilsin
                'edit_posts'             => true, // Sigorta Ürünleri & SSS yönetebilsin
                'edit_others_posts'      => true,
                'publish_posts'          => true,
                'read_private_posts'     => true,
                'delete_posts'           => true,
                'edit_pages'             => false, // Sayfa yapısını bozamasın
                'edit_others_pages'      => false,
                'publish_pages'          => false,
                'delete_pages'           => false,
                'manage_categories'      => true,
                'manage_plused_sigorta'  => true,  // Plused özel yetkisi
                // KESİNLİKLE YASAKLANANLAR:
                'install_plugins'        => false,
                'activate_plugins'       => false,
                'delete_plugins'         => false,
                'edit_plugins'           => false,
                'switch_themes'          => false,
                'edit_themes'            => false,
                'edit_theme_options'     => false,
                'customize'              => false,
                'manage_options'         => false, // WordPress kritik çekirdek ayarları
                'edit_users'             => false,
                'delete_users'           => false,
            )
        );
    } else {
        $role = get_role('plused_manager');
        if ($role) {
            $role->add_cap('read');
            $role->add_cap('upload_files');
            $role->add_cap('edit_posts');
            $role->add_cap('edit_others_posts');
            $role->add_cap('publish_posts');
            $role->add_cap('read_private_posts');
            $role->add_cap('delete_posts');
            $role->add_cap('manage_plused_sigorta');
            // Explicitly remove critical capabilities
            $role->remove_cap('install_plugins');
            $role->remove_cap('activate_plugins');
            $role->remove_cap('delete_plugins');
            $role->remove_cap('edit_plugins');
            $role->remove_cap('switch_themes');
            $role->remove_cap('edit_themes');
            $role->remove_cap('edit_theme_options');
            $role->remove_cap('customize');
            $role->remove_cap('manage_options');
            $role->remove_cap('edit_users');
            $role->remove_cap('delete_users');
        }
    }
}
add_action('init', 'plused_register_custom_roles');

/**
 * 2. Simplify Admin Menus for Plused Yöneticisi
 * Keeps Administrator untouched, but strips clutter for plused_manager.
 */
function plused_simplify_admin_menu() {
    $user = wp_get_current_user();
    if (!$user || !in_array('plused_manager', (array)$user->roles) || in_array('administrator', (array)$user->roles)) {
        return;
    }

    // Hide standard irrelevant menus
    remove_menu_page('edit.php');                   // Standart Yazılar
    remove_menu_page('edit.php?post_type=page');    // Standart Sayfalar (Şablonlar kilitlidir)
    remove_menu_page('edit-comments.php');          // Yorumlar
    remove_menu_page('themes.php');                 // Görünüm (Tema Değiştirme / Özelleştirici)
    remove_menu_page('plugins.php');                // Eklentiler
    remove_menu_page('users.php');                  // Kullanıcılar
    remove_menu_page('tools.php');                  // Araçlar
    remove_menu_page('options-general.php');        // Ayarlar

    // Hide submenus under dashboard if any
    remove_submenu_page('index.php', 'update-core.php');
}
add_action('admin_menu', 'plused_simplify_admin_menu', 999);

/**
 * 3. Simplify Admin Bar for Plused Yöneticisi
 */
function plused_simplify_admin_bar($wp_admin_bar) {
    $user = wp_get_current_user();
    if (!$user || !in_array('plused_manager', (array)$user->roles) || in_array('administrator', (array)$user->roles)) {
        return;
    }

    $wp_admin_bar->remove_node('wp-logo');       // WordPress Logosu
    $wp_admin_bar->remove_node('updates');       // Güncelleme Bildirimleri
    $wp_admin_bar->remove_node('comments');      // Yorumlar
    $wp_admin_bar->remove_node('new-content');   // "+ Yeni" açılır menüsü
    $wp_admin_bar->remove_node('customize');     // Özelleştir
}
add_action('admin_bar_menu', 'plused_simplify_admin_bar', 999);

/**
 * 4. Lock Theme & Code Editing (Tasarım Kilidi)
 */
function plused_enforce_design_lock() {
    if (!defined('DISALLOW_FILE_EDIT')) {
        define('DISALLOW_FILE_EDIT', true);
    }
}
add_action('init', 'plused_enforce_design_lock');

/**
 * 5. Block Direct Access to Forbidden Pages for plused_manager
 */
function plused_restrict_admin_pages() {
    global $pagenow;
    $user = wp_get_current_user();

    if ($user && in_array('plused_manager', (array)$user->roles) && !in_array('administrator', (array)$user->roles)) {
        $forbidden_pages = array(
            'plugins.php',
            'plugin-install.php',
            'plugin-editor.php',
            'themes.php',
            'theme-install.php',
            'theme-editor.php',
            'customize.php',
            'options-general.php',
            'options-writing.php',
            'options-reading.php',
            'options-discussion.php',
            'options-media.php',
            'options-permalink.php',
            'options-privacy.php',
            'tools.php',
            'import.php',
            'export.php',
            'users.php',
            'user-new.php',
        );

        if (in_array($pagenow, $forbidden_pages)) {
            wp_die(
                esc_html__('Bu sayfaya erişim yetkiniz bulunmamaktadır. Lütfen sol menüdeki Plused Sigorta yönetim seçeneklerini kullanınız.', 'plused'),
                esc_html__('Yetkisiz Erişim', 'plused'),
                array('response' => 403, 'back_link' => true)
            );
        }
    }
}
add_action('admin_init', 'plused_restrict_admin_pages');
