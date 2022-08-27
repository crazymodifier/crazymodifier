      
    <footer class="cmd-footer">
        <div class="container">

            <div class="cmd-contact-form">
                <?php echo do_shortcode( '[contact-form-7 id="61" title="Contact Form"]' );?>
            </div>
            <!-- <div class="row">
                <div class="col-lg-3">
                    <?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
                        <div id="sidebar" class="sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'sidebar' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3">
                    <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                        <div id="sidebar-2" class="sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'sidebar-2' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3">
                    <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                        <div id="sidebar-3" class="sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'sidebar-3' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3">
                    <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                        <div id="sidebar-4" class="sidebar widget-area" role="complementary">
                            <?php dynamic_sidebar( 'sidebar-4' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div> -->
        </div>

        
    </footer>
    <div class="cmd-copywrite">
            <p>All Rights Reserved</p>
        </div>
    <?php 
    wp_footer();
    
    cmd_body_close();
    ?>
    
    </body>

</html>