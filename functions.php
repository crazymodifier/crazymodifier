<?php

define('THEME_VERSION',time());

add_action( 'wp_enqueue_scripts', 'cmd_enqueue_styles');

function cmd_enqueue_styles(){
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css',array(),THEME_VERSION, 'all');
    wp_enqueue_style('cms-main', get_stylesheet_uri(    ),array('bootstrap'),THEME_VERSION, 'all');
}




function cmd_body_close(){
    do_action( 'cmd_body_close');
}
?>