<?php
/**
 * Plused Sigorta Admin Settings & Simplified Submenus
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Register Top Level Menu & Submenus
 */
function plused_add_admin_menu() {
    $capability   = 'manage_plused_sigorta';
    $company_name = plused_get_option('company_name', 'Acente');

    // Main Menu: [Acente Adı] Ayarları
    add_menu_page(
        $company_name . ' Yönetimi',
        'Acente Ayarları',
        $capability,
        'plused-sigorta',
        'plused_render_general_settings_page',
        'dashicons-shield-alt',
        3
    );

    // Submenu 1: Genel & İletişim
    add_submenu_page(
        'plused-sigorta',
        'Genel & İletişim',
        'Genel & İletişim',
        $capability,
        'plused-sigorta',
        'plused_render_general_settings_page',
        1
    );

    // Submenu 2: Kurumsal & Hukuki
    add_submenu_page(
        'plused-sigorta',
        'Kurumsal & Hukuki',
        'Kurumsal & Hukuki',
        $capability,
        'plused-corporate',
        'plused_render_corporate_settings_page',
        2
    );

    // Submenu 3: Logo & Renkler
    add_submenu_page(
        'plused-sigorta',
        'Logo & Renk Paleti',
        'Logo & Renkler',
        $capability,
        'plused-branding',
        'plused_render_branding_settings_page',
        3
    );

    // Submenu 4: Ana Sayfa
    add_submenu_page(
        'plused-sigorta',
        'Ana Sayfa İçerikleri',
        'Ana Sayfa',
        $capability,
        'plused-homepage',
        'plused_render_homepage_settings_page',
        4
    );

    // Submenu 5: Sigorta Ürünleri (Post Type edit link)
    add_submenu_page(
        'plused-sigorta',
        'Sigorta Ürünleri',
        'Sigorta Ürünleri',
        'edit_posts',
        'edit.php?post_type=insurance_product',
        '',
        5
    );

    // Submenu 6: SSS (FAQ edit link)
    add_submenu_page(
        'plused-sigorta',
        'Sıkça Sorulan Sorular',
        'SSS',
        'edit_posts',
        'edit.php?post_type=insurance_faq',
        '',
        6
    );

    // Submenu 7: SEO & Pazarlama Kodları
    add_submenu_page(
        'plused-sigorta',
        'SEO & Pazarlama Kodları',
        'SEO & Pazarlama',
        $capability,
        'plused-marketing',
        'plused_render_marketing_settings_page',
        7
    );

    // Submenu 8: Paket Özellikleri
    add_submenu_page(
        'plused-sigorta',
        'Paket Özellikleri & Modüller',
        'Paket Özellikleri',
        $capability,
        'plused-features',
        'plused_render_features_settings_page',
        8
    );

    // Submenu 9: Teklif Ayarları
    add_submenu_page(
        'plused-sigorta',
        'Teklif Ayarları',
        'Teklif Ayarları',
        $capability,
        'plused-proposals',
        'plused_render_proposals_settings_page',
        9
    );
}
add_action('admin_menu', 'plused_add_admin_menu');

/**
 * 2. Register Settings with Settings API
 */
function plused_register_settings() {
    register_setting('plused_settings_group', 'plused_sigorta_options', 'plused_sanitize_options');
}
add_action('admin_init', 'plused_register_settings');

/**
 * 3. Sanitize all option inputs (Tasarım Kilidi: Only Content/Media/Toggles)
 */
