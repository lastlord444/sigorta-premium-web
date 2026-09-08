<?php
/**
 * Template Name: Kasko Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

$kasko_args = array(
    'slug'                     => 'kasko',
    'order'                    => '01',
    'eyebrow'                  => '01 / KASKO SİGORTASI',
    'badge'                    => 'Kasko Güvence Paketi',
    'h1'                       => 'Kasko Sigortası',
    'hero_headline'            => 'Aracınızı değil, yoldaki hareket özgürlüğünüzü güvenceye alın.',
    'hero_desc'                => 'Kaza, çarpma, yangın ve hırsızlık risklerine karşı aracınızı güvence altına alın. İhtiyacınıza uygun teminat seçenekleriyle poliçenizi belirleyin.',
    'video_url'                => $theme_uri . '/assets/videos/kasko-car.mp4',
    'poster_url'               => $theme_uri . '/assets/images/porshce.jpg',
    'what_is_title'            => 'Kasko Sigortası Nedir?',
    'what_is_desc'             => 'Kasko Sigortası; karayolunda tescilli motorlu aracınızın sizin iradeniz dışında gerçekleşen kazalar, çarpışmalar, yanma, çalınma veya kötü niyetli hareketler neticesinde uğrayacağı maddi zararları tazmin eden isteğe bağlı bir sigorta türüdür. Zorunlu trafik sigortası yalnızca karşı tarafa verilen zararları karşılarken, Kasko doğrudan kendi aracınızın hasarını güvenceye alır.',
    'what_is_points'           => array(
        'Kendi aracınızdaki hasarları poliçe limit ve muafiyetleri dahilinde teminat altına alır.',
        'Yetkili servis ve orijinal parça tercihi poliçe tanzimi sırasında belirlenebilir.',
        'Hasarsız geçen her poliçe dönemi sonrasında kademeli hasarsızlık indirimi hakkı sağlar.',
        'Doğal afetler (sel, su baskını, dolu, fırtına, deprem) kasko paketine dahil edilebilir.',
    ),
    'main_coverages_title'     => 'Ana Teminat Grupları',
    'main_coverages_subtitle'  => 'Kasko poliçelerinde temel güvenceyi oluşturan standart hasar kalemleri.',
    'main_coverages'           => array(
        array(
            'title' => 'Çarpma & Çarpışma',
            'desc'  => 'Hareket veya durma halindeyken gerek diğer araçlarla gerekse sabit cisimlerle gerçekleşen kazalarda araç onarım masrafları.',
            'icon'  => 'car',
        ),
        array(
            'title' => 'Yanma & Yangın',
            'desc'  => 'Aracın kendi mekanik aksamından, harici etkenlerden veya kundaklamadan kaynaklı yangın hasarlarının karşılanması.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Çalınma & Hırsızlık',
            'desc'  => 'Aracın veya araca bağlı fabrika çıkışı orijinal parçaların çalınması veya çalınmaya teşebbüs edilmesi durumundaki kayıplar.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Doğal Afetler & Sel',
            'desc'  => 'Dolu, sel, su baskını, heyelan, fırtına ve deprem gibi doğa kaynaklı hasarların poliçe şartları çerçevesinde temini.',
            'icon'  => 'home',
        ),
    ),
    'optional_coverages_title' => 'Opsiyonel & Ek Teminatlar',
    'optional_coverages_subtitle'=> 'Sürüş alışkanlıklarınıza ve aracınızın değerine göre poliçenize eklenebilen avantajlar.',
    'optional_coverages'       => array(
        array(
            'title' => 'İkame Araç Teminatı',
            'desc'  => 'Kaza sonucu aracınız onarımdayken mobility kaybı yaşamamanız için poliçede belirlenen segmentte geçici araç tahsisi.',
            'icon'  => 'car',
        ),
        array(
            'title' => 'Yüksek / Sınırsız İMM',
            'desc'  => 'Trafik sigortasının yetersiz kaldığı büyük zincirleme veya lüks araç kazalarında üçüncü şahıs mali mesuliyet tavanını artırma imkânı.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Yetkili Servis & Orijinal Parça',
            'desc'  => 'Hasar durumunda aracınızın marka yetkili servislerinde orijinal parçalar ile onarılmasını sağlayan kloz seçenekleri.',
            'icon'  => 'check-circle',
        ),
        array(
            'title' => 'Mini Onarım & Asistans',
            'desc'  => 'Küçük çizik, göçük ve hafif hasarların poliçe asistans şartları dahilinde giderilmesi.',
            'icon'  => 'clock',
        ),
    ),
    'who_is_it_for_title'      => 'Kasko Kimler İçin İdealdir?',
    'who_is_it_for'            => array(
        array(
            'title' => 'Sıfır ve Genç Araç Sahipleri',
            'desc'  => 'Aracın yüksek piyasa değerini ve yetkili servis geçmişini kaza risklerine karşı korumak isteyen sürücüler.',
            'icon'  => 'car',
        ),
        array(
            'title' => 'Şehir İçi Yoğun Trafikte Olanlar',
            'desc'  => 'Metropol trafiğinde ufak sürtmelerden büyük zincirleme kazalara kadar her an risk altında seyahat eden araç sahipleri.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Bütçesini Sürpriz Masraftan Koruyanlar',
            'desc'  => 'Kaza durumunda servis onarım maliyetlerini şahsi bütçesinden karşılamak istemeyen araç sahipleri.',
            'icon'  => 'check-circle',
        ),
    ),
    'required_docs_title'      => 'Kasko Teklifi İçin Gerekli Bilgiler',
    'required_docs'            => array(
        'Araç Plakası (Ruhsattaki tescil plakası)',
        'Ruhsat Sahibinin T.C. Kimlik No veya Şirket Vergi No',
        'Tescil Belge Seri & Sıra Numarası (Ruhsatın sağ altındaki ASBIS kodu)',
    ),
    'show_edevlet'             => true,
    'edevlet_text'             => 'Ruhsat Bilgilerimi e-Devlet\'ten Bul',
    'whatsapp_msg'             => 'Merhaba, Kasko Sigortası için teklif almak istiyorum. Ruhsat bilgilerimi iletiyorum.',
    'faq_items'                => array(
        array(
            'q' => 'Kasko fiyatı nasıl belirlenir?',
            'a' => 'Kasko primi; Türkiye Sigortalar Birliği (TSB) Kasko Değer Listesi, aracın modeli, yaşı, tescil ili, sürücünün hasarsızlık kademesi, seçilen muafiyet oranı ve ikame araç gibi opsiyonel teminatlar doğrultusunda her şirket tarafından bağımsız hesaplanır.',
        ),
        array(
            'q' => 'Hasarsızlık indirimi başka şirkete aktarılır mı?',
            'a' => 'Evet. Tramer / SBM merkezi veri tabanı sayesinde kazandığınız hasarsızlık indirim basamağı, poliçenizi yenilerken farklı bir sigorta şirketine geçseniz dahi korunur ve yeni poliçenize yansıtılır.',
        ),
        array(
            'q' => 'Mini onarım hasarsızlık indirimini bozar mı?',
            'a' => 'Poliçenizde mini onarım klozu mevcutsa ve onarım anlaşmalı merkezlerde kloz limitleri dahilinde yapılıyorsa, hasarsızlık indiriminiz korunabilir.',
        ),
        array(
            'q' => 'İkame araç kaç gün süreyle verilir?',
            'a' => 'Poliçe tercihine göre kaza sonrası ekspertiz onayıyla birlikte genellikle poliçede belirtilen şartlar doğrultusunda geçici ikame araç hakkı tanımlanabilir.',
        ),
    ),
    'final_cta_title'          => 'Aracınız için kasko teklif seçeneklerini hazırlayalım.',
    'final_cta_desc'           => 'Teklif seçenekleri için bizimle iletişime geçebilir, süreci hemen başlatabilirsiniz.',
    'form_type'                => 'kasko',
);

get_template_part('template-parts/product', 'landing-template', $kasko_args);

get_footer();
