<?php
/**
 * 404 template
 *
 * @package Spaciaz_FA
 */
get_header();
?>
<div class="spaciaz-404">
    <div class="spaciaz-container">
        <h1 class="spaciaz-404-title">۴۰۴</h1>
        <h2 class="spaciaz-404-subtitle">صفحه یافت نشد</h2>
        <p class="spaciaz-404-text">متأسفانه صفحه‌ای که به دنبال آن هستید پیدا نشد. ممکن است حذف شده یا آدرس آن تغییر کرده باشد.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="spaciaz-btn spaciaz-btn-primary">
            <span>بازگشت به خانه</span>
            <span class="spaciaz-btn-icon">←</span>
        </a>
    </div>
</div>
<?php get_footer(); ?>