function plused_sanitize_options($input) {
    $existing = get_option('plused_sigorta_options', array());
    $clean = is_array($existing) ? $existing : array();

    $section = isset($input['settings_section']) ? sanitize_key($input['settings_section']) : '';

    // 1. General & Contact
    if (isset($input['company_name']))    $clean['company_name']    = sanitize_text_field($input['company_name']);
    if (isset($input['tagline']))         $clean['tagline']         = sanitize_text_field($input['tagline']);
    if (isset($input['phone_display']))   $clean['phone_display']   = sanitize_text_field($input['phone_display']);
    if (isset($input['phone_raw']))       $clean['phone_raw']       = sanitize_text_field($input['phone_raw']);
    if (isset($input['whatsapp_number'])) $clean['whatsapp_number'] = sanitize_text_field($input['whatsapp_number']);
    if (isset($input['email']))           $clean['email']           = sanitize_email($input['email']);
    if (isset($input['address']))         $clean['address']         = sanitize_textarea_field($input['address']);
    if (isset($input['working_hours']))   $clean['working_hours']   = sanitize_text_field($input['working_hours']);
    if (isset($input['google_maps_embed_url'])) $clean['google_maps_embed_url'] = esc_url_raw($input['google_maps_embed_url']);

    // 2. Corporate & Legal Information
    if (isset($input['corporate_legal_title']))   $clean['corporate_legal_title']   = sanitize_text_field($input['corporate_legal_title']);
    if (isset($input['corporate_agency_name']))   $clean['corporate_agency_name']   = sanitize_text_field($input['corporate_agency_name']);
    if (isset($input['corporate_plate_number']))  $clean['corporate_plate_number']  = sanitize_text_field($input['corporate_plate_number']);
    if (isset($input['corporate_tax_office']))    $clean['corporate_tax_office']    = sanitize_text_field($input['corporate_tax_office']);
    if (isset($input['corporate_tax_number']))    $clean['corporate_tax_number']    = sanitize_text_field($input['corporate_tax_number']);
    if (isset($input['corporate_mersis_number'])) $clean['corporate_mersis_number'] = sanitize_text_field($input['corporate_mersis_number']);
    if (isset($input['kvkk_controller_title']))   $clean['kvkk_controller_title']   = sanitize_text_field($input['kvkk_controller_title']);
    if (isset($input['corporate_address']))       $clean['corporate_address']       = sanitize_textarea_field($input['corporate_address']);
    if (isset($input['corporate_email']))         $clean['corporate_email']         = sanitize_email($input['corporate_email']);
    if (isset($input['corporate_phone']))         $clean['corporate_phone']         = sanitize_text_field($input['corporate_phone']);

    // 3. Branding & Logo & Colors
    if (isset($input['logo_url']))             $clean['logo_url']             = esc_url_raw($input['logo_url']);
    if (isset($input['logo_footer_url']))      $clean['logo_footer_url']      = esc_url_raw($input['logo_footer_url']);
    if (isset($input['favicon_url']))          $clean['favicon_url']          = esc_url_raw($input['favicon_url']);
    if (isset($input['brand_primary_color']))   $clean['brand_primary_color']   = sanitize_hex_color($input['brand_primary_color']);
    if (isset($input['brand_secondary_color'])) $clean['brand_secondary_color'] = sanitize_hex_color($input['brand_secondary_color']);
    if (isset($input['brand_accent_color']))    $clean['brand_accent_color']    = sanitize_hex_color($input['brand_accent_color']);

    // 4. Socials
    if (isset($input['instagram'])) $clean['instagram'] = esc_url_raw($input['instagram']);
    if (isset($input['facebook']))  $clean['facebook']  = esc_url_raw($input['facebook']);
    if (isset($input['linkedin']))  $clean['linkedin']  = esc_url_raw($input['linkedin']);
    if (isset($input['x_twitter'])) $clean['x_twitter'] = esc_url_raw($input['x_twitter']);

    // 5. Announcement & Hero Section
    if (isset($input['announcement_text']))   $clean['announcement_text']   = sanitize_text_field($input['announcement_text']);
    if ($section === 'homepage' || isset($input['announcement_submitted'])) {
        $clean['announcement_active'] = !empty($input['announcement_active']) ? '1' : '0';
    }
    if (isset($input['hero_eyebrow']))     $clean['hero_eyebrow']     = sanitize_text_field($input['hero_eyebrow']);
    if (isset($input['hero_title']))       $clean['hero_title']       = wp_kses_post($input['hero_title']);
    if (isset($input['hero_desc']))        $clean['hero_desc']        = sanitize_textarea_field($input['hero_desc']);
    if (isset($input['hero_cta_primary'])) $clean['hero_cta_primary'] = sanitize_text_field($input['hero_cta_primary']);
    if (isset($input['hero_cta_secondary'])) $clean['hero_cta_secondary'] = sanitize_text_field($input['hero_cta_secondary']);

    // 6. Cinematic Scenes
    if (isset($input['hero_kasko_title'])) $clean['hero_kasko_title'] = sanitize_text_field($input['hero_kasko_title']);
    if (isset($input['hero_kasko_desc']))  $clean['hero_kasko_desc']  = sanitize_textarea_field($input['hero_kasko_desc']);
    if (isset($input['home_konut_title'])) $clean['home_konut_title'] = sanitize_text_field($input['home_konut_title']);
    if (isset($input['home_konut_desc']))  $clean['home_konut_desc']  = sanitize_textarea_field($input['home_konut_desc']);

    // 7. Proposals
    if (isset($input['proposal_notify_email'])) $clean['proposal_notify_email'] = sanitize_email($input['proposal_notify_email']);
    if (isset($input['proposal_whatsapp_msg']))  $clean['proposal_whatsapp_msg']  = sanitize_textarea_field($input['proposal_whatsapp_msg']);

    // 8. SEO & Marketing Pixels
    if (isset($input['seo_site_title']))       $clean['seo_site_title']       = sanitize_text_field($input['seo_site_title']);
    if (isset($input['seo_meta_description'])) $clean['seo_meta_description'] = sanitize_textarea_field($input['seo_meta_description']);
    if (isset($input['seo_og_image']))         $clean['seo_og_image']         = esc_url_raw($input['seo_og_image']);
    if (isset($input['ga4_measurement_id']))   $clean['ga4_measurement_id']   = sanitize_text_field($input['ga4_measurement_id']);
    if (isset($input['meta_pixel_id']))        $clean['meta_pixel_id']        = sanitize_text_field($input['meta_pixel_id']);
    if (isset($input['google_ads_id']))        $clean['google_ads_id']        = sanitize_text_field($input['google_ads_id']);
    if (isset($input['gsc_verification_code'])) $clean['gsc_verification_code'] = sanitize_text_field($input['gsc_verification_code']);

    // 9. Feature Flags (only processed when on the features screen to prevent accidental zeroing)
    if ($section === 'features' || isset($input['features_submitted'])) {
        $clean['feature_cinematic_video']  = !empty($input['feature_cinematic_video']) ? '1' : '0';
        $clean['feature_claim_center']     = !empty($input['feature_claim_center']) ? '1' : '0';
        $clean['feature_advanced_seo']     = !empty($input['feature_advanced_seo']) ? '1' : '0';
        $clean['feature_analytics']        = !empty($input['feature_analytics']) ? '1' : '0';
        $clean['feature_edevlet_btn']      = !empty($input['feature_edevlet_btn']) ? '1' : '0';
        $clean['feature_partners_marquee'] = !empty($input['feature_partners_marquee']) ? '1' : '0';
    }

    return $clean;
}

/**
 * Common Admin Header Helper
 */
