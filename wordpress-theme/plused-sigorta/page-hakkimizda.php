<?php
/**
 * Template Name: Hakkımızda Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$company_name  = plused_get_option('company_name', 'PLUSED SİGORTA');
$phone_display = plused_get_display_phone();
$phone_url     = plused_get_phone_url();
$whatsapp_url  = plused_build_whatsapp_link('Merhaba, danışmanınızla görüşmek istiyorum.');

// Corporate fields for transparency
$legal_title   = trim(plused_get_option('corporate_legal_title', ''));
$agency_name   = trim(plused_get_option('corporate_agency_name', ''));
$plate_number  = trim(plused_get_option('corporate_plate_number', ''));
$tax_office    = trim(plused_get_option('corporate_tax_office', ''));
$tax_number    = trim(plused_get_option('corporate_tax_number', ''));
$corp_address  = trim(plused_get_option('corporate_address', plused_get_option('address', '')));
$corp_email    = trim(plused_get_option('corporate_email', plused_get_option('email', '')));
$corp_phone    = trim(plused_get_option('corporate_phone', plused_get_display_phone()));

$corporate_fields = array();
if (!empty($legal_title))  $corporate_fields[] = array('label' => 'Ticari Unvan', 'value' => $legal_title);
if (!empty($agency_name))  $corporate_fields[] = array('label' => 'Acente Adı', 'value' => $agency_name);
if (!empty($plate_number)) $corporate_fields[] = array('label' => 'Acente / Levha Kayıt No', 'value' => $plate_number);
if (!empty($tax_office))   $corporate_fields[] = array('label' => 'Vergi Dairesi', 'value' => $tax_office);
if (!empty($tax_number))   $corporate_fields[] = array('label' => 'Vergi Numarası', 'value' => $tax_number);
if (!empty($corp_address)) $corporate_fields[] = array('label' => 'Açık Adres', 'value' => $corp_address, 'is_address' => true);
if (!empty($corp_email))   $corporate_fields[] = array('label' => 'Kurumsal E-posta', 'value' => $corp_email, 'is_email' => true);
if (!empty($corp_phone))   $corporate_fields[] = array('label' => 'Telefon', 'value' => $corp_phone);
?>

<main class="relative min-h-screen bg-navy-950 text-white pt-32 sm:pt-40 pb-28 px-6" style="background:#030712; padding-top:8rem; padding-bottom:7rem;">
    <!-- RADIANCE GLOW -->
    <div style="position:absolute; top:20%; left:50%; transform:translateX(-50%); width:800px; height:450px; background:rgba(0,102,255,0.06); border-radius:50%; filter:blur(180px); pointer-events:none;"></div>

    <div class="container-custom relative z-10">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" style="margin-bottom:1.5rem; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#94A3B8;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="color:#94A3B8; text-decoration:none;">Ana Sayfa</a>
            <span style="margin:0 0.5rem; color:rgba(255,255,255,0.3);">/</span>
            <span style="color:#38BDF8;">Hakkımızda</span>
        </nav>

        <!-- HEADER -->
        <div style="text-align:center; margin-bottom:4rem;">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-silver-300 mb-4" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); letter-spacing:0.2em;">
                <?php echo plused_icon('shield', 'w-3.5 h-3.5 text-electric-light'); ?>
                <span>Bağımsız Acentelik İlkeleri</span>
            </div>

            <h1 class="font-serif text-white font-medium mb-4" style="font-size:clamp(2.2rem, 4.5vw, 3.8rem); line-height:1.15;">
                Tek bir şirkete değil, sizin menfaatinize odaklıyız.
            </h1>

            <p class="text-silver-400 text-base sm:text-lg font-sans" style="font-size:1.15rem; max-width:42rem; margin:auto; line-height:1.7;">
                Geleneksel ve karmaşık sigortacılığı sadeleştiriyoruz. Müşterimizin gerçek risklerini analiz eder, Türkiye'nin önde gelen sigorta şirketlerinin tekliflerini masaya yatırır ve en doğru teminatı birlikte seçeriz.
            </p>
        </div>

        <!-- REUSE WHY-US & ABOUT CONTENT -->
        <?php get_template_part('template-parts/section', 'why-us'); ?>

        <div style="margin-top:4rem;">
            <?php get_template_part('template-parts/section', 'about'); ?>
        </div>

        <!-- CORPORATE CREDENTIALS & TRUST (ONLY SHOWN IF CONFIGURED) -->
        <?php if (!empty($corporate_fields)) : ?>
        <div style="margin-top:4.5rem; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.5rem; padding:clamp(1.5rem, 4vw, 3rem);">
            <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:1.5rem;">
                <div style="width:36px; height:36px; border-radius:10px; background:rgba(0,102,255,0.12); border:1px solid rgba(0,102,255,0.3); display:flex; align-items:center; justify-content:center; color:#38BDF8;">
                    <?php echo plused_icon('shield', 'w-4 h-4'); ?>
                </div>
                <div>
                    <span style="font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.15em; color:#38BDF8; font-weight:600; display:block;">Şeffaflık & Yasal Güvence</span>
                    <h2 class="font-serif text-xl sm:text-2xl text-white font-medium" style="margin:0;">Kurumsal Bilgiler</h2>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:1.25rem;">
                <?php foreach ($corporate_fields as $field) : ?>
                <div style="background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.06); border-radius:1rem; padding:1.25rem; <?php echo !empty($field['is_address']) ? 'grid-column:1 / -1;' : ''; ?>">
                    <span style="display:block; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#94A3B8; margin-bottom:0.35rem; font-weight:600;">
                        <?php echo esc_html($field['label']); ?>
                    </span>
                    <span style="font-size:14px; color:#FFFFFF; font-weight:500; line-height:1.5;">
                        <?php 
                        if (!empty($field['is_address'])) {
                            echo nl2br(esc_html($field['value']));
                        } elseif (!empty($field['is_email'])) {
                            echo '<a href="mailto:' . esc_attr($field['value']) . '" style="color:#38BDF8; text-decoration:none;">' . esc_html($field['value']) . '</a>';
                        } else {
                            echo esc_html($field['value']);
                        }
                        ?>
                    </span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- CONTACT CTA -->
        <div style="margin-top:5rem; text-align:center; padding:3rem 2rem; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.5rem;">
            <h2 class="font-serif text-white text-2xl sm:text-3xl mb-3">Bizimle Tanışın</h2>
            <p class="text-silver-400 font-sans text-sm sm:text-base max-w-xl mx-auto mb-6">
                Mevcut poliçenizi birlikte analiz edelim, eksik veya gereksiz teminatlarınızı değerlendirelim.
            </p>
            <div style="display:flex; flex-wrap:wrap; justify-content:center; gap:1rem;">
                <a href="<?php echo esc_url(home_url('/iletisim/')); ?>" class="btn-primary">
                    <span>İletişime Geç</span>
                    <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
                </a>
                <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary" style="background:rgba(37,211,102,0.1); border-color:rgba(37,211,102,0.3); color:#86EFAC;">
                    <?php echo plused_icon('whatsapp', 'w-4 h-4 text-emerald-400'); ?>
                    <span>WhatsApp Danışmanlığı</span>
                </a>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
