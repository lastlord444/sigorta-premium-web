<?php
/**
 * Template Part: Section Why Us
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$advantages = array(
    array(
        'number' => '01',
        'tag'    => 'ÇOKLU SEÇENEK',
        'title'  => 'Birden fazla şirketten teklif',
        'desc'   => 'Tek bir şirkete bağlı kalmadan, birden fazla güvenilir sigorta şirketinin teklif seçeneklerini değerlendirir, bütçenize ve ihtiyacınıza uygun alternatifleri sunarız.',
    ),
    array(
        'number' => '02',
        'tag'    => 'ÖZEL KORUMA',
        'title'  => 'İhtiyacınıza uygun teminat seçenekleri',
        'desc'   => 'Gereksiz maddeler yerine yaşam tarzınıza ve gerçek risklerinize odaklanan teminat seçenekleri tasarlarız.',
    ),
    array(
        'number' => '03',
        'tag'    => 'KESİNTİSİZ İLETİŞİM',
        'title'  => 'Poliçe sürecinde destek',
        'desc'   => 'Teklif aşamasından poliçe tanzimine, vade takibinden yenileme dönemlerine kadar danışmanınızla doğrudan iletişimde olursunuz.',
    ),
    array(
        'number' => '04',
        'tag'    => 'DOĞRUDAN YÖNLENDİRME',
        'title'  => 'Hasar sürecinde danışmanlık',
        'desc'   => 'Kaza ve hasar durumunda dosyanızı takip eden ve gerekli adımları koordine eden uzman danışmanınızla irtibatta olursunuz.',
    ),
);

$metrics = array(
    array('value' => 'Çoklu', 'label' => 'Şirket Teklifleri', 'sub' => 'Birden fazla şirketten seçenek'),
    array('value' => 'Esnek', 'label' => 'Teminat Seçenekleri', 'sub' => 'İhtiyacınıza uygun koruma'),
    array('value' => 'Birebir', 'label' => 'Danışmanlık Desteği', 'sub' => 'Poliçe sürecinde destek'),
    array('value' => 'Kesintisiz', 'label' => 'Hasar Yönlendirmesi', 'sub' => 'Adım adım dosya takibi'),
);
?>
<section id="neden-biz" class="relative w-full py-28 px-6 bg-navy-950 text-white overflow-hidden" style="padding-top:7rem; padding-bottom:7rem; background:#030712; border-top:1px solid rgba(255,255,255,0.06); position:relative;">
    <!-- SUBTLE BACKGROUND GLOW -->
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); width:700px; height:500px; background:rgba(0,102,255,0.05); border-radius:50%; filter:blur(160px); pointer-events:none;"></div>

    <div class="container-custom relative z-10">
        <!-- HEADER -->
        <div style="max-width:48rem; margin-bottom:5rem;">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-mono uppercase tracking-widest text-silver-300 mb-6" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); letter-spacing:0.2em; margin-bottom:1.5rem;">
                <?php echo plused_icon('check-circle', 'w-3.5 h-3.5 text-electric-light'); ?>
                <span>Felsefemiz & Yaklaşımımız</span>
            </div>

            <h2 class="font-serif text-white font-medium" style="font-size:clamp(2rem, 4vw, 3.75rem); line-height:1.15; margin-bottom:1.5rem;">
                Poliçe satmıyoruz. <span class="gradient-silver-text" style="display:block; font-style:italic;">Doğru teminatı buluyoruz.</span>
            </h2>

            <p class="text-silver-400 text-base sm:text-lg font-sans leading-relaxed" style="font-size:1.1rem; line-height:1.7;">
                Klasik acentelerin komisyon odaklı ezberlerinden ayrılıyoruz. Sizin risk haritanızı çıkarıyor, birden fazla sigorta şirketinin tekliflerini inceleyerek gerçekten ihtiyaç duyduğunuz korumayı inşa ediyoruz.
            </p>
        </div>

        <!-- 4 ADVANTAGES GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-20" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:1.5rem; margin-bottom:5rem;">
            <?php foreach ($advantages as $adv) : ?>
            <div class="group relative p-8 sm:p-10 rounded-3xl" style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.07); border-radius:1.5rem; padding:2.5rem; transition:all 0.3s ease;">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:2rem;">
                    <div style="width:48px; height:48px; border-radius:14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center; color:#38BDF8;">
                        <?php echo plused_icon('shield', 'w-5 h-5'); ?>
                    </div>
                    <span class="font-mono text-sm tracking-widest text-silver-500" style="letter-spacing:0.15em;">
                        <?php echo esc_html($adv['number']); ?>
                    </span>
                </div>

                <span class="font-mono text-xs uppercase tracking-widest text-silver-400 mb-2 block" style="font-size:11px; letter-spacing:0.2em; display:block; margin-bottom:0.5rem;">
                    <?php echo esc_html($adv['tag']); ?>
                </span>

                <h3 class="font-serif text-2xl text-white font-medium mb-3" style="font-size:1.5rem; margin-bottom:0.75rem;">
                    <?php echo esc_html($adv['title']); ?>
                </h3>

                <p class="text-silver-400 text-sm sm:text-base font-sans leading-relaxed" style="font-size:0.95rem; line-height:1.7;">
                    <?php echo esc_html($adv['desc']); ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- TRUST METRICS BANNER -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 p-8 sm:p-10 rounded-3xl" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:1.5rem; padding:2.5rem; border-radius:1.5rem; background:linear-gradient(to bottom, rgba(255,255,255,0.04), rgba(255,255,255,0.01)); border:1px solid rgba(255,255,255,0.1); backdrop-filter:blur(16px);">
            <?php foreach ($metrics as $metric) : ?>
            <div style="display:flex; flex-direction:column;">
                <span class="font-serif text-3xl sm:text-4xl lg:text-5xl font-semibold text-white tracking-tight mb-2 gradient-silver-text" style="font-size:clamp(1.75rem, 3vw, 2.5rem); margin-bottom:0.5rem;">
                    <?php echo esc_html($metric['value']); ?>
                </span>
                <span class="text-sm font-medium text-silver-200" style="font-size:14px; font-weight:600; color:#E2E8F0;">
                    <?php echo esc_html($metric['label']); ?>
                </span>
                <span class="text-xs text-silver-500 mt-1 font-sans" style="font-size:12px; color:#64748B;">
                    <?php echo esc_html($metric['sub']); ?>
                </span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
