<?php
/**
 * Plused Sigorta Helper Functions
 *
 * @package PlusedSigorta
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get option with default fallback
 */
function plused_get_option($key, $default = '') {
    $options = get_option('plused_sigorta_options', array());
    if (isset($options[$key]) && $options[$key] !== '') {
        return $options[$key];
    }
    return $default;
}

/**
 * Get centralized WhatsApp raw number
 */
function plused_get_whatsapp_number() {
    $num = plused_get_option('whatsapp_number', '905304777737');
    return preg_replace('/[^0-9]/', '', $num);
}

/**
 * Build dynamic WhatsApp URL with encoded message
 */
function plused_build_whatsapp_link($message = '') {
    $phone = plused_get_whatsapp_number();
    $url = 'https://wa.me/' . $phone;
    if (!empty($message)) {
        $url .= '?text=' . rawurlencode($message);
    }
    return esc_url($url);
}

/**
 * Get phone call URL (tel:)
 */
function plused_get_phone_url() {
    $phone_raw = plused_get_option('phone_raw', '905304777737');
    $phone_clean = preg_replace('/[^0-9+]/', '', $phone_raw);
    return 'tel:' . esc_attr($phone_clean);
}

/**
 * Get formatted display phone
 */
function plused_get_display_phone() {
    return plused_get_option('phone_display', '0530 477 77 37');
}

/**
 * SVG Icon Helper
 */
function plused_icon($name, $classes = 'w-5 h-5') {
    $classes = esc_attr($classes);
    switch ($name) {
        case 'shield':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>';
        case 'phone':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>';
        case 'mail':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>';
        case 'map-pin':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>';
        case 'clock':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
        case 'arrow-right':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>';
        case 'arrow-up-right':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 17L17 7m0 0H7m10 0v10"></path></svg>';
        case 'check-circle':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>';
        case 'whatsapp':
            return '<svg class="' . $classes . '" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>';
        case 'car':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17a2 2 0 100-4 2 2 0 000 4zm8 0a2 2 0 100-4 2 2 0 000 4zM5 11l2-5h10l2 5M3 13h18v4H3v-4z"></path></svg>';
        case 'home':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>';
        case 'heart-pulse':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>';
        case 'building':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>';
        case 'briefcase':
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>';
        default:
            return '<svg class="' . $classes . '" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>';
    }
}

/**
 * Check if a package feature flag is enabled for the tenant
 */
function plused_is_feature_enabled($feature_name, $default = true) {
    $key = (strpos($feature_name, 'feature_') === 0) ? $feature_name : 'feature_' . $feature_name;
    $val = plused_get_option($key, null);
    if ($val === null) {
        return (bool) $default;
    }
    return ($val === '1' || $val === 1 || $val === true);
}

/**
 * Render dynamic tenant branding logo
 */
function plused_render_logo($is_footer = false) {
    $company_name = plused_get_option('company_name', 'PLUSED SİGORTA');
    $logo_key = $is_footer ? 'logo_footer_url' : 'logo_url';
    $custom_logo = trim(plused_get_option($logo_key, ''));
    if (empty($custom_logo) && $is_footer) {
        $custom_logo = trim(plused_get_option('logo_url', ''));
    }

    if (!empty($custom_logo)) {
        $max_h = $is_footer ? '44px' : '40px';
        return '<img src="' . esc_url($custom_logo) . '" alt="' . esc_attr($company_name) . '" style="max-height:' . $max_h . '; width:auto; object-fit:contain; display:block;" />';
    }

    // Default: Cinematic shield badge + Company Name
    $box_size = $is_footer ? '42px' : '38px';
    $icon_size = $is_footer ? 'w-5 h-5' : 'w-5 h-5';
    $html = '<div class="relative rounded-xl flex items-center justify-center border border-white/20 shadow-[0_0_20px_rgba(0,102,255,0.4)]" style="background:linear-gradient(135deg, var(--electric, #0066FF), #312E81); width:' . $box_size . '; height:' . $box_size . '; border-radius:12px; display:flex; align-items:center; justify-content:center; border:1px solid rgba(255,255,255,0.2); flex-shrink:0;">';
    $html .= plused_icon('shield', $icon_size . ' text-white');
    $html .= '</div>';
    $html .= '<span class="font-serif text-lg tracking-wider text-white font-semibold" style="letter-spacing:0.12em; line-height:1.2; font-size:clamp(14px, 1.2vw, 18px); white-space:nowrap;">';
    $html .= esc_html($company_name);
    $html .= '</span>';

    return $html;
}

/**
 * Get tenant favicon URL
 */
function plused_get_favicon_url() {
    $custom_favicon = trim(plused_get_option('favicon_url', ''));
    if (!empty($custom_favicon)) {
        return esc_url($custom_favicon);
    }
    // Default blue shield SVG data URI
    return "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%230066FF' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z'/%3E%3C/svg%3E";
}

/**
 * Output dynamic CSS variables for tenant brand colors
 */
function plused_render_brand_styles() {
    $primary   = trim(plused_get_option('brand_primary_color', ''));
    $secondary = trim(plused_get_option('brand_secondary_color', ''));
    $accent    = trim(plused_get_option('brand_accent_color', ''));

    if (empty($primary) && empty($secondary) && empty($accent)) {
        return;
    }

    echo '<style id="plused-tenant-brand-vars">';
    echo ':root {';
    if (!empty($primary)) {
        $p = esc_attr($primary);
        echo "--electric: {$p};";
        echo "--electric-glow: " . $p . "66;";
    }
    if (!empty($secondary)) {
        echo "--electric-light: " . esc_attr($secondary) . ";";
    }
    if (!empty($accent)) {
        echo "--accent-violet: " . esc_attr($accent) . ";";
    }
    echo '}';
    echo '</style>' . "\n";
}
add_action('wp_head', 'plused_render_brand_styles', 2);