function plused_admin_header($title, $desc) {
    ?>
    <div class="plused-admin-header">
        <div>
            <h1>
                <span class="dashicons dashicons-shield-alt" style="font-size:26px; width:26px; height:26px;"></span>
                <?php echo esc_html($title); ?>
            </h1>
            <p><?php echo esc_html($desc); ?></p>
        </div>
    </div>
    <?php settings_errors(); ?>
    <?php
}

/**
 * 1. Genel & İletişim Ayarları Sayfası
 */
function plused_render_general_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    $company_name = plused_get_option('company_name', 'Acente');
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header($company_name . ' - GENEL & İLETİŞİM AYARLARI', 'Kurumsal marka adı, telefon hatları, çalışma saatleri ve sosyal medya hesapları.'); ?>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>
            <input type="hidden" name="plused_sigorta_options[settings_section]" value="general" />

            <div class="plused-admin-card">
                <h2>Marka & İletişim Hatları</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="company_name">Firma / Marka Adı</label></th>
                        <td>
                            <input type="text" id="company_name" name="plused_sigorta_options[company_name]" value="<?php echo esc_attr($options['company_name'] ?? 'PLUSED SİGORTA'); ?>" />
                            <p class="plused-helper-text">Sitedeki tüm başlıklarda, yasal metinlerde ve bildirimlerde görünecek marka adı.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="tagline">Slogan / Tagline</label></th>
                        <td>
                            <input type="text" id="tagline" name="plused_sigorta_options[tagline]" value="<?php echo esc_attr($options['tagline'] ?? 'Bağımsız & Premium Sigorta Danışmanlığı'); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="phone_display">Telefon (Görünür Metin)</label></th>
                        <td>
                            <input type="text" id="phone_display" name="plused_sigorta_options[phone_display]" value="<?php echo esc_attr($options['phone_display'] ?? '0530 477 77 37'); ?>" />
                            <p class="plused-helper-text">Kullanıcıların ekranda gördüğü formatlı telefon numarası.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="phone_raw">Telefon (Link / Raw)</label></th>
                        <td>
                            <input type="text" id="phone_raw" name="plused_sigorta_options[phone_raw]" value="<?php echo esc_attr($options['phone_raw'] ?? '905304777737'); ?>" />
                            <p class="plused-helper-text">Doğrudan arama linkleri için boşluksuz telefon no (örn: 905304777737).</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="whatsapp_number">Merkezi WhatsApp Numarası</label></th>
                        <td>
                            <input type="text" id="whatsapp_number" name="plused_sigorta_options[whatsapp_number]" value="<?php echo esc_attr($options['whatsapp_number'] ?? '905304777737'); ?>" />
                            <p class="plused-helper-text">Sitedeki tüm WhatsApp butonlarının bağlandığı tek merkezi hat (ülke kodu dahil, örn: 905304777737).</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="email">Genel E-posta</label></th>
                        <td>
                            <input type="email" id="email" name="plused_sigorta_options[email]" value="<?php echo esc_attr($options['email'] ?? ''); ?>" placeholder="iletisim@..." />
                            <p class="plused-helper-text">Müşteri iletişim ve genel bilgilendirme e-postası.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="working_hours">Çalışma Saatleri</label></th>
                        <td>
                            <input type="text" id="working_hours" name="plused_sigorta_options[working_hours]" value="<?php echo esc_attr($options['working_hours'] ?? ''); ?>" placeholder="Örn: Hafta İçi: 09:00 - 18:00 (Boş ise gizlenir)" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="address">Ofis / Hizmet Adresi</label></th>
                        <td>
                            <textarea id="address" name="plused_sigorta_options[address]" rows="3" placeholder="Ofis adresi (Boş ise gizlenir)"><?php echo esc_textarea($options['address'] ?? ''); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="google_maps_embed_url">Google Haritalar Paylaşım URL'si</label></th>
                        <td>
                            <input type="text" id="google_maps_embed_url" name="plused_sigorta_options[google_maps_embed_url]" value="<?php echo esc_attr($options['google_maps_embed_url'] ?? ''); ?>" placeholder="https://maps.google.com/..." />
                            <p class="plused-helper-text">İletişim sayfasında yer alacak Google Harita bağlantısı.</p>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="plused-admin-card">
                <h2>Sosyal Medya Bağlantıları</h2>
                <p class="plused-helper-text" style="margin-bottom:15px;">Boş bırakılan sosyal ağ butonları sitede otomatik olarak gizlenir.</p>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="instagram">Instagram</label></th>
                        <td>
                            <input type="text" id="instagram" name="plused_sigorta_options[instagram]" value="<?php echo esc_attr($options['instagram'] ?? ''); ?>" placeholder="https://instagram.com/..." />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="facebook">Facebook</label></th>
                        <td>
                            <input type="text" id="facebook" name="plused_sigorta_options[facebook]" value="<?php echo esc_attr($options['facebook'] ?? ''); ?>" placeholder="https://facebook.com/..." />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="linkedin">LinkedIn</label></th>
                        <td>
                            <input type="text" id="linkedin" name="plused_sigorta_options[linkedin]" value="<?php echo esc_attr($options['linkedin'] ?? ''); ?>" placeholder="https://linkedin.com/..." />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="x_twitter">X (Twitter)</label></th>
                        <td>
                            <input type="text" id="x_twitter" name="plused_sigorta_options[x_twitter]" value="<?php echo esc_attr($options['x_twitter'] ?? ''); ?>" placeholder="https://x.com/..." />
                        </td>
                    </tr>
                </table>
            </div>

            <?php submit_button('Genel Ayarları Kaydet', 'primary large'); ?>
        </form>
    </div>
    <?php
}

/**
 * 2. Kurumsal & Hukuki Bilgiler Sayfası
 */
