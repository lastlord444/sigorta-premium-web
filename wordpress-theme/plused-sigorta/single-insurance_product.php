<?php
/**
 * Single Insurance Product Template
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$slug = get_post_field('post_name', get_the_ID());

// Map slug to product page or render landing template
$page_slug_map = array(
    'kasko'            => 'kasko',
    'trafik'           => 'trafik-sigortasi',
    'trafik-sigortasi' => 'trafik-sigortasi',
    'konut'            => 'konut-sigortasi',
    'konut-sigortasi'  => 'konut-sigortasi',
    'dask'             => 'dask',
    'saglik'           => 'saglik-sigortasi',
    'saglik-sigortasi' => 'saglik-sigortasi',
    'isyeri'           => 'isyeri-sigortasi',
    'isyeri-sigortasi' => 'isyeri-sigortasi',
);

$target_page = $page_slug_map[$slug] ?? 'kasko';

// Redirect or load corresponding template part
$template_file = get_template_directory() . '/page-' . $target_page . '.php';

if (file_exists($template_file)) {
    include $template_file;
} else {
    // Fallback standard view
    ?>
    <main class="py-36 px-6 bg-navy-950 text-white min-h-screen">
        <div class="container-custom max-w-4xl mx-auto">
            <h1 class="font-serif text-3xl sm:text-4xl mb-6"><?php the_title(); ?></h1>
            <div class="prose prose-invert max-w-none">
                <?php the_content(); ?>
            </div>
        </div>
    </main>
    <?php
    get_footer();
}
