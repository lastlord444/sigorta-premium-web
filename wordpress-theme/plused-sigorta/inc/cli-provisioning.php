<?php
/**
 * WP-CLI Automated Tenant Provisioning Command
 *
 * Provides CLI commands for rapid, enterprise-grade provisioning of new insurance agency tenants.
 * Usage:
 *   wp sigorta-tenant create --slug=ahmet --domain=ahmetsigorta.com --title="Ahmet Sigorta" --admin-email=ahmet@ahmetsigorta.com
 *   wp sigorta-tenant list
 *   wp sigorta-tenant seed <blog_id>
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('WP_CLI') || !WP_CLI) {
    return;
}

/**
 * Manage Multi-Tenant Insurance Agency Sites
 */
class Plused_Tenant_CLI_Command {

    /**
     * Create and provision a new white-label insurance agency tenant site.
     *
     * ## OPTIONS
     *
     * --slug=<slug>
     * : Subdomain slug for the new tenant (e.g. 'ahmet' for ahmet.maindomain.com).
     *
     * [--domain=<domain>]
     * : Custom mapped domain (e.g. 'ahmetsigorta.com' or 'xyzsigorta.com.tr').
     *
     * --title=<title>
     * : Insurance Agency Display / Brand Name (e.g. 'Ahmet Sigorta').
     *
     * --admin-email=<email>
     * : Email address for the agency administrator.
     *
     * [--admin-user=<user>]
     * : Username for the agency administrator (defaults to slug).
     *
     * [--admin-pass=<pass>]
     * : Password for the agency administrator (auto-generated if omitted).
     *
     * [--primary-color=<hex>]
     * : Kurumsal ana marka rengi (default: '#0066FF').
     *
     * [--secondary-color=<hex>]
     * : Kurumsal ikincil renk (default: '#00D2FF').
     *
     * [--accent-color=<hex>]
     * : Kurumsal vurgu rengi (default: '#6C5CE7').
     *
     * [--phone=<phone>]
     * : Formatted display phone number (e.g. '0216 123 45 67').
     *
     * [--whatsapp=<whatsapp>]
     * : Central WhatsApp number with country code (e.g. '905551234567').
     *
     * [--legal-title=<legal_title>]
     * : Official legal company title (e.g. 'Ahmet Sigorta Aracılık Hizmetleri Ltd. Şti.').
     *
     * [--plate-no=<plate_no>]
     * : TOBB / SEDDK Levha kayıt numarası.
     *
     * [--tax-office=<tax_office>]
     * : Vergi dairesi.
     *
     * [--tax-no=<tax_no>]
     * : Vergi numarası.
     *
     * [--address=<address>]
     * : Physical office address.
     *
     * ## EXAMPLES
     *
     *   wp sigorta-tenant create --slug=ahmet --domain=ahmetsigorta.com --title="Ahmet Sigorta" --admin-email=ahmet@ahmetsigorta.com --phone="0216 123 45 67" --whatsapp="905551234567"
     */
    public function create($args, $assoc_args) {
        if (!is_multisite()) {
            WP_CLI::error('WordPress Multisite aktif değil! Bu komut yalnızca Multisite ağında çalıştırılabilir.');
            return;
        }

        $slug        = sanitize_title($assoc_args['slug']);
        $domain      = !empty($assoc_args['domain']) ? sanitize_text_field(strtolower($assoc_args['domain'])) : '';
        $title       = sanitize_text_field($assoc_args['title']);
        $admin_email = sanitize_email($assoc_args['admin-email']);
        $admin_user  = !empty($assoc_args['admin-user']) ? sanitize_user($assoc_args['admin-user']) : $slug;
        $admin_pass  = !empty($assoc_args['admin-pass']) ? $assoc_args['admin-pass'] : wp_generate_password(16, true, true);

        if (empty($slug) || empty($title) || empty($admin_email)) {
            WP_CLI::error('--slug, --title ve --admin-email parametreleri zorunludur.');
            return;
        }

        // Determine current network domain
        $current_network = get_network();
        $network_domain  = $current_network->domain;

        // Determine site domain and path
        if (is_subdomain_install()) {
            $new_site_domain = $slug . '.' . $network_domain;
            $new_site_path   = '/';
        } else {
            $new_site_domain = $network_domain;
            $new_site_path   = '/' . $slug . '/';
        }

        // Check if user exists or create
        $user = get_user_by('email', $admin_email);
        if (!$user) {
            $user = get_user_by('login', $admin_user);
        }

        if (!$user) {
            WP_CLI::log("Yeni acente yöneticisi kullanıcısı oluşturuluyor: {$admin_user} ({$admin_email})...");
            $user_id = wp_create_user($admin_user, $admin_pass, $admin_email);
            if (is_wp_error($user_id)) {
                WP_CLI::error('Kullanıcı oluşturulamadı: ' . $user_id->get_error_message());
                return;
            }
        } else {
            $user_id = $user->ID;
            WP_CLI::log("Mevcut kullanıcı kullanılıyor: {$user->user_login} (ID: {$user_id})");
        }

        // Create multisite blog
        WP_CLI::log("Yeni site oluşturuluyor: {$new_site_domain}{$new_site_path}...");
        $blog_id = wpmu_create_blog($new_site_domain, $new_site_path, $title, $user_id, array('public' => 1), $current_network->id);

        if (is_wp_error($blog_id)) {
            WP_CLI::error('Site oluşturulamadı: ' . $blog_id->get_error_message());
            return;
        }

        WP_CLI::success("Site başarıyla oluşturuldu! Blog ID: {$blog_id}");

        // Map custom domain if provided
        if (!empty($domain)) {
            WP_CLI::log("Özel domain bağlanıyor: {$domain}...");
            update_blog_details($blog_id, array(
                'domain' => $domain,
                'path'   => '/',
            ));
            WP_CLI::success("Domain başarıyla bağlandı: https://{$domain}/");
        }

        // Switch to the newly created blog to configure theme & options
        switch_to_blog($blog_id);

        // 1. Activate Plused Sigorta Theme
        switch_theme('plused-sigorta');

        // 2. Assign Agency Manager Role to user
        $user_obj = new WP_User($user_id);
        $user_obj->set_role('plused_manager');

        // 3. Seed Default Content (Pages, Menus, Products, FAQs)
        WP_CLI::log("Varsayılan sayfalar, menüler ve sigorta ürünleri oluşturuluyor...");
        if (function_exists('plused_seed_default_multisite_data')) {
            plused_seed_default_multisite_data($blog_id);
        }

        // 4. Configure Tenant White-Label Options
        $phone_display = !empty($assoc_args['phone']) ? sanitize_text_field($assoc_args['phone']) : '0530 477 77 37';
        $phone_raw     = preg_replace('/[^0-9]/', '', $phone_display);
        $whatsapp      = !empty($assoc_args['whatsapp']) ? sanitize_text_field($assoc_args['whatsapp']) : ($phone_raw ?: '905304777737');

        $tenant_options = array(
            'company_name'             => $title,
            'tagline'                  => 'Bağımsız & Güvenilir Sigorta Danışmanlığı',
            'phone_display'            => $phone_display,
            'phone_raw'                => $phone_raw,
            'whatsapp_number'          => $whatsapp,
            'email'                    => $admin_email,
            'address'                  => !empty($assoc_args['address']) ? sanitize_textarea_field($assoc_args['address']) : '',
            'working_hours'            => 'Hafta İçi: 09:00 - 18:00',
            'brand_primary_color'      => !empty($assoc_args['primary-color']) ? sanitize_hex_color($assoc_args['primary-color']) : '#0066FF',
            'brand_secondary_color'    => !empty($assoc_args['secondary-color']) ? sanitize_hex_color($assoc_args['secondary-color']) : '#00D2FF',
            'brand_accent_color'       => !empty($assoc_args['accent-color']) ? sanitize_hex_color($assoc_args['accent-color']) : '#6C5CE7',
            'corporate_legal_title'    => !empty($assoc_args['legal-title']) ? sanitize_text_field($assoc_args['legal-title']) : $title,
            'corporate_agency_name'    => $title . ' Acenteliği',
            'corporate_plate_number'   => !empty($assoc_args['plate-no']) ? sanitize_text_field($assoc_args['plate-no']) : '',
            'corporate_tax_office'     => !empty($assoc_args['tax-office']) ? sanitize_text_field($assoc_args['tax-office']) : '',
            'corporate_tax_number'     => !empty($assoc_args['tax-no']) ? sanitize_text_field($assoc_args['tax-no']) : '',
            'proposal_notify_email'    => $admin_email,
            'proposal_whatsapp_msg'    => "Merhaba {$title}, sigorta poliçesi teklifi almak istiyorum.",
            'feature_cinematic_video'  => '1',
            'feature_claim_center'     => '1',
            'feature_advanced_seo'     => '1',
            'feature_analytics'        => '1',
            'feature_edevlet_btn'      => '1',
            'feature_partners_marquee' => '1',
            'announcement_active'      => '0',
            'announcement_text'        => '',
            'hero_eyebrow'             => 'Bağımsız Sigorta Acentesi',
            'hero_title'               => 'Hayat sürprizlerle dolu. Güvencen hazır olsun.',
            'hero_desc'                => 'Aracınızdan evinize, sağlığınızdan iş yerinize kadar değer verdiğiniz her şeyi doğru teminatlarla koruyun.',
            'hero_cta_primary'         => 'Teklif Al',
            'hero_cta_secondary'       => 'Sigortaları İncele',
        );

        update_option('plused_sigorta_options', $tenant_options);
        update_option('blogname', $title);
        update_option('blogdescription', $tenant_options['tagline']);

        restore_current_blog();

        // Print final recap table
        WP_CLI::success("=== ACENTE BAŞARIYLA OLUŞTURULDU VE HAZIRLANDI ===");
        WP_CLI::log("Site ID       : {$blog_id}");
        WP_CLI::log("Marka Adı     : {$title}");
        WP_CLI::log("Site Adresi   : " . (!empty($domain) ? "https://{$domain}/" : "https://{$new_site_domain}{$new_site_path}"));
        WP_CLI::log("Yönetici Paneli: " . (!empty($domain) ? "https://{$domain}/wp-admin/" : "https://{$new_site_domain}{$new_site_path}wp-admin/"));
        WP_CLI::log("Kullanıcı Adı : {$admin_user}");
        WP_CLI::log("Şifre         : {$admin_pass}");
        WP_CLI::log("E-posta       : {$admin_email}");
    }

