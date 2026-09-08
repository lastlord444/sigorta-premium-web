<?php
/**
 * Template Part: Reusable Cinematic Product Landing System
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Expects $args array with product landing configuration
 */
$data = wp_parse_args($args ?? array(), array(
    'slug'                     => 'kasko',
    'order'                    => '01',
    'eyebrow'                  => '01 / KASKO',
    'badge'                    => 'Genişletilmiş Güvence',
    'h1'                       => 'Kasko Sigortası',
    'hero_headline'            => 'Hareket özgürlüğünüzü güvence altına alın.',
    'hero_desc'                => 'Kaza, çarpma, doğal afet, yangın ve hırsızlığa karşı aracınızı koruyun.',
    'video_url'                => '',
    'poster_url'               => '',
    'what_is_title'            => 'Nedir?',
    'what_is_desc'             => '',
    'what_is_points'           => array(),
    'main_coverages_title'     => 'Ana Teminat Grupları',
    'main_coverages_subtitle'  => 'Poliçe şartları ve yasal çerçevede sunulan temel teminatlar.',
    'main_coverages'           => array(),
    'optional_coverages_title' => 'Opsiyonel & Ek Teminatlar',
    'optional_coverages_subtitle'=> 'İhtiyacınıza göre poliçenize eklenebilen esnek koruma seçenekleri.',
    'optional_coverages'       => array(),
    'who_is_it_for_title'      => 'Kimler İçin Uygun?',
    'who_is_it_for'            => array(),
    'required_docs_title'      => 'Teklif İçin Gerekli Bilgiler',
    'required_docs'            => array(),
    'show_edevlet'             => false,
    'edevlet_text'             => 'e-Devlet Araçlarım Üzerinden Bilgileri Gör',
    'whatsapp_msg'             => 'Merhaba, sigorta teklifi almak istiyorum.',
    'faq_items'                => array(),
    'final_cta_title'          => 'Doğru teminatla güvende olun.',
    'final_cta_desc'           => 'Teklif seçenekleri için bizimle iletişime geçebilirsiniz.',
    'form_type'                => 'kasko',
));

// Check if dynamic override exists from CPT insurance_product
$cpt_query = new WP_Query(array(
    'post_type'      => 'insurance_product',
    'name'           => $data['slug'],
    'posts_per_page' => 1,
));

if ($cpt_query->have_posts()) {
    $cpt_query->the_post();
    $cpt_id = get_the_ID();
    $dyn_video    = get_post_meta($cpt_id, '_plused_product_video_url', true);
    $dyn_poster   = get_post_meta($cpt_id, '_plused_product_poster_url', true);
    $dyn_whatsapp = get_post_meta($cpt_id, '_plused_product_whatsapp_msg', true);
    $dyn_badge    = get_post_meta($cpt_id, '_plused_product_badge', true);
    $dyn_eyebrow  = get_post_meta($cpt_id, '_plused_product_eyebrow', true);

    if (!empty($dyn_video))    $data['video_url']    = $dyn_video;
    if (!empty($dyn_poster))   $data['poster_url']   = $dyn_poster;
    if (!empty($dyn_whatsapp)) $data['whatsapp_msg'] = $dyn_whatsapp;
    if (!empty($dyn_badge))    $data['badge']        = $dyn_badge;
    if (!empty($dyn_eyebrow))  $data['eyebrow']      = $dyn_eyebrow;
    wp_reset_postdata();
}

$phone_display = plused_get_display_phone();
$phone_url     = plused_get_phone_url();
$whatsapp_url  = plused_build_whatsapp_link($data['whatsapp_msg']);
$teklif_url    = home_url('/teklif-al/?urun=' . urlencode($data['form_type']));
?>

