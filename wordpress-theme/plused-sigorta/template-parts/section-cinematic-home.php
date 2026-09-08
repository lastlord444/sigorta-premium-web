<?php
/**
 * Template Part: Section Cinematic Home & DASK (Ana Sayfa Vitrini)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$theme_uri  = get_template_directory_uri();
$home_title = plused_get_option('home_konut_title', 'Eviniz dört duvardan fazlasıdır.');
$home_desc  = plused_get_option('home_konut_desc', 'Evinizi, değerli eşyalarınızı ve anılarınızı yangın, hırsızlık, dahili su sızıntıları ve deprem risklerine karşı teminat altına alın. Poliçenize göre asistans seçeneklerini değerlendirin.');
?>

<section id="sahne-konut-dask" class="relative w-full py-24 sm:py-32 px-6 overflow-hidden border-t border-white/5" style="background:#040918; border-top:1px solid rgba(255,255,255,0.06); position:relative;">
    
    <!-- ATMOSPHERIC VIDEO & BACKGROUND -->
    <div class="absolute inset-0 w-full h-full pointer-events-none select-none overflow-hidden opacity-30 z-0">
        <video src="<?php echo esc_url($theme_uri . '/assets/videos/konut-dask.mp4'); ?>" poster="<?php echo esc_url($theme_uri . '/assets/images/villajpg.jpg'); ?>" muted autoplay playsinline loop style="width:100%; height:100%; object-fit:cover; filter:brightness(0.7);"></video>
        <div class="blend-mask-top"></div>
        <div class="blend-mask-bottom"></div>
        <div class="blend-mask-radial"></div>
    </div>

    <!-- Radiant Glow -->
    <div style="position:absolute; top:40%; right:20%; width:600px; height:500px; background:rgba(139,92,246,0.1); border-radius:50%; filter:blur(180px); pointer-events:none;"></div>

    <div class="container-custom relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-7 lg:col-start-6 lg:text-left">
                <span class="font-mono text-xs tracking-widest text-accent-violet uppercase font-semibold block mb-3" style="letter-spacing:0.25em; color:#A78BFA;">
                    02 / SİNEMATİK VİTRİN: EV & DEPREM
                </span>

                <h2 class="font-serif text-white font-medium mb-6" style="font-size:clamp(2rem, 4vw, 3.5rem); line-height:1.15; text-shadow:0 4px 20px rgba(0,0,0,0.8);">
                    <?php echo esc_html($home_title); ?>
                </h2>

                <p class="text-silver-300 font-sans text-base sm:text-lg leading-relaxed mb-8 max-w-xl" style="line-height:1.7; text-shadow:0 2px 10px rgba(0,0,0,0.8);">
                    <?php echo esc_html($home_desc); ?>
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-8 max-w-lg" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:0.75rem; margin-bottom:2rem;">
                    <div style="display:flex; align-items:center; gap:0.6rem; padding:0.75rem; border-radius:0.75rem; background:rgba(0,0,0,0.6); border:1px solid rgba(255,255,255,0.1); backdrop-filter:blur(8px);">
                        <?php echo plused_icon('check-circle', 'w-4 h-4 text-accent-violet'); ?>
                        <span class="text-xs sm:text-sm text-silver-200">Bina & Eşya Koruma Seçenekleri</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.6rem; padding:0.75rem; border-radius:0.75rem; background:rgba(0,0,0,0.6); border:1px solid rgba(255,255,255,0.1); backdrop-filter:blur(8px);">
                        <?php echo plused_icon('check-circle', 'w-4 h-4 text-accent-violet'); ?>
                        <span class="text-xs sm:text-sm text-silver-200">DASK Deprem Tavanı Güvencesi</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.6rem; padding:0.75rem; border-radius:0.75rem; background:rgba(0,0,0,0.6); border:1px solid rgba(255,255,255,0.1); backdrop-filter:blur(8px);">
                        <?php echo plused_icon('check-circle', 'w-4 h-4 text-accent-violet'); ?>
                        <span class="text-xs sm:text-sm text-silver-200">Komşu & Kiracı Sorumluluğu</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:0.6rem; padding:0.75rem; border-radius:0.75rem; background:rgba(0,0,0,0.6); border:1px solid rgba(255,255,255,0.1); backdrop-filter:blur(8px);">
                        <?php echo plused_icon('check-circle', 'w-4 h-4 text-accent-violet'); ?>
                        <span class="text-xs sm:text-sm text-silver-200">Poliçeye Bağlı Asistans Seçenekleri</span>
                    </div>
                </div>

                <div style="display:flex; flex-wrap:wrap; align-items:center; gap:1rem;">
                    <a href="<?php echo esc_url(home_url('/konut-sigortasi/')); ?>" class="btn-primary" style="padding:1rem 2.25rem;">
                        <span>Konut Sigortası</span>
                        <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
                    </a>
                    <a href="<?php echo esc_url(home_url('/dask/')); ?>" class="btn-secondary">
                        <span>DASK Sigortası</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
