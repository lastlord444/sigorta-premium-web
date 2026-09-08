<?php
/**
 * Template Part: Section About (Manifesto)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$company_name = plused_get_option('company_name', 'PLUSED SİGORTA');
?>
<section id="hakkimizda" class="relative w-full py-28 px-6 bg-navy-950 text-white overflow-hidden" style="padding-top:7rem; padding-bottom:7rem; background:#030712; border-top:1px solid rgba(255,255,255,0.06); position:relative;">
    <div class="container-custom relative z-10 text-center" style="max-width:56rem; margin:auto; text-align:center;">
        <!-- BADGE -->
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-silver-300 mb-8" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); letter-spacing:0.2em; margin-bottom:2rem;">
            <?php echo plused_icon('shield', 'w-3.5 h-3.5 text-electric-light'); ?>
            <span>Biz Kimiz?</span>
        </div>

        <!-- EDITORIAL MANIFESTO -->
        <blockquote class="font-serif text-white font-normal leading-snug mb-10" style="font-size:clamp(1.75rem, 3.5vw, 3rem); line-height:1.35; margin-bottom:2.5rem; font-style:normal;">
            &ldquo;Sigortayı karmaşık maddelerden ibaret görmüyoruz. Görevimiz, ihtiyacınızı anlamak, doğru teminatı bulmak ve ihtiyaç duyduğunuz anda yanınızda olmak.&rdquo;
        </blockquote>

        <!-- SUBTEXT -->
        <p class="text-silver-400 text-sm sm:text-base font-sans max-w-2xl mx-auto leading-relaxed mb-12" style="font-size:1.05rem; line-height:1.8; max-width:42rem; margin:0 auto 3rem auto;">
            <strong><?php echo esc_html($company_name); ?></strong>, tek bir sigorta markasına bağımlı olmadan çalışan, tüm sürecini şeffaflık ve dijital hız ilkeleriyle yöneten bağımsız bir sigorta acentesidir. Risklerinizi analiz eder, poliçenizi optimize ederiz.
        </p>

        <!-- GUIDING PRINCIPLES -->
        <div style="padding-top:2rem; border-top:1px solid rgba(255,255,255,0.08); display:flex; flex-wrap:wrap; justify-content:center; gap:2.5rem; font-size:13px; font-family:var(--font-mono); color:#94A3B8;">
            <div style="display:flex; align-items:center; gap:0.5rem;">
                <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                <span>Birden Fazla Şirketten Teklif</span>
            </div>

            <div style="display:flex; align-items:center; gap:0.5rem;">
                <?php echo plused_icon('check-circle', 'w-4 h-4 text-accent-violet'); ?>
                <span>İhtiyacınıza Uygun Teminat Seçenekleri</span>
            </div>

            <div style="display:flex; align-items:center; gap:0.5rem;">
                <?php echo plused_icon('check-circle', 'w-4 h-4 text-emerald-400'); ?>
                <span>Poliçe Sürecinde Destek</span>
            </div>
        </div>
    </div>
</section>
