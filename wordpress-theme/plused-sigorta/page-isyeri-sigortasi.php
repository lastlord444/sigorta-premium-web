<?php
/**
 * Template Name: İşyeri Sigortası Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

$isyeri_args = array(
    'slug'                     => 'isyeri-sigortasi',
    'order'                    => '06',
    'eyebrow'                  => '06 / KURUMSAL & TİCARİ GÜVENCE',
    'badge'                    => 'KOBİ & İşletme Koruma',
    'h1'                       => 'İşyeri & Ticari Risk Sigortası',
    'hero_headline'            => 'Yılların emeğiyle büyüttüğünüz işletmenizi öngörülemeyen risklere karşı koruyun.',
    'hero_desc'                => 'Dükkan, ofis, atölye veya fabrikanızın demirbaşlarını, emtiasını, çalışanlarını ve iş durması risklerini çok yönlü ticari paket poliçesiyle teminat altına alın. Faaliyet sektörünüze özel risk analiziyle doğru korumayı inşa edin.',
    'video_url'                => '',
    'poster_url'               => $theme_uri . '/assets/images/is-yeri.jpg',
    'what_is_title'            => 'İşyeri Sigortası Nedir?',
    'what_is_desc'             => 'İşyeri Sigortası; ticari faaliyette bulunan her ölçekteki işletmenin binasını, içindeki demirbaş mobilya ve makinelerini, hammadde ve ticari mallarını (emtia) yangın, patlama, hırsızlık, dahili su baskını, cam kırılması ve iş durması gibi çoklu risklere karşı tek bir sözleşmeyle güvenceye alan kapsamlı bir ticari paket poliçesidir.',
    'what_is_points'           => array(
        'Hem mülk sahibi olan işletmeler hem de kiracı olan esnaf ve şirketler için düzenlenebilir.',
        'Stoktaki ticari mallar (emtia), makineler ve elektronik ofis cihazları koruma altındadır.',
        'İş durması ve ciro kaybı klozu ile hasar sonrası ticari devamlılık desteklenir.',
        'İşveren mali mesuliyet ve üçüncü şahıs sorumluluk teminatları entegre edilebilir.',
    ),
    'main_coverages_title'     => 'Ana Teminat Kalemleri',
    'main_coverages_subtitle'  => 'Ticari faaliyetinizin fiziki varlıklarını koruyan standart teminatlar.',
    'main_coverages'           => array(
        array(
            'title' => 'Yangın, Patlama & Duman',
            'desc'  => 'Elektrik kontağı, kazan patlaması veya çevre yangınları sonucu işyerinde ve mallarda oluşan tahribat.',
            'icon'  => 'building',
        ),
        array(
            'title' => 'Dahili Su & Sel / Su Baskını',
            'desc'  => 'Şiddetli yağışlar, dere taşması veya bina içi tesisat patlaması sebebiyle bodrum ve zemin katlardaki stok hasarları.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Hırsızlık & Kasa Teminatı',
            'desc'  => 'İşyerine girilerek ticari malların, demirbaşların veya çelik kasadaki nakit/kıymetli evrakın çalınması.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Fırtına & Cam Kırılması',
            'desc'  => 'Tabela uçması, vitrin camlarının kırılması ve çatı hasarlarının poliçe limitleri dahilinde onarımı.',
            'icon'  => 'home',
        ),
    ),
    'optional_coverages_title' => 'Kurumsal & Operasyonel Ek Teminatlar',
    'optional_coverages_subtitle'=> 'Sektörünüze ve iş hacminize göre eklenebilen kritik ticari korumalar.',
    'optional_coverages'       => array(
        array(
            'title' => 'İş Durması & Kâr Kaybı',
            'desc'  => 'Hasar sonrası faaliyetin zorunlu durması halinde sabit giderleri (kira, personel maaşı) ve ciro kaybını telafi eden teminat.',
            'icon'  => 'briefcase',
        ),
        array(
            'title' => 'İşveren Mali Mesuliyet',
            'desc'  => 'İşyerinde meydana gelebilecek iş kazalarında çalışanların veya yakınlarının talep edebileceği yasal tazminatlar.',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Makine Kırılması & Elektronik Cihaz',
            'desc'  => 'Üretim makinelerinde veya sunucu/bilgisayar sistemlerinde elektriksel/mekanik arızalar sonucu oluşan onarım masrafları.',
            'icon'  => 'clock',
        ),
        array(
            'title' => 'Üçüncü Şahıs Mali Mesuliyet',
            'desc'  => 'İşyerinizi ziyaret eden müşterilerin veya çevredeki komşu işletmelerin uğrayabileceği bedeni/maddi hasar sorumluluğu.',
            'icon'  => 'check-circle',
        ),
    ),
    'who_is_it_for_title'      => 'Kimler İşyeri Sigortası Yaptırmalıdır?',
    'who_is_it_for'            => array(
        array(
            'title' => 'Perakende Mağaza & Dükkanlar',
            'desc'  => 'Giyim, gıda, elektronik ve kozmetik gibi müşteri sirkülasyonu ve vitrin camı olan cadde/AVM işletmeleri.',
            'icon'  => 'building',
        ),
        array(
            'title' => 'Ofisler ve Danışmanlık Firmaları',
            'desc'  => 'Bilişim, hukuk, mali müşavirlik gibi demirbaş donanımı ve sunucu altyapısı yüksek profesyonel hizmet ofisleri.',
            'icon'  => 'briefcase',
        ),
        array(
            'title' => 'Üretim Atölyeleri & Depolar',
            'desc'  => 'Hammadde stoku, ağır makineler ve sevkiyat trafiği bulunan imalathane ve lojistik merkezleri.',
            'icon'  => 'shield',
        ),
    ),
    'required_docs_title'      => 'İşyeri Sigortası Teklifi İçin Gerekli Bilgiler',
    'required_docs'            => array(
        'İşletmenin Faaliyet Konusu ve Sektörü (NACE Kodu veya Açıklama)',
        'İşyerinin Açık Adresi, Katı ve Yapı Tarzı',
        'Demirbaş, Makine ve Emtia (Stok) Yaklaşık Toplam Bedelleri',
        'Mülk Sahibi misiniz yoksa Kiracı mısınız?',
    ),
    'show_edevlet'             => false,
    'edevlet_text'             => '',
    'whatsapp_msg'             => 'Merhaba, İşyeri Sigortası için teklif almak istiyorum. Faaliyet alanımı ve adresimi iletiyorum.',
    'faq_items'                => array(
        array(
            'q' => 'Kiracıyım, işyeri paket sigortası yaptırabilir miyim?',
            'a' => 'Evet. Kiracılar işyeri sigortasında "Bina" teminatı hariç tutularak; sadece içerisindeki makinelerini, dekorasyon masraflarını, demirbaşlarını, emtiasını ve mal sahibine karşı sorumluluklarını güvence altına alabilirler.',
        ),
        array(
            'q' => 'İş durması teminatı nasıl hesaplanır?',
            'a' => 'İş durması teminatı, hasar öncesi mali tablolarınız ve kâr marjınız baz alınarak, işletmenin yeniden faaliyete geçeceği azami tazminat süresi (örneğin 3, 6 veya 12 ay) üzerinden hesaplanır.',
        ),
        array(
            'q' => 'Emtia bedeli yıl içinde artarsa ne yapılmalıdır?',
            'a' => 'Mevsimsel olarak veya enflasyon sebebiyle stok miktarınız arttığında acentenize bilgi vererek "Zeyilname" (ek sözleşme) ile teminat bedelinizi güncelleyebilirsiniz; böylece eksik sigorta riskinin önüne geçilir.',
        ),
        array(
            'q' => 'Kasa teminatı mesai dışındaki nakit parayı kapsar mı?',
            'a' => 'Poliçede belirlenen kilitli çelik kasa ve güvenlik standartlarına (alarm, kamera) uyulması şartıyla, mesai saatleri dışındaki kasa nakit varlığı poliçe limitleri dahilinde güvence altındadır.',
        ),
    ),
    'final_cta_title'          => 'İşletmenizin geleceğini güvence altına alalım.',
    'final_cta_desc'           => 'Uzman risk danışmanımız faaliyet konunuza uygun teminat ve muafiyet dengesini analiz etsin.',
    'form_type'                => 'isyeri',
);

get_template_part('template-parts/product', 'landing-template', $isyeri_args);

get_footer();
