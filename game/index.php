<?php
/**
 * The main template file
 */
get_header(); ?>

<section class="section-light" style="padding: 180px 0 120px;">
    <div class="container">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header" style="margin-bottom: 40px;">
                        <?php the_title( '<h1 class="entry-title" style="font-size: clamp(40px, 5vw, 64px);">', '</h1>' ); ?>
                    </header>

                    <div class="entry-content" style="max-width: 800px; font-size: var(--base-size);">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            echo '<p>No content found.</p>';
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>


