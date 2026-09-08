<?php
/**
 * Plused Sigorta Custom Post Types
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

function plused_register_post_types() {
    // 1. Insurance Products (Sigorta Ürünleri)
    $product_labels = array(
        'name'                  => 'Sigorta Ürünleri',
        'singular_name'         => 'Sigorta Ürünü',
        'menu_name'             => 'Sigorta Ürünleri',
        'name_admin_bar'        => 'Sigorta Ürünü',
        'add_new'               => 'Yeni Ürün Ekle',
        'add_new_item'          => 'Yeni Sigorta Ürünü Ekle',
        'new_item'              => 'Yeni Ürün',
        'edit_item'             => 'Sigorta Ürününü Düzenle',
        'view_item'             => 'Ürünü Gör',
        'all_items'             => 'Tüm Sigorta Ürünleri',
        'search_items'          => 'Ürünlerde Ara',
        'not_found'             => 'Ürün bulunamadı.',
        'not_found_in_trash'    => 'Çöp kutusunda ürün bulunamadı.',
    );

    $product_args = array(
        'labels'             => $product_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'plused-sigorta',
        'query_var'          => true,
        'rewrite'            => array('slug' => 'sigorta-urunleri', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 3,
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'show_in_rest'       => false,
    );

    register_post_type('insurance_product', $product_args);

    // 2. FAQ (SSS)
    $faq_labels = array(
        'name'                  => 'SSS',
        'singular_name'         => 'Soru & Cevap',
        'menu_name'             => 'SSS',
        'name_admin_bar'        => 'SSS',
        'add_new'               => 'Yeni Soru Ekle',
        'add_new_item'          => 'Yeni Soru Ekle',
        'new_item'              => 'Yeni Soru',
        'edit_item'             => 'Soruyu Düzenle',
        'view_item'             => 'Soruyu Gör',
        'all_items'             => 'Tüm SSS',
        'search_items'          => 'Sorularda Ara',
        'not_found'             => 'Soru bulunamadı.',
        'not_found_in_trash'    => 'Çöp kutusunda soru bulunamadı.',
    );

    $faq_args = array(
        'labels'             => $faq_labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => 'plused-sigorta',
        'query_var'          => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array('title', 'editor', 'page-attributes'),
        'show_in_rest'       => false,
    );

    register_post_type('insurance_faq', $faq_args);
}
add_action('init', 'plused_register_post_types');
