<?php
/**
 * Single service template
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<?php while (have_posts()) : the_post(); ?>
<div class="spaciaz-service-detail">
    <div class="spaciaz-service-hero">
        <div class="spaciaz-container">
            <div class="spaciaz-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">خانه</a>
                <span class="spaciaz-breadcrumb-sep">/</span>
                <a href="<?php echo esc_url(get_post_type_archive_link('service')); ?>">خدمات</a>
                <span class="spaciaz-breadcrumb-sep">/</span>
                <span><?php the_title(); ?></span>
            </div>
            <h1 class="spaciaz-service-hero-title"><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?><p class="spaciaz-service-hero-excerpt"><?php echo esc_html(get_the_excerpt()); ?></p><?php endif; ?>
        </div>
    </div>
    <div class="spaciaz-container">
        <div class="spaciaz-service-detail-wrapper">
            <div class="spaciaz-service-detail-content">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="spaciaz-service-detail-image"><?php the_post_thumbnail('large'); ?></div>
                <?php endif; ?>
                <div class="spaciaz-service-detail-text">
                    <?php the_content(); ?>
                </div>
            </div>
            <aside class="spaciaz-service-sidebar">
                <div class="spaciaz-service-meta-box">
                    <h3>سایر خدمات</h3>
                    <ul>
                        <?php
                        $others = get_posts(array('post_type' => 'service', 'posts_per_page' => 10, 'post__not_in' => array(get_the_ID())));
                        foreach ($others as $o) :
                        ?>
                            <li><a href="<?php echo get_permalink($o->ID); ?>"><?php echo esc_html($o->post_title); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="spaciaz-service-cta-box">
                    <h3>نیاز به مشاوره دارید؟</h3>
                    <p>با ما در تماس باشید تا بهترین راهکار را به شما ارائه دهیم.</p>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="spaciaz-btn spaciaz-btn-primary spaciaz-btn-full">
                        <span>تماس با ما</span>
                    </a>
                </div>
            </aside>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
