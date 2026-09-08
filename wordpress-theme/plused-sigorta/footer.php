<?php
/**
 * Footer Template (Multi-Page Navigation)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$options            = get_option('plused_sigorta_options', array());
$company_name       = plused_get_option('company_name', 'PLUSED SİGORTA');
$legal_title        = trim(plused_get_option('corporate_legal_title', ''));
$plate_number       = trim(plused_get_option('corporate_plate_number', ''));
$phone_display      = plused_get_display_phone();
$phone_url          = plused_get_phone_url();
$whatsapp_url       = plused_build_whatsapp_link('Merhaba, hızlı teklif almak istiyorum.');
$whatsapp_hasar_url = plused_build_whatsapp_link('Merhaba, hasar bildirimi yapmak istiyorum. Kaza tutanağımı ve hasar fotoğraflarını iletiyorum.');
$email              = plused_get_option('corporate_email', plused_get_option('email', ''));
$address            = plused_get_option('corporate_address', plused_get_option('address', ''));
$working_hours      = plused_get_option('working_hours', '');
$instagram          = plused_get_option('instagram', '');
$facebook           = plused_get_option('facebook', '');
$linkedin           = plused_get_option('linkedin', '');
$x_twitter          = plused_get_option('x_twitter', '');
?>
<footer class="relative w-full bg-navy-950 text-silver-300 border-t border-white-10 overflow-hidden pt-20 pb-28 sm:pb-16" style="background:#030712; border-top:1px solid rgba(255,255,255,0.08); padding-top:5rem; padding-bottom:7rem;">
    <!-- AMBIENT GRADIENT GLOW -->
    <div style="position:absolute; bottom:0; left:50%; transform:translateX(-50%); width:100%; height:18rem; background:linear-gradient(to top, rgba(0, 102, 255, 0.05), transparent); pointer-events:none;"></div>

    <div class="container-custom relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 pb-16 border-b border-white-10" style="padding-bottom:4rem; border-bottom:1px solid rgba(255,255,255,0.08);">
            
            <!-- BRAND COLUMN -->
            <div class="lg:col-span-4 flex flex-col">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 mb-4" style="text-decoration:none; margin-bottom:1rem; display:flex; align-items:center; gap:0.75rem;">
                    <div style="width:42px; height:42px; border-radius:12px; background:linear-gradient(135deg, #0066FF, #312E81); display:flex; align-items:center; justify-content:center; border:1px solid rgba(255,255,255,0.2); box-shadow:0 0 20px rgba(0,102,255,0.4); flex-shrink:0;">
                        <?php echo plused_icon('shield', 'w-5 h-5 text-white'); ?>
                    </div>
                    <span class="font-serif text-lg tracking-wider text-white font-semibold" style="letter-spacing:0.16em; line-height:1.2;">
                        <?php echo esc_html($company_name); ?>
                    </span>
                </a>

                <?php if (!empty($legal_title) || !empty($plate_number)) : ?>
                <div style="font-size:12px; color:#94A3B8; font-weight:500; margin-bottom:1rem; line-height:1.5;">
                    <?php if (!empty($legal_title)) : ?>
                        <div><?php echo esc_html($legal_title); ?></div>
                    <?php endif; ?>
                    <?php if (!empty($plate_number)) : ?>
                        <div style="font-family:var(--font-mono); font-size:11px; color:#64748B;">Levha No: <?php echo esc_html($plate_number); ?></div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <p class="text-silver-400 font-sans text-sm leading-relaxed mb-6" style="max-width:24rem; margin-bottom:1.5rem; font-size:14px; line-height:1.7;">
                    Gereksiz maddelerden arındırılmış, ihtiyaca özel teminat seçenekleri. Türkiye'nin önde gelen sigorta şirketlerinin teklifleriyle güvenle yanınızdayız.
                </p>

                <!-- SOCIAL LINKS -->
                <div class="flex items-center gap-3" style="display:flex; align-items:center; gap:0.75rem;">
                    <?php if (!empty($instagram)) : ?>
                        <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram" style="width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center; color:#94A3B8; text-decoration:none; font-size:11px; font-weight:600;">IG</a>
                    <?php endif; ?>
                    <?php if (!empty($facebook)) : ?>
                        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener noreferrer" aria-label="Facebook" style="width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center; color:#94A3B8; text-decoration:none; font-size:11px; font-weight:600;">FB</a>
                    <?php endif; ?>
                    <?php if (!empty($linkedin)) : ?>
                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" style="width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center; color:#94A3B8; text-decoration:none; font-size:11px; font-weight:600;">IN</a>
                    <?php endif; ?>
                    <?php if (!empty($x_twitter)) : ?>
                        <a href="<?php echo esc_url($x_twitter); ?>" target="_blank" rel="noopener noreferrer" aria-label="X" style="width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center; color:#94A3B8; text-decoration:none; font-size:11px; font-weight:600;">X</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- PRODUCTS COLUMN -->
            <div class="lg:col-span-2">
                <h4 class="font-mono text-xs uppercase tracking-widest text-white mb-5 font-semibold" style="margin-bottom:1.25rem; letter-spacing:0.15em;">
                    Sigorta Ürünleri
                </h4>
                <ul style="list-style:none; display:flex; flex-direction:column; gap:0.6rem; font-size:14px; padding:0; margin:0;">
                    <li><a href="<?php echo esc_url(home_url('/kasko/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">Kasko Sigortası</a></li>
                    <li><a href="<?php echo esc_url(home_url('/trafik-sigortasi/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">Trafik Sigortası</a></li>
                    <li><a href="<?php echo esc_url(home_url('/konut-sigortasi/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">Konut Sigortası</a></li>
                    <li><a href="<?php echo esc_url(home_url('/dask/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">DASK Deprem</a></li>
                    <li><a href="<?php echo esc_url(home_url('/saglik-sigortasi/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">Sağlık Sigortası</a></li>
                    <li><a href="<?php echo esc_url(home_url('/isyeri-sigortasi/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">İşyeri Sigortası</a></li>
                </ul>
            </div>

            <!-- NAVIGATION COLUMN -->
            <div class="lg:col-span-2">
                <h4 class="font-mono text-xs uppercase tracking-widest text-white mb-5 font-semibold" style="margin-bottom:1.25rem; letter-spacing:0.15em;">
                    Kurumsal & Destek
                </h4>
                <ul style="list-style:none; display:flex; flex-direction:column; gap:0.6rem; font-size:14px; padding:0; margin:0;">
                    <li><a href="<?php echo esc_url(home_url('/teklif-al/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">Teklif Al</a></li>
                    <li><a href="<?php echo esc_url(home_url('/hasar-destek/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">Hasar Desteği</a></li>
                    <li><a href="<?php echo esc_url(home_url('/hakkimizda/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">Hakkımızda</a></li>
                    <li><a href="<?php echo esc_url(home_url('/kvkk-aydinlatma/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">KVKK Aydınlatma</a></li>
                    <li><a href="<?php echo esc_url(home_url('/sss/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">Sıkça Sorulan Sorular</a></li>
                    <li><a href="<?php echo esc_url(home_url('/iletisim/')); ?>" class="text-silver-400 hover:text-white transition-colors" style="text-decoration:none;">İletişim & Randevu</a></li>
                </ul>
            </div>

            <!-- CONTACT COLUMN -->
            <div class="lg:col-span-4">
                <h4 class="font-mono text-xs uppercase tracking-widest text-white mb-5 font-semibold" style="margin-bottom:1.25rem; letter-spacing:0.15em;">
                    İletişim & Danışma
                </h4>
                <div style="display:flex; flex-direction:column; gap:0.85rem; font-size:14px;">
                    <a href="<?php echo esc_attr($phone_url); ?>" class="flex items-center gap-3 text-silver-300 hover:text-white transition-colors" style="text-decoration:none; display:flex; align-items:center; gap:0.75rem;">
                        <span style="color:#10B981;"><?php echo plused_icon('phone', 'w-4 h-4'); ?></span>
                        <span class="font-mono text-sm font-semibold"><?php echo esc_html($phone_display); ?></span>
                    </a>

                    <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 text-emerald-400 hover:text-emerald-300 transition-colors" style="text-decoration:none; display:flex; align-items:center; gap:0.75rem;">
                        <span><?php echo plused_icon('whatsapp', 'w-4 h-4'); ?></span>
                        <span class="font-sans text-sm font-medium">WhatsApp Teklif & Danışma Hattı</span>
                    </a>

                    <a href="<?php echo esc_url($whatsapp_hasar_url); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 text-rose-400 hover:text-rose-300 transition-colors" style="text-decoration:none; display:flex; align-items:center; gap:0.75rem;">
                        <span><?php echo plused_icon('shield', 'w-4 h-4 text-rose-400'); ?></span>
                        <span class="font-sans text-sm font-medium">WhatsApp Hasar Destek Hattı</span>
                    </a>

                    <?php if (!empty($email)) : ?>
                        <a href="mailto:<?php echo esc_attr($email); ?>" class="flex items-center gap-3 text-silver-400 hover:text-white transition-colors" style="text-decoration:none; display:flex; align-items:center; gap:0.75rem;">
                            <span><?php echo plused_icon('mail', 'w-4 h-4'); ?></span>
                            <span class="text-sm"><?php echo esc_html($email); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php if (!empty($address)) : ?>
                        <div class="flex items-start gap-3 text-silver-400" style="display:flex; align-items:flex-start; gap:0.75rem; margin-top:0.25rem;">
                            <span style="margin-top:2px; flex-shrink:0;"><?php echo plused_icon('map-pin', 'w-4 h-4'); ?></span>
                            <span class="text-xs leading-relaxed"><?php echo nl2br(esc_html($address)); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($working_hours)) : ?>
                    <div class="flex items-center gap-3 text-silver-500" style="display:flex; align-items:center; gap:0.75rem; font-size:12px; margin-top:0.25rem;">
                        <span><?php echo plused_icon('clock', 'w-3.5 h-3.5'); ?></span>
                        <span><?php echo esc_html($working_hours); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- BOTTOM LEGAL -->
        <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-silver-500 font-sans" style="padding-top:2rem; display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; gap:1rem;">
            <div>
                &copy; <?php echo date('Y'); ?> <?php echo esc_html($company_name); ?>. Tüm hakları saklıdır.
            </div>
            <div style="display:flex; align-items:center; gap:1.5rem; flex-wrap:wrap;">
                <a href="<?php echo esc_url(home_url('/kvkk-aydinlatma/')); ?>" style="color:#64748B; text-decoration:none;">KVKK Aydınlatma Metni</a>
                <a href="<?php echo esc_url(home_url('/sss/')); ?>" style="color:#64748B; text-decoration:none;">Sıkça Sorulan Sorular</a>
                <a href="<?php echo esc_url(home_url('/iletisim/')); ?>" style="color:#64748B; text-decoration:none;">Bize Ulaşın</a>
            </div>
        </div>
    </div>
</footer>

<!-- MOBILE BOTTOM STICKY BAR -->
<div class="mobile-sticky-bar">
    <div class="mobile-sticky-inner">
        <a href="<?php echo esc_attr($phone_url); ?>" class="btn-secondary" style="flex:1; padding:0.65rem 0.5rem; font-size:11px; text-align:center; justify-content:center;">
            <?php echo plused_icon('phone', 'w-3.5 h-3.5 text-emerald-400'); ?>
            <span>Hemen Ara</span>
        </a>
        <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary" style="flex:1.2; padding:0.65rem 0.5rem; font-size:11px; text-align:center; justify-content:center; background:linear-gradient(135deg, #059669, #10B981); border-color:rgba(52,211,153,0.4);">
            <?php echo plused_icon('whatsapp', 'w-3.5 h-3.5 text-white'); ?>
            <span>WhatsApp</span>
        </a>
    </div>
</div>

<!-- CLAIM EMERGENCY MODAL (GLOBAL) -->
<div id="claim-modal" class="modal-overlay">
    <div class="modal-card">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.5rem; padding-bottom:1rem; border-bottom:1px solid rgba(255,255,255,0.1);">
            <div style="display:flex; align-items:center; gap:0.5rem;">
                <div style="width:32px; height:32px; border-radius:8px; background:rgba(225,29,72,0.15); display:flex; align-items:center; justify-content:center; color:#FB7185;">
                    <?php echo plused_icon('shield', 'w-4 h-4'); ?>
                </div>
                <div style="font-family:var(--font-serif); font-size:18px; color:#ffffff; font-weight:600;">
                    Hasar Sürecinde Acil Destek
                </div>
            </div>
            <button id="close-claim-modal" type="button" class="close-modal-btn" aria-label="Kapat" style="background:none; border:none; color:#94A3B8; font-size:24px; cursor:pointer; line-height:1;">&times;</button>
        </div>

        <p class="font-sans text-sm text-silver-300 leading-relaxed mb-6">
            Kaza veya hasar durumunda doğrudan acente danışmanınıza bağlanın. Bilgilerinizi, kaza yeri fotoğraflarını ve kaza tespit tutanağını WhatsApp hattımıza anında iletebilir veya doğrudan arayabilirsiniz.
        </p>

        <div style="display:flex; flex-direction:column; gap:0.75rem;">
            <a href="<?php echo esc_url($whatsapp_hasar_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary" style="width:100%; text-align:center; justify-content:center; background:linear-gradient(135deg, #059669, #10B981); border-color:rgba(52,211,153,0.4); text-decoration:none;">
                <?php echo plused_icon('whatsapp', 'w-4 h-4 text-white'); ?>
                <span>WhatsApp'tan Hasar Bildir</span>
            </a>
            <a href="<?php echo esc_attr($phone_url); ?>" class="btn-secondary" style="width:100%; text-align:center; justify-content:center; text-decoration:none;">
                <?php echo plused_icon('phone', 'w-4 h-4 text-emerald-400'); ?>
                <span>Hemen Ara: <?php echo esc_html($phone_display); ?></span>
            </a>
            <a href="<?php echo esc_url(home_url('/hasar-destek/')); ?>" class="text-xs text-center text-silver-400 hover:text-white" style="margin-top:0.5rem; text-decoration:none;">
                Hasar Süreç Rehberini Görüntüle &rarr;
            </a>

            <!-- MODAL KVKK NOTICE -->
            <p style="font-size:11px; color:#94A3B8; text-align:center; margin-top:0.5rem; margin-bottom:0; line-height:1.5;">
                Belge göndererek süreçlerin yürütülmesi için gerekli kişisel verilerin işlenmesine ilişkin bilgi için <a href="<?php echo esc_url(home_url('/kvkk-aydinlatma/')); ?>" style="color:#38BDF8; text-decoration:underline;">KVKK Aydınlatma Metni</a>'ni inceleyebilirsiniz.
            </p>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
