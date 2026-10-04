<?php
/**
 * Template Name: درباره ما
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<div class="spaciaz-about-page">
    <!-- Page Hero -->
    <div class="spaciaz-page-hero">
        <div class="spaciaz-container">
            <div class="spaciaz-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">خانه</a>
                <span class="spaciaz-breadcrumb-sep">/</span>
                <span>درباره ما</span>
            </div>
            <h1>درباره سپاسیاز</h1>
            <p>ما از ۲۵ سازنده برتر هستیم که کاملاً در موفقیت مشتریان خود سرمایه‌گذاری کرده‌ایم.</p>
        </div>
    </div>

    <!-- About Content -->
    <section class="spaciaz-section">
        <div class="spaciaz-container">
            <div class="spaciaz-about-content">
                <div class="spaciaz-about-text">
                    <div class="spaciaz-about-item">
                        <h3>چشم‌مان ما</h3>
                        <p>توانمندسازی کسب‌وکارها با راه‌حل‌های پیشرفته وب که حضور دیجیتال آن‌ها را تقویت و رشد را هدایت می‌کند. ما به آینده‌ای باور داریم که در آن هر سازمان بتواند از فناوری برای خلق ارزش پایدار استفاده کند.</p>
                    </div>
                    <div class="spaciaz-about-item">
                        <h3>مأموریت ما</h3>
                        <p>راه‌حل‌های ما برای پاسخ به نیازهای سازمان‌های مدرن طراحی شده‌اند و تضمین می‌کنند که در فضای رقابتی امروز رشد می‌کنند. مأموریت ما ارائه خدمات باکیفیت و نوآورانه به مشتریان است.</p>
                    </div>
                </div>
                <div class="spaciaz-stats">
                    <div class="spaciaz-stat-item">
                        <div class="spaciaz-stat-value" data-target="22">0</div>
                        <div class="spaciaz-stat-suffix">+</div>
                        <div class="spaciaz-stat-label">گستره جهانی</div>
                        <div class="spaciaz-stat-sublabel">دفاتر در سراسر جهان</div>
                    </div>
                    <div class="spaciaz-stat-item">
                        <div class="spaciaz-stat-value" data-target="404">0</div>
                        <div class="spaciaz-stat-suffix">+</div>
                        <div class="spaciaz-stat-label">تخصص محلی</div>
                        <div class="spaciaz-stat-sublabel">کارکنان</div>
                    </div>
                    <div class="spaciaz-stat-item">
                        <div class="spaciaz-stat-value" data-target="66">0</div>
                        <div class="spaciaz-stat-suffix">+</div>
                        <div class="spaciaz-stat-label">تأثیر ما</div>
                        <div class="spaciaz-stat-sublabel">پروژه‌های انجام شده</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Commitment Section -->
    <section class="spaciaz-section spaciaz-bg-light">
        <div class="spaciaz-container">
            <div class="spaciaz-section-header">
                <span class="spaciaz-section-label">تعهد ما</span>
                <h2 class="spaciaz-section-title">چه چیزی ما را متفاوت می‌کند</h2>
            </div>
            <div class="spaciaz-commitment-items spaciaz-commitment-grid">
                <div class="spaciaz-commitment-item">
                    <h4>مسئولیت سازمانی</h4>
                    <p>هدف ما صفر حادثه است و نرخ فراوانی زمان از دست رفته ما در صنعت پیشگام است.</p>
                </div>
                <div class="spaciaz-commitment-item">
                    <h4>متخصصان با روحیه تیمی</h4>
                    <p>تیم چندتخصصه ما راه‌حل‌های نوآورانه و پیشرو ارائه می‌دهد.</p>
                </div>
                <div class="spaciaz-commitment-item">
                    <h4>تنوع، برابری و شمول</h4>
                    <p>ما با سرمایه‌گذاران و توسعه‌دهندگان همکاری می‌کنیم تا بناهایی بسازیم که تأثیرگذار باشند.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="spaciaz-section">
        <div class="spaciaz-container">
            <div class="spaciaz-section-header">
                <span class="spaciaz-section-label">تیم را ملاقات کنید</span>
                <h2 class="spaciaz-section-title">رهبری اجرایی جهانی</h2>
            </div>
            <div class="spaciaz-team-grid">
                <?php
                $members = get_posts(array('post_type' => 'team', 'posts_per_page' => 6));
                foreach ($members as $member) :
                    $role = get_post_meta($member->ID, '_team_role', true);
                    if (!$role) $role = $member->post_excerpt;
                    $img = get_the_post_thumbnail_url($member->ID, 'spaciaz-team');
                    if (!$img) $img = SPACIAZ_URI . '/assets/images/team-placeholder.svg';
                ?>
                    <a href="<?php echo get_permalink($member->ID); ?>" class="spaciaz-team-card">
                        <div class="spaciaz-team-image">
                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($member->post_title); ?>" loading="lazy">
                        </div>
                        <div class="spaciaz-team-info">
                            <span class="spaciaz-team-role"><?php echo esc_html($role); ?></span>
                            <h3><?php echo esc_html($member->post_title); ?></h3>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>
