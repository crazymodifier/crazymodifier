<?php

define('THEME_VERSION',1.0);
define('THEME_URL', get_template_directory_uri(  ));
add_action( 'wp_enqueue_scripts', 'cmd_enqueue_styles');

function cmd_enqueue_styles(){
    wp_enqueue_style('bootstrap', THEME_URL.'/assets/css/bootstrap.min.css',array(),THEME_VERSION, 'all');
    // wp_enqueue_style('cmd-bootstrap', THEME_URL.'/assets/css/bootstrap-wrapper.less',array(),THEME_VERSION, 'all');
    wp_enqueue_style('slick', THEME_URL.'/assets/css/slick.min.css',array(),THEME_VERSION, 'all');
    wp_enqueue_style('slick-theme', THEME_URL.'/assets/css/slick-theme.min.css',array('slick-css'),THEME_VERSION, 'all');
    wp_enqueue_style('fontawesome', THEME_URL.'/assets/css/all.min.css', array(),THEME_VERSION, 'all');
    wp_enqueue_style('cmd-main', get_stylesheet_uri(    ),array('bootstrap'),time(), 'all');
}


add_action( 'wp_enqueue_scripts', 'cmd_enqueue_scripts');

function cmd_enqueue_scripts(){

    // echo 'ghgjhg'; die;
    wp_enqueue_script( 'jquery');
    // wp_enqueue_script( 'popper-min', 'https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js', array('jquery'), THEME_VERSION, true );
    wp_enqueue_script( 'bootstrap-min', THEME_URL.'/assets/js/bootstrap.min.js', array('jquery'), THEME_VERSION, true );

    wp_enqueue_script( 'slick', THEME_URL.'/assets/js/slick.min.js',array('jquery'), THEME_VERSION, TRUE );
    wp_enqueue_script( 'cmd-main', THEME_URL.'/assets/js/script.js',array('bootstrap-min'), time(), TRUE );
}


function cmd_body_close(){
    do_action( 'cmd_body_close');
}


add_action( 'after_setup_theme', 'cdm_theme_setups' );

function cdm_theme_setups(){


    add_theme_support( 'title-tag' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'custom-background', array('default-color' => 'f8f8f8'));
    
    /**
     * Add support for core custom logo.
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 100,
            'width'       => 100,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}

add_filter( 'excerpt_length', function(){ return 25;}, 9 );

// Default theme menu locations.
register_nav_menus(
    array(
        'main'   => __( 'Main Menu', 'kdwtheme' ),
        'footer'    => __( 'Footer Menu', 'kdwtheme' ),
    )
);

add_action( 'widgets_init', 'cmd_widget_registration');

function cmd_widget_registration(){
        
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="cmd-widget-title widget-title">',
            'after_title'   => '</h4>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
    register_sidebars( 4, array(
        'name' => 'Widget %d',
        'id' => 'sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title' => '<h5 class="cmd-widget-title widget-title">',
        'after_title' => '</h5>',
        ) 
    );
}


require_once(get_template_directory().'/inc/theme-admin.php');
require_once(get_template_directory().'/inc/theme-functions.php');
require_once(get_template_directory().'/inc/theme-settings.php');
?>