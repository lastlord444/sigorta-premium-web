<?php
/**
 * Template Name: KVKK Aydınlatma Metni
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Fetch corporate identity parameters from WordPress settings
$company_name       = plused_get_option('company_name', 'PLUSED SİGORTA');
$legal_title        = plused_get_option('corporate_legal_title', '');
$agency_name        = plused_get_option('corporate_agency_name', '');
$plate_number       = plused_get_option('corporate_plate_number', '');
$tax_office         = plused_get_option('corporate_tax_office', '');
$tax_number         = plused_get_option('corporate_tax_number', '');
$address            = plused_get_option('corporate_address', plused_get_option('address', ''));
$email              = plused_get_option('corporate_email', plused_get_option('email', ''));
$phone_display      = plused_get_option('corporate_phone', plused_get_display_phone());

// Effective display title for data controller
$controller_title = !empty($legal_title) ? $legal_title : (!empty($agency_name) ? $agency_name : $company_name);
?>

<main class="relative min-h-screen bg-navy-950 text-white pt-32 sm:pt-40 pb-28 px-6 overflow-hidden" style="background:#030712; padding-top:8rem; padding-bottom:7rem; overflow-x:hidden; max-width:100%;">
    <!-- RADIANCE GLOW -->
    <div style="position:absolute; top:20%; left:50%; transform:translateX(-50%); width:min(750px, 90vw); height:450px; background:rgba(0,102,255,0.06); border-radius:50%; filter:blur(180px); pointer-events:none;"></div>

    <div class="container-custom relative z-10" style="max-width:54rem;">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" style="margin-bottom:2rem; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#94A3B8;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="color:#94A3B8; text-decoration:none;">Ana Sayfa</a>
            <span style="margin:0 0.5rem; color:rgba(255,255,255,0.3);">/</span>
            <span style="color:#38BDF8;">KVKK Aydınlatma Metni</span>
        </nav>

        <!-- PAGE HEADER -->
        <div style="margin-bottom:3.5rem;">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-silver-300 mb-4" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); letter-spacing:0.2em;">
                <?php echo plused_icon('shield', 'w-3.5 h-3.5 text-electric-light'); ?>
                <span>6698 Sayılı Kanun Uyarınca</span>
            </div>

            <h1 class="font-serif text-white font-medium mb-4" style="font-size:clamp(2rem, 3.5vw, 3rem); line-height:1.2;">
                Kişisel Verilerin Korunması ve İşlenmesi Hakkında Aydınlatma Metni
            </h1>

            <p class="text-silver-400 text-sm sm:text-base font-sans leading-relaxed" style="line-height:1.7;">
                Bu aydınlatma metni, 6698 sayılı Kişisel Verilerin Korunması Kanunu ("KVKK") m. 10 ile Aydınlatma Yükümlülüğünün Yerine Getirilmesinde Uyulacak Usul ve Esaslar Hakkında Tebliğ kapsamında, veri sorumlusu sıfatıyla tarafımızca hazırlanmıştır.
            </p>
        </div>

        <!-- CONTENT SECTIONS CARD -->
        <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.5rem; padding:clamp(1.5rem, 4vw, 3rem); display:flex; flex-direction:column; gap:2.5rem;">
            
            <!-- 1. VERİ SORUMLUSUNUN KİMLİĞİ -->
            <section>
                <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:1rem;">
                    <span style="font-family:var(--font-mono); font-size:12px; color:#38BDF8; font-weight:600;">01</span>
                    <h2 class="font-serif text-xl sm:text-2xl text-white font-medium" style="margin:0;">
                        Veri Sorumlusunun Kimliği
                    </h2>
                </div>

                <p class="text-silver-300 text-sm leading-relaxed mb-4">
                    6698 sayılı Kişisel Verilerin Korunması Kanunu uyarınca, kişisel verileriniz veri sorumlusu olarak <strong><?php echo esc_html($controller_title); ?></strong> tarafından aşağıda açıklanan kapsamda işlenmektedir.
                </p>

                <?php 
                $has_corporate_meta = (!empty($legal_title) || !empty($agency_name) || !empty($plate_number) || !empty($tax_office) || !empty($address) || !empty($email) || !empty($phone_display));
                if ($has_corporate_meta) : 
                ?>
                <div style="background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.08); border-radius:1rem; padding:1.25rem; display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:1rem; font-size:13px;">
                    <?php if (!empty($legal_title)) : ?>
                    <div>
                        <span style="display:block; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; color:#94A3B8; margin-bottom:0.2rem;">Ticari Unvan</span>
                        <span style="color:#FFFFFF; font-weight:500;"><?php echo esc_html($legal_title); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($agency_name)) : ?>
                    <div>
                        <span style="display:block; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; color:#94A3B8; margin-bottom:0.2rem;">Acente Adı</span>
                        <span style="color:#FFFFFF; font-weight:500;"><?php echo esc_html($agency_name); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($plate_number)) : ?>
                    <div>
                        <span style="display:block; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; color:#94A3B8; margin-bottom:0.2rem;">Levha / Kayıt No</span>
                        <span style="color:#FFFFFF; font-weight:500;"><?php echo esc_html($plate_number); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($tax_office) || !empty($tax_number)) : ?>
                    <div>
                        <span style="display:block; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; color:#94A3B8; margin-bottom:0.2rem;">Vergi Dairesi / No</span>
                        <span style="color:#FFFFFF; font-weight:500;">
                            <?php echo esc_html(trim($tax_office . ' ' . $tax_number)); ?>
                        </span>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($address)) : ?>
                    <div style="grid-column: 1 / -1;">
                        <span style="display:block; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; color:#94A3B8; margin-bottom:0.2rem;">Adres</span>
                        <span style="color:#CBD5E1; line-height:1.5;"><?php echo nl2br(esc_html($address)); ?></span>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($email)) : ?>
                    <div>
                        <span style="display:block; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; color:#94A3B8; margin-bottom:0.2rem;">E-Posta</span>
                        <a href="mailto:<?php echo esc_attr($email); ?>" style="color:#38BDF8; text-decoration:none;"><?php echo esc_html($email); ?></a>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($phone_display)) : ?>
                    <div>
                        <span style="display:block; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; color:#94A3B8; margin-bottom:0.2rem;">Telefon</span>
                        <span style="color:#FFFFFF;"><?php echo esc_html($phone_display); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </section>

            <!-- 2. İŞLENEN KİŞİSEL VERİLER -->
            <section>
                <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:1rem;">
                    <span style="font-family:var(--font-mono); font-size:12px; color:#38BDF8; font-weight:600;">02</span>
                    <h2 class="font-serif text-xl sm:text-2xl text-white font-medium" style="margin:0;">
                        İşlenen Kişisel Veriler
                    </h2>
                </div>

                <p class="text-silver-300 text-sm leading-relaxed mb-4">
                    Sigortacılık aracılık faaliyetlerimizin, teklif hazırlama ve hasar süreçlerimizin yürütülmesi kapsamında aşağıdaki veri kategorileri işlenebilmektedir:
                </p>

                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:0.75rem; font-size:13px; color:#CBD5E1;">
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span><strong>Kimlik Bilgileri:</strong> Ad, soyad, T.C. kimlik numarası, doğum tarihi.</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span><strong>İletişim Bilgileri:</strong> Telefon numarası, e-posta adresi, tebligat ve ikametgah adresi.</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span><strong>Araç ve Tescil Bilgileri:</strong> Araç plakası, ruhsat belge seri no, şasi ve motor numarası, araç marka, model ve kullanım tarzı (araç sigortaları için).</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span><strong>Hasar ve Kaza Bilgileri:</strong> Islak imzalı veya mobil Kaza Tespit Tutanağı, kaza yeri fotoğrafları, polis/jandarma zabıtları, hasar beyanları, ekspertiz ve onarım bilgileri (hasar destek süreçleri için).</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span><strong>Mülk ve Konut Bilgileri:</strong> Tapu/adres kodu (UAVT), bina yapı tarzı, brüt metrekare ve kat bilgileri (konut ve DASK sigortaları için).</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span><strong>Poliçe ve İşlem Bilgileri:</strong> Poliçe numarası, prim ve ödeme geçmişi, hasarsızlık indirim basamağı, IBAN bilgisi (tazminat iadeleri ve ödemeler için).</span>
                    </li>
                </ul>
            </section>

            <!-- 3. KİŞİSEL VERİLERİN İŞLENME AMAÇLARI -->
            <section>
                <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:1rem;">
                    <span style="font-family:var(--font-mono); font-size:12px; color:#38BDF8; font-weight:600;">03</span>
                    <h2 class="font-serif text-xl sm:text-2xl text-white font-medium" style="margin:0;">
                        Kişisel Verilerin İşlenme Amaçları
                    </h2>
                </div>

                <p class="text-silver-300 text-sm leading-relaxed mb-4">
                    Kişisel verileriniz KVKK'nın 5. ve 6. maddelerinde belirtilen şartlara uygun olarak aşağıdaki amaçlarla işlenmektedir:
                </p>

                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:0.75rem; font-size:13px; color:#CBD5E1;">
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>Talebiniz doğrultusunda anlaşmalı sigorta şirketlerinden fiyat ve teminat tekliflerinin sorgulanması, karşılaştırılması ve tarafınıza sunulması,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>Sigorta sözleşmesinin kurulması, poliçenin tanzimi, zeyil ve yenileme işlemlerinin yürütülmesi,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>Kaza ve hasar anında dosya açılması, belgelerin sigorta şirketine ve eksperlere iletilmesi, çekici, onarım ve ikame araç koordinasyonunun sağlanması,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>İletişim faaliyetlerinin yürütülmesi ve poliçe vade hatırlatmalarının yapılması,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>Sigortacılık mevzuatı, SEDDK ve Sigorta Bilgi ve Gözetim Merkezi (SBM) kuralları gereğince yasal yükümlülüklerin yerine getirilmesi.</span>
                    </li>
                </ul>
            </section>

            <!-- 4. KİŞİSEL VERİLERİN AKTARILMASI -->
            <section>
                <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:1rem;">
                    <span style="font-family:var(--font-mono); font-size:12px; color:#38BDF8; font-weight:600;">04</span>
                    <h2 class="font-serif text-xl sm:text-2xl text-white font-medium" style="margin:0;">
                        Kişisel Verilerin Aktarılması
                    </h2>
                </div>

                <p class="text-silver-300 text-sm leading-relaxed">
                    Kişisel verileriniz, yalnızca yukarıda belirtilen amaçların gerçekleştirilebilmesi doğrultusunda ve KVKK'nın 8. ve 9. maddelerine uygun olarak; teklif çalışması yürüttüğümüz anlaşmalı sigorta şirketlerine, hasar durumunda bağımsız sigorta eksperlerine ve yetkili/anlaşmalı servis istasyonlarına, kanunen yetkili kamu kurum ve kuruluşlarına (SEDDK, SBM, adli ve idari merciler) mevzuat sınırları dahilinde aktarılabilmektedir.
                </p>
            </section>

            <!-- 5. TOPLAMA YÖNTEMİ VE HUKUKİ SEBEP -->
            <section>
                <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:1rem;">
                    <span style="font-family:var(--font-mono); font-size:12px; color:#38BDF8; font-weight:600;">05</span>
                    <h2 class="font-serif text-xl sm:text-2xl text-white font-medium" style="margin:0;">
                        Toplama Yöntemi ve Hukuki Sebep
                    </h2>
                </div>

                <p class="text-silver-300 text-sm leading-relaxed mb-4">
                    Kişisel verileriniz; web sitemiz, resmi WhatsApp hattımız, telefon görüşmeleri, e-posta veya fiziki kanallar aracılığıyla elektronik ve fiziki ortamlarda toplanmaktadır.
                </p>

                <p class="text-silver-300 text-sm leading-relaxed mb-2">
                    Söz konusu veriler, 6698 sayılı KVKK'nın 5. maddesinin 2. fıkrasında düzenlenen şu hukuki sebeplere dayalı olarak işlenmektedir:
                </p>

                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:0.6rem; font-size:13px; color:#CBD5E1;">
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span><strong>Sözleşmenin Kurulması ve İfası (m. 5/2-c):</strong> Sigorta teklifi hazırlanması ve poliçenin kurulmasıyla doğrudan ilgili olması,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span><strong>Hukuki Yükümlülük (m. 5/2-ç):</strong> Sigortacılık Kanunu ve ilgili mevzuat uyarınca acentelik yükümlülüklerinin yerine getirilmesi,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span><strong>Bir Hakkın Tesisi ve Korunması (m. 5/2-e):</strong> Hasar tazminat süreçlerinin takibi ve uyuşmazlıklarda ispat hakkının kullanılması,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span><strong>Meşru Menfaat (m. 5/2-f):</strong> Temel hak ve özgürlüklerinize zarar vermemek kaydıyla acente operasyonlarının ve müşteri memnuniyetinin sağlanması.</span>
                    </li>
                </ul>
            </section>

            <!-- 6. KVKK KAPSAMINDAKİ HAKLAR (MADDE 11) -->
            <section>
                <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:1rem;">
                    <span style="font-family:var(--font-mono); font-size:12px; color:#38BDF8; font-weight:600;">06</span>
                    <h2 class="font-serif text-xl sm:text-2xl text-white font-medium" style="margin:0;">
                        KVKK Kapsamındaki Haklarınız
                    </h2>
                </div>

                <p class="text-silver-300 text-sm leading-relaxed mb-4">
                    6698 sayılı Kanun'un 11. maddesi uyarınca veri sahibi olarak;
                </p>

                <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:0.6rem; font-size:13px; color:#CBD5E1;">
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>Kişisel verilerinizin işlenip işlenmediğini öğrenme,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>İşlenmişse buna ilişkin bilgi talep etme,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>İşlenme amacını ve bunların amacına uygun kullanılıp kullanılmadığını öğrenme,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>Yurt içinde veya yurt dışında kişisel verilerin aktarıldığı üçüncü kişileri bilme,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>Eksik veya yanlış işlenmiş olması hâlinde bunların düzeltilmesini isteme,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>KVKK'nın 7. maddesinde öngörülen şartlar çerçevesinde kişisel verilerin silinmesini veya yok edilmesini isteme,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>Düzeltme, silme ve yok edilme işlemlerinin verilerin aktarıldığı üçüncü kişilere bildirilmesini isteme,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>İşlenen verilerin münhasıran otomatik sistemler vasıtasıyla analiz edilmesi suretiyle kişinin kendisi aleyhine bir sonucun ortaya çıkmasına itiraz etme,</span>
                    </li>
                    <li style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; font-weight:bold; line-height:1.4;">&bull;</span>
                        <span>Kanuna aykırı olarak işlenmesi sebebiyle zarara uğraması hâlinde zararın giderilmesini talep etme haklarına sahipsiniz.</span>
                    </li>
                </ul>
            </section>

            <!-- 7. BAŞVURU VE İLETİŞİM -->
            <section>
                <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:1rem;">
                    <span style="font-family:var(--font-mono); font-size:12px; color:#38BDF8; font-weight:600;">07</span>
                    <h2 class="font-serif text-xl sm:text-2xl text-white font-medium" style="margin:0;">
                        Başvuru / İletişim
                    </h2>
                </div>

                <p class="text-silver-300 text-sm leading-relaxed mb-4">
                    Yukarıda belirtilen haklarınıza ilişkin taleplerinizi, <em>Veri Sorumlusuna Başvuru Usul ve Esasları Hakkında Tebliğ</em>'e uygun olarak kimliğinizi tevsik eden belgelerle birlikte;
                </p>

                <div style="background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); border-radius:1rem; padding:1.25rem; display:flex; flex-direction:column; gap:0.75rem; font-size:13px;">
                    <?php if (!empty($address)) : ?>
                    <div style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; margin-top:2px; flex-shrink:0;"><?php echo plused_icon('map-pin', 'w-4 h-4'); ?></span>
                        <div>
                            <strong>Fiziki Başvuru:</strong> <?php echo nl2br(esc_html($address)); ?> adresine ıslak imzalı dilekçe ile şahsen veya noter vasıtasıyla,
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($email)) : ?>
                    <div style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; margin-top:2px; flex-shrink:0;"><?php echo plused_icon('mail', 'w-4 h-4'); ?></span>
                        <div>
                            <strong>Elektronik Başvuru:</strong> Sistemlerimizde kayıtlı e-posta adresiniz üzerinden <a href="mailto:<?php echo esc_attr($email); ?>" style="color:#38BDF8; text-decoration:none;"><?php echo esc_html($email); ?></a> adresine konu kısmında "KVKK Bilgi Talebi" belirterek,
                        </div>
                    </div>
                    <?php endif; ?>

                    <div style="display:flex; align-items:flex-start; gap:0.6rem;">
                        <span style="color:#38BDF8; margin-top:2px; flex-shrink:0;"><?php echo plused_icon('phone', 'w-4 h-4'); ?></span>
                        <div>
                            <strong>Danışma:</strong> Başvuru yöntemleri hakkında ön bilgi almak için <span style="color:#FFFFFF; font-weight:600;"><?php echo esc_html($phone_display); ?></span> numaralı hattımızdan danışmanlarımıza ulaşabilirsiniz.
                        </div>
                    </div>
                </div>

                <p class="text-silver-400 text-xs mt-4 mb-0" style="line-height:1.6;">
                    Başvurunuzda yer alan talepleriniz, niteliğine göre en geç otuz gün içinde ücretsiz olarak sonuçlandırılacaktır. İşlemin ayrıca bir maliyet gerektirmesi hâlinde Kişisel Verileri Koruma Kurulu tarafından belirlenen tarifedeki ücret alınabilir.
                </p>
            </section>

        </div>

        <!-- BOTTOM RETURN NAVIGATION -->
        <div style="margin-top:2.5rem; text-align:center;">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-secondary" style="padding:0.75rem 1.75rem; font-size:13px; text-decoration:none;">
                &larr; Ana Sayfaya Dön
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
