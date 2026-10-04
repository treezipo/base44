<?php
/**
 * Theme setup functions
 *
 * @package Spaciaz_FA
 */

/**
 * Add Elementor locations support
 */
function spaciaz_elementor_theme_support() {
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'spaciaz_elementor_theme_support');

/**
 * Register Elementor locations (for Theme Builder)
 */
function spaciaz_register_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
    $elementor_theme_manager->register_all_core_location();
}
add_action('elementor/theme/register_locations', 'spaciaz_register_elementor_locations');
