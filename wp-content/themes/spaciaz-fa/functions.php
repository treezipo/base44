<?php
/**
 * Spaciaz FA - Main functions file
 *
 * @package Spaciaz_FA
 */

define('SPACIAZ_VERSION', '1.0.0');
define('SPACIAZ_DIR', get_template_directory());
define('SPACIAZ_URI', get_template_directory_uri());

require_once SPACIAZ_DIR . '/inc/setup.php';
require_once SPACIAZ_DIR . '/inc/cpt.php';
require_once SPACIAZ_DIR . '/inc/customizer.php';
require_once SPACIAZ_DIR . '/inc/widgets.php';

/**
 * Enqueue styles and scripts
 */
function spaciaz_enqueue_assets() {
    // Vazirmatn Persian font from Google Fonts
    wp_enqueue_style(
        'vazirmatn',
        'https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap',
        array(),
        null
    );

    // Main theme stylesheet
    wp_enqueue_style('spaciaz-style', SPACIAZ_URI . '/assets/css/style.css', array('vazirmatn'), SPACIAZ_VERSION);

    // RTL stylesheet
    if (is_rtl()) {
        wp_enqueue_style('spaciaz-rtl', SPACIAZ_URI . '/assets/css/rtl.css', array('spaciaz-style'), SPACIAZ_VERSION);
    }

    // Main script
    wp_enqueue_script('spaciaz-main', SPACIAZ_URI . '/assets/js/main.js', array(), SPACIAZ_VERSION, true);

    // Comment reply
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'spaciaz_enqueue_assets');

/**
 * Add theme support features
 */
