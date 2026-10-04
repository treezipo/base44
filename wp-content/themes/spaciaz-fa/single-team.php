<?php
/**
 * Single team member template
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<?php while (have_posts()) : the_post();
    $role = get_post_meta(get_the_ID(), '_team_role', true);
    if (!$role) $role = get_the_excerpt();
?>
<div class="spaciaz-team-detail">
    <div class="spaciaz-container">
        <div class="spaciaz-team-detail-wrapper">
            <div class="spaciaz-team-detail-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('spaciaz-team'); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(SPACIAZ_URI . '/assets/images/team-placeholder.svg'); ?>" alt="<?php the_title_attribute(); ?>">
                <?php endif; ?>
            </div>
            <div class="spaciaz-team-detail-info">
                <div class="spaciaz-breadcrumb">
                    <a href="<?php echo esc_url(home_url('/')); ?>">خانه</a>
                    <span class="spaciaz-breadcrumb-sep">/</span>
                    <a href="<?php echo esc_url(get_post_type_archive_link('team')); ?>">تیم</a>
                    <span class="spaciaz-breadcrumb-sep">/</span>
                    <span><?php the_title(); ?></span>
                </div>
                <?php if ($role) : ?><span class="spaciaz-team-detail-role"><?php echo esc_html($role); ?></span><?php endif; ?>
                <h1 class="spaciaz-team-detail-name"><?php the_title(); ?></h1>
                <div class="spaciaz-team-detail-bio">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
