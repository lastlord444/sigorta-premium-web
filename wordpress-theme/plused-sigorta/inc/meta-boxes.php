<?php
/**
 * Plused Sigorta Meta Boxes
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Meta Boxes
 */
function plused_register_meta_boxes() {
    // Product Details Meta Box
    add_meta_box(
        'plused_product_details_box',
        'Sigorta Ürünü Sinematik Ayarları',
        'plused_render_product_details_box',
        'insurance_product',
        'normal',
        'high'
    );

    // FAQ Details Meta Box
    add_meta_box(
        'plused_faq_details_box',
        'SSS Ayarları',
        'plused_render_faq_details_box',
        'insurance_faq',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'plused_register_meta_boxes');

/**
 * Render Product Details Meta Box
 */
function plused_render_product_details_box($post) {
    wp_nonce_field('plused_save_product_meta', 'plused_product_nonce');

    $order         = get_post_meta($post->ID, '_plused_product_order', true);
    $eyebrow       = get_post_meta($post->ID, '_plused_product_eyebrow', true);
    $badge         = get_post_meta($post->ID, '_plused_product_badge', true);
    $form_type     = get_post_meta($post->ID, '_plused_product_form_type', true);
    $highlights    = get_post_meta($post->ID, '_plused_product_highlights', true);
    $cta_text      = get_post_meta($post->ID, '_plused_product_cta_text', true);
    $whatsapp_msg  = get_post_meta($post->ID, '_plused_product_whatsapp_msg', true);
    $video_url     = get_post_meta($post->ID, '_plused_product_video_url', true);
    $poster_url    = get_post_meta($post->ID, '_plused_product_poster_url', true);
    $alignment     = get_post_meta($post->ID, '_plused_product_alignment', true);
    $edevlet_btn   = get_post_meta($post->ID, '_plused_product_edevlet_btn', true);
    $is_active     = get_post_meta($post->ID, '_plused_product_active', true);

    if ($is_active === '') $is_active = '1';
    if ($alignment === '') $alignment = 'right';
    ?>
    <table class="form-table plused-form-table">
        <tr>
            <th scope="row"><label for="plused_product_order">Ürün Sıra No (01, 02...)</label></th>
            <td>
                <input type="text" id="plused_product_order" name="plused_product_order" value="<?php echo esc_attr($order); ?>" style="max-width:120px;" />
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="plused_product_eyebrow">Üst Başlık (Eyebrow)</label></th>
            <td>
                <input type="text" id="plused_product_eyebrow" name="plused_product_eyebrow" value="<?php echo esc_attr($eyebrow); ?>" placeholder="Örn: 02 / KONUT" />
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="plused_product_badge">Rozet Metni (Badge)</label></th>
            <td>
                <input type="text" id="plused_product_badge" name="plused_product_badge" value="<?php echo esc_attr($badge); ?>" placeholder="Örn: Konut Koruma Paketi" />
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="plused_product_form_type">Teklif Formu Türü</label></th>
            <td>
                <select id="plused_product_form_type" name="plused_product_form_type">
                    <option value="kasko" <?php selected($form_type, 'kasko'); ?>>Kasko</option>
                    <option value="trafik" <?php selected($form_type, 'trafik'); ?>>Trafik Sigortası</option>
                    <option value="saglik" <?php selected($form_type, 'saglik'); ?>>Özel Sağlık Sigortası</option>
                    <option value="konut" <?php selected($form_type, 'konut'); ?>>Konut Sigortası</option>
                    <option value="dask" <?php selected($form_type, 'dask'); ?>>DASK</option>
                    <option value="isyeri" <?php selected($form_type, 'isyeri'); ?>>İşyeri Sigortası</option>
                    <option value="diger" <?php selected($form_type, 'diger'); ?>>Diğer</option>
                </select>
                <p class="plused-helper-text">Teklif formundaki dinamik alanları (plaka, doğum yılı, m² vb.) belirler.</p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="plused_product_highlights">Öne Çıkan Maddeler (Highlights)</label></th>
            <td>
                <textarea id="plused_product_highlights" name="plused_product_highlights" rows="4" placeholder="Her satıra bir özellik yazınız..."><?php echo esc_textarea($highlights); ?></textarea>
                <p class="plused-helper-text">Her satır sitede yeşil onay ikonlu şık bir karta dönüşür.</p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="plused_product_cta_text">CTA Buton Yazısı</label></th>
            <td>
                <input type="text" id="plused_product_cta_text" name="plused_product_cta_text" value="<?php echo esc_attr($cta_text); ?>" placeholder="Örn: Konut Sigortası Teklifi Al" />
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="plused_product_whatsapp_msg">WhatsApp Hazır Mesajı</label></th>
            <td>
                <textarea id="plused_product_whatsapp_msg" name="plused_product_whatsapp_msg" rows="2" placeholder="Örn: Merhaba, Konut Sigortası için teklif almak istiyorum."><?php echo esc_textarea($whatsapp_msg); ?></textarea>
                <p class="plused-helper-text">Kullanıcı bu üründen WhatsApp'a yönlendirildiğinde otomatik yazılacak mesaj.</p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="plused_product_video_url">Sinematik Video URL</label></th>
            <td>
                <div class="plused-media-control">
                    <input type="text" id="plused_product_video_url" name="plused_product_video_url" value="<?php echo esc_url($video_url); ?>" />
                    <button type="button" class="button plused-upload-video-btn" data-target="plused_product_video_url" data-preview="plused_video_preview">Video Seç / Yükle</button>
                    <button type="button" class="button plused-remove-media-btn" data-target="plused_product_video_url" data-preview="plused_video_preview">Kaldır</button>
                </div>
                <p class="plused-helper-text">MP4 video dosyası. Video seçildiğinde sinematik tam ekran vitrin oynatılır. Video yoksa zarif editoryal vitrin otomatik kullanılır.</p>
                <div id="plused_video_preview" class="plused-media-preview" style="<?php echo empty($video_url) ? 'display:none;' : ''; ?>">
                    <?php if (!empty($video_url)) : ?>
                        <video src="<?php echo esc_url($video_url); ?>" controls style="max-width:100%; height:auto;"></video>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="plused_product_poster_url">Poster Görseli URL</label></th>
            <td>
                <div class="plused-media-control">
                    <input type="text" id="plused_product_poster_url" name="plused_product_poster_url" value="<?php echo esc_url($poster_url); ?>" />
                    <button type="button" class="button plused-upload-image-btn" data-target="plused_product_poster_url" data-preview="plused_poster_preview">Görsel Seç / Yükle</button>
                    <button type="button" class="button plused-remove-media-btn" data-target="plused_product_poster_url" data-preview="plused_poster_preview">Kaldır</button>
                </div>
                <div id="plused_poster_preview" class="plused-media-preview" style="<?php echo empty($poster_url) ? 'display:none;' : ''; ?>">
                    <?php if (!empty($poster_url)) : ?>
                        <img src="<?php echo esc_url($poster_url); ?>" style="max-width:100%; height:auto;" />
                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row">Görsel / Video Konumu</th>
            <td>
                <label style="margin-right:20px;">
                    <input type="radio" name="plused_product_alignment" value="right" <?php checked($alignment, 'right'); ?> />
                    Sağda Medya, Solda Metin
                </label>
                <label>
                    <input type="radio" name="plused_product_alignment" value="left" <?php checked($alignment, 'left'); ?> />
                    Solda Medya, Sağda Metin
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">e-Devlet Butonu</th>
            <td>
                <label>
                    <input type="checkbox" name="plused_product_edevlet_btn" value="1" <?php checked($edevlet_btn, '1'); ?> />
                    “Ruhsat Bilgilerimi e-Devlet'ten Bul” butonunu bu üründe göster (Kasko & Trafik için önerilir)
                </label>
            </td>
        </tr>
        <tr>
            <th scope="row">Ürün Durumu</th>
            <td>
                <label>
                    <input type="checkbox" name="plused_product_active" value="1" <?php checked($is_active, '1'); ?> />
                    Bu ürünü ana sayfada göster (Aktif)
                </label>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Render FAQ Details Meta Box
 */
function plused_render_faq_details_box($post) {
    wp_nonce_field('plused_save_faq_meta', 'plused_faq_nonce');

    $category  = get_post_meta($post->ID, '_plused_faq_category', true);
    $order     = get_post_meta($post->ID, '_plused_faq_order', true);
    $is_active = get_post_meta($post->ID, '_plused_faq_active', true);

    if ($is_active === '') $is_active = '1';
    ?>
    <p>
        <label for="plused_faq_category"><strong>Kategori:</strong></label><br />
        <input type="text" id="plused_faq_category" name="plused_faq_category" value="<?php echo esc_attr($category); ?>" style="width:100%;" placeholder="Örn: Araç Sigortaları, Ev & Mülk" />
    </p>
    <p>
        <label for="plused_faq_order"><strong>Sıralama:</strong></label><br />
        <input type="number" id="plused_faq_order" name="plused_faq_order" value="<?php echo esc_attr($order); ?>" style="width:100%;" />
    </p>
    <p>
        <label>
            <input type="checkbox" name="plused_faq_active" value="1" <?php checked($is_active, '1'); ?> />
            Aktif (Sitede Göster)
        </label>
    </p>
    <?php
}

/**
 * Save Meta Box Data
 */
function plused_save_meta_boxes($post_id) {
    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Product Meta
    if (isset($_POST['plused_product_nonce']) && wp_verify_nonce($_POST['plused_product_nonce'], 'plused_save_product_meta')) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $fields = array(
            '_plused_product_order'        => sanitize_text_field($_POST['plused_product_order'] ?? ''),
            '_plused_product_eyebrow'      => sanitize_text_field($_POST['plused_product_eyebrow'] ?? ''),
            '_plused_product_badge'        => sanitize_text_field($_POST['plused_product_badge'] ?? ''),
            '_plused_product_form_type'    => sanitize_text_field($_POST['plused_product_form_type'] ?? 'kasko'),
            '_plused_product_highlights'   => sanitize_textarea_field($_POST['plused_product_highlights'] ?? ''),
            '_plused_product_cta_text'     => sanitize_text_field($_POST['plused_product_cta_text'] ?? ''),
            '_plused_product_whatsapp_msg' => sanitize_textarea_field($_POST['plused_product_whatsapp_msg'] ?? ''),
            '_plused_product_video_url'    => esc_url_raw($_POST['plused_product_video_url'] ?? ''),
            '_plused_product_poster_url'   => esc_url_raw($_POST['plused_product_poster_url'] ?? ''),
            '_plused_product_alignment'    => in_array($_POST['plused_product_alignment'] ?? '', array('left', 'right')) ? $_POST['plused_product_alignment'] : 'right',
            '_plused_product_edevlet_btn'  => !empty($_POST['plused_product_edevlet_btn']) ? '1' : '0',
            '_plused_product_active'       => !empty($_POST['plused_product_active']) ? '1' : '0',
        );

        foreach ($fields as $meta_key => $value) {
            update_post_meta($post_id, $meta_key, $value);
        }
    }

    // Save FAQ Meta
    if (isset($_POST['plused_faq_nonce']) && wp_verify_nonce($_POST['plused_faq_nonce'], 'plused_save_faq_meta')) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        update_post_meta($post_id, '_plused_faq_category', sanitize_text_field($_POST['plused_faq_category'] ?? 'Genel'));
        update_post_meta($post_id, '_plused_faq_order', intval($_POST['plused_faq_order'] ?? 0));
        update_post_meta($post_id, '_plused_faq_active', !empty($_POST['plused_faq_active']) ? '1' : '0');
    }
}
add_action('save_post', 'plused_save_meta_boxes');
