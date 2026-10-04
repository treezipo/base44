<?php
/**
 * Custom Post Types and Taxonomies
 *
 * @package Spaciaz_FA
 */

/**
 * Register custom post types
 */
function spaciaz_register_cpt() {
    // Service CPT
    register_post_type('service', array(
        'labels' => array(
            'name'               => __('خدمات', 'spaciaz-fa'),
            'singular_name'      => __('خدمت', 'spaciaz-fa'),
            'add_new'            => __('افزودن خدمت', 'spaciaz-fa'),
            'add_new_item'       => __('افزودن خدمت جدید', 'spaciaz-fa'),
            'edit_item'          => __('ویرایش خدمت', 'spaciaz-fa'),
            'new_item'           => __('خدمت جدید', 'spaciaz-fa'),
            'view_item'          => __('مشاهده خدمت', 'spaciaz-fa'),
            'search_items'       => __('جستجوی خدمات', 'spaciaz-fa'),
            'not_found'          => __('خدمتی یافت نشد', 'spaciaz-fa'),
            'not_found_in_trash'  => __('خدمتی در زباله‌دان یافت نشد', 'spaciaz-fa'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-hammer',
        'menu_position' => 20,
        'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite'      => array('slug' => 'services', 'with_front' => false),
    ));

    // Project CPT
    register_post_type('project', array(
        'labels' => array(
            'name'               => __('پروژه‌ها', 'spaciaz-fa'),
            'singular_name'      => __('پروژه', 'spaciaz-fa'),
            'add_new'            => __('افزودن پروژه', 'spaciaz-fa'),
            'add_new_item'       => __('افزودن پروژه جدید', 'spaciaz-fa'),
            'edit_item'          => __('ویرایش پروژه', 'spaciaz-fa'),
            'new_item'           => __('پروژه جدید', 'spaciaz-fa'),
            'view_item'          => __('مشاهده پروژه', 'spaciaz-fa'),
            'search_items'       => __('جستجوی پروژه‌ها', 'spaciaz-fa'),
            'not_found'          => __('پروژه‌ای یافت نشد', 'spaciaz-fa'),
            'not_found_in_trash'  => __('پروژه‌ای در زباله‌دان یافت نشد', 'spaciaz-fa'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-building',
        'menu_position' => 21,
        'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite'      => array('slug' => 'projects', 'with_front' => false),
    ));

    // Team CPT
    register_post_type('team', array(
        'labels' => array(
            'name'               => __('تیم', 'spaciaz-fa'),
            'singular_name'      => __('عضو تیم', 'spaciaz-fa'),
            'add_new'            => __('افزودن عضو', 'spaciaz-fa'),
            'add_new_item'       => __('افزودن عضو جدید', 'spaciaz-fa'),
            'edit_item'          => __('ویرایش عضو', 'spaciaz-fa'),
            'new_item'           => __('عضو جدید', 'spaciaz-fa'),
            'view_item'          => __('مشاهده عضو', 'spaciaz-fa'),
            'search_items'       => __('جستجوی اعضا', 'spaciaz-fa'),
            'not_found'          => __('عضوی یافت نشد', 'spaciaz-fa'),
            'not_found_in_trash'  => __('عضوی در زباله‌دان یافت نشد', 'spaciaz-fa'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-groups',
        'menu_position' => 22,
        'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'show_in_rest' => true,
        'rewrite'      => array('slug' => 'our-team', 'with_front' => false),
    ));
}
add_action('init', 'spaciaz_register_cpt');

/**
 * Register custom taxonomies
 */
function spaciaz_register_taxonomies() {
    // Project Location
    register_taxonomy('project_location', 'project', array(
        'labels' => array(
            'name'          => __('موقعیت پروژه', 'spaciaz-fa'),
            'singular_name' => __('موقعیت', 'spaciaz-fa'),
            'add_new_item'  => __('افزودن موقعیت', 'spaciaz-fa'),
            'search_items'  => __('جستجوی موقعیت', 'spaciaz-fa'),
        ),
        'public'       => true,
        'hierarchical'  => true,
        'show_in_rest' => true,
        'rewrite'      => array('slug' => 'project-location'),
    ));

    // Project Status
    register_taxonomy('project_status', 'project', array(
        'labels' => array(
            'name'          => __('وضعیت پروژه', 'spaciaz-fa'),
            'singular_name' => __('وضعیت', 'spaciaz-fa'),
            'add_new_item'  => __('افزودن وضعیت', 'spaciaz-fa'),
            'search_items'  => __('جستجوی وضعیت', 'spaciaz-fa'),
        ),
        'public'       => true,
        'hierarchical'  => true,
        'show_in_rest' => true,
        'rewrite'      => array('slug' => 'project-status'),
    ));

    // Service Category
    register_taxonomy('service_category', 'service', array(
        'labels' => array(
            'name'          => __('دسته‌بندی خدمت', 'spaciaz-fa'),
            'singular_name' => __('دسته‌بندی', 'spaciaz-fa'),
        ),
        'public'       => true,
        'hierarchical'  => true,
        'show_in_rest' => true,
        'rewrite'      => array('slug' => 'service-category'),
    ));
}
add_action('init', 'spaciaz_register_taxonomies');

/**
 * Flush rewrite rules on activation
 */
function spaciaz_rewrite_flush() {
    spaciaz_register_cpt();
    spaciaz_register_taxonomies();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'spaciaz_rewrite_flush');
