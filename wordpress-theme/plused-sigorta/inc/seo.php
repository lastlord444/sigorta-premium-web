<?php
/**
 * Dynamic White-Label SEO Engine: Titles, Meta Descriptions, Canonical, OpenGraph,
 * Schema.org InsuranceAgency JSON-LD & Marketing Pixels (GA4, Meta, Ads)
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
    $tagline      = plused_get_option('tagline', 'Premium Sigorta Danışmanlığı');
    $custom_title = trim(plused_get_option('seo_site_title', ''));

    if (is_front_page() || is_home()) {
        if (!empty($custom_title)) {
            $title['title'] = $custom_title;
            unset($title['tagline']);
            return $title;
        }
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
    $company_name = plused_get_option('company_name', 'PLUSED SİGORTA');
    $custom_desc  = trim(plused_get_option('seo_meta_description', ''));

    if (is_front_page() || is_home()) {
        if (!empty($custom_desc)) {
            return esc_attr($custom_desc);
        }
        return sprintf('%s ile aracınızı, evinizi, sağlığınızı ve işyerinizi ihtiyacınıza uygun sigorta teklif seçenekleriyle güvence altına alın.', $company_name);
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
        return 'İhtiyacınız olan sigorta türünü seçin, acente danışmanınız size uygun teklif alternatiflerini hazırlasın.';
    } elseif (is_page('hasar-destek')) {
        return 'Hasar Sürecinde Destek Rehberi. Kaza durumunda yapılması gerekenler, Kaza Tespit Tutanağı ve dosya takibi danışmanlığı.';
    } elseif (is_page('hakkimizda')) {
        return sprintf('%s kurumsal yaklaşımı. İhtiyaca odaklanan şeffaf ve güvenilir bağımsız sigortacılık anlayışı.', $company_name);
    } elseif (is_page('sss')) {
        return 'Sigorta poliçeleri, prim hesabı, teminat kapsamları ve hasar süreçleri hakkında sıkça sorulan sorular.';
    } elseif (is_page('iletisim')) {
        return sprintf('%s iletişim bilgileri, telefon hatları ve doğrudan WhatsApp destek kanalları.', $company_name);
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
 * 3. Print Meta Tags (Description, Canonical, OpenGraph, Twitter) in <head>
 */
