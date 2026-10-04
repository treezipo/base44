<?php
/**
 * Front page template - Homepage
 *
 * @package Spaciaz_FA
 */

get_header();
?>

<!-- Hero Section -->
<section class="spaciaz-hero" style="background-image: url('<?php echo esc_url(SPACIAZ_URI . '/assets/images/hero-bg.svg'); ?>');">
    <div class="spaciaz-hero-overlay"></div>
    <div class="spaciaz-hero-content">
        <h1 class="spaciaz-hero-title reveal-up">آینده را با تعالی شکل می‌دهیم</h1>
        <p class="spaciaz-hero-subtitle reveal-up" data-delay="200">ما از ۲۵ سازنده برتر هستیم که کاملاً در موفقیت مشتریان خود سرمایه‌گذاری کرده‌ایم و جوامعی که خدمت می‌کنیم را بهبود می‌بخشیم.</p>
        <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="spaciaz-btn spaciaz-btn-light reveal-up" data-delay="400">
            <span>مشاهده خدمات</span>
            <span class="spaciaz-btn-icon">←</span>
        </a>
    </div>
    <div class="spaciaz-hero-bottom">
        <p class="reveal-up" data-delay="600">ما پروژه‌های املاک برجسته‌ای را توسعه داده‌ایم که ارزش ماندگاری برای سرمایه‌گذاران و جوامع ایجاد می‌کند.</p>
    </div>
    <!-- Feature Cards -->
    <div class="spaciaz-hero-features">
        <div class="spaciaz-feature-card reveal-up" data-delay="800">
            <div class="spaciaz-feature-icon">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"><circle cx="12" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="28" cy="12" r="6" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="28" r="6" stroke="currentColor" stroke-width="2"/><circle cx="28" cy="28" r="6" stroke="currentColor" stroke-width="2"/></svg>
            </div>
            <h3>محصولات باکیفیت</h3>
            <p>طراحی لوازم و ظریف هماهنگ با معماری اطراف بهترین زندگی را فراهم می‌کند.</p>
        </div>
        <div class="spaciaz-feature-card reveal-up" data-delay="900">
            <div class="spaciaz-feature-icon">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"><path d="M20 4L24 12L33 13L26 19L28 28L20 24L12 28L14 19L7 13L16 12L20 4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
            </div>
            <h3>خدمات حرفه‌ای</h3>
            <p>مرکز خدمات مشتری آماده خدمت‌رسانی ۲۴/۷ و پشتیبانی ساکنان برای ارائه اطلاعات.</p>
        </div>
        <div class="spaciaz-feature-card reveal-up" data-delay="1000">
            <div class="spaciaz-feature-icon">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"><path d="M8 8L32 32M32 8L8 32" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </div>
            <h3>شراکت واقعی</h3>
            <p>ما با سرمایه‌گذاران و توسعه‌دهندگان همکاری می‌کنیم تا بناهایی بسازیم که تأثیرگذار باشند.</p>
        </div>
    </div>
</section>

<!-- Who We Are Section -->
<section class="spaciaz-section spaciaz-about-section">
    <div class="spaciaz-container">
        <div class="spaciaz-section-header reveal-up">
            <span class="spaciaz-section-label">ما کیستیم</span>
            <h2 class="spaciaz-section-title">بزرگترین سرمایه‌گذاران و مدیران خصوصی املاک در جهان</h2>
        </div>
        <div class="spaciaz-about-content">
            <div class="spaciaz-about-text reveal-up">
                <div class="spaciaz-about-item">
                    <h3>چشم‌مان ما</h3>
                    <p>توانمندسازی کسب‌وکارها با راه‌حل‌های پیشرفته وب که حضور دیجیتال آن‌ها را تقویت و رشد را هدایت می‌کند.</p>
                </div>
                <div class="spaciaz-about-item">
                    <h3>مأموریت ما</h3>
                    <p>راه‌حل‌های ما برای پاسخ به نیازهای سازمان‌های مدرن طراحی شده‌اند و تضمین می‌کنند که در فضای رقابتی امروز رشد می‌کنند.</p>
                </div>
            </div>
            <div class="spaciaz-stats reveal-up" data-delay="200">
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

