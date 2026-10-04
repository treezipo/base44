<?php
/**
 * Default page template
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<div class="spaciaz-container spaciaz-default-page">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('spaciaz-article'); ?>>
            <h1 class="spaciaz-page-title"><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail()) : ?>
                <div class="spaciaz-page-featured"><?php the_post_thumbnail('large'); ?></div>
            <?php endif; ?>
            <div class="spaciaz-page-content">
                <?php
                the_content();
                wp_link_pages(array(
                    'before' => '<div class="spaciaz-link-pages">',
                    'after'  => '</div>',
                ));
                ?>
            </div>
        </article>
        <?php if (comments_open() || get_comments_number()) : ?>
            <div class="spaciaz-comments"><?php comments_template(); ?></div>
        <?php endif; ?>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>
