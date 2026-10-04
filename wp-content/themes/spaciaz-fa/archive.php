<?php
/**
 * Archive template (services, team, blog categories)
 *
 * @package Spaciaz_FA
 */
get_header();
$post_type = get_post_type();
$archive_title = $post_type === 'service' ? 'خدمات ما' : ($post_type === 'team' ? 'تیم ما' : (is_category() ? single_cat_title('', false) : 'آرشیو'));
?>
<div class="spaciaz-archive-header">
    <div class="spaciaz-container">
        <div class="spaciaz-breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">خانه</a>
            <span class="spaciaz-breadcrumb-sep">/</span>
            <span><?php echo esc_html($archive_title); ?></span>
        </div>
        <h1 class="spaciaz-archive-title"><?php echo esc_html($archive_title); ?></h1>
    </div>
</div>
<div class="spaciaz-container spaciaz-archive-page">
    <?php if ($post_type === 'service') : ?>
        <div class="spaciaz-services-grid">
            <?php while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="spaciaz-service-card">
                    <div class="spaciaz-service-icon"><i class="fas fa-building"></i></div>
                    <h3><?php the_title(); ?></h3>
                    <span class="spaciaz-service-arrow">←</span>
                </a>
            <?php endwhile; ?>
        </div>
    <?php elseif ($post_type === 'team') : ?>
        <div class="spaciaz-team-grid">
            <?php while (have_posts()) : the_post();
                $role = get_post_meta(get_the_ID(), '_team_role', true);
                if (!$role) $role = get_the_excerpt();
                $img = get_the_post_thumbnail_url(get_the_ID(), 'spaciaz-team');
                if (!$img) $img = SPACIAZ_URI . '/assets/images/team-placeholder.svg';
            ?>
                <a href="<?php the_permalink(); ?>" class="spaciaz-team-card">
                    <div class="spaciaz-team-image">
                        <img src="<?php echo esc_url($img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                    </div>
                    <div class="spaciaz-team-info">
                        <span class="spaciaz-team-role"><?php echo esc_html($role); ?></span>
                        <h3><?php the_title(); ?></h3>
                    </div>
                </a>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
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
    <?php endif; ?>
    <div class="spaciaz-pagination">
        <?php echo paginate_links(array('prev_text' => '→ قبلی', 'next_text' => 'بعدی ←')); ?>
    </div>
</div>
<?php get_footer(); ?>
