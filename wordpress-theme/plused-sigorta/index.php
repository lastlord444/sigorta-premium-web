<?php
/**
 * Main Index Fallback Template
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main class="container-custom" style="padding-top:8rem; padding-bottom:6rem; min-height:70vh;">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="margin-bottom:3rem;">
                <h1 class="font-serif text-3xl text-white font-medium mb-4"><?php the_title(); ?></h1>
                <div class="text-silver-300 font-sans" style="line-height:1.8;">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <p class="text-silver-400 font-sans">İçerik bulunamadı.</p>
    <?php endif; ?>
</main>

<?php
get_footer();
