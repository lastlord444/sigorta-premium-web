<?php
/**
 * Template Part: Section Products (Cinematic Scenes Loop)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

$products_query = new WP_Query(array(
    'post_type'      => 'insurance_product',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'meta_query'     => array(
        'relation' => 'OR',
        array(
            'key'     => '_plused_product_active',
            'value'   => '1',
            'compare' => '=',
        ),
        array(
            'key'     => '_plused_product_active',
            'compare' => 'NOT EXISTS',
        ),
    ),
));
?>
<section id="sigortalar" class="relative w-full bg-navy-950 text-white" style="background:#030712; border-top:1px solid rgba(255,255,255,0.06);">
    <!-- SECTION ANCHOR HEADER -->
    <div style="padding-top:5rem; padding-bottom:2.5rem; border-bottom:1px solid rgba(255,255,255,0.06); background:linear-gradient(to bottom, #030712, #060D1F);">
        <div class="container-custom flex flex-col md:flex-row md:items-end justify-between gap-6" style="display:flex; flex-wrap:wrap; justify-content:space-between; align-items:flex-end; gap:1.5rem;">
            <div>
                <div class="inline-flex items-center gap-2 text-xs font-mono tracking-widest text-electric-light uppercase mb-2" style="display:inline-flex; align-items:center; gap:0.5rem; letter-spacing:0.25em; margin-bottom:0.5rem;">
                    <?php echo plused_icon('shield', 'w-3.5 h-3.5'); ?>
                    <span>Güvence Portföyü</span>
                </div>
                <h2 class="font-serif text-white font-medium" style="font-size:clamp(1.75rem, 3.5vw, 3rem); line-height:1.2;">
                    Değerlerinizi Doğru Teminatla Koruyun
                </h2>
            </div>

            <!-- QUICK JUMP PILLS -->
            <div style="display:flex; align-items:center; gap:0.5rem; overflow-x:auto; padding-bottom:0.5rem;">
                <?php
                if ($products_query->have_posts()) :
                    while ($products_query->have_posts()) : $products_query->the_post();
                        $order = get_post_meta(get_the_ID(), '_plused_product_order', true);
                        $slug  = sanitize_title(get_the_title());
                        ?>
                        <a href="#scene-<?php echo esc_attr($slug); ?>" style="padding:0.4rem 0.9rem; border-radius:9999px; font-size:11px; font-family:var(--font-mono); text-transform:uppercase; letter-spacing:0.05em; background:rgba(255,255,255,0.03); color:#94A3B8; border:1px solid rgba(255,255,255,0.08); text-decoration:none; white-space:nowrap;">
                            <span style="color:#38BDF8; margin-right:0.35rem;"><?php echo esc_html($order); ?></span>
                            <?php the_title(); ?>
                        </a>
                        <?php
                    endwhile;
                    $products_query->rewind_posts();
                endif;
                ?>
            </div>
        </div>
    </div>

    <!-- REUSABLE CINEMATIC SCENES -->
    <div style="display:flex; flex-direction:column;">
        <?php
        if ($products_query->have_posts()) :
            while ($products_query->have_posts()) : $products_query->the_post();
                $post_id    = get_the_ID();
                $order      = get_post_meta($post_id, '_plused_product_order', true);
                $eyebrow    = get_post_meta($post_id, '_plused_product_eyebrow', true);
                $badge      = get_post_meta($post_id, '_plused_product_badge', true);
                $form_type  = get_post_meta($post_id, '_plused_product_form_type', true) ?: 'kasko';
                $highlights = get_post_meta($post_id, '_plused_product_highlights', true);
                $cta_text   = get_post_meta($post_id, '_plused_product_cta_text', true) ?: (get_the_title() . ' Teklifi Al');
                $whatsapp   = get_post_meta($post_id, '_plused_product_whatsapp_msg', true);
                $video_url  = get_post_meta($post_id, '_plused_product_video_url', true);
                $poster_url = get_post_meta($post_id, '_plused_product_poster_url', true);
                $alignment  = get_post_meta($post_id, '_plused_product_alignment', true) ?: 'right';
                $edevlet    = get_post_meta($post_id, '_plused_product_edevlet_btn', true);

                $slug        = sanitize_title(get_the_title());
                $is_text_left = ($alignment === 'left');
                $lines       = array_filter(array_map('trim', explode("\n", (string)$highlights)));
                ?>
                <div id="scene-<?php echo esc_attr($slug); ?>" class="relative w-full overflow-hidden" style="padding-top:5.5rem; padding-bottom:5.5rem; border-bottom:1px solid rgba(255,255,255,0.05); position:relative;">
                    
                    <!-- AMBIENT ATMOSPHERIC GLOW -->
                    <div style="position:absolute; top:50%; transform:translateY(-50%); width:600px; height:600px; border-radius:50%; filter:blur(180px); pointer-events:none; opacity:0.18; z-index:0; <?php echo $is_text_left ? 'right:-10%; background:rgba(0,102,255,0.2);' : 'left:-10%; background:rgba(139,92,246,0.18);'; ?>"></div>

                    <div class="container-custom relative z-10">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center" style="display:grid; align-items:center;">
                            
                            <!-- TEXT CONTENT COLUMN -->
                            <div class="lg:col-span-6 flex flex-col justify-center <?php echo $is_text_left ? 'lg:order-1' : 'lg:col-start-7 lg:order-2'; ?>">
                                <!-- EYEBROW & BADGE -->
                                <div style="display:flex; align-items:center; gap:1rem; margin-bottom:1rem;">
                                    <span class="font-mono text-xs tracking-widest text-electric-light uppercase font-semibold" style="letter-spacing:0.25em;">
                                        <?php echo esc_html($eyebrow ?: ($order . ' / ' . get_the_title())); ?>
                                    </span>
                                    <?php if (!empty($badge)) : ?>
                                        <div style="width:1px; height:12px; background:rgba(255,255,255,0.2);"></div>
                                        <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full font-mono text-xs uppercase tracking-wider text-silver-300" style="padding:0.2rem 0.75rem; border-radius:9999px; background:rgba(255,255,255,0.04); border:1px solid rgba(255,255,255,0.1); font-size:11px;">
                                            <?php echo esc_html($badge); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <!-- MAIN HEADLINE -->
                                <h3 class="font-serif text-white font-medium leading-tight mb-6" style="font-size:clamp(1.75rem, 3vw, 2.75rem); line-height:1.2; margin-bottom:1.5rem;">
                                    &ldquo;<?php the_content(); ?>&rdquo;
                                </h3>

                                <!-- HIGHLIGHT CHIPS -->
                                <?php if (!empty($lines)) : ?>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-8" style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:0.75rem; margin-bottom:2rem;">
                                    <?php foreach ($lines as $line) : ?>
                                    <div style="display:flex; align-items:center; gap:0.6rem; padding:0.85rem; border-radius:1rem; background:rgba(255,255,255,0.02); border:1px solid rgba(255,255,255,0.06); backdrop-filter:blur(6px);">
                                        <?php echo plused_icon('check-circle', 'w-4 h-4 text-electric-light shrink-0'); ?>
                                        <span class="text-xs sm:text-sm text-silver-300 font-sans" style="font-size:13px;"><?php echo esc_html($line); ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php endif; ?>

                                <!-- E-DEVLET BUTTON (KASKO & TRAFİK) -->
                                <?php if ($edevlet === '1') : ?>
                                <div style="margin-bottom:1.75rem; display:flex; flex-direction:column; gap:0.4rem;">
                                    <a href="https://www.turkiye.gov.tr/araclarim" target="_blank" rel="noopener noreferrer" class="btn-edevlet">
                                        <svg style="width:16px; height:16px; fill:currentColor;" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>
                                        <span>Ruhsat Bilgilerimi e-Devlet'ten Bul</span>
                                        <?php echo plused_icon('arrow-up-right', 'w-3.5 h-3.5'); ?>
                                    </a>
                                    <p style="font-size:11px; color:#94A3B8; font-family:var(--font-sans); margin:0;">
                                        Resmî e-Devlet Kapısı'na yönlendirilirsiniz. Giriş bilgileriniz Plused Sigorta ile paylaşılmaz.
                                    </p>
                                </div>
                                <?php endif; ?>

                                <!-- ACTION CTAS -->
                                <div style="display:flex; flex-wrap:wrap; align-items:center; gap:1rem;">
                                    <button type="button" data-quote-product="<?php echo esc_attr($form_type); ?>" class="btn-primary">
                                        <span><?php echo esc_html($cta_text); ?></span>
                                        <?php echo plused_icon('arrow-right', 'w-4 h-4'); ?>
                                    </button>

                                    <span class="text-xs font-mono text-silver-500" style="font-size:12px;">
                                        Birden fazla şirketten teklif
                                    </span>
                                </div>
                            </div>

                            <!-- CINEMATIC MEDIA COLUMN -->
                            <div class="lg:col-span-6 relative flex items-center justify-center <?php echo $is_text_left ? 'lg:order-2' : 'lg:col-start-1 lg:order-1'; ?>">
                                <?php if (!empty($video_url)) : ?>
                                    <!-- FULL-BLEED SEAMLESS CINEMATIC VIDEO (NO UI CARD, NO HARD BORDERS) -->
                                    <div class="relative w-full overflow-hidden" style="aspect-ratio:16/9; position:relative; border-radius:1rem; overflow:hidden;">
                                        <video
                                            src="<?php echo esc_url($video_url); ?>"
                                            poster="<?php echo esc_url($poster_url); ?>"
                                            muted
                                            autoplay
                                            playsinline
                                            loop
                                            preload="metadata"
                                            style="width:100%; height:100%; object-fit:cover; object-position:center; filter:brightness(0.92) contrast(1.05);"
                                        ></video>

                                        <!-- ORGANIC BLEND MASKS (Dissolves edges seamlessly into dark background) -->
                                        <div class="scene-blend-top"></div>
                                        <div class="scene-blend-bottom"></div>
                                        <div class="scene-blend-left"></div>
                                        <div class="scene-blend-right"></div>
                                        <div class="scene-blend-radial"></div>
                                    </div>
                                <?php else : ?>
                                    <!-- CLEAN EDITORIAL ATMOSPHERE (NO TECHNICAL / DEV PLACEHOLDERS) -->
                                    <div class="relative w-full rounded-2xl p-8 flex flex-col justify-between overflow-hidden" style="aspect-ratio:16/9; background:linear-gradient(135deg, rgba(255,255,255,0.03), rgba(255,255,255,0.005)); border:1px solid rgba(255,255,255,0.05); border-radius:1.5rem; padding:2rem; position:relative; display:flex; flex-direction:column; justify-content:space-between;">
                                        <!-- Ambient glow -->
                                        <div style="position:absolute; inset:0; background:radial-gradient(circle at top right, rgba(0,102,255,0.08), transparent 60%); pointer-events:none;"></div>

                                        <div style="position:relative; z-index:2; display:flex; justify-content:space-between; font-size:12px; font-family:var(--font-mono); color:#64748B;">
                                            <span style="text-transform:uppercase; letter-spacing:0.2em;"><?php echo esc_html($eyebrow ?: get_the_title()); ?></span>
                                            <span>Teminat Paketi</span>
                                        </div>

                                        <div style="position:relative; z-index:2; margin:auto 0; text-align:center; display:flex; flex-direction:column; align-items:center; padding:1.5rem 0;">
                                            <div style="width:64px; height:64px; border-radius:16px; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.08); display:flex; align-items:center; justify-content:center; color:#38BDF8; margin-bottom:1rem; box-shadow:0 0 25px rgba(0,102,255,0.15);">
                                                <?php echo plused_icon('shield', 'w-7 h-7'); ?>
                                            </div>
                                            <h4 class="font-serif text-2xl text-white font-medium mb-2">
                                                <?php echo esc_html($badge ?: get_the_title()); ?>
                                            </h4>
                                            <p class="text-xs text-silver-400 max-w-sm font-sans" style="line-height:1.6;">
                                                İhtiyacınıza uygun teminat seçenekleriyle güvence altındasınız.
                                            </p>
                                        </div>

                                        <div style="position:relative; z-index:2; padding-top:1rem; border-top:1px solid rgba(255,255,255,0.05); display:flex; justify-content:space-between; font-size:11px; font-family:var(--font-mono); color:#64748B;">
                                            <span>Özelleştirilmiş Koruma</span>
                                            <span><?php echo esc_html($order); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>