<article class="relative min-h-screen bg-navy-950 text-white overflow-x-hidden" style="background:#030712;">

    <!-- 1. PRODUCT HERO SECTION -->
    <section class="relative w-full pt-32 sm:pt-40 pb-20 sm:pb-24 overflow-hidden border-b border-white/10" style="padding-top:8rem; padding-bottom:5rem; border-bottom:1px solid rgba(255,255,255,0.08); background:radial-gradient(ellipse at top, #09142E 0%, #030712 70%);">
        
        <!-- Video or Media Atmosphere Backdrop -->
        <?php if (!empty($data['video_url'])) : ?>
            <div class="absolute inset-0 w-full h-full pointer-events-none select-none overflow-hidden opacity-30 z-0">
                <video src="<?php echo esc_url($data['video_url']); ?>" poster="<?php echo esc_url($data['poster_url']); ?>" muted autoplay playsinline loop style="width:100%; height:100%; object-fit:cover; filter:brightness(0.7) blur(1px);"></video>
                <div class="blend-mask-top"></div>
                <div class="blend-mask-bottom"></div>
            </div>
        <?php elseif (!empty($data['poster_url'])) : ?>
            <div class="absolute inset-0 w-full h-full pointer-events-none select-none overflow-hidden opacity-25 z-0" style="background-image:url('<?php echo esc_url($data['poster_url']); ?>'); background-size:cover; background-position:center; filter:brightness(0.7) blur(2px);">
                <div class="blend-mask-top"></div>
                <div class="blend-mask-bottom"></div>
            </div>
        <?php endif; ?>

        <!-- Ambient Glow -->
        <div style="position:absolute; top:20%; left:50%; transform:translateX(-50%); width:650px; height:400px; background:rgba(0,102,255,0.12); border-radius:50%; filter:blur(160px); pointer-events:none;"></div>

        <div class="container-custom relative z-10">
            <!-- Breadcrumbs -->
            <nav aria-label="Breadcrumb" style="margin-bottom:1.5rem; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#94A3B8;">
                <a href="<?php echo esc_url(home_url('/')); ?>" style="color:#94A3B8; text-decoration:none;">Ana Sayfa</a>
                <span style="margin:0 0.5rem; color:rgba(255,255,255,0.3);">/</span>
                <span style="color:#38BDF8;"><?php echo esc_html($data['h1']); ?></span>
            </nav>

            <div style="max-width:54rem;">
                <!-- Eyebrow & Badge -->
                <div style="display:flex; align-items:center; gap:0.75rem; flex-wrap:wrap; margin-bottom:1.25rem;">
                    <span class="font-mono text-xs tracking-widest text-electric-light uppercase font-semibold" style="letter-spacing:0.25em;">
                        <?php echo esc_html($data['eyebrow']); ?>
                    </span>
                    <?php if (!empty($data['badge'])) : ?>
                        <div style="width:1px; height:12px; background:rgba(255,255,255,0.2);"></div>
                        <span style="padding:0.25rem 0.8rem; border-radius:9999px; background:rgba(0,102,255,0.15); border:1px solid rgba(56,189,248,0.3); color:#38BDF8; font-size:11px; font-family:var(--font-mono); text-transform:uppercase; letter-spacing:0.05em;">
                            <?php echo esc_html($data['badge']); ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- H1 Title -->
                <h1 class="font-serif text-white font-medium mb-6" style="font-size:clamp(2.4rem, 5vw, 4.2rem); line-height:1.1; margin-bottom:1.5rem; text-shadow:0 4px 20px rgba(0,0,0,0.8);">
                    <?php echo esc_html($data['h1']); ?>
                </h1>

                <!-- Subtitle / Headline -->
                <p class="font-sans text-silver-200 text-lg sm:text-xl font-normal leading-relaxed mb-8" style="font-size:clamp(1.1rem, 2vw, 1.3rem); line-height:1.6; max-width:44rem; margin-bottom:2rem; text-shadow:0 2px 10px rgba(0,0,0,0.7);">
                    <?php echo esc_html($data['hero_headline']); ?>
                </p>

                <!-- Hero CTA Row -->
                <div style="display:flex; flex-wrap:wrap; align-items:center; gap:1rem; margin-bottom:2rem;">
                    <a href="<?php echo esc_url($teklif_url); ?>" class="btn-primary" style="padding:1rem 2.25rem; font-size:13px;">
                        <span>Teklif Al</span>
                        <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
                    </a>

                    <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary" style="background:rgba(37,211,102,0.1); border-color:rgba(37,211,102,0.3); color:#86EFAC;">
                        <?php echo plused_icon('whatsapp', 'w-4 h-4 text-emerald-400'); ?>
                        <span>WhatsApp'tan Sor</span>
                    </a>

                    <?php if (!empty($data['show_edevlet'])) : ?>
                        <a href="https://www.turkiye.gov.tr/araclarim" target="_blank" rel="noopener noreferrer" class="btn-edevlet">
                            <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#EF4444;"></span>
                            <span><?php echo esc_html($data['edevlet_text']); ?></span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Trust micro-badges -->
                <div style="display:flex; flex-wrap:wrap; align-items:center; gap:1.5rem; font-size:12px; color:#94A3B8; font-family:var(--font-mono);">
                    <div style="display:flex; align-items:center; gap:0.4rem;">
                        <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                        <span>Birden fazla şirketten teklif</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.4rem;">
                        <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                        <span>İhtiyaca uygun teminat</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.4rem;">
                        <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                        <span>Hasar sürecinde doğrudan destek</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. KISA AÇIKLAMA & "NEDİR?" BÖLÜMÜ -->
    <section class="py-20 sm:py-24 px-6 border-b border-white/5" style="padding-top:5rem; padding-bottom:5rem; background:#040918; border-bottom:1px solid rgba(255,255,255,0.06);">
        <div class="container-custom" style="max-width:64rem;">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-7">
                    <div class="inline-flex items-center gap-2 text-xs font-mono tracking-widest text-electric-light uppercase mb-3" style="letter-spacing:0.2em;">
                        <?php echo plused_icon('shield', 'w-3.5 h-3.5'); ?>
                        <span>Temel Tanım & Kapsam</span>
                    </div>
                    <h2 class="font-serif text-white font-medium mb-6" style="font-size:clamp(1.75rem, 3.5vw, 2.75rem); line-height:1.2;">
                        <?php echo esc_html($data['what_is_title']); ?>
                    </h2>
                    <div class="font-sans text-silver-300 text-base sm:text-lg leading-relaxed space-y-4" style="line-height:1.75;">
                        <p><?php echo esc_html($data['what_is_desc']); ?></p>
                        <p style="font-size:14px; color:#94A3B8; font-style:italic;">
                            * Teminat kapsamı, muafiyetler ve istisnalar seçilen sigorta şirketinin poliçe genel ve özel şartları uyarınca geçerlilik kazanır.
                        </p>
                    </div>
                </div>

                <!-- Points Card -->
                <div class="lg:col-span-5">
                    <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.5rem; padding:1.75rem; backdrop-filter:blur(10px);">
                        <h3 class="font-mono text-xs uppercase tracking-widest text-silver-300 mb-4 font-semibold" style="letter-spacing:0.15em;">
                            Önemli Hususlar
                        </h3>
                        <div style="display:flex; flex-direction:column; gap:1rem;">
                            <?php foreach ($data['what_is_points'] as $pt) : ?>
                            <div style="display:flex; align-items:flex-start; gap:0.75rem;">
                                <div style="color:#38BDF8; margin-top:2px; flex-shrink:0;">
                                    <?php echo plused_icon('check-circle', 'w-4 h-4'); ?>
                                </div>
                                <span class="font-sans text-sm text-silver-200" style="line-height:1.5;">
                                    <?php echo esc_html($pt); ?>
                                </span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. ANA TEMİNAT GRUPLARI -->
    <section class="py-20 sm:py-24 px-6 border-b border-white/5" style="padding-top:5.5rem; padding-bottom:5.5rem; background:#030712; border-bottom:1px solid rgba(255,255,255,0.06);">
        <div class="container-custom" style="max-width:68rem;">
            <div style="text-align:center; max-width:44rem; margin:0 auto 3.5rem auto;">
                <div class="inline-flex items-center gap-2 text-xs font-mono tracking-widest text-electric-light uppercase mb-2" style="letter-spacing:0.2em;">
                    <?php echo plused_icon('shield', 'w-3.5 h-3.5'); ?>
                    <span>Standart Teminatlar</span>
                </div>
                <h2 class="font-serif text-white font-medium mb-3" style="font-size:clamp(1.75rem, 3vw, 2.5rem); line-height:1.2;">
                    <?php echo esc_html($data['main_coverages_title']); ?>
                </h2>
                <p class="font-sans text-silver-400 text-sm sm:text-base" style="line-height:1.6;">
                    <?php echo esc_html($data['main_coverages_subtitle']); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:1.25rem;">
                <?php foreach ($data['main_coverages'] as $cov) : ?>
                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:1.75rem; transition:all 0.3s ease; display:flex; flex-direction:column; justify-content:space-between;" class="hover:border-white/20">
                    <div>
                        <div style="width:40px; height:40px; border-radius:10px; background:rgba(0,102,255,0.1); border:1px solid rgba(0,102,255,0.25); display:flex; align-items:center; justify-content:center; color:#38BDF8; margin-bottom:1.25rem;">
                            <?php echo plused_icon($cov['icon'] ?? 'shield', 'w-5 h-5'); ?>
                        </div>
                        <h3 class="font-serif text-white font-medium text-lg mb-2">
                            <?php echo esc_html($cov['title']); ?>
                        </h3>
                        <p class="font-sans text-silver-400 text-xs sm:text-sm leading-relaxed">
                            <?php echo esc_html($cov['desc']); ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 4. OPSİYONEL TEMİNATLAR -->
    <section class="py-20 sm:py-24 px-6 border-b border-white/5" style="padding-top:5.5rem; padding-bottom:5.5rem; background:#060D1F; border-bottom:1px solid rgba(255,255,255,0.06);">
        <div class="container-custom" style="max-width:68rem;">
            <div style="text-align:center; max-width:44rem; margin:0 auto 3.5rem auto;">
                <div class="inline-flex items-center gap-2 text-xs font-mono tracking-widest text-accent-violet uppercase mb-2" style="letter-spacing:0.2em; color:#A78BFA;">
                    <span style="display:inline-block; width:6px; height:6px; border-radius:50%; background:#A78BFA;"></span>
                    <span>Kişiselleştirilebilir Güvenceler</span>
                </div>
                <h2 class="font-serif text-white font-medium mb-3" style="font-size:clamp(1.75rem, 3vw, 2.5rem); line-height:1.2;">
                    <?php echo esc_html($data['optional_coverages_title']); ?>
                </h2>
                <p class="font-sans text-silver-400 text-sm sm:text-base" style="line-height:1.6;">
                    <?php echo esc_html($data['optional_coverages_subtitle']); ?>
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:1.25rem;">
                <?php foreach ($data['optional_coverages'] as $cov) : ?>
                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(139,92,246,0.15); border-radius:1.25rem; padding:1.75rem; display:flex; flex-direction:column; justify-content:space-between;">
                    <div>
                        <div style="width:40px; height:40px; border-radius:10px; background:rgba(139,92,246,0.1); border:1px solid rgba(139,92,246,0.25); display:flex; align-items:center; justify-content:center; color:#A78BFA; margin-bottom:1.25rem;">
                            <?php echo plused_icon($cov['icon'] ?? 'shield', 'w-5 h-5'); ?>
                        </div>
                        <h3 class="font-serif text-white font-medium text-lg mb-2">
                            <?php echo esc_html($cov['title']); ?>
                        </h3>
                        <p class="font-sans text-silver-400 text-xs sm:text-sm leading-relaxed">
                            <?php echo esc_html($cov['desc']); ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 5. KİMLER İÇİN UYGUN? -->
    <section class="py-20 px-6 border-b border-white/5" style="padding-top:5rem; padding-bottom:5rem; background:#030712; border-bottom:1px solid rgba(255,255,255,0.06);">
        <div class="container-custom" style="max-width:60rem;">
            <div style="text-align:center; max-width:40rem; margin:0 auto 3rem auto;">
                <h2 class="font-serif text-white font-medium mb-3" style="font-size:clamp(1.75rem, 3vw, 2.5rem); line-height:1.2;">
                    <?php echo esc_html($data['who_is_it_for_title']); ?>
                </h2>
                <p class="font-sans text-silver-400 text-sm" style="line-height:1.6;">
                    Bu poliçe türü hangi ihtiyaçlara ve yaşam tarzlarına doğrudan hitap ediyor?
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:1.25rem;">
                <?php foreach ($data['who_is_it_for'] as $target) : ?>
                <div style="padding:1.5rem; border-radius:1.25rem; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.07); text-align:left;">
                    <div style="display:inline-flex; align-items:center; justify-content:center; width:36px; height:36px; border-radius:8px; background:rgba(56,189,248,0.1); color:#38BDF8; margin-bottom:1rem;">
                        <?php echo plused_icon($target['icon'] ?? 'check-circle', 'w-4 h-4'); ?>
                    </div>
                    <h3 class="font-serif text-white font-medium text-base mb-2">
                        <?php echo esc_html($target['title']); ?>
                    </h3>
                    <p class="font-sans text-silver-400 text-xs sm:text-sm leading-relaxed">
                        <?php echo esc_html($target['desc']); ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 6. TEKLİF İÇİN GEREKLİ BİLGİLER & CTA BANNER -->
    <section class="py-20 px-6 border-b border-white/5" style="padding-top:5rem; padding-bottom:5rem; background:#080E1B; border-bottom:1px solid rgba(255,255,255,0.06);">
        <div class="container-custom" style="max-width:60rem;">
            <div style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.1); border-radius:1.5rem; padding:clamp(1.5rem, 4vw, 3rem); backdrop-filter:blur(14px);">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                    <div class="md:col-span-7">
                        <span class="font-mono text-xs tracking-widest text-electric-light uppercase font-semibold block mb-2" style="letter-spacing:0.2em; display:block;">
                            Hazırlık Rehberi
                        </span>
                        <h2 class="font-serif text-white font-medium text-2xl sm:text-3xl mb-4">
                            <?php echo esc_html($data['required_docs_title']); ?>
                        </h2>
                        <div style="display:flex; flex-direction:column; gap:0.75rem; margin-bottom:1.5rem;">
                            <?php foreach ($data['required_docs'] as $idx => $doc) : ?>
                            <div style="display:flex; align-items:center; gap:0.75rem;">
                                <span style="display:inline-flex; align-items:center; justify-content:center; width:22px; height:22px; border-radius:50%; background:rgba(0,102,255,0.2); color:#38BDF8; font-size:11px; font-family:var(--font-mono); font-weight:600;">
                                    <?php echo ($idx + 1); ?>
                                </span>
                                <span class="font-sans text-sm text-silver-200">
                                    <?php echo esc_html($doc); ?>
                                </span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Direct Actions -->
                    <div class="md:col-span-5 flex flex-col gap-3" style="display:flex; flex-direction:column; gap:0.75rem;">
                        <a href="<?php echo esc_url($teklif_url); ?>" class="btn-primary" style="width:100%; text-align:center;">
                            <span>Teklif Formunu Doldur</span>
                            <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
                        </a>

                        <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary" style="width:100%; text-align:center; background:rgba(37,211,102,0.1); border-color:rgba(37,211,102,0.3); color:#86EFAC;">
                            <?php echo plused_icon('whatsapp', 'w-4 h-4 text-emerald-400'); ?>
                            <span>WhatsApp İle Hızlı İlet</span>
                        </a>

                        <?php if (!empty($data['show_edevlet'])) : ?>
                        <a href="https://www.turkiye.gov.tr/araclarim" target="_blank" rel="noopener noreferrer" class="btn-edevlet" style="width:100%; justify-content:center;">
                            <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#EF4444;"></span>
                            <span><?php echo esc_html($data['edevlet_text']); ?></span>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. ÜRÜNE ÖZEL SSS -->
    <?php if (!empty($data['faq_items'])) : ?>
    <section class="py-20 sm:py-24 px-6 border-b border-white/5" style="padding-top:5rem; padding-bottom:5rem; background:#030712; border-bottom:1px solid rgba(255,255,255,0.06);">
        <div class="container-custom" style="max-width:52rem; margin:auto;">
            <div style="text-align:center; margin-bottom:3rem;">
                <div class="inline-flex items-center gap-2 text-xs font-mono tracking-widest text-electric-light uppercase mb-2" style="letter-spacing:0.2em;">
                    <?php echo plused_icon('shield', 'w-3.5 h-3.5'); ?>
                    <span>Merak Edilenler</span>
                </div>
                <h2 class="font-serif text-white font-medium" style="font-size:clamp(1.75rem, 3vw, 2.5rem); line-height:1.2;">
                    <?php echo esc_html($data['h1']); ?> Hakkında Sıkça Sorulanlar
                </h2>
            </div>

            <div>
                <?php foreach ($data['faq_items'] as $idx => $f) : ?>
                <div class="accordion-item <?php echo ($idx === 0) ? 'open' : ''; ?>">
                    <button type="button" class="accordion-header">
                        <div style="display:flex; align-items:center; gap:0.75rem;">
                            <span style="font-family:var(--font-mono); font-size:12px; color:#38BDF8; font-weight:600;">
                                <?php echo str_pad((string)($idx + 1), 2, '0', STR_PAD_LEFT); ?>
                            </span>
                            <span style="font-weight:500; font-size:15px; color:#FFFFFF;">
                                <?php echo esc_html($f['q']); ?>
                            </span>
                        </div>
                        <span class="accordion-icon" style="color:#94A3B8; font-size:20px;">
                            <?php echo ($idx === 0) ? '&minus;' : '&#43;'; ?>
                        </span>
                    </button>
                    <div class="accordion-body" style="<?php echo ($idx === 0) ? 'max-height:350px; padding-bottom:1.5rem;' : ''; ?>">
                        <p><?php echo esc_html($f['a']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- 8. SON CTA SECTION -->
    <section class="py-20 sm:py-24 px-6 text-center" style="padding-top:6rem; padding-bottom:6rem; background:radial-gradient(ellipse at bottom, #09142E 0%, #030712 80%);">
        <div class="container-custom" style="max-width:44rem; margin:auto;">
            <h2 class="font-serif text-white font-medium mb-4" style="font-size:clamp(2rem, 4vw, 3.25rem); line-height:1.2;">
                <?php echo esc_html($data['final_cta_title']); ?>
            </h2>
            <p class="font-sans text-silver-300 text-base sm:text-lg mb-8 leading-relaxed">
                <?php echo esc_html($data['final_cta_desc']); ?>
            </p>
            <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:1rem;">
                <a href="<?php echo esc_url($teklif_url); ?>" class="btn-primary" style="padding:1.05rem 2.5rem; font-size:13px;">
                    <span>Hemen Teklif Al</span>
                    <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
                </a>
                <a href="<?php echo esc_url($phone_url); ?>" class="btn-secondary" style="padding:1.05rem 2rem; font-size:13px;">
                    <?php echo plused_icon('phone', 'w-4 h-4 text-emerald-400'); ?>
                    <span><?php echo esc_html($phone_display); ?></span>
                </a>
            </div>
        </div>
    </section>

</article>
