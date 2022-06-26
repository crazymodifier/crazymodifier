<?php

get_header();

?>


<main id="site-content" class="container">

    <div class="row">
        <div class="col-lg-8">
        <?php

        if(have_posts()):

            while(have_posts()):

                the_post();

                get_template_part( 'template-parts/content', get_post_type() );

            endwhile;

        endif;

        ?>
        </div>
        <div class="col-lg-4">
            
        </div>
    </div>

</main>


<?php

get_footer();

?>