function plused_render_corporate_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header('KURUMSAL & HUKUKİ BİLGİLER', 'Acentenizin resmi levha no, vergi dairesi ve KVKK veri sorumlusu sicil bilgileri.'); ?>

        <div class="notice notice-info inline" style="margin: 0 0 20px 0; padding: 12px 16px; border-left-color: #0066FF; border-radius: 8px;">
            <p style="margin: 0; font-size: 13px;">
                <strong>Yasal Zorunluluk Bilgilendirmesi:</strong> Bu alandaki resmi kayıt bilgileri footer (alt bilgi), iletişim sayfası ve KVKK aydınlatma modallarında otomatik olarak kullanılır. Boş bırakılan alanlar sitede gösterilmez.
            </p>
        </div>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>
            <input type="hidden" name="plused_sigorta_options[settings_section]" value="corporate" />

            <div class="plused-admin-card">
                <h2>Resmi ve Yasal Sicil Kayıtları</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="corporate_legal_title">Ticari Resmi Unvan</label></th>
                        <td>
                            <input type="text" id="corporate_legal_title" name="plused_sigorta_options[corporate_legal_title]" value="<?php echo esc_attr($options['corporate_legal_title'] ?? ''); ?>" placeholder="Örn: Plused Sigorta Aracılık Hizmetleri Ltd. Şti." />
                            <p class="plused-helper-text">Ticaret siciline kayıtlı tam resmi şirket unvanı.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="corporate_agency_name">Acente Adı</label></th>
                        <td>
                            <input type="text" id="corporate_agency_name" name="plused_sigorta_options[corporate_agency_name]" value="<?php echo esc_attr($options['corporate_agency_name'] ?? ''); ?>" placeholder="Örn: Plused Sigorta Acenteliği" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="corporate_plate_number">TOBB / SEDDK Levha No</label></th>
                        <td>
                            <input type="text" id="corporate_plate_number" name="plused_sigorta_options[corporate_plate_number]" value="<?php echo esc_attr($options['corporate_plate_number'] ?? ''); ?>" placeholder="Örn: T08512-XXXX" />
                            <p class="plused-helper-text">Sigortacılık levha kayıt numarası.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="corporate_tax_office">Vergi Dairesi</label></th>
                        <td>
                            <input type="text" id="corporate_tax_office" name="plused_sigorta_options[corporate_tax_office]" value="<?php echo esc_attr($options['corporate_tax_office'] ?? ''); ?>" placeholder="Örn: Kadıköy V.D." />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="corporate_tax_number">Vergi Numarası</label></th>
                        <td>
                            <input type="text" id="corporate_tax_number" name="plused_sigorta_options[corporate_tax_number]" value="<?php echo esc_attr($options['corporate_tax_number'] ?? ''); ?>" placeholder="Örn: 1234567890" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="corporate_mersis_number">MERSİS Numarası</label></th>
                        <td>
                            <input type="text" id="corporate_mersis_number" name="plused_sigorta_options[corporate_mersis_number]" value="<?php echo esc_attr($options['corporate_mersis_number'] ?? ''); ?>" placeholder="Örn: 0123456789000001" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="kvkk_controller_title">KVKK Veri Sorumlusu Unvanı</label></th>
                        <td>
                            <input type="text" id="kvkk_controller_title" name="plused_sigorta_options[kvkk_controller_title]" value="<?php echo esc_attr($options['kvkk_controller_title'] ?? ''); ?>" placeholder="Örn: Plused Sigorta Aracılık Hizmetleri Ltd. Şti." />
                            <p class="plused-helper-text">KVKK aydınlatma metninde veri sorumlusu sıfatıyla yer alacak resmi unvan.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="corporate_address">Resmi Tebligat Adresi</label></th>
                        <td>
                            <textarea id="corporate_address" name="plused_sigorta_options[corporate_address]" rows="3" placeholder="Resmi tebligat adresi"><?php echo esc_textarea($options['corporate_address'] ?? ''); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="corporate_email">Kurumsal E-posta</label></th>
                        <td>
                            <input type="email" id="corporate_email" name="plused_sigorta_options[corporate_email]" value="<?php echo esc_attr($options['corporate_email'] ?? ''); ?>" placeholder="info@acente.com" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="corporate_phone">Kurumsal Telefon</label></th>
                        <td>
                            <input type="text" id="corporate_phone" name="plused_sigorta_options[corporate_phone]" value="<?php echo esc_attr($options['corporate_phone'] ?? ''); ?>" placeholder="0530 477 77 37" />
                        </td>
                    </tr>
                </table>
            </div>

            <?php submit_button('Kurumsal Bilgileri Kaydet', 'primary large'); ?>
        </form>
    </div>
    <?php
}

/**
 * 3. Logo & Renk Paleti (White-Label Markalama) Sayfası
 */
