<?php
    add_action('wp_enqueue_scripts', 'nlp_plugin_admin_refresher_admin_js_loader');

    function nlp_plugin_admin_refresher_admin_js_loader() {

        wp_register_script('nlp_plugin-admin-js', plugins_url('/nbu_library_plugin/js/nlp_plugin_admin_js.js'), array('jquery'));
        wp_enqueue_script('nlp_plugin-admin-js');

    }
add_action('wp_enqueue_scripts', 'nlp_plugin_ajax_js_load');
add_action('admin_enqueue_scripts', 'nlp_plugin_ajax_js_load');

function nlp_plugin_ajax_js_load() {
    wp_register_script('nlp-ajax', plugins_url('nbu_library_plugin/js/nlp_plugin_ajax_functions.js'), array('jquery'));
    wp_localize_script('nlp-ajax', 'nlp_ajax', array('ajaxurl' => admin_url('admin-ajax.php')));
    wp_enqueue_script('nlp-ajax');
    
   
}

    function nlp_plugin_admin_refresher_style_loader() {
        //Admin style for the admin page
        wp_register_style('nlp_plugin-css', plugins_url('/nbu_library_plugin/css/nlp_plugin_css.css'));

        wp_enqueue_style('nlp_plugin-css');
    }

    
add_action( 'admin_init', 'nlp_plugin_admin_refresher_style_loader' );
   add_action( 'admin_menu', 'nlp_plugin_admin_refresher_style_loader' );
   
    add_action('wp_enqueue_scripts', 'nlp_plugin_admin_refresher_style_loader');
 