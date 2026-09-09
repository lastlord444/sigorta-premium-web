<?php
/**
 * Template Part: Section Partners Marquee
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!plused_is_feature_enabled('partners_marquee', false)) {
    return;
}

$all_partners = array(
    array('name' => 'Allianz Sigorta', 'cat' => 'Acente Portföyü'),
    array('name' => 'Axa Sigorta', 'cat' => 'Acente Portföyü'),
    array('name' => 'Anadolu Sigorta', 'cat' => 'Acente Portföyü'),
    array('name' => 'Türkiye Sigorta', 'cat' => 'Acente Portföyü'),
    array('name' => 'Sompo Sigorta', 'cat' => 'Acente Portföyü'),
    array('name' => 'AkSigorta', 'cat' => 'Acente Portföyü'),
    array('name' => 'HDI Sigorta', 'cat' => 'Acente Portföyü'),
    array('name' => 'Doğa Sigorta', 'cat' => 'Acente Portföyü'),
);
?>
<section id="sirketler" class="relative w-full py-16 bg-navy-950 overflow-hidden" style="padding-top:4rem; padding-bottom:4rem; background:#030712; border-top:1px solid rgba(255,255,255,0.06); border-bottom:1px solid rgba(255,255,255,0.06); position:relative;">
    <div class="container-custom mb-8 text-center" style="margin-bottom:2rem; text-align:center;">
        <p class="font-mono text-xs uppercase tracking-widest text-silver-400" style="letter-spacing:0.25em; font-size:11px;">
            Sigorta Şirketleri
        </p>
        <p class="text-xs text-silver-500 mt-1" style="font-size:12px; color:#64748B;">
            Birden fazla şirketten teklif seçenekleri
        </p>
    </div>

    <!-- MARQUEE TRACK WITH GRADIENT MASKS -->
    <div class="relative w-full overflow-hidden flex items-center" style="position:relative; width:100%; overflow:hidden;">
        <div style="position:absolute; left:0; top:0; bottom:0; width:10rem; background:linear-gradient(to right, #030712, transparent); z-index:10; pointer-events:none;"></div>
        <div style="position:absolute; right:0; top:0; bottom:0; width:10rem; background:linear-gradient(to left, #030712, transparent); z-index:10; pointer-events:none;"></div>

        <div class="animate-marquee" style="gap:2rem; padding:0.5rem 0;">
            <?php foreach ($all_partners as $p) : ?>
            <div style="display:inline-flex; align-items:center; gap:0.75rem; padding:0.75rem 1.5rem; border-radius:1rem; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.07); white-space:nowrap;">
                <div style="width:32px; height:32px; border-radius:8px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center; color:#94A3B8;">
                    <?php echo plused_icon('building', 'w-4 h-4'); ?>
                </div>
                <div style="display:flex; flex-direction:column; text-align:left;">
                    <span class="font-serif text-sm tracking-wider text-silver-200 font-medium" style="font-size:13px; color:#E2E8F0;">
                        <?php echo esc_html($p['name']); ?>
                    </span>
                    <span class="font-mono text-[10px] tracking-wider text-silver-500 uppercase" style="font-size:10px; color:#64748B;">
                        <?php echo esc_html($p['cat']); ?>
                    </span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
