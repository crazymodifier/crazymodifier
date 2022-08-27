<?php

//Functions
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker(  ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
    // wp_enqueue_script( 'my-script-handle', plugins_url('my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}



if(!function_exists('get_cmd_admin_theme_options')){
    function get_cmd_admin_theme_options(){

        $options = [];
        $options = array(
            array(
                'title' => __('Global Options', ''),
                'type' => 'global',
                'url' => 'http://google.com',
            ),
            array(
                'title' => __('Blogs', ''),
                'type' => 'blogs',
                'url' => 'http://google.com/blog',
                'children' => array(
                    array(
                        'title' => __('Single', ''),
                        'type' => 'single',
                        'url' => 'http://google.com/blog',
                    )
                )
            )
        );

        $options = apply_filters( 'get_cmd_admin_theme_options', $options );
        return $options;
    }
}