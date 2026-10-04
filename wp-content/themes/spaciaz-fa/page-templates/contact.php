<?php
/**
 * Template Name: تماس با ما
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<div class="spaciaz-contact-page">
    <div class="spaciaz-page-hero">
        <div class="spaciaz-container">
            <div class="spaciaz-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">خانه</a>
                <span class="spaciaz-breadcrumb-sep">/</span>
                <span>تماس با ما</span>
            </div>
            <h1>تماس با ما</h1>
            <p>ما آماده پاسخ به سوالات شما هستیم.</p>
        </div>
    </div>
    <section class="spaciaz-section">
        <div class="spaciaz-container">
            <div class="spaciaz-contact-wrapper">
                <div class="spaciaz-contact-info">
                    <h2>با ما در ارتباط باشید</h2>
                    <p>برای هرگونه سوال یا درخواست مشاوره با ما در تماس باشید. تیم ما آماده پاسخگویی است.</p>
                    <div class="spaciaz-contact-items">
                        <div class="spaciaz-contact-item">
                            <div class="spaciaz-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h4>آدرس</h4>
                                <p><?php echo esc_html(get_theme_mod('spaciaz_address', 'تهران، خیابان ولیعصر، برج سپاسیاز')); ?></p>
                            </div>
                        </div>
                        <div class="spaciaz-contact-item">
                            <div class="spaciaz-contact-icon"><i class="fas fa-phone"></i></div>
                            <div>
                                <h4>تلفن</h4>
                                <p><a href="tel:<?php echo esc_attr(get_theme_mod('spaciaz_phone', '021-1234-5678')); ?>"><?php echo esc_html(get_theme_mod('spaciaz_phone', '021-1234-5678')); ?></a></p>
                            </div>
                        </div>
                        <div class="spaciaz-contact-item">
                            <div class="spaciaz-contact-icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h4>ایمیل</h4>
                                <p><a href="mailto:<?php echo esc_attr(get_theme_mod('spaciaz_email', 'info@spaciaz.ir')); ?>"><?php echo esc_html(get_theme_mod('spaciaz_email', 'info@spaciaz.ir')); ?></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="spaciaz-contact-social">
                        <h4>ما را دنبال کنید</h4>
                        <div class="spaciaz-footer-social">
                            <?php
                            $socials = array('spaciaz_facebook' => 'facebook', 'spaciaz_twitter' => 'twitter', 'spaciaz_instagram' => 'instagram', 'spaciaz_linkedin' => 'linkedin');
                            foreach ($socials as $key => $icon) :
                                $url = get_theme_mod($key);
                                if ($url) :
                            ?>
                                <a href="<?php echo esc_url($url); ?>" class="spaciaz-social-link" aria-label="<?php echo esc_attr($icon); ?>">
                                    <i class="fab fa-<?php echo esc_attr($icon); ?>"></i>
                                </a>
                            <?php endif; endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="spaciaz-contact-form-box">
                    <h3>پیام خود را ارسال کنید</h3>
                    <form class="spaciaz-contact-form" id="spaciaz-contact-form">
                        <div class="spaciaz-form-row">
                            <input type="text" name="name" placeholder="نام و نام خانوادگی *" required>
                            <input type="tel" name="phone" placeholder="شماره تماس *" required>
                        </div>
                        <div class="spaciaz-form-row">
                            <input type="email" name="email" placeholder="ایمیل">
                            <select name="inquiry">
                                <option value="">درخواست شما درباره...</option>
                                <option value="residential">املاک مسکونی</option>
                                <option value="commercial">املاک تجاری</option>
                                <option value="investment">سرمایه‌گذاری</option>
                            </select>
                        </div>
                        <textarea name="message" placeholder="پیام شما *" rows="6" required></textarea>
                        <button type="submit" class="spaciaz-btn spaciaz-btn-primary spaciaz-btn-full">
                            <span>ارسال پیام</span>
                            <span class="spaciaz-btn-icon">←</span>
                        </button>
                        <div class="spaciaz-form-message" id="spaciaz-form-msg"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
