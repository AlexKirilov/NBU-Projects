<?php

    add_action('wp_enqueue_scripts','addcssjs');

function addcssjs(){
    
    $child_dir = get_stylesheet_directory_uri();
    
    wp_enqueue_script('mainscript',$child_dir.'/script.js',array('jquery'));
    wp_enqueue_script('bootstrap',  $child_dir.'/bootstrap.min.js',array('jquery'));
    wp_enqueue_style('bootstrap-css',  $child_dir.'/bootstrap.min.css');
    wp_enqueue_style('main-style',  $child_dir.'/style.css');
}