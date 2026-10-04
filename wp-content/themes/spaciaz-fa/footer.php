<?php
/**
 * Footer template
 *
 * @package Spaciaz_FA
 */
?>
    </main><!-- #content -->

    <footer class="spaciaz-footer">
        <div class="spaciaz-footer-main">
            <div class="spaciaz-container">
                <div class="spaciaz-footer-grid">
                    <!-- About -->
                    <div class="spaciaz-footer-col spaciaz-footer-about">
                        <div class="spaciaz-logo">
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
                        </div>
                        <p>ما از برترین سازندگان و توسعه‌دهندگان هستیم که کاملاً در موفقیت مشتریان خود سرمایه‌گذاری کرده‌ایم و جوامعی که خدمت می‌کنیم را بهبود می‌بخشیم.</p>
                        <div class="spaciaz-footer-social">
                            <?php
                            $socials = array(
                                'spaciaz_facebook'   => 'facebook',
                                'spaciaz_twitter'    => 'twitter',
                                'spaciaz_instagram'  => 'instagram',
                                'spaciaz_linkedin'   => 'linkedin',
                            );
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

                    <!-- Quick Links -->
                    <div class="spaciaz-footer-col">
                        <h4 class="spaciaz-footer-title">لینک‌های سریع</h4>
                        <ul class="spaciaz-footer-links">
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">خانه</a></li>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>">درباره ما</a></li>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>">خدمات</a></li>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('projects'))); ?>">پروژه‌ها</a></li>
                            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">تماس با ما</a></li>
                        </ul>
                    </div>

                    <!-- Services -->
                    <div class="spaciaz-footer-col">
                        <h4 class="spaciaz-footer-title">خدمات ما</h4>
                        <ul class="spaciaz-footer-links">
                            <?php
                            $services = get_posts(array('post_type' => 'service', 'posts_per_page' => 5));
                            foreach ($services as $svc) :
                            ?>
                                <li><a href="<?php echo get_permalink($svc->ID); ?>"><?php echo esc_html($svc->post_title); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div class="spaciaz-footer-col">
                        <h4 class="spaciaz-footer-title">اطلاعات تماس</h4>
                        <ul class="spaciaz-footer-contact">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo esc_html(get_theme_mod('spaciaz_address', 'تهران، خیابان ولیعصر، برج سپاسیاز')); ?></span>
                            </li>
                            <li>
                                <i class="fas fa-phone"></i>
                                <a href="tel:<?php echo esc_attr(get_theme_mod('spaciaz_phone', '021-1234-5678')); ?>"><?php echo esc_html(get_theme_mod('spaciaz_phone', '021-1234-5678')); ?></a>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('spaciaz_email', 'info@spaciaz.ir')); ?>"><?php echo esc_html(get_theme_mod('spaciaz_email', 'info@spaciaz.ir')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="spaciaz-footer-bottom">
            <div class="spaciaz-container">
                <p>© <?php echo esc_html(date('Y')); ?> سپاسیاز. تمام حقوق محفوظ است.</p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
