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
$whatsapp_url  = plused_build_whatsapp_link('Acil hasar bildirimi yapmak istiyorum.');

$claim_steps = array(
    array(
        'step'  => '01',
        'title' => 'Güvenliği Sağlayın & Fotoğraflayın',
        'desc'  => 'Öncelikle can güvenliğinizi sağlayın. Kaza alanını hareket ettirmeden geniş açılı fotoğraflarını çekin ve Kaza Tespit Tutanağı\'nı doldurun.',
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
        </div>
    </div>
</section>

<!-- HASAR BİLDİRİM MODALI -->
<div id="claim-modal" class="modal-overlay">
    <div class="modal-card">
        <button id="close-claim-modal" type="button" aria-label="Kapat" style="position:absolute; top:1.25rem; right:1.25rem; background:none; border:none; color:#94A3B8; font-size:24px; cursor:pointer;">
            &times;
        </button>

        <div id="claim-form-content">
            <div style="display:flex; align-items:center; gap:0.5rem; color:#FB7185; margin-bottom:0.5rem; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.15em;">
                <?php echo plused_icon('shield', 'w-4 h-4'); ?>
                <span>Hasar Dosyası Bildirimi</span>
            </div>

            <h3 class="font-serif text-2xl text-white font-medium mb-2">Hasar Bildirimi</h3>
            <p class="text-xs text-silver-400 font-sans mb-6" style="margin-bottom:1.5rem;">
                Bilgilerinizi bırakın, hasar danışmanımız en kısa sürede sizi arayıp süreci yönlendirsin.
            </p>

            <form id="claim-form" style="display:flex; flex-direction:column; gap:1rem;">
                <div>
                    <label for="claim-name" class="font-mono text-xs text-silver-300 block mb-1">Adınız Soyadınız *</label>
                    <input type="text" id="claim-name" name="claim_name" required class="form-input" placeholder="Ad Soyad" />
                </div>

                <div>
                    <label for="claim-phone" class="font-mono text-xs text-silver-300 block mb-1">Telefon Numaranız *</label>
                    <input type="tel" id="claim-phone" name="claim_phone" required class="form-input" placeholder="05XX XXX XX XX" />
                </div>

                <div>
                    <label for="claim-type" class="font-mono text-xs text-silver-300 block mb-1">Hasar Türü</label>
                    <select id="claim-type" name="claim_type" class="form-input" style="background:#0F1A30; color:#FFFFFF;">
                        <option value="kasko">Kasko / Trafik Kazası</option>
                        <option value="konut">Konut / Yangın / Su Baskını</option>
                        <option value="saglik">Sağlık Acil Durumu</option>
                        <option value="isyeri">İşyeri Hasarı</option>
                        <option value="diger">Diğer</option>
                    </select>
                </div>

                <div>
                    <label for="claim-note" class="font-mono text-xs text-silver-300 block mb-1">Kısa Durum Notu (Opsiyonel)</label>
                    <textarea id="claim-note" name="claim_note" rows="2" class="form-input" placeholder="Kaza yeri, çekici ihtiyacı veya özet durum..."></textarea>
                </div>

                <button type="submit" class="btn-emergency" style="width:100%; margin-top:0.5rem;">
                    <span>Hasar Bildirimini Gönder</span>
                </button>
            </form>
        </div>

        <div id="claim-success-content" style="display:none; text-align:center; padding:1.5rem 0;">
            <div style="width:64px; height:64px; border-radius:50%; background:rgba(16,185,129,0.15); border:1px solid rgba(16,185,129,0.3); display:flex; align-items:center; justify-content:center; color:#34D399; margin:0 auto 1rem auto;">
                <?php echo plused_icon('check-circle', 'w-8 h-8'); ?>
            </div>
            <h4 class="font-serif text-2xl text-white font-medium mb-2">Hasar Çağrısı Alındı</h4>
            <p class="text-sm text-silver-300 font-sans mb-6">
                Hasar uzmanımız <span id="claim-phone-display" style="color:#FFFFFF; font-weight:600;"></span> numaranız üzerinden birkaç dakika içinde sizinle temas kuracaktır. Geçmiş olsun.
            </p>
        </div>
    </div>
</div>
