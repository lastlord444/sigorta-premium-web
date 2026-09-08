<?php
/**
 * Header Template (Multi-Page Navigation)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$options           = get_option('plused_sigorta_options', array());
$company_name      = plused_get_option('company_name', 'PLUSED SİGORTA');
$phone_display     = plused_get_display_phone();
$phone_url         = plused_get_phone_url();
$whatsapp_url      = plused_build_whatsapp_link('Merhaba, bilgi ve teklif almak istiyorum.');
$announcement_text = plused_get_option('announcement_text', '');
$announcement_on   = !empty($options['announcement_active']);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="bg-background text-foreground">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('font-sans bg-background text-foreground selection:bg-electric/30 selection:text-white'); ?>>
<?php wp_body_open(); ?>

<!-- CUSTOM INTERACTIVE CURSOR (DESKTOP) -->
<div id="custom-cursor-dot" class="custom-cursor-dot" aria-hidden="true"></div>
<div id="custom-cursor-ring" class="custom-cursor-ring" aria-hidden="true"></div>

<!-- ANNOUNCEMENT BAR (OPTIONAL) -->
<?php if ($announcement_on && !empty($announcement_text)) : ?>
<div class="w-full bg-gradient-to-r from-blue-900 via-indigo-900 to-navy-950 py-2 px-4 text-center text-xs font-mono text-silver-200 border-b border-white/10 relative z-50">
    <span><?php echo esc_html($announcement_text); ?></span>
</div>
<?php endif; ?>

<!-- MAIN NAVBAR -->
<header id="site-header" class="site-header">
    <div class="container-custom flex items-center justify-between" style="display:flex; align-items:center; justify-content:space-between;">
        
        <!-- LOGO -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 select-none text-decoration-none group" style="text-decoration:none; display:flex; align-items:center; gap:0.75rem;">
            <div class="relative w-10 h-10 rounded-xl flex items-center justify-center border border-white/20 shadow-[0_0_20px_rgba(0,102,255,0.4)]" style="background:linear-gradient(135deg, #0066FF, #312E81); width:40px; height:40px; border-radius:12px; display:flex; align-items:center; justify-content:center; border:1px solid rgba(255,255,255,0.2); flex-shrink:0;">
                <?php echo plused_icon('shield', 'w-5 h-5 text-white'); ?>
            </div>
            <span class="font-serif text-lg tracking-wider text-white font-semibold" style="letter-spacing:0.16em; line-height:1.2;">
                <?php echo esc_html($company_name); ?>
            </span>
        </a>

        <!-- DESKTOP NAV LINKS (>=1200px) -->
        <nav class="site-nav-desktop nav-pill-container" aria-label="Ana Menü">
            
            <!-- SIGORTALAR DROPDOWN -->
            <div class="nav-dropdown-wrapper relative" style="position:relative;">
                <button type="button" class="site-nav-link nav-link-btn" aria-haspopup="true" aria-expanded="false">
                    <span>Sigortalar</span>
                    <svg style="width:12px; height:12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="nav-dropdown-menu">
                    <div class="nav-dropdown-inner">
                        <a href="<?php echo esc_url(home_url('/kasko/')); ?>" class="nav-dropdown-item">
                            <span class="dropdown-title">Kasko Sigortası</span>
                            <span class="dropdown-desc">Aracınız için kasko güvencesi</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/trafik-sigortasi/')); ?>" class="nav-dropdown-item">
                            <span class="dropdown-title">Trafik Sigortası</span>
                            <span class="dropdown-desc">Zorunlu mali mesuliyet güvencesi</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/konut-sigortasi/')); ?>" class="nav-dropdown-item">
                            <span class="dropdown-title">Konut Sigortası</span>
                            <span class="dropdown-desc">Bina ve eşya teminat seçenekleri</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/dask/')); ?>" class="nav-dropdown-item">
                            <span class="dropdown-title">DASK</span>
                            <span class="dropdown-desc">Zorunlu deprem afet fonu</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/saglik-sigortasi/')); ?>" class="nav-dropdown-item">
                            <span class="dropdown-title">Sağlık Sigortası</span>
                            <span class="dropdown-desc">Tamamlayıcı & Özel sağlık planı</span>
                        </a>
                        <a href="<?php echo esc_url(home_url('/isyeri-sigortasi/')); ?>" class="nav-dropdown-item">
                            <span class="dropdown-title">İşyeri Sigortası</span>
                            <span class="dropdown-desc">KOBİ ve kurumsal ticari risk</span>
                        </a>
                    </div>
                </div>
            </div>

            <a href="<?php echo esc_url(home_url('/teklif-al/')); ?>" class="site-nav-link">Teklif Al</a>
            <a href="<?php echo esc_url(home_url('/hasar-destek/')); ?>" class="site-nav-link">Hasar Desteği</a>
            <a href="<?php echo esc_url(home_url('/hakkimizda/')); ?>" class="site-nav-link">Hakkımızda</a>
            <a href="<?php echo esc_url(home_url('/sss/')); ?>" class="site-nav-link">SSS</a>
            <a href="<?php echo esc_url(home_url('/iletisim/')); ?>" class="site-nav-link">İletişim</a>
        </nav>

        <!-- RIGHT DESKTOP ACTIONS (>=1200px) -->
        <div class="site-header-desktop-actions">
            <a href="<?php echo esc_attr($phone_url); ?>" class="site-header-phone-link">
                <span class="phone-pulse-dot"></span>
                <?php echo plused_icon('phone', 'w-3.5 h-3.5 text-silver-400'); ?>
                <span class="font-mono text-xs"><?php echo esc_html($phone_display); ?></span>
            </a>

            <!-- WhatsApp CTA Button -->
            <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="site-header-whatsapp-btn">
                <?php echo plused_icon('whatsapp', 'w-3.5 h-3.5 text-white'); ?>
                <span>WhatsApp</span>
            </a>
        </div>

        <!-- MOBILE CONTROLS: WhatsApp CTA + Hamburger Button (<1200px) -->
        <div class="site-header-mobile-controls">
            <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp İletişim" class="mobile-whatsapp-btn">
                <?php echo plused_icon('whatsapp', 'w-4 h-4 text-emerald-400'); ?>
            </a>

            <button id="mobile-menu-toggle" type="button" aria-label="Menüyü Aç" class="mobile-menu-toggle-btn">
                <svg style="width:20px; height:20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </div>
</header>

<!-- FULLSCREEN MOBILE MENU OVERLAY -->
<div id="mobile-menu-overlay" class="modal-overlay" style="z-index:90;">
    <div style="width:100%; max-width:440px; max-height:90vh; overflow-y:auto; background:#060D1F; border:1px solid rgba(255,255,255,0.15); border-radius:1.5rem; padding:1.75rem; margin:1rem;">
        
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem; padding-bottom:1rem; border-bottom:1px solid rgba(255,255,255,0.1);">
            <div class="flex items-center gap-2.5">
                <div style="width:32px; height:32px; border-radius:8px; background:linear-gradient(135deg, #0066FF, #312E81); display:flex; align-items:center; justify-content:center;">
                    <?php echo plused_icon('shield', 'w-4 h-4 text-white'); ?>
                </div>
                <div style="font-family:var(--font-serif); font-size:16px; color:#ffffff; font-weight:600; letter-spacing:0.1em;">
                    <?php echo esc_html($company_name); ?>
                </div>
            </div>
            <button id="mobile-menu-close" type="button" aria-label="Kapat" style="background:none; border:none; color:#94A3B8; font-size:24px; cursor:pointer; line-height:1;">
                &times;
            </button>
        </div>

        <!-- NAVIGATION LINKS -->
        <div style="display:flex; flex-direction:column; gap:0.5rem; margin-bottom:1.75rem;">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-nav-link">Ana Sayfa</a>
            
            <div style="padding:0.5rem 0.75rem; border-radius:0.75rem; background:rgba(255,255,255,0.02); margin:0.25rem 0;">
                <div style="font-family:var(--font-mono); font-size:10px; text-transform:uppercase; letter-spacing:0.15em; color:#38BDF8; margin-bottom:0.5rem; font-weight:600;">
                    Sigorta Ürünleri
                </div>
                <div style="display:grid; grid-template-columns:repeat(2, minmax(0, 1fr)); gap:0.5rem;">
                    <a href="<?php echo esc_url(home_url('/kasko/')); ?>" class="mobile-sub-link">Kasko</a>
                    <a href="<?php echo esc_url(home_url('/trafik-sigortasi/')); ?>" class="mobile-sub-link">Trafik Sigortası</a>
                    <a href="<?php echo esc_url(home_url('/konut-sigortasi/')); ?>" class="mobile-sub-link">Konut Sigortası</a>
                    <a href="<?php echo esc_url(home_url('/dask/')); ?>" class="mobile-sub-link">DASK</a>
                    <a href="<?php echo esc_url(home_url('/saglik-sigortasi/')); ?>" class="mobile-sub-link">Sağlık Sigortası</a>
                    <a href="<?php echo esc_url(home_url('/isyeri-sigortasi/')); ?>" class="mobile-sub-link">İşyeri Sigortası</a>
                </div>
            </div>

            <a href="<?php echo esc_url(home_url('/teklif-al/')); ?>" class="mobile-nav-link">Teklif Al</a>
            <a href="<?php echo esc_url(home_url('/hasar-destek/')); ?>" class="mobile-nav-link">Hasar Desteği</a>
            <a href="<?php echo esc_url(home_url('/hakkimizda/')); ?>" class="mobile-nav-link">Hakkımızda</a>
            <a href="<?php echo esc_url(home_url('/sss/')); ?>" class="mobile-nav-link">Sıkça Sorulan Sorular</a>
            <a href="<?php echo esc_url(home_url('/iletisim/')); ?>" class="mobile-nav-link">İletişim</a>
        </div>

        <!-- ACTION BUTTONS -->
        <div style="display:flex; flex-direction:column; gap:0.6rem;">
            <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary" style="width:100%; text-align:center; background:linear-gradient(135deg, #059669, #10B981); border-color:rgba(52,211,153,0.4);">
                <?php echo plused_icon('whatsapp', 'w-4 h-4 text-white'); ?>
                <span>WhatsApp İletişim</span>
            </a>
            <a href="<?php echo esc_attr($phone_url); ?>" class="btn-secondary" style="width:100%; text-align:center;">
                <?php echo plused_icon('phone', 'w-4 h-4'); ?>
                <span>Ara: <?php echo esc_html($phone_display); ?></span>
            </a>
        </div>
    </div>
</div>
