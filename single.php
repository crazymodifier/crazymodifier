<?php


get_header();
?>

<main id="site-content" class="container">
    <?php

    if(have_posts()):

        while(have_posts()):
            the_post();

            get_template_part( 'template-parts/single', get_post_type() );
        endwhile;

    endif;
    ?>


    <?php comments_template(  );?>
    <?php

    $tags = wp_get_post_tags(get_the_ID());

    if ($tags) {
        $tag_ids = array();
        foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
        $args=array(
            'tag__in' => $tag_ids,
            'post__not_in' => array(get_the_ID()),
            'posts_per_page'=>3, // Number of related posts to display.
            'caller_get_posts'=>1
        );

        query_posts( $args );

        if(have_posts()):
            echo '<div class="row">';
            while(have_posts()):

                the_post();
                ?>

                <div class="col-lg-4">
                <?php get_template_part('template-part/content','post');?>
                </div>
            <?php endwhile;
            echo '</div>';
        endif;

    }

    wp_reset_query();
    ?>
    
</main>
<?php
get_footer();

?>