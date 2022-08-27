<?php

/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page(){

    add_menu_page(
        __( 'Theme Options', 'crazymodifier' ),
        __( 'Theme Options', 'crazymodifier' ),
        'manage_options', 
        'my-top-level-slug',
        'my_custom_menu_page',
        '',
        6
    );
    add_submenu_page( 
        'my-top-level-slug', 
        'Dashboard', 
        'Dashboard',
        'manage_options', 
        'my-top-level-slug',
        'my_custom_menu_page',
    );

    add_submenu_page( 
        'my-top-level-slug', 
        'Global Options', 
        'Global Options',
        'manage_options', 
        'my-secondary-slug',
        'my_custom_menu_page',
    );


}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
 
/**
 * Display a custom menu page
 */
function my_custom_menu_page(){
    require('setting-form.php');
}


add_action( 'wp_ajax_cmd_theme_option_content', "cmd_theme_option_content" );
function cmd_theme_option_content(){

    switch ($_POST['type']) {
        case 'color':
            require('options/color.php');
            break;
        
        default:
            # code...
            break;
    }

    wp_send_json( $data );
}


add_action( 'wp_head',function(){
    ?>
    <style>
        body{
            color:var(--cmd-body-color)
        }
    </style>
    <?php
},999);
?>