<?php
/**
 * Plugin Name: Holoween QT Animation
 * Description: This plugin performs multiple Halloween animations.
 * Version: 1.0
 * Author: Rajput Digvijay
 */

if (!defined('ABSPATH')) {
    die();
}
function enqueue_admin_bootstrap() {
    // Check if Bootstrap CSS is already enqueued
    if (!wp_style_is('bootstrap-css', 'enqueued')) {
        wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    }

    // Check if Bootstrap JS is already enqueued
    if (!wp_script_is('bootstrap-js', 'enqueued')) {
        wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_admin_bootstrap');

// Plugin activation hook
function holoween_plugin_activation() {
    add_shortcode('holoween_code', 'holoween_code_data');
}
register_activation_hook(__FILE__, 'holoween_plugin_activation');

// Plugin deactivation hook
function holoween_plugin_deactivation() {
    remove_shortcode('holoween_code');
}
register_deactivation_hook(__FILE__, 'holoween_plugin_deactivation');

// Shortcode function
function holoween_code_data($attr) {
    $attr = shortcode_atts(array(
        'type' => 'first_animation'
    ), $attr);
    include plugin_dir_path(__FILE__) . $attr['type'] . '.php';
}
add_shortcode('holoween_code', 'holoween_code_data');

// Enqueue custom script
function holoween_custom_script() {
    $path = plugins_url('assets/js/main.js', __FILE__);
    $dep = array('jquery');
    $ver = filemtime(plugin_dir_path(__FILE__) . 'assets/js/main.js');
    wp_enqueue_script('holoween-custom-js', $path, $dep, $ver, true);
    wp_localize_script('holoween-custom-js', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('admin_enqueue_scripts', 'holoween_custom_script');

// AJAX handler to toggle shortcode
function toggle_shortcode_handler() {
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized user');
    }

    $animation_id = isset($_POST['animation_id']) ? sanitize_text_field($_POST['animation_id']) : '';
    $active = isset($_POST['active']) ? filter_var($_POST['active'], FILTER_VALIDATE_BOOLEAN) : false;

    update_option('holoween_shortcode_' . $animation_id . '_active', $active);

    wp_die();
}
add_action('wp_ajax_toggle_shortcode', 'toggle_shortcode_handler');

// Include animations in the footer based on toggle states
function include_animations_in_footer() {
    if (get_option('holoween_shortcode_first_animation_active')) {
        include plugin_dir_path(__FILE__) . 'first_animation.php';
    }
    if (get_option('holoween_shortcode_second_animation_active')) {
        include plugin_dir_path(__FILE__) . 'second_animation.php';
    }
    if (get_option('holoween_shortcode_third_animation_active')) {
        include plugin_dir_path(__FILE__) . 'third_animation.php';
    }
}
add_action('wp_footer', 'include_animations_in_footer');

// Admin dashboard menu
function holoween_dashboard_func() {
    $first_active = get_option('holoween_shortcode_first_animation_active', false);
    $second_active = get_option('holoween_shortcode_second_animation_active', false);
    $third_active = get_option('holoween_shortcode_third_animation_active', false);
    include plugin_dir_path(__FILE__) . 'admin/holoween-admin-dashboard.php';
}
function holoween_admin_dashboard() {
    add_menu_page('Holoween Animation', 'Holoween Animation', 'manage_options', 'holoween-dashboard', 'holoween_dashboard_func', '', 6);
}
add_action('admin_menu', 'holoween_admin_dashboard');