function plused_render_branding_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header('LOGO & RENK PALETİ (WHITE-LABEL)', 'Acentenizin kurumsal logosunu, faviconunu ve marka renklerini özelleştirin.'); ?>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>
            <input type="hidden" name="plused_sigorta_options[settings_section]" value="branding" />

            <div class="plused-admin-card">
                <h2>1. Kurumsal Logolar & Favicon</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="logo_url">Header Logosu</label></th>
                        <td>
                            <div class="plused-media-control">
                                <input type="text" id="logo_url" name="plused_sigorta_options[logo_url]" value="<?php echo esc_attr($options['logo_url'] ?? ''); ?>" style="max-width:400px;" placeholder="https://.../logo.png" />
                                <button type="button" class="button plused-upload-image-btn" data-target="logo_url" data-preview="preview_logo_url">Görsel Seç / Yükle</button>
                                <button type="button" class="button plused-remove-media-btn" data-target="logo_url" data-preview="preview_logo_url">Kaldır</button>
                            </div>
                            <p class="plused-helper-text">Üst gezinme çubuğunda görünecek ana logo (Önerilen: Şeffaf PNG / SVG, Maks yükseklik: 55px). Boş bırakılırsa varsayılan kalkan rozeti ve firma adı gösterilir.</p>
                            <div id="preview_logo_url" class="plused-media-preview" style="<?php echo !empty($options['logo_url']) ? '' : 'display:none;'; ?>">
                                <img src="<?php echo esc_url($options['logo_url'] ?? ''); ?>" alt="Logo Önizleme" style="max-height:60px; width:auto;" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="logo_footer_url">Footer Logosu (Opsiyonel)</label></th>
                        <td>
                            <div class="plused-media-control">
                                <input type="text" id="logo_footer_url" name="plused_sigorta_options[logo_footer_url]" value="<?php echo esc_attr($options['logo_footer_url'] ?? ''); ?>" style="max-width:400px;" placeholder="https://.../logo-footer.png" />
                                <button type="button" class="button plused-upload-image-btn" data-target="logo_footer_url" data-preview="preview_logo_footer_url">Görsel Seç / Yükle</button>
                                <button type="button" class="button plused-remove-media-btn" data-target="logo_footer_url" data-preview="preview_logo_footer_url">Kaldır</button>
                            </div>
                            <p class="plused-helper-text">Koyu arka plana sahip footer için açık renkli logo varyantı (Boş ise header logosu kullanılır).</p>
                            <div id="preview_logo_footer_url" class="plused-media-preview" style="<?php echo !empty($options['logo_footer_url']) ? '' : 'display:none;'; ?>">
                                <img src="<?php echo esc_url($options['logo_footer_url'] ?? ''); ?>" alt="Footer Logo Önizleme" style="max-height:60px; width:auto;" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="favicon_url">Favicon (Tarayıcı İkonu)</label></th>
                        <td>
                            <div class="plused-media-control">
                                <input type="text" id="favicon_url" name="plused_sigorta_options[favicon_url]" value="<?php echo esc_attr($options['favicon_url'] ?? ''); ?>" style="max-width:400px;" placeholder="https://.../favicon.png" />
                                <button type="button" class="button plused-upload-image-btn" data-target="favicon_url" data-preview="preview_favicon_url">Favicon Seç</button>
                                <button type="button" class="button plused-remove-media-btn" data-target="favicon_url" data-preview="preview_favicon_url">Kaldır</button>
                            </div>
                            <p class="plused-helper-text">Tarayıcı sekmelerinde görünen kare ikon (32x32 PNG veya ICO). Boş ise tema kalkan ikonu gösterilir.</p>
                            <div id="preview_favicon_url" class="plused-media-preview" style="max-width:48px; <?php echo !empty($options['favicon_url']) ? '' : 'display:none;'; ?>">
                                <img src="<?php echo esc_url($options['favicon_url'] ?? ''); ?>" alt="Favicon Önizleme" style="max-height:32px; width:auto;" />
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="plused-admin-card">
                <h2>2. Kurumsal Renk Paleti (CSS Değişkenleri)</h2>
                <p class="plused-helper-text" style="margin-bottom:15px;">
                    Acentenizin kurumsal kimliğine uygun renk kodlarını belirleyin. Bu renkler butonlar, vurgular, gradyanlar ve parlamalar dahil tüm siteye dinamik uygulanır.
                </p>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="brand_primary_color">Ana Marka Rengi</label></th>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <input type="color" id="brand_primary_color_picker" value="<?php echo esc_attr($options['brand_primary_color'] ?? '#0066FF'); ?>" oninput="document.getElementById('brand_primary_color').value = this.value;" style="height:38px; width:50px; padding:2px; cursor:pointer; border:1px solid #CBD5E1; border-radius:6px;" />
                                <input type="text" id="brand_primary_color" name="plused_sigorta_options[brand_primary_color]" value="<?php echo esc_attr($options['brand_primary_color'] ?? '#0066FF'); ?>" style="max-width:140px; text-transform:uppercase; font-family:monospace;" oninput="document.getElementById('brand_primary_color_picker').value = this.value;" />
                            </div>
                            <p class="plused-helper-text">Varsayılan: #0066FF (Primary Butonlar, linkler ve ana vurgular).</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="brand_secondary_color">İkincil / Açık Renk</label></th>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <input type="color" id="brand_secondary_color_picker" value="<?php echo esc_attr($options['brand_secondary_color'] ?? '#00D2FF'); ?>" oninput="document.getElementById('brand_secondary_color').value = this.value;" style="height:38px; width:50px; padding:2px; cursor:pointer; border:1px solid #CBD5E1; border-radius:6px;" />
                                <input type="text" id="brand_secondary_color" name="plused_sigorta_options[brand_secondary_color]" value="<?php echo esc_attr($options['brand_secondary_color'] ?? '#00D2FF'); ?>" style="max-width:140px; text-transform:uppercase; font-family:monospace;" oninput="document.getElementById('brand_secondary_color_picker').value = this.value;" />
                            </div>
                            <p class="plused-helper-text">Varsayılan: #00D2FF (Gradyan bitişleri, parlama ve ışık efektleri).</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="brand_accent_color">Vurgu / Rozet Rengi</label></th>
                        <td>
                            <div style="display:flex; align-items:center; gap:12px;">
                                <input type="color" id="brand_accent_color_picker" value="<?php echo esc_attr($options['brand_accent_color'] ?? '#6C5CE7'); ?>" oninput="document.getElementById('brand_accent_color').value = this.value;" style="height:38px; width:50px; padding:2px; cursor:pointer; border:1px solid #CBD5E1; border-radius:6px;" />
                                <input type="text" id="brand_accent_color" name="plused_sigorta_options[brand_accent_color]" value="<?php echo esc_attr($options['brand_accent_color'] ?? '#6C5CE7'); ?>" style="max-width:140px; text-transform:uppercase; font-family:monospace;" oninput="document.getElementById('brand_accent_color_picker').value = this.value;" />
                            </div>
                            <p class="plused-helper-text">Varsayılan: #6C5CE7 (Etiketler, rozetler ve premium efektler).</p>
                        </td>
                    </tr>
                </table>
            </div>

            <?php submit_button('Markalama Ayarlarını Kaydet', 'primary large'); ?>
        </form>
    </div>
    <?php
}

