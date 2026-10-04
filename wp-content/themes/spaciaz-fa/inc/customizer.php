<?php
/**
 * Customizer settings
 *
 * @package Spaciaz_FA
 */

function spaciaz_customize_register($wp_customize) {
    // Section: Theme Settings
    $wp_customize->add_section('spaciaz_settings', array(
        'title'    => __('تنظیمات سپاسیاز', 'spaciaz-fa'),
        'priority' => 30,
    ));

    // Primary color
    $wp_customize->add_setting('spaciaz_primary_color', array(
        'default'           => '#d7e04c',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'spaciaz_primary_color', array(
        'label'   => __('رنگ اصلی', 'spaciaz-fa'),
        'section' => 'spaciaz_settings',
    )));

    // Phone
    $wp_customize->add_setting('spaciaz_phone', array(
        'default'           => '021-1234-5678',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('spaciaz_phone', array(
        'label'   => __('شماره تماس', 'spaciaz-fa'),
        'section' => 'spaciaz_settings',
        'type'    => 'text',
    ));

    // Email
    $wp_customize->add_setting('spaciaz_email', array(
        'default'           => 'info@spaciaz.ir',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('spaciaz_email', array(
        'label'   => __('ایمیل', 'spaciaz-fa'),
        'section' => 'spaciaz_settings',
        'type'    => 'email',
    ));

    // Address
    $wp_customize->add_setting('spaciaz_address', array(
        'default'           => 'تهران، خیابان ولیعصر، برج سپاسیاز',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('spaciaz_address', array(
        'label'   => __('آدرس', 'spaciaz-fa'),
        'section' => 'spaciaz_settings',
        'type'    => 'textarea',
    ));

    // Social links
    $wp_customize->add_setting('spaciaz_facebook', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('spaciaz_facebook', array(
        'label'   => __('فیسبوک', 'spaciaz-fa'),
        'section' => 'spaciaz_settings',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('spaciaz_twitter', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('spaciaz_twitter', array(
        'label'   => __('توییتر', 'spaciaz-fa'),
        'section' => 'spaciaz_settings',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('spaciaz_instagram', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('spaciaz_instagram', array(
        'label'   => __('اینستاگرام', 'spaciaz-fa'),
        'section' => 'spaciaz_settings',
        'type'    => 'url',
    ));

    $wp_customize->add_setting('spaciaz_linkedin', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('spaciaz_linkedin', array(
        'label'   => __('لینکدین', 'spaciaz-fa'),
        'section' => 'spaciaz_settings',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'spaciaz_customize_register');

/**
 * Inject custom color CSS
 */
function spaciaz_customizer_css() {
    $primary = get_theme_mod('spaciaz_primary_color', '#d7e04c');
    ?>
    <style type="text/css">
        :root { --spaciaz-primary: <?php echo esc_html($primary); ?>; }
    </style>
    <?php
}
add_action('wp_head', 'spaciaz_customizer_css');
