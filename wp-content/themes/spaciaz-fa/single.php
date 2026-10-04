<?php
/**
 * Single blog post template
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<div class="spaciaz-container spaciaz-single-post">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('spaciaz-article'); ?>>
            <div class="spaciaz-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">خانه</a>
                <span class="spaciaz-breadcrumb-sep">/</span>
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">بلاگ</a>
                <span class="spaciaz-breadcrumb-sep">/</span>
                <span><?php the_title(); ?></span>
            </div>
            <div class="spaciaz-post-meta">
                <?php
                $cats = get_the_category();
                if ($cats) : ?>
                    <span class="spaciaz-post-category"><?php echo esc_html($cats[0]->name); ?></span>
                <?php endif; ?>
                <span class="spaciaz-post-date"><?php echo esc_html(get_the_date('j F Y')); ?></span>
            </div>
            <h1 class="spaciaz-page-title"><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?>
                <div class="spaciaz-post-featured">
                    <?php the_post_thumbnail('spaciaz-blog'); ?>
                </div>
            <?php endif; ?>
            <div class="spaciaz-post-content">
                <?php the_content(); ?>
            </div>
            <div class="spaciaz-post-tags">
                <?php the_tags('<span class="spaciaz-tag-label">برچسب‌ها:</span> ', ', ', ''); ?>
            </div>
            <nav class="spaciaz-post-nav">
                <?php
                $prev = get_previous_post();
                $next = get_next_post();
                if ($next) : ?>
                    <a href="<?php echo get_permalink($next); ?>" class="spaciaz-post-nav-item spaciaz-post-nav-prev">
                        <span>مقاله قبلی</span>
                        <strong><?php echo esc_html($next->post_title); ?></strong>
                    </a>
                <?php endif; ?>
                <?php if ($prev) : ?>
                    <a href="<?php echo get_permalink($prev); ?>" class="spaciaz-post-nav-item spaciaz-post-nav-next">
                        <span>مقاله بعدی</span>
                        <strong><?php echo esc_html($prev->post_title); ?></strong>
                    </a>
                <?php endif; ?>
            </nav>
        </article>
        <?php if (comments_open() || get_comments_number()) : ?>
            <div class="spaciaz-comments"><?php comments_template(); ?></div>
        <?php endif; ?>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>
