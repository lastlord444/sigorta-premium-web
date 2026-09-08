<?php
/**
 * Template Part: Section Proposal (Interactive Quote Calculator)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$insurance_types = array(
    array('id' => 'kasko',  'name' => 'Kasko',   'icon' => 'car',         'tag' => 'Tam Güvence'),
    array('id' => 'trafik', 'name' => 'Trafik',  'icon' => 'shield',      'tag' => 'Zorunlu Mali'),
    array('id' => 'saglik', 'name' => 'Sağlık',  'icon' => 'heart-pulse', 'tag' => 'Özel & TSS'),
    array('id' => 'konut',  'name' => 'Konut',   'icon' => 'home',        'tag' => 'Bina & Eşya'),
    array('id' => 'dask',   'name' => 'DASK',    'icon' => 'building',    'tag' => 'Zorunlu Deprem'),
    array('id' => 'isyeri', 'name' => 'İşyeri',  'icon' => 'briefcase',   'tag' => 'Kurumsal'),
    array('id' => 'diger',  'name' => 'Diğer',   'icon' => 'shield',      'tag' => 'Özel Branş'),
);

$whatsapp_url = plused_build_whatsapp_link('Merhaba, hızlı teklif almak için ruhsat fotoğrafımı iletiyorum.');
?>
<section id="teklif-al" class="relative w-full py-28 px-6 bg-background text-white overflow-hidden" style="padding-top:7rem; padding-bottom:7rem; background:#030712; position:relative;">
    <!-- RADIANCE GLOW -->
    <div style="position:absolute; top:33%; left:50%; transform:translateX(-50%); width:800px; height:500px; background:rgba(0,102,255,0.08); border-radius:50%; filter:blur(170px); pointer-events:none;"></div>

    <div class="container-custom relative z-10" style="max-width:56rem;">
        <!-- HEADER -->
        <div style="text-align:center; margin-bottom:3.5rem;">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-silver-300 mb-5" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); letter-spacing:0.2em; margin-bottom:1.25rem;">
                <?php echo plused_icon('clock', 'w-3.5 h-3.5 text-electric-light'); ?>
                <span>Birden Fazla Şirketten Teklif</span>
            </div>

            <h2 class="font-serif text-white font-medium mb-4" style="font-size:clamp(2rem, 4vw, 3.5rem); margin-bottom:1rem; line-height:1.2;">
                Teklif almak birkaç dakikanızı alır.
            </h2>

            <p class="text-silver-400 text-base font-sans" style="font-size:1.05rem; max-width:36rem; margin:auto; line-height:1.7;">
                İhtiyacınız olan güvenceyi seçin; danışmanlarımız birden fazla şirketin tekliflerini sizin için hazırlasın.
            </p>
        </div>

        <!-- MAIN PROPOSAL CARD -->
        <div style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.09); border-radius:1.5rem; padding:clamp(1.5rem, 4vw, 3rem); backdrop-filter:blur(20px); box-shadow:0 20px 70px rgba(0,0,0,0.7);">
            
            <input type="hidden" id="proposal-product-type" name="product_type" value="kasko" />

            <!-- STEP 1: INSURANCE TYPE SELECTOR -->
            <div style="margin-bottom:2rem;">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1rem;">
                    <label class="font-mono text-xs uppercase tracking-widest text-silver-300" style="letter-spacing:0.15em;">
                        1. Sigorta Türünü Seçin
                    </label>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-2.5" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(105px, 1fr)); gap:0.6rem;">
                    <?php foreach ($insurance_types as $idx => $t) : ?>
                    <button
                        type="button"
                        class="proposal-chip <?php echo ($idx === 0) ? 'active' : ''; ?>"
                        data-product="<?php echo esc_attr($t['id']); ?>"
                        data-name="<?php echo esc_attr($t['name']); ?>"
                    >
                        <div class="chip-icon" style="margin-bottom:0.4rem;">
                            <?php echo plused_icon($t['icon'], 'w-5 h-5'); ?>
                        </div>
                        <span style="font-size:12px; font-weight:600;"><?php echo esc_html($t['name']); ?></span>
                        <span style="font-size:9px; font-family:var(--font-mono); text-transform:uppercase; color:#64748B; margin-top:0.2rem;">
                            <?php echo esc_html($t['tag']); ?>
                        </span>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- ACTION PANEL A: KASKO / TRAFİK (RUHSAT + E-DEVLET) -->
            <div id="proposal-action-vehicle" style="padding:1.75rem; border-radius:1.25rem; background:rgba(16,185,129,0.05); border:1px solid rgba(52,211,153,0.25); display:flex; flex-direction:column; gap:1rem;">
                <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.5rem;">
                    <div style="display:flex; align-items:center; gap:0.5rem; color:#34D399; font-family:var(--font-mono); font-size:12px; text-transform:uppercase; letter-spacing:0.15em; font-weight:600;">
                        <?php echo plused_icon('whatsapp', 'w-4 h-4 text-emerald-400'); ?>
                        <span id="proposal-vehicle-title">Kasko Sigortası İçin Hızlı İşlem</span>
                    </div>
                    <span style="font-size:12px; color:#94A3B8;">Doğrudan acente danışmanınıza bağlanır</span>
                </div>

                <p class="text-silver-300 font-sans text-sm leading-relaxed" style="margin:0;">
                    Araç ruhsatınızın fotoğrafını WhatsApp hattımıza ileterek teklif sürecinizi hemen başlatabilirsiniz. Ruhsat bilgilerinize resmi e-Devlet Kapısı üzerinden de güvenle erişebilirsiniz.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:0.75rem; margin-top:0.5rem;">
                    <a id="proposal-vehicle-whatsapp-btn" href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary" style="background:linear-gradient(135deg, #059669, #10B981); border-color:rgba(52,211,153,0.4); justify-content:center; padding:0.9rem 1.25rem; font-size:13px; text-decoration:none;">
                        <?php echo plused_icon('whatsapp', 'w-4 h-4 text-white'); ?>
                        <span id="proposal-vehicle-btn-label">Ruhsatı WhatsApp'tan Gönder</span>
                    </a>
                    <a href="https://www.turkiye.gov.tr/araclarim" target="_blank" rel="noopener noreferrer" class="btn-edevlet" style="justify-content:center; padding:0.9rem 1.25rem; font-size:13px; text-decoration:none;">
                        <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:#EF4444;"></span>
                        <span>Ruhsat Bilgilerimi e-Devlet'ten Bul</span>
                    </a>
                </div>
            </div>

            <!-- ACTION PANEL B: DİĞER ÜRÜNLER (SAĞLIK, KONUT, DASK, İŞYERİ, DİĞER) -->
            <div id="proposal-action-other" style="display:none; padding:1.75rem; border-radius:1.25rem; background:rgba(0,102,255,0.05); border:1px solid rgba(56,189,248,0.25); flex-direction:column; gap:1rem;">
                <div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:0.5rem;">
                    <div style="display:flex; align-items:center; gap:0.5rem; color:#38BDF8; font-family:var(--font-mono); font-size:12px; text-transform:uppercase; letter-spacing:0.15em; font-weight:600;">
                        <?php echo plused_icon('shield', 'w-4 h-4 text-electric-light'); ?>
                        <span id="proposal-other-title">Teklif Talebi</span>
                    </div>
                    <span style="font-size:12px; color:#94A3B8;">Doğrudan acente danışmanınıza bağlanır</span>
                </div>

                <p id="proposal-other-desc" class="text-silver-300 font-sans text-sm leading-relaxed" style="margin:0;">
                    Talebinizi ve ihtiyaç duyduğunuz teminat detaylarını WhatsApp hattımıza ileterek danışmanınızdan teklif alternatiflerini hemen alabilirsiniz.
                </p>

                <div style="margin-top:0.5rem;">
                    <a id="proposal-other-whatsapp-btn" href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary" style="background:linear-gradient(135deg, #059669, #10B981); border-color:rgba(52,211,153,0.4); justify-content:center; padding:0.9rem 1.75rem; font-size:13px; text-decoration:none; display:inline-flex;">
                        <?php echo plused_icon('whatsapp', 'w-4 h-4 text-white'); ?>
                        <span id="proposal-other-btn-label">WhatsApp'tan Teklif Al</span>
                    </a>
                </div>
            </div>

            <!-- GELECEKTEKİ SİGORTA ŞİRKETİ API ENTEGRASYONU İÇİN KORUNAN FORM TASLAĞI (Şu anda kapalı) -->
            <div id="future-api-proposal-form" style="display:none;" aria-hidden="true">
                <form id="proposal-form">
                    <input type="text" id="proposal-fullname" name="fullname" />
                    <input type="tel" id="proposal-phone" name="phone" />
                    <input type="email" id="proposal-email" name="email" />
                    <input type="text" id="proposal-extra-input" name="extra_field" />
                    <input type="checkbox" id="proposal-kvkk" name="kvkk" value="1" />
                </form>
            </div>

        </div>
    </div>
</section>
