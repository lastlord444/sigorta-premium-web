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
    $capability = 'manage_plused_sigorta';

    // Main Menu: PLUSED SİGORTA
    add_menu_page(
        'Plused Sigorta Yönetimi',
        'PLUSED SİGORTA',
        $capability,
        'plused-sigorta',
        'plused_render_general_settings_page',
        'dashicons-shield-alt',
        3
    );

    // Submenu 1: Genel Ayarlar
    add_submenu_page(
        'plused-sigorta',
        'Genel Ayarlar',
        'Genel Ayarlar',
        $capability,
        'plused-sigorta',
        'plused_render_general_settings_page',
        1
    );

    // Submenu 2: Ana Sayfa
    add_submenu_page(
        'plused-sigorta',
        'Ana Sayfa İçerikleri',
        'Ana Sayfa',
        $capability,
        'plused-homepage',
        'plused_render_homepage_settings_page',
        2
    );

    // Submenu 3: Sigorta Ürünleri (Post Type edit link)
    add_submenu_page(
        'plused-sigorta',
        'Sigorta Ürünleri',
        'Sigorta Ürünleri',
        'edit_posts',
        'edit.php?post_type=insurance_product',
        '',
        3
    );

    // Submenu 4: Teklif Ayarları
    add_submenu_page(
        'plused-sigorta',
        'Teklif Ayarları',
        'Teklif Ayarları',
        $capability,
        'plused-proposals',
        'plused_render_proposals_settings_page',
        4
    );

    // Submenu 5: SSS (FAQ edit link)
    add_submenu_page(
        'plused-sigorta',
        'Sıkça Sorulan Sorular',
        'SSS',
        'edit_posts',
        'edit.php?post_type=insurance_faq',
        '',
        5
    );

    // Submenu 6: İletişim
    add_submenu_page(
        'plused-sigorta',
        'İletişim Bilgileri',
        'İletişim',
        $capability,
        'plused-contact',
        'plused_render_contact_settings_page',
        6
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

    // General & Phone/WhatsApp
    if (isset($input['company_name']))    $clean['company_name']    = sanitize_text_field($input['company_name']);
    if (isset($input['tagline']))         $clean['tagline']         = sanitize_text_field($input['tagline']);
    if (isset($input['phone_display']))   $clean['phone_display']   = sanitize_text_field($input['phone_display']);
    if (isset($input['phone_raw']))       $clean['phone_raw']       = sanitize_text_field($input['phone_raw']);
    if (isset($input['whatsapp_number'])) $clean['whatsapp_number'] = sanitize_text_field($input['whatsapp_number']);
    if (isset($input['email']))           $clean['email']           = sanitize_email($input['email']);
    if (isset($input['address']))         $clean['address']         = sanitize_textarea_field($input['address']);
    if (isset($input['working_hours']))   $clean['working_hours']   = sanitize_text_field($input['working_hours']);

    // Socials
    if (isset($input['instagram'])) $clean['instagram'] = esc_url_raw($input['instagram']);
    if (isset($input['facebook']))  $clean['facebook']  = esc_url_raw($input['facebook']);
    if (isset($input['linkedin']))  $clean['linkedin']  = esc_url_raw($input['linkedin']);
    if (isset($input['x_twitter'])) $clean['x_twitter'] = esc_url_raw($input['x_twitter']);

    // Announcement
    if (isset($input['announcement_text']))   $clean['announcement_text']   = sanitize_text_field($input['announcement_text']);
    $clean['announcement_active'] = !empty($input['announcement_active']) ? '1' : '0';

    // Hero Section
    if (isset($input['hero_eyebrow']))     $clean['hero_eyebrow']     = sanitize_text_field($input['hero_eyebrow']);
    if (isset($input['hero_title']))       $clean['hero_title']       = wp_kses_post($input['hero_title']);
    if (isset($input['hero_desc']))        $clean['hero_desc']        = sanitize_textarea_field($input['hero_desc']);
    if (isset($input['hero_cta_primary'])) $clean['hero_cta_primary'] = sanitize_text_field($input['hero_cta_primary']);
    if (isset($input['hero_cta_secondary'])) $clean['hero_cta_secondary'] = sanitize_text_field($input['hero_cta_secondary']);

    // Kasko & Cinematic Scenes
    if (isset($input['hero_kasko_title'])) $clean['hero_kasko_title'] = sanitize_text_field($input['hero_kasko_title']);
    if (isset($input['hero_kasko_desc']))  $clean['hero_kasko_desc']  = sanitize_textarea_field($input['hero_kasko_desc']);
    if (isset($input['home_konut_title'])) $clean['home_konut_title'] = sanitize_text_field($input['home_konut_title']);
    if (isset($input['home_konut_desc']))  $clean['home_konut_desc']  = sanitize_textarea_field($input['home_konut_desc']);

    // Proposals
    if (isset($input['proposal_notify_email'])) $clean['proposal_notify_email'] = sanitize_email($input['proposal_notify_email']);
    if (isset($input['proposal_whatsapp_msg']))  $clean['proposal_whatsapp_msg']  = sanitize_textarea_field($input['proposal_whatsapp_msg']);

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
 * 1. Genel Ayarlar Sayfası
 */
function plused_render_general_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header('PLUSED SİGORTA - GENEL AYARLAR', 'Kurumsal marka adı, telefon hatları ve merkezi WhatsApp iletişim ayarları.'); ?>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>

            <div class="plused-admin-card">
                <h2>Kurumsal & İletişim Hatları</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="company_name">Firma Adı</label></th>
                        <td>
                            <input type="text" id="company_name" name="plused_sigorta_options[company_name]" value="<?php echo esc_attr($options['company_name'] ?? 'PLUSED SİGORTA'); ?>" />
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
                            <p class="plused-helper-text">Sitedeki tüm WhatsApp butonlarının bağlandığı tek merkezi numara (ülke kodu dahil, örn: 905304777737).</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="announcement_text">Duyuru Çubuğu Metni</label></th>
                        <td>
                            <input type="text" id="announcement_text" name="plused_sigorta_options[announcement_text]" value="<?php echo esc_attr($options['announcement_text'] ?? ''); ?>" placeholder="Örn: Hasar Sürecinde Danışmanlık Desteği Aktiftir" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Duyuru Çubuğu Gösterilsin mi?</th>
                        <td>
                            <label>
                                <input type="checkbox" name="plused_sigorta_options[announcement_active]" value="1" <?php checked(!empty($options['announcement_active']), true); ?> />
                                Sayfanın en üstünde ince duyuru bandını göster
                            </label>
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
 * 2. Ana Sayfa İçerikleri Sayfası
 */
function plused_render_homepage_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header('ANA SAYFA İÇERİK YÖNETİMİ', 'Hero açılış vitrini, Kasko ve Konut sinematik sahne metinlerini yönetin.'); ?>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>

            <div class="plused-admin-card">
                <h2>1. Hero (Açılış Vitrini)</h2>
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
                <h2>2. Kasko Sinematik Sahnesi (Ana Sayfa Vitrini)</h2>
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
                <h2>3. Konut & DASK Sinematik Sahnesi (Ana Sayfa Vitrini)</h2>
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
 * 3. Teklif Ayarları Sayfası
 */
function plused_render_proposals_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header('TEKLİF AYARLARI', 'Online teklif bildirimleri ve WhatsApp yönlendirme metinlerini yapılandırın.'); ?>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>

            <div class="plused-admin-card">
                <h2>Teklif Bildirimleri & WhatsApp Mesajları</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="proposal_notify_email">Teklif Bildirim E-postası</label></th>
                        <td>
                            <input type="email" id="proposal_notify_email" name="plused_sigorta_options[proposal_notify_email]" value="<?php echo esc_attr($options['proposal_notify_email'] ?? get_option('admin_email')); ?>" />
                            <p class="plused-helper-text">Siteden teklif formu doldurulduğunda bildirim gidecek e-posta adresi.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="proposal_whatsapp_msg">Genel WhatsApp Hazır Mesajı</label></th>
                        <td>
                            <textarea id="proposal_whatsapp_msg" name="plused_sigorta_options[proposal_whatsapp_msg]" rows="3"><?php echo esc_textarea($options['proposal_whatsapp_msg'] ?? 'Merhaba, sigorta poliçesi teklifi almak istiyorum.'); ?></textarea>
                            <p class="plused-helper-text">Kullanıcı hızlı WhatsApp butonuna tıkladığında otomatik yazılan mesaj.</p>
                        </td>
                    </tr>
                </table>
            </div>

            <?php submit_button('Teklif Ayarlarını Kaydet', 'primary large'); ?>
        </form>
    </div>
    <?php
}

