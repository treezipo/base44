<?php
/**
 * Search results template
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<div class="spaciaz-archive-header">
    <div class="spaciaz-container">
        <h1 class="spaciaz-archive-title">نتایج جستجو: <?php echo esc_html(get_search_query()); ?></h1>
    </div>
</div>
<div class="spaciaz-container spaciaz-archive-page">
    <?php if (have_posts()) : ?>
        <div class="spaciaz-blog-grid">
            <?php while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="spaciaz-blog-card">
                    <div class="spaciaz-blog-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'spaciaz-blog')); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <div class="spaciaz-blog-content">
                        <span class="spaciaz-blog-date"><?php echo esc_html(get_the_date('j F Y')); ?></span>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>
        <div class="spaciaz-pagination">
            <?php echo paginate_links(array('prev_text' => '→ قبلی', 'next_text' => 'بعدی ←')); ?>
        </div>
    <?php else : ?>
        <div class="spaciaz-no-results">
            <h2>نتیجه‌ای یافت نشد</h2>
            <p>متأسفانه برای جستجوی شما نتیجه‌ای پیدا نشد. لطفاً با کلمات دیگری امتحان کنید.</p>
            <?php get_search_form(); ?>
        </div>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
