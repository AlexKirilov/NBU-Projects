<?php

/* Plugin Name: ppt bkng stm
  Plugin URI: http://www.pinpoint.bg
  Description: Booking system
  Version: 1.0
  Author: Stanislav Kostadinov
  Author URI: http://www.pinpoint.bg
  License: GPLv2 or later
 */

require_once 'functions.php';

register_activation_hook(__FILE__, 'booking_install');
register_deactivation_hook(__FILE__, 'booking_deinstall');
add_action('admin_print_styles', 'add_styles_js');
add_action('admin_menu', 'add_booking_options');
add_action('wp_enqueue_scripts', 'add_cssjs');
add_shortcode('booking_calendar', 'cal_func_rework');
add_action('wp_ajax_ajax_reservation', 'ajax_reservation');
add_action('wp_ajax_nopriv_ajax_reservation', 'ajax_reservation');
add_action('wp_ajax_ajax_change_month', 'ajax_change_month');
add_action('wp_ajax_nopriv_ajax_change_month', 'ajax_change_month');
add_action('wp_ajax_save_settings', 'save_settings');
add_action('wp_ajax_nopriv_save_settings', 'save_settings');


function booking_install() {

    global $wpdb;
    $p_ttl = 'Booking Calendar';
    $p_name = 'Booking Calendar';

    $the_page = get_page_by_title($p_ttl);

    if (!$the_page) {
        $_p = array();
        $_p['post_title'] = $p_ttl;
        $_p['post_content'] = '[booking_calendar]';
        $_p['post_status'] = 'publish';
        $_p['post_type'] = 'page';
        $_p['comment_status'] = 'closed';
        $_p['ping_status'] = 'closed';
        $_p['post_category'] = array(1);

        $page_id = wp_insert_post($_p);
    } else {
        $page_id = $the_page->ID;
        $the_page->post_status = 'publish';
        $the_page_id = wp_update_post($the_page);
    }
}

function add_styles_js() {
    $plugin_url = plugin_dir_url(__FILE__);
    wp_enqueue_style('booking-main-style', $plugin_url . 'styles/pinpoint-booking-options.css');
    wp_enqueue_script('booking-main-script', plugin_dir_url(__FILE__) . 'script/ppt-bkng-admin-script.js', array('jquery'));
    wp_localize_script('booking-main-script', 'pipointVars', array('ajaxUrlz' => admin_url('admin-ajax.php')));
}

function booking_deinstall() {
    
}

function add_cssjs() {
    wp_register_script('jsmain', plugin_dir_url(__FILE__) . 'script/pinpoint-booking.js', array('jquery'));
    wp_localize_script('jsmain', 'pipointVars', array('ajaxUrl' => admin_url('admin-ajax.php')));
    wp_register_style('style_pages', plugin_dir_url(__FILE__) . 'styles/pinpoint-booking.css');
    wp_enqueue_script('jsmain');
    wp_enqueue_style('style_pages');
}

function add_booking_options() {

    add_options_page('Booking', 'Booking', 'manage_options', 'bkng_booking_pnpt', 'menu_html');
}

function menu_html() {
    echo '<div class="wrap">';
        echo '<div class="step_uno">';
        echo '<p>For what do you need reservations ?</p>';
        echo '<select >';
            echo '<option class="select_other">Other</option>';
            echo '<option class="beauty_salon">Beauty Salon</option>';
            echo '<option class="bar_restaurant">Restaurant/Bar</option>';
            echo '<option class="hotel">Hotel</option>';
        echo '</select>';
        echo '<br/>';
        echo '<input type="text" value="Name"></input>';
        echo '<br/>';
        echo '<input type="Submit" value="Update"></input>';
        echo '</div>';
    echo '</div>';
}
