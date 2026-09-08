<?php
/**
 * Template Part: Section FAQ (Sıkça Sorulan Sorular)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$faq_query = new WP_Query(array(
    'post_type'      => 'insurance_faq',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'meta_query'     => array(
        'relation' => 'OR',
        array(
            'key'     => '_plused_faq_active',
            'value'   => '1',
            'compare' => '=',
        ),
        array(
            'key'     => '_plused_faq_active',
            'compare' => 'NOT EXISTS',
        ),
    ),
));

$whatsapp_url = plused_build_whatsapp_link('Sigorta poliçem hakkında özel bir sorum var.');
?>
<section id="sss" class="relative w-full py-28 px-6 bg-background text-white overflow-hidden" style="padding-top:7rem; padding-bottom:7rem; background:#030712; border-top:1px solid rgba(255,255,255,0.06); position:relative;">
    <div class="container-custom relative z-10" style="max-width:52rem; margin:auto;">
        <!-- HEADER -->
        <div style="text-align:center; margin-bottom:4rem;">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-mono uppercase tracking-widest text-silver-300 mb-5" style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.35rem 0.9rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.08); letter-spacing:0.2em; margin-bottom:1.25rem;">
                <?php echo plused_icon('shield', 'w-3.5 h-3.5 text-electric-light'); ?>
                <span>Merak Edilenler</span>
            </div>

            <h2 class="font-serif text-white font-medium mb-4" style="font-size:clamp(2rem, 4vw, 3.25rem); margin-bottom:1rem; line-height:1.2;">
                Sıkça Sorulan Sorular
            </h2>

            <p class="text-silver-400 text-base max-w-xl mx-auto font-sans" style="font-size:1.05rem; line-height:1.7;">
                Sigorta poliçeleri, teminat kapsamları ve hasar süreçleri hakkında en çok merak edilen soruların yanıtları.
            </p>
        </div>

        <!-- ACCORDION LIST -->
        <div>
            <?php
            if ($faq_query->have_posts()) :
                $counter = 0;
                while ($faq_query->have_posts()) : $faq_query->the_post();
                    $counter++;
                    $num_str  = str_pad((string)$counter, 2, '0', STR_PAD_LEFT);
                    $category = get_post_meta(get_the_ID(), '_plused_faq_category', true) ?: 'Genel';
                    $is_first = ($counter === 1);
                    ?>
                    <div class="accordion-item <?php echo $is_first ? 'open' : ''; ?>">
                        <button type="button" class="accordion-header">
                            <div style="display:flex; align-items:center; gap:1rem;">
                                <span class="font-mono text-xs text-electric-light font-medium" style="color:#38BDF8; font-size:13px;">
                                    <?php echo esc_html($num_str); ?>
                                </span>
                                <span class="font-serif text-lg text-white font-medium" style="font-size:1.15rem;">
                                    <?php the_title(); ?>
                                </span>
                            </div>

                            <div style="width:32px; height:32px; border-radius:50%; border:1px solid rgba(255,255,255,0.15); display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:16px; color:#CBD5E1;">
                                <span class="accordion-toggle-icon"><?php echo $is_first ? '&minus;' : '+'; ?></span>
                            </div>
                        </button>

                        <div class="accordion-body">
                            <div style="padding-top:0.25rem; font-size:14px; line-height:1.7;">
                                <?php the_content(); ?>
                            </div>
                            <div style="margin-top:0.75rem; display:flex; align-items:center; gap:0.5rem; font-size:11px; font-family:var(--font-mono); color:#64748B;">
                                <span>Kategori:</span>
                                <span style="color:#94A3B8;"><?php echo esc_html($category); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- EXTRA QUESTION BANNER -->
        <div style="margin-top:3rem; padding:1.5rem; border-radius:1rem; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:1rem;">
            <span class="text-sm text-silver-400" style="font-size:14px; color:#94A3B8;">
                Aklınıza takılan farklı bir durum mu var?
            </span>
            <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" style="display:inline-flex; align-items:center; gap:0.4rem; font-size:12px; font-family:var(--font-mono); text-transform:uppercase; letter-spacing:0.1em; color:#38BDF8; text-decoration:none;">
                <span>Danışmanımıza WhatsApp'tan Danışın</span>
                <?php echo plused_icon('arrow-up-right', 'w-4 h-4'); ?>
            </a>
        </div>
    </div>
</section>