function plused_seo_head_tags() {
    $desc         = plused_get_seo_description();
    $company_name = plused_get_option('company_name', 'PLUSED SİGORTA');
    $theme_uri    = get_template_directory_uri();
    
    // OG Image fallback logic
    $custom_og = trim(plused_get_option('seo_og_image', ''));
    if (!empty($custom_og)) {
        $og_image = $custom_og;
    } else {
        $custom_logo = trim(plused_get_option('logo_url', ''));
        $og_image = !empty($custom_logo) ? $custom_logo : ($theme_uri . '/assets/images/porshce.jpg');
    }

    // Canonical URL
    if (is_front_page()) {
        $canonical = home_url('/');
    } elseif (is_singular() || is_page()) {
        $canonical = get_permalink();
    } else {
        $canonical = home_url($_SERVER['REQUEST_URI'] ?? '');
    }
    ?>
    <!-- WHITE-LABEL SEO ENGINE -->
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

/**
 * 4. Output Schema.org InsuranceAgency JSON-LD Structured Data
 */
function plused_seo_schema_jsonld() {
    if (!plused_is_feature_enabled('advanced_seo', true)) {
        return;
    }

    $company_name = plused_get_option('company_name', 'PLUSED SİGORTA');
    $legal_title  = trim(plused_get_option('corporate_legal_title', ''));
    $agency_name  = trim(plused_get_option('corporate_agency_name', ''));
    $address      = trim(plused_get_option('corporate_address', plused_get_option('address', '')));
    $phone        = trim(plused_get_option('corporate_phone', plused_get_display_phone()));
    $email        = trim(plused_get_option('corporate_email', plused_get_option('email', '')));
    $working_hours= trim(plused_get_option('working_hours', ''));
    $logo_url     = trim(plused_get_option('logo_url', ''));
    $site_url     = home_url('/');

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'InsuranceAgency',
        '@id'         => esc_url($site_url . '#insuranceagency'),
        'name'        => !empty($agency_name) ? $agency_name : $company_name,
        'legalName'   => !empty($legal_title) ? $legal_title : $company_name,
        'url'         => esc_url($site_url),
        'description' => plused_get_seo_description(),
        'priceRange'  => '$$',
    );

    if (!empty($logo_url)) {
        $schema['logo'] = esc_url($logo_url);
        $schema['image'] = esc_url($logo_url);
    }
    if (!empty($phone)) {
        $schema['telephone'] = esc_html($phone);
    }
    if (!empty($email)) {
        $schema['email'] = esc_html($email);
    }
    if (!empty($address)) {
        $schema['address'] = array(
            '@type'          => 'PostalAddress',
            'streetAddress'  => esc_html($address),
            'addressCountry' => 'TR',
        );
    }
    if (!empty($working_hours)) {
        $schema['openingHours'] = esc_html($working_hours);
    }

    // Social accounts
    $same_as = array();
    foreach (array('instagram', 'facebook', 'linkedin', 'x_twitter') as $soc) {
        $soc_url = trim(plused_get_option($soc, ''));
        if (!empty($soc_url)) {
            $same_as[] = esc_url($soc_url);
        }
    }
    if (!empty($same_as)) {
        $schema['sameAs'] = $same_as;
    }

    echo "\n<!-- SCHEMA.ORG INSURANCE AGENCY JSON-LD -->\n";
    echo '<script type="application/ld+json">' . "\n";
    echo wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo "\n</script>\n";
}
add_action('wp_head', 'plused_seo_schema_jsonld', 3);

/**
 * 5. Output Marketing Tracking Codes (GA4, Meta Pixel, Google Ads, GSC)
 */
function plused_seo_marketing_tags() {
    if (!plused_is_feature_enabled('analytics', true)) {
        return;
    }

    // Google Search Console Verification
    $gsc_code = trim(plused_get_option('gsc_verification_code', ''));
    if (!empty($gsc_code)) {
        if (preg_match('/content=["\']([^"\']+)["\']/', $gsc_code, $matches)) {
            $gsc_code = $matches[1];
        }
        echo '<meta name="google-site-verification" content="' . esc_attr($gsc_code) . '">' . "\n";
    }

    // Google Analytics 4 (GA4)
    $ga4_id = trim(plused_get_option('ga4_measurement_id', ''));
    if (!empty($ga4_id) && preg_match('/^[A-Za-z0-9_-]+$/', $ga4_id)) {
        $ga4_id_esc = esc_attr($ga4_id);
        ?>
        <!-- Google Analytics 4 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga4_id_esc; ?>"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', '<?php echo $ga4_id_esc; ?>');
        </script>
        <?php
    }

    // Google Ads Conversion Tag
    $gads_id = trim(plused_get_option('google_ads_id', ''));
    if (!empty($gads_id) && preg_match('/^[A-Za-z0-9_-]+$/', $gads_id)) {
        $gads_id_esc = esc_attr($gads_id);
        ?>
        <!-- Google Ads -->
        <script>
          if (typeof gtag !== 'undefined') {
            gtag('config', '<?php echo $gads_id_esc; ?>');
          }
        </script>
        <?php
    }

    // Meta Pixel (Facebook)
    $meta_pixel_id = trim(plused_get_option('meta_pixel_id', ''));
    if (!empty($meta_pixel_id) && preg_match('/^[0-9]+$/', $meta_pixel_id)) {
        $pixel_id_esc = esc_attr($meta_pixel_id);
        ?>
        <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo $pixel_id_esc; ?>');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=<?php echo $pixel_id_esc; ?>&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->
        <?php
    }
}
add_action('wp_head', 'plused_seo_marketing_tags', 4);
