<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css' );
}

add_action( 'admin_enqueue_scripts-options_page-{page}', 'myplugin_admin_scripts' );
function myplugin_admin_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
} 
//function hm_script_load_firstPage(){
//    wp_enqueue_script('FP style',  get_stylesheet_directory_uri() . '/js/hach_munch_log_page.js');
//}
//
//add_action ('wp_enqueue_scripts', 'hm_script_load_firstPage' );