    /**
     * List all insurance tenant sites on the network.
     *
     * ## EXAMPLES
     *
     *   wp sigorta-tenant list
     */
    public function list($args, $assoc_args) {
        if (!is_multisite()) {
            WP_CLI::error('WordPress Multisite aktif değil!');
            return;
        }

        $sites = get_sites(array('number' => 100));
        $rows  = array();

        foreach ($sites as $site) {
            switch_to_blog($site->blog_id);
            $options      = get_option('plused_sigorta_options', array());
            $company_name = !empty($options['company_name']) ? $options['company_name'] : get_bloginfo('name');
            $theme        = wp_get_theme()->get('Name');
            restore_current_blog();

            $rows[] = array(
                'ID'           => $site->blog_id,
                'Domain'       => $site->domain,
                'Path'         => $site->path,
                'Acente Adı'   => $company_name,
                'Aktif Tema'   => $theme,
                'Kayıt Tarihi' => $site->registered,
            );
        }

        WP_CLI\Utils\format_items('table', $rows, array('ID', 'Domain', 'Path', 'Acente Adı', 'Aktif Tema', 'Kayıt Tarihi'));
    }

    /**
     * Run or re-run default content seeding on a specific tenant site.
     *
     * ## OPTIONS
     *
     * <blog_id>
     * : The ID of the blog to seed.
     *
     * ## EXAMPLES
     *
     *   wp sigorta-tenant seed 2
     */
    public function seed($args, $assoc_args) {
        if (!is_multisite()) {
            WP_CLI::error('WordPress Multisite aktif değil!');
            return;
        }

        $blog_id = intval($args[0]);
        if (!$blog_id || !get_blog_details($blog_id)) {
            WP_CLI::error("Geçersiz Blog ID: {$blog_id}");
            return;
        }

        WP_CLI::log("Blog ID {$blog_id} için varsayılan içerikler yükleniyor...");
        if (function_exists('plused_seed_default_multisite_data')) {
            plused_seed_default_multisite_data($blog_id);
            WP_CLI::success("Varsayılan içerikler başarıyla yüklendi!");
        } else {
            WP_CLI::error('plused_seed_default_multisite_data fonksiyonu bulunamadı.');
        }
    }
}

WP_CLI::add_command('sigorta-tenant', 'Plused_Tenant_CLI_Command');
