<?php
/**
 * Template Name: Konut Sigortası Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

$konut_args = array(
    'slug'                     => 'konut-sigortasi',
    'order'                    => '03',
    'eyebrow'                  => '03 / KONUT & YAŞAM ALANI',
    'badge'                    => 'Bina & Eşya Teminatı',
    'h1'                       => 'Konut Sigortası',
    'hero_headline'            => 'Eviniz yalnızca dört duvardan ibaret değildir; anılarınızı ve birikiminizi koruyun.',
    'hero_desc'                => 'Evinizi ve değerli eşyalarınızı yangın, dahili su sızıntıları, hırsızlık ve fırtına risklerine karşı teminat altına alın. Poliçenize göre asistans ve tesisat desteği seçeneklerini değerlendirin.',
    'video_url'                => $theme_uri . '/assets/videos/konut-dask.mp4',
    'poster_url'               => $theme_uri . '/assets/images/villajpg.jpg',
    'what_is_title'            => 'Konut Sigortası Nedir?',
    'what_is_desc'             => 'Konut Sigortası; müstakil ev veya apartman dairesi gibi yaşam alanlarınızı ve içinde yer alan ev eşyalarınızı öngörülemeyen felaketler, tesisat arızaları ve hırsızlık risklerine karşı koruyan isteğe bağlı mülk sigortasıdır. Yalnızca deprem bina hasarını tavan limitine kadar karşılayan DASK\'tan farklı olarak, Konut Sigortası mobilyalarınızı, beyaz eşyalarınızı, su basmalarını ve komşunuza sızabilecek su hasarlarını da teminat kapsamına alır.',
    'what_is_points'           => array(
        'Hem bina ana yapısını hem de içerisindeki taşınır eşyaları koruma altına alır.',
        'Dahili tesisat patlamaları ve üst kattan sızan su hasarlarını karşılar.',
        'Kiracılar için yalnızca eşya teminatlı paket seçeneği sunulabilir.',
        'Komşuluk ve kiracı/ev sahibi karşılıklı mali mesuliyet teminatlarını içerir.',
    ),
    'main_coverages_title'     => 'Ana Teminat Grupları',
    'main_coverages_subtitle'  => 'Konut poliçelerinde temel güvence çatısını oluşturan standart riskler.',
    'main_coverages'           => array(
        array(
            'title' => 'Yangın, Yıldırım, İnfilak',
            'desc'  => 'Evde çıkabilecek yangın, doğalgaz patlaması veya yıldırım düşmesi sonucu bina ve eşyalarda oluşan doğrudan hasarlar.',
            'icon'  => 'home',
        ),
        array(
            'title' => 'Dahili Su & Tesisat Sızıntısı',
            'desc'  => 'Temiz veya pis su borularının patlaması, radyatör sızıntıları veya donma sonucu parke, duvar ve mobilyalarda oluşan hasarlar.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Hırsızlık & Eşya Zararları',
            'desc'  => 'Konuta zorla girilerek eşyaların çalınması veya hırsızlık girişimi sırasında kapı, kilit ve pencerelerde oluşan tahribat.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Fırtına, Kar Ağırlığı & Dolu',
            'desc'  => 'Şiddetli rüzgar, çatı uçması, pencere kırılması ve dolu fırtınası kaynaklı yapısal dış hasarlar.',
            'icon'  => 'building',
        ),
    ),
    'optional_coverages_title' => 'Opsiyonel & Yaşam Kolaylaştıran Teminatlar',
    'optional_coverages_subtitle'=> 'Evinizin ihtiyaçlarına ve bütçenize göre poliçeye eklenebilen ek korumalar.',
    'optional_coverages'       => array(
        array(
            'title' => 'Komşuluk Mali Mesuliyeti',
            'desc'  => 'Evinizdeki su sızıntısı veya yangının komşu dairelere sıçraması durumunda komşunun zararını karşılayan hayati teminat.',
            'icon'  => 'home',
        ),
        array(
            'title' => 'Poliçeye Bağlı Asistans (Çilingir & Tesisat)',
            'desc'  => 'Poliçe asistans şartlarına bağlı olarak anahtar kaybında çilingir ve acil su tesisatı onarım desteği sağlanabilir.',
            'icon'  => 'clock',
        ),
        array(
            'title' => 'Elektronik Cihaz & Beyaz Eşya',
            'desc'  => 'Voltaj dalgalanmaları veya ani arızalar neticesinde buzdolabı, televizyon ve kombi gibi cihazlarda oluşan hasarlar.',
            'icon'  => 'check-circle',
        ),
        array(
            'title' => 'Kira Kaybı & İkametgah Değişimi',
            'desc'  => 'Evin hasar sebebiyle oturulamaz hale gelmesi durumunda geçici otel masrafı veya kira gelir kaybı tazminatı.',
            'icon'  => 'briefcase',
        ),
    ),
    'who_is_it_for_title'      => 'Konut Sigortası Kimler İçin Gereklidir?',
    'who_is_it_for'            => array(
        array(
            'title' => 'Ev Sahipleri',
            'desc'  => 'Bina yatırımlarını ve evlerindeki tüm değerli eşyaları olası risklere karşı güvenceye almak isteyenler.',
            'icon'  => 'home',
        ),
        array(
            'title' => 'Kiracılar (Eşya Paketi)',
            'desc'  => 'Bina yapısından bağımsız olarak, sadece kendi mobilya, elektronik ve giyim eşyalarını korumak isteyen kiracılar.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Yazlık ve İkinci Konut Sahipleri',
            'desc'  => 'Yılın belirli dönemlerinde boş kalan konutlarını su patlaması ve hırsızlık risklerine karşı korumak isteyenler.',
            'icon'  => 'building',
        ),
    ),
    'required_docs_title'      => 'Konut Teklifi İçin Gerekli Bilgiler',
    'required_docs'            => array(
        'Konutun Açık Adresi (İl, İlçe, Mahalle, Bina ve Daire No)',
        'Konutun Brüt Kullanım Alanı (Metrekare cinsinden)',
        'Sigortalanacak Eşyaların Yaklaşık Toplam Rayiç Değeri',
        'Varsa DASK Poliçe Numarası',
    ),
    'show_edevlet'             => false,
    'edevlet_text'             => '',
    'whatsapp_msg'             => 'Merhaba, Konut Sigortası için teklif almak istiyorum. Daire adresimi ve metrekare bilgimi iletiyorum.',
    'faq_items'                => array(
        array(
            'q' => 'DASK varken Konut Sigortası yaptırmak gerekir mi?',
            'a' => 'Evet. DASK yasal bir zorunluluk olup yalnızca depremin binaya verdiği hasarı belirli bir tavan limite kadar karşılar; eşyaları, su baskınlarını, yangını veya hırsızlığı kapsamaz. Konut sigortası ise poliçe şartları çerçevesinde bina ve eşyalarınız için genişletilmiş teminat alternatifleri sunar.',
        ),
        array(
            'q' => 'Kiracıyım, konut sigortası yaptırabilir miyim?',
            'a' => 'Kesinlikle evet. Kiracılar konut sigortasını "Eşya Sigortası" olarak yaptırabilirler. Böylece evdeki eşyalarınız, elektronik cihazlarınız ve ev sahibine veya komşulara karşı doğabilecek mali sorumluluklarınız güvence altına alınır.',
        ),
        array(
            'q' => 'Üst kattan su akması durumunda hasarı kim karşılar?',
            'a' => 'Poliçenizde "Dahili Su" teminatı varsa, acenteniz üzerinden dosya açtırarak tavan ve parke onarımını kendi poliçenizden yaptırabilirsiniz. Sigorta şirketiniz yapılan ödemeyi kusurlu üst kat komşusundan rücu (tahsil) eder.',
        ),
        array(
            'q' => 'Poliçede çilingir hizmeti yer alır mı?',
            'a' => 'Poliçenizdeki konut asistans paketi kapsamına bağlı olarak, acil çilingir ve tesisat müdahaleleri belirlenen limit ve şartlar dahilinde sunulabilir.',
        ),
    ),
    'final_cta_title'          => 'Eviniz ve eşyalarınız için uygun güvenceyi kuralım.',
    'final_cta_desc'           => 'Birden fazla sigorta şirketinin konut paketlerini inceleyip bütçenize uygun teminatı seçelim.',
    'form_type'                => 'konut',
);

get_template_part('template-parts/product', 'landing-template', $konut_args);

get_footer();
