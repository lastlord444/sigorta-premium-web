<?php
/**
 * Plused Sigorta Proposal Handler & Future Insurance API Architecture
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handle AJAX Proposal Submission
 */
function plused_ajax_submit_proposal() {
    // Nonce verification
    if (isset($_POST['nonce']) && !wp_verify_nonce($_POST['nonce'], 'plused_ajax_nonce')) {
        wp_send_json_error(array('message' => 'Güvenlik doğrulaması başarısız oldu.'));
    }

    $product_type = sanitize_text_field($_POST['product_type'] ?? 'kasko');
    $extra_field  = sanitize_text_field($_POST['extra_field'] ?? '');
    $full_name    = sanitize_text_field($_POST['fullname'] ?? '');
    $phone        = sanitize_text_field($_POST['phone'] ?? '');
    $email        = sanitize_email($_POST['email'] ?? '');
    $ref_code     = sanitize_text_field($_POST['ref_code'] ?? ('PLS-' . wp_rand(10000, 99999)));

    if (empty($full_name) || empty($phone) || empty($email)) {
        wp_send_json_error(array('message' => 'Lütfen zorunlu alanları doldurunuz.'));
    }

    $proposal_data = array(
        'ref_code'     => $ref_code,
        'product_type' => $product_type,
        'extra_field'  => $extra_field,
        'full_name'    => $full_name,
        'phone'        => $phone,
        'email'        => $email,
        'submitted_at' => current_time('mysql'),
        'user_ip'      => sanitize_text_field($_SERVER['REMOTE_ADDR'] ?? ''),
    );

    /**
     * EXTENSION HOOK FOR FUTURE INSURANCE APIS
     * 
     * In the future, insurance company integrations (e.g. Sompo, Allianz, Aksigorta)
     * can hook into this filter to query live quote APIs server-side:
     * 
     * add_filter('plused_insurance_quote_providers', function($quotes, $proposal) {
     *     // Query external insurance company API with private credentials
     *     return $quotes;
     * }, 10, 2);
     */
    $api_quotes = apply_filters('plused_insurance_quote_providers', array(), $proposal_data);

    // Optional admin notification (only if configured in settings)
    $admin_email = plused_get_option('proposal_notify_email', plused_get_option('email', ''));
    if (!empty($admin_email)) {
        $subject = sprintf('[%s] Yeni Teklif Talebi: %s (%s)', get_bloginfo('name'), $ref_code, strtoupper($product_type));
        $body    = sprintf(
            "Yeni bir sigorta teklifi talebi alındı:\n\nReferans Kodu: %s\nÜrün: %s\nDetay / Plaka / m2: %s\nAd Soyad: %s\nTelefon: %s\nE-posta: %s\nTarih: %s\n",
            $ref_code,
            strtoupper($product_type),
            $extra_field,
            $full_name,
            $phone,
            $email,
            $proposal_data['submitted_at']
        );
        @wp_mail($admin_email, $subject, $body);
    }

    wp_send_json_success(array(
        'status'   => 'received',
        'ref_code' => $ref_code,
        'quotes'   => $api_quotes,
    ));
}
// Şimdilik doğrudan WhatsApp akışı kullanıldığından AJAX action'ları pasiftir (Gelecekteki API entegrasyonu için kod taslağı olarak korunmaktadır):
// add_action('wp_ajax_plused_submit_proposal', 'plused_ajax_submit_proposal');
// add_action('wp_ajax_nopriv_plused_submit_proposal', 'plused_ajax_submit_proposal');

