<?php
/**
 * Custom Elementor widgets
 *
 * @package Spaciaz_FA
 */

/**
 * Check if Elementor is active
 */
function spaciaz_is_elementor_active() {
    return class_exists('\Elementor\Widget_Base');
}

if (!spaciaz_is_elementor_active()) {
    return;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

/**
 * Hero Section Widget
 */
class Spaciaz_Hero_Widget extends Widget_Base {
    public function get_name() { return 'spaciaz_hero'; }
    public function get_title() { return __('بخش هیرو', 'spaciaz-fa'); }
    public function get_icon() { return 'eicon-header'; }
    public function get_categories() { return array('spaciaz-fa'); }

    protected function register_controls() {
        $this->start_controls_section('content', array('label' => __('محتوا', 'spaciaz-fa')));

        $this->add_control('title', array(
            'label'   => __('عنوان', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'آینده را با تعالی شکل می‌دهیم',
        ));

        $this->add_control('subtitle', array(
            'label'   => __('زیرعنوان', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXTAREA,
            'default' => 'ما از برترین سازندگان و توسعه‌دهندگان هستیم که کاملاً در موفقیت مشتریان خود سرمایه‌گذاری کرده‌ایم.',
        ));

        $this->add_control('bg_image', array(
            'label'   => __('تصویر پس‌زمینه', 'spaciaz-fa'),
            'type'    => Controls_Manager::MEDIA,
        ));

        $this->add_control('button_text', array(
            'label'   => __('متن دکمه', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'مشاهده خدمات',
        ));

        $this->add_control('button_url', array(
            'label'   => __('لینک دکمه', 'spaciaz-fa'),
            'type'    => Controls_Manager::URL,
        ));

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $bg = !empty($settings['bg_image']['url']) ? $settings['bg_image']['url'] : SPACIAZ_URI . '/assets/images/hero-bg.svg';
        ?>
        <section class="spaciaz-hero" style="background-image: url('<?php echo esc_url($bg); ?>');">
            <div class="spaciaz-hero-overlay"></div>
            <div class="spaciaz-hero-content">
                <h1 class="spaciaz-hero-title"><?php echo esc_html($settings['title']); ?></h1>
                <p class="spaciaz-hero-subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
                <?php if (!empty($settings['button_text'])) :
                    $url = !empty($settings['button_url']['url']) ? $settings['button_url']['url'] : '#';
                ?>
                    <a href="<?php echo esc_url($url); ?>" class="spaciaz-btn spaciaz-btn-light">
                        <span><?php echo esc_html($settings['button_text']); ?></span>
                        <span class="spaciaz-btn-icon">←</span>
                    </a>
                <?php endif; ?>
            </div>
        </section>
        <?php
    }
}

/**
 * Feature Cards Widget
 */
class Spaciaz_Features_Widget extends Widget_Base {
    public function get_name() { return 'spaciaz_features'; }
    public function get_title() { return __('کارت‌های ویژگی', 'spaciaz-fa'); }
    public function get_icon() { return 'eicon-icon-box'; }
    public function get_categories() { return array('spaciaz-fa'); }

    protected function register_controls() {
        $this->start_controls_section('content', array('label' => __('محتوا', 'spaciaz-fa')));

        $repeater = new \Elementor\Repeater();
        $repeater->add_control('icon', array(
            'label' => __('آیکون', 'spaciaz-fa'),
            'type'  => Controls_Manager::ICONS,
            'default' => array('value' => 'fas fa-building', 'library' => 'solid'),
        ));
        $repeater->add_control('title', array(
            'label' => __('عنوان', 'spaciaz-fa'),
            'type'  => Controls_Manager::TEXT,
        ));
        $repeater->add_control('description', array(
            'label' => __('توضیحات', 'spaciaz-fa'),
            'type'  => Controls_Manager::TEXTAREA,
        ));

        $this->add_control('features', array(
            'label'   => __('ویژگی‌ها', 'spaciaz-fa'),
            'type'    => Controls_Manager::REPEATER,
            'fields'  => $repeater->get_controls(),
            'default' => array(
                array('icon' => array('value' => 'fas fa-cube'), 'title' => 'محصولات باکیفیت', 'description' => 'طراحی لوازم و ظریف هماهنگ با معماری اطراف بهترین زندگی را فراهم می‌کند.'),
                array('icon' => array('value' => 'fas fa-headset'), 'title' => 'خدمات حرفه‌ای', 'description' => 'مرکز خدمات مشتری آماده خدمت‌رسانی ۲۴/۷ و پشتیبانی ساکنان برای ارائه اطلاعات.'),
                array('icon' => array('value' => 'fas fa-handshake'), 'title' => 'شراکت واقعی', 'description' => 'ما با سرمایه‌گذاران و توسعه‌دهندگان همکاری می‌کنیم تا بناهایی بسازیم که تأثیرگذار باشند.'),
            ),
        ));

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="spaciaz-features">
            <?php foreach ($settings['features'] as $feature) : ?>
                <div class="spaciaz-feature-card">
                    <div class="spaciaz-feature-icon">
                        <?php \Elementor\Icons_Manager::render_icon($feature['icon'], array('aria-hidden' => 'true')); ?>
                    </div>
                    <h3><?php echo esc_html($feature['title']); ?></h3>
                    <p><?php echo esc_html($feature['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

/**
 * Services Widget
 */
class Spaciaz_Services_Widget extends Widget_Base {
    public function get_name() { return 'spaciaz_services'; }
    public function get_title() { return __('خدمات', 'spaciaz-fa'); }
    public function get_icon() { return 'eicon-posts-grid'; }
    public function get_categories() { return array('spaciaz-fa'); }

    protected function register_controls() {
        $this->start_controls_section('content', array('label' => __('محتوا', 'spaciaz-fa')));

        $this->add_control('count', array(
            'label'   => __('تعداد', 'spaciaz-fa'),
            'type'    => Controls_Manager::NUMBER,
            'default' => 5,
        ));

        $this->add_control('section_title', array(
            'label'   => __('عنوان بخش', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'نگاهی کوتاه به برخی از خدمات ما',
        ));

        $this->add_control('section_subtitle', array(
            'label'   => __('زیرعنوان', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'آنچه ارائه می‌دهیم',
        ));

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $services = get_posts(array('post_type' => 'service', 'posts_per_page' => $settings['count'], 'orderby' => 'menu_order', 'order' => 'ASC'));
        ?>
        <div class="spaciaz-section spaciaz-services-section">
            <div class="spaciaz-container">
                <div class="spaciaz-section-header">
                    <span class="spaciaz-section-label"><?php echo esc_html($settings['section_subtitle']); ?></span>
                    <h2 class="spaciaz-section-title"><?php echo esc_html($settings['section_title']); ?></h2>
                </div>
                <div class="spaciaz-services-grid">
                    <?php foreach ($services as $service) :
                        $icon = get_post_meta($service->ID, '_service_icon', true);
                        if (!$icon) $icon = 'fas fa-building';
                    ?>
                        <a href="<?php echo get_permalink($service->ID); ?>" class="spaciaz-service-card">
                            <div class="spaciaz-service-icon">
                                <i class="<?php echo esc_attr($icon); ?>"></i>
                            </div>
                            <h3><?php echo esc_html($service->post_title); ?></h3>
                            <span class="spaciaz-service-arrow">←</span>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="spaciaz-section-cta">
                    <a href="<?php echo get_post_type_archive_link('service'); ?>" class="spaciaz-btn spaciaz-btn-primary">
                        <span>مشاهده همه خدمات</span>
                        <span class="spaciaz-btn-icon">←</span>
                    </a>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 * Projects Widget
 */
class Spaciaz_Projects_Widget extends Widget_Base {
    public function get_name() { return 'spaciaz_projects'; }
    public function get_title() { return __('پروژه‌ها', 'spaciaz-fa'); }
    public function get_icon() { return 'eicon-portfolio'; }
    public function get_categories() { return array('spaciaz-fa'); }

    protected function register_controls() {
        $this->start_controls_section('content', array('label' => __('محتوا', 'spaciaz-fa')));

        $this->add_control('count', array(
            'label'   => __('تعداد', 'spaciaz-fa'),
            'type'    => Controls_Manager::NUMBER,
            'default' => 4,
        ));

        $this->add_control('section_title', array(
            'label'   => __('عنوان بخش', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'طراحی‌های نوآورانه، تأثیرات ماندگار',
        ));

        $this->add_control('section_subtitle', array(
            'label'   => __('زیرعنوان', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'پروژه‌های منتخب',
        ));

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $projects = get_posts(array('post_type' => 'project', 'posts_per_page' => $settings['count']));
        $i = 1;
        ?>
        <div class="spaciaz-section spaciaz-projects-section">
            <div class="spaciaz-container">
                <div class="spaciaz-section-header">
                    <span class="spaciaz-section-label"><?php echo esc_html($settings['section_subtitle']); ?></span>
                    <h2 class="spaciaz-section-title"><?php echo esc_html($settings['section_title']); ?></h2>
                </div>
                <div class="spaciaz-projects-grid">
                    <?php foreach ($projects as $project) :
                        $location = get_post_meta($project->ID, '_project_location', true);
                        $status = get_post_meta($project->ID, '_project_status', true);
                        $img = get_the_post_thumbnail_url($project->ID, 'spaciaz-project');
                        if (!$img) $img = SPACIAZ_URI . '/assets/images/project-placeholder.svg';
                    ?>
                        <a href="<?php echo get_permalink($project->ID); ?>" class="spaciaz-project-card">
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
                <div class="spaciaz-section-cta">
                    <a href="<?php echo get_post_type_archive_link('project'); ?>" class="spaciaz-btn spaciaz-btn-primary">
                        <span>مشاهده همه پروژه‌ها</span>
                        <span class="spaciaz-btn-icon">←</span>
                    </a>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 * Team Widget
 */
class Spaciaz_Team_Widget extends Widget_Base {
    public function get_name() { return 'spaciaz_team'; }
    public function get_title() { return __('تیم', 'spaciaz-fa'); }
    public function get_icon() { return 'eicon-person'; }
    public function get_categories() { return array('spaciaz-fa'); }

    protected function register_controls() {
        $this->start_controls_section('content', array('label' => __('محتوا', 'spaciaz-fa')));

        $this->add_control('count', array(
            'label'   => __('تعداد', 'spaciaz-fa'),
            'type'    => Controls_Manager::NUMBER,
            'default' => 6,
        ));

        $this->add_control('section_title', array(
            'label'   => __('عنوان بخش', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'رهبری اجرایی جهانی',
        ));

        $this->add_control('section_subtitle', array(
            'label'   => __('زیرعنوان', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'تیم را ملاقات کنید',
        ));

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $members = get_posts(array('post_type' => 'team', 'posts_per_page' => $settings['count']));
        ?>
        <div class="spaciaz-section spaciaz-team-section">
            <div class="spaciaz-container">
                <div class="spaciaz-section-header">
                    <span class="spaciaz-section-label"><?php echo esc_html($settings['section_subtitle']); ?></span>
                    <h2 class="spaciaz-section-title"><?php echo esc_html($settings['section_title']); ?></h2>
                </div>
                <div class="spaciaz-team-grid">
                    <?php foreach ($members as $member) :
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
        </div>
        <?php
    }
}

/**
 * Testimonials Widget
 */
class Spaciaz_Testimonials_Widget extends Widget_Base {
    public function get_name() { return 'spaciaz_testimonials'; }
    public function get_title() { return __('نظرات مشتریان', 'spaciaz-fa'); }
    public function get_icon() { return 'eicon-testimonial'; }
    public function get_categories() { return array('spaciaz-fa'); }

    protected function register_controls() {
        $this->start_controls_section('content', array('label' => __('محتوا', 'spaciaz-fa')));

        $repeater = new \Elementor\Repeater();
        $repeater->add_control('content', array('label' => __('متن', 'spaciaz-fa'), 'type' => Controls_Manager::TEXTAREA));
        $repeater->add_control('name', array('label' => __('نام', 'spaciaz-fa'), 'type' => Controls_Manager::TEXT));
        $repeater->add_control('role', array('label' => __('سمت', 'spaciaz-fa'), 'type' => Controls_Manager::TEXT));

        $this->add_control('testimonials', array(
            'label'   => __('نظرات', 'spaciaz-fa'),
            'type'    => Controls_Manager::REPEATER,
            'fields'  => $repeater->get_controls(),
            'default' => array(
                array('content' => 'آن‌ها می‌دانستند چه می‌کنند و در طول فرآیند فوق‌العاده آگاه بودند. تجربه‌ای عالی!', 'name' => 'استر هاوارد', 'role' => 'دستیار مدیر پروژه'),
                array('content' => 'تجربه‌ای شگفت‌انگیز! آن‌ها می‌دانستند چه می‌کنند و در طول فرآیند فوق‌العاده آگاه بودند.', 'name' => 'جان مک‌کانر', 'role' => 'مدیر ارشد بازاریابی'),
                array('content' => 'تیم شما برای بازسازی زیرزمین ما عالی بود! قطعاً برای پروژه‌های آینده با آن‌ها کار خواهم کرد.', 'name' => 'فلوید مایلز', 'role' => 'هماهنگ‌کننده پروژه'),
                array('content' => 'درخواست کردم منطقه بازسازی شود و آن‌ها بسیار سریع بودند! نتیجه عالی بود! قویاً توصیه می‌کنم!', 'name' => 'استر هاوارد', 'role' => 'دستیار مدیر پروژه'),
            ),
        ));

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="spaciaz-section spaciaz-testimonials-section">
            <div class="spaciaz-container">
                <div class="spaciaz-testimonials-slider" id="spaciaz-testimonials">
                    <div class="spaciaz-testimonials-track">
                        <?php foreach ($settings['testimonials'] as $t) : ?>
                            <div class="spaciaz-testimonial">
                                <div class="spaciaz-testimonial-content">
                                    <p><?php echo esc_html($t['content']); ?></p>
                                </div>
                                <div class="spaciaz-testimonial-author">
                                    <h4><?php echo esc_html($t['name']); ?></h4>
                                    <span><?php echo esc_html($t['role']); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="spaciaz-testimonials-nav">
                        <button class="spaciaz-slider-prev" aria-label="قبلی">→</button>
                        <button class="spaciaz-slider-next" aria-label="بعدی">←</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 * Stats Widget
 */
class Spaciaz_Stats_Widget extends Widget_Base {
    public function get_name() { return 'spaciaz_stats'; }
    public function get_title() { return __('آمار', 'spaciaz-fa'); }
    public function get_icon() { return 'eicon-counter'; }
    public function get_categories() { return array('spaciaz-fa'); }

    protected function register_controls() {
        $this->start_controls_section('content', array('label' => __('محتوا', 'spaciaz-fa')));

        $repeater = new \Elementor\Repeater();
        $repeater->add_control('label', array('label' => __('برچسب', 'spaciaz-fa'), 'type' => Controls_Manager::TEXT));
        $repeater->add_control('value', array('label' => __('مقدار', 'spaciaz-fa'), 'type' => Controls_Manager::TEXT));
        $repeater->add_control('suffix', array('label' => __('پسوند', 'spaciaz-fa'), 'type' => Controls_Manager::TEXT, 'default' => '+'));

        $this->add_control('stats', array(
            'label'   => __('آمار', 'spaciaz-fa'),
            'type'    => Controls_Manager::REPEATER,
            'fields'  => $repeater->get_controls(),
            'default' => array(
                array('label' => 'دفاتر در سراسر جهان', 'value' => '22', 'suffix' => '+'),
                array('label' => 'کارکنان', 'value' => '404', 'suffix' => '+'),
                array('label' => 'پروژه‌های انجام شده', 'value' => '66', 'suffix' => '+'),
            ),
        ));

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="spaciaz-stats">
            <?php foreach ($settings['stats'] as $stat) : ?>
                <div class="spaciaz-stat-item">
                    <div class="spaciaz-stat-value" data-target="<?php echo esc_attr($stat['value']); ?>">0</div>
                    <div class="spaciaz-stat-suffix"><?php echo esc_html($stat['suffix']); ?></div>
                    <div class="spaciaz-stat-label"><?php echo esc_html($stat['label']); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

/**
 * CTA / Contact Form Widget
 */
class Spaciaz_CTA_Widget extends Widget_Base {
    public function get_name() { return 'spaciaz_cta'; }
    public function get_title() { return __('فرم تماس سریع', 'spaciaz-fa'); }
    public function get_icon() { return 'eicon-form'; }
    public function get_categories() { return array('spaciaz-fa'); }

    protected function register_controls() {
        $this->start_controls_section('content', array('label' => __('محتوا', 'spaciaz-fa')));

        $this->add_control('title', array(
            'label'   => __('عنوان', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'مشاوره تخصصی برای املاک مسکونی، تجاری یا ملکی',
        ));

        $this->add_control('subtitle', array(
            'label'   => __('زیرعنوان', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'درخواست سریع',
        ));

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="spaciaz-cta-section">
            <div class="spaciaz-container">
                <div class="spaciaz-cta-wrapper">
                    <div class="spaciaz-cta-info">
                        <span class="spaciaz-section-label"><?php echo esc_html($settings['subtitle']); ?></span>
                        <h2><?php echo esc_html($settings['title']); ?></h2>
                        <p>ما هیجان‌زده‌ایم که با شما در ارتباط باشیم! فیلدهای مورد نیاز با * علامت‌گذاری شده‌اند.</p>
                    </div>
                    <div class="spaciaz-cta-form">
                        <form class="spaciaz-contact-form" id="spaciaz-quick-form">
                            <div class="spaciaz-form-row">
                                <input type="text" name="name" placeholder="نام و نام خانوادگی *" required>
                                <input type="tel" name="phone" placeholder="شماره تماس *" required>
                            </div>
                            <div class="spaciaz-form-row">
                                <input type="email" name="email" placeholder="ایمیل *">
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
        </div>
        <?php
    }
}

/**
 * Blog Posts Widget
 */
class Spaciaz_Blog_Widget extends Widget_Base {
    public function get_name() { return 'spaciaz_blog'; }
    public function get_title() { return __('مقالات و بینش‌ها', 'spaciaz-fa'); }
    public function get_icon() { return 'eicon-post-list'; }
    public function get_categories() { return array('spaciaz-fa'); }

    protected function register_controls() {
        $this->start_controls_section('content', array('label' => __('محتوا', 'spaciaz-fa')));

        $this->add_control('count', array(
            'label'   => __('تعداد', 'spaciaz-fa'),
            'type'    => Controls_Manager::NUMBER,
            'default' => 4,
        ));

        $this->add_control('section_title', array(
            'label'   => __('عنوان بخش', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'الهام و روندها را کشف کنید',
        ));

        $this->add_control('section_subtitle', array(
            'label'   => __('زیرعنوان', 'spaciaz-fa'),
            'type'    => Controls_Manager::TEXT,
            'default' => 'مقالات و بینش‌ها',
        ));

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $posts = get_posts(array('numberposts' => $settings['count'], 'post_status' => 'publish'));
        ?>
        <div class="spaciaz-section spaciaz-blog-section">
            <div class="spaciaz-container">
                <div class="spaciaz-section-header spaciaz-section-header-row">
                    <div>
                        <span class="spaciaz-section-label"><?php echo esc_html($settings['section_subtitle']); ?></span>
                        <h2 class="spaciaz-section-title"><?php echo esc_html($settings['section_title']); ?></h2>
                    </div>
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="spaciaz-btn spaciaz-btn-outline">
                        <span>مشاهده همه مقالات</span>
                        <span class="spaciaz-btn-icon">←</span>
                    </a>
                </div>
                <div class="spaciaz-blog-grid">
                    <?php foreach ($posts as $post) :
                        $img = get_the_post_thumbnail_url($post->ID, 'spaciaz-blog');
                        if (!$img) $img = SPACIAZ_URI . '/assets/images/blog-placeholder.svg';
                        $cats = get_the_category($post->ID);
                    ?>
                        <a href="<?php echo get_permalink($post->ID); ?>" class="spaciaz-blog-card">
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
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 * Register all widgets
 */
function spaciaz_register_widgets() {
    \Elementor\Plugin::instance()->widgets_manager->register(new Spaciaz_Hero_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register(new Spaciaz_Features_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register(new Spaciaz_Services_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register(new Spaciaz_Projects_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register(new Spaciaz_Team_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register(new Spaciaz_Testimonials_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register(new Spaciaz_Stats_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register(new Spaciaz_CTA_Widget());
    \Elementor\Plugin::instance()->widgets_manager->register(new Spaciaz_Blog_Widget());
}
add_action('elementor/widgets/register', 'spaciaz_register_widgets');
