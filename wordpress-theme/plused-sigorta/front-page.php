<?php
/**
 * Front Page Template (Brand Showcase & Multi-Page Hub)
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="relative min-h-screen bg-background overflow-x-hidden" style="background-color:#030712;">
    <?php
    // 1. Hero & Açılış Vitrini
    get_template_part('template-parts/section', 'hero');

    // 2. Sigorta Kategorileri (6 Ürünün Kartları & Landing Linkleri)
    get_template_part('template-parts/section', 'categories');

    // 3. Kasko Sinematik Sahnesi (Özel Vitrin)
    get_template_part('template-parts/section', 'cinematic-kasko');

    // 4. Konut / DASK Sinematik Sahnesi (Özel Vitrin)
    get_template_part('template-parts/section', 'cinematic-home');

    // 5. Neden Plused (Bağımsız Acente Felsefesi)
    get_template_part('template-parts/section', 'why-us');

    // 6. Teklif Süreci & Hızlı Teklif Hesaplama
    get_template_part('template-parts/section', 'proposal');

    // 7. Hasar Desteği (Hasar Sürecinde Destek & Acil Yardım)
    get_template_part('template-parts/section', 'claim');

    // 8. SSS Özeti (Sıkça Sorulan Sorular)
    get_template_part('template-parts/section', 'faq');
    ?>
</main>

<?php
get_footer();
