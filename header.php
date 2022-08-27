<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->




    <?php wp_head(  );?>
</head>
<body <?php body_class(  )?>>

    <?php wp_body_open(  )?>
    <?php if(cmd_get_header()):?>
    <header>
        <nav class="cmd-navbar-wrapper">
            <div class="container">
                <div class="cmd-navbar">
                    <div class="cdm-brand">
                        <?php echo get_cmd_custom_logo();?>
                    </div>

                    <div>
                        <a href="#" class="cmd-nav-hamburger"><span></span><span></span><span></span></a>
                        <?php 
                        $args = array(
                            'container_class' => 'cmd-menu-main-container',
                            'theme_location' => 'main'
                        );
                        wp_nav_menu($args)?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <?php endif;?>
