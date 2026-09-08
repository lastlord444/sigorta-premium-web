<?php
/**
 * Template Name: Hasar Destek Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone_display = plused_get_display_phone();
$phone_url     = plused_get_phone_url();
$whatsapp_url  = plused_build_whatsapp_link('Merhaba, hasar bildirimi yapmak istiyorum. Kaza tutanağımı ve hasar fotoğraflarını iletiyorum.');
?>

<main class="relative min-h-screen bg-navy-950 text-white pt-32 sm:pt-40 pb-28 px-6" style="background:#030712; padding-top:8rem; padding-bottom:7rem;">
    <!-- AMBIENT EMERGENCY GLOW -->
    <div style="position:absolute; top:20%; left:50%; transform:translateX(-50%); width:750px; height:450px; background:rgba(225,29,72,0.05); border-radius:50%; filter:blur(180px); pointer-events:none;"></div>

    <div class="container-custom relative z-10">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" style="margin-bottom:1.5rem; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#94A3B8;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="color:#94A3B8; text-decoration:none;">Ana Sayfa</a>
            <span style="margin:0 0.5rem; color:rgba(255,255,255,0.3);">/</span>
            <span style="color:#FB7185;">Hasar Destek</span>
        </nav>

        <!-- HEADER -->
        <div style="text-align:center; margin-bottom:4rem;">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-rose-300 mb-4" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(244,63,94,0.1); border:1px solid rgba(244,63,94,0.25); letter-spacing:0.2em;">
                <?php echo plused_icon('shield', 'w-3.5 h-3.5 text-rose-400'); ?>
                <span>Hasar Sürecinde Danışmanlık Desteği</span>
            </div>

            <h1 class="font-serif text-white font-medium mb-4" style="font-size:clamp(2.2rem, 4.5vw, 3.8rem); line-height:1.15;">
                Hasar sürecinde yalnız değilsiniz.
            </h1>

            <p class="text-silver-400 text-base sm:text-lg font-sans" style="font-size:1.15rem; max-width:42rem; margin:auto; line-height:1.7;">
                Poliçe yaptırmanın asıl sebebi hasar günüdür. Kaza, yangın, su baskını veya sağlık acilinde çağrı merkezi robotlarına değil, dosyanızı bizzat sahiplenen acente danışmanınıza ulaşırsınız.
            </p>

            <div style="margin-top:2rem; display:flex; flex-wrap:wrap; justify-content:center; gap:1rem;">
                <button type="button" class="btn-emergency open-claim-modal" style="display:inline-flex; align-items:center; gap:0.6rem; padding:0.95rem 2rem; border-radius:0.75rem; background:linear-gradient(135deg, #E11D48, #BE123C); color:#FFFFFF; font-weight:600; font-size:13px; text-transform:uppercase; letter-spacing:0.1em; border:1px solid rgba(244,63,94,0.5); box-shadow:0 0 30px rgba(225,29,72,0.4); cursor:pointer;">
                    <?php echo plused_icon('shield', 'w-4 h-4'); ?>
                    <span>Acil Hasar Bildir</span>
                </button>

                <a href="<?php echo esc_attr($phone_url); ?>" class="btn-secondary" style="padding:0.95rem 2rem; font-size:13px;">
                    <?php echo plused_icon('phone', 'w-4 h-4 text-emerald-400'); ?>
                    <span>Hemen Ara: <?php echo esc_html($phone_display); ?></span>
                </a>

                <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary" style="background:rgba(37,211,102,0.1); border-color:rgba(37,211,102,0.3); color:#86EFAC;">
                    <?php echo plused_icon('whatsapp', 'w-4 h-4 text-emerald-400'); ?>
                    <span>WhatsApp Hasar Destek Hattı</span>
                </a>
            </div>

            <!-- KVKK LEGAL NOTICE -->
            <div style="margin-top:1.25rem;">
                <p style="font-size:12px; color:#94A3B8; margin:0; line-height:1.6;">
                    Belge göndererek teklif/hasar sürecinin yürütülmesi için gerekli kişisel verilerin işlenmesine ilişkin bilgi için <a href="<?php echo esc_url(home_url('/kvkk-aydinlatma/')); ?>" style="color:#38BDF8; text-decoration:underline;">KVKK Aydınlatma Metni</a>'ni inceleyebilirsiniz.
                </p>
            </div>
        </div>

        <!-- 3 STEPS IN AN ACCIDENT -->
        <div style="margin-bottom:3.5rem;">
            <h2 class="font-serif text-white font-medium text-2xl text-center mb-8">
                Trafik Kazası Durumunda Adım Adım Ne Yapmalısınız?
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(min(100%, 250px), 1fr)); gap:1.5rem;">
                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:clamp(1.25rem, 3vw, 1.75rem); min-width:0;">
                    <div style="display:inline-block; font-family:var(--font-mono); font-size:12px; color:#FB7185; padding:0.25rem 0.6rem; border-radius:6px; background:rgba(244,63,94,0.1); margin-bottom:1rem; font-weight:600;">
                        ADIM 01
                    </div>
                    <h3 class="font-serif text-white font-medium text-lg mb-3">Güvenliği Sağlayın & Fotoğraflayın</h3>
                    <p class="font-sans text-silver-400 text-sm leading-relaxed">
                        Öncelikle can güvenliğinizi sağlayın, dörtlülerinizi yakın ve reflektörü kuralına uygun yerleştirin. Mümkünse araçların konumunu bozmadan, kaza alanının geniş açılı ve plakalar net görülecek şekilde fotoğraflarını çekin.
                    </p>
                </div>

                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:clamp(1.25rem, 3vw, 1.75rem); min-width:0;">
                    <div style="display:inline-block; font-family:var(--font-mono); font-size:12px; color:#FB7185; padding:0.25rem 0.6rem; border-radius:6px; background:rgba(244,63,94,0.1); margin-bottom:1rem; font-weight:600;">
                        ADIM 02
                    </div>
                    <h3 class="font-serif text-white font-medium text-lg mb-3">Maddi Hasarlı Kazalarda Tutanağı Doldurun</h3>
                    <p class="font-sans text-silver-400 text-sm leading-relaxed">
                        Kaza Tespit Tutanağı yalnızca iki veya daha fazla aracın karıştığı, tarafların uzlaştığı ve kanunen kendi aralarında tutanak düzenlemeye uygun olduğu maddi hasarlı kazalarda karşılıklı ıslak imzayla veya e-Devlet Mobil Kaza Tutanağı ile düzenlenmelidir. Karşı tarafın ruhsat, ehliyet ve trafik sigortası poliçe görsellerini mutlaka karşılıklı temin edin.
                    </p>
                </div>

                <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem; padding:clamp(1.25rem, 3vw, 1.75rem); min-width:0;">
                    <div style="display:inline-block; font-family:var(--font-mono); font-size:12px; color:#FB7185; padding:0.25rem 0.6rem; border-radius:6px; background:rgba(244,63,94,0.1); margin-bottom:1rem; font-weight:600;">
                        ADIM 03
                    </div>
                    <h3 class="font-serif text-white font-medium text-lg mb-3">Acentemize Bildirin & Dosya Açın</h3>
                    <p class="font-sans text-silver-400 text-sm leading-relaxed">
                        Resmi işlemler ve kaza yeri güvenliği sağlandıktan sonra, acentemizi arayarak veya WhatsApp'tan tutanak ve fotoğrafları bize iletin. Anlaşmalı yetkili servisi, poliçeniz kapsamındaki çekiciyi ve ikame araç sürecini birlikte koordine edelim.
                    </p>
                </div>
            </div>
        </div>

        <!-- EXPLICIT WARNING CALLOUT BOX: Hangi durumlarda kendi aranızda Kaza Tespit Tutanağı düzenlememelisiniz? -->
        <div style="background:linear-gradient(135deg, rgba(225,29,72,0.08), rgba(15,23,42,0.6)); border:1px solid rgba(244,63,94,0.35); border-radius:1.5rem; padding:clamp(1.5rem, 4vw, 2.5rem); margin-bottom:4.5rem; box-shadow:0 10px 40px rgba(225,29,72,0.15);">
            <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:1.25rem;">
                <div style="width:40px; height:40px; border-radius:10px; background:rgba(244,63,94,0.2); border:1px solid rgba(244,63,94,0.4); display:flex; align-items:center; justify-content:center; color:#FB7185; flex-shrink:0;">
                    <?php echo plused_icon('shield', 'w-5 h-5'); ?>
                </div>
                <h3 class="font-serif text-white font-medium text-xl sm:text-2xl" style="margin:0;">
                    Hangi durumlarda kendi aranızda Kaza Tespit Tutanağı düzenlememelisiniz?
                </h3>
            </div>

            <p class="font-sans text-silver-300 text-sm sm:text-base leading-relaxed mb-6" style="line-height:1.7;">
                Mevzuat gereğince aşağıdaki hallerden en az birinin bulunması durumunda tarafların kendi aralarında kaza tespit tutanağı düzenlemesi <strong>geçerli değildir</strong>:
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(min(100%, 250px), 1fr)); gap:0.75rem;">
                <div style="display:flex; align-items:flex-start; gap:0.6rem; padding:0.85rem 1rem; border-radius:0.75rem; background:rgba(0,0,0,0.35); border:1px solid rgba(244,63,94,0.2);">
                    <span style="color:#FB7185; font-weight:bold; line-height:1; font-size:16px;">&bull;</span>
                    <span class="text-xs sm:text-sm text-silver-200">Yaralanma veya ölüm varsa</span>
                </div>
                <div style="display:flex; align-items:flex-start; gap:0.6rem; padding:0.85rem 1rem; border-radius:0.75rem; background:rgba(0,0,0,0.35); border:1px solid rgba(244,63,94,0.2);">
                    <span style="color:#FB7185; font-weight:bold; line-height:1; font-size:16px;">&bull;</span>
                    <span class="text-xs sm:text-sm text-silver-200">Sürücülerden birinin ehliyeti yoksa veya araç sınıfına uygun değilse</span>
                </div>
                <div style="display:flex; align-items:flex-start; gap:0.6rem; padding:0.85rem 1rem; border-radius:0.75rem; background:rgba(0,0,0,0.35); border:1px solid rgba(244,63,94,0.2);">
                    <span style="color:#FB7185; font-weight:bold; line-height:1; font-size:16px;">&bull;</span>
                    <span class="text-xs sm:text-sm text-silver-200">Araçlardan birinin geçerli zorunlu trafik sigortası yoksa</span>
                </div>
                <div style="display:flex; align-items:flex-start; gap:0.6rem; padding:0.85rem 1rem; border-radius:0.75rem; background:rgba(0,0,0,0.35); border:1px solid rgba(244,63,94,0.2);">
                    <span style="color:#FB7185; font-weight:bold; line-height:1; font-size:16px;">&bull;</span>
                    <span class="text-xs sm:text-sm text-silver-200">Sürücülerde alkol, uyuşturucu veya uyarıcı madde şüphesi varsa</span>
                </div>
                <div style="display:flex; align-items:flex-start; gap:0.6rem; padding:0.85rem 1rem; border-radius:0.75rem; background:rgba(0,0,0,0.35); border:1px solid rgba(244,63,94,0.2);">
                    <span style="color:#FB7185; font-weight:bold; line-height:1; font-size:16px;">&bull;</span>
                    <span class="text-xs sm:text-sm text-silver-200">Kazaya kamu kurumuna ait bir araç karışmışsa</span>
                </div>
                <div style="display:flex; align-items:flex-start; gap:0.6rem; padding:0.85rem 1rem; border-radius:0.75rem; background:rgba(0,0,0,0.35); border:1px solid rgba(244,63,94,0.2);">
                    <span style="color:#FB7185; font-weight:bold; line-height:1; font-size:16px;">&bull;</span>
                    <span class="text-xs sm:text-sm text-silver-200">Kamu malına veya üçüncü kişilere ait mala (bariyer, direk, bina vb.) zarar verilmişse</span>
                </div>
                <div style="display:flex; align-items:flex-start; gap:0.6rem; padding:0.85rem 1rem; border-radius:0.75rem; background:rgba(0,0,0,0.35); border:1px solid rgba(244,63,94,0.2);">
                    <span style="color:#FB7185; font-weight:bold; line-height:1; font-size:16px;">&bull;</span>
                    <span class="text-xs sm:text-sm text-silver-200">Kaza yalnız tek aracın karıştığı maddi hasarlı bir kazaysa</span>
                </div>
            </div>

            <!-- OFFICIAL EMERGENCY CALL DIRECTIVE -->
            <div style="padding:1.25rem 1.5rem; border-radius:1rem; background:rgba(225,29,72,0.12); border:1px solid rgba(244,63,94,0.4);">
                <div style="display:flex; align-items:flex-start; gap:0.75rem;">
                    <div style="color:#FB7185; margin-top:2px; flex-shrink:0;">
                        <?php echo plused_icon('shield', 'w-5 h-5'); ?>
                    </div>
                    <div>
                        <div style="font-weight:600; color:#FFFFFF; font-size:14px; margin-bottom:0.25rem;">
                            Önemli Yasal Yönlendirme & Can Güvenliği Önceliği
                        </div>
                        <p style="margin:0; font-size:13px; color:#FECDD3; line-height:1.65;">
                            Bu gibi durumlarda araçların konumu değiştirilmeden derhal <strong>112 Acil Çağrı Merkezi</strong> aranmalı; Polis veya Jandarma trafik ekiplerine <strong>resmi kaza tespit tutanağı</strong> düzenletilmelidir. Can güvenliği her şeyden önce gelir. Acente iletişimi veya WhatsApp bildirim adımları, resmi kolluk ve acil durum müdahale adımlarının önüne geçmemelidir.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- REQUIRED CLAIM DOCUMENTS CHECKLIST -->
        <div style="background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.5rem; padding:clamp(1.5rem, 4vw, 3rem); margin-bottom:4rem;">
            <h2 class="font-serif text-white font-medium text-2xl mb-6">
                Hasar Dosyası İçin Gerekli Evraklar
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <h3 class="font-mono text-xs uppercase tracking-widest text-electric-light mb-4 font-semibold">
                        Araç Hasarları (Kasko & Trafik)
                    </h3>
                    <ul style="list-style:none; display:flex; flex-direction:column; gap:0.6rem; font-size:14px; color:#CBD5E1; padding:0; margin:0;">
                        <li style="display:flex; align-items:center; gap:0.5rem;">
                            <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                            <span>Islak imzalı Kaza Tespit Tutanağı veya Polis / Jandarma Zaptı</span>
                        </li>
                        <li style="display:flex; align-items:center; gap:0.5rem;">
                            <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                            <span>Araçların kaza yerindeki detaylı ve plaka görünen fotoğrafları</span>
                        </li>
                        <li style="display:flex; align-items:center; gap:0.5rem;">
                            <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                            <span>Her iki tarafın ruhsat ve sürücü belgesi (ehliyet) fotokopileri</span>
                        </li>
                        <li style="display:flex; align-items:center; gap:0.5rem;">
                            <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                            <span>Alkol raporu (resmi zabıt tutulduysa)</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-mono text-xs uppercase tracking-widest text-electric-light mb-4 font-semibold">
                        Konut & İşyeri Hasarları
                    </h3>
                    <ul style="list-style:none; display:flex; flex-direction:column; gap:0.6rem; font-size:14px; color:#CBD5E1; padding:0; margin:0;">
                        <li style="display:flex; align-items:center; gap:0.5rem;">
                            <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                            <span>Hasar gören alanların ve eşyaların detaylı fotoğrafları</span>
                        </li>
                        <li style="display:flex; align-items:center; gap:0.5rem;">
                            <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                            <span>İtfaiye raporu (yangın durumunda) veya Polis tutanağı (hırsızlıkta)</span>
                        </li>
                        <li style="display:flex; align-items:center; gap:0.5rem;">
                            <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                            <span>Dahili su sızıntılarında tesisatçı tespit faturası veya servis fişi</span>
                        </li>
                        <li style="display:flex; align-items:center; gap:0.5rem;">
                            <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light'); ?>
                            <span>Poliçe sahibi T.C. / Vergi numarası ve IBAN bilgisi</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- KVKK LEGAL NOTICE FOOTER OF CHECKLIST -->
            <div style="margin-top:2rem; padding-top:1.25rem; border-top:1px solid rgba(255,255,255,0.06); text-align:center;">
                <p style="font-size:12px; color:#94A3B8; margin:0;">
                    Belge göndererek teklif/hasar sürecinin yürütülmesi için gerekli kişisel verilerin işlenmesine ilişkin bilgi için <a href="<?php echo esc_url(home_url('/kvkk-aydinlatma/')); ?>" style="color:#38BDF8; text-decoration:underline;">KVKK Aydınlatma Metni</a>'ni inceleyebilirsiniz.
                </p>
            </div>
        </div>

    </div>
</main>

<?php
get_footer();
