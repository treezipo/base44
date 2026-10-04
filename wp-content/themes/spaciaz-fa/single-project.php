<?php
/**
 * Single project template
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<?php while (have_posts()) : the_post();
    $location = get_post_meta(get_the_ID(), '_project_location', true);
    $status = get_post_meta(get_the_ID(), '_project_status', true);
    $year = get_post_meta(get_the_ID(), '_project_year', true);
    $client = get_post_meta(get_the_ID(), '_project_client', true);
?>
<div class="spaciaz-project-detail">
    <div class="spaciaz-project-hero" <?php echo has_post_thumbnail() ? 'style="background-image: url(' . esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')) . ')"' : ''; ?>>
        <div class="spaciaz-project-hero-overlay"></div>
        <div class="spaciaz-container">
            <div class="spaciaz-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">خانه</a>
                <span class="spaciaz-breadcrumb-sep">/</span>
                <a href="<?php echo esc_url(get_post_type_archive_link('project')); ?>">پروژه‌ها</a>
                <span class="spaciaz-breadcrumb-sep">/</span>
                <span><?php the_title(); ?></span>
            </div>
            <h1 class="spaciaz-project-hero-title"><?php the_title(); ?></h1>
            <?php if ($location) : ?><span class="spaciaz-project-hero-location"><?php echo esc_html($location); ?></span><?php endif; ?>
        </div>
    </div>
    <div class="spaciaz-container">
        <div class="spaciaz-project-detail-wrapper">
            <div class="spaciaz-project-detail-content">
                <h2>درباره پروژه</h2>
                <div class="spaciaz-project-detail-text">
                    <?php the_content(); ?>
                </div>
            </div>
            <aside class="spaciaz-project-sidebar">
                <div class="spaciaz-project-meta-box">
                    <h3>اطلاعات پروژه</h3>
                    <ul>
                        <?php if ($location) : ?><li><span>موقعیت:</span><strong><?php echo esc_html($location); ?></strong></li><?php endif; ?>
                        <?php if ($status) : ?><li><span>وضعیت:</span><strong><?php echo esc_html($status); ?></strong></li><?php endif; ?>
                        <?php if ($year) : ?><li><span>سال:</span><strong><?php echo esc_html($year); ?></strong></li><?php endif; ?>
                        <?php if ($client) : ?><li><span>کارفرما:</span><strong><?php echo esc_html($client); ?></strong></li><?php endif; ?>
                    </ul>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="spaciaz-btn spaciaz-btn-primary spaciaz-btn-full">
                        <span>درخواست مشاوره</span>
                    </a>
                </div>
            </aside>
        </div>
        <?php
        $related = get_posts(array('post_type' => 'project', 'posts_per_page' => 3, 'post__not_in' => array(get_the_ID())));
        if ($related) :
        ?>
        <div class="spaciaz-related-projects">
            <h2>پروژه‌های مرتبط</h2>
            <div class="spaciaz-projects-grid">
                <?php foreach ($related as $r) :
                    $r_img = get_the_post_thumbnail_url($r->ID, 'spaciaz-project');
                    if (!$r_img) $r_img = SPACIAZ_URI . '/assets/images/project-placeholder.svg';
                    $r_loc = get_post_meta($r->ID, '_project_location', true);
                ?>
                    <a href="<?php echo get_permalink($r->ID); ?>" class="spaciaz-project-card">
                        <div class="spaciaz-project-image" style="background-image: url('<?php echo esc_url($r_img); ?>');"></div>
                        <div class="spaciaz-project-overlay">
                            <div class="spaciaz-project-info">
                                <?php if ($r_loc) : ?><span class="spaciaz-project-location"><?php echo esc_html($r_loc); ?></span><?php endif; ?>
                                <h3><?php echo esc_html($r->post_title); ?></h3>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
