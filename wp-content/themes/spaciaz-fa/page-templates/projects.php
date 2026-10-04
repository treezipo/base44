<?php
/**
 * Template Name: پروژه‌ها
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<div class="spaciaz-projects-page">
    <div class="spaciaz-page-hero">
        <div class="spaciaz-container">
            <div class="spaciaz-breadcrumb">
                <a href="<?php echo esc_url(home_url('/')); ?>">خانه</a>
                <span class="spaciaz-breadcrumb-sep">/</span>
                <span>پروژه‌ها</span>
            </div>
            <h1>پروژه‌های ما</h1>
            <p>پروژه‌های برجسته‌ای که با تعالی و نوآوری خلق کرده‌ایم.</p>
        </div>
    </div>
    <div class="spaciaz-container spaciaz-archive-page">
        <div class="spaciaz-filter-bar">
            <div class="spaciaz-filter-group">
                <label>موقعیت:</label>
                <?php $locations = get_terms(array('taxonomy' => 'project_location', 'hide_empty' => true));
                if ($locations) : ?>
                    <select class="spaciaz-filter-select" data-tax="project_location">
                        <option value="">همه</option>
                        <?php foreach ($locations as $loc) : ?>
                            <option value="<?php echo esc_attr($loc->slug); ?>"><?php echo esc_html($loc->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </div>
            <div class="spaciaz-filter-group">
                <label>وضعیت:</label>
                <?php $statuses = get_terms(array('taxonomy' => 'project_status', 'hide_empty' => true));
                if ($statuses) : ?>
                    <select class="spaciaz-filter-select" data-tax="project_status">
                        <option value="">همه</option>
                        <?php foreach ($statuses as $st) : ?>
                            <option value="<?php echo esc_attr($st->slug); ?>"><?php echo esc_html($st->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </div>
        </div>
        <div class="spaciaz-projects-grid spaciaz-projects-archive">
            <?php
            $projects = get_posts(array('post_type' => 'project', 'posts_per_page' => -1));
            foreach ($projects as $project) :
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
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
