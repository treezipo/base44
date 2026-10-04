<?php
/**
 * Search form
 *
 * @package Spaciaz_FA
 */
?>
<form role="search" method="get" class="spaciaz-search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text" for="spaciaz-search"><?php esc_html_e('جستجو برای:', 'spaciaz-fa'); ?></label>
    <input type="search" id="spaciaz-search" class="spaciaz-search-input" placeholder="جستجو..." value="<?php echo get_search_query(); ?>" name="s">
    <button type="submit" class="spaciaz-search-submit" aria-label="جستجو">
        <i class="fas fa-search"></i>
    </button>
</form>
