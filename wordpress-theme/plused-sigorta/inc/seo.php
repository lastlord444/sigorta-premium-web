<?php
/**
 * Dynamic SEO Engine: Titles, Meta Descriptions, Canonical & OpenGraph
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Customize Document Title
 */
function plused_seo_document_title_parts($title) {
    $company_name = plused_get_option('company_name', 'PLUSED SİGORTA');
    $tagline      = plused_get_option('tagline', 'Bağımsız & Premium Sigorta Danışmanlığı');

    if (is_front_page() || is_home()) {
        $title['title']   = $company_name;
        $title['tagline'] = $tagline;
        return $title;
    }

    if (is_page('kasko')) {
        $title['title'] = 'Kasko Sigortası';
    } elseif (is_page('trafik-sigortasi')) {
        $title['title'] = 'Trafik Sigortası';
    } elseif (is_page('konut-sigortasi')) {
        $title['title'] = 'Konut Sigortası';
    } elseif (is_page('dask')) {
        $title['title'] = 'DASK Deprem Sigortası';
    } elseif (is_page('saglik-sigortasi')) {
        $title['title'] = 'Sağlık Sigortası';
    } elseif (is_page('isyeri-sigortasi')) {
        $title['title'] = 'İşyeri Sigortası';
    } elseif (is_page('teklif-al')) {
        $title['title'] = 'Sigorta Teklifi Al';
    } elseif (is_page('hasar-destek')) {
        $title['title'] = 'Hasar Destek';
    } elseif (is_page('hakkimizda')) {
        $title['title'] = 'Hakkımızda';
    } elseif (is_page('sss')) {
        $title['title'] = 'Sıkça Sorulan Sorular';
    } elseif (is_page('iletisim')) {
        $title['title'] = 'İletişim';
    } elseif (is_singular('insurance_product')) {
        $title['title'] = get_the_title() . ' Sigortası';
    }

    $title['site'] = $company_name;
    return $title;
}
add_filter('document_title_parts', 'plused_seo_document_title_parts');

/**
 * 2. Get SEO Description for current view
 */
function plused_get_seo_description() {
    if (is_front_page() || is_home()) {
        return 'Plused Sigorta ile aracınızı, evinizi, sağlığınızı ve işyerinizi ihtiyacınıza uygun sigorta teklif seçenekleriyle güvence altına alın.';
    }

    if (is_page('kasko')) {
        return 'Kaza, yangın, hırsızlık ve hasar risklerine karşı aracınızı koruyun. İhtiyacınıza uygun teminat seçenekleriyle kasko sigortası teklifi alın.';
    } elseif (is_page('trafik-sigortasi')) {
        return 'Zorunlu trafik sigortanızı geciktirmeden yenileyin. Teklif seçenekleri ve poliçeye göre teminat alternatifleri.';
    } elseif (is_page('konut-sigortasi')) {
        return 'Evinizi ve eşyalarınızı yangın, dahili su sızıntısı ve hırsızlığa karşı teminat altına alan konut sigortası seçenekleri.';
    } elseif (is_page('dask')) {
        return 'Zorunlu Deprem Sigortası (DASK) ile binanızı deprem ve ilişkili risklere karşı yasal mevzuat standartlarında güvenceye alın.';
    } elseif (is_page('saglik-sigortasi')) {
        return 'Özel hastane ağlarında tedavi imkanı sunan tamamlayıcı ve özel sağlık sigortası teklif seçenekleri.';
    } elseif (is_page('isyeri-sigortasi')) {
        return 'İşletmenizi yangın, su baskını, hırsızlık ve ticari risklere karşı koruyan işyeri sigortası çözümleri.';
    } elseif (is_page('teklif-al')) {
        return 'İhtiyacınız olan sigorta türünü seçin, bağımsız acente danışmanınız size uygun teklif alternatiflerini hazırlasın.';
    } elseif (is_page('hasar-destek')) {
        return 'Hasar Sürecinde Destek Rehberi. Kaza durumunda yapılması gerekenler, Kaza Tespit Tutanağı ve dosya takibi danışmanlığı.';
    } elseif (is_page('hakkimizda')) {
        return 'Plused Sigorta bağımsız acente felsefesi. İhtiyaca odaklanan şeffaf ve güvenilir sigortacılık anlayışı.';
    } elseif (is_page('sss')) {
        return 'Sigorta poliçeleri, prim hesabı, teminat kapsamları ve hasar süreçleri hakkında sıkça sorulan sorular.';
    } elseif (is_page('iletisim')) {
        return 'Plused Sigorta iletişim bilgileri, telefon hatları ve doğrudan WhatsApp destek kanalları.';
    } elseif (is_singular('insurance_product')) {
        $desc = get_post_meta(get_the_ID(), '_plused_product_highlights', true);
        if (!empty($desc)) {
            return wp_strip_all_tags(substr($desc, 0, 160));
        }
        return get_the_title() . ' sigortası hakkında detaylı bilgi ve teklif seçenekleri.';
    }

    return get_bloginfo('description');
}

/**
 * 3. Print Meta Tags (Description, Canonical, OpenGraph) in <head>
 */
function plused_seo_head_tags() {
    $desc         = plused_get_seo_description();
    $company_name = plused_get_option('company_name', 'PLUSED SİGORTA');
    $theme_uri    = get_template_directory_uri();
    $og_image     = $theme_uri . '/assets/images/porshce.jpg';

    // Canonical URL
    if (is_front_page()) {
        $canonical = home_url('/');
    } elseif (is_singular() || is_page()) {
        $canonical = get_permalink();
    } else {
        $canonical = home_url($_SERVER['REQUEST_URI'] ?? '');
    }
    ?>
    <!-- PLUSED SEO ENGINE -->
    <meta name="description" content="<?php echo esc_attr($desc); ?>">
    <link rel="canonical" href="<?php echo esc_url($canonical); ?>">
    
    <!-- OPEN GRAPH (FACEBOOK & WHATSAPP SHARING) -->
    <meta property="og:locale" content="tr_TR">
    <meta property="og:type" content="<?php echo is_front_page() ? 'website' : 'article'; ?>">
    <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
    <meta property="og:description" content="<?php echo esc_attr($desc); ?>">
    <meta property="og:url" content="<?php echo esc_url($canonical); ?>">
    <meta property="og:site_name" content="<?php echo esc_attr($company_name); ?>">
    <meta property="og:image" content="<?php echo esc_url($og_image); ?>">

    <!-- TWITTER CARDS -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($desc); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($og_image); ?>">
    <?php
}
add_action('wp_head', 'plused_seo_head_tags', 1);