<!-- Services Section -->
<section class="spaciaz-section spaciaz-services-section spaciaz-bg-light">
    <div class="spaciaz-container">
        <div class="spaciaz-section-header reveal-up">
            <span class="spaciaz-section-label">آنچه ارائه می‌دهیم</span>
            <h2 class="spaciaz-section-title">نگاهی کوتاه به برخی از خدمات ما</h2>
        </div>
        <div class="spaciaz-services-grid">
            <?php
            $services = get_posts(array('post_type' => 'service', 'posts_per_page' => 5, 'orderby' => 'menu_order', 'order' => 'ASC'));
            $icons = array('fas fa-building', 'fas fa-tasks', 'fas fa-chart-line', 'fas fa-hard-hat', 'fas fa-drafting-compass');
            $i = 0;
            foreach ($services as $service) :
            ?>
                <a href="<?php echo get_permalink($service->ID); ?>" class="spaciaz-service-card reveal-up" data-delay="<?php echo $i * 100; ?>">
                    <div class="spaciaz-service-icon">
                        <i class="<?php echo esc_attr($icons[$i % count($icons)]); ?>"></i>
                    </div>
                    <h3><?php echo esc_html($service->post_title); ?></h3>
                    <span class="spaciaz-service-arrow">←</span>
                </a>
            <?php $i++; endforeach; ?>
        </div>
        <div class="spaciaz-section-cta reveal-up">
            <p>خدمات برتر توسعه املاک را کشف کنید.</p>
            <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>" class="spaciaz-btn spaciaz-btn-primary">
                <span>مشاهده همه خدمات</span>
                <span class="spaciaz-btn-icon">←</span>
            </a>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="spaciaz-section spaciaz-projects-section">
    <div class="spaciaz-container">
        <div class="spaciaz-section-header reveal-up">
            <span class="spaciaz-section-label">پروژه‌های منتخب</span>
            <h2 class="spaciaz-section-title">طراحی‌های نوآورانه، تأثیرات ماندگار</h2>
        </div>
        <div class="spaciaz-projects-grid">
            <?php
            $projects = get_posts(array('post_type' => 'project', 'posts_per_page' => 4));
            $i = 1;
            foreach ($projects as $project) :
                $location = get_post_meta($project->ID, '_project_location', true);
                $status = get_post_meta($project->ID, '_project_status', true);
                $img = get_the_post_thumbnail_url($project->ID, 'spaciaz-project');
                if (!$img) $img = SPACIAZ_URI . '/assets/images/project-placeholder.svg';
            ?>
                <a href="<?php echo get_permalink($project->ID); ?>" class="spaciaz-project-card reveal-up" data-delay="<?php echo ($i - 1) * 150; ?>">
                    <div class="spaciaz-project-image" style="background-image: url('<?php echo esc_url($img); ?>');"></div>
                    <div class="spaciaz-project-overlay">
                        <div class="spaciaz-project-info">
                            <?php if ($location) : ?><span class="spaciaz-project-location"><?php echo esc_html($location); ?></span><?php endif; ?>
                            <h3><?php echo esc_html($project->post_title); ?></h3>
                            <?php if ($status) : ?><span class="spaciaz-project-status"><?php echo esc_html($status); ?></span><?php endif; ?>
                        </div>
                        <span class="spaciaz-project-number"><?php echo sprintf('%02d', $i); ?></span>
                    </div>
                </a>
            <?php $i++; endforeach; ?>
        </div>
    </div>
</section>

