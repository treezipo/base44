<?php
/**
 * Header template
 *
 * @package Spaciaz_FA
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php echo is_rtl() ? 'dir="rtl"' : ''; ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="spaciaz-site">
    <header class="spaciaz-header" id="spaciaz-header">
        <div class="spaciaz-header-inner">
            <div class="spaciaz-header-container">
                <!-- Logo -->
                <div class="spaciaz-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="spaciaz-logo-link">
                            <span class="spaciaz-logo-icon">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="4" y="4" width="9" height="9" fill="currentColor" rx="1"/>
                                    <rect x="15" y="4" width="9" height="9" stroke="currentColor" stroke-width="2" rx="1"/>
                                    <rect x="4" y="15" width="9" height="9" stroke="currentColor" stroke-width="2" rx="1"/>
                                    <rect x="15" y="15" width="9" height="9" fill="currentColor" rx="1"/>
                                </svg>
                            </span>
                            <span class="spaciaz-logo-text">سپاسیاز</span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Navigation -->
                <nav class="spaciaz-nav" id="spaciaz-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'       => false,
                        'menu_class'      => 'spaciaz-menu',
                        'fallback_cb'     => 'spaciaz_default_menu',
                        'depth'           => 2,
                    ));
                    ?>
                </nav>

                <!-- Header Right -->
                <div class="spaciaz-header-right">
                    <div class="spaciaz-header-phone">
                        <span class="spaciaz-phone-label">تماس با ما:</span>
                        <a href="tel:<?php echo esc_attr(get_theme_mod('spaciaz_phone', '021-1234-5678')); ?>">
                            <?php echo esc_html(get_theme_mod('spaciaz_phone', '021-1234-5678')); ?>
                        </a>
                    </div>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="spaciaz-btn spaciaz-btn-primary spaciaz-btn-sm">
                        <span>در ارتباط باشید</span>
                    </a>
                    <button class="spaciaz-menu-toggle" id="spaciaz-menu-toggle" aria-label="منو" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu Overlay -->
    <div class="spaciaz-mobile-menu" id="spaciaz-mobile-menu">
        <div class="spaciaz-mobile-menu-inner">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'       => false,
                'menu_class'      => 'spaciaz-mobile-nav',
                'fallback_cb'     => 'spaciaz_default_menu',
                'depth'           => 1,
            ));
            ?>
            <div class="spaciaz-mobile-contact">
                <p>تماس: <?php echo esc_html(get_theme_mod('spaciaz_phone', '021-1234-5678')); ?></p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="spaciaz-btn spaciaz-btn-primary spaciaz-btn-full">در ارتباط باشید</a>
            </div>
        </div>
    </div>
    <div class="spaciaz-mobile-overlay" id="spaciaz-mobile-overlay"></div>

    <main class="spaciaz-main" id="content">
