<?php
/**
 * Template Name: Legal Page
 */
get_header(); ?>

<style>
    .legal-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 160px 40px 100px;
    }
    .legal-content h1 {
        font-family: 'Fraunces', serif;
        font-size: 64px;
        font-weight: 400;
        margin-bottom: 60px;
        color: var(--color-gold);
    }
    .legal-content h2 {
        font-family: 'Fraunces', serif;
        font-size: 28px;
        margin-top: 50px;
        margin-bottom: 20px;
        color: var(--color-gold);
    }
    .legal-content h3 {
        font-family: 'DM Sans', sans-serif;
        font-size: 20px;
        font-weight: 600;
        margin-top: 30px;
        color: var(--color-text-light);
    }
    .legal-content p, .legal-content li {
        font-size: 16px;
        opacity: 0.8;
        line-height: 1.8;
        margin-bottom: 20px;
    }
    .legal-content ul {
        margin-bottom: 30px;
    }
</style>

<div class="legal-container">
    <div class="legal-content">
        <?php
        while ( have_posts() ) : the_post();
            the_title( '<h1>', '</h1>' );
            the_content();
        endwhile;
        ?>
    </div>
</div>

<?php get_footer(); ?>