<!-- Commitment Section -->
<section class="spaciaz-section spaciaz-commitment-section">
    <div class="spaciaz-container">
        <div class="spaciaz-commitment-wrapper">
            <div class="spaciaz-commitment-content reveal-up">
                <div class="spaciaz-section-header spaciaz-section-header-left">
                    <span class="spaciaz-section-label">تعهد ما</span>
                    <h2 class="spaciaz-section-title">چه چیزی ما را متفاوت می‌کند</h2>
                </div>
                <p>فقط درباره ایجاد چیزی خوب نیست؛ بلکه درباره طراحی، نوآوری و همکاری برای خلق تجربیات فوق‌العاده و بی‌نظیر است.</p>
                <div class="spaciaz-commitment-items">
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
            <div class="spaciaz-commitment-image reveal-up" data-delay="200">
                <img src="<?php echo esc_url(SPACIAZ_URI . '/assets/images/commitment.svg'); ?>" alt="تعهد ما" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="spaciaz-section spaciaz-testimonials-section spaciaz-bg-dark">
    <div class="spaciaz-container">
        <div class="spaciaz-testimonials-header reveal-up">
            <div class="spaciaz-testimonials-rating">
                <span class="spaciaz-rating-value">۴.۹</span>
                <div class="spaciaz-rating-stars">★★★★★</div>
            </div>
            <p class="spaciaz-testimonials-count">۲۰۰۰+ مشتری راضی</p>
        </div>
        <div class="spaciaz-testimonials-slider" id="spaciaz-testimonials">
            <div class="spaciaz-testimonials-track">
                <div class="spaciaz-testimonial">
                    <div class="spaciaz-testimonial-content">
                        <p>آن‌ها می‌دانستند چه می‌کنند و در طول فرآیند فوق‌العاده آگاه بودند. تجربه‌ای عالی!</p>
                    </div>
                    <div class="spaciaz-testimonial-author">
                        <h4>استر هاوارد</h4>
                        <span>دستیار مدیر پروژه</span>
                    </div>
                </div>
                <div class="spaciaz-testimonial">
                    <div class="spaciaz-testimonial-content">
                        <p>تجربه‌ای شگفت‌انگیز! آن‌ها می‌دانستند چه می‌کنند و در طول فرآیند فوق‌العاده آگاه بودند.</p>
                    </div>
                    <div class="spaciaz-testimonial-author">
                        <h4>جان مک‌کانن</h4>
                        <span>مدیر ارشد بازاریابی</span>
                    </div>
                </div>
                <div class="spaciaz-testimonial">
                    <div class="spaciaz-testimonial-content">
                        <p>تیم شما برای بازسازی زیرزمین ما عالی بود! قطعاً برای پروژه‌های آینده با آن‌ها کار خواهم کرد.</p>
                    </div>
                    <div class="spaciaz-testimonial-author">
                        <h4>فلوید مایلز</h4>
                        <span>هماهنگ‌کننده پروژه</span>
                    </div>
                </div>
                <div class="spaciaz-testimonial">
                    <div class="spaciaz-testimonial-content">
                        <p>درخواست کردم منطقه بازسازی شود و آن‌ها بسیار سریع بودند! نتیجه عالی بود! قویاً توصیه می‌کنم!</p>
                    </div>
                    <div class="spaciaz-testimonial-author">
                        <h4>استر هاوارد</h4>
                        <span>دستیار مدیر پروژه</span>
                    </div>
                </div>
            </div>
            <div class="spaciaz-testimonials-nav">
                <button class="spaciaz-slider-prev" aria-label="قبلی">→</button>
                <button class="spaciaz-slider-next" aria-label="بعدی">←</button>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="spaciaz-section spaciaz-team-section">
    <div class="spaciaz-container">
        <div class="spaciaz-section-header reveal-up">
            <span class="spaciaz-section-label">تیم را ملاقات کنید</span>
            <h2 class="spaciaz-section-title">رهبری اجرایی جهانی</h2>
        </div>
        <div class="spaciaz-team-grid">
            <?php
            $members = get_posts(array('post_type' => 'team', 'posts_per_page' => 6));
            $i = 0;
            foreach ($members as $member) :
                $role = get_post_meta($member->ID, '_team_role', true);
                if (!$role) $role = $member->post_excerpt;
                $img = get_the_post_thumbnail_url($member->ID, 'spaciaz-team');
                if (!$img) $img = SPACIAZ_URI . '/assets/images/team-placeholder.svg';
            ?>
                <a href="<?php echo get_permalink($member->ID); ?>" class="spaciaz-team-card reveal-up" data-delay="<?php echo $i * 100; ?>">
                    <div class="spaciaz-team-image">
                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($member->post_title); ?>" loading="lazy">
                    </div>
                    <div class="spaciaz-team-info">
                        <span class="spaciaz-team-role"><?php echo esc_html($role); ?></span>
                        <h3><?php echo esc_html($member->post_title); ?></h3>
                    </div>
                </a>
            <?php $i++; endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA / Quick Enquiry Section -->
<section class="spaciaz-cta-section">
    <div class="spaciaz-container">
        <div class="spaciaz-cta-wrapper">
            <div class="spaciaz-cta-info reveal-up">
                <span class="spaciaz-section-label">درخواست سریع</span>
                <h2>مشاوره تخصصی برای املاک مسکونی، تجاری یا ملکی</h2>
                <p>ما هیجان‌زده‌ایم که با شما در ارتباط باشیم! فیلدهای مورد نیاز با * علامت‌گذاری شده‌اند.</p>
                <div class="spaciaz-cta-shape"></div>
            </div>
            <div class="spaciaz-cta-form reveal-up" data-delay="200">
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

<!-- Blog Section -->
<section class="spaciaz-section spaciaz-blog-section">
    <div class="spaciaz-container">
        <div class="spaciaz-section-header spaciaz-section-header-row reveal-up">
            <div>
                <span class="spaciaz-section-label">مقالات و بینش‌ها</span>
                <h2 class="spaciaz-section-title">الهام و روندها را کشف کنید</h2>
            </div>
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="spaciaz-btn spaciaz-btn-outline">
                <span>مشاهده همه مقالات</span>
                <span class="spaciaz-btn-icon">←</span>
            </a>
        </div>
        <div class="spaciaz-blog-grid">
            <?php
            $posts = get_posts(array('numberposts' => 4, 'post_status' => 'publish'));
            $i = 0;
            foreach ($posts as $post) :
                $img = get_the_post_thumbnail_url($post->ID, 'spaciaz-blog');
                if (!$img) $img = SPACIAZ_URI . '/assets/images/blog-placeholder.svg';
                $cats = get_the_category($post->ID);
            ?>
                <a href="<?php echo get_permalink($post->ID); ?>" class="spaciaz-blog-card reveal-up" data-delay="<?php echo $i * 100; ?>">
                    <div class="spaciaz-blog-image">
                        <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($post->post_title); ?>" loading="lazy">
                        <?php if ($cats) : ?>
                            <span class="spaciaz-blog-category"><?php echo esc_html($cats[0]->name); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="spaciaz-blog-content">
                        <span class="spaciaz-blog-date"><?php echo esc_html(get_the_date('j F Y', $post->ID)); ?></span>
                        <h3><?php echo esc_html($post->post_title); ?></h3>
                    </div>
                </a>
            <?php $i++; endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
