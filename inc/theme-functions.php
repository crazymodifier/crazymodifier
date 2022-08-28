<?php

//Functions

function get_cmd_custom_logo(){
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image_url = wp_get_attachment_url( $custom_logo_id , 'full');

    echo '<a class="" href="'.esc_url(home_url()).'"><img src="'.esc_url($image_url).'" height="70" alt=""></a>';

}

function cmd_get_header(){
    return false;
}

function get_kdw_header(){
    ob_start();
    
    if((is_page() || is_home() || is_archive(  )) && ! is_front_page(  )): ?>
    <div data-type="background" data-speed="3" style="background:url(<?php header_image() ?>) center right/cover no-repeat;">
        <div class="text-white d-flex" style="background:#020f4c57;min-height:300px">
            <div class="container mt-auto">
                <div class="row py-4">
                    <div class="col-12 mt-auto">
                    <h5 class="">Home | <span class="text-highlighted"><?php echo wp_title( '', false); ?></span></h5>
                    <h1 class="display-4"><?php echo wp_title( '', false); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    endif;
    
    return ob_get_clean();
}

function kdw_get_header_style(){
    $header_style = kdw_get_options('header');
    get_template_part('templates/headers/header', $header_style);
}

function kdw_get_the_content_by_length($string, $length){
    $string = strip_tags($string);
    if(strlen($string) > $length){
        $output = substr($string,0, 200);
    }
    else{
        $output = $string;
    }

    return $output.'...<a href="'.get_the_permalink().'">read more >></a>';
}