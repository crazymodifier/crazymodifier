<article <?php post_class( )?>>

    <header>

        <?php the_title( '<h1 class="entry-title cmd-post-title">', '</h1>');?>

        <div class="cmd-post-thumbnail">
            <div class="embed-responsive embed-responsive-16by9">
                <?php the_post_thumbnail( 'full', array('class' => 'embed-responsive-item') ) ?>
            </div>
        </div>
    </header>

    <main>

        <?php the_content()?>

    </main>

    <footer>

    </footer>

</article>