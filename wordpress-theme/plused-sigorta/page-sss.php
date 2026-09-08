<?php
/**
 * Template Name: SSS Landing Page
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$whatsapp_url = plused_build_whatsapp_link('Sigorta poliçem hakkında özel bir sorum var.');

$all_faqs = new WP_Query(array(
    'post_type'      => 'insurance_faq',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));
?>

<main class="relative min-h-screen bg-navy-950 text-white pt-32 sm:pt-40 pb-28 px-6" style="background:#030712; padding-top:8rem; padding-bottom:7rem;">
    <!-- RADIANCE GLOW -->
    <div style="position:absolute; top:20%; left:50%; transform:translateX(-50%); width:700px; height:450px; background:rgba(0,102,255,0.06); border-radius:50%; filter:blur(170px); pointer-events:none;"></div>

    <div class="container-custom relative z-10" style="max-width:54rem; margin:auto;">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" style="margin-bottom:1.5rem; font-family:var(--font-mono); font-size:11px; text-transform:uppercase; letter-spacing:0.1em; color:#94A3B8;">
            <a href="<?php echo esc_url(home_url('/')); ?>" style="color:#94A3B8; text-decoration:none;">Ana Sayfa</a>
            <span style="margin:0 0.5rem; color:rgba(255,255,255,0.3);">/</span>
            <span style="color:#38BDF8;">Sıkça Sorulan Sorular</span>
        </nav>

        <!-- HEADER -->
        <div style="text-align:center; margin-bottom:4rem;">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-silver-300 mb-4" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); letter-spacing:0.2em;">
                <?php echo plused_icon('shield', 'w-3.5 h-3.5 text-electric-light'); ?>
                <span>Sigorta Bilgi Merkezi</span>
            </div>

            <h1 class="font-serif text-white font-medium mb-4" style="font-size:clamp(2.2rem, 4.5vw, 3.8rem); line-height:1.15;">
                Aklınıza takılan tüm soruların net yanıtları.
            </h1>

            <p class="text-silver-400 text-base font-sans" style="font-size:1.1rem; max-width:38rem; margin:auto; line-height:1.7;">
                Poliçe prim hesaplamasından hasar anı süreçlerine, e-Devlet sorgulamalarından teminat detaylarına kadar tüm merak edilenler.
            </p>
        </div>

        <!-- FULL FAQ ACCORDION -->
        <div>
            <?php
            if ($all_faqs->have_posts()) :
                $idx = 0;
                while ($all_faqs->have_posts()) : $all_faqs->the_post();
                    $idx++;
                    $cat = get_post_meta(get_the_ID(), '_plused_faq_category', true) ?: 'Genel';
                    $is_first = ($idx === 1);
                    ?>
                    <div class="accordion-item <?php echo $is_first ? 'open' : ''; ?>">
                        <button type="button" class="accordion-header">
                            <div style="display:flex; align-items:center; gap:0.75rem;">
                                <span style="font-family:var(--font-mono); font-size:12px; color:#38BDF8; font-weight:600;">
                                    <?php echo str_pad((string)$idx, 2, '0', STR_PAD_LEFT); ?>
                                </span>
                                <span style="font-weight:500; font-size:15px; color:#FFFFFF;">
                                    <?php the_title(); ?>
                                </span>
                            </div>
                            <span class="accordion-icon" style="color:#94A3B8; font-size:20px;">
                                <?php echo $is_first ? '&minus;' : '&#43;'; ?>
                            </span>
                        </button>
                        <div class="accordion-body" style="<?php echo $is_first ? 'max-height:350px; padding-bottom:1.5rem;' : ''; ?>">
                            <div style="display:inline-block; font-family:var(--font-mono); font-size:10px; text-transform:uppercase; letter-spacing:0.1em; color:#64748B; margin-bottom:0.5rem;">
                                Kategori: <?php echo esc_html($cat); ?>
                            </div>
                            <p><?php echo get_the_content(); ?></p>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- WHATSAPP CTA -->
        <div style="margin-top:4rem; text-align:center; padding:2.5rem; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.08); border-radius:1.25rem;">
            <p class="text-silver-300 font-sans text-base mb-4">
                Sorunuzu burada bulamadınız mı? Sigorta danışmanımıza WhatsApp üzerinden doğrudan iletebilirsiniz.
            </p>
            <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn-primary" style="background:linear-gradient(135deg, #10B981, #059669); border-color:rgba(52,211,153,0.4);">
                <?php echo plused_icon('whatsapp', 'w-4 h-4 text-white'); ?>
                <span>WhatsApp İle Soru Sor</span>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