/**
 * 4. İletişim Bilgileri Sayfası
 */
function plused_render_contact_settings_page() {
    if (!current_user_can('manage_plused_sigorta') && !current_user_can('manage_options')) return;
    $options = get_option('plused_sigorta_options', array());
    ?>
    <div class="wrap plused-admin-wrap">
        <?php plused_admin_header('İLETİŞİM BİLGİLERİ', 'Fiziksel ofis adresi, çalışma saatleri ve sosyal medya hesapları.'); ?>

        <form method="post" action="options.php">
            <?php settings_fields('plused_settings_group'); ?>

            <div class="plused-admin-card">
                <h2>Adres & Çalışma Saatleri</h2>
                <table class="form-table plused-form-table">
                    <tr>
                        <th scope="row"><label for="address">Fiziksel Ofis Adresi</label></th>
                        <td>
                            <textarea id="address" name="plused_sigorta_options[address]" rows="3" placeholder="Ofis adresi giriniz (boş bırakılırsa sitede gizlenir)"><?php echo esc_textarea($options['address'] ?? ''); ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="working_hours">Çalışma Saatleri</label></th>
                        <td>
                            <input type="text" id="working_hours" name="plused_sigorta_options[working_hours]" value="<?php echo esc_attr($options['working_hours'] ?? ''); ?>" placeholder="Örn: Hafta İçi: 09:00 - 18:00 (boş bırakılırsa gizlenir)" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="email">Genel E-posta</label></th>
                        <td>
                            <input type="email" id="email" name="plused_sigorta_options[email]" value="<?php echo esc_attr($options['email'] ?? ''); ?>" placeholder="E-posta adresi giriniz (boş bırakılırsa gizlenir)" />
                        </td>
                    </tr>
                </table>
            </div>

            <div class="plused-admin-card">
                <h2>Sosyal Medya Bağlantıları</h2>
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

            <?php submit_button('İletişim Bilgilerini Kaydet', 'primary large'); ?>
        </form>
    </div>
    <?php
}
