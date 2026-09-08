<?php
/**
 * Template Name: İletişim Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$options            = get_option('plused_sigorta_options', array());
$company_name       = plused_get_option('company_name', 'PLUSED SİGORTA');
$phone_display      = plused_get_display_phone();
$phone_url          = plused_get_phone_url();
$whatsapp_url       = 'https://wa.me/905304777737';
$whatsapp_quote_url = plused_build_whatsapp_link('Merhaba, Kasko ve Trafik sigortası teklifi almak için ruhsat bilgilerimi paylaşmak istiyorum.');
$email              = trim(plused_get_option('email', ''));
$address            = trim(plused_get_option('address', ''));
$working_hours      = trim(plused_get_option('working_hours', ''));
$has_meta_info      = (!empty($address) || !empty($email) || !empty($working_hours));
?>

<main class="relative min-h-screen bg-navy-950 text-white pt-32 sm:pt-40 pb-28 px-6" style="background:#030712; padding-top:8rem; padding-bottom:7rem;">
    <!-- RADIANCE GLOW -->
    <div style="position:absolute; top:20%; left:50%; transform:translateX(-50%); width:700px; height:450px; background:rgba(0,102,255,0.06); border-radius:50%; filter:blur(180px); pointer-events:none;"></div>

    <div class="container-custom relative z-10">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" style="margin-bottom:2rem; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#94A3B8;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="color:#94A3B8; text-decoration:none;">Ana Sayfa</a>
            <span style="margin:0 0.5rem; color:rgba(255,255,255,0.3);">/</span>
            <span style="color:#38BDF8;">İletişim</span>
        </nav>

        <!-- TOP SECTION -->
        <div class="contact-hero-section">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-silver-300 mb-4" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); letter-spacing:0.2em;">
                <?php echo plused_icon('shield', 'w-3.5 h-3.5 text-electric-light'); ?>
                <span>İLETİŞİM</span>
            </div>

            <h1 class="font-serif text-white font-medium mb-4" style="font-size:clamp(2rem, 3.5vw, 3.25rem); line-height:1.25; max-width:54rem; margin-left:auto; margin-right:auto;">
                Teklif ve sigorta işlemleriniz için doğrudan bizimle iletişime geçebilirsiniz.
            </h1>
        </div>

        <!-- TWO LARGE PREMIUM CARDS -->
        <div class="contact-cards-grid">
            <!-- CARD 1: TELEFON -->
            <div class="contact-card-premium phone-card">
                <div>
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem;">
                        <span class="font-mono text-xs uppercase tracking-widest text-electric-light font-semibold" style="letter-spacing:0.2em;">
                            TELEFON
                        </span>
                        <div style="width:44px; height:44px; border-radius:12px; background:rgba(0,102,255,0.12); border:1px solid rgba(0,102,255,0.3); display:flex; align-items:center; justify-content:center; color:#38BDF8; flex-shrink:0;">
                            <?php echo plused_icon('phone', 'w-5 h-5'); ?>
                        </div>
                    </div>

                    <a href="<?php echo esc_attr($phone_url); ?>" class="font-mono text-white font-bold block mb-4 hover:text-electric-light transition-colors" style="text-decoration:none; display:block; font-size:clamp(1.35rem, 5vw, 2.5rem); letter-spacing:0.02em; line-height:1.2; overflow-wrap:break-word; word-break:break-word;">
                        <?php echo esc_html($phone_display); ?>
                    </a>

                    <p class="text-silver-300 font-sans text-sm sm:text-base leading-relaxed mb-8" style="line-height:1.65;">
                        Poliçe danışmanınızla doğrudan görüşün, mevcut dosyanız veya teklif alternatifleriniz hakkında anında bilgi alın.
                    </p>
                </div>

                <div>
                    <a href="<?php echo esc_attr($phone_url); ?>" class="btn-secondary" style="width:100%; justify-content:center; padding:1rem 1.75rem; font-size:13px; font-weight:600; text-transform:uppercase; letter-spacing:0.1em;">
                        <?php echo plused_icon('phone', 'w-4 h-4 text-silver-300'); ?>
                        <span>Ara</span>
                    </a>
                </div>
            </div>

            <!-- CARD 2: WHATSAPP -->
            <div class="contact-card-premium whatsapp-card">
                <div>
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem;">
                        <span class="font-mono text-xs uppercase tracking-widest text-emerald-400 font-semibold" style="letter-spacing:0.2em;">
                            WHATSAPP
                        </span>
                        <div style="width:44px; height:44px; border-radius:12px; background:rgba(37,211,102,0.12); border:1px solid rgba(37,211,102,0.3); display:flex; align-items:center; justify-content:center; color:#34D399; flex-shrink:0;">
                            <?php echo plused_icon('whatsapp', 'w-5 h-5'); ?>
                        </div>
                    </div>

                    <h2 class="font-serif text-white font-medium mb-4" style="font-size:clamp(1.4rem, 2vw, 1.9rem); line-height:1.35;">
                        Ruhsatınızı veya teklif talebinizi WhatsApp üzerinden iletebilirsiniz.
                    </h2>

                    <p class="text-silver-300 font-sans text-sm sm:text-base leading-relaxed mb-8" style="line-height:1.65;">
                        Ruhsat fotoğrafı, kaza tutanağı veya sorularınızı hızlıca WhatsApp hattımıza ileterek süreci başlatın.
                    </p>
                </div>

                <div>
                    <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary" style="width:100%; justify-content:center; padding:1rem 1.75rem; font-size:13px; font-weight:600; text-transform:uppercase; letter-spacing:0.1em; background:linear-gradient(135deg, #059669, #10B981); border-color:rgba(52,211,153,0.4); box-shadow:0 0 30px rgba(16,185,129,0.35);">
                        <?php echo plused_icon('whatsapp', 'w-4 h-4 text-white'); ?>
                        <span>WhatsApp'tan Mesaj Gönder</span>
                    </a>
                    <p style="font-size:11px; color:#94A3B8; text-align:center; margin-top:0.75rem; margin-bottom:0; line-height:1.5;">
                        Belge göndererek teklif/hasar sürecinin yürütülmesi için gerekli kişisel verilerin işlenmesine ilişkin bilgi için <a href="<?php echo esc_url(home_url('/kvkk-aydinlatma/')); ?>" style="color:#38BDF8; text-decoration:underline;">KVKK Aydınlatma Metni</a>'ni inceleyebilirsiniz.
                    </p>
                </div>
            </div>
        </div>

        <!-- OPTIONAL METADATA (Address, Email, Working Hours - ONLY SHOWN IF CONFIGURED) -->
        <?php if ($has_meta_info) : ?>
        <div style="margin-bottom:3.5rem; display:grid; grid-template-columns:repeat(auto-fit, minmax(min(100%, 240px), 1fr)); gap:1.25rem;">
            <?php if (!empty($address)) : ?>
            <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:1.5rem;">
                <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.75rem;">
                    <div style="width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,0.05); display:flex; align-items:center; justify-content:center; color:#94A3B8;">
                        <?php echo plused_icon('home', 'w-4 h-4'); ?>
                    </div>
                    <span style="font-size:11px; font-family:var(--font-mono); text-transform:uppercase; color:#94A3B8; letter-spacing:0.1em; font-weight:600;">Ofis Adresi</span>
                </div>
                <p style="font-size:13px; color:#CBD5E1; line-height:1.6; margin:0;"><?php echo nl2br(esc_html($address)); ?></p>
            </div>
            <?php endif; ?>

            <?php if (!empty($email)) : ?>
            <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:1.5rem;">
                <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.75rem;">
                    <div style="width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,0.05); display:flex; align-items:center; justify-content:center; color:#94A3B8;">
                        <?php echo plused_icon('mail', 'w-4 h-4'); ?>
                    </div>
                    <span style="font-size:11px; font-family:var(--font-mono); text-transform:uppercase; color:#94A3B8; letter-spacing:0.1em; font-weight:600;">E-Posta</span>
                </div>
                <a href="mailto:<?php echo esc_attr($email); ?>" style="color:#FFFFFF; text-decoration:none; font-size:14px; font-weight:500;">
                    <?php echo esc_html($email); ?>
                </a>
            </div>
            <?php endif; ?>

            <?php if (!empty($working_hours)) : ?>
            <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:1.5rem;">
                <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.75rem;">
                    <div style="width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,0.05); display:flex; align-items:center; justify-content:center; color:#94A3B8;">
                        <?php echo plused_icon('clock', 'w-4 h-4'); ?>
                    </div>
                    <span style="font-size:11px; font-family:var(--font-mono); text-transform:uppercase; color:#94A3B8; letter-spacing:0.1em; font-weight:600;">Çalışma Saatleri</span>
                </div>
                <p style="font-size:13px; color:#CBD5E1; line-height:1.6; margin:0;"><?php echo esc_html($working_hours); ?></p>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- SIMPLE BOTTOM CTA: Sigorta teklifi mi almak istiyorsunuz? -->
        <div class="contact-quote-banner">
            <h3 class="font-serif text-white font-medium mb-3" style="font-size:clamp(1.5rem, 2.5vw, 2.2rem); line-height:1.25;">
                Sigorta teklifi mi almak istiyorsunuz?
            </h3>
            <p class="text-silver-300 font-sans text-sm sm:text-base leading-relaxed mb-6" style="max-width:38rem; margin-left:auto; margin-right:auto;">
                Kasko ve Trafik sigortanız için araç ruhsat fotoğrafınızı WhatsApp üzerinden ileterek en uygun fiyat ve teminat alternatiflerini hemen öğrenebilirsiniz.
            </p>
            <div style="display:flex; flex-direction:column; align-items:center; gap:0.75rem;">
                <a href="<?php echo esc_url($whatsapp_quote_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary" style="padding:0.95rem 2.5rem; font-size:13px; font-weight:600; text-transform:uppercase; letter-spacing:0.1em; background:linear-gradient(135deg, #0066FF 0%, #2563EB 50%, #4F46E5 100%);">
                    <span>Teklif Al</span>
                    <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
                </a>
                <p style="font-size:11px; color:#94A3B8; text-align:center; margin:0; line-height:1.5;">
                    Belge göndererek teklif sürecinin yürütülmesi için gerekli kişisel verilerin işlenmesine ilişkin bilgi için <a href="<?php echo esc_url(home_url('/kvkk-aydinlatma/')); ?>" style="color:#38BDF8; text-decoration:underline;">KVKK Aydınlatma Metni</a>'ni inceleyebilirsiniz.
                </p>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
