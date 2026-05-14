<?php
/**
 * Template Name: Careers Page
 */
get_header(); ?>

<section class="careers-landing section-light" style="padding: 180px 0 120px; min-height: 100vh;">
    <div class="container gsap-fade-up">
        <h1 style="font-size: clamp(40px, 5vw, 64px); margin-bottom: 40px;">
            Join a firm where <span class="italic text-gold">law meets sport.</span>
        </h1>
        <div style="max-width: 600px; font-size: var(--base-size); margin-bottom: 60px;">
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    the_content();
                }
            }
            ?>
        </div>
        
        <div class="careers-listings" style="margin-top: 80px;">
            <h3 style="font-family: var(--font-heading); font-size: 32px; margin-bottom: 40px; color: var(--color-gold);">Open Positions</h3>
            
            <?php
            $careers = get_field('open_positions'); // Assuming an ACF Repeater for positions
            if ($careers) :
                foreach ($careers as $job) :
            ?>
                    <div class="job-item" style="padding: 32px 0; border-top: 1px solid rgba(184, 151, 90, 0.3); display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h4 style="font-size: 20px; margin-bottom: 8px;"><?php echo esc_html($job['title']); ?></h4>
                            <p style="font-size: 14px; color: var(--color-muted);"><?php echo esc_html($job['location']); ?> &middot; <?php echo esc_html($job['type']); ?></p>
                        </div>
                        <a href="<?php echo esc_url($job['link'] ? $job['link'] : '/contact'); ?>" class="btn-outline">Apply &rarr;</a>
                    </div>
            <?php
                endforeach;
            else :
            ?>
                <p style="color: var(--color-muted);">There are currently no open positions, but we are always interested in connecting with exceptional talent. <a href="/contact" class="text-gold">Send us your CV.</a></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>


