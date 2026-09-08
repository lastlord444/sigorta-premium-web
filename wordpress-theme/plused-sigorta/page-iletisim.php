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

$options       = get_option('plused_sigorta_options', array());
$company_name  = plused_get_option('company_name', 'PLUSED SİGORTA');
$phone_display = plused_get_display_phone();
$phone_url     = plused_get_phone_url();
$whatsapp_url  = plused_build_whatsapp_link('Merhaba, ofisinizle iletişime geçmek istiyorum.');
$email         = plused_get_option('email', '');
$address       = plused_get_option('address', '');
$working_hours = plused_get_option('working_hours', '');
?>

<main class="relative min-h-screen bg-navy-950 text-white pt-32 sm:pt-40 pb-28 px-6" style="background:#030712; padding-top:8rem; padding-bottom:7rem;">
    <!-- RADIANCE GLOW -->
    <div style="position:absolute; top:20%; left:50%; transform:translateX(-50%); width:700px; height:450px; background:rgba(0,102,255,0.06); border-radius:50%; filter:blur(180px); pointer-events:none;"></div>

    <div class="container-custom relative z-10" style="max-width:64rem; margin:auto;">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" style="margin-bottom:1.5rem; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#94A3B8;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="color:#94A3B8; text-decoration:none;">Ana Sayfa</a>
            <span style="margin:0 0.5rem; color:rgba(255,255,255,0.3);">/</span>
            <span style="color:#38BDF8;">İletişim</span>
        </nav>

        <!-- HEADER -->
        <div style="text-align:center; margin-bottom:4rem;">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-silver-300 mb-4" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); letter-spacing:0.2em;">
                <?php echo plused_icon('shield', 'w-3.5 h-3.5 text-electric-light'); ?>
                <span>Doğrudan & Birebir İletişim</span>
            </div>

            <h1 class="font-serif text-white font-medium mb-4" style="font-size:clamp(2.2rem, 4.5vw, 3.8rem); line-height:1.15;">
                Bizimle İletişime Geçin
            </h1>

            <p class="text-silver-400 text-base font-sans" style="font-size:1.1rem; max-width:38rem; margin:auto; line-height:1.7;">
                Poliçe teklifi, vade yenilemesi veya hasar süreçleriniz için uzman acente danışmanlarımıza ulaşabilirsiniz.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            <!-- CONTACT INFO CARDS -->
            <div class="lg:col-span-5 flex flex-col gap-4">
                <!-- Phone Card -->
                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:1.5rem;">
                    <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.75rem;">
                        <div style="width:38px; height:38px; border-radius:10px; background:rgba(0,102,255,0.1); border:1px solid rgba(0,102,255,0.25); display:flex; align-items:center; justify-content:center; color:#38BDF8;">
                            <?php echo plused_icon('phone', 'w-4 h-4'); ?>
                        </div>
                        <div>
                            <div style="font-size:11px; font-family:var(--font-mono); text-transform:uppercase; color:#94A3B8; letter-spacing:0.1em;">Telefon Hattı</div>
                            <a href="<?php echo esc_attr($phone_url); ?>" style="color:#FFFFFF; text-decoration:none; font-size:16px; font-weight:600; font-family:var(--font-mono);">
                                <?php echo esc_html($phone_display); ?>
                            </a>
                        </div>
                    </div>
                    <p style="font-size:12px; color:#64748B;">Hafta içi mesai saatlerinde doğrudan danışmanınıza bağlanırsınız.</p>
                </div>

                <!-- WhatsApp Card -->
                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(37,211,102,0.2); border-radius:1.25rem; padding:1.5rem;">
                    <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.75rem;">
                        <div style="width:38px; height:38px; border-radius:10px; background:rgba(37,211,102,0.1); border:1px solid rgba(37,211,102,0.25); display:flex; align-items:center; justify-content:center; color:#34D399;">
                            <?php echo plused_icon('whatsapp', 'w-4 h-4'); ?>
                        </div>
                        <div>
                            <div style="font-size:11px; font-family:var(--font-mono); text-transform:uppercase; color:#94A3B8; letter-spacing:0.1em;">Resmi WhatsApp</div>
                            <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" style="color:#86EFAC; text-decoration:none; font-size:15px; font-weight:600;">
                                WhatsApp'tan Mesaj Gönder &rarr;
                            </a>
                        </div>
                    </div>
                    <p style="font-size:12px; color:#64748B;">Ruhsat fotoğrafı, poliçe talebi ve sorularınız için WhatsApp hattımıza yazabilirsiniz.</p>
                </div>

                <!-- Email Card -->
                <?php if (!empty($email)) : ?>
                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:1.5rem;">
                    <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.5rem;">
                        <div style="width:38px; height:38px; border-radius:10px; background:rgba(255,255,255,0.05); display:flex; align-items:center; justify-content:center; color:#94A3B8;">
                            <?php echo plused_icon('mail', 'w-4 h-4'); ?>
                        </div>
                        <div>
                            <div style="font-size:11px; font-family:var(--font-mono); text-transform:uppercase; color:#94A3B8; letter-spacing:0.1em;">E-Posta</div>
                            <a href="mailto:<?php echo esc_attr($email); ?>" style="color:#FFFFFF; text-decoration:none; font-size:14px; font-weight:500;">
                                <?php echo esc_html($email); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Address & Hours -->
                <?php if (!empty($address) || !empty($working_hours)) : ?>
                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:1.5rem;">
                    <?php if (!empty($address)) : ?>
                    <div style="<?php echo !empty($working_hours) ? 'margin-bottom:1rem;' : ''; ?>">
                        <div style="font-size:11px; font-family:var(--font-mono); text-transform:uppercase; color:#94A3B8; letter-spacing:0.1em; margin-bottom:0.25rem;">Ofis Adresi</div>
                        <p style="font-size:13px; color:#CBD5E1; line-height:1.5;"><?php echo nl2br(esc_html($address)); ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($working_hours)) : ?>
                    <div>
                        <div style="font-size:11px; font-family:var(--font-mono); text-transform:uppercase; color:#94A3B8; letter-spacing:0.1em; margin-bottom:0.25rem;">Çalışma Saatleri</div>
                        <p style="font-size:13px; color:#CBD5E1;"><?php echo esc_html($working_hours); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- CONTACT FORM / CONSULTATION CARD -->
            <div class="lg:col-span-7" style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.09); border-radius:1.5rem; padding:clamp(1.5rem, 4vw, 2.5rem); backdrop-filter:blur(14px);">
                <h2 class="font-serif text-white font-medium text-2xl mb-2">Bize Not Bırakın</h2>
                <p class="text-silver-400 font-sans text-sm mb-6">
                    Bilgilerinizi bırakın, uzman sigorta danışmanımız en geç 15 dakika içinde sizi arasın.
                </p>

                <form id="contact-page-form" style="display:flex; flex-direction:column; gap:1.25rem;">
                    <div>
                        <label for="contact-name" class="font-mono text-xs uppercase tracking-wider text-silver-300 block mb-1">
                            Adınız Soyadınız <span style="color:#F43F5E;">*</span>
                        </label>
                        <input type="text" id="contact-name" class="form-input" placeholder="Ad Soyad" required />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="contact-phone" class="font-mono text-xs uppercase tracking-wider text-silver-300 block mb-1">
                                Telefon Numaranız <span style="color:#F43F5E;">*</span>
                            </label>
                            <input type="tel" id="contact-phone" class="form-input" placeholder="05XX XXX XX XX" required />
                        </div>
                        <div>
                            <label for="contact-subject" class="font-mono text-xs uppercase tracking-wider text-silver-300 block mb-1">
                                İlgilendiğiniz Sigorta
                            </label>
                            <select id="contact-subject" class="form-input">
                                <option value="kasko">Kasko Sigortası</option>
                                <option value="trafik">Trafik Sigortası</option>
                                <option value="konut">Konut Sigortası</option>
                                <option value="dask">DASK</option>
                                <option value="saglik">Sağlık Sigortası</option>
                                <option value="isyeri">İşyeri Sigortası</option>
                                <option value="diger">Diğer / Genel Danışmanlık</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="contact-message" class="font-mono text-xs uppercase tracking-wider text-silver-300 block mb-1">
                            Mesajınız / Notunuz
                        </label>
                        <textarea id="contact-message" class="form-input" rows="4" placeholder="Danışmak istediğiniz detayları veya araç plakasını buraya yazabilirsiniz..."></textarea>
                    </div>

                    <button type="submit" class="btn-primary" style="padding:1rem; width:100%; font-size:13px; margin-top:0.5rem;">
                        <span>Danışman Talebi Gönder</span>
                        <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
                    </button>
                    <div id="contact-form-success" style="display:none; padding:1rem; border-radius:0.75rem; background:rgba(16,185,129,0.15); border:1px solid #10B981; color:#A7F3D0; font-size:13px; text-align:center;">
                        Talebiniz başarıyla alındı. Uzman danışmanımız en kısa sürede sizinle iletişime geçecektir.
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
