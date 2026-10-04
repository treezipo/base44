<?php
/**
 * Template Name: خدمات
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<div class="spaciaz-services-page">
    <div class="spaciaz-page-hero">
        <div class="spaciaz-container">
            <div class="spaciaz-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">خانه</a>
                <span class="spaciaz-breadcrumb-sep">/</span>
                <span>خدمات</span>
            </div>
            <h1>خدمات ما</h1>
            <p>خدمات برتر توسعه املاک را با بالاترین کیفیت ارائه می‌دهیم.</p>
        </div>
    </div>
    <section class="spaciaz-section">
        <div class="spaciaz-container">
            <div class="spaciaz-services-grid">
                <?php
                $services = get_posts(array('post_type' => 'service', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC'));
                $icons = array('fas fa-building', 'fas fa-tasks', 'fas fa-chart-line', 'fas fa-hard-hat', 'fas fa-drafting-compass');
                $i = 0;
                foreach ($services as $service) :
                ?>
                    <a href="<?php echo get_permalink($service->ID); ?>" class="spaciaz-service-card">
                        <div class="spaciaz-service-icon">
                            <i class="<?php echo esc_attr($icons[$i % count($icons)]); ?>"></i>
                        </div>
                        <h3><?php echo esc_html($service->post_title); ?></h3>
                        <?php if ($service->post_excerpt) : ?><p><?php echo esc_html($service->post_excerpt); ?></p><?php endif; ?>
                        <span class="spaciaz-service-arrow">←</span>
                    </a>
                <?php $i++; endforeach; ?>
            </div>
        </div>
    </section>
    <section class="spaciaz-cta-section">
        <div class="spaciaz-container">
            <div class="spaciaz-cta-wrapper">
                <div class="spaciaz-cta-info">
                    <span class="spaciaz-section-label">درخواست سریع</span>
                    <h2>مشاوره تخصصی برای املاک مسکونی، تجاری یا ملکی</h2>
                    <p>ما هیجان‌زده‌ایم که با شما در ارتباط باشیم!</p>
                </div>
                <div class="spaciaz-cta-form">
                    <form class="spaciaz-contact-form" id="spaciaz-quick-form">
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
                        <textarea name="message" placeholder="پیام شما *" rows="4" required></textarea>
                        <button type="submit" class="spaciaz-btn spaciaz-btn-primary spaciaz-btn-full">
                            <span>درخواست تماس</span>
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
