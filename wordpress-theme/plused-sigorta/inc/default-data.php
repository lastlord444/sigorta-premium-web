<?php
/**
 * Default Seed Data on Theme Activation (Pages, CPTs, Permalinks)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

function plused_seed_default_data() {
    $theme_uri = get_template_directory_uri();

    // 1. SET PERMALINKS TO CLEAN SLUGS (/%postname%/)
    global $wp_rewrite;
    if ($wp_rewrite) {
        $wp_rewrite->set_permalink_structure('/%postname%/');
        $wp_rewrite->flush_rules();
    }

    // 2. ENSURE ALL 11 MULTI-PAGE LANDING PAGES EXIST
    $required_pages = array(
        array(
            'slug'     => 'kasko',
            'title'    => 'Kasko',
            'template' => 'page-kasko.php',
        ),
        array(
            'slug'     => 'trafik-sigortasi',
            'title'    => 'Trafik Sigortası',
            'template' => 'page-trafik-sigortasi.php',
        ),
        array(
            'slug'     => 'konut-sigortasi',
            'title'    => 'Konut Sigortası',
            'template' => 'page-konut-sigortasi.php',
        ),
        array(
            'slug'     => 'dask',
            'title'    => 'DASK',
            'template' => 'page-dask.php',
        ),
        array(
            'slug'     => 'saglik-sigortasi',
            'title'    => 'Sağlık Sigortası',
            'template' => 'page-saglik-sigortasi.php',
        ),
        array(
            'slug'     => 'isyeri-sigortasi',
            'title'    => 'İşyeri Sigortası',
            'template' => 'page-isyeri-sigortasi.php',
        ),
        array(
            'slug'     => 'teklif-al',
            'title'    => 'Teklif Al',
            'template' => 'page-teklif-al.php',
        ),
        array(
            'slug'     => 'hasar-destek',
            'title'    => 'Hasar Destek',
            'template' => 'page-hasar-destek.php',
        ),
        array(
            'slug'     => 'hakkimizda',
            'title'    => 'Hakkımızda',
            'template' => 'page-hakkimizda.php',
        ),
        array(
            'slug'     => 'sss',
            'title'    => 'Sıkça Sorulan Sorular',
            'template' => 'page-sss.php',
        ),
        array(
            'slug'     => 'iletisim',
            'title'    => 'İletişim',
            'template' => 'page-iletisim.php',
        ),
        array(
            'slug'     => 'kvkk-aydinlatma',
            'title'    => 'KVKK Aydınlatma Metni',
            'template' => 'page-kvkk-aydinlatma.php',
        ),
    );

    foreach ($required_pages as $page) {
        $existing = get_page_by_path($page['slug']);
        if (!$existing) {
            $page_id = wp_insert_post(array(
                'post_title'     => $page['title'],
                'post_name'      => $page['slug'],
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed',
            ));
            if ($page_id && !is_wp_error($page_id) && !empty($page['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page['template']);
            }
        }
    }

    // 3. SEED DEFAULT PRODUCTS IN CPT IF EMPTY
    $existing_products = get_posts(array(
        'post_type'      => 'insurance_product',
        'posts_per_page' => 1,
        'post_status'    => 'any',
    ));

    if (empty($existing_products)) {
        $default_products = array(
            array(
                'title'       => 'Kasko',
                'slug'        => 'kasko',
                'order'       => '01',
                'eyebrow'     => '01 / KASKO',
                'badge'       => 'Kasko Güvencesi',
                'headline'    => 'Hareket özgürlüğünüzü güvence altına alın.',
                'desc'        => 'Kaza, çarpma, doğal afet, yangın ve hırsızlığa karşı aracınızı güvenceye alın. İhtiyacınıza uygun teminat seçenekleriyle standart poliçelerin ötesine geçin.',
                'highlights'  => "Birden fazla şirketten teklif\nİhtiyacınıza uygun teminat seçenekleri\nPoliçe sürecinde danışmanlık desteği\nOrijinal parça & yetkili servis opsiyonları",
                'form_type'   => 'kasko',
                'cta_text'    => 'Kasko Teklifi Al',
                'whatsapp'    => 'Merhaba, Kasko Sigortası için teklif almak istiyorum. Ruhsat bilgilerimi birazdan gönderiyorum.',
                'video_url'   => $theme_uri . '/assets/videos/kasko-car.mp4',
                'poster_url'  => $theme_uri . '/assets/images/porshce.jpg',
                'alignment'   => 'right',
                'edevlet_btn' => '1',
            ),
            array(
                'title'       => 'Konut',
                'slug'        => 'konut-sigortasi',
                'order'       => '02',
                'eyebrow'     => '02 / KONUT',
                'badge'       => 'Konut Koruma Paketi',
                'headline'    => 'Eviniz dört duvardan fazlasıdır.',
                'desc'        => 'Evinizi ve değerli eşyalarınızı yangın, hırsızlık, dahili su sızıntıları ve komşu sorumluluğu risklerine karşı teminat altına alın. Poliçenize göre asistans seçeneklerini değerlendirin.',
                'highlights'  => "Bina ve eşya teminat seçenekleri\nKomşu ve kiracı mali sorumluluğu\nPoliçeye bağlı asistans hizmetleri\nElektronik cihaz arıza güvencesi",
                'form_type'   => 'konut',
                'cta_text'    => 'Konut Sigortası Teklifi Al',
                'whatsapp'    => 'Merhaba, Konut Sigortası için teklif almak istiyorum.',
                'video_url'   => $theme_uri . '/assets/videos/konut-dask.mp4',
                'poster_url'  => $theme_uri . '/assets/images/villajpg.jpg',
                'alignment'   => 'left',
                'edevlet_btn' => '0',
            ),
            array(
                'title'       => 'Trafik',
                'slug'        => 'trafik-sigortasi',
                'order'       => '03',
                'eyebrow'     => '03 / TRAFİK SİGORTASI',
                'badge'       => 'Zorunlu Mali Mesuliyet',
                'headline'    => 'Yola çıktığınız her anda yanınızda.',
                'desc'        => 'Zorunlu mali sorumluluk sigortanızı yalnızca yasal zorunluluk olarak görmeyin. İhtiyacınıza uygun teminat alternatiflerine ulaşın.',
                'highlights'  => "Yasal üst limitlerle uyumlu mali koruma\nPoliçeye göre yol yardım ve çekici\nMaddi ve bedeni üçüncü şahıs teminatı\nPoliçe tanzim desteği",
                'form_type'   => 'trafik',
                'cta_text'    => 'Trafik Sigortası Teklifi Al',
                'whatsapp'    => 'Merhaba, Trafik Sigortası için teklif almak istiyorum. Ruhsat bilgilerimi birazdan gönderiyorum.',
                'video_url'   => $theme_uri . '/assets/videos/kasko-car.mp4',
                'poster_url'  => $theme_uri . '/assets/images/lambo.jpg',
                'alignment'   => 'right',
                'edevlet_btn' => '1',
            ),
            array(
                'title'       => 'Sağlık',
                'slug'        => 'saglik-sigortasi',
                'order'       => '04',
                'eyebrow'     => '04 / ÖZEL SAĞLIK',
                'badge'       => 'Bireysel & Aile Sağlığı',
                'headline'    => 'Sağlığınız söz konusu olduğunda beklemeyin.',
                'desc'        => 'Özel hastane ağlarında muayene ve tedavi olma imkanı. Tamamlayıcı ve Özel Sağlık planlarıyla ailenizin geleceğini koruyun.',
                'highlights'  => "Özel hastane ağları\nYatarak ve ayakta tedavi güvencesi\nPoliçeye göre check-up ve diş bakım seçenekleri\nDoğum ve ek tedavi opsiyonları",
                'form_type'   => 'saglik',
                'cta_text'    => 'Sağlık Sigortası Teklifi Al',
                'whatsapp'    => 'Merhaba, Sağlık Sigortası için bilgi ve teklif almak istiyorum.',
                'video_url'   => '',
                'poster_url'  => '',
                'alignment'   => 'left',
                'edevlet_btn' => '0',
            ),
            array(
                'title'       => 'DASK',
                'slug'        => 'dask',
                'order'       => '05',
                'eyebrow'     => '05 / DASK',
                'badge'       => 'Zorunlu Deprem Teminatı',
                'headline'    => 'Beklenmeyene karşı hazırlıklı olun.',
                'desc'        => 'Zorunlu Deprem Sigortası ile binanızı deprem ve deprem kaynaklı risklere karşı güvenceye alın. En güncel metrekare teminatlarıyla poliçenizi yenileyin.',
                'highlights'  => "Yasal DASK teminat tavanı koruması\nDeprem sonrası doğrudan hasar tazmini\nAbonelik işlemleri için resmi kayıt\nHızlı sorgulama ve tanzim",
                'form_type'   => 'dask',
                'cta_text'    => 'DASK Poliçesi Sorgula',
                'whatsapp'    => 'Merhaba, DASK için teklif almak istiyorum.',
                'video_url'   => $theme_uri . '/assets/videos/konut-dask.mp4',
                'poster_url'  => $theme_uri . '/assets/images/villajpg.jpg',
                'alignment'   => 'right',
                'edevlet_btn' => '0',
            ),
            array(
                'title'       => 'İşyeri',
                'slug'        => 'isyeri-sigortasi',
                'order'       => '06',
                'eyebrow'     => '06 / İŞYERİ SİGORTASI',
                'badge'       => 'Kurumsal Risk Yönetimi',
                'headline'    => 'Yıllarca kurduğunuz işi tek poliçeyle riske bırakmayın.',
                'desc'        => 'İşletmenizin demirbaşlarını, emtiasını, çalışanlarını ve iş durması risklerini çok yönlü teminat paketiyle koruyun. Butik ofislerden büyük ölçekli tesislere özel çözümler.',
                'highlights'  => "İş durması & ciro kaybı telafisi\nDemirbaş, makine kırılması ve emtia\nÜçüncü şahıs & işveren mali mesuliyet\nSektöre özel risk analizi",
                'form_type'   => 'isyeri',
                'cta_text'    => 'İşyeri Sigortası Teklifi Al',
                'whatsapp'    => 'Merhaba, İşyeri Sigortası için teklif almak istiyorum.',
                'video_url'   => '',
                'poster_url'  => $theme_uri . '/assets/images/is-yeri.jpg',
                'alignment'   => 'left',
                'edevlet_btn' => '0',
            ),
        );

        foreach ($default_products as $prod) {
            $post_id = wp_insert_post(array(
                'post_title'   => $prod['title'],
                'post_name'    => $prod['slug'],
                'post_content' => $prod['desc'],
                'post_status'  => 'publish',
                'post_type'    => 'insurance_product',
                'menu_order'   => intval($prod['order']),
            ));

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_plused_product_order', $prod['order']);
                update_post_meta($post_id, '_plused_product_eyebrow', $prod['eyebrow']);
                update_post_meta($post_id, '_plused_product_badge', $prod['badge']);
                update_post_meta($post_id, '_plused_product_form_type', $prod['form_type']);
                update_post_meta($post_id, '_plused_product_highlights', $prod['highlights']);
                update_post_meta($post_id, '_plused_product_cta_text', $prod['cta_text']);
                update_post_meta($post_id, '_plused_product_whatsapp_msg', $prod['whatsapp']);
                update_post_meta($post_id, '_plused_product_video_url', $prod['video_url']);
                update_post_meta($post_id, '_plused_product_poster_url', $prod['poster_url']);
                update_post_meta($post_id, '_plused_product_alignment', $prod['alignment']);
                update_post_meta($post_id, '_plused_product_edevlet_btn', $prod['edevlet_btn']);
                update_post_meta($post_id, '_plused_product_active', '1');
            }
        }
    }

    // 4. SEED DEFAULT FAQS IF EMPTY
    $existing_faqs = get_posts(array(
        'post_type'      => 'insurance_faq',
        'posts_per_page' => 1,
        'post_status'    => 'any',
    ));

    if (empty($existing_faqs)) {
        $default_faqs = array(
            array(
                'question' => 'Teklif almak için hangi bilgiler gerekli?',
                'answer'   => 'Araç sigortalarında (Kasko ve Trafik) araç plakası ve ruhsat sahibi TC/Vergi numarası; konut ve DASK için adres/bina bilgisi ve metrekare; sağlık sigortasında ise yaş, ikamet ili ve poliçe türü tercihiniz yeterlidir.',
                'category' => 'Teklif & Süreç',
                'order'    => 1,
            ),
            array(
                'question' => 'Ruhsat bilgilerimi nereden bulabilirim?',
                'answer'   => 'Fiziki ruhsat belgenizin yanı sıra e-Devlet Kapısı üzerindeki "Araçlarım" hizmetinden adınıza kayıtlı tüm araçların tescil ve ruhsat bilgilerine resmi olarak erişebilirsiniz.',
                'category' => 'Araç Sigortaları',
                'order'    => 2,
            ),
            array(
                'question' => 'Ruhsat fotoğrafını nasıl gönderebilirim?',
                'answer'   => 'Teklif sayfamız üzerinden veya doğrudan resmi WhatsApp hattımıza ruhsatınızın ön yüzünün fotoğrafını gönderebilirsiniz. Danışmanımız bilgileri sisteme işleyecektir.',
                'category' => 'İşlem Kolaylığı',
                'order'    => 3,
            ),
            array(
                'question' => 'e-Devlet bilgilerimi görüyor musunuz?',
                'answer'   => 'Hayır. Sitemizdeki e-Devlet bağlantısı sizi yalnızca resmi turkiye.gov.tr adresine yönlendirir. Sitemizde e-Devlet şifreniz ya da giriş bilgileriniz kesinlikle istenmez ve saklanmaz.',
                'category' => 'Güvenlik & Gizlilik',
                'order'    => 4,
            ),
            array(
                'question' => 'Teklifler ne kadar sürede hazırlanır?',
                'answer'   => 'Bilgileriniz veya ruhsat fotoğrafınız danışmanımıza ulaştıktan sonra, mesai saatleri içinde ortalama 10-15 dakika içerisinde birden fazla şirketin karşılaştırmalı teklif tablosu hazırlanarak size iletilir.',
                'category' => 'Hız & Teslimat',
                'order'    => 5,
            ),
        );

        foreach ($default_faqs as $faq) {
            $post_id = wp_insert_post(array(
                'post_title'   => $faq['question'],
                'post_content' => $faq['answer'],
                'post_status'  => 'publish',
                'post_type'    => 'insurance_faq',
                'menu_order'   => $faq['order'],
            ));

            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, '_plused_faq_category', $faq['category']);
                update_post_meta($post_id, '_plused_faq_order', $faq['order']);
                update_post_meta($post_id, '_plused_faq_active', '1');
            }
        }
    }
}
add_action('after_switch_theme', 'plused_seed_default_data');

// Also ensure pages exist on admin_init if kvkk page is missing
function plused_check_essential_pages_admin() {
    if (is_admin() && current_user_can('manage_options')) {
        if (!get_page_by_path('kvkk-aydinlatma')) {
            plused_seed_default_data();
        }
    }
}
add_action('admin_init', 'plused_check_essential_pages_admin');
