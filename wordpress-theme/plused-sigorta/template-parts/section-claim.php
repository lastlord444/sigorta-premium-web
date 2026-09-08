<?php
/**
 * Template Part: Section Claim Support (Hasar Destek Masası)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$phone_display = plused_get_display_phone();
$phone_url     = plused_get_phone_url();
$whatsapp_url  = plused_build_whatsapp_link('Merhaba, hasar bildirimi yapmak istiyorum. Kaza tutanağımı ve hasar fotoğraflarını iletiyorum.');

$claim_steps = array(
    array(
        'step'  => '01',
        'title' => 'Güvenliği Sağlayın & Fotoğraflayın',
        'desc'  => 'Öncelikle can güvenliğinizi sağlayın ve dörtlülerinizi yakın. Mümkünse araçların konumunu bozmadan geniş açılı fotoğraflarını çekin. Yalnızca uygun maddi hasarlı kazalarda Kaza Tespit Tutanağı\'nı doldurun.',
    ),
    array(
        'step'  => '02',
        'title' => 'Acentenize Bilgi Verin',
        'desc'  => 'Hasar destek hattımızı veya WhatsApp hattımızı arayarak acente danışmanınıza bilgi verin. Poliçeniz kapsamındaki çekici ve servis yönlendirmesini organize edelim.',
    ),
    array(
        'step'  => '03',
        'title' => 'Dosya ve Onarım Takibi',
        'desc'  => 'Eksper atanması, dosya açılışı, ikame araç temini ve sigorta şirketi onay sürecini baştan sona acenteniz olarak bizzat takip edelim.',
    ),
);
?>
<section id="hasar-destek" class="relative w-full py-28 px-6 bg-navy-950 text-white overflow-hidden" style="padding-top:7rem; padding-bottom:7rem; background:#030712; border-top:1px solid rgba(255,255,255,0.06); position:relative;">
    <!-- AMBIENT GLOW -->
    <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); width:800px; height:500px; background:rgba(225,29,72,0.04); border-radius:50%; filter:blur(170px); pointer-events:none;"></div>

    <div class="container-custom relative z-10">
        <!-- HEADER -->
        <div style="text-align:center; max-width:48rem; margin:0 auto 4rem auto;">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-rose-300 mb-5" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(244,63,94,0.1); border:1px solid rgba(244,63,94,0.25); letter-spacing:0.2em; margin-bottom:1.25rem;">
                <?php echo plused_icon('shield', 'w-3.5 h-3.5 text-rose-400'); ?>
                <span>Hasar Sürecinde Dosya Takibi & Danışmanlık</span>
            </div>

            <h2 class="font-serif text-white font-medium mb-6" style="font-size:clamp(2rem, 4vw, 3.5rem); line-height:1.2; margin-bottom:1.5rem;">
                Hasar olduğunda yalnız değilsiniz.
            </h2>

            <p class="text-silver-400 text-base sm:text-lg font-sans leading-relaxed" style="font-size:1.1rem; line-height:1.7;">
                Poliçe yaptırmanın asıl sebebi hasar günüdür. Kaza, yangın, su baskını veya sağlık acilinde robotlara değil, dosyanızı sahiplenen gerçek uzmanınıza ulaşırsınız.
            </p>

            <div style="margin-top:2rem; display:flex; flex-wrap:wrap; justify-content:center; gap:1rem;">
                <button type="button" class="btn-emergency open-claim-modal">
                    <?php echo plused_icon('shield', 'w-4 h-4'); ?>
                    <span>Acil Hasar Bildir</span>
                </button>

                <a href="<?php echo esc_attr($phone_url); ?>" class="btn-secondary">
                    <?php echo plused_icon('phone', 'w-4 h-4 text-emerald-400'); ?>
                    <span>Hasar Destek Hattı: <?php echo esc_html($phone_display); ?></span>
                </a>
            </div>
        </div>

        <!-- 3 STEPS GRID -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:1.5rem; margin-bottom:4rem;">
            <?php foreach ($claim_steps as $step) : ?>
            <div style="padding:2rem; border-radius:1.5rem; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.07); backdrop-filter:blur(10px); display:flex; flex-direction:column; justify-content:space-between;">
                <div>
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem;">
                        <div style="width:48px; height:48px; border-radius:14px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center; color:#38BDF8;">
                            <?php echo plused_icon('shield', 'w-5 h-5'); ?>
                        </div>
                        <span class="font-mono text-xs font-semibold text-silver-500 tracking-widest" style="letter-spacing:0.15em;">
                            ADIM <?php echo esc_html($step['step']); ?>
                        </span>
                    </div>

                    <h3 class="font-serif text-xl text-white font-medium mb-3" style="font-size:1.25rem; margin-bottom:0.75rem;">
                        <?php echo esc_html($step['title']); ?>
                    </h3>

                    <p class="text-silver-400 text-sm font-sans leading-relaxed" style="line-height:1.7; font-size:14px;">
                        <?php echo esc_html($step['desc']); ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- FAST CONTACT BANNER -->
        <div style="border-radius:1.5rem; background:linear-gradient(135deg, rgba(15,26,48,0.7), rgba(6,13,31,0.9)); border:1px solid rgba(255,255,255,0.1); padding:clamp(1.5rem, 4vw, 2.5rem); display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:1.5rem;">
            <div>
                <span class="font-mono text-xs uppercase tracking-widest text-electric-light mb-1 block" style="font-size:11px; letter-spacing:0.2em; display:block; margin-bottom:0.25rem;">
                    ÖNCELİKLİ WHATSAPP DESTEK HATTI
                </span>
                <h4 class="font-serif text-2xl text-white font-medium" style="font-size:1.5rem; margin:0 0 0.25rem 0;">
                    Kaza tutanağı veya hasar fotoğraflarını WhatsApp'tan iletin.
                </h4>
                <p class="text-silver-400 text-sm font-sans" style="margin:0; font-size:13px;">
                    Dosyanız ilgili sigorta şirketi eksperine yönlendirilir.
                </p>
            </div>

            <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary" style="background:linear-gradient(135deg, #059669, #047857); border-color:rgba(52,211,153,0.4); box-shadow:0 0 25px rgba(16,185,129,0.4);">
                <?php echo plused_icon('whatsapp', 'w-4 h-4'); ?>
                <span>WhatsApp ile Fotoğraf Gönder</span>
            </a>

            <!-- KVKK LEGAL NOTICE -->
            <div style="width:100%; margin-top:0.5rem; text-align:right;">
                <p style="font-size:12px; color:#94A3B8; margin:0; line-height:1.5;">
                    Belge göndererek süreçlerin yürütülmesi için gerekli kişisel verilerin işlenmesine ilişkin bilgi için <a href="<?php echo esc_url(home_url('/kvkk-aydinlatma/')); ?>" style="color:#38BDF8; text-decoration:underline;">KVKK Aydınlatma Metni</a>'ni inceleyebilirsiniz.
                </p>
            </div>
        </div>
    </div>
</section>
