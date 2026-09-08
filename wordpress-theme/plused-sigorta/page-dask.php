<?php
/**
 * Template Name: DASK Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

$dask_args = array(
    'slug'                     => 'dask',
    'order'                    => '04',
    'eyebrow'                  => '04 / ZORUNLU DEPREM TEMİNATI',
    'badge'                    => 'Kanuni Zorunlu Afet Fonu',
    'h1'                       => 'DASK Zorunlu Deprem Sigortası',
    'hero_headline'            => 'Beklenmeyene karşı hazırlıklı olun; mülkünüzü deprem riskine karşı tescilleyin.',
    'hero_desc'                => '587 sayılı Kanun Hükmünde Kararname ve 6305 sayılı Afet Sigortaları Kanunu uyarınca meskenler için yasal zorunluluk olan DASK poliçenizi güncel metrekare teminat tavanlarıyla sorgulayın ve yenileyin.',
    'video_url'                => $theme_uri . '/assets/videos/konut-dask.mp4',
    'poster_url'               => $theme_uri . '/assets/images/villajpg.jpg',
    'what_is_title'            => 'DASK Nedir?',
    'what_is_desc'             => 'DASK (Doğal Afet Sigortaları Kurumu), depremin doğrudan veya dolaylı (deprem sonucu meydana gelen yangın, patlama, dev dalga/tsunami veya yer kayması) olarak mesken nitelikli binalarda neden olacağı maddi zararları, poliçede belirtilen limitler dahilinde nakden karşılayan zorunlu bir devlet fonu güvencesidir.',
    'what_is_points'           => array(
        'Belediye sınırları içindeki tüm tapulu meskenler için yasal olarak zorunludur.',
        'Elektrik, su ve doğalgaz abonelik işlemlerinde ve tapu tescillerinde zorunlu belgedir.',
        'Teminat bedeli, binanın brüt metrekaresi ve yapı tarzı üzerinden resmi tarife ile belirlenir.',
        'DASK tavanını aşan hasarlar için "Tamamlayıcı Konut Sigortası" yapılması önerilir.',
    ),
    'main_coverages_title'     => 'Kanuni Teminat Kapsamı',
    'main_coverages_subtitle'  => 'DASK poliçesi ile korunan bina ana yapı elemanları.',
    'main_coverages'           => array(
        array(
            'title' => 'Temeller & Ana Duvarlar',
            'desc'  => 'Binanın taşıyıcı kolonları, kirişleri, temeli ve ana taşıyıcı duvarlarındaki deprem tahribatı.',
            'icon'  => 'building',
        ),
        array(
            'title' => 'Tavan ve Tabanlar',
            'desc'  => 'Katlar arasındaki döşemeler, tavanlar, tabanlar ve daireler arası ortak ayrım duvarları.',
            'icon'  => 'home',
        ),
        array(
            'title' => 'Merdivenler & Asansör Boşlukları',
            'desc'  => 'Apartman ortak alan merdivenleri, sahanlıklar, koridorlar ve asansör şaft duvarları.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Deprem Yangını & Tsunami',
            'desc'  => 'Deprem sarsıntısı sonucu ortaya çıkan yangın, gaz infilakı ve deniz kabarması zararları.',
            'icon'  => 'shield',
        ),
    ),
    'optional_coverages_title' => 'DASK İle Birlikte Tamamlayıcı Güvenceler',
    'optional_coverages_subtitle'=> 'DASK\'ın karşılamadığı kalemler için acentemizden alabileceğiniz ek paketler.',
    'optional_coverages'       => array(
        array(
            'title' => 'DASK Üstü Enflasyon Koruması',
            'desc'  => 'Binanın yeniden inşa maliyetinin resmi DASK tavanını aştığı kısımları güvenceye alma.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Ev Eşyası Teminatı',
            'desc'  => 'DASK eşyaları kapsamaz; depremde kırılan veya zarar gören eşyalarınız için konut eşya paketi.',
            'icon'  => 'home',
        ),
        array(
            'title' => 'Enkaz Kaldırma Masrafları',
            'desc'  => 'Yıkım sonrası moloz ve enkazın taşınması için gereken masrafları karşılayan ek teminat.',
            'icon'  => 'building',
        ),
        array(
            'title' => 'Geçici İkamet & Kira Desteği',
            'desc'  => 'Ev tamir edilene veya yeniden yapılana kadar barınma giderlerini telafi eden asistans.',
            'icon'  => 'clock',
        ),
    ),
    'who_is_it_for_title'      => 'DASK Kimler İçin Zorunludur?',
    'who_is_it_for'            => array(
        array(
            'title' => 'Kat İrtifakı / Kat Mülkiyeti Malikleri',
            'desc'  => 'Tapuda mesken (konut) olarak kayıtlı bağımsız bölümlerin tüm malikleri.',
            'icon'  => 'building',
        ),
        array(
            'title' => 'Abonelik Açtırmak İsteyenler',
            'desc'  => 'Yeni taşındığı evde elektrik, doğalgaz ve su aboneliği başlatacak tüm vatandaşlar.',
            'icon'  => 'check-circle',
        ),
        array(
            'title' => 'Tapu Devri & Kredi Kullananlar',
            'desc'  => 'Konut alım-satımında tapu müdürlüklerinde ve banka konut kredilerinde yasal şarttır.',
            'icon'  => 'briefcase',
        ),
    ),
    'required_docs_title'      => 'DASK Sorgulama ve Tanzimi İçin Gerekli Bilgiler',
    'required_docs'            => array(
        'UAVT Adres Kodu (Ulusal Adres Veri Tabanı 10 haneli kod)',
        'Mülk Sahibinin T.C. Kimlik Numarası ve İletişim Telefonu',
        'Tapu Bilgileri (Ada, Parsel, Pafta veya Bağımsız Bölüm No)',
        'Binanın İnşa Yılı, Toplam Kat Sayısı ve Dairenin Brüt Metrekaresi',
    ),
    'show_edevlet'             => false,
    'edevlet_text'             => '',
    'whatsapp_msg'             => 'Merhaba, DASK (Zorunlu Deprem Sigortası) poliçemi sorgulamak ve yenilemek istiyorum. Adres bilgilerimi iletiyorum.',
    'faq_items'                => array(
        array(
            'q' => 'UAVT Adres Kodu nedir ve nereden öğrenilir?',
            'a' => 'UAVT Kodu, Nüfus ve Vatandaşlık İşleri sisteminde Türkiye\'deki her konut için üretilmiş 10 haneli özel koddur. e-Devlet üzerinden veya elektrik/doğalgaz faturalarınızdan öğrenebilirsiniz. Bilgilerinizi WhatsApp üzerinden iletebilirsiniz, teklif sürecinizi başlatalım.',
        ),
        array(
            'q' => 'DASK tavan teminatı ne kadardır?',
            'a' => 'DASK azami teminat tutarı her yıl inşaat maliyet artışlarına göre resmi mevzuat tarifelerince güncellenir. Güncel teminat limitlerini aşan bina değerleri için konut sigortası devreye alınır.',
        ),
        array(
            'q' => 'Poliçemi yenilemezsem ne olur?',
            'a' => 'DASK poliçesini her yıl düzenli yenilemeyen mülk sahipleri, abonelik ve resmi tapu işlemlerinde kısıtlama ile karşılaşır ve olası bir depremde tazminat hakkından mahrum kalır. Düzenli yenileyenlere ise %10 veya %20 yenileme indirimi uygulanır.',
        ),
        array(
            'q' => 'Köy evleri veya kooperatifler DASK yaptırabilir mi?',
            'a' => 'Belediye teşkilatı bulunan alanlardaki tüm yapılar DASK kapsamındadır. Köy tüzel kişiliğine bağlı yerleşimlerdeki yapılar için ise isteğe bağlı yangın/deprem konut poliçeleri düzenlenebilmektedir.',
        ),
    ),
    'final_cta_title'          => 'DASK poliçenizi yenileyin, depreme karşı güvencenizi tazeleyin.',
    'final_cta_desc'           => 'UAVT kodunuz veya adres bilginizle teklif sürecinizi başlatalım, resmi poliçenizi hazırlayalım.',
    'form_type'                => 'dask',
);

get_template_part('template-parts/product', 'landing-template', $dask_args);

get_footer();
