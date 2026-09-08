<?php
/**
 * Template Name: Teklif Al Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$selected_product = sanitize_text_field($_GET['urun'] ?? 'kasko');
$valid_types = array('kasko', 'trafik', 'saglik', 'konut', 'dask', 'isyeri', 'diger');
if (!in_array($selected_product, $valid_types)) {
    $selected_product = 'kasko';
}

$phone_display = plused_get_display_phone();
$phone_url     = plused_get_phone_url();
$whatsapp_url  = plused_build_whatsapp_link('Merhaba, hızlı teklif almak istiyorum.');
?>

<main class="relative min-h-screen bg-navy-950 text-white pt-32 sm:pt-40 pb-28 px-6" style="background:#030712; padding-top:8rem; padding-bottom:7rem;">
    <!-- RADIANCE GLOW -->
    <div style="position:absolute; top:20%; left:50%; transform:translateX(-50%); width:700px; height:450px; background:rgba(0,102,255,0.08); border-radius:50%; filter:blur(170px); pointer-events:none;"></div>

    <div class="container-custom relative z-10">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" style="margin-bottom:1.5rem; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#94A3B8;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="color:#94A3B8; text-decoration:none;">Ana Sayfa</a>
            <span style="margin:0 0.5rem; color:rgba(255,255,255,0.3);">/</span>
            <span style="color:#38BDF8;">Teklif Al</span>
        </nav>

        <!-- HEADER -->
        <div style="text-align:center; margin-bottom:3.5rem;">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-silver-300 mb-4" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); letter-spacing:0.2em;">
                <?php echo plused_icon('clock', 'w-3.5 h-3.5 text-electric-light'); ?>
                <span>Birden Fazla Şirket Seçeneği</span>
            </div>

            <h1 class="font-serif text-white font-medium mb-4" style="font-size:clamp(2.2rem, 4.5vw, 3.8rem); line-height:1.15;">
                Teklif almak birkaç dakikanızı alır.
            </h1>

            <p class="text-silver-400 text-base font-sans" style="font-size:1.1rem; max-width:38rem; margin:auto; line-height:1.7;">
                İhtiyacınız olan güvenceyi seçin; bağımsız sigorta danışmanlarımız Türkiye'nin en güvenilir şirketlerinin tekliflerini sizin için hazırlasın.
            </p>
        </div>

        <!-- REUSE INTERACTIVE PROPOSAL CALCULATOR -->
        <?php get_template_part('template-parts/section', 'proposal'); ?>

        <!-- ALTERNATIVE QUICK CHANNELS -->
        <div style="margin-top:4rem; padding-top:3rem; border-top:1px solid rgba(255,255,255,0.08); text-align:center;">
            <p class="text-silver-400 font-sans text-sm mb-4">
                Danışmanımızla doğrudan görüşmek veya teklif alternatiflerini incelemek için ruhsatınızı ya da talebinizi WhatsApp hattımıza iletebilirsiniz.
            </p>
            <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:1rem;">
                <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary" style="background:rgba(37,211,102,0.1); border-color:rgba(37,211,102,0.3); color:#86EFAC;">
                    <?php echo plused_icon('whatsapp', 'w-4 h-4 text-emerald-400'); ?>
                    <span>WhatsApp İle Ruhsat Gönder</span>
                </a>
                <a href="<?php echo esc_attr($phone_url); ?>" class="btn-secondary">
                    <?php echo plused_icon('phone', 'w-4 h-4 text-silver-400'); ?>
                    <span>Doğrudan Arayın (<?php echo esc_html($phone_display); ?>)</span>
                </a>
            </div>

            <p style="font-size:12px; color:#94A3B8; text-align:center; margin-top:1.25rem; margin-bottom:0; line-height:1.5;">
                Belge göndererek teklif sürecinin yürütülmesi için gerekli kişisel verilerin işlenmesine ilişkin bilgi için <a href="<?php echo esc_url(home_url('/kvkk-aydinlatma/')); ?>" style="color:#38BDF8; text-decoration:underline;">KVKK Aydınlatma Metni</a>'ni inceleyebilirsiniz.
            </p>
        </div>
    </div>
</main>

<?php
get_footer();
