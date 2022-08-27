<article <?php post_class()?>>
    <?php
    if('verticle' == $args['type']):
    ?>
    <div class="cmd-post-card verticle-card">
        <div class="hover-element"></div>
        <div class="thumbnail-container">
            <div class="embed-responsive embed-responsive-16by9">
                <?php the_post_thumbnail( 'medium', array('class' => 'embed-responsive-item') ) ?>
            </div>
        </div>

        <div class="cmd-post-data">
            <span class="post-date"><?php _e(the_date())?></span>
            <?php the_title( sprintf( '<h5 class="entry-title cmd-heading-4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ) ;?>
            <!-- <hr> -->
            <div class="cmd-post-content">
                
                <?php the_excerpt(  )?>
            </div>
            <a href="<?php the_permalink(  )?>" class="">Read More <i class="fa fa-arrow-right"></i></a>
        </div>
        </div>

    <?php
    else :
    ?>
    <div class="cmd-post-card">
        
        <div class="row">
            <div class="col-lg-7">
                <div class="cmd-post-thumbnail">
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php the_post_thumbnail( 'medium', array('class' => 'embed-responsive-item') ) ?>
                    </div>
                </div>

                <div class="ced-post-meta">
                    <div class="ced-post-date">
                        <span class="date"><?php echo get_the_date( 'd' );?></span> <br>
                        <span class="month"><?php echo get_the_date( 'F' );?></span>
                    </div>

                    <div class="ced-post-share">
                        <span><i class="far fa-eye"></i> <?php _e(get_comments_number())?></span>
                        <span><i class="far fa-comments"></i> <?php _e(get_comments_number())?></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="cmd-post-data">
                    <?php the_title( sprintf( '<h4 class="entry-title cmd-heading-4"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ) ;?>
                    <hr>
                    <div class="cmd-post-content">
                        <?php the_excerpt(  )?>
                    </div>
                    <p><?php _e(the_date())?></p>
                </div>
            </div>
        </div>
        <a href="<?php the_permalink(  )?>" class="cmd-read-more"><i class="fa fa-arrow-right"></i></a>
    </div>
    <?php 

    endif;

    ?>

        
    
</article>