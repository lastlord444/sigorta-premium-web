<?php
/**
 * Template Part: Section Hero & Kasko Narrative
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$options           = get_option('plused_sigorta_options', array());
$hero_eyebrow      = plused_get_option('hero_eyebrow', 'Premium Sigorta Danışmanlığı');
$hero_title        = plused_get_option('hero_title', 'Hayat sürprizlerle dolu. Güvencen hazır olsun.');
$hero_desc         = plused_get_option('hero_desc', 'Aracınızdan evinize, sağlığınızdan iş yerinize kadar değer verdiğiniz her şeyi doğru teminatlarla koruyun.');
$hero_cta_primary  = plused_get_option('hero_cta_primary', 'Teklif Al');
$hero_cta_secondary= plused_get_option('hero_cta_secondary', 'Sigortaları İncele');
$kasko_title       = plused_get_option('hero_kasko_title', 'Hareket özgürlüğünüzü güvence altına alın.');
$kasko_desc        = plused_get_option('hero_kasko_desc', 'Kaza, çarpma, doğal afet, yangın ve hırsızlığa karşı aracınızı tam güvenceye alın. İhtiyacınıza uygun teminat seçenekleriyle standart poliçelerin ötesine geçin.');
$theme_uri         = get_template_directory_uri();
?>
<section id="hero-kasko" class="hero-container">
    <!-- STICKY VIEWPORT (DESKTOP) / NATURAL FULL-HEIGHT (MOBILE) -->
    <div id="hero-sticky" class="hero-sticky-viewport">
        <!-- BACKGROUND VIDEO WRAPPER -->
        <div id="hero-video-wrapper" class="absolute inset-0 w-full h-full pointer-events-none select-none overflow-hidden z-0" style="position:absolute; inset:0; z-index:0;">
            <video
                src="<?php echo esc_url($theme_uri . '/assets/videos/kasko-car.mp4'); ?>"
                poster="<?php echo esc_url($theme_uri . '/assets/images/porshce.jpg'); ?>"
                muted
                autoplay
                playsinline
                loop
                preload="auto"
                style="width:100%; height:100%; object-fit:cover; object-position:center; filter:brightness(0.9) contrast(1.05);"
            ></video>

            <!-- MULTI-LAYER ORGANIC BLEND MASKS (Melts into obsidian dark #030712) -->
            <div class="blend-mask-top"></div>
            <div class="blend-mask-bottom"></div>
            <div class="blend-mask-left"></div>
            <div class="blend-mask-right"></div>
            <div class="blend-mask-radial"></div>

            <!-- Ambient Atmospheric Glow -->
            <div style="position:absolute; top:33%; left:25%; width:500px; height:500px; background:rgba(0,102,255,0.1); border-radius:50%; filter:blur(160px); pointer-events:none;"></div>
            <div style="position:absolute; bottom:25%; right:25%; width:450px; height:450px; background:rgba(139,92,246,0.1); border-radius:50%; filter:blur(170px); pointer-events:none;"></div>
        </div>

        <!-- 1. SIMPLIFIED HERO COMPOSITION -->
        <div id="hero-content" class="relative z-10 max-w-5xl mx-auto px-6 text-center flex flex-col items-center my-auto pt-28 sm:pt-36 pb-12" style="max-width:64rem; margin:auto; padding-top:7rem; padding-bottom:3rem; padding-left:1.5rem; padding-right:1.5rem; position:relative; z-index:10;">
            <h1 class="font-serif text-white font-medium mb-6" style="font-size:clamp(2.2rem, 5.5vw, 4.8rem); line-height:1.1; margin-bottom:1.5rem; text-shadow:0 4px 24px rgba(0,0,0,0.9);">
                <?php echo esc_html($hero_title); ?>
            </h1>

            <p class="text-silver-300 font-sans font-normal leading-relaxed mb-10 text-balance" style="font-size:clamp(1rem, 2vw, 1.25rem); max-width:42rem; margin-bottom:2.5rem; text-shadow:0 2px 12px rgba(0,0,0,0.9);">
                <?php echo esc_html($hero_desc); ?>
            </p>

            <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-5 w-full sm:w-auto" style="display:flex; justify-content:center; gap:1rem;">
                <a href="#teklif-al" class="btn-primary" style="font-size:13px; padding:1.05rem 2.5rem;">
                    <span><?php echo esc_html($hero_cta_primary); ?></span>
                    <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
                </a>

                <a href="#sigortalar" class="btn-secondary" style="font-size:13px; padding:1.05rem 2.25rem;">
                    <span><?php echo esc_html($hero_cta_secondary); ?></span>
                </a>
            </div>
        </div>

        <!-- 2. KASKO REVEAL NARRATIVE (DESKTOP PINNED REVEAL) -->
        <div id="scene-kasko" class="hidden md:flex absolute inset-0 z-20 max-w-5xl mx-auto px-6 flex-col justify-center items-center text-center opacity-0 pointer-events-none pt-24 pb-8" style="position:absolute; inset:0; max-width:64rem; margin:auto; display:none; flex-direction:column; justify-content:center; align-items:center; text-align:center; opacity:0; pointer-events:none; z-index:20; padding-top:6rem;">
            <span class="font-mono text-xs tracking-widest text-electric-light uppercase font-semibold mb-3" style="letter-spacing:0.3em; margin-bottom:0.75rem;">
                01 / KASKO
            </span>

            <h2 class="font-serif text-white font-medium leading-tight mb-5 max-w-3xl" style="font-size:clamp(2rem, 4vw, 3.5rem); margin-bottom:1.25rem; text-shadow:0 4px 24px rgba(0,0,0,0.9);">
                <?php echo esc_html($kasko_title); ?>
            </h2>

            <p class="text-silver-300 font-sans leading-relaxed max-w-2xl mb-8" style="font-size:1.05rem; max-width:42rem; margin-bottom:2rem; text-shadow:0 2px 12px rgba(0,0,0,0.9);">
                <?php echo esc_html($kasko_desc); ?>
            </p>

            <!-- HIGHLIGHT CHIPS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 max-w-xl w-full mb-8 text-left" style="display:grid; grid-template-columns:repeat(2, minmax(0, 1fr)); gap:0.75rem; max-width:36rem; width:100%; margin-bottom:2rem; text-align:left;">
                <div style="display:flex; align-items:center; gap:0.6rem; padding:0.75rem; border-radius:0.75rem; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.1); backdrop-filter:blur(10px);">
                    <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                    <span class="text-xs sm:text-sm text-silver-200 font-sans">Birden fazla şirketten teklif</span>
                </div>
                <div style="display:flex; align-items:center; gap:0.6rem; padding:0.75rem; border-radius:0.75rem; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.1); backdrop-filter:blur(10px);">
                    <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                    <span class="text-xs sm:text-sm text-silver-200 font-sans">İhtiyacınıza uygun teminat seçenekleri</span>
                </div>
                <div style="display:flex; align-items:center; gap:0.6rem; padding:0.75rem; border-radius:0.75rem; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.1); backdrop-filter:blur(10px);">
                    <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                    <span class="text-xs sm:text-sm text-silver-200 font-sans">Poliçe sürecinde destek</span>
                </div>
                <div style="display:flex; align-items:center; gap:0.6rem; padding:0.75rem; border-radius:0.75rem; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.1); backdrop-filter:blur(10px);">
                    <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                    <span class="text-xs sm:text-sm text-silver-200 font-sans">Orijinal parça & servis güvencesi</span>
                </div>
            </div>

            <div class="flex items-center gap-4" style="display:flex; align-items:center; gap:1rem;">
                <button type="button" data-quote-product="kasko" class="btn-primary" style="font-size:12px; padding:0.85rem 2rem;">
                    <span>Kasko Teklifi Al</span>
                    <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
                </button>

                <a href="#sigortalar" class="btn-secondary" style="font-size:12px; padding:0.85rem 1.75rem;">
                    Diğer Sigortaları Gör
                </a>
            </div>
        </div>

        <!-- SCROLL DOWN INDICATOR -->
        <div id="hero-scroll-indicator" class="relative z-10 flex justify-center pb-6" style="position:relative; z-index:10; display:flex; justify-content:center; padding-bottom:1.5rem;">
            <a href="#sigortalar" aria-label="Aşağı kaydır" class="flex flex-col items-center text-silver-400 hover:text-white transition-colors" style="text-decoration:none; display:flex; flex-direction:column; align-items:center;">
                <span class="font-mono text-[10px] tracking-widest uppercase mb-1" style="font-size:10px; letter-spacing:0.25em;">Kaydırın</span>
                <span style="color:#38BDF8; font-size:16px;">&darr;</span>
            </a>
        </div>
    </div>

    <!-- 3. MOBILE KASKO FLOW (NO PIN LOCKING, CLEAN NATURAL MOBILE FLOW) -->
    <div id="scene-kasko-mobile" class="md:hidden relative z-10 w-full py-16 px-6 text-center flex flex-col items-center bg-navy-950 border-t border-white-10" style="padding-top:4rem; padding-bottom:4rem; padding-left:1.5rem; padding-right:1.5rem; border-top:1px solid rgba(255,255,255,0.08);">
        <span class="font-mono text-xs tracking-widest text-electric-light uppercase font-semibold mb-3" style="letter-spacing:0.3em; margin-bottom:0.75rem;">
            01 / KASKO
        </span>

        <h2 class="font-serif text-2xl text-white font-medium mb-4 max-w-sm" style="margin-bottom:1rem;">
            <?php echo esc_html($kasko_title); ?>
        </h2>

        <p class="text-silver-300 text-sm font-sans leading-relaxed mb-6 max-w-sm" style="margin-bottom:1.5rem;">
            <?php echo esc_html($kasko_desc); ?>
        </p>

        <div style="display:flex; flex-direction:column; gap:0.6rem; width:100%; max-width:24rem; margin-bottom:1.5rem; text-align:left;">
            <div style="display:flex; align-items:center; gap:0.5rem; padding:0.65rem; border-radius:0.75rem; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08);">
                <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                <span class="text-xs text-silver-200">Birden fazla şirketten teklif</span>
            </div>
            <div style="display:flex; align-items:center; gap:0.5rem; padding:0.65rem; border-radius:0.75rem; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08);">
                <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                <span class="text-xs text-silver-200">İhtiyacınıza uygun teminat seçenekleri</span>
            </div>
            <div style="display:flex; align-items:center; gap:0.5rem; padding:0.65rem; border-radius:0.75rem; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08);">
                <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                <span class="text-xs text-silver-200">Poliçe sürecinde destek</span>
            </div>
            <div style="display:flex; align-items:center; gap:0.5rem; padding:0.65rem; border-radius:0.75rem; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08);">
                <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                <span class="text-xs text-silver-200">Orijinal parça & servis güvencesi</span>
            </div>
        </div>

        <div style="display:flex; flex-direction:column; gap:0.75rem; width:100%; max-width:24rem;">
            <button type="button" data-quote-product="kasko" class="btn-primary" style="width:100%;">
                <span>Kasko Teklifi Al</span>
                <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
            </button>
            <a href="#sigortalar" class="btn-secondary" style="width:100%; text-align:center;">
                Diğer Sigortaları Gör
            </a>
        </div>
    </div>
</section>