/**
 * 4. Ana Sayfa İçerikleri Sayfası
 */
function plused_render_homepage_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header('ANA SAYFA İÇERİK YÖNETİMİ', 'Hero vitrini, duyuru bandı, Kasko ve Konut sinematik sahne metinlerini yönetin.'); ?>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>
            <input type="hidden" name="plused_sigorta_options[settings_section]" value="homepage" />

            <div class="plused-admin-card">
                <h2>1. Duyuru Bandı (Announcement Bar)</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row">Duyuru Gösterilsin mi?</th>
                        <td>
                            <label>
                                <input type="checkbox" name="plused_sigorta_options[announcement_active]" value="1" <?php checked(!empty($options['announcement_active']), true); ?> />
                                Sayfanın en üstünde ince duyuru bandını göster
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="announcement_text">Duyuru Metni</label></th>
                        <td>
                            <input type="text" id="announcement_text" name="plused_sigorta_options[announcement_text]" value="<?php echo esc_attr($options['announcement_text'] ?? ''); ?>" placeholder="Örn: 7/24 Kesintisiz Hasar ve Teklif Hattı Aktiftir" />
                        </td>
                    </tr>
                </table>
            </div>

            <div class="plused-admin-card">
                <h2>2. Hero (Açılış Vitrini)</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="hero_eyebrow">Hero Üst Başlık (Eyebrow)</label></th>
                        <td>
                            <input type="text" id="hero_eyebrow" name="plused_sigorta_options[hero_eyebrow]" value="<?php echo esc_attr($options['hero_eyebrow'] ?? 'Bağımsız Sigorta Acentesi'); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_title">Hero Ana Başlık</label></th>
                        <td>
                            <textarea id="hero_title" name="plused_sigorta_options[hero_title]" rows="2"><?php echo esc_textarea($options['hero_title'] ?? 'Hayat sürprizlerle dolu. Güvencen hazır olsun.'); ?></textarea>
                            <p class="plused-helper-text">Vurgulu renklendirme için &lt;span class="text-electric"&gt;metin&lt;/span&gt; kullanabilirsiniz.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_desc">Hero Açıklama Metni</label></th>
                        <td>
                            <textarea id="hero_desc" name="plused_sigorta_options[hero_desc]" rows="3"><?php echo esc_textarea($options['hero_desc'] ?? 'Aracınızdan evinize, sağlığınızdan iş yerinize kadar değer verdiğiniz her şeyi doğru teminatlarla koruyun.'); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_cta_primary">Birincil Buton Metni</label></th>
                        <td>
                            <input type="text" id="hero_cta_primary" name="plused_sigorta_options[hero_cta_primary]" value="<?php echo esc_attr($options['hero_cta_primary'] ?? 'Teklif Al'); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_cta_secondary">İkincil Buton Metni</label></th>
                        <td>
                            <input type="text" id="hero_cta_secondary" name="plused_sigorta_options[hero_cta_secondary]" value="<?php echo esc_attr($options['hero_cta_secondary'] ?? 'Sigortaları İncele'); ?>" />
                        </td>
                    </tr>
                </table>
            </div>

            <div class="plused-admin-card">
                <h2>3. Kasko Sinematik Sahnesi (Ana Sayfa Vitrini)</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="hero_kasko_title">Kasko Sahne Başlığı</label></th>
                        <td>
                            <input type="text" id="hero_kasko_title" name="plused_sigorta_options[hero_kasko_title]" value="<?php echo esc_attr($options['hero_kasko_title'] ?? 'Hareket özgürlüğünüzü güvence altına alın.'); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="hero_kasko_desc">Kasko Sahne Açıklaması</label></th>
                        <td>
                            <textarea id="hero_kasko_desc" name="plused_sigorta_options[hero_kasko_desc]" rows="3"><?php echo esc_textarea($options['hero_kasko_desc'] ?? 'Kaza, çarpma, doğal afet, yangın ve hırsızlığa karşı aracınızı tam güvenceye alın. İhtiyacınıza uygun teminat seçenekleriyle standart poliçelerin ötesine geçin.'); ?></textarea>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="plused-admin-card">
                <h2>4. Konut & DASK Sinematik Sahnesi (Ana Sayfa Vitrini)</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="home_konut_title">Konut & DASK Sahne Başlığı</label></th>
                        <td>
                            <input type="text" id="home_konut_title" name="plused_sigorta_options[home_konut_title]" value="<?php echo esc_attr($options['home_konut_title'] ?? 'Eviniz dört duvardan fazlasıdır.'); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="home_konut_desc">Konut & DASK Sahne Açıklaması</label></th>
                        <td>
                            <textarea id="home_konut_desc" name="plused_sigorta_options[home_konut_desc]" rows="3"><?php echo esc_textarea($options['home_konut_desc'] ?? 'Evinizi, değerli eşyalarınızı ve anılarınızı yangın, hırsızlık, dahili su sızıntıları ve deprem risklerine karşı eksiksiz teminat altına alın.'); ?></textarea>
                        </td>
                    </tr>
                </table>
            </div>

            <?php submit_button('Ana Sayfa İçeriklerini Kaydet', 'primary large'); ?>
        </form>
    </div>
    <?php
}