function spaciaz_theme_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('custom-logo', array(
        'height'      => 40,
        'width'       => 160,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');

    // Image sizes
    add_image_size('spaciaz-project', 600, 450, true);
    add_image_size('spaciaz-blog', 1024, 682, true);
    add_image_size('spaciaz-team', 400, 500, true);

    // Elementor support
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'spaciaz_theme_features');

/**
 * Register navigation menus
 */
function spaciaz_register_menus() {
    register_nav_menus(array(
        'primary' => __('منوی اصلی', 'spaciaz-fa'),
        'footer'  => __('منوی فوتر', 'spaciaz-fa'),
    ));
}
add_action('init', 'spaciaz_register_menus');

/**
 * Elementor compatibility - register categories and widgets
 */
function spaciaz_register_elementor_category($elements_manager) {
    $elements_manager->add_category('spaciaz-fa', array(
        'title' => __('سپاسیاز', 'spaciaz-fa'),
        'icon'  => 'fa fa-building',
    ));
}
add_action('elementor/elements/categories_registered', 'spaciaz_register_elementor_category');

/**
 * Seed demo content on theme activation
 */
function spaciaz_fa_seed_content() {
    // Set permalink structure
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%postname%/');
    $wp_rewrite->flush_rules();

    // Create pages
    $pages = array(
        'home'    => array('title' => 'خانه', 'template' => 'front-page.php'),
        'about'   => array('title' => 'درباره ما', 'template' => 'page-templates/about.php'),
        'services' => array('title' => 'خدمات', 'template' => 'page-templates/services.php'),
        'projects' => array('title' => 'پروژه‌ها', 'template' => 'page-templates/projects.php'),
        'blog'    => array('title' => 'بلاگ', 'template' => ''),
        'contact' => array('title' => 'تماس با ما', 'template' => 'page-templates/contact.php'),
    );

    foreach ($pages as $slug => $data) {
        $existing = get_page_by_path($slug);
        if (!$existing) {
            $page_id = wp_insert_post(array(
                'post_title'   => $data['title'],
                'post_name'    => $slug,
                'post_status'  => 'publish',
                'post_type'    => 'page',
                'post_content' => '',
            ));
            if ($data['template'] && !is_wp_error($page_id)) {
                update_post_meta($page_id, '_wp_page_template', $data['template']);
            }
        }
    }

    // Set front page
    $home_page = get_page_by_path('home');
    if ($home_page) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_page->ID);
    }
    $blog_page = get_page_by_path('blog');
    if ($blog_page) {
        update_option('page_for_posts', $blog_page->ID);
    }

    // Set language to Persian
    update_option('WPLANG', 'fa_IR');

    // Create sample services
    $services = array(
        array('title' => 'توسعه املاک و مستغلات', 'slug' => 'real-estate-development'),
        array('title' => 'مدیریت پروژه', 'slug' => 'project-management'),
        array('title' => 'سرمایه‌گذاری و سرمایه', 'slug' => 'investment-capital'),
        array('title' => 'مدیریت ساخت و ساز', 'slug' => 'construction-management'),
        array('title' => 'معماری و طراحی', 'slug' => 'architecture-design'),
    );

    foreach ($services as $svc) {
        $existing = get_page_by_path($svc['slug'], OBJECT, 'service');
        if (!$existing) {
            wp_insert_post(array(
                'post_title'   => $svc['title'],
                'post_name'     => $svc['slug'],
                'post_status'   => 'publish',
                'post_type'     => 'service',
                'post_content'  => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.',
                'post_excerpt'  => 'خدمات حرفه‌ای در زمینه ' . $svc['title'] . ' با بالاترین کیفیت.',
            ));
        }
    }

    // Create sample projects
    $projects = array(
        array('title' => 'مجتمع مسکونی آپارتمان', 'slug' => 'apartment-building', 'location' => 'تهران', 'status' => 'در حال ساخت'),
        array('title' => 'پروژه ادن استیت', 'slug' => 'eden-estate', 'location' => 'اصفهان', 'status' => 'تکمیل شده'),
        array('title' => 'ویستا کاونسیل اسکوئر', 'slug' => 'vista-at-councill-square', 'location' => 'تهران', 'status' => 'در حال ساخت'),
        array('title' => 'ساختمان اداری', 'slug' => 'office-building', 'location' => 'شیراز', 'status' => 'در حال ساخت'),
        array('title' => 'برج دوقلو', 'slug' => 'twin-towers', 'location' => 'مشهد', 'status' => 'تکمیل شده'),
        array('title' => 'مجتمع تجاری', 'slug' => 'commercial-complex', 'location' => 'کرج', 'status' => 'در حال طراحی'),
    );

    foreach ($projects as $proj) {
        $existing = get_page_by_path($proj['slug'], OBJECT, 'project');
        if (!$existing) {
            $pid = wp_insert_post(array(
                'post_title'   => $proj['title'],
                'post_name'     => $proj['slug'],
                'post_status'   => 'publish',
                'post_type'     => 'project',
                'post_content'  => 'این پروژه یکی از نمونه‌های برجسته کارهای ما در حوزه ساخت و ساز است. با طراحی مدرن و مصالح باکیفیت، این پروژه استانداردهای بالایی را در زمینه معماری و ساخت ارائه می‌دهد.',
                'post_excerpt'  => 'پروژه‌ای برجسته در ' . $proj['location'],
            ));
            if (!is_wp_error($pid)) {
                // Set project meta
                update_post_meta($pid, '_project_location', $proj['location']);
                update_post_meta($pid, '_project_status', $proj['status']);
                update_post_meta($pid, '_project_year', '1403');
                update_post_meta($pid, '_project_client', 'شرکت توسعه عمران');

                // Set taxonomy terms
                wp_set_object_terms($pid, $proj['location'], 'project_location');
                wp_set_object_terms($pid, $proj['status'], 'project_status');
            }
        }
    }

    // Create team members
    $team_members = array(
        array('title' => 'دانیال دانیالی', 'slug' => 'dennis-daniels', 'role' => 'بنیانگذار و مدیرعامل'),
        array('title' => 'جوهر سنفورد', 'slug' => 'johan-sanford', 'role' => 'دستیار اجرایی'),
        array('title' => 'فلوید مایلز', 'slug' => 'floyd-miles', 'role' => 'مدیر معماری'),
        array('title' => 'لسلی الکساندر', 'slug' => 'leslie-alexander', 'role' => 'مدیر توسعه'),
        array('title' => 'برناردو گوردون', 'slug' => 'bernardo-gordon', 'role' => 'مدیر عملیات'),
        array('title' => 'رالف ادواردز', 'slug' => 'ralph-edwards', 'role' => 'مدیر ساخت'),
    );

    foreach ($team_members as $member) {
        $existing = get_page_by_path($member['slug'], OBJECT, 'team');
        if (!$existing) {
            $tid = wp_insert_post(array(
                'post_title'   => $member['title'],
                'post_name'     => $member['slug'],
                'post_status'   => 'publish',
                'post_type'     => 'team',
                'post_content'  => 'عضو حرفه‌ای تیم با سال‌ها تجربه در صنعت ساخت و ساز.',
                'post_excerpt'  => $member['role'],
            ));
            if (!is_wp_error($tid)) {
                update_post_meta($tid, '_team_role', $member['role']);
            }
        }
    }

    // Create blog posts
    $posts_data = array(
        array('title' => 'خانه‌های کوچک: مزایای بزرگ', 'slug' => 'tiny-homes-big-benefits', 'category' => 'شرکت'),
        array('title' => 'مینیمالیسم با لمسی از لوکس بودن', 'slug' => 'exploring-minimalism-with-a-touch-of-luxury', 'category' => 'شرکت'),
        array('title' => 'خانه‌های هوشمند: آینده زندگی', 'slug' => 'smart-homes-the-future-of-living', 'category' => 'نکات و ترفندها'),
        array('title' => 'روندهای ساخت و ساز دوستدار محیط زیست', 'slug' => 'eco-friendly-construction-trends', 'category' => 'شبکه‌های اجتماعی'),
    );

    foreach ($posts_data as $post_data) {
        $existing = get_page_by_path($post_data['slug'], OBJECT, 'post');
        if (!$existing) {
            $post_id = wp_insert_post(array(
                'post_title'   => $post_data['title'],
                'post_name'     => $post_data['slug'],
                'post_status'   => 'publish',
                'post_type'     => 'post',
                'post_content'  => 'در این مقاله به بررسی موضوعات روز صنعت ساخت و ساز می‌پردازیم. تحولات اخیر در زمینه معماری مدرن و فناوری‌های نوین ساخت، فرصت‌های بی‌سابقه‌ای را برای سرمایه‌گذاران و سازندگان فراهم کرده است. با توجه به رشد روزافزون شهرنشینی و نیاز به مسکن باکیفیت، توجه به نوآوری در ساخت و ساز اهمیت بیشتری پیدا کرده است. استفاده از مصالح پایدار، طراحی هوشمند و بهینه‌سازی مصرف انرژی از جمله مواردی هستند که آینده صنعت ساخت و ساز را شکل می‌دهند.',
                'post_excerpt'  => 'مقاله‌ای درباره ' . $post_data['title'],
                'post_date'     => '2025-03-18 10:00:00',
            ));

            if (!is_wp_error($post_id)) {
                // Create or get category using wp_insert_term (available in core)
                $cat_slug = sanitize_title($post_data['category']);
                $cat = get_category_by_slug($cat_slug);
                if ($cat) {
                    $cat_id = $cat->term_id;
                } else {
                    $term = wp_insert_term($post_data['category'], 'category', array('slug' => $cat_slug));
                    $cat_id = is_wp_error($term) ? 1 : $term['term_id'];
                }
                wp_set_post_categories($post_id, array($cat_id));
            }
        }
    }

    // Set navigation menu
    $menu_name = 'منوی اصلی';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        $menu_items = array(
            'home'     => 'خانه',
            'about'    => 'درباره ما',
            'services' => 'خدمات',
            'projects' => 'پروژه‌ها',
            'blog'     => 'بلاگ',
            'contact'  => 'تماس با ما',
        );

        foreach ($menu_items as $slug => $title) {
            $page = get_page_by_path($slug);
            if ($page) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title'     => $title,
                    'menu-item-object'     => 'page',
                    'menu-item-object-id' => $page->ID,
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ));
            }
        }

        // Assign to primary location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    // Set theme mods (colors, etc.)
    set_theme_mod('spaciaz_primary_color', '#d7e04c');
    set_theme_mod('spaciaz_phone', '021-1234-5678');
    set_theme_mod('spaciaz_email', 'info@spaciaz.ir');
    set_theme_mod('spaciaz_address', 'تهران، خیابان ولیعصر، برج سپاسیاز');
}

