<?php
/**
 * Main index template (fallback)
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<div class="spaciaz-container spaciaz-archive-page">
    <h1 class="spaciaz-page-title"><?php
    if (is_home() && !is_front_page()) {
        single_post_title();
    } elseif (is_archive()) {
        the_archive_title();
    } else {
        esc_html_e('بلاگ', 'spaciaz-fa');
    }
    ?></h1>
    <div class="spaciaz-blog-grid">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
        <?php else : ?>
            <p>مطلبی یافت نشد.</p>
        <?php endif; ?>
    </div>
    <div class="spaciaz-pagination">
        <?php
        echo paginate_links(array(
            'prev_text' => '→ قبلی',
            'next_text' => 'بعدی ←',
        ));
        ?>
    </div>
</div>
<?php get_footer(); ?>