/**
 * 5. SEO & Pazarlama Kodları Sayfası
 */
function plused_render_marketing_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header('SEO & PAZARLAMA KODLARI', 'Arama motoru optimizasyonu, meta etiketleri ve analitik piksel entegrasyonları.'); ?>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>
            <input type="hidden" name="plused_sigorta_options[settings_section]" value="marketing" />

            <div class="plused-admin-card">
                <h2>1. Arama Motoru Optimizasyonu (SEO Meta Bilgileri)</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="seo_site_title">Özel Site Başlığı (Title Tag)</label></th>
                        <td>
                            <input type="text" id="seo_site_title" name="plused_sigorta_options[seo_site_title]" value="<?php echo esc_attr($options['seo_site_title'] ?? ''); ?>" placeholder="Örn: Ahmet Sigorta | Güvenilir & Bağımsız Sigorta Acentesi" />
                            <p class="plused-helper-text">Boş bırakılırsa '[Firma Adı] | [Tagline]' formatı otomatik oluşturulur.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="seo_meta_description">Ana Sayfa Meta Açıklaması (Meta Description)</label></th>
                        <td>
                            <textarea id="seo_meta_description" name="plused_sigorta_options[seo_meta_description]" rows="3" placeholder="Acentenizin uzmanlığını özetleyen 150-160 karakterlik açıklama"><?php echo esc_textarea($options['seo_meta_description'] ?? ''); ?></textarea>
                            <p class="plused-helper-text">Google arama sonuçlarında sitenizin altında gösterilen özet açıklama metni.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="seo_og_image">Sosyal Medya Paylaşım Görseli (OG Image)</label></th>
                        <td>
                            <div class="plused-media-control">
                                <input type="text" id="seo_og_image" name="plused_sigorta_options[seo_og_image]" value="<?php echo esc_attr($options['seo_og_image'] ?? ''); ?>" style="max-width:400px;" placeholder="https://.../og-image.jpg" />
                                <button type="button" class="button plused-upload-image-btn" data-target="seo_og_image" data-preview="preview_seo_og_image">Görsel Seç / Yükle</button>
                                <button type="button" class="button plused-remove-media-btn" data-target="seo_og_image" data-preview="preview_seo_og_image">Kaldır</button>
                            </div>
                            <p class="plused-helper-text">WhatsApp, Facebook, Twitter ve LinkedIn'de paylaşıldığında çıkan büyük önizleme görseli (Önerilen: 1200x630 px JPG/PNG).</p>
                            <div id="preview_seo_og_image" class="plused-media-preview" style="<?php echo !empty($options['seo_og_image']) ? '' : 'display:none;'; ?>">
                                <img src="<?php echo esc_url($options['seo_og_image'] ?? ''); ?>" alt="OG Görsel Önizleme" style="max-height:90px; width:auto;" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="gsc_verification_code">Google Search Console Doğrulama Kodu</label></th>
                        <td>
                            <input type="text" id="gsc_verification_code" name="plused_sigorta_options[gsc_verification_code]" value="<?php echo esc_attr($options['gsc_verification_code'] ?? ''); ?>" placeholder="Örn: 4Z6... (HTML Meta Tag content değeri)" />
                            <p class="plused-helper-text">Google Search Console 'HTML Etiketi' doğrulamasındaki content="" değerini buraya giriniz.</p>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="plused-admin-card">
                <h2>2. Analitik & Reklam Takip Pikselleri (Güvenli ID Entegrasyonu)</h2>
                <p class="plused-helper-text" style="margin-bottom:15px;">
                    Güvenlik gereği serbest JavaScript kodu girilmez. Yalnızca platform hesap kimliklerinizi (ID) girmeniz yeterlidir; tema kodları asenkron ve güvenli şekilde otomatik üretir.
                </p>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="ga4_measurement_id">Google Analytics 4 Ölçüm Kimliği</label></th>
                        <td>
                            <input type="text" id="ga4_measurement_id" name="plused_sigorta_options[ga4_measurement_id]" value="<?php echo esc_attr($options['ga4_measurement_id'] ?? ''); ?>" placeholder="G-XXXXXXXXXX" />
                            <p class="plused-helper-text">Format: G- ile başlayan GA4 Measurement ID.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="meta_pixel_id">Meta (Facebook) Pixel ID</label></th>
                        <td>
                            <input type="text" id="meta_pixel_id" name="plused_sigorta_options[meta_pixel_id]" value="<?php echo esc_attr($options['meta_pixel_id'] ?? ''); ?>" placeholder="Örn: 123456789012345" />
                            <p class="plused-helper-text">Yalnızca rakamlardan oluşan Meta Piksel ID'niz.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="google_ads_id">Google Ads Dönüşüm Kimliği</label></th>
                        <td>
                            <input type="text" id="google_ads_id" name="plused_sigorta_options[google_ads_id]" value="<?php echo esc_attr($options['google_ads_id'] ?? ''); ?>" placeholder="AW-XXXXXXXXX" />
                            <p class="plused-helper-text">Format: AW- ile başlayan Google Ads kimliği.</p>
                        </td>
                    </tr>
                </table>
            </div>

            <?php submit_button('SEO ve Pazarlama Ayarlarını Kaydet', 'primary large'); ?>
        </form>
    </div>
    <?php
}

/**
 * 6. Paket Özellikleri & Modüller Sayfası
 */