/**
 * Run seed on theme activation
 */
function spaciaz_activate_theme($old_name, $old_theme) {
    spaciaz_fa_seed_content();
}
add_action('after_switch_theme', 'spaciaz_activate_theme', 10, 2);

/**
 * Default menu fallback
 */
function spaciaz_default_menu() {
    $menu_items = array(
        'home'     => 'خانه',
        'about'    => 'درباره ما',
        'services' => 'خدمات',
        'projects' => 'پروژه‌ها',
        'blog'     => 'بلاگ',
        'contact'  => 'تماس با ما',
    );
    echo '<ul class="spaciaz-menu">';
    foreach ($menu_items as $slug => $label) {
        $page = get_page_by_path($slug);
        $url = $page ? get_permalink($page->ID) : home_url('/');
        $class = is_page($slug) || (is_singular($slug)) ? 'current-menu-item' : '';
        echo '<li class="' . esc_attr($class) . '"><a href="' . esc_url($url) . '">' . esc_html($label) . '</a></li>';
    }
    echo '</ul>';
}

/**
 * Custom excerpt length
 */
function spaciaz_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'spaciaz_excerpt_length');

/**
 * Custom excerpt more
 */
function spaciaz_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'spaciaz_excerpt_more');

/**
 * Body classes
 */
function spaciaz_body_classes($classes) {
    if (is_rtl()) {
        $classes[] = 'spaciaz-rtl';
    }
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }
    return $classes;
}
add_filter('body_class', 'spaciaz_body_classes');

/**
 * Register widget areas
 */
function spaciaz_register_sidebars() {
    register_sidebar(array(
        'name'          => __('نوار کناری', 'spaciaz-fa'),
        'id'            => 'sidebar-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('فوتر ۱', 'spaciaz-fa'),
        'id'            => 'footer-1',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('فوتر ۲', 'spaciaz-fa'),
        'id'            => 'footer-2',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('فوتر ۳', 'spaciaz-fa'),
        'id'            => 'footer-3',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'spaciaz_register_sidebars');
