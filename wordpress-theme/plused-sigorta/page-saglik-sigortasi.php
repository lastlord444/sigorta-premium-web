<?php
/**
 * Template Name: Sağlık Sigortası Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$theme_uri = get_template_directory_uri();

$saglik_args = array(
    'slug'                     => 'saglik-sigortasi',
    'order'                    => '05',
    'eyebrow'                  => '05 / BİREYSEL & AİLE SAĞLIĞI',
    'badge'                    => 'Özel & Tamamlayıcı Planlar',
    'h1'                       => 'Tamamlayıcı & Özel Sağlık Sigortası',
    'hero_headline'            => 'Sağlığınız söz konusu olduğunda sıra beklemeden, doktorunuzu seçerek tedavi olun.',
    'hero_desc'                => 'Özel hastane ağlarında SGK fark ücreti ödemeden veya özel sağlık planlarıyla doktorunuzu seçerek tedavi olma imkanı. Bütçenize uygun sağlık planını uzman danışmanlarımızla belirleyin.',
    'video_url'                => '',
    'poster_url'               => $theme_uri . '/assets/images/saglik.jpg',
    'what_is_title'            => 'Sağlık Sigortası Nedir? (TSS vs ÖSS)',
    'what_is_desc'             => 'Sağlık Sigortası; kaza veya hastalık sonucu ortaya çıkabilecek muayene, tahlil, ameliyat ve hastane yatış giderlerini güvenceye alan poliçeler bütünüdür. Tamamlayıcı Sağlık Sigortası (TSS), SGK ile anlaşmalı özel sağlık kurumlarında fark ücretlerini poliçe şartları dahilinde karşılarken; Özel Sağlık Sigortası (ÖSS), SGK şartı aranmaksızın özel hastane ve kliniklerde seçilen limit ve katılım payları dahilinde geçerlidir.',
    'what_is_points'           => array(
        'Yalnızca yatarak tedavi veya hem yatarak hem ayakta tedavi paketi seçilebilir.',
        'Poliçe başlangıç tarihinden önce var olan kronik rahatsızlıklar teminat dışıdır.',
        'Belirli planlı ameliyatlar ve doğum teminatı için poliçelerde bekleme süresi uygulanır.',
        'Poliçe şartlarına göre yıllık check-up, mamografi ve diş bakım paketi sunulabilir.',
    ),
    'main_coverages_title'     => 'Temel Teminat Paketleri',
    'main_coverages_subtitle'  => 'Sağlık poliçenizde bütçenize göre tercih edebileceğiniz iki ana güvence çatısı.',
    'main_coverages'           => array(
        array(
            'title' => 'Yatarak Tedavi Teminatı',
            'desc'  => 'Hastanede 24 saati aşan yatış gerektiren cerrahi müdahaleler, ameliyathane, yoğun bakım, oda ve refakatçi giderleri.',
            'icon'  => 'heart-pulse',
        ),
        array(
            'title' => 'Ayakta Tedavi Teminatı',
            'desc'  => 'Doktor muayeneleri, laboratuvar kan testleri, MR, tomografi, ultrason, röntgen ve fizik tedavi masrafları (yıllık kullanım limitli).',
            'icon'  => 'shield',
        ),
        array(
            'title' => 'Kemoterapi, Radyoterapi & Diyaliz',
            'desc'  => 'Uzun süreli ve yüksek maliyetli onkolojik tedavilerin poliçe özel şartları kapsamında kesintisiz temini.',
            'icon'  => 'heart-pulse',
        ),
        array(
            'title' => 'Acil Tıbbi Yardım & Ambulans',
            'desc'  => 'Hayati tehlike arz eden ani kazalarda ve acil durumlarda yerinde müdahale ve donanımlı ambulans sevki.',
            'icon'  => 'shield',
        ),
    ),
    'optional_coverages_title' => 'Opsiyonel & Ek Güvenceler',
    'optional_coverages_subtitle'=> 'Poliçenize dahil ederek ailenizin sağlık konforunu artırabileceğiniz ek avantajlar.',
    'optional_coverages'       => array(
        array(
            'title' => 'Doğum ve Gebelik Teminatı',
            'desc'  => 'Rutin gebelik takipleri, tetkikler ve doğum eyleminin anlaşmalı özel hastanelerde karşılanması (bekleme süresi şartıyla).',
            'icon'  => 'heart-pulse',
        ),
        array(
            'title' => 'Yıllık Check-Up & Diş Paketi',
            'desc'  => 'Poliçenizdeki ek paket şartlarına göre yılda bir kez genel sağlık taraması ve diş bakım desteği sağlanabilir.',
            'icon'  => 'check-circle',
        ),
        array(
            'title' => 'Yurtdışı Tedavi Güvencesi',
            'desc'  => 'Türkiye sınırları dışındaki seyahatlerinizde veya kritik hastalıklarda yabancı uzman merkezlerde tedavi seçeneği.',
            'icon'  => 'briefcase',
        ),
        array(
            'title' => 'Psikolojik Danışmanlık & Diyetisyen',
            'desc'  => 'Poliçe asistans kapsamına göre online veya yüz yüze uzman danışmanlık seans desteği.',
            'icon'  => 'clock',
        ),
    ),
    'who_is_it_for_title'      => 'Sağlık Sigortası Kimler İçin İdealdir?',
    'who_is_it_for'            => array(
        array(
            'title' => 'Bireyler ve Aileler',
            'desc'  => 'Çocuklarının ve kendilerinin sağlığını özel hastane konforu ve hızında güvenceye almak isteyenler.',
            'icon'  => 'heart-pulse',
        ),
        array(
            'title' => 'SGK\'lı Çalışanlar (TSS Avantajı)',
            'desc'  => 'Çok düşük primlerle özel hastanelerde fark ücreti ödemeden tedavi olmak isteyen bordrolu ve Bağkurlular.',
            'icon'  => 'check-circle',
        ),
        array(
            'title' => 'KOBİ ve Şirket Sahipleri',
            'desc'  => 'Çalışanlarının motivasyonunu ve sağlığını kurumsal grup sağlık poliçesiyle desteklemek isteyen işverenler.',
            'icon'  => 'briefcase',
        ),
    ),
    'required_docs_title'      => 'Sağlık Sigortası Teklifi İçin Gerekli Bilgiler',
    'required_docs'            => array(
        'Sigortalanacak Kişilerin Doğum Tarihi (Gün / Ay / Yıl)',
        'İkamet Edilen İl ve İlçe',
        'Poliçe Tercihi (Tamamlayıcı Sağlık mı yoksa Özel Sağlık mı?)',
        'Kapsam Tercihi (Sadece Yatarak Tedavi mi yoksa Ayakta + Yatarak Tedavi mi?)',
    ),
    'show_edevlet'             => false,
    'edevlet_text'             => '',
    'whatsapp_msg'             => 'Merhaba, Sağlık Sigortası için teklif almak istiyorum. Yaş ve ikamet bilgilerimi iletiyorum.',
    'faq_items'                => array(
        array(
            'q' => 'Bekleme süresi nedir ve hangi durumlarda uygulanır?',
            'a' => 'Poliçe tanzim edilmeden önce vücutta var olabilecek bazı kistik oluşumlar, fıtık, bademcik veya planlı ortopedik operasyonlar için şirketler 3 ila 12 ay arasında bekleme süresi uygular. Ani kazalar, kalp krizi gibi acil durumlar ise ilk günden itibaren teminattadır.',
        ),
        array(
            'q' => 'Tamamlayıcı Sağlık Sigortası ile Özel Sağlık Sigortası arasındaki fark nedir?',
            'a' => 'TSS, SGK\'nızın geçerli olduğu anlaşmalı özel hastanelerde devreye girer ve SGK fark ücretini poliçe şartları dahilinde karşılar; primi son derece ekonomiktir. ÖSS ise SGK şartı olmaksızın seçkin özel hastanelerde seçtiğiniz limitlerle geçerlidir.',
        ),
        array(
            'q' => 'Ömür Boyu Yenileme Güvencesi (ÖBYG) nasıl kazanılır?',
            'a' => 'Genellikle kesintisiz 3 veya 4 yıl aynı sigorta şirketinde poliçesini yenileyen ve belirli hasar/prim oranını aşmayan sigortalılara şirket şartları uyarınca ÖBYG hakkı tanınabilir. Bu hak kazanıldıktan sonra poliçe özel şartları korunur.',
        ),
        array(
            'q' => 'Vergi indirimi avantajı var mıdır?',
            'a' => 'Evet. Ücretli çalışanlar ve gelir vergisi mükellefleri, kendisi ve ailesi için ödediği sağlık sigortası primlerini yasal sınırlar dahilinde vergi matrahından düşerek %15 ile %40 arasında vergi avantajı sağlayabilirler.',
        ),
    ),
    'final_cta_title'          => 'Ailenizin sağlığını ertelemeyin, size uygun sağlık planını seçelim.',
    'final_cta_desc'           => 'Önde gelen sağlık sigortası şirketlerinin güncel hastane ağlarını ve primlerini birlikte inceleyelim.',
    'form_type'                => 'saglik',
);

get_template_part('template-parts/product', 'landing-template', $saglik_args);

get_footer();
