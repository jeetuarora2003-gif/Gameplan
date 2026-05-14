<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

<section class="about-hero section-light" style="padding: 180px 0 120px;">
    <div class="container grid" style="grid-template-columns: 1fr 1fr; gap: 80px;">
        <div class="about-left flex" style="gap: 40px;">
            <div class="section-label">
                <span style="writing-mode: vertical-rl; transform: rotate(180deg); font-family: var(--font-body); font-size: 11px; text-transform: uppercase; color: var(--color-gold); letter-spacing: 0.1em; white-space: nowrap; margin-top: 10px;">
                    About Us
                </span>
            </div>
            <div class="about-headline">
                <h1 class="gsap-fade-up" style="font-size: clamp(40px, 5vw, 64px); line-height: 1.1;">
                    Strategic legal counsel for the <span class="italic text-gold">entire sports ecosystem.</span>
                </h1>
            </div>
        </div>

        <div class="about-right">
            <div class="about-body gsap-fade-up" style="font-size: var(--base-size); margin-bottom: 60px; max-width: 500px;">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        the_content();
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Additional content for about page can be managed via WordPress blocks or ACF fields -->

<?php get_footer(); ?>


