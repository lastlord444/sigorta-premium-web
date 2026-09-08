<?php
/**
 * Template Name: Trafik Sigortası Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

$trafik_args = array(
    'slug'                     => 'trafik-sigortasi',
    'order'                    => '02',
    'eyebrow'                  => '02 / ZORUNLU MALİ MESULİYET',
    'badge'                    => 'Yasal Zorunlu Teminat',
    'h1'                       => 'Zorunlu Trafik Sigortası',
    'hero_headline'            => 'Yola çıktığınız her anda yasal ve mali güvenceniz hazır olsun.',
    'hero_desc'                => '2918 sayılı Karayolları Trafik Kanunu uyarınca trafiğe çıkan her motorlu aracın yaptırmakla yükümlü olduğu zorunlu mali güvence. Teklif seçenekleri için acentemizle iletişime geçebilirsiniz.',
    'video_url'                => $theme_uri . '/assets/videos/kasko-car.mp4',
    'poster_url'               => $theme_uri . '/assets/images/lambo.jpg',
    'what_is_title'            => 'Zorunlu Trafik Sigortası Nedir?',
    'what_is_desc'             => 'Zorunlu Trafik Sigortası, aracınızın karıştığı bir kazada kusurunuz oranında karşı tarafa ve üçüncü şahıslara verdiğiniz maddi, bedeni ve vefat hasarlarını devletçe belirlenen yasal tavan limitler dahilinde tazmin eden bir sorumluluk sigortasıdır. Kendi aracınızdaki hasarları karşılamaz; sizi karşı tarafa karşı doğabilecek ağır tazminat yükümlülüklerinden korur.',
    'what_is_points'           => array(
        'Trafiğe çıkan tüm motorlu taşıtlar için yasal olarak zorunludur.',
        'Kusur oranınız nispetinde karşı tarafın aracındaki ve mülkündeki maddi zararları tazmin eder.',
        'Bedeni sakatlık, tedavi ve vefat hallerinde üçüncü şahısların yasal hak sahiplerine tazminat sağlar.',
        'Poliçesiz araçlar tespit edildiğinde trafikten men edilir ve gecikme cezası (sürprim) uygulanır.',
    ),
    'main_coverages_title'     => 'Yasal Teminat Grupları',
    'main_coverages_subtitle'  => 'Zorunlu trafik sigortasında mevzuat standartları uyarınca belirlenen teminat limitleri.',
    'main_coverages'           => array(
        array(
            'title' => 'Maddi Zararlar Teminatı',
            'desc'  => 'Kazada karşı tarafın aracına veya üçüncü şahısların malına (bariyer, dükkan, elektrik direği vb.) verilen hasarlar.',
            'icon'  => 'car',
        ),
        array(
            'title' => 'Sağlık Giderleri Teminatı',
            'desc'  => 'Kazada zarar gören üçüncü kişilerin ilk yardım, muayene ve hastane masraflarının karşılanması.',
            'icon'  => 'heart-pulse',
        ),
        array(
            'title' => 'Sürekli Sakatlık Teminatı',
            'desc'  => 'Üçüncü şahısların kısmen veya tamamen çalışma gücünü kaybetmesi halinde hak sahiplerine ödenen yasal tazminat.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Ölüm Teminatı & Destekten Yoksun Kalma',
            'desc'  => 'Kaza sebebiyle vefat halinde, müteveffanın bakmakla yükümlü olduğu yakınlarına ödenen kanuni tazminat.',
            'icon'  => 'briefcase',
        ),
    ),
    'optional_coverages_title' => 'Ek Teminat & Asistans Seçenekleri',
    'optional_coverages_subtitle'=> 'Trafik poliçenizi ek güvence ve yol yardım alternatifleriyle zenginleştirin.',
    'optional_coverages'       => array(
        array(
            'title' => 'Ek İMM (İhtiyari Mali Mesuliyet)',
            'desc'  => 'Karşı tarafın lüks araç olması durumunda yasal tavanı aşan hasarları cebinizden ödememeniz için ek limit.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Poliçeye Bağlı Çekici & Yol Yardım',
            'desc'  => 'Poliçenizde yer alan asistans paketine bağlı olarak kaza veya arıza durumunda çekici hizmeti sunulabilir.',
            'icon'  => 'car',
        ),
        array(
            'title' => 'Sürücü Ferdi Kaza',
            'desc'  => 'Kusurlu sürücünün kendi vefat veya sürekli sakatlık risklerine karşı ek nakdi koruma.',
            'icon'  => 'heart-pulse',
        ),
        array(
            'title' => 'Hukuksal Koruma',
            'desc'  => 'Trafik kazası kaynaklı davalarda ve uyuşmazlıklarda avukatlık ve mahkeme harçları gideri desteği.',
            'icon'  => 'check-circle',
        ),
    ),
    'who_is_it_for_title'      => 'Kimler Trafik Sigortası Yaptırmalıdır?',
    'who_is_it_for'            => array(
        array(
            'title' => 'Tüm Motorlu Araç Sahipleri',
            'desc'  => 'Otomobil, motosiklet, kamyonet, ticari taksi veya otobüs sahibi olan her birey ve tüzel kişilik.',
            'icon'  => 'car',
        ),
        array(
            'title' => 'Yeni Araç Satın Alanlar',
            'desc'  => 'Noter satışından itibaren yasal süre içinde zorunlu trafik poliçesini tanzim ettirmek zorunda olanlar.',
            'icon'  => 'check-circle',
        ),
        array(
            'title' => 'Poliçe Vadesi Yaklaşanlar',
            'desc'  => 'Gecikme cezası ve basamak kaybı yaşamamak adına vade bitiminden önce teklif seçeneklerini değerlendirenler.',
            'icon'  => 'clock',
        ),
    ),
    'required_docs_title'      => 'Trafik Teklifi İçin Gerekli Bilgiler',
    'required_docs'            => array(
        'Araç Plakası',
        'Ruhsat Sahibinin T.C. Kimlik Numarası veya Vergi Numarası',
        'Yeni tescil ise Noter Satış Sözleşmesi Numarası',
    ),
    'show_edevlet'             => true,
    'edevlet_text'             => 'Ruhsat Bilgilerimi e-Devlet\'ten Bul',
    'whatsapp_msg'             => 'Merhaba, Trafik Sigortası için teklif seçeneklerini öğrenmek istiyorum. Plaka ve TC bilgilerimi iletiyorum.',
    'faq_items'                => array(
        array(
            'q' => 'Trafik sigortası basamak sistemi nasıl işler?',
            'a' => 'Trafik sigortasında 0 ile 8 arasında basamaklar bulunur. Sisteme ilk kez giren sürücü 4. basamaktan başlar. Kazasız geçen her yıl basamak yükselir ve indirim oranı artar (%50\'ye varan indirim). Kaza yapıldığında ise basamak düşer ve prime sürprim (zam) uygulanır.',
        ),
        array(
            'q' => 'Trafik sigortası kendi aracımdaki hasarı karşılar mı?',
            'a' => 'Hayır. Zorunlu trafik sigortası yalnızca sizin kusurunuzla karşı tarafa verdiğiniz zararları yasal limitler dahilinde öder. Kendi aracınızdaki hasarlar için Kasko Sigortası yaptırmanız gerekir.',
        ),
        array(
            'q' => 'Poliçe vadesini geçirirsem ne olur?',
            'a' => 'Vadesi geçen her 30 gün için poliçe primine gecikme sürprimi (ceza faizi) eklenir. Ayrıca trafikte yapılan kontrollerde sigortasız araçlar bağlanarak otoparka çekilir ve idari para cezası uygulanır.',
        ),
        array(
            'q' => 'Araç satıldığında eski trafik sigortası ne olur?',
            'a' => 'Noter satışından sonra eski poliçeniz iptal edilir ve kullanılmayan günlerin prim iadesi hesabınıza aktarılır. Yeni alıcı kendi adına tescil tarihinden itibaren trafik sigortası tanzim ettirmek zorundadır.',
        ),
    ),
    'final_cta_title'          => 'Trafik sigortanızı geciktirmeden yenileyin.',
    'final_cta_desc'           => 'Teklif seçenekleri için bizimle iletişime geçebilir, süreci hemen başlatabilirsiniz.',
    'form_type'                => 'trafik',
);

get_template_part('template-parts/product', 'landing-template', $trafik_args);

get_footer();