function plused_render_features_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header('PAKET ÖZELLİKLERİ & MODÜL YÖNETİMİ', 'Acentenizin lisans paketine dahil olan özellikleri ve bileşenleri buradan yönetebilirsiniz.'); ?>

        <div class="notice notice-info inline" style="margin: 0 0 20px 0; padding: 12px 16px; border-left-color: #0066FF; border-radius: 8px;">
            <p style="margin: 0; font-size: 13px;">
                <strong>Modüler Platform Mimarisi:</strong> Kapatılan modüller sitenin ön yüzünde tamamen devre dışı bırakılır, harici komut dosyaları yüklenmez ve sayfa yükleme hızında maksimum performans sağlanır.
            </p>
        </div>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>
            <input type="hidden" name="plused_sigorta_options[settings_section]" value="features" />
            <input type="hidden" name="plused_sigorta_options[features_submitted]" value="1" />

            <div class="plused-admin-card">
                <h2>Özellik & Modül Anahtarları (Feature Flags)</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row">Sinematik Arka Plan Videosu</th>
                        <td>
                            <label style="font-weight:600; cursor:pointer;">
                                <input type="checkbox" name="plused_sigorta_options[feature_cinematic_video]" value="1" <?php checked(plused_is_feature_enabled('feature_cinematic_video', true), true); ?> />
                                Hero ve vitrin bölümlerinde sinematik arka plan videosunu aktif et
                            </label>
                            <p class="plused-helper-text">Kapatılırsa sade ve ultra hafif statik degrade arka plan kullanılır.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Hasar Destek Merkezi Formu</th>
                        <td>
                            <label style="font-weight:600; cursor:pointer;">
                                <input type="checkbox" name="plused_sigorta_options[feature_claim_center]" value="1" <?php checked(plused_is_feature_enabled('feature_claim_center', true), true); ?> />
                                Hasar anında hızlı destek ve bildirim yönlendirmesini aktif et
                            </label>
                            <p class="plused-helper-text">Kapatılırsa hasar ihbar bileşeni siteden gizlenir.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Gelişmiş SEO & Schema.org Yapısı</th>
                        <td>
                            <label style="font-weight:600; cursor:pointer;">
                                <input type="checkbox" name="plused_sigorta_options[feature_advanced_seo]" value="1" <?php checked(plused_is_feature_enabled('feature_advanced_seo', true), true); ?> />
                                InsuranceAgency JSON-LD yapısal veri şemalarını ve dinamik meta etiketlerini aktif et
                            </label>
                            <p class="plused-helper-text">Google Rich Snippets ve yerel arama haritaları için önerilir.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Pazarlama Kodları & Analitik</th>
                        <td>
                            <label style="font-weight:600; cursor:pointer;">
                                <input type="checkbox" name="plused_sigorta_options[feature_analytics]" value="1" <?php checked(plused_is_feature_enabled('feature_analytics', true), true); ?> />
                                GA4, Meta Pixel ve Google Ads takip kodlarının sitede çalışmasına izin ver
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">e-Devlet Doğrulama Butonları</th>
                        <td>
                            <label style="font-weight:600; cursor:pointer;">
                                <input type="checkbox" name="plused_sigorta_options[feature_edevlet_btn]" value="1" <?php checked(plused_is_feature_enabled('feature_edevlet_btn', true), true); ?> />
                                Ürün detaylarında resmi e-Devlet sorgulama ve doğrulama bağlantılarını göster
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Anlaşmalı Şirketler Kayan Bandı</th>
                        <td>
                            <label style="font-weight:600; cursor:pointer;">
                                <input type="checkbox" name="plused_sigorta_options[feature_partners_marquee]" value="1" <?php checked(plused_is_feature_enabled('feature_partners_marquee', true), true); ?> />
                                Ana sayfada anlaşmalı sigorta şirketleri logolarının kayan bandını göster
                            </label>
                        </td>
                    </tr>
                </table>
            </div>

            <?php submit_button('Modül Ayarlarını Kaydet', 'primary large'); ?>
        </form>
    </div>
    <?php
}

/**
 * 7. Teklif Ayarları Sayfası
 */
function plused_render_proposals_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header('TEKLİF AYARLARI', 'Online teklif bildirimleri ve WhatsApp yönlendirme metinlerini yapılandırın.'); ?>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>
            <input type="hidden" name="plused_sigorta_options[settings_section]" value="proposals" />

            <div class="plused-admin-card">
                <h2>Teklif Bildirimleri & WhatsApp Mesajları</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="proposal_notify_email">Teklif Bildirim E-postası</label></th>
                        <td>
                            <input type="email" id="proposal_notify_email" name="plused_sigorta_options[proposal_notify_email]" value="<?php echo esc_attr($options['proposal_notify_email'] ?? get_option('admin_email')); ?>" />
                            <p class="plused-helper-text">Siteden teklif talebi iletildiğinde bildirim gidecek acente e-posta adresi.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="proposal_whatsapp_msg">Genel WhatsApp Hazır Mesajı</label></th>
                        <td>
                            <textarea id="proposal_whatsapp_msg" name="plused_sigorta_options[proposal_whatsapp_msg]" rows="3"><?php echo esc_textarea($options['proposal_whatsapp_msg'] ?? 'Merhaba, sigorta poliçesi teklifi almak istiyorum.'); ?></textarea>
                            <p class="plused-helper-text">Kullanıcı hızlı WhatsApp butonuna tıkladığında otomatik yazılan karşılama mesajı.</p>
                        </td>
                    </tr>
                </table>
            </div>

            <?php submit_button('Teklif Ayarlarını Kaydet', 'primary large'); ?>
        </form>
    </div>
    <?php
}
