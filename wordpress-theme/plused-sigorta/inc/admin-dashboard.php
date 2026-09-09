<?php
/**
 * Custom Welcome Dashboard for Plused Yöneticisi
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Remove standard clutter dashboard widgets for plused_manager
 */
function plused_clean_dashboard_widgets() {
    $user = wp_get_current_user();
    if (!$user || !in_array('plused_manager', (array)$user->roles) || in_array('administrator', (array)$user->roles)) {
        return;
    }

    // Remove WordPress welcome panel
    remove_action('welcome_panel', 'wp_welcome_panel');

    // Remove core dashboard widgets
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // At a Glance
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');    // Activity
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');   // Quick Draft
    remove_meta_box('dashboard_primary', 'dashboard', 'side');       // WordPress News & Events
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); // Site Health
}
add_action('wp_dashboard_setup', 'plused_clean_dashboard_widgets', 999);

/**
 * 2. Render Branded Custom Dashboard Welcome Screen
 */
function plused_render_custom_dashboard_widget() {
    $user = wp_get_current_user();
    $is_manager = in_array('plused_manager', (array)$user->roles);
    $is_admin = in_array('administrator', (array)$user->roles);

    if (!$is_manager && !$is_admin) {
        return;
    }

    $company_name = plused_get_option('company_name', 'Acente');

    // Add our custom dashboard widget at the very top
    wp_add_dashboard_widget(
        'plused_custom_welcome_widget',
        $company_name . ' Site Yönetimi',
        'plused_custom_dashboard_widget_content'
    );
}
add_action('wp_dashboard_setup', 'plused_render_custom_dashboard_widget', 1);

/**
 * Output Custom Dashboard Screen Content
 */
function plused_custom_dashboard_widget_content() {
    $options      = get_option('plused_sigorta_options', array());
    $company_name = plused_get_option('company_name', 'Acente');
    $phone        = plused_get_display_phone();
    $site_url     = home_url('/');
    ?>
    <div class="plused-dashboard-container">
        <div class="plused-dashboard-hero">
            <div class="plused-dashboard-badge">
                <span class="dashicons dashicons-shield-alt"></span>
                <span>Bağımsız & Premium Acente Yönetim Masası</span>
            </div>
            <h2 class="plused-dashboard-title"><?php echo esc_html($company_name); ?> Site Yönetimi</h2>
            <p class="plused-dashboard-desc">
                Web sitenizin içeriklerini, ürün detaylarını, iletişim hatlarını ve SSS arşivini tek bir merkezi ekrandan kolayca yönetin. Tasarım ve kurumsal kimlik güvenli biçimde kilitlenmiştir.
            </p>
        </div>

        <div class="plused-dashboard-grid">
            <!-- KART 1: ANA SAYFAYI DÜZENLE -->
            <a href="<?php echo esc_url(admin_url('admin.php?page=plused-homepage')); ?>" class="plused-dashboard-card">
                <div class="plused-card-icon" style="background: rgba(0, 102, 255, 0.15); color: #0066FF;">
                    <span class="dashicons dashicons-admin-home"></span>
                </div>
                <div class="plused-card-info">
                    <h3>Ana Sayfayı Düzenle</h3>
                    <p>Hero açılış başlığı, slogan, Kasko sahnesi ve vitrin duyuruları.</p>
                </div>
                <span class="plused-card-arrow">&rarr;</span>
            </a>

            <!-- KART 2: SİGORTA ÜRÜNLERİNİ DÜZENLE -->
            <a href="<?php echo esc_url(admin_url('edit.php?post_type=insurance_product')); ?>" class="plused-dashboard-card">
                <div class="plused-card-icon" style="background: rgba(16, 185, 129, 0.15); color: #10B981;">
                    <span class="dashicons dashicons-car"></span>
                </div>
                <div class="plused-card-info">
                    <h3>Sigorta Ürünlerini Düzenle</h3>
                    <p>Kasko, Trafik, Konut, DASK, Sağlık ve İşyeri sayfaları ve teminatları.</p>
                </div>
                <span class="plused-card-arrow">&rarr;</span>
            </a>

            <!-- KART 3: TELEFON VE WHATSAPP -->
            <a href="<?php echo esc_url(admin_url('admin.php?page=plused-sigorta')); ?>" class="plused-dashboard-card">
                <div class="plused-card-icon" style="background: rgba(37, 211, 102, 0.15); color: #25D366;">
                    <span class="dashicons dashicons-phone"></span>
                </div>
                <div class="plused-card-info">
                    <h3>Telefon ve WhatsApp</h3>
                    <p>Merkezi hat (<?php echo esc_html($phone); ?>) ve hızlı WhatsApp bağlantıları.</p>
                </div>
                <span class="plused-card-arrow">&rarr;</span>
            </a>

            <!-- KART 4: SSS -->
            <a href="<?php echo esc_url(admin_url('edit.php?post_type=insurance_faq')); ?>" class="plused-dashboard-card">
                <div class="plused-card-icon" style="background: rgba(139, 92, 246, 0.15); color: #8B5CF6;">
                    <span class="dashicons dashicons-format-chat"></span>
                </div>
                <div class="plused-card-info">
                    <h3>SSS (Sıkça Sorulan Sorular)</h3>
                    <p>Müşterilerinizin merak ettiği soruları ve kategorileri düzenleyin.</p>
                </div>
                <span class="plused-card-arrow">&rarr;</span>
            </a>

            <!-- KART 5: İLETİŞİM BİLGİLERİ -->
            <a href="<?php echo esc_url(admin_url('admin.php?page=plused-contact')); ?>" class="plused-dashboard-card">
                <div class="plused-card-icon" style="background: rgba(245, 158, 11, 0.15); color: #F59E0B;">
                    <span class="dashicons dashicons-location-alt"></span>
                </div>
                <div class="plused-card-info">
                    <h3>İletişim Bilgileri</h3>
                    <p>Ofis adresi, çalışma saatleri ve e-posta bildirim adresi.</p>
                </div>
                <span class="plused-card-arrow">&rarr;</span>
            </a>
        </div>

        <div class="plused-dashboard-footer">
            <a href="<?php echo esc_url($site_url); ?>" target="_blank" rel="noopener noreferrer" class="button button-primary button-hero plused-view-site-btn">
                <span class="dashicons dashicons-external" style="margin-top:4px;"></span>
                <span>Siteyi Görüntüle</span>
            </a>
        </div>
    </div>
    <?php
}
