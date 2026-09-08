<?php
/**
 * Template Part: Section Categories (6 Sigorta Kategorisi Grid)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$categories = array(
    array(
        'slug'    => 'kasko',
        'url'     => home_url('/kasko/'),
        'order'   => '01',
        'title'   => 'Kasko',
        'badge'   => 'Kasko Güvencesi',
        'desc'    => 'Çarpma, hırsızlık, yangın ve ikame araç alternatifleriyle aracınıza koruma seçenekleri.',
        'icon'    => 'car',
    ),
    array(
        'slug'    => 'trafik-sigortasi',
        'url'     => home_url('/trafik-sigortasi/'),
        'order'   => '02',
        'title'   => 'Trafik Sigortası',
        'badge'   => 'Zorunlu Mali Mesuliyet',
        'desc'    => 'Karşı tarafa verilebilecek maddi ve bedeni hasarlara karşı yasal güvence ve poliçeye göre yol yardım imkanları.',
        'icon'    => 'shield',
    ),
    array(
        'slug'    => 'konut-sigortasi',
        'url'     => home_url('/konut-sigortasi/'),
        'order'   => '03',
        'title'   => 'Konut Sigortası',
        'badge'   => 'Bina & Eşya Paketi',
        'desc'    => 'Yangın, dahili su sızıntıları, hırsızlık ve poliçeye bağlı asistans hizmetleri seçenekleri.',
        'icon'    => 'home',
    ),
    array(
        'slug'    => 'dask',
        'url'     => home_url('/dask/'),
        'order'   => '04',
        'title'   => 'DASK',
        'badge'   => 'Zorunlu Deprem',
        'desc'    => 'Deprem ve deprem kaynaklı risklere karşı binanızı güvenceye alan kanuni afet sigortası.',
        'icon'    => 'building',
    ),
    array(
        'slug'    => 'saglik-sigortasi',
        'url'     => home_url('/saglik-sigortasi/'),
        'order'   => '05',
        'title'   => 'Sağlık Sigortası',
        'badge'   => 'Tamamlayıcı & Özel',
        'desc'    => 'Özel hastane ağlarında sıra beklemeden, doktorunuzu seçerek tedavi olma imkanı.',
        'icon'    => 'heart-pulse',
    ),
    array(
        'slug'    => 'isyeri-sigortasi',
        'url'     => home_url('/isyeri-sigortasi/'),
        'order'   => '06',
        'title'   => 'İşyeri Sigortası',
        'badge'   => 'Ticari Risk & KOBİ',
        'desc'    => 'Demirbaş, stok emtiası, çalışanlar ve iş durması risklerine karşı entegre kurumsal koruma.',
        'icon'    => 'briefcase',
    ),
);
?>

<section id="sigortalar" class="relative w-full py-20 sm:py-24 px-6 bg-navy-950 text-white" style="background:#030712; border-top:1px solid rgba(255,255,255,0.06);">
    <div class="container-custom">
        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12" style="display:flex; flex-wrap:wrap; justify-content:space-between; align-items:flex-end; gap:1.5rem; margin-bottom:3rem;">
            <div>
                <div class="inline-flex items-center gap-2 text-xs font-mono tracking-widest text-electric-light uppercase mb-2" style="letter-spacing:0.25em;">
                    <?php echo plused_icon('shield', 'w-3.5 h-3.5'); ?>
                    <span>Güvence Portföyümüz</span>
                </div>
                <h2 class="font-serif text-white font-medium" style="font-size:clamp(1.75rem, 3.5vw, 2.75rem); line-height:1.2;">
                    İhtiyacınıza Özel Sigorta Çözümleri
                </h2>
            </div>
            <p class="text-silver-400 font-sans text-sm max-w-md" style="line-height:1.6;">
                Her ürün için hazırlanan detaylı teminat rehberlerini inceleyin veya doğrudan teklif sürecinizi başlatın.
            </p>
        </div>

        <!-- 6 CATEGORIES GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(min(100%, 260px), 1fr)); gap:1.5rem;">
            <?php foreach ($categories as $cat) : ?>
            <a href="<?php echo esc_url($cat['url']); ?>" class="group block text-decoration-none" style="text-decoration:none; min-width:0;">
                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:clamp(1.25rem, 3vw, 1.75rem); min-width:0; height:100%; display:flex; flex-direction:column; justify-content:space-between; transition:all 0.3s cubic-bezier(0.16, 1, 0.3, 1);" class="hover:border-blue-500/50 hover:bg-white/[0.04]">
                    <div>
                        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
                            <div style="width:44px; height:44px; border-radius:12px; background:rgba(0,102,255,0.1); border:1px solid rgba(0,102,255,0.25); display:flex; align-items:center; justify-content:center; color:#38BDF8;">
                                <?php echo plused_icon($cat['icon'], 'w-5 h-5'); ?>
                            </div>
                            <span style="font-family:var(--font-mono); font-size:11px; color:#64748B; letter-spacing:0.1em;">
                                <?php echo esc_html($cat['order']); ?>
                            </span>
                        </div>

                        <div style="display:inline-block; padding:0.2rem 0.6rem; border-radius:6px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); font-family:var(--font-mono); font-size:10px; text-transform:uppercase; color:#94A3B8; margin-bottom:0.75rem;">
                            <?php echo esc_html($cat['badge']); ?>
                        </div>

                        <h3 class="font-serif text-white font-medium text-xl mb-2 group-hover:text-blue-400 transition-colors">
                            <?php echo esc_html($cat['title']); ?>
                        </h3>

                        <p class="font-sans text-silver-400 text-xs sm:text-sm leading-relaxed mb-6">
                            <?php echo esc_html($cat['desc']); ?>
                        </p>
                    </div>

                    <div style="display:flex; align-items:center; gap:0.4rem; font-family:var(--font-mono); font-size:12px; font-weight:600; color:#38BDF8;">
                        <span>İncele & Teklif Al</span>
                        <?php echo plused_icon('arrow-right', 'w-3.5 h-3.5'); ?>